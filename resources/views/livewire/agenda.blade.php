<div>
    <button wire:click="newEvent" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-button shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
        Test
    </button>
    @if(auth()->user()->googleAuth == null)
        <a href="{{$this->googleUrl}}" class="m-4 px-4 py-2 border border-gray-300 bg-button text-primary rounded-md ">Integrar ao Google Calendário</a>
    @endif
    <livewire:calendario :events="$events"/>
    @if($openModal)
    <div x-cloak x-data="{ open: false, event: [] }" x-show="open" x-init="setTimeout(()=>{open=true},150);" class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
        <div x-show="open" x-description="Background overlay, show/hide based on modal state." x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="open" x-description="Modal panel, show/hide based on modal state." x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Detalhes Evento
                        </h3>
                        @if($this->atendimento != null)
                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500">
                                {{$this->atendimento->id}}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click="deleteEvent" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-button text-base leading-6 font-medium text-button shadow-sm hover:bg-button-hover focus:outline-none focus:border-gray-300 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Remanejar
          </button>
          <button wire:click="closeDetails" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-button text-base leading-6 font-medium text-button shadow-sm hover:bg-button-hover focus:outline-none focus:border-gray-300 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Ver Atendimento
          </button>
        </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
          <button wire:click="closeDetails" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-button shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Fechar
          </button>
        </span>
            </div>
        </div>
    </div>
    @endif
</div>
