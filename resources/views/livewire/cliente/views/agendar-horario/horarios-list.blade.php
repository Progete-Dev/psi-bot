
@if(count($horarios) > 0)
<h1 class="text-lg text-primary px-2 leading-5 mt-4 border-b border-gray-300 mb-4" >Selecione um Horário</h1>
<ul class=" p-2 mt-2">
        @foreach($horarios as $horario)
            <li wire:click="selecionaHorario({{$horario->id}})"  class="block hover:bg-secondary focus:outline-none focus:bg-secondary transition duration-150 ease-in-out bg-white border border-gray-300 m-2 rounded-md">
                <div class="px-4 py-4 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                            Horário : {{\Carbon\Carbon::createFromTimeString($horario->hora_inicio)->format('H:i')}} - {{\Carbon\Carbon::createFromTimeString($horario->hora_final)->format('H:i')}}
                        </div>
                    </div>
                    <div class="mt-2 sm:flex sm:justify-between">
                        <div class="sm:flex">
                            <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                </svg>
                                {{$horario->psicologo->nome}} ({{$horario->psicologo->crp}})
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                {{$horario->psicologo->especialidade}}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
    @endforeach
</ul>

@else
    <h1  class="text-lg text-primary px-2 leading-5 mt-4 border-b border-gray-300 mb-4" >Sem horários para a data, escolha outra data</h1>
@endif