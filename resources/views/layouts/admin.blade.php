<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/css/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/logo_new.png"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('Admin-login.index') }}"><i class="fa fa-user-circle"></i></a>
                                </li>
                            @endif
                          
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Welcome:  {{ Auth::guard('admin')->user()->name }}  
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.home')}}"><i class="fa fa-cogs" aria-hidden="true"></i>Admin</a>
                        </li>
                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('Admin-customers.index')}}"> <i class="fa fa-users"></i> Customers</a>
                        </li>
                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('Admin-users.index')}}"> <i class="fa fa-user-circle"></i> Users</a>
                        </li>
                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('Admin-rates.index')}}"> <i class="fa fa-exchange" aria-hidden="true"></i> Exchange Rates</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Products
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('Admin-category.index')}}">Categories</a>
                            <a class="dropdown-item" href="{{route('Admin-products.index')}}">Product List</a>
                            </div>
                        </li>
                       
                        <li class="nav-item">
                                    <a class="nav-link" href="{{route('Admin-currency.index')}}"><i class="fa fa-money" aria-hidden="true"></i> Currency Settings</a>
                        </li>
                      
    
    </ul>
  </div>
</nav>
        </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
