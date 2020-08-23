@extends('layouts.app')
@section('title','Clientes')
@section('content')
    @include('partials.page_header')
    <livewire:psicologo.cliente.cliente-list></livewire:psicologo.cliente.cliente-list>
@endsection