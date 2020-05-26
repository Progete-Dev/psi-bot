@extends('layouts.app')
@section('title', 'Histórico de Atendimentos')
@section('content')
@include('partials.page_header')

    <div x-data="{searchValue : ''}" class="bg-white shadow overflow-hidden sm:rounded-md">
        <div class="flex m-4 bg-indigo-200 rounded-md align-baseline">
            <div class="pl-2 mr-2 mt-1">
                <svg class="fill-current   text-gray-700 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                </svg>
            </div>
            <input
                x-model.debounce.500="searchValue"
                class="w-full rounded-md bg-indigo-200 text-gray-700 leading-tight focus:outline-none py-2 px-2"
                id="search" type="text" 
                placeholder="Search">
        </div>
        <ul class="p-4">
            
            @foreach ($atendimentos as $atendimento)
        <li x-show="$refs[{{$atendimento->id}}].innerText.toLowerCase().search(searchValue.toLowerCase()) != -1" class="border rounded-md my-2 shadow-md bg-gray-50 border-indigo-300 hover:bg-gray-100">
            <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
            
                <div class="px-4 py-4 sm:px-6">
                <div class="flex items-center justify-between">
                <div x-ref="{{$atendimento->id}}" class="leading-4 text-xl text-indigo-800 ">
                    {{$atendimento->cliente->name}}
                </div>
                <div x-data="{show:false}"  x-on:click.away="show=false" class="ml-2 flex-shrink-0 flex">
            
                        <a href="#"  class="flex">
                            <svg x-on:click="show=true" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm8 2a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm8 2a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            
                          </a>              
                          <div x-show="show" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                            <div class="rounded-md bg-white shadow-xs">
                              <div class="py-1">
                              <a href="{{route('psicologo.historicoCliente', $atendimento->cliente->id)}}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Ver Histórico</a>
                                <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Iniciar Atendimento</a>
                                <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Remarcar Atendimento</a>
                                <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Cancelar Atendimento</a>
                                <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Remanejar Atendimento</a>
                                
                              </div>
                            </div>
                          </div>
                </div>
                </div>
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
    </div>
@endsection