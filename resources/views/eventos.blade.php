@extends('layouts.app')

@section('title', 'Eventos')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="content" id="wrapper">
{{--        <p>{{$events}}</p>--}}
        @foreach($events as $event)
            <div class="row" id="row{{$event->id}}" style="max-height: 400px;overflow: hidden">
                <div class="col-lg-6">
                    <h2>
                        <p3>Event {{$event->id}}</p3>
                        {{$event->title}}
                    </h2>
                    <p>
                        {{$event->content}}
                    </p>
                </div>
                <div class="col-lg-6" style="text-align: center">
                    <img src="{{$event->image_url}}" style="max-width: 80%">
                </div>
            </div>
            <script type="text/javascript">
                wrapperElement = document.getElementById("wrapper");
                divElement = document.getElementById("row{{$event->id}}");
                if(window.getComputedStyle(divElement).getPropertyValue('height') === "400px") {
                    leerMarsDiv = document.createElement("div");
                    leerMarsDiv.id = "leerMars{{$event->id}}";
                    leerMarsDiv.className = "leerMars";
                    leerMarsButton = document.createElement("button");
                    leerMarsButton.innerText = "Leer Mars";
                    leerMarsButton.onclick = function () {
                        divElement = document.getElementById("row{{$event->id}}");
                        divElement.style.maxHeight = "10000px";
                        divElement.style.overflow = "visible";
                        leerMarsDiv = document.getElementById("leerMars{{$event->id}}")
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
