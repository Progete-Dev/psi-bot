@if(count($ids) > 0)
<div style="height: 200px;" class="flex">
        <div style="cursor: pointer; transition: ease-in-out" class="focus:outline-none transition duration-150 ease-in-out hover:bg-primary rounded-md border border-indigo-300 shadow my-1">
            <div class="flex items-center py-4 px-6">
            <div class="min-w-0 flex-1 flex items-center">
                <div class="min-w-0 flex-1 px-4">
                <div @click="open = true">
                <div class="text-md leading-5 font-medium text-primary    truncate">{{$this->atendimento->cliente->name}}</div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                    {{-- <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" clip-rule="evenodd"/>
                    </svg> --}}
                    <div class="text-sm leading-5 text-gray-500">
                    <spam class="block">Data solicitada</spam>
                    <div class="pt-2">
                        <time class="text-sm leading-5 text-gray-500 pt-2" datetime="{{$this->atendimento->data_atendimento != null ? $this->atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}">{{$this->atendimento->data_atendimento != null ? $this->atendimento->data_atendimento->format('d/m/Y - H:m') : 'A Definir'}}</time>
                    </div>
                    </div>
                </div>
                <div class="text-sm leading-5 text-gray-500">
                    <span class="">{{$this->atendimento->cliente->atendimentos->count()}}º atendimento</span>
                </div>
            </div>
                <div class="flex">
                        <button type="button" class="flex bg-secondary hover:bg-menu hover:text-button text-secondary rounded-md shadow-sm p-2 m-auto ">
                            Remanejar
                        </button>	
                        <form action="{{route('psicologo.confirmar_solicitacao',['solicitacao' => $this->atendimento]) }}">
                            <button type="submit" class="flex bg-button hover:bg-menu hover:text-secondary text-button rounded-md shadow-sm p-2 m-auto md:my-2">
                                Confirmar
                            </button>	
                        </form>
                    
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endif