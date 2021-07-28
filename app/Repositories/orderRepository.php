<?php
namespace App\Repositories;

use App\Models\orderitems;
use App\Models\orders;
use App\Models\receipts;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Repositories\helperRepository;
use App\View\Components\checkout\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class orderRepository{

    private $helper;

    public function __construct(helperRepository $helper)
    {
       $this->helper = $helper; 
    }
    public function checkCart(){
        $cart = Cart::content();
         $invoiecenumber = $this->helper->getinvoicenumber(Auth::user()->id);
        if(Cart::count()>0){
            $uuid = Str::uuid();
            $order = orders::create(['uuid'=>$uuid,'user_id'=>Auth::user()->id,'invoicenumber'=>$invoiecenumber]);
            foreach ($cart as $key => $value) {
                 orderitems::create(['order_id'=>$order->id,'product_id'=>$value->id,"currency"=>$value->options->currency,'qty'=>$value->qty,'price'=>$value->price]);
            }
            Cart::destroy();

            return redirect()->route('Orders.show',$order->uuid);
        }else{
            $data = $this->getOrders(Auth::user()->id);
            $pending=[];
            $cancelled=[];
            $awaiting =[];
            $delivered=[];
             if(count($data)>0){
                 $grouped = $data->groupby('status');
                   foreach ($grouped as $key => $value) {
                        if(strtoupper($key)=='PENDING'){
                            $pending = $value;
                        }elseif(strtoupper($key)=='AWAITING'){
                            $awaiting = $value;
                        }elseif(strtoupper($key)=='CANCELLED'){
                            $cancelled = $value;
                        }elseif (strtoupper($key)=='DELIVERED') {
                         $delivered = $value;
                        }
                   }
             }
            return view('home',compact('pending','cancelled','awaiting','delivered'));
        }
    }

    public function getOrders($id){
        return orders::with('items.product','receipts')->whereuser_id($id)->get();
    }

    public function getOrder($uuid){
        return orders::with('items.product','receipts')->whereuuid($uuid)->first();
    }


    public function getOrderBalance($invoiecenumber){
        $order = orders::with('items')->whereinvoicenumber($invoiecenumber)->first();
        $balance=0;
        if(!is_null($order))
        {
        $receipts = receipts::whereinvoicenumber($order->invoicenumber)->get();
          $totalreceipted= count($receipts)>0 ? $receipts->sum('amount') : 0;
          $totalcost = $order->items->sum('price');
           $balance = $totalcost-$totalreceipted;

        } 

        return $balance;
    }

    public function deleteItem($id){
        $item = orderitems::whereid($id)->first();
        $order = $item->order;
        $item->delete();
        $items = orderitems::whereorder_id($order->id)->get();
        if(count($items)==0){
           $order->delete();
           return redirect()->route('home')->with('statusSuccess','Order Successfully Deleted');
        }else{
            $this->checksettlement($order->invoicenumber);
            return redirect()->back()->with('statusSuccess','item Successfully Deleted'); 
        }
    }

   

    public function checksettlement($invoiecenumber){
        $order = orders::with('items')->whereinvoicenumber($invoiecenumber)->first();
        if(!is_null($order))
        {
        $receipts = receipts::whereinvoicenumber($order->invoicenumber)->get();
          $totalreceipted= count($receipts)>0 ? $receipts->sum('amount') : 0;
          $totalcost = $order->items->sum('price');
           
          if($totalcost<= $totalreceipted){
              $order->status ="AWAITING";
              $order->save();
          }

        }
        
    }
}