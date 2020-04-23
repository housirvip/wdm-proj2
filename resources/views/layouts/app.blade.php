<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="../../sass/app.scss"/>
    <title>Mijares - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
<footer class="footer">
    <div class="container">
        <div class="line"></div>
        <div class="row">
            <div class="col-md-10">
                Copyright ©2020 All rights reserved | This template is made with
                <p3>❤</p3>
                by
                <p3>DiazApps</p3>
            </div>
            <div class="col-md-2">
                <img src="{{ asset('images/facebook.png') }}" alt=""/>
                <img src="{{ asset('images/twitter.png') }}" alt=""/>
                <img src="{{ asset('images/dribbble.png') }}" alt=""/>
                <img src="{{ asset('images/behance.png') }}" alt=""/>
            </div>
        </div>
        {{--        <span class="text-muted">Place sticky footer content here.</span>--}}
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
