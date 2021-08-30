@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <x-alert/>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product View</li>
  </ol>
</nav>
<div class="page_section">
    <div class="row">
        
        <div class="col-md-10 offset-md-1">
        <div class="row d-flex">
        <div class="@if(count($cart)==0) col-md-12  @else col-md-9 @endif">
        <x-product :product="$product" :cart="$cart"/>
        </div>
        @if(count($cart)>0)
        <div class="col-md-3">  
        <x-mycart :cart="$cart" :currency="$currency"/>
        </div>
        @endif
        </div>

        </div>
    </div>
</div>
    

</div>

@endsection