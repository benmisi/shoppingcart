@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <x-alert/>
            <div class="card">
            <div class="card-header">{{ __('Administator Login') }}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('Admin-login.store') }}">
                        @csrf
                 <x-forms.input label="Email" type="email" name="email" size="col-md-12"/>
                 <x-forms.input label="Password" type="password" name="password" size="col-md-12"/>
                 <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>                              
                            
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                       
                            </div>

                        
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection