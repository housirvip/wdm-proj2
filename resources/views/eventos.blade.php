@extends('layouts.app')

@section('title', 'Eventos')
@section('navbar')
    @parent
@endsection

@section('content')
    <p>{{$event}}</p>
@endsection
