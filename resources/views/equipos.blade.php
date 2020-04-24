@extends('layouts.app')

@section('title', 'Proyectos')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="content" id="wrapper">
        <div class="oneElementCenter">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <h2>SOMOS UN EQUIPO INTERDISCIPLINARIO</h2>
        </div>
        @for($i=0; $i<count($equipos); $i+=3)
            <div class="row">
                @for($j=$i; $j<$i+3 && $j<count($equipos); $j++)
                    <div class="col-lg-4">
                        <div class="contentBackground" style="text-align: center">
                            <img src="{{$equipos[$j]->avatar}}" style="max-height: 200px; max-width: 200px">
                            <h3>{{$equipos[$j]->name}}</h3>
                            <p>{{$equipos[$j]->experience}}</p>
                            <p>URL: {{$equipos[$j]->phone}}</p>
                            <p>URL: {{$equipos[$j]->email}}</p>
                        </div>
                    </div>
                @endfor
            </div>
            <br>
        @endfor
    </div>
@endsection
