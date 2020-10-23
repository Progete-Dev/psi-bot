@extends('layouts.app')

@section('content')
    @component('partials.card')
        @slot('class','mx-4 bg-primary border border-gray-300')
        <h1 class="text-2xl text-primary font-bold"> Você está offline </h1>
    @endcomponent
@endsection