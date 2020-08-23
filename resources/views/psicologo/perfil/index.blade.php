@extends('layouts.app')
@section("title", "Perfil ". Auth::user()->name)
@section('content')
@include('partials.page_header')
  <livewire:psicologo.perfil.perfil-psicologo ></livewire:psicologo.perfil.perfil-psicologo>
@endsection