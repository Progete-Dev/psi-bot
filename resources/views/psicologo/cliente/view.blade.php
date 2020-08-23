@extends('layouts.app')
@section('title','Cliente')
@section('content')
    @include('partials.page_header')
    <livewire:psicologo.cliente.cliente-view :cliente-id="$cliente"></livewire:psicologo.cliente.cliente-view>
@endsection