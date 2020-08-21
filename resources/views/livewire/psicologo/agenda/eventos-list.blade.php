<div>
    <ul class="flex justify-start overflow-x-scroll p-2 w-full mb-2">
        @foreach($events as $horario)
            <li wire:click="dispatchEventAction('{{$horario['id']}}')"  class="block hover:bg-secondary focus:outline-none focus:bg-secondary transition duration-150 ease-in-out bg-primary border border-gray-300 m-2 rounded-md">
                <div class="px-4 py-4 sm:px-6">
                    <div class="flex-col flex-wrap items-center justify-between">
                        @if(isset($horario['data_agendada']))
                        <div class="text-sm leading-5 font-medium text-primary truncate">
                            Data :{{\Carbon\Carbon::createFromTimeString($horario['data_agendada'])->format('d/m/Y')}}
                        </div>
                        <div class="text-sm leading-5 font-medium text-primary truncate">
                            Horário :{{\Carbon\Carbon::createFromTimeString($horario['hora_inicio'])->format('H:i')}} - {{\Carbon\Carbon::createFromTimeString($horario['hora_final'])->format('H:i')}}
                        </div>
                        @else
                            <div class="text-sm leading-5 font-medium text-primary truncate">
                            De {{\Carbon\Carbon::createFromTimeString($horario['inicio'])->format('d/m/Y ')}}
                            </div>
                            <div class="text-sm leading-5 font-medium text-primary truncate">
                                Até {{\Carbon\Carbon::createFromTimeString($horario['final'])->format('d/m/Y')}}
                            </div>
                            <div class="text-sm leading-5 font-medium text-primary truncate">
                            Horário {{\Carbon\Carbon::createFromTimeString($horario['hora_inicio'])->format('H:i')}} - {{\Carbon\Carbon::createFromTimeString($horario['hora_final'])->format('H:i')}}
                            </div>
                        @endif
                    </div>
                    <div class="mt-2 sm:flex sm:justify-between">
                        <div class="sm:flex">
                            <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                </svg>
                                {{$horario['cliente']['nome']}} ({{$horario['cliente']['email']}})
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>