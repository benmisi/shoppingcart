@extends('layouts.admin')

@section('content')
<div class="container">  
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('Admin-products.index')}}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
        </ol>
    </nav>
<x-alert/>
<form method="POST" action="{{ route('Admin-products.update',$product->id) }}"  enctype="multipart/form-data">
    @method('PUT')
@csrf
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Edit Product</div>      

    </div>
    <div class="card-body">
    <div class="row">
               <x-forms.editinput type="text" name="name" label="Product Name" size="col-md-6" :value="$product->name"/>
               <x-forms.select name="category" label="Select Category" size="col-md-6" :options="$categorydata"/>
           </div>
           <div class="row">
           <x-forms.editinput type="number" name="price" label="Price(USD)" size="col-md-6" :value="$product->price"/>
           <x-forms.select name="currency" label="Select Currency" size="col-md-6" :options="$currencydata"/>
           </div>
           <div class="row">
           <x-forms.editinput type="file" name="image" label="Attach Image" size="col-md-6" :value="$product->image"/>
           <x-forms.editinput type="number" name="quantity" label="Quantity" size="col-md-6" :value="$product->quantity"/> 
           </div>
           <div class="row">
               <x-forms.textarea name="description" label="Description" size="col-md-12" :value="$product->description"/>
           </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div
</div>
</form>

</div>
@endsection