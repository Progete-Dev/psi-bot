@extends('layouts.app')

@section('title', 'Lista de Clientes')
@section('content')

    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul>
            
            @foreach ($usuarios as $usuario)
                
            
        <li>
            <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
            
                <div class="px-4 py-4 sm:px-6">
                <div class="flex items-center justify-between">
                    
                <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                    {{$usuario->name}}
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
                              <a href="{{route('psicologo.historicoCliente', $usuario->id)}}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900">Ver Histórico</a>
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
                    <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                    Encaminhamento
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Remote {{-- Remote/presencial  --}}
                    </div>
                </div>
                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    <span>
                    Agendado para
                    <time datetime="2020-01-07">January 7, 2020</time>
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