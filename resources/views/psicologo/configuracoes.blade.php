@extends('layouts.app')
@section('title', 'Configurações')
@section('content')
@include('partials.page_header')
@component('partials.card')
@slot('cardTitle', "Notificações")
    

  

  
@endcomponent
@component('partials.card')
@slot('cardTitle', "Aparência")


@endcomponent
@component('partials.card')
@slot('cardTitle', "Suporte")


@endcomponent


@endsection