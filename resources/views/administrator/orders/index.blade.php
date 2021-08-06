@extends('layouts.admin')

@section('content')
<div class="container">  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
<x-alert/>
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Orders</div>
       

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Invoice number</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order )
                    <tr>
                      
                        <td>{{$order->updated_at}}</td>
                        <td>{{$order->invoicenumber}}</td>
                        <td>{{$order->status}}</td>                        
                        <td class="d-flex justify-content-end">
                        <a href="{{route('Admin-orders.edit',$order->uuid)}}" class="btn btn-sm btn-primary">View order</a>
                        </td>
                    </tr>
                @empty
                       <tr><td colspan="4" class="text-center text-danger"> No Orders  found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection