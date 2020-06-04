@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('partials.page_header')
<div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
    <div class="col-span-1">
        @component('partials.card')
            <div class="flex justify-start">
                <div class="text-xl font-medium text-indigo-600 flex border-r px-4 ">
                    Atendimentos do dia 
                    {{now()->format('m/d/Y')}} 
                    </div>
                    
                    <dd class="px-4 text-3xl  font-semibold text-indigo-600 flex">
                    {{$atendimentosDia->count()}} 
                    </dd>
                
            </div>
            <div class="flex justify-start">
                
                
                
            </div>
            
        @endcomponent
    </div>
    <div class="col-span-1">
        @component('partials.card')
            <div class="flex justify-start break-word">
                <div class="text-xl font-medium text-indigo-600 flex border-r px-4 ">
                    Solicitações de atendimento 
                    </div>
                    
                    <div class="px-4 text-3xl  font-semibold text-indigo-600 flex">
                    {{$solicitacoes->count()}} 
                    </div>
                
            </div>
            <div class="flex justify-start">
                
                
                
            </div>
            
        @endcomponent
    </div>
    <div class="col-span-1 h-max-64 overflow-y-auto">
        @component('partials.card')
            <div class="flex justify-start ">
                <div class="text-xl font-medium text-indigo-600 flex border-r px-4 ">
                    Notificações e Lembretes
                </div>
                
                <dd class="px-4 text-3xl  font-semibold text-indigo-600 flex">
                {{$atendimentosDia->count()}} 
                </dd>
                
            </div>     
            <div class=" md:flex pb-4 overflow-y-auto  border-t border-gray-300">
                <a href="#" class="m-auto cursor-pointer">
                    <svg class="m-auto h-4 w-4 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                        <path class="heroicon-ui" d="M5.41 11H21a1 1 0 0 1 0 2H5.41l5.3 5.3a1 1 0 0 1-1.42 1.4l-7-7a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.42 1.4L5.4 11z"></path>
                      </svg>
                </a>
                                <div class=" md:mx-2 my-2 text-gray-700  font-sans quicksand bg-white overflow-hidden hover:bg-indigo-100 border hover:border-indigo-400 shadow-md rounded px-1 cursor-pointer">
                        
                        <div class="m-2 text-sm">
                            <p class="text-right text-xs">May 17, 2020</p>
                            <div class="truncate ">
                            <h2 class="font-bold text-md h-2 mb-8 ">Blog </h2>
                            </div>
                            <p class="text-xs text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.     </p>
                
                        </div>
                        <div class="justify-end mt-4 p-2 ">
                        <a class="text-indigo-400 uppercase font-bold text-sm" href="#">Read More</a>
                        </div>
                    </div>
                    <a href="#" class="m-auto cursor-pointer">
                        <svg class="m-auto h-4 w-4 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                            <path class="heroicon-ui" d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"/>
                          </svg>
                    </a>
            </div>
            <div class="flex justify-center w-full">
                <div class="bg-indigo-500 rounded-full w-3 h-3 mx-2"></div>   
                <div class="bg-indigo-500 rounded-full w-3 h-3 mx-2"></div>   
                <div class="bg-indigo-500 rounded-full w-3 h-3 mx-2"></div>   
            </div>
    </div>        
    
            
        @endcomponent
   
</div>
<div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
@component('partials.card')
    @slot('cardTitle')
        Solicitações
    @endslot
    <ul style="max-height: 400px; min-height: auto; " class=" overflow-y-auto">
        @foreach($solicitacoes as $atendimento)
        <li x-data="{open: false}">
            <div  style="background-color: rgba(0, 0, 0, 0.8)" class="fixed overflow-auto  z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="open">
                <div class="p-4 max-w-3xl mx-auto relative absolute left-0 right-0 overflow-auto mt-10">
                    <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                        x-on:click="open = !open">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                        </svg>
                    </div>

                    <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
                        
                        <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Detalhes Solicitação</h2>
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
                                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                                
                                                {{$campo->resposta($atendimento->cliente->id)->resposta ?? ' '}}
                                            </dd>
                                        </div>
                                    @endforeach
                                </dl>
                                    
                            @endcomponent
                        @endforeach

                        {!! $atendimento->motivo  !!}

                        <div class="mt-8 flex justify-end">
                            <button @click="open=false" type="button" class="flex bg-indigo-800 hover:bg-indigo-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2"">
                                Fechar
                            </button>	
                        </div>
                    </div>
                </div>
            </div>
            <div style="cursor: pointer" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out hover:bg-gray-200 rounded-md border border-indigo-300 shadow my-1">
                <div class="flex items-center px-2 py-4 sm:px-6">
                <div class="min-w-0 flex-1 flex items-center">
                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4"  >
                    <div @click="open = true">
                    <div class="text-md leading-5 font-medium text-indigo-600 truncate">{{$atendimento->cliente->name}}</div>
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
                    <div class="flex md:block">
                            <button type="button" class="flex bg-gray-300 hover:bg-gray-500 hover:text-white text-gray-700 rounded-md shadow-sm p-2 m-auto ">
                                Remanejar
                            </button>	
                            <form action="{{route('psicologo.confirmar_solicitacao',['solicitacao' => $atendimento]) }}">
                                <button type="submit" class="flex bg-indigo-800 hover:bg-indigo-700 text-white rounded-md shadow-sm p-2 m-auto md:my-2">
                                    Confirmar
                                </button>	
                            </form>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
@endcomponent
@component('partials.card')
    @slot('cardTitle')
        Atendimentos do Dia 
    @endslot
    <ul style="max-height: 400px; min-height: auto; " class=" overflow-y-auto">
        @foreach($atendimentosDia as $atendimento)
            

        <li x-data="{open : false}">
            <div  style="background-color: rgba(0, 0, 0, 0.8)" class="fixed overflow-auto  z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="open">
                <div class="p-4 max-w-3xl mx-auto relative absolute left-0 right-0 overflow-auto mt-10">
                    <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                        x-on:click="open = !open">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                        </svg>
                    </div>

                    <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
                        
                        <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Detalhes do Atendimento</h2>
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
                                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                                
                                                {{$campo->resposta($atendimento->cliente->id)->resposta ?? ' '}}
                                            </dd>
                                        </div>
                                    @endforeach
                                </dl>
                                    
                            @endcomponent
                        @endforeach

                        {!! $atendimento->motivo  !!}

                        <div class="mt-8 flex justify-end">
                            <button @click="open=false" type="button" class="flex bg-indigo-800 hover:bg-indigo-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2"">
                                Fechar
                            </button>	
                        </div>
                    </div>
                </div>
            </div>
            <div style="cursor: pointer" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out hover:bg-gray-200 rounded-md border border-indigo-300 shadow my-1">
                <div class="flex items-center px-2 py-4 sm:px-6" @click="open = true">
                <div class="min-w-0 flex-1 flex items-center">
                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                    <div>
                        <div class="text-md leading-5 font-medium text-indigo-600 truncate">{{$atendimento->cliente->name}}</div>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                        {{-- <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" clip-rule="evenodd"/>
                        </svg> --}}
                        
                        <div class="text-sm leading-5 text-gray-500">
                            <div class="pt-2">
                                <time class="text-sm leading-5 text-gray-500 pt-2" datetime="{{$atendimento->data_atendimento != null ? $atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}">{{$atendimento->data_atendimento != null ? $atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}</time>
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="md:block">
                            <div class="text-sm leading-5 text-gray-500">
                                <span class="">{{$atendimento->cliente->atendimentos->count()}}º atendimento</span>
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                {{$atendimento->status == 3 ? 'Confirmando' : 'Agurarda Confirmação'}}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div>
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
@endcomponent
</div>

@endsection