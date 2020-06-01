@extends('layouts.app')
@section('title', 'Historico do Cliente')
@section('content')

@include('partials.page_header')

@component('partials.card')
    @slot('cardTitle')
        Lista de Atendimentos - {{$usuario->name}}
    @endslot
    <ul x-data="{}" class="p-4">
            
        @foreach ($usuario->atendimentos as $atendimento)
    <li class="border rounded-md my-2 shadow-md bg-gray-50 border-indigo-300 hover:bg-gray-100">
        <a href="#"  @click="$dispatch('atendimento-modal',{atendimento : {{json_encode($atendimento)}} })" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
        
            <div class="px-4 py-4 sm:px-6">
            <div class="mt-2 sm:flex sm:justify-between">
            <div class="sm:flex">
                <span class="sm:flex lowercase inline-flex items-center p-1 rounded-md text-sm font-medium leading-5  bg-indigo-200  text-indigo-600">
                    {{$atendimento->status}}
                </span>
                
                {{-- <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                Remote 
                </div> --}}
            </div>
            <div class="mt-2 flex items-center text-sm rounded-md leading-5 text-indigo-600 sm:mt-0">
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                </svg>
                <span>
                
                <time class="ml-2" datetime="{{$atendimento->data_atendimento ? $atendimento->data_atendimento->format('d/m/Y - H:m' ) : ''}}">{{$atendimento->data_atendimento ? $atendimento->data_atendimento->format('d/m/Y - H:m' ) : 'A Definir'}}</time>
                </span>
            </div>
            </div>
        </div>
        </a>
    </li>
    @endforeach
    </ul>
@endcomponent

<div x-data="{openEventModal: false ,atendimento : null }" @atendimento-modal.window="atendimento = $event.detail.atendimento; openEventModal = true;" style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed overflow-auto  z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
    <div class="p-4 max-w-3xl mx-auto relative absolute left-0 right-0 overflow-auto mt-10">
        <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
            x-on:click="openEventModal = !openEventModal">
            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
            </svg>
        </div>

        <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
            
            <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2" x-text="'Detalhes Atendimento - ' +(new Date(atendimento.data_atendimento).toLocaleString('pt-br'))">Detalhes Atendimento</h2>
         
            <div class="mt-8 flex justify-end">
                <button type="button" class="flex bg-indigo-800 hover:bg-indigo-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2"">
                    Fechar
                </button>	
            </div>
        </div>
    </div>
</div>
@foreach($usuario->formularios as $formulario)
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
                    <dd class="mt-1 text-sm leading-5 text-gray-900">
                        
                        {{$campo->resposta($usuario->id)->resposta ?? ' '}}
                    </dd>
                </div>
            @endforeach
        </dl>
            
    @endcomponent
@endforeach

    @component('partials.card')
        @slot('cardTitle')
            Bloco de Notas
        @endslot                   
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                <ul class="rounded-md">
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                        <div class="w-0 flex-1 flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-2 flex-1 w-0 truncate">
                                <textarea class="resize border rounded focus:outline-none focus:shadow-outline w-full"></textarea>
                            </span>
                        </div>
                        
                    </li>
                    
                </ul>
            </dd>
    @endcomponent
    @component('partials.card')
    @slot('cardTitle')
        Descrição da Sessão:
    @endslot
    <div id="app">
        <dd class="mt-1 text-sm leading-5 text-gray-900">
            <ul class="rounded-md">
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">                    
                    <div class="w-0 flex-1 flex items-center">
                        <span class="ml-2 flex-1 w-0 truncate">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Horário de Inicio
                            </dt>     
                            <div class=" flex  w-auto ">
                                <div class="bg-indigo-300 flex  p-3 text-gray rounded-lg">
                                    <select name="hours" class="bg-transparent text-xl appearance-none">
                                        @for($j=0 ; $j<24; $j++)
                                            <option value="{{$j}}"> {{($j< 10 ? '0' : '').$j}} </option>
                                        @endfor
                                    </select>
                                    <span class="text-xl mr-3">:</span>
                                        <select name="minutes" class="bg-transparent text-xl appearance-none mr-4">
                                            @for($i=0 ; $i<60; $i++)
                                            <option value="{{$i}}"> {{($i< 10 ? '0' : '').$i}} </option>
                                            @endfor
                    
                                        </select>
                
                                </div>
                            </div>              
            
        
                        </span>
                    </div>

                    <div class="w-0 flex-1 flex items-center">
                        <span class="ml-2 flex-1 w-0 truncate">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Horário de fim
                            </dt>
                            <div class="flex  w-auto">
                                <div class="bg-indigo-300 flex  p-3 text-gray rounded-lg">
                                    <select name="hours" class="bg-transparent text-xl appearance-none">
                                        @for($j=0 ; $j<24; $j++)
                                        <option value="{{$j}}"> {{($j< 10 ? '0' : '').$j}} </option>
                                        @endfor
                                    </select>
                                <span class="text-xl mr-3">:</span>
                                    <select name="minutes" class="bg-transparent text-xl appearance-none mr-4">
                                        @for($i=0 ; $i<60; $i++)
                                        <option value="{{$i}}"> {{($i< 10 ? '0' : '').$i}} </option>
                                        @endfor
                                        
                                    </select>
                                
                                </div>
                            </div>              
                            
                        
                        </span>
                    </div>
                
                    
                </li>
                
                        
            </ul>
            <span class="ml-2 flex-1 w-0">
                <dt class="text-sm leading-5 font-medium text-gray-500 mb-4">
                    Descreva a sessão abaixo:
                </dt>
                <trix-editor inputId="editor1" placeholder/>
            </span>
        </dd>
    </div>
        {{-- <div class="ml-4 flex-shrink-0">
            
        </div> --}}
@endcomponent
<div class="justify-end flex">
    <button class="bg-indigo-700 hover:bg-blue-600 py-4 px-4 rounded-md font-medium text-white hover:text-white transition duration-150 ease-in-out">
        Gerar planilha com dados.
    </button>
</div>

               
@endsection
