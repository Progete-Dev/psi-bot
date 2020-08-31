<div>
    @push('styles')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    @endpush
    @push('head-script')
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    @endpush
    @push('body-script')
        <script>
            function initDatePicker(){
                return {

                    attributes(field,minDate){
                        let data = minDate.split('/');
                        return {
                            minDate: new Date(data[2],parseInt(data[1])-1,data[0]) ,
                            field : field,
                            disableDayFn(date){
                                let datas = @json($horariosDiaSemana);
                                let options = {  weekday: 'long'};
                                let day =date.toLocaleTimeString('en-us', options).split(' ')[0];

                                return ! datas.includes(day);
                            },
                            i18n: {
                                numberOfMonths : 2,
                                previousMonth : 'Proximo',
                                nextMonth     : 'Anterior',
                                months        : ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                                weekdays      : ['Domingo','Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
                                weekdaysShort : ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab']
                            },
                            format: 'D/M/YYYY',
                            toString(date, format) {
                                // you should do formatting based on the passed format,
                                // but we will just return 'D/M/YYYY' for simplicity
                                const day = date.getDate();
                                const month = date.getMonth() + 1;
                                const year = date.getFullYear();
                                return `${day}/${month}/${year}`;
                            },
                            parse(dateString, format) {
                                // dateString is the result of `toString` method
                                const parts = dateString.split('/');
                                const day = parseInt(parts[0], 10);
                                const month = parseInt(parts[1], 10) - 1;
                                const year = parseInt(parts[2], 10);
                                return new Date(year, month, day);
                            }
                        };
                    }
                }
            }
        </script>
    @endpush
    <div class="flex justify-end p-2 ">
        <button wire:click="openForm" type="button" class="flex bg-theme hover:bg-secondary text-primary font-semibold  border border-gray-600 rounded-lg shadow-sm px-2 py-2 mx-2">
            Novo Atendimento
        </button>
    </div>
    @if($open)
        <x-side-over wire:click="closeForm">
            <x-slot name="title">
                Novo Atendimento
            </x-slot>
            <form wire:submit.prevent="novoAtendimento" method="POST">
            <div class="relative flex-1 px-4 sm:px-6">
                <div>
                    @csrf
                    <div class="px-4 pt-5 pb-5 sm:px-0 sm:pt-0">
                        <div class="sm:gap-4 my-2">
                            <div class="border-b text-md font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                                Cliente
                            </div>
                            <ul class="flex flex-wrap justify-between m-auto gap-3">
                                <select wire:model.lazy="cliente" class="focus:outline-none px-4 py-2 bg-secondary text-primary w-full" >
                                    <option>Selecione um Cliente</option>
                                    @foreach(auth()->user()->clientes() as $c)
                                        <option {{$c->id == $cliente ? 'selected' : ''}} value="{{$c->id}}">{{$c->nome}}</option>
                                    @endforeach
                                </select>
                            </ul>
                        </div>
                        @if($cliente != null)
                        <div class="sm:gap-4 my-2">
                            <div class="border-b text-md font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                                Data
                            </div>
                            <ul class="flex flex-wrap justify-between m-auto gap-3">
                                <x:date-picker wire:model.lazy="data_inicio"  type="date" class="w-full mt-2 rounded shadow focus:outline-none text-primary px-4 py-3 bg-white "  min="{{now()->addDay()->format('Y-m-d')}}"/>
                            </ul>
                        </div>
                        @endif
                        @if($data_inicio != null)
                        <div class="sm:gap-4 my-2">
                            <div class="border-b text-md font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                                Horario
                            </div>
                            <ul class="flex flex-wrap justify-between m-auto gap-3">
                                <select wire:model.lazy="horario" class="focus:outline-none px-4 py-2 bg-secondary text-primary w-full" >
                                    <option>{{count($horarios) > 0 ?'Selecione um Horario' : 'Sem horarios para esta Data' }}</option>
                                    @foreach($horarios as $h)
                                        <option {{$h->id == $horario ? 'selected' : ''}} value="{{$h->id}}">{{\Carbon\Carbon::createFromTimeString($h->hora_inicio)->format('H:i')}} - {{\Carbon\Carbon::createFromTimeString($h->hora_final)->format('H:i')}}</option>
                                    @endforeach
                                </select>
                            </ul>
                        </div>
                        <div class="sm:gap-4 my-2">
                            <div class="border-b text-md font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                                Recorrência
                            </div>
                            <ul class="flex flex-wrap justify-between m-auto gap-3">
                                @if($horario != null)
                                <li class="w-full p-2">
                                    <select wire:model.lazy="tipo" class="focus:outline-none px-4 py-2 bg-secondary text-primary w-full" >
                                        <option>Selecione o tipo de Recorrência</option>
                                        <option value="-1"> Sem Recorrência</option>
                                        <option value="7">Semanal</option>
                                        <option value="14">Quinzenal</option>
                                    </select>
                                </li>
                                @endif
                                @if($tipo > 0)
                                <li>
                                    <label for="quantidade" class="text-primary font-medium leading-5 p-2">
                                        Informe a data do ultimo Atendimento
                                    </label>
                                    <x:date-picker :min-date="$data_inicio" wire:model.lazy="data_final"  type="date" class="w-full mt-2 rounded shadow focus:outline-none text-primary px-4 py-3 bg-white "  min="{{now()->addDay()->format('Y-m-d')}}"/>
                                </li>

                                @endif
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
                <div class="mt-8 flex justify-end">
                    <button wire:click="closeForm" type="button" class="flex  hover:border-red-500 hover:bg-gray-200 text-red-500 font-semibold  border border-red-500 rounded-lg shadow-sm px-2 py-2 mx-2">
                        Cancelar
                    </button>
                    <button type="submit" class="flex bg-theme hover:bg-secondary text-primary font-semibold  border border-gray-600 rounded-lg shadow-sm px-2 py-2 mx-2">
                        Criar Atendimento
                    </button>
                </div>
            </form>
        </x-side-over>
    @endif
</div>
