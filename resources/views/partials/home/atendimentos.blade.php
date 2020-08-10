@if(count($ids) > 0)
            <ul style="max-height: 400px; min-height: auto; " class=" overflow-y-auto">
                <li  x-cloak  x-data="{open : false}" class="flex">
                    <div  style="cursor: pointer" class="block focus:outline-none transition duration-150 ease-in-out hover:bg-primary rounded-md border border-indigo-300 shadow my-1">
                        <div class="flex items-center px-2 py-4 sm:px-6" x-on:click="open = true">
                        <div class="min-w-0 flex-1 flex items-center">
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>   
                                        <div class="text-md leading-5 font-medium text-primary    truncate">{{$this->atendimento->cliente->name}}</div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                        {{-- <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" clip-rule="evenodd"/>
                                        </svg> --}}        
                                            <div class="text-sm leading-5 text-gray-500">
                                                <div class="pt-2">
                                                    <time class="text-sm leading-5 text-gray-500 pt-2" datetime="{{$this->atendimento->data_atendimento != null ? $this->atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}">{{$this->atendimento->data_atendimento != null ? $this->atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:block">
                                        <div class="text-sm leading-5 text-gray-500">
                                            <span class="">{{$this->atendimento->cliente->atendimentos->count()}}º atendimento</span>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            {{$this->atendimento->status == 3 ? 'Confirmando' : 'Agurarda Confirmação'}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
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
                                
                            <h2 class="font-bold text-2xl mb-6 text-primary  border-b pb-2">Detalhes do Atendimento </h2>
                                @foreach($this->atendimento->cliente->formularios as $formulario)
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
                                                        
                                                        {{$campo->resposta($this->atendimento->cliente->id)->resposta ?? ' '}}
                                                    </dd>
                                                </div>
                                            @endforeach
                                        </dl>
                                            
                                    @endcomponent
                                @endforeach
        
                                {!! $this->atendimento->motivo  !!}
        
                                <div class="mt-8 flex justify-end">
                                    <button x-on:click="open=false" type="button" class="flex bg-button hover:text-secondary hover:bg-menu text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2"">
                                        Fechar
                                    </button>	
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        @else
        <div class="text-md leading-5 mx-auto mt-4 font-medium text-secondary">Sem atendimentos</div>
        @endif