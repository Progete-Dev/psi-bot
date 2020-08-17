@extends('layouts.app')
@section("title", "Perfil ". Auth::user()->name)
@section('content')
@include('partials.page_header')
  <livewire:perfil-psicologo ></livewire:perfil-psicologo>
@endsection