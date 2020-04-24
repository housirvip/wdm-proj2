@extends('layouts.app')

@section('title', 'Proyectos')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="content" id="wrapper">
        @foreach($projects as $project)
            <div class="row">
                <div class="col-sm-3" style="text-align: right">
                    <img src="{{ asset('images/logo.png') }}" alt="" width="80px" height="80px">
                </div>
                <div class="col-sm-9">
                    <h2>
                        <p3>Proejct{{$project->id}}</p3>
                        {{$project->title}}
                    </h2>
                </div>
            </div>
            <br>
            <div class="row" id="row{{$project->id}}" style="max-height: 400px;overflow: hidden">
                <div class="col-lg-6" style="text-align: center">
                    @if($project->image_url1 != null)
                        <img src="{{$project->image_url1}}" style="max-width: 80%">
                    @endif
                    @if($project->image_url2 != null)
                        <img src="{{$project->image_url2}}" style="max-width: 80%">
                    @endif
                </div>
                <div class="col-lg-6">
                    <h3>{{$project->subtitle}}</h3>
                    <p>
                        {{$project->content}}
                    </p>
                </div>
            </div>
            <script type="text/javascript">
                wrapperElement = document.getElementById("wrapper");
                divElement = document.getElementById("row{{$project->id}}");
                if(window.getComputedStyle(divElement).getPropertyValue('height') === "400px") {
                    leerMarsDiv = document.createElement("div");
                    leerMarsDiv.id = "leerMars{{$project->id}}";
                    leerMarsDiv.className = "leerMars";
                    leerMarsButton = document.createElement("button");
                    leerMarsButton.innerText = "Leer Mars";
                    leerMarsButton.onclick = function () {
                        divElement = document.getElementById("row{{$project->id}}");
                        divElement.style.maxHeight = "10000px";
                        divElement.style.overflow = "visible";
                        leerMarsDiv = document.getElementById("leerMars{{$project->id}}")
                        wrapperElement.removeChild(leerMarsDiv);
                    };
                    leerMarsDiv.appendChild(leerMarsButton);

                    const leerMarsText = document.createElement("p3");
                    leerMarsText.innerText = " <- You can click it to read full information!";
                    leerMarsText.style.fontStyle = "italic";
                    leerMarsDiv.appendChild(leerMarsText);
                    wrapperElement.appendChild(leerMarsDiv);
                }
            </script>
            <hr>
        @endforeach
    </div>
@endsection
