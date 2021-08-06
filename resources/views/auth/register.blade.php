@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

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
                    <div class="form-group">
                            
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ __('register') }}
                            </button>                              
                        
                    </div>
                    <div class="form-group col-md-6">
                        @if (Route::has('login'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __("already got an account?") }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
