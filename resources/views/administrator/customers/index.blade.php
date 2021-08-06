@extends('layouts.admin')

@section('content')
<div class="container">
  
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Customers</li>
  </ol>
</nav>
<x-alert/>
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Customers</div>
       <div>Total:{{count($customers)}}</div>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $cat )
                    <tr>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->email}}</td>
                        <td>
                        <a href="{{route('Admin-customers.show',$cat->id)}}" class="btn btn-sm btn-primary">Reset Password</a>
                   
                       </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
    {{ $customers->links() }}
    </div>
</div>
</div>

@endsection