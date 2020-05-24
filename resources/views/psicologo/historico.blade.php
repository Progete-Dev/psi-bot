@extends('layouts.app')
@section('title', 'Historico do Cliente')
@section('content')

@include('partials.page_header')

@component('partials.card')
    @slot('cardTitle')
        Informações básicas
    @endslot
    <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
            <dt class="text-sm leading-5 font-medium text-gray-500">
                Nome completo
            </dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                {{$usuario->name}}
            </dd>
        </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Nome social
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->namesocial}}
                </dd>
            </div>
            {{-- <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Sexo
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->namesocial}}
                </dd>
            </div> --}}
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Data de Nascimento:
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->datanascimento}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Formação Escolar Básica
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->formacaobasica}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Telefone
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->telefone}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Email
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->email}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Estado civil
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->estadocivil}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Possui filhos?
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->possuifilhos}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Cidade de Origem
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->naturalidade}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Endereço atual
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->endereco}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Composição da moradia origem
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->composicaoorigem}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Composição da moradia de atual
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->composicaoatual}}
                </dd>
            </div>
            
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Em casos de emergência ligar para:
                </dt>
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Nome
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->composicaoatual}}
                </dd>
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Telefone
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->composicaoatual}}
                </dd>
            </div>
        
@endcomponent
@component('partials.card')
    @slot('cardTitle')
        Informações Acadêmicas
    @endslot
        <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
            
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Estudante da UFC
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->estudante}} {{--booleano --}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Curso
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->curso}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Semestre de Ingresso
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->ingresso}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Semestre atual
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->semestreatual}}
                </dd>
            </div>
            
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Forma de Ingresso
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->formaingresso}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                Cotas
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->cotas}}
                </dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Cursos concluídos ou em Andamento
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900">
                    {{$usuario->cursoextra}}
                </dd>
            </div>
        </dl>    
                  

@endcomponent

    @component('partials.card')
        @slot('cardTitle')
            Vínculo com UFC
        @endslot
            <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">                
                <div class="sm:col-span-1">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Auxilio
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900">
                        {{$usuario->assistidoae}}
                    </dd>
                    <div class="sm:col-span-1">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Inicio Auxilio
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900">
                            {{$usuario->inicioauxilio}}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Fim Auxílio
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900">
                            {{$usuario->fimauxilio}}
                        </dd>
                    </div>
                </div>        
                <div class="flex -mx-2">
                    <div class="w-1/3 px-2">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Bolsa
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900">
                            {{$usuario->bolsa}}
                        </dd>
                        <div class="sm:col-span-1">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Inicio da Bolsa
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                {{$usuario->iniciobolsa}}
                            </dd>
                        </div>
                        
                        <div class="sm:col-span-1">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                            Fim Bolsa
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                {{$usuario->fimbolsa}}
                            </dd>
                        
                        </div>
                        
                    </div> 
                
                
            </dl>
@endcomponent

    @component('partials.card')
        @slot('cardTitle')
            Forma de Ingresso no Serviço de Psicologia
        @endslot
            <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Encaminhado por
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900">
                        {{$usuario->encaminhadopor}}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Forma de Encaminhamento
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900">
                        {{$usuario->formaecaminhamento}}
                    </dd>
                </div>
                
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                    
                    <div class="w-0 flex-1 flex items-center">
                        
                        <span class="ml-2 flex-1 w-0 truncate">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Descrição sucinta do por que está buscando o Serviço de Psicologia
                            </dt>
                            <textarea class="resize border rounded focus:outline-none focus:shadow-outline w-full"></textarea>
                        </span>
                    </div>
                    
                </li>
            </dl>

    @endcomponent

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
                        <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                Gerar planilha com dados.
                            </a>
                        </div>
                    </li>
                    
                </ul>
            </dd>
    @endcomponent
                
               
@endsection
