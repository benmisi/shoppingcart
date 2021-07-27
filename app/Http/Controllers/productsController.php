<?php

namespace App\Http\Controllers;

use App\Repositories\categoryRepository;
use Illuminate\Http\Request;
use App\Repositories\productsRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

class productsController extends Controller
{
    
    private $products;
    private $categories;
    public function __construct(productsRepository $products,categoryRepository $categories)
    {
      $this->products = $products;  
      $this->categories = $categories;
    }
    public function index()
    {

        $products = $this->products->getList();
        $categorylist =  $this->categories->getList();
        $cart = Cart::content();
        
         return view('shop',compact('products','categorylist','cart'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('shop',compact('products','categorylist','cart'));
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
