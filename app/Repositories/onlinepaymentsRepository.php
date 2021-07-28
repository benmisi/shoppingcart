<?php
namespace App\Repositories;

use App\Models\onlinepayments;
use App\Models\receipts;
use App\Repositories\orderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Paynow\Payments\Paynow;

class onlinepaymentsRepository{

    private $order;
    private $helper;

    public function __construct(orderRepository $order,helperRepository $helper)
    {
        $this->order = $order; 
        $this->helper = $helper;
    }

    public function intiateCard(){
       return new Paynow('12405','a331b3fa-0d28-4329-ae5a-10266f457093','http://shoppingcart.test/paynowcheck','http://shoppingcart.test/paynowcheck');
    
      }
    
      public function initiateMobile(){
        return new Paynow('12404','6f01b7d7-80fe-47ae-8f24-66325cf2e3da','http://shoppingcart.test/paynowcheck','http://shoppingcart.test/paynowcheck');
       }
       
       public function inititalMobilepayment(Request $request)
       {
        $paynow = $this->initiateMobile();
       $order = $this->order->getOrder($request->uuid);
       $balance = $this->order->getOrderBalance($order->invoicenumber);
       if($balance>=$request->amount){
        $email = getenv('TEST_MODE') ?'isithole@itsac.co.zw' : $request->user()->email;
        $payment  = $paynow->createPayment($order->invoicenumber,$email);
        $payment->add($order->invoicenumber,$request->amount);
        try {
          $response = $paynow->sendMobile($payment,$request->phonenumber,$request->wallettype);
          if($response->success()){
            $pollUrl = $response->pollUrl();

           $online =   onlinepayments::create([
              'invoicenumber'=>$order->invoicenumber,
            'user_id'=>Auth::user()->id,
            'poll_url'=>$pollUrl,
            'amount'=>$request->amount,
            'mode'=>$request->wallettype,
            'status'=>'PENDING']);
        
            return redirect()->route('Mobile.show',$online->id);
          }else{
            return  redirect()->back()->with('statusError','Failed to initiate payment please try again');
          }
        }catch (Exception $e){
          return  redirect()->back()->with('statusError',$e->getMessage());
      }
       }
       else{
        return redirect()->route('Mobile.edit',$request->uuid)->with('statusError','Amount Payable cannot be more than $'.$balance);
       }
      }
      
     public function getTotal($id){
        $online = $this->order->getOrder($id);
       $balance = $this->order->getOrderBalance($online->invoicenumber);
       return $balance;
     }

      public function initiateCardPayment($uuid){
        $paynow = $this->intiateCard();
        $order = $this->order->getOrder($uuid);
         $email = getenv('TEST_MODE') ?'isithole@itsac.co.zw' : Auth::user()->email;
         $payment  = $paynow->createPayment($order->invoicenumber,$email);
         $amount = $this->order->getOrderBalance($order->invoicenumber);
         $payment->add($order->invoicenumber,$amount);
         try {
          $response = $paynow->send($payment);
           if($response->success()){
             $pollUrl = $response->pollUrl();
             $link = $response->redirectUrl();
            $online =   onlinepayments::create([
               'invoicenumber'=>$order->invoicenumber,
             'user_id'=>Auth::user()->id,
             'poll_url'=>$pollUrl,
             'amount'=>$amount,
             'mode'=>"paynow",
             'status'=>'PENDING']);
              return redirect()->away($link);
           }else{
             return  redirect()->back()->with('statusError','Failed to initiate payment please try again');
           }
         }catch (Exception $e){
           return  redirect()->back()->with('statusError',$e->getMessage());
       }
      }
      
      public function confirmMobile($id){
        $online = onlinepayments::whereid($id)->first();
        $paynow = $this->initiateMobile();
       try {
         $status = $paynow->pollTransaction($online->poll_url);
                        if (!empty($status))
                        {
                            if (strtoupper($status->status()) == 'PAID' || strtoupper($status->status()) == 'AWAITING DELIVERY') {
                                $online->status = $status->status();
                                $online->save();
                                $receiptnumber = $this->helper->getreceiptnumber($online->user_id);
                                if(!receipts::whereonlinepayment_id($online->id)->exists()){
                                  receipts::create(['invoicenumber'=>$online->invoicenumber,'receiptnumber'=>$receiptnumber,'onlinepayment_id'=>$online->id,'currency'=>'ZWL','amount'=>$online->amount]);
                                  $balance = $this->order->getOrderBalance($online->invoicenumber);
                                  if($balance<=0)
                                  {
                                  $this->order->checksettlement($online->invoicenumber);
                                  return redirect()->route('home')->with('statusSuccess','Payment successfully completed. Your order is now being processed');
                              
                                  }
                                  else{
                                    return redirect()->route('Mobile.edit',$online->order->uuid)->with('statusSuccess','Payment Successfully received please clear balance to complete order');
                                  }

                                }
                            }
                        }else
                        {
                          return redirect()->back()->with('statusError','Ooops transaction confirmation failed');
                        }
       } catch (\Throwable $th) {
         //throw $th;
       }

      }
      public function confirmCard(){
        $online = onlinepayments::whereuser_id(Auth::user()->id)->wherestatus('PENDING')->orderBy('id','desc')->first();
        $paynow = $this->intiateCard();
       try {
         $status = $paynow->pollTransaction($online->poll_url);
                        if (!empty($status))
                        {
                            if (strtoupper($status->status()) == 'PAID' || strtoupper($status->status()) == 'AWAITING DELIVERY') {
                                $online->status = $status->status();
                                $online->save();
                                $receiptnumber = $this->helper->getreceiptnumber($online->user_id);
                                if(!receipts::whereonlinepayment_id($online->id)->exists()){
                                  receipts::create(['invoicenumber'=>$online->invoicenumber,'receiptnumber'=>$receiptnumber,'onlinepayment_id'=>$online->id,'currency'=>'USD','amount'=>$online->amount]);
                                  $balance = $this->order->getOrderBalance($online->invoicenumber);
                                
                                  if($balance<=0)
                                  {
                                  $this->order->checksettlement($online->invoicenumber);
                                  return redirect()->route('home')->with('statusSuccess','Payment successfully completed. Your order is now being processed');
                              
                                  }
                                  else{
                                    return redirect()->route('Orders.show',$online->order->uuid)->with('statusSuccess','Payment Successfully received please clear balance to complete order');
                                  }

                                }
                            }
                        }
       } catch (\Throwable $th) {
         //throw $th;
       }

      }

      public function processOrder(Request $request){
       
        $order =  $this->order->getOrder($request->uuid);
        $order->delivery_address = $request->address;
        $order->save();
        $currency = count($order->items)>0 ? $order->items[0]->currency :'ZWL';

        if($currency=='USD'){
         return $this->initiateCardPayment($order->uuid);
        }else{
            return redirect()->route('Mobile.edit',$order->uuid);
        }
    }



     
}