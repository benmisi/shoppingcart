@extends('layouts.app')

@section('content')
<div class="container">
    <x.alert/>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info">Pending</div>
                <div class="card-body">
                   <x-user.orders :orders="$pending"/>
               </div>
           </div>
      </div>
   
      <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger">Cancelled </div>

                <div class="card-body">
                <x-user.orders :orders="$cancelled"/>
                </div>
           </div>
      </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary">Awaiting Delivery </div>

                <div class="card-body">
                <x-user.orders :orders="$awaiting"/>
                  </div>
           </div>
      </div>
   
      <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success">Delivered</div>

                <div class="card-body">
                <x-user.orders :orders="$delivered"/>
                </div>
           </div>
      </div>
      </div>
    </div>
</div>
@endsection
