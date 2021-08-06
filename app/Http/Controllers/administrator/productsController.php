<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\categoryRepository;
use App\Repositories\currencyRepository;
use App\Repositories\productsRepository;
use Illuminate\Http\Request;

class productsController extends Controller
{
    private $product;
    private $category;
    public $currency;
    public function __construct(productsRepository $product,categoryRepository $category,currencyRepository $currency)
    {
        $this->middleware('auth:admin');
        $this->product = $product;
        $this->category = $category;
        $this->currency = $currency;
    }
    public function index()
    {
      $products = $this->product->getList();
      $categorydata = $this->category->getList();
      $currencydata = $this->currency->getList();
     
      return view('administrator.products.index',compact('products','categorydata','currencydata'));
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
         return $this->product->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->product->delete($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $product = $this->product->getProduct($id);
         $categorydata = $this->category->getList();
         $currencydata = $this->currency->getList();
         return view('administrator.products.edit',compact('product','categorydata','currencydata'));

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
        return $this->product->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }
}
