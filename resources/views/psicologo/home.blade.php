@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('partials.page_header')
    
<div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-3">
<div class="col-span-1">
    @component('partials.card')
        <div class="flex justify-start break-word mb-4">
            <div class="text-xl font-medium text-primary    flex border-r px-3">
                Solicitações de atendimento 
                </div>
                
                <div class="px-4 text-3xl  font-semibold text-primary    flex">
                {{$solicitacoes->count()}} 
                </div>
            
        </div>
        @livewire('card-slider',['ids' => $solicitacoes->map(function($solicitacao){ return $solicitacao->id;})->toArray(),'card'=>'solicitacoes'])
        
    @endcomponent
</div>
<div class="col-span-1">
@component('partials.card')
    <div class="flex justify-start">
        <div class="text-xl font-medium text-primary    flex border-r px-4 mb-4 ">
            Atendimentos do dia 
            {{now()->format('m/d/Y')}} 
            </div>
            
            <dd class="px-4 text-3xl  font-semibold text-primary    flex">
            {{$atendimentosDia->count()}} 
            </dd>
        
    </div>
    @livewire('card-slider',['ids' => $atendimentosDia->map(function($atendimento){ return $atendimento->id;})->toArray(),'card'=>'atendimentos'])
@endcomponent
</div>
<div class="col-span-1">
@component('partials.card')
    <div class="flex justify-start ">
        <div class="text-xl font-medium text-primary    flex border-r px-4 ">
            Notificações e Lembretes
        </div>
        
        <dd class="px-4 text-3xl  font-semibold text-primary    flex">
        {{$notificacoes->count()}} 
        </dd>
    </div>     
    @livewire('card-slider',['ids' => $notificacoes->map(function($notificacao){ return $notificacao->notificacao;})->toArray(),'card'=>'notificacoes'])
    
@endcomponent
</div>
</div>
@endsection