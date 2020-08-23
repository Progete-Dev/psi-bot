@extends('layouts.app')
@section('title','Atendimento')
@section('content')
    @include('partials.page_header')
    <livewire:psicologo.atendimento.atendimentos-view></livewire:psicologo.atendimento.atendimentos-view>
@endsection