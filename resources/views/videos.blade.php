@extends('layouts.app')

@section('title', 'Proyectos')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="content" id="wrapper">
        <div class="oneElementCenter">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <h2>UN ESPACIO PARA DEBATIR A PARTIR DEL VÍDEO</h2>
        </div>
        @for($i=0; $i<count($videos); $i+=3)
            <div class="row">
                @for($j=$i; $j<$i+3 && $j<count($videos); $j++)
                    <div class="col-lg-4">
                        <div class="contentBackground" style="text-align: center">
                            <iframe width="350" height="200" src="{{$videos[$j]->url}}" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            <h3>{{$videos[$j]->author}}</h3>
                            <p>{{$videos[$j]->description}}</p>
                            <p>URL: {{$videos[$j]->url}}</p>
                        </div>
                    </div>
                @endfor
            </div>
            <br>
        @endfor
    </div>
@endsection
