<div class="px-4">
    @component('partials.card')
        @slot('class','bg-green-200 border border-green-500')
        <div x-show="open">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-2xl leading-6 font-medium text-green-600" id="modal-headline">
                    Sucesso
                </h3>
                <div class="mt-2 text-green-800">
                    <p class="text-md leading-5">
                        Seu pré cadastro foi enviado, você receberá um email com a confirmação do seu pré cadstro
                    </p>
                    <p class="text-md leading-5">
                        Iremos enviar uma mensagem quando o sua solicitação for avaliada.
                    </p>
                </div>
            </div>
        </div>
    @endcomponent
</div>