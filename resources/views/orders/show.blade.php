@extends('layouts.app')

@section('content')

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order Settlement</li>
  </ol>
</nav>
    <x-alert/>
    <form action="{{route('Orders.store')}}" method="POST">
      @csrf
      <input type="hidden" name="uuid" value="{{$order->uuid}}"/>
    <div class="row mt-4">

    <div class="col-md-6">
      <h3>Billing Information</h3>
      <table class="table">
          <tr><td><b>Name</b></td><td>{{$user->name}}</td></tr>
          <tr><td><b>surame</b></td><td>{{$user->surname}}</td></tr>
          <tr><td><b>Email</b></td><td>{{$user->email}}</td></tr>
          <tr><td><b>Phone</b></td><td>{{$user->phonenumber}}</td></tr>
      </table>
      <x-forms.textarea name="address" label="Delivery Address" type="text" size="col-md-12" :value="$user->address"/>
    </div>
    <div class="col-md-6">

    <h3>Your Order</h3>
      <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Product</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($order->items as $ct )
             <tr>
                 <td>{{$ct->product->name}} * {{$ct->qty}}</td>
                 <td class="text-right">
                 {{$ct->currency}}{{$ct->qty * $ct->price}}
                
                 </td>
             </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center text-danger">No Pending Orders</td>
            </tr>
            @endforelse
            <tr><td><b>Subtotal</b></td><td class="text-right"><b>{{$order->items[0]->currency}}{{$order->items->sum('price')}}</b></td></tr>
                          <tr><td><b>Total</b></td><td class="text-right"><b>{{$order->items[0]->currency}}{{$order->items->sum('price')}}</b></td></tr>
                       
            </tbody>

       </table>

       <div class="mt-4">
           <div class="card">
               <div class="card-body">
                   <img src="/img/gateway.png"/>
                   <p class="mt-2"><b>We are integrated to PAYNOW a secure payment gate that allows you to pay using VISA,MASTER CARD, ECOCASG,ONEMONEY & TELECASH</b></p>
               </div>
               <div class="card-footer">
                   <button type="submit" class="btn btn-block btn-primary">Make Payment</button>
               </div>
           </div>

       </div>
        
    </div>

    </div>
    </form>
</div>

@endsection