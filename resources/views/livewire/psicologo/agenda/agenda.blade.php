<div>
    @component('partials.card')
        @slot('cardHeader')
            <div class="w-full flex justify-end mt-2">
                <livewire:psicologo.atendimento.novo-atendimento></livewire:psicologo.atendimento.novo-atendimento>
            </div>
        @endslot
        @slot('class','bg-primary px-4 py-2 border border-gray-300 mx-auto  container')
        <h3 class="text-lg leading-6 font-medium text-primary">
            Solicitações
        </h3>
        <livewire:psicologo.agenda.eventos-list :events="$solicitacoes" action="open-solicitacoes-modal"></livewire:psicologo.agenda.eventos-list>
        <h3 class="text-lg leading-6 font-medium text-primary">
            Atendimentos
        </h3>
        <livewire:psicologo.agenda.eventos-list :events="$atendimentos" action="open-atendimentos-modal"></livewire:psicologo.agenda.eventos-list>
    @endcomponent
    <div class="antialiased sans-serif ">
        <div class="container mx-auto px-4">
            @component('partials.card')
                @slot('class','bg-primary')
                @if(auth()->user()->googleAuth == null)
                    <a href="{{$this->googleUrl}}" class="m-4 px-4 py-2 border border-gray-300 bg-button text-button rounded-md hover:bg-secondary hover:text-secondary ">Integrar ao Google Calendário</a>
                @endif
                <livewire:psicologo.agenda.calendario  key="{{auth()->user()->id}}"/>
            @endcomponent
        </div>
    </div>
    @if($openModal)
        <x-side-over  wire:click="closeDetails">
            <x-slot name="title">
                Detalhes {{$solicitacao ? 'Atendimento' : 'Solicitação'}}
            </x-slot>
            <div class="relative flex-1 px-4 sm:px-6">
                <div>
                    <div class="px-4 pt-5 pb-5 sm:px-0 sm:pt-0">
                        <div class="sm:gap-4 my-2">
                            <div class="border-b text-md font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                                Horário
                            </div>
                            <ul class="flex flex-wrap justify-between m-auto gap-3">
                                <li class="mt-1 ">
                                    <dl>
                                        <dt class="leading-5 font-medium text-secondary">
                                            Data
                                        </dt>
                                        <dd class="p-2  leading-5 text-secondary ">
                                            {{$dia < 10 ? '0'.$dia : $dia}}/{{$mes < 10 ? '0'.$mes : $mes}}/{{$ano}}
                                        </dd>
                                    </dl>
                                </li>
                                <li class="mt-1 ">
                                    <dl>
                                        <dt class=" leading-5 font-medium text-secondary">
                                            Hora
                                        </dt>
                                        <dd class="p-2  leading-5 text-secondary">
                                            {{\Carbon\Carbon::createFromTimeString($this->atendimento->horario->hora_inicio)->format('H:i')}} - {{\Carbon\Carbon::createFromTimeString($this->atendimento->horario->hora_final)->format('H:i')}}
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                        <div class="sm:gap-4 my-2">
                            <div class="border-b text-md font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                                Cliente
                            </div>
                            <ul class="flex flex-wrap justify-between m-auto gap-3">
                                <li class="mt-1 ">
                                    <dl>
                                        <dt class=" leading-5 font-medium text-secondary">
                                            Nome
                                        </dt>
                                        <dd class="p-2  leading-5 text-secondary ">
                                            {{$this->atendimento->cliente->nome}}
                                        </dd>
                                    </dl>
                                </li>
                                <li class="mt-1 ">
                                    <dl>
                                        <dt class=" leading-5 font-medium text-secondary">
                                            Email
                                        </dt>
                                        <dd class="p-2  leading-5 text-secondary ">
                                            {{$this->atendimento->cliente->email}}
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                        <dl>
                            <dt class=" leading-5 font-medium text-secondary">
                                Motivo
                            </dt>
                            <dd class="text-sm leading-5 text-secondary sm:col-span-2">
                                <p>
                                    {{$this->atendimento->cliente->motivo}}
                                </p>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
            @if($solicitacao == false)
                <div class="mt-8 flex justify-end">
                    <button wire:click="closeDetails" type="button" class="flex  hover:border-red-500 hover:bg-gray-200 text-red-500 font-semibold  border border-red-500 rounded-lg shadow-sm px-2 py-2 mx-2">
                        Rejeitar Solicitação
                    </button>
                    <button wire:click="confirmarSolicitacao" type="button" class="flex bg-theme hover:bg-secondary text-primary font-semibold  border border-gray-600 rounded-lg shadow-sm px-2 py-2 mx-2">
                        Aceitar Solicitação
                    </button>
                </div>
            @endif
        </x-side-over>
    @endif
</div>