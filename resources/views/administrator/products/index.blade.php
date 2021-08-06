@extends('layouts.admin')

@section('content')
<div class="container">  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>
<x-alert/>
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Product List</div>
       <x-administrator.add-product>
           <div class="row">
               <x-forms.input type="text" name="name" label="Product Name" size="col-md-6"/>
               <x-forms.select name="category" label="Select Category" size="col-md-6" :options="$categorydata"/>
           </div>
           <div class="row">
           <x-forms.input type="number" name="price" label="Price(USD)" size="col-md-6"/>
           <x-forms.select name="currency" label="Select Currency" size="col-md-6" :options="$currencydata"/>
           </div>
           <div class="row">
           <x-forms.input type="file" name="image" label="Attach Image" size="col-md-6"/>
           <x-forms.input type="number" name="quantity" label="Quantity" size="col-md-6"/> 
           </div>
           <div class="row">
               <x-forms.textarea name="description" label="Description" size="col-md-12" value=""/>
           </div>
       </x-administrator.add-product>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product )
                    <tr>
                        <td><img src="/{{$product->image}}" width="50px"/></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->currency->name}}{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->status}}</td>
                        <td class="d-flex justify-content-end">
                        <a href="{{route('Admin-products.edit',$product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                   
                        <a href="{{route('Admin-products.show',$product->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                       <tr><td colspan="8" class="text-center text-danger"> No products found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection