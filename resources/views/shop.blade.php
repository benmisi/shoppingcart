@extends('layouts.app')

@section('content')

<div class="container">
    <x-alert/>
  <div class="card">
      <div class="card-body d-flex justify-content-between">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Filter By Category
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="{{route('shop.index')}}">All</a>  
      @forelse ( $categorylist as $category)
      <a class="dropdown-item" href="{{route('shop.category',$category->id)}}">{{$category->name}}({{count($category->products)}})</a>    
      @empty
          
      @endforelse
   
  </div>
</div>
      <div>
          Showing {{count($products)}} results
      </div>
      </div>
      
  </div>

  <div class="card mt-4">
     <div class="card-body">
         <div class="row">
           @if (count($products)>0)             
         
             @forelse ($products as $product )
   
              <div class="col-md-4">
              <div class="card mt-4">
  <img src="/{{$product->image}}"  class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->currency->name}}{{$product->price}}</p>
    @if($product->quantity > 0 || $product->quantity =='*')
        @if($cart->where('id',$product->id)->count())
         <a href="{{route('Cart.index')}}" class="btn btn-secondary"> View cart</a>
        @else
        <form  method="POST" action="{{route('Cart.store')}}">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}"/>
      <button type="submit" class="btn btn-primary">Add to cart</button>
        </form>
        @endif
      @else
         <p class="text-center text-danger"><b>Out of stock</b></p>
      @endif
  </div>
</div>
              </div>   
             @empty
  
             @endforelse

             @else
             <div class="col-md-12">
             <div class="alert alert-danger text-center" role="alert">
              No products found as yet
            </div>  
             </div>
             @endif
         </div>
     </div>
  </div>
</div>

@endsection