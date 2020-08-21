<div class="px-4">
    @component('partials.card')
        @slot('class','bg-red-200 border border-red-500')
        <div x-show="open">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-2xl leading-6 font-medium text-red-600" id="modal-headline">
                    Erro
                </h3>
                <div class="mt-2  text-red-800">
                    <p class="text-md leading-5">
                        Algo deu errado ao solicitar o horário selecionado, é possível que o horário não esteja mais disponível.
                    </p>
                    <p class="text-md leading-5">
                        Selecione outra data e tente novamente.
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-8 flex justify-end">
            <button wire:click="cancelar" type="button" class="flex  hover:border-red-500 hover:bg-red-200 text-red-600 font-semibold  border border-red-500 rounded-lg shadow-sm px-2 py-2 mx-2">
                Voltar
            </button>
        </div>
    @endcomponent
</div>