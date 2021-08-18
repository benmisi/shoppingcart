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
    <div class="row">
        <x-product :product="$product" :cart="$cart"/>
        <x-mycart :cart="$cart" :currency="$currency"/>
    </div>

</div>

@endsection