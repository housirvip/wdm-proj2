@extends('layouts.app')

@section('title', 'Eventos')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="content">
        <p>{{$event}}</p>
    </div>
@endsection
