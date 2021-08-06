@extends('layouts.admin')

@section('content')
<div class="container">
  
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('Admin-category.index')}}">Categorys</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Categories</li>
  </ol>
</nav>
<x-alert/>
<div class="row">
    <div class="col-md-6 offset-md-3">
<form method="POST" action="{{ route('Admin-category.update',$category->id) }}">
    @method('PUT')
                        @csrf
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div>Update category</div>
     

    </div>
    <div class="card-body">
    <div class="row">
                     
                     <div class="col-md-12">
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
 <label for="name" class="control-label">Name</label>
 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name}}">
  @error('name')
      
           <p class="text-danger">  {{ $message }}</p>
      
  @enderror
 
</div>
</div>
                 </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</div>
</form>
    </div>
</div>
</div>

@endsection