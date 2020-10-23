<div>
        @component('partials.card')
            @slot('class','mx-4 bg-primary border border-gray-300')
            @slot('cardTitle')
                Lista de Atendimentos - {{$usuario->name}}
            @endslot
            <ul x-data="{}" class="p-4">

                @foreach ($usuario->atendimentos as $atendimento)
                    <li class="border rounded-md my-2 shadow-md bg-gray-50 border-indigo-300 hover:bg-secondary">
                        <a href="#"  @click="$dispatch('atendimento-modal',{atendimento : {{json_encode($atendimento)}} })" class="block hover:bg-secondary focus:outline-none focus:bg-secondary transition duration-150 ease-in-out">

                            <div class="px-4 py-4 sm:px-6">
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
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-secondary" fill="currentColor" viewBox="0 0 20 20">
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
        @foreach($usuario->formularios as $formulario)
            @component('partials.card')
                @slot('class','mx-4 bg-primary border border-gray-300')
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

                                {{$campo->resposta($usuario->id)->resposta ?? ' '}}
                            </dd>
                        </div>
                    @endforeach
                </dl>

            @endcomponent
        @endforeach

        @component('partials.card')
            @slot('class','mx-4 bg-primary border border-gray-300')
            @slot('cardTitle')
                Bloco de Notas
            @endslot
            <dd class="mt-1 text-sm leading-5 text-secondary">
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
            @slot('class','mx-4 bg-primary border border-gray-300')
            @slot('cardTitle')
                Descrição da Sessão:
            @endslot
            <div id="app">
                <dd class="mt-1 text-sm leading-5 text-secondary">
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
                <trix inputId="editor1" placeholder/>
            </span>
            </dd>
</div>
@endcomponent
<div class="justify-end flex">
    <button class="text-secondary hover:bg-blue-600 py-4 px-4 rounded-md font-medium text-button hover:text-button transition duration-150 ease-in-out">
        Gerar planilha com dados.
    </button>
</div>
</div>
