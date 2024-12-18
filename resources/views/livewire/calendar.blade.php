
<div>
    <div class="grid-cols-2 sm:max-w-xl divide-x-2 sm:mx-auto">
        <div class="z-20 relative bg-white sm:rounded-l p-2 shadow">
            <div class="grid grid-cols-7 grid-rows-7 gap-6">
                <div class="col-span-7 flex justify-between">
                    <div wire:click="prev"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></div>
                    <div>{{$month}}</div>
                    <div wire:click="next"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div>
                </div>
                <div class="col-span-7 flex justify-between">
                    @foreach ($weekDays as $weekDay)
                        <div>{{$weekDay}}</div>
                    @endforeach
                </div>
                @foreach($days as $index => $day)
                    <div wire:click="selectDate('{{$day->format('Y-m-d')}}')" class="{{$day->isToday() ? 'text-blue-500' : '' }} px-1 hover:bg-gray-500 rounded-full text-center">{{$day->day}}</div>
                @endforeach
            </div>
        </div>

        @if($dateSelect != null)
        <div
             x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="z-10 relative bg-white sm:rounded-r ">


            @if(count($horarios) > 0)
                <h1 class="text-lg text-primary px-2 leading-5 mt-4 border-b border-gray-300 mb-4" > {{Carbon\Carbon::parse ($dateSelect)->format('M, Y, D')}} </h1>
                <ul class=" p-2 mt-2">
                    @foreach($horarios as $horario)
                        <li wire:click="$emitUp('selecionaHorario',{{$horario->id}},'{{$dateSelect}}')"  class="block hover:bg-secondary focus:outline-none focus:bg-secondary transition duration-150 ease-in-out bg-white border border-gray-300 m-2 rounded-md">
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
        </div>
        @endif

    </div>
</div>
