@extends('layouts.app')

@section('title', 'Home')

@section('content')
@include('partials.page_header')
@if(count($notificacoes) > 0)
<div class="p-2">
<div class="w-full p-2 m-2 bg-indigo-600 items-center text-indigo-100 leading-none rounded-md flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">{{count($notificacoes)}}</span>
    <span class="font-semibold mr-2 text-left flex-auto">
        <a href="{{route('psicologo.solicitacoesAtendimento')}}">
            Existem novas solicitacoes de atendimento. Clique aqui para ver
        </a>
    </span>
    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
</div>
</div>
@endif
<div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
    <div class="col-span-1">
        @component('partials.card')
            <div class="flex justify-start">
                <div class="text-xl font-medium text-indigo-600 flex border-r ">
                Atendimentos do dia 
                {{now()->format('m/d/Y')}} 
                </div>
                
                <dd class="pl-8 text-3xl  font-semibold text-indigo-600 flex">
                {{$atendimentosDia->count()}} 
                </dd>
                
            </div>
            <div class="flex justify-start">
                
                
                
            </div>
            
        @endcomponent
    </div>
    <div class="col-span-2">
@component('partials.card')
    @slot('cardHeader')
        <div class="mt-5 grid grid-cols-2 sm:grid-cols-2 border-b pb-3 border-gray-300">
            <div class="flex ml-4">
                <h3 class="flex text-lg leading-6 font-medium text-indigo-600">
                Lembretes
                </h3>
            </div>
            <div class="flex  justify-end">
                <button type="button" class="flex bg-indigo-800 hover:bg-indigo-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 mx-2">
                    Definir Lembrete
                </button>	
            </div>
        </div>
    
    @endslot
    <dl>
        
    </dl>
@endcomponent
    

</div>
</div>
<div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
@component('partials.card')
    @slot('cardHeader')
    <div class="flex p-4 border-b border-gray-300">
        <h3 class="flex text-lg leading-6 font-medium text-indigo-600">
        Solicitações
        </h3>
    </div>
    @endslot
    <ul style="max-height: 400px; min-height: auto; " class=" overflow-y-auto">
        @foreach($solicitacoes as $atendimento)
            

        <li>
            <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out hover:bg-gray-200 rounded-md border border-indigo-300 shadow my-1">
                <div class="flex items-center px-2 py-4 sm:px-6">
                <div class="min-w-0 flex-1 flex items-center">
                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                    <div>
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
                    </div>
                    <div class="">
                        <div class="text-sm leading-5 text-gray-500">
                            <span class="">{{$atendimento->cliente->atendimentos->count()}}º atendimento</span>
                        </div>
                    
                    </div>
                    <div class="md:block">
                        <div class="flex w-full">
                            <button type="button" class="flex bg-gray-300 hover:bg-gray-500 hover:text-white text-gray-700 rounded-md shadow-sm p-2 mx-2 ">
                                Remanejar
                            </button>	
                            <button type="button" class="flex bg-indigo-800 hover:bg-indigo-700 text-white rounded-md shadow-sm p-2">
                                Confirmar
                            </button>	
                        </div>       
                    </div>
                    </div>
                </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
@endcomponent
@component('partials.card')
    @slot('cardHeader')
    
    <div class="flex p-4 border-b border-gray-300">
        <h3 class="flex text-lg leading-6 font-medium text-indigo-600">
        Atendimentos do Dia 
        </h3>
    </div>

    @endslot
    <ul style="max-height: 400px; min-height: auto; " class=" overflow-y-auto">
        @foreach($atendimentosDia as $atendimento)
            

        <li>
            <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out hover:bg-gray-200 rounded-md border border-indigo-300 shadow my-1">
                <div class="flex items-center px-2 py-4 sm:px-6">
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