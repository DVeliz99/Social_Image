<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{asset('css/stylesConfig.css') }}">
    <link rel="stylesheet" href="{{asset('css/stylesNav.css') }}">
    <link rel="stylesheet" href="{{asset('css/stylesHome.css') }}">
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body >



    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm ">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item ">
                            <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else


                        <!-- enlaces agregados al navbar -->

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link  mx-2 ">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link  mx-2">{{ __('People') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link  mx-2">{{ __('Favorites') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('image.create') }}" class="nav-link  mx-2">{{ __('New Post') }}</a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link  mx-2">@include('includes.avatar')</a>
                        </li>

                        <li class="nav-item dropdown bg-white rounded-2 mx-2 ">
                            <a id="navbarDropdown text-black" class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>



                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a id=" " class="nav-link dropdown-item text-black" href="#">
                                    {{ __('Profile') }}
                                </a>

                                <a id=" " class="nav-link dropdown-item text-black" href="{{ route('config') }}">
                                    {{ __('Settings') }}
                                </a>
                                <a class="nav-link dropdown-item text-black" href="{{ route('logout') }}"
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
            @yield('content')
        </main>
    </div>
</body>

</html>