<?php

namespace App\Http\Controllers;

use App\Repositories\currencyRepository;
use App\Repositories\exchangeRepository;
use App\Repositories\productsRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    private $product;
    private $currency;
    private $exchange;


    public function __construct(productsRepository $product,exchangeRepository $exchange,currencyRepository $currency)
    {
     $this->product = $product; 
     $this->exchange = $exchange;
     $this->currency = $currency;   
    }
    public function index()
    {
        $cart = Cart::content();
         $currency = $this->currency->getList();
         if(Cart::count()>0){
            $usedcurrency=  $cart->first()->options->currency;
            $currency = $currency->whereNotIn('name',[$usedcurrency]);
         }
         
         return view('cart.index',compact('cart','currency'));
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       $product = $this->product->getProduct($request->product_id);
        Cart::add(['id'=>$product->id,'name'=>$product->name,'qty'=>1,'price'=>$product->price,'weight' =>0,'options'=>['currency'=>$product->currency->name]]);
        return redirect()->route('shop.index')->with('statusSuccess','Item successfully Added to Cart');
    }

 
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function removeitem($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('statusSuccess','Item Successfully removed');
    }

    public function clearcart()
    {
        Cart::destroy();
        return redirect()->route('shop.index')->with('statusSuccess','Successfully Cleared Cart');

    }

    public function increaseqty($rowid){
        $cart = Cart::get($rowid);
        $currentquantity = $cart->qty;
        $newquantity = $currentquantity+1;
        $product = $this->product->getProduct($cart->id);
        if($product->quantity != "*"){
             $remaining = $product->quantity;
             if($remaining < $newquantity){
                 return redirect()->back()->with('statusError','Quantity requested is more than stock available. Current items instock='.$remaining);
             }

        }      
        Cart::update($rowid, $newquantity);
        return redirect()->back()->with('statusSuccess','Quantity Successfully Increased');
    }

    public function decreaseqty($rowid){
        $cart = Cart::get($rowid);
        $quantity = $cart->qty;
        $newquantity = $quantity-1;
        if($newquantity>0)
        {
        Cart::update($rowid, $newquantity);
        }else{
            Cart::remove($rowid);
        }
        return redirect()->back()->with('statusSuccess','Quantity Successfully decreased');
    }

    public function changecurrency($currencyid){
     $rate = $this->exchange->getRate($currencyid);
     //dd($rate);
     $currency = $this->currency->getCurrency($currencyid);
     if(!is_null($currency))
     {
     if($rate>0){
       $cart = Cart::content();
       foreach ($cart as $key => $value) {
           $product =  $this->product->getProduct($value->id);
           if(!is_null($product)){
               $price = $product->price * $rate;
               Cart::update($value->rowId,['price'=>$price,'options'=>['currency'=>$currency->name]]);
           }
       }
       return redirect()->back()->with('statusSuccess','Currency Successfully changed');
     }else{
         return redirect()->back()->with('statusError','No Exchange rate found for selected currency');
     }
    }else{
        return redirect()->back()->with('statusError','Selected currency not found');  
    }
    }
}
