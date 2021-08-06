@extends('layouts.admin')

@section('content')
<div class="container">  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('Admin-orders.show',$order->status)}}">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order</li>
        </ol>
    </nav>
<x-alert/>
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Order</div>
       <div> 
           {{$order->status}} @if ($order->status =='AWAITING')
           <x-administrator.updatedelivery>
           <div class="row">
               <x-forms.input type="text" name="name" label="Received By" size="col-md-12"/>
            </div>
            <div class="row">
               <x-forms.input type="text" name="natid" label="ID number" size="col-md-12"/>
            </div>
            <div class="row">
               <x-forms.input type="date" name="date" label="Received On" size="col-md-12"/>
            </div>
            <div class="row">
               <x-forms.input type="time" name="time" label="Received at" size="col-md-12"/>
            </div>
            <input type="hidden" name="id" value="{{$order->id}}"/>
           </x-administrator.updatedelivery>
       @endif</div>

    </div>
    <div class="card-body">
    <h4>User</h4>
        <hr/>
    
        <table class="table">
            <tbody>
                <tr><th>Name</th><td>{{$order->user->name}}</td></tr>
                <tr><th>Surname</th><td>{{$order->user->surname}}</td></tr>
                <tr><th>Email</th><td>{{$order->user->email}}</td></tr>
                <tr><th>Phone number</th><td>{{$order->user->phonenumber}}</td></tr>
                <tr><th>Delivery Address</th><td>{{$order->delivery_address}}</td></tr>
            </tbody>
        </table>
        <h4>Order Details</h4>
        <hr/>
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
       <h4>Delivery Details</h4>
       <hr/>
        @if (!is_null($order->delivery))
        <table class="table">
        <thead class="thead-dark">
                <tr>
                    <th>Details</th>
                    <th class="text-right">Value</th>
                </tr>
            </thead>
           <tbody>
               <tr>
                   <th>Received by</th>
                   <td class="text-right">{{$order->delivery->receiver}}</td>
               </tr>
               <tr>
                   <th>National ID</th>
                   <td class="text-right">{{$order->delivery->natid}}</td>
               </tr>
               <tr>
                   <th>Delivered On</th>
                   <td class="text-right">{{$order->delivery->receipt_date}}{{$order->delivery->receipt_time}}</td>
               </tr>
               <tr>
                   <th>Delivered By</th>
                   <td class="text-right">{{$order->delivery->deliverer->name}} {{$order->delivery->deliverer->surname}}</td>
               </tr>
           </tbody>
       </table>
   
        @else
        <div class="alert alert-danger" role="alert">
           No delivery information as yet
        </div>  
        @endif
      
      
      
    </div>
</div>

</div>
@endsection