@extends('layouts.app')
@section('title','Dashboard')
@section('content')

@include('partials.page_header')
<div class="antialiased sans-serif ">
    <div class="mx-auto container px-4">
@component('partials.card')
    @slot('class','bg-primary px-4 py-2 border border-gray-300 mx-auto  container')
    <h3 class="text-lg leading-6 font-medium text-primary">
        Solicitações
    </h3>
    <livewire:psicologo.agenda.eventos-list :events="$solicitacoes" action="open-solicitacoes-modal"></livewire:psicologo.agenda.eventos-list>
    <h3 class="text-lg leading-6 font-medium text-primary">
        Atendimentos
    </h3>
    <livewire:psicologo.agenda.eventos-list :events="$atendimentos" action="open-atendimentos-modal"></livewire:psicologo.agenda.eventos-list>
@endcomponent
    </div>
</div>
<div class="antialiased sans-serif ">
    <div class="container mx-auto px-4">
    @component('partials.card')
        @slot('class','bg-primary')
            <livewire:psicologo.agenda.agenda :events="$events" ></livewire:psicologo.agenda.agenda>
    @endcomponent
    </div>
</div>
@endsection
