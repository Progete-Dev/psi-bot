<div>
    <button wire:click="newEvent" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-button shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
        Test
    </button>
    @if(auth()->user()->googleAuth == null)
        <a href="{{$this->googleUrl}}" class="m-4 px-4 py-2 border border-gray-300 bg-button text-primary rounded-md ">Integrar ao Google Calendário</a>
    @endif
    <livewire:psicologo.agenda.calendario :events="$events" key="{{auth()->user()->id}}"/>
    @if($openModal)
    <div x-data="{ open: false }" x-init="setTimeout(()=> open=true,250)"  class="fixed inset-0 overflow-hidden z-10">
        <div class="absolute inset-0 overflow-hidden">
            <div x-show="open"  wire:click="closeDetails" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
                <div class="w-screen max-w-md" x-description="Slide-over panel, show/hide based on slide-over state." x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                    <div class="h-full flex flex-col space-y-6 pb-16 pt-6 md:pb-3 md:pt-6 bg-white shadow-xl overflow-y-scroll">
                        <header class="px-4 sm:px-6">
                            <div class="flex items-start justify-between space-x-3">
                                <h2 class="text-lg leading-7 font-medium text-gray-900">
                                    Detalhes {{$solicitacao ? 'Atendimento' : 'Solicitação'}}
                                </h2>
                                <div class="h-7 flex items-center">
                                    <button wire:click="closeDetails" aria-label="Close panel" class="text-gray-400 hover:text-gray-500 transition ease-in-out duration-150">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </header>
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
                                                    <dt class=" leading-5 font-medium text-gray-500">
                                                        Data
                                                    </dt>
                                                    <dd class="p-2  leading-5 text-gray-900 ">
                                                        {{\Carbon\Carbon::parse($this->atendimento->data_agendada)->format('d/m/y')}}
                                                    </dd>
                                                </dl>
                                            </li>
                                            <li class="mt-1 ">
                                                <dl>
                                                    <dt class=" leading-5 font-medium text-gray-500">
                                                        Hora
                                                    </dt>
                                                    <dd class="p-2  leading-5 text-gray-900 ">
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
                                                    <dt class=" leading-5 font-medium text-gray-500">
                                                        Nome
                                                    </dt>
                                                    <dd class="p-2  leading-5 text-gray-900 ">
                                                        {{$this->atendimento->cliente->nome}}
                                                    </dd>
                                                </dl>
                                            </li>
                                            <li class="mt-1 ">
                                                <dl>
                                                    <dt class=" leading-5 font-medium text-gray-500">
                                                        Email
                                                    </dt>
                                                    <dd class="p-2  leading-5 text-gray-900 ">
                                                        {{$this->atendimento->cliente->email}}
                                                    </dd>
                                                </dl>
                                            </li>
                                        </ul>
                                    </div>
                                    <dl>
                                        <dt class=" leading-5 font-medium text-gray-500">
                                            Motivo
                                        </dt>
                                        <dd class="text-sm leading-5 text-gray-900 sm:col-span-2">
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
                    </div>
                </div>
            </section>
        </div>
    </div>

    @endif
</div>