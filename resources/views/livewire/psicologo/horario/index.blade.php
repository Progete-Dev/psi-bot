<div>
    @component('partials.card')
        @slot('class','mx-4 bg-primary border border-gray-300')
        @slot('cardTitle','Horários')
        <div class="flex-wrap md:grid md:grid-cols-7" id="horarios">
            @foreach(['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'] as $diaSemana)
                <div class="p-1">
                    <div class="flex items-baseline">
                        <h1 class="text-md text-primary mr-2">{{$diaSemana}} </h1>
                    </div>
                    @if(isset($horarios[$diaSemana]))
                        @foreach($horarios[$diaSemana] as $horario)
                            <div wire:click="openHorarioInfo({{$horario['id']}})" class="flex px-2 py-2 m-1 border text-primary text-xs cursor-pointer hover:bg-theme">
                                {{\Carbon\Carbon::parse($horario['hora_inicio'])->format('H:i')}} - {{\Carbon\Carbon::parse($horario['hora_final'])->format('H:i')}}
                            </div>
                        @endforeach
                    @endif

                </div>

            @endforeach
        </div>
        <h1 class="text-primary text-xl leading-5 py-2 mt-3 border-b border-gray-300 font-bold ">Novo Horário</h1>
        <form wire:submit.prevent="novoHorario" method="POST">
            @csrf
            <div class="mt-8 flex-wrap md:flex justify-between items-end ">
                <div class="md:flex  flex-wrap px-4 gap-2 justify-between w-full mb-4 md:mb-0">
                    <div class="w-full {{$errors->has('diasSemana') ? 'border border-red-500 rounded' : ''}}">
                        <label class="text-primary p-2 font-medium ">
                            Dia Semana
                        </label>
                        <div class="grid grid-cols-2  px-4 w-full">
                            <div class="flex flex-col">
                                <div class="items-center flex">
                                    <input wire:model.lazy="diasSemana.domingo" id="dia_semana_dom" type="checkbox">
                                    <label for="dia_semana_dom" class="mx-2 leading-6 text-primary font-light" >Domingo</label>
                                </div>
                                <div class="items-center flex">
                                    <input wire:model.lazy="diasSemana.segunda" id="dia_semana_seg" type="checkbox">
                                    <label for="dia_semana_seg" class="mx-2 leading-6 text-primary font-light" >Segunda</label>
                                </div>
                                <div class="items-center flex">
                                    <input wire:model.lazy="diasSemana.terca" id="dia_semana_ter" type="checkbox">
                                    <label for="dia_semana_ter" class="mx-2 leading-6 text-primary font-light" >Terça</label>
                                </div>
                                <div class="items-center flex">
                                    <input wire:model.lazy="diasSemana.quarta" id="dia_semana_qua" type="checkbox">
                                    <label for="dia_semana_qua" class="mx-2 leading-6 text-primary font-light" >Quarta</label>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="items-center flex">
                                    <input wire:model.lazy="diasSemana.quinta" id="dia_semana_qui" type="checkbox">
                                    <label for="dia_semana_qui" class="mx-2 leading-6 text-primary font-light" >Quinta</label>
                                </div>
                                <div class="items-center flex">
                                    <input wire:model.lazy="diasSemana.sexta" id="dia_semana_sex" type="checkbox">
                                    <label for="dia_semana_sex" class="mx-2 leading-6 text-primary font-light" >Sexta</label>
                                </div>
                                <div class="items-center flex">
                                    <input wire:model.lazy="diasSemana.sabado" id="dia_semana_sab" type="checkbox">
                                    <label for="dia_semana_sab" class="mx-2 leading-6 text-primary font-light" >Sábado</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <label class="text-primary p-2 font-medium">
                            Hora inicio
                        </label>
                        <div class="-mt-px flex {{$errors->has('horaInicial') or $errors->has('minutoInicial') ? 'border border-red-500 rounded' : ''}}">
                            <div class="w-1/2 flex-1 min-w-0">
                                <select wire:model.lazy="horaInicio" class="{{$errors->has('horaInicio') ? 'border border-red-500 rounded' : ''}} appearance-none focus:outline-none px-4 py-2 bg-secondary text-primary w-full" >
                                    @for($i= 0; $i <= 22 ; $i++)
                                        <option value="{{$i}}" {{$i == $horaInicio ? 'selected' : ''}}>{{$i < 10 ? '0'.$i : $i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="-ml-px flex-1 min-w-0">
                                <select wire:model.lazy="minutoInicio" class="{{$errors->has('minutoInicio') ? 'border border-red-500 rounded' : ''}} appearance-none focus:outline-none px-4 py-2 bg-secondary text-primary w-full">
                                    @for($i= 0; $i <= 59 ; $i++)
                                        <option value="{{$i}}" {{$i == $minutoInicio ? 'selected' : ''}}>{{$i < 10 ? '0'.$i : $i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <label class="text-primary p-2 font-medium ">
                            Hora Final
                        </label>
                        <div class="-mt-px flex {{$errors->has('horaFinal') ? 'border border-red-500 rounded' : ''}}">
                            <div class="w-1/2 flex-1 min-w-0">
                                <select wire:model.lazy="horaFinal" class=" appearance-none focus:outline-none px-4 py-2 bg-secondary text-primary w-full" >
                                    @for($i= $horaInicio; $i < 23 ; $i++)
                                        <option {{$i == $horaFinal ? 'selected' : ''}} value="{{$i}}">{{$i < 10 ? '0'.$i : $i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="-ml-px flex-1 min-w-0">
                                <select wire:model.lazy="minutoFinal" class="appearance-none focus:outline-none px-4 py-2 bg-secondary text-primary w-full">
                                    @for($i= 0; $i < 59 ; $i++)
                                        <option value="{{$i}}" {{$i == $minutoFinal ? 'selected' : ''}}>{{$i < 10 ? '0'.$i : $i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-end mt-2">
                    <button type="submit" class="flex bg-button hover:bg-gray-700 text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2">
                        Novo Horário
                    </button>
                </div>

            </div>
        </form>
        @if($errors->any())
            <div class="mt-2 ">
                @include('shared.alerts.error')
            </div>
        @endif
    @endcomponent
    @if($openInfo)
        <div x-data="{ open: false }" x-init="setTimeout(()=> open=true,250)"  class="fixed inset-0 overflow-hidden z-10">
            <div class="absolute inset-0 overflow-hidden">
                <div x-show="open"  wire:click="closeHorarioInfo" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
                    <div class="w-screen max-w-md" x-description="Slide-over panel, show/hide based on slide-over state." x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                        <div class="h-full flex flex-col space-y-6 pb-16 pt-6 md:pb-3 md:pt-6 bg-primary shadow-xl overflow-y-scroll">
                            <header class="px-4 sm:px-6">
                                <div class="flex items-start justify-between space-x-3">
                                    <h2 class="text-lg leading-7 font-medium text-secondary">
                                        Horário {{$dias[$this->horario->dia_semana]}} : {{Carbon\Carbon::createFromTimeString($this->horario->hora_inicio)->format('H:i')}} - {{Carbon\Carbon::createFromTimeString($this->horario->hora_final)->format('H:i')}}
                                    </h2>
                                    <div class="h-7 flex items-center">
                                        <button wire:click="closeHorarioInfo" aria-label="Close panel" class="text-primary hover:text-secondary transition ease-in-out duration-150">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </header>
                            <div class="relative flex-col px-4 sm:px-6">
                                @if($this->horario->eventos->count() > 0)
                                    <h1 class="p-2 mb-2 text-primary text-xl font-medium">Eventos</h1>
                                    @foreach($this->horario->eventos as $evento)
                                        <div class="p-2 m-1 border border-gray-300 rounded-md {{$evento->status > 1 ? 'opacity-50'  : ''}}">
                                            <div class="px-4 py-4 sm:px-6">
                                                <div class="flex-col flex-wrap items-center justify-between">
                                                    <div class="text-sm leading-5 font-medium text-primary truncate">
                                                        De {{\Carbon\Carbon::createFromTimeString($evento->inicio)->format('d/m/Y ')}}
                                                    </div>
                                                    <div class="text-sm leading-5 font-medium text-primary truncate">
                                                        Até {{\Carbon\Carbon::createFromTimeString($evento->final)->format('d/m/Y')}}
                                                    </div>
                                                </div>
                                                <div class="mt-2 sm:flex sm:justify-between">
                                                    <div class="sm:flex">
                                                        <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                                            </svg>
                                                            {{$evento->cliente->nome}} ({{$evento->cliente->email}})
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="p-2 m-1 border border-gray-300 text-secondary font-light rounded-md">
                                        não existe eventos para o horário
                                    </div>
                                @endif
                                @if($this->horario->solicitacoes->count() > 0)
                                    <h1 class="p-2 mb-2 text-primary text-xl font-medium">Solicitações</h1>
                                    @foreach($this->horario->solicitacoes as $evento)
                                        <div class="p-2 m-1 border border-gray-300 rounded-md {{$evento->status > 1 ? 'opacity-50' : '' }}">
                                            <div class="px-4 py-4 sm:px-6">
                                                <div class="flex-col flex-wrap items-center justify-between">
                                                    <div class="text-sm leading-5 font-medium text-primary truncate">
                                                        Data: {{\Carbon\Carbon::createFromTimeString($evento->data_agendada)->format('d/m/Y ')}}
                                                    </div>
                                                </div>
                                                <div class="mt-2 sm:flex sm:justify-between">
                                                    <div class="sm:flex">
                                                        <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                                            </svg>
                                                            {{$evento->cliente->nome}} ({{$evento->cliente->email}})
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="p-2 m-1 border border-gray-300 text-secondary font-light rounded-md">
                                        não exite solicitações para o horário
                                    </div>
                                @endif
                            </div>
                            <div class="mt-8 flex justify-end">
                                <button wire:click="deleteHorario" type="button" class="flex  hover:border-red-500 hover:bg-gray-200 text-red-500 font-semibold  border border-red-500 rounded-lg shadow-sm px-2 py-2 mx-2">
                                    Excluir Horário
                                </button>
                                <button wire:click="editHorario" type="button" class="flex bg-theme hover:bg-secondary text-primary font-semibold  border border-gray-600 rounded-lg shadow-sm px-2 py-2 mx-2">
                                    Editar Horário
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif
</div>