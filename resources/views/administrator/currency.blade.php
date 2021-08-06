@extends('layouts.admin')

@section('content')
<div class="container">
  
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Currency</li>
  </ol>
</nav>
<x-alert/>
<div class="card">
    <div class="card-header d-flex justify-content-between">
       <div> Currency List</div>
       <x-administrator.add-currency/>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($currency as $current )
                    <tr>
                        <td>{{$current->name}}</td>
                        <td>{{$current->status}}</td>
                        <td class="d-flex justify-content-end">
                        <a href="{{route('Admin-currency.show',$current->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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