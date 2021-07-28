@extends('layouts.app')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
  </ol>
</nav>
    <x-alert/>
    <form action="{{route('register')}}" method="POST">
          @csrf
  <div class="row mt-4">
     
      <x-checkout.billing>
          <div class="row">
              <x-forms.input type="text" name="name" label="Name" size="col-md-6" value=""/>
              <x-forms.input type="text" name="surname" label="Lastname" size="col-md-6" value=""/>
          </div>
         
          <div class="row">
          <x-forms.input type="text" name="phonenumber" label="Phonenumber" size="col-md-6" value=""/>
          <x-forms.input type="text" name="email" label="Email" size="col-md-6"/>
          </div>
          <div class="row">
          <x-forms.input type="password" name="password" label="Password" size="col-md-6" value=""/>
          <x-forms.input type="password" name="password_confirmation" label="Confirm Password" size="col-md-6" value=""/>
          </div>
          <div class="row">
           <x-forms.textarea type="text" name="address" label="Address" size="col-md-12" value=""/>
          </div>
          <div class="mt-3">
              <b>Already got an account with us ? <a href="{{route('login')}}">CLICK HERE</a> to login</b>
          </div>
      </x-checkout.billing>
       <x-checkout.order :cart="$cart"/>
    
  </div>
  </form>
</div>

@endsection