@extends('layouts.app')

@section('content')

<div class="container-fluid">
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

  <div class="row d-flex">
   
     <x-shop :products="$products" :cart="$cart"/>


   <x-mycart :cart="$cart" :currency="$currency"/>
 
</div>

</div>

@endsection