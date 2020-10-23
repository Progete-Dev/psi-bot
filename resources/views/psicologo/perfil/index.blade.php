@extends('layouts.app')
@section("title", "Perfil ". Auth::user()->name)
@section('content')
  <livewire:psicologo.perfil.perfil-psicologo ></livewire:psicologo.perfil.perfil-psicologo>
@endsection