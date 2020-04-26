<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Mijares - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/mijares.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
@include('partials.login')
@include('partials.register')
@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
        <img src="{{ asset('images/logo.png') }}" alt="">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('semblanza') }}">Semblanza</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cam') }}">Centro Augusto Mijares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('project')}}">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event') }}">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('video') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipo') }}">Equipo</a>
                </li>
                @guest
                    <li class="nav-item">
                        {{--                    <a class="nav-link" href="{{ route('login') }}">Inicio De Sesion</a>--}}
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Inicio De Sesion</a>
                    </li>
                    <li class="nav-item">
                        {{--                    <a class="nav-link" href="{{ route('register') }}">Registro</a>--}}
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Registro</a>
                    </li>
                @endguest
            </ul>
            @auth
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hello, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">UserCenter</a>
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
        </div>
    </nav>
@show
<div class="container-mijares">
    @yield('content')
</div>
<footer id="footer">
    <div class="container">
        <div class="row">
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col-lg-8" style="text-align: center">
                Copyright ©2020 All rights reserved | This template is made with
                <p3>❤</p3>
                by
                <p3>DiazApps</p3>
            </div>
            <div class="col-lg-4" style="text-align: center">
                <img src="{{ asset('images/footer-icon.png') }}" alt=""/>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/mijares.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
@yield('loginCheck')
@yield('registerCheck')
@yield('row-click')
</body>
</html>
