@extends('layouts.app')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cart</li>
  </ol>
</nav>
    <x-alert/>
  <div class="row">
      <div class=" col-md-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                  <div>My Cart</div>
                  @if(Gloudemans\Shoppingcart\Facades\Cart::count()>0)
                   <div class="d-flex">
                       <div>Change currency</div> 
                       @forelse ($currency as $current )
                       <a href="{{route('cart-currency-change',$current->id)}}" class="btn btn-sm btn-primary ml-1 mr-1">{{$current->name}}</a> 
                       @empty
                           
                       @endforelse 
                   </div>
                   @endif
              </div>
              <div class="card-body">
                  <table class="table">
                      <thead class="dark">
                          <tr>
                              <th>Product</th>
                              <th class="text-center">Quantity</th>
                              <th class="text-right">Cost</th>                              
                          </tr>
                      </thead>

                      <tbody>
                           
                          @forelse ($cart as $ct )
                          <tr>
                              <td>
                                  {{$ct->name}}
                              </td>
                              <td class="text-center">
                                  <div class="d-flex justify-content-center">
                                      <a href="{{route('cart-reduce-qty',$ct->rowId)}}" class="btn btn-sm btn-link"><i class="fa fa-minus text-danger"></i></a>
                                      <div class="ml-1 mr-1"><b>{{$ct->qty}}</b></div>
                                      <a href="{{route('cart-increase-qty',$ct->rowId)}}" class="btn btn-sm btn-link"><i class="fa fa-plus text-success"></i></a>
                                  </div>
                              </td>
                              <td class="text-right">
                                  {{$ct->options->currency}}{{$ct->qty * $ct->price}}
                                  <a href="{{route('cart-remove-item',$ct->rowId)}}" class="text-danger"><i class="fa fa-times"></i></a>
                              </td>
                          </tr>   
                          @empty
                             <tr>
                              <td colspan="3">
                               <div class="alert alert-danger" role="alert">
                               No Items found in cart
                                </div>
                              </td>
                            </tr>
                          @endforelse
                          <tr>
                              <td colspan="2"></td>
                              <td class="text-right">  
                                  @if(Gloudemans\Shoppingcart\Facades\Cart::count()>0)
                  <a href="{{route('clear-cart')}}" class="btn btn-sm btn-danger">Clear Cart</a>
                  @endif<a href="{{route('shop.index')}}" class="btn btn-sm btn-primary">Return to Shop</a></td>
                          </tr>
                         
                      </tbody>
                  </table>
                  @if(Gloudemans\Shoppingcart\Facades\Cart::count()>0)
                  <div class="row mt-2 d-flex justify-content-end">
                      <div class="col-md-4">
                         <div class="card">
                             <div class="card-header">
                                 Cart Totals
                             </div>
                             <div class="card-body">
                                 <table class="table">
                                
                          <tr><td>Subtotal</td><td class="text-right">{{$cart->first()->options->currency}}{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td></tr>
                          <tr><td>Total</td><td class="text-right">{{$cart->first()->options->currency}}{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td></tr>
                          <tr><td colspan="2"><a href="{{route('Checkout.index')}}" class="btn btn-block btn-success">Proceed to Checkout</a></td></tr>
                                 </table>
                             </div>
                         </div>
                      </div>
                  </div>
                  @endif
              </div>
          </div>

      </div>
  </div>
</div>

@endsection