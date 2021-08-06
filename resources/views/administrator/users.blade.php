@extends('layouts.admin')

@section('content')
<div class="container">
  
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
  </ol>
</nav>
<x-alert/>
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Users</div>
       <x-administrator.add-user/>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user )
                    <tr>
                        <td>{{$user->name}}{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->status}}</td>
                        <td class="text-right">
                             @if ($user->id != Auth::guard('admin')->user()->id)
                               @if ($user->status =='ACTIVE')
                               <a href="{{route('Admin-users.show',$user->id)}}" class="btn btn-sm btn-danger">Block</a>
                            
                               @else
                               <a href="{{route('Admin-users.edit',$user->id)}}" class="btn btn-sm btn-success">Unblock</a>
                            
                               @endif
                             
                             @endif
                              </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection