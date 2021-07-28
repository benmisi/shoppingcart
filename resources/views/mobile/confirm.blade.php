@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-6 offset-md-3">
             <form action="{{route('Mobile.update',$id)}}" method="POST">
                 @csrf
                 @method('PUT')
             <div class="card">
                 <div class="card-header">Confirm Payment</div>
                 <div class="card-body">
                 <p class="text-lg font-weight-bold">1 PLEASE CHECK YOUR PHONE AND ENTER YOUR PIN TO AUTHORIZE THE TRANSACTION</p>
                        <p class="text-lg font-weight-bold">2 WHEN YOU HAVE AUTHORIZED THE TRANSACTION PLEASE PRESS BUTTON BELOW TO COMPLETE THE TRANSACTION</p>
                 </div>
                 <div class="card-footer">
                 <button type="submit" class="btn btn-block btn-primary">Confirm Payment</button>
                 </div>
             </div>
             <input type="hidden" name="id" value="{{$id}}"/>
           
             </form>
         </div>
     </div>
</div>
@endsection