@extends('layouts.app')
@section('title','Dashboard')
@section('content')

@include('partials.page_header')
@component('partials.card')
    @slot('class','bg-primary px-4 py-2 border border-gray-300 mx-4 ')
    <h3 class="text-lg leading-6 font-medium text-primary">
        Solicitações
    </h3>
    <livewire:psicologo.agenda.eventos-list :events="$solicitacoes" action="open-solicitacoes-modal"></livewire:psicologo.agenda.eventos-list>
    <h3 class="text-lg leading-6 font-medium text-primary">
        Atendimentos
    </h3>
    <livewire:psicologo.agenda.eventos-list :events="$atendimentos" action="open-atendimentos-modal"></livewire:psicologo.agenda.eventos-list>
@endcomponent
<livewire:psicologo.agenda.agenda :events="$events" ></livewire:psicologo.agenda.agenda>
@endsection

