@extends('layouts.app')
@section('title','Atendimentos')
@section('content')
    @include('partials.page_header')
    <livewire:psicologo.atendimento.atendimento-list></livewire:psicologo.atendimento.atendimento-list>
@endsection