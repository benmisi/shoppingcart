@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-6 offset-md-3">
             <x-alert/>
             <form action="{{route('Mobile.store')}}" method="POST">
                 @csrf
             <div class="card">
                 <div class="card-header d-flex justify-content-between">
                     <div>Mobile Payment</div>
                     <div>Balance Due: ZWL{{$balance}}</div>
                 </div>
                 <div class="card-body">
                   <x-forms.input type="text" name="phonenumber" label="Mobile number" size="col-md-12" value=""/>
                   <x-forms.input type="text" name="amount" label="Amount" size="col-md-12" value=""/>
                   <x-forms.mode  name="wallettype" label="Wallet type" size="col-md-12"/>
                 </div>
                 <div class="card-footer">
                 <button type="submit" class="btn btn-block btn-primary">submit</button>
                 </div>
             </div>
             <input type="hidden" name="uuid" value="{{$uuid}}"/>
           
             </form>
         </div>
     </div>
</div>
@endsection