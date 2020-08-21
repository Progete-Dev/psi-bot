@extends('layouts.app')

@section('content')
@include('partials.alerts_partial')
@component('partials.card')
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        Solicitações
    </h3>
    <livewire:psicologo.agenda.eventos-list :events="$solicitacoes" action="open-solicitacoes-modal"></livewire:psicologo.agenda.eventos-list>
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        Atendimentos
    </h3>
    <livewire:psicologo.agenda.eventos-list :events="$atendimentos" action="open-atendimentos-modal"></livewire:psicologo.agenda.eventos-list>
@endcomponent
<livewire:psicologo.agenda.agenda :events="$events" ></livewire:psicologo.agenda.agenda>
@endsection

