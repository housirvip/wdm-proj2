<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Mijares - @yield('title')</title>
    <link rel="stylesheet" href="css/app.css">
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
</head>
<body>
@section('navbar')
    <nav class="navbar navbar-expand-lg" id="navbar">
        <img src="{{ asset('images/logo.png') }}" alt="">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Semblanza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Centro Augusto Mijares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event') }}">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Equipo</a>
                </li>
            </ul>
            @auth
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">UserCenter</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
            @guest
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </div>
            @endguest
        </div>
    </nav>
@show
<div class="container">
    @yield('content')
</div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
