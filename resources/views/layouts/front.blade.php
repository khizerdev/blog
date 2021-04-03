<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $setting->site_name }}</title>

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
</head>
<body>
    <div id="app">
         <!-- preloader area start -->
            <div class="preloader" id="preloader">
                <div class="preloader-inner">
                    <div class="spinner">
                        <div class="dot1"></div>
                        <div class="dot2"></div>
                    </div>
                </div>
            </div>
             <!-- search popup area start -->
            <div class="search-popup" id="search-popup">
                <form action="{{route('results')}}" method="get" class="search-form">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" placeholder="Search.....">
                    </div>
                    <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
                </form>
            </div>
              <!-- //. search Popup -->
            <div class="body-overlay" id="body-overlay"></div>

             <!-- topbar end-->
            
             <div class="topbar-area topbar-area-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 align-self-center">
                            <div class="topbar-left text-md-left text-center">
                                <span>TRENDING NEWS</span>12 Sunday 2020 :    Every success is helped by someone behind the people
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-area navbar-area-2">
                <nav class="navbar navbar-expand-lg">
                    <div class="container nav-container">
                        <div class="responsive-mobile-menu">
                            <div class="logo d-lg-none d-block">
                                <a class="main-logo" href="{{route('home')}}"><img src="{{$setting->logo}}" alt="img"></a>
                            </div>
                            <button class="menu toggle-btn d-block d-lg-none" data-target="#miralax_main_menu" 
                            aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-left"></span>
                                <span class="icon-right"></span>
                            </button>
                        </div>
                        <div class="logo d-lg-block d-none">
                            <a class="main-logo" href="{{route('home')}}"><img src="
                                {{asset($setting->logo)}}" alt="img"></a>
                        </div>
                        <div class="nav-right-part nav-right-part-mobile">
                            <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                            <a class="btn btn-main" href="#">Login</a>
                            <a class="btn btn-main" href="#">Signup</a>
                        </div>
                        <div class="collapse navbar-collapse" id="miralax_main_menu">
                            <ul class="navbar-nav menu-open text-center">
                               
                                <li><a href="{{route('home')}}">Home</a></li>
                                @foreach ($allcategories as $category)
                                 <li><a href="{{route('by-category' , $category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                                <li>  <a class="search header-search" href="#">
                                    <i class="fa fa-search"></i></a></li>
                            </ul>
                        </div>
                        <div class="nav-right-part nav-right-part-desktop">
                            @if (Route::has('login'))
                            @auth
                               
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                                    Dashboard</a>
                                    </div>
                                  </div>
                            @else
                                <a class="btn btn-main" href="{{ route('login') }}">Login</a>
                                @if (Route::has('register'))
                                <a class="btn btn-main" href="{{ route('register') }}">Signup</a>
                                @endif
                            @endauth
                            @endif
                              

                            
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- navbar end -->

        <div>
            @yield('content')
        </div>

        <footer class="footer-area bg-navy">
            <div class="copyright-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 align-self-center">
                            <ul class="privacy-menu">
                                <li><a href="#">Address: {{ $setting->address }} </a></li>
                            </ul>
                        </div>
                        <div class="col-xl-4 col-lg-7 text-xl-left text-lg-right align-self-center">
                            <ul class="privacy-menu">
                                <li><a href="#">Contact No: {{ $setting->contact_no }} </a></li>
                            </ul>
                        </div>
                        <div class="col-xl-3 col-lg-12 text-xl-right align-self-center">
                            <ul class="privacy-menu">
                                <li><a href="#">Contact Email:  {{ $setting->contact_email }} </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('front/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

</body>
</html>
