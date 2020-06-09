@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('partials.page_header')
    
<div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-3">
<div class="col-span-1">
    @component('partials.card')
        <div class="flex justify-start break-word">
            <div class="text-xl font-medium text-primary    flex border-r px-4 ">
                Solicitações de atendimento 
                </div>
                
                <div class="px-4 text-3xl  font-semibold text-primary    flex">
                {{$solicitacoes->count()}} 
                </div>
            
        </div>
        
        <div class=" md:flex pb-4 overflow-y-auto  border-t border-gray-300">
            <a href="#" class="m-auto cursor-pointer">
                <svg class="m-auto h-4 w-4 text-secondary group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                    <path class="heroicon-ui" d="M5.41 11H21a1 1 0 0 1 0 2H5.41l5.3 5.3a1 1 0 0 1-1.42 1.4l-7-7a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.42 1.4L5.4 11z"></path>
                    </svg>
            </a>
            <ul style="max-height: 400px; min-height: auto; " class="flex overflow-y-auto">
                @foreach($solicitacoes as $atendimento)
                <div x-data="{open : false}" class="px-2">
                    <div  style="background-color: rgba(0, 0, 0, 0.8)" class="fixed overflow-auto  z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="open">
                        <div class="p-4 max-w-3xl mx-auto relative absolute left-0 right-0 overflow-auto mt-10">
                            <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-primary text-gray-500 hover:text-primary  inline-flex items-center justify-center cursor-pointer"
                                x-on:click="open = !open">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                                </svg>
                            </div>
            
                            <div class="shadow w-full rounded-lg bg-secondary overflow-hidden w-full block p-8">
                                
                                <h2 class="font-bold text-2xl mb-6 text-primary  border-b pb-2">Detalhes Solicitação</h2>
                                @foreach($atendimento->cliente->formularios as $formulario)
                                    @component('partials.card')
                                        @slot('cardTitle')
                                            {{$formulario->titulo}}
                                        @endslot
                                        
                                        <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
                                            @foreach($formulario->campos as $campo)
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm leading-5 font-medium text-gray-500">
                                                        {{$campo->nome}}
                                                    </dt>
                                                    <dd class="mt-1 text-sm leading-5 text-secondary">
                                                        
                                                        {{$campo->resposta($atendimento->cliente->id)->resposta ?? ' '}}
                                                    </dd>
                                                </div>
                                            @endforeach
                                        </dl>
                                            
                                    @endcomponent
                                @endforeach
            
                                {!! $atendimento->motivo  !!}
            
                                <div class="mt-8 flex justify-end">
                                    <button x-on:click="open=false" type="button" class="flex bg-button hover:text-secondary hover:bg-menu text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2"">
                                        Fechar
                                    </button>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="cursor: pointer" class="focus:outline-none transition duration-150 ease-in-out hover:bg-primary rounded-md border border-indigo-300 shadow my-1">
                        <div class="flex items-center py-4 px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="min-w-0 flex-1 px-4 "  >
                            <div x-on:click="open = true">
                            <div class="text-md leading-5 font-medium text-primary    truncate">{{$atendimento->cliente->name}}</div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                {{-- <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" clip-rule="evenodd"/>
                                </svg> --}}
                                <div class="text-sm leading-5 text-gray-500">
                                <spam class="block">Data solicitada para atendimento</spam>
                                <div class="pt-2">
                                    <time class="text-sm leading-5 text-gray-500 pt-2" datetime="{{$atendimento->data_atendimento != null ? $atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}">{{$atendimento->data_atendimento != null ? $atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}</time>
                                </div>
                                </div>
                            </div>
                            <div class="text-sm leading-5 text-gray-500">
                                <span class="">{{$atendimento->cliente->atendimentos->count()}}º atendimento</span>
                            </div>
                        </div>
                            <div class="flex">
                                    <button type="button" class="flex bg-secondary hover:bg-secondary0 hover:text-button text-secondary rounded-md shadow-sm p-2 m-auto ">
                                        Remanejar
                                    </button>	
                                    <form action="{{route('psicologo.confirmar_solicitacao',['solicitacao' => $atendimento]) }}">
                                        <button type="submit" class="flex bg-button hover:bg-menu hover:text-secondary text-button rounded-md shadow-sm p-2 m-auto md:my-2">
                                            Confirmar
                                        </button>	
                                    </form>
                                
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </li>
                @break
                @endforeach
            </ul>
            <a href="#" class="m-auto cursor-pointer">
                <svg class="m-auto h-4 w-4 text-secondary group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                    <path class="heroicon-ui" d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"/>
                    </svg>
            </a>
        </div>
        <div class="flex justify-center w-full">
            @for($i =0 ; $i < $solicitacoes->count() ; $i++ )
            <div class="bg-button rounded-full w-3 h-3 mx-2"></div>   
            @endfor
            
        </div>            
    @endcomponent
</div>
<div class="col-span-1">
@component('partials.card')
    <div class="flex justify-start">
        <div class="text-xl font-medium text-primary    flex border-r px-4 ">
            Atendimentos do dia 
            {{now()->format('m/d/Y')}} 
            </div>
            
            <dd class="px-4 text-3xl  font-semibold text-primary    flex">
            {{$atendimentosDia->count()}} 
            </dd>
        
    </div>
    @livewire('card-atendimentos')
       
@endcomponent
</div>
<div class="col-span-1">
@component('partials.card')
    <div class="flex justify-start ">
        <div class="text-xl font-medium text-primary    flex border-r px-4 ">
            Notificações e Lembretes
        </div>
        
        <dd class="px-4 text-3xl  font-semibold text-primary    flex">
        {{$atendimentosDia->count()}} 
        </dd>
        
    </div>     
    @livewire('card-notificacoes')    
@endcomponent
</div>
</div>
@endsection