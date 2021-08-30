<?php

namespace App\Http\Controllers;

use App\Repositories\categoryRepository;
use App\Repositories\currencyRepository;
use Illuminate\Http\Request;
use App\Repositories\productsRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

class productsController extends Controller
{
    
    private $products;
    private $categories;
    private $currency;
    public function __construct(productsRepository $products,categoryRepository $categories,currencyRepository $currency)
    {
      $this->products = $products;  
      $this->categories = $categories;
      $this->currency = $currency;
    }
    public function index()
    {

        $products = $this->products->getList();
        $categorylist =  $this->categories->getList();
        $cart = Cart::content();
        $currency = $this->currency->getList();
        
         return view('shop',compact('products','categorylist','cart','currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $products = $this->products->search($request);
       $categorylist =  $this->categories->getList();
        $cart = Cart::content();
        $currency = $this->currency->getList();
        
         return view('results',compact('products','categorylist','cart','currency'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->products->getProduct($id);
        $cart = Cart::content();
        $currency = $this->currency->getList();
        $categorylist =  $this->categories->getList();
        
        return view('shopview',compact('product','categorylist','cart','currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = $this->products->getProductsByCategory($id);
        $categorylist =  $this->categories->getList();
        $cart = Cart::content();
        $currency = $this->currency->getList();
        return view('results',compact('products','categorylist','cart','currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
