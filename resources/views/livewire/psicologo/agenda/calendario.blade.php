<div>

    <div class="flex flex-wrap justify-evenly py-2 px-4 mt-2">
        <div class="order-2 md:order-1 m-auto">
            @if($viewMode == 1)
                <span class="text-lg font-bold text-primary">{{$months[$month-1]}}</span>
            @elseif($viewMode == 2)
                <span class="text-lg font-bold text-primary">
                                {{($betweenMonths != 0 ? $months[($month == 0 ? 11 : $month-1)].'-'.$months[$month == 12 ? 0 : $month]: $months[$month-1])}}
                            </span>
            @endif

            <span class="ml-1 text-lg text-primary font-normal">{{$year}}</span>
        </div>
        <div class="rounded-lg px-1 order-1 md:order-2" style="padding-top: 2px;">
            <select wire:model.lazy="viewMode"
                    class="focus:outline-none focus:bg-primary bg-primary border border-gray-300  leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center text-lg font-bold text-primary shadow px-4 py-2">
                <option value="1">Mês</option>
                <option value="2">Semana</option>
            </select>
            <button
                    type="button"
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 focus:outline-none  items-center text-lg font-bold text-primary shadow px-4 py-2 border border-gray-300"
                    wire:click="today">
                Hoje
            </button>
        </div>
        <div class="rounded-lg px-1 order-3 md:order-3" style="padding-top: 2px;">
            <button
                    type="button"
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center"
                    wire:click="prevMonth">
                <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <div class="border-r inline-flex h-6"></div>
            <button
                    type="button"
                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1"
                    wire:click="nextMonth">
                <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

    <div wire:loading.class="animate-pulse" class="-mx-1 -mb-1 p-2 ">
        <div class="grid grid-cols-{{$viewMode == 1 ? '7' : '8'}} divide-gray-400 select-none">
            @if($viewMode != 1)
                <div class="px-2 py-2"></div>
            @endif
            @foreach($days as $day)
                <div class="px-2 py-2">
                    <div
                            class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center">
                        {{$day}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-{{$viewMode == 1 ? '7' : '8'}} border divide-x">
            @if($viewMode != 1)
                <div class="grid gap-2 mt-10 p-2">
                    @for($i = 0 ; $i <= 23 ; $i++)
                        <div class="h-20 flex">
                            <div class="text-gray-500 text-xl uppercase tracking-wide text-center">{{($i < 10 ? '0' : '').$i.':00'}}</div>
                        </div>
                    @endfor
                </div>
            @endif

            @foreach($daysList as $weekDay => $days)
                <div class="grid  divide-y {{$viewMode == 1 ? 'grid-rows-6' : ''}} overflow-hidden {{( $month == now()->month and $year == now()->year and now()->weekOfYear == $week and $days[0]['day'] == now()->day) ? 'bg-theme' : ''}}">
                    @foreach($days as $dayIndex => $day)
                        @if($viewMode != 1)
                            <div class="justify-end text-end p-2 text-primary ">{{$day['day']}}</div>
                            @for($i = 0 ; $i <= 23 ; $i++)
                                <div class="h-20 text-xl flex divide-x">
                                    <div class="flex flex-wrap overflow-y-hidden">
                                        <div class="flex flex-wrap overflow-y-hidden">
                                            <div class="flex-wrap m-auto p-2 flex">
                                                @if(isset($day['events']["$i"]))
                                                    @foreach($day['events']["$i"] as $index => $event)
                                                        <div wire:key="{{$event['id'].$event['cliente_id']}}"
                                                             wire:click="openDetails('{{$event['id']}}',{{isset($event['recorrencia']) ? 'true' : 'false'}})"
                                                             class="p-1 {{isset($event['recorrencia']) ? 'bg-menu' : 'bg-green-500'}} cursor-pointer duration-100 ease-in-out h-full inline-flex items-center justify-center leading-none rounded text-center text-menu text-xs transition truncate">
                                                            {{$event['hora_inicio'].' - '.$event['hora_final'] }}
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @else

                            <div class="cursor-pointer h-32  flex divide-x {{($day['day'] == now()->day and $month == now()->month and $year == now()->year) ? 'text-xl bg-theme' : ''}}">
                                <div class="flex flex-wrap w-full p-1 justify-start overflow-hidden">
                                    <div class="justify-start md:text-lg text-center text-start text-xs {{($viewMode == 1 and $day['firstDay'] == false) ?  'text-gray-500' : 'text-primary'}}">{{$day['day']}}</div>
                                    <div class="w-full h-full">
                                        @isset($day['events'])
                                            @foreach($day['events'] as $index => $event)
                                                <div wire:click="openDetails('{{$event['id']}}',{{isset($event['recorrencia']) ? 'true' : 'false'}})"
                                                     class="p-1 {{isset($event['recorrencia']) ? 'text-primary' : 'text-green-200 bg-green-500'}} cursor-pointer  inline-flex items-center justify-center leading-nonetext-center text-xs transition truncate">
                                                    {{$event['hora_inicio'].' - '.$event['hora_final'] }}
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>

</div>