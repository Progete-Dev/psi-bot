@extends('layouts.app')

@section('title', 'Solicitações de Atendimentos')
@section('content')
@include('partials.page_header')
    @component('partials.card')
    <div x-data="{searchValue : '', orderBy: '',order: 'ASC', open:false}">
        @include('partials.table_header',['route' => route('psicologo.solicitacoesAtendimento'),
        'orderOptions' => [
            [
                'name' => 'Data Solicitação',
                'value'=> 'created_at'
            ]
        ]
        ])    
        <ul class="p-4">
            
            @foreach ($atendimentos as $atendimento)
        <li @click="$dispatch('atendimento-modal',{atendimento : {{json_encode($atendimento)}} })" x-show="$refs[{{$atendimento->id}}].innerText.toLowerCase().search(searchValue.toLowerCase()) != -1" class="border rounded-md my-2 shadow-md bg-gray-50 border-indigo-300 hover:bg-secondary">
            <a href="#" class="block hover:bg-secondary focus:outline-none focus:bg-secondary transition duration-150 ease-in-out">
            
                <div class="px-4 py-4 sm:px-6">
                <div class="flex items-center justify-between">
                <div x-ref="{{$atendimento->id}}" class="leading-4 text-xl text-indigo-800 ">
                    {{$atendimento->cliente->name}}
                </div>
                </div>
                <div class="mt-2 sm:flex sm:justify-between">
                <div class="sm:flex">
                    <span class="sm:flex lowercase inline-flex items-center p-1 rounded-md text-sm font-medium leading-5  bg-button  text-primary   ">
                        {{$atendimento->status}}
                    </span>
                    
                    {{-- <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Remote 
                    </div> --}}
                </div>
                <div class="mt-2 flex items-center text-sm rounded-md leading-5 text-primary    sm:mt-0">
                    {{-- <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    <span>
                    
                    <time class="ml-2" datetime="{{$atendimento->data_atendimento ? $atendimento->data_atendimento->format('d/m/Y - H:m' ) : ''}}">{{$atendimento->data_atendimento ? $atendimento->data_atendimento->format('d/m/Y - H:m' ) : 'A Definir'}}</time>
                    </span> --}}
                </div>
                </div>
            </div>
            </a>
        </li>
        @endforeach
        </ul>
        <div class="p-2">
            {{$atendimentos->links()}}
        </div>
    </div>
    <div x-data="{openEventModal: false ,atendimento : null }" @atendimento-modal.window="atendimento = $event.detail.atendimento; openEventModal = true;" style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed overflow-auto  z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
        <div class="p-4 max-w-3xl mx-auto relative absolute left-0 right-0 overflow-auto mt-10">
            <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-primary text-gray-500 hover:text-primary  inline-flex items-center justify-center cursor-pointer"
                x-on:click="openEventModal = !openEventModal">
                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                </svg>
            </div>
    
            <div class="shadow w-full rounded-lg bg-secondary overflow-hidden w-full block p-8">
                
                <h2 x-show="atendimento != null" class="font-bold text-2xl mb-6 text-primary  border-b pb-2" x-text="'Detalhes Atendimento - ' +(new Date((atendimento != null ? atendimento.data_atendimento : '')).toLocaleString('pt-br'))">Detalhes Atendimento</h2>
             
                <div class="mt-8 flex justify-end">
                    <button type="button" class="flex bg-button hover:text-secondary hover:bg-menu text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2"">
                        Fechar
                    </button>	
                </div>
            </div>
        </div>
    </div>
@endcomponent
    
@endsection