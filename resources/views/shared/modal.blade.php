<div x-data="{open : false}" class="px-2">
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
                <h2 class="font-bold text-2xl mb-6 text-primary  border-b pb-2">Detalhes Solicitação - {{$this->atendimento->cliente->name}}</h2>
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
                    <button @click="open=false" type="button" class="flex bg-button hover:text-secondary hover:bg-menu text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2"">
                    Fechar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>