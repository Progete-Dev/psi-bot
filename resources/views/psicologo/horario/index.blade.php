@extends('layouts.app')
@section('title','Meus Horários')
@section('content')
    @include('partials.page_header')
    <livewire:psicologo.horario.horarios-psicologo></livewire:psicologo.horario.horarios-psicologo>
@endsection