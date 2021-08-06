@extends('layouts.admin')

@section('content')
<div class="container">  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Exchange Rate</li>
        </ol>
    </nav>
<x-alert/>
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Product List</div>
       <x-administrator.add-rate>
           <div class="row">
               
               <x-forms.select name="primary" label="Select Primary Currency" size="col-md-12" :options="$currency"/>
           </div>
           <div class="row">
               
               <x-forms.select name="secondary" label="Select Secondary Currency" size="col-md-12" :options="$currency"/>
           </div>
           <div class="row">        
           <x-forms.input type="number" name="amount" label="Amount" size="col-md-12"/> 
           </div>
       </x-administrator.add-rate>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Primary Currency</th>
                    <th>Secondary Currency</th>
                    <th>Rate</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rates as $rate )
                    <tr>
                     
                        <td>{{$rate->primary_currency->name}}</td>
                        <td>{{$rate->secondary_currency->name}}</td>
                        <td>{{$rate->amount}}</td>
                    </tr>
                @empty
                       <tr><td colspan="3" class="text-center text-danger"> No Exchange rate found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection