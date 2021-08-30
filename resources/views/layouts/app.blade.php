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
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/logo_new.png"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                   
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="ml-auto d-flex">
                   
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="https://itsac.co.zw">Main website</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Courses Categores
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">

                            @forelse ($categorylist as $category )
                            <li><a class="dropdown-item" href="{{route('shop.category',$category->id)}}">{{$category->name}}</a></li> 
                            @empty
                                
                            @endforelse
                           
                            </ul>
                        </li>
                        
                       
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-circle"></i> My Account</a>
                                </li>
                            @endif
                          
                        @else
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('shop.index') }}">View Shop</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}  {{ Auth::user()->surname }}
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
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('Cart.index')}}">
                                <i class="fa fa-5 fa-shopping-cart" aria-hidden="true"></i>
                                <span class="badge badge-danger" style="float:right;margin-bottom:-15px;margin-left:4px;font-size:10px">{{Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="mb-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <div class="row mt-4">
            <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-md-3">
                <div class="logo">ITSAC</div>
                <div class="footer_about_text">
                ITSAC is a global leader in the provision of Professional, Corporate and Individual training on IT audit, information & cyber security, project management, among others
                </div>
            </div>
            <div class="col-md-3">
            <div class="footer_column_title">Useful Links</div>
             <ul class="text-left">
                 <li class="footer_about_text">Certifications</li>
                 <li class="footer_about_text">Other Courses</li>
                 <li class="footer_about_text">Become a Trainer</li>
                 <li class="footer_about_text">Resources</li>
                 <li class="footer_about_text">Events</li>
             </ul>
            </div>
            <div class="col-md-3">
            <div class="footer_column_title">Head Quarters</div>
                <ul>
                    <li class="footer_contact_item">                      
                        149 Purley Close, Marlborough, Harare, Zimbabwe
                    </li>
                    <li class="footer_contact_item">                      
                        +263 242 300 898
                    </li>
                    <li class="footer_contact_item">                      
                       infor@itsac.co.zw
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
            <div class="footer_column_title">Rest of Africa</div>
             <ul>
                 <li class="footer_contact_item"> 20 Central Avenue, Kempton Park, Gauteng, 1619, South Africa</li>
                 <li class="footer_contact_item"> +27 662 081 679</li>
                 <li class="footer_contact_item"> roa@itsac.co.zw</li>
                
             </ul>
            </div>
        </div>
</div>
</div>
    </footer>
</body>
</html>
