@extends('layouts.app')
@section('title','Cliente')
@section('content')
    <livewire:psicologo.cliente.cliente-view :cliente-id="$cliente"></livewire:psicologo.cliente.cliente-view>
@endsection