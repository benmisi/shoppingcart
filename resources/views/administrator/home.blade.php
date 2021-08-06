@extends('layouts.admin')

@section('content')
<div class="container">
    <x.alert/>
    <div class="row">
        <div class="col">
        <div class="card bg-info text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>Incomplete Orders</p>
       <div class="display-1">{{$pending}}</div>
      <footer class="text-white">
       <a href="{{route('Admin-orders.show','PENDING')}}" class="btn btn-text text-white">View</a>
      </footer>
    </blockquote>
  </div>
        </div>
        <div class="col">
        <div class="card bg-success text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>Orders Delivered/Collected</p>
      <div class="display-1">{{$delivered}}</div>
      <footer class="text-white">
       <a href="{{route('Admin-orders.show','DELIVERED')}}" class="btn btn-text text-white">View</a>
      </footer>
    </blockquote>
  </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
        <div class="card bg-danger text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>Order Cancelled</p>
      <div class="display-1">{{$cancelled}}</div>
      <footer class="text-white">
       <a href="{{route('Admin-orders.show','CANCELLED')}}" class="btn btn-text text-white">View</a>
      </footer>
    </blockquote>
  </div>
        </div>
        <div class="col">
        <div class="card bg-primary text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>Orders awaiting Delivery</p>
      <div class="display-1">{{$awaiting}}</div>
      <footer class="text-white">
       <a href="{{route('Admin-orders.show','AWAITING')}}" class="btn btn-text text-white">View</a>
      </footer>
    </blockquote>
  </div>
        </div>
    </div>
</div>

@endsection