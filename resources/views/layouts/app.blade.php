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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Tuba Tubi
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <div class="container">
            <div class="row py-3 justify-content-center">
                @if(Auth::check())
                <div class="col-lg-3">
                    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                        <div class="position-sticky">
                           <div class="list-group list-group-flush">
                              <a
                                 href="{{route('admin.dashboard')}}"
                                 class="list-group-item list-group-item-action py-2 ripple @if(request()->url() == route('admin.dashboard')) {{'active'}} @else {{''}} @endif "
                                 aria-current="true"
                                 >
                              <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Home</span>
                              </a>
                              <a
                                 href="{{route('admin.post.index')}}"
                                 class="list-group-item list-group-item-action py-2 ripple @if(request()->url() == route('admin.post.index')) {{'active'}} @else {{''}} @endif "
                                 aria-current="true"
                                 >
                              <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>All Posts</span>
                              </a>
                              <a
                                 href="{{route('admin.post.create')}}"
                                 class="list-group-item list-group-item-action py-2 ripple @if(request()->url() == route('admin.post.create')) {{'active'}} @else {{''}} @endif "
                                 aria-current="true"
                                 >
                              <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Create New Post</span>
                              </a>
                              <a
                                 href="{{route('admin.category.index')}}"
                                 class="list-group-item list-group-item-action py-2 ripple
                                 @if(request()->url() == route('admin.category.index')) {{'active'}} @else {{''}} @endif
                                 "
                                 >
                              <i class="fas fa-chart-area fa-fw me-3"></i
                                 ><span>All Categories</span>
                              </a>
                              <a
                                 href="{{route('admin.category.create')}}"
                                 class="list-group-item list-group-item-action py-2 ripple
                                 @if(request()->url() == route('admin.category.create')) {{'active'}} @else {{''}} @endif
                                 "
                                 >
                              <i class="fas fa-chart-area fa-fw me-3"></i
                                 ><span>Create New Category</span>
                              </a>
                              <a
                                 href="{{route('admin.tag.index')}}"
                                 class="list-group-item list-group-item-action py-2 ripple
                                 @if(request()->url() == route('admin.tag.index')) {{'active'}} @else {{''}} @endif
                                 "
                                 >
                              <i class="fas fa-chart-area fa-fw me-3"></i
                                 ><span>All Tags</span>
                              </a>
                              <a
                                 href="{{route('admin.tag.create')}}"
                                 class="list-group-item list-group-item-action py-2 ripple
                                 @if(request()->url() == route('admin.tag.create')) {{'active'}} @else {{''}} @endif
                                 "
                                 >
                              <i class="fas fa-chart-area fa-fw me-3"></i
                                 ><span>Create New Tag</span>
                              </a>
                              @if(Auth::user()->admin)
                              <a
                                 href="{{route('admin.user.index')}}"
                                 class="list-group-item list-group-item-action py-2 ripple
                                 @if(request()->url() == route('admin.user.index')) {{'active'}} @else {{''}} @endif
                                 "
                                 >
                              <i class="fas fa-chart-area fa-fw me-3"></i
                                 ><span>All Users</span>
                              </a>
                              <a
                                 href="{{route('admin.user.create')}}"
                                 class="list-group-item list-group-item-action py-2 ripple
                                 @if(request()->url() == route('admin.user.create')) {{'active'}} @else {{''}} @endif
                                 "
                                 >
                              <i class="fas fa-chart-area fa-fw me-3"></i
                                 ><span>Create New Users</span>
                              </a>
                              @endif
                              <a
                              href="{{route('admin.user.profile')}}"
                              class="list-group-item list-group-item-action py-2 ripple
                              @if(request()->url() == route('admin.user.profile')) {{'active'}} @else {{''}} @endif
                              "
                              >
                           <i class="fas fa-chart-area fa-fw me-3"></i
                              ><span>My Profile</span>
                           </a>
                           @if(Auth::user()->admin)
                              <a
                              href="{{route('admin.settings')}}"
                              class="list-group-item list-group-item-action py-2 ripple
                              @if(request()->url() == route('admin.settings')) {{'active'}} @else {{''}} @endif
                              "
                              >
                           <i class="fas fa-chart-area fa-fw me-3"></i
                              ><span>Site Setting</span>
                           </a>
                           @endif
                              
                           </div>
                        </div>
                     </nav>
                </div>
                @endif

                <div class="col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    @yield('js')
</body>
</html>
