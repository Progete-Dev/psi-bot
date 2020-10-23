<div class="border-b border-gray-200 px-4 py-2">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        Resumo da Solicitação
    </h3>
    <p class="mt-1 max-w-2xl  leading-5 text-gray-500">
        Verifique as informações abaixo e confirme a solicitação
    </p>
</div>
<div class="px-4 py-3">
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
                        {{\Carbon\Carbon::parse($data)->format('d/m/Y')}}
                    </dd>
                    </dl>
                </li>
                <li class="mt-1 ">
                    <dl>
                    <dt class=" leading-5 font-medium text-gray-500">
                        Hora
                    </dt>
                    <dd class="p-2  leading-5 text-gray-900 ">
                        {{\Carbon\Carbon::createFromTimeString($this->horario->hora_inicio)->format('H:i')}} - {{\Carbon\Carbon::createFromTimeString($this->horario->hora_final)->format('H:i')}}
                    </dd>
                    </dl>
                </li>
            </ul>
        </div>
    <div class="sm:gap-4 my-2">
            <div class="border-b text-md font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                Psicólogo
            </div>
            <ul class="flex flex-wrap justify-between m-auto gap-3">
                <li class="mt-1  leading-5 text-gray-900">
                    <dl>
                    <dt class="leading-5 font-medium text-gray-500">
                        Nome
                    </dt>
                    <dd class="p-2  leading-5 text-gray-900 ">
                        {{$this->horario->psicologo->nome}}
                    </dd>
                    </dl>
                </li>
                <li class="mt-1 ">
                    <dl class="gap-2">
                    <dt class=" leading-5 font-medium text-gray-500">
                        CRP
                    </dt>
                    <dd class="p-2 leading-5 text-gray-900 ">
                        {{$this->horario->psicologo->crp}}
                    </dd>
                    </dl>
                </li>
            </ul>
            <ul class="flex flex-wrap justify-between m-auto gap-3">
                <li class="mt-1">
                    <dl class="gap-2">
                    <dt class=" leading-5 font-medium text-gray-500">
                        Email
                    </dt>
                    <dd class="p-2  leading-5 text-gray-900 ">
                        {{$this->horario->psicologo->email}}
                    </dd>
                    </dl>
                </li>
                <li class="mt-1 ">
                    <dl class="gap-2">
                    <dt class=" leading-5 font-medium text-gray-500">
                        Especialidade
                    </dt>
                    <dd class="p-2  leading-5 text-gray-900 ">
                        {{$this->horario->psicologo->especialidade}}
                    </dd>
                    </dl>
                </li>
            </ul>
        </div>
    <div class="sm:gap-4 my-2">
            <div class="text-md border-b font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
                Informações Pessoais
            </div>
            <ul class="flex flex-wrap justify-between m-auto gap-3">
                <li class="mt-1 ">
                    <dl class="gap-2">
                    <dt class=" leading-5 font-medium text-gray-500">
                        Nome
                    </dt>
                    <dd class="p-2  leading-5 text-gray-900 ">
                        {{auth()->guard('cliente')->user()->nome}}
                    </dd>
                    </dl>
                </li>
                <li class="mt-1 ">
                    <dl class="gap-2">
                    <dt class=" leading-5 font-medium text-gray-500">
                        Email
                    </dt>
                    <dd class="p-2  leading-5 text-gray-900 ">
                        {{auth()->guard('cliente')->user()->email}}
                    </dd>
                    </dl>
                </li>
            </ul>
        </div>
    <div class="p-2 my-2">
        <div class="border-b font-bold leading-5 mb-1 pb-2 pl-2 text-primary">
            Motivo da solicitação
        </div>
        <textarea wire:model="motivo" class="appearance-none bg-white border border-gray-300 h-40 overflow-scroll p-4 resize-none rounded w-full"></textarea>

    </div>
</div>
<div class="mt-8 mb-2 flex justify-end">
    <button wire:click="cancelar" type="button" class="flex  hover:border-gray-500 hover:bg-gray-200 text-primary font-semibold  border border-gray-500 rounded-lg shadow-sm px-2 py-2 mx-2">
        Voltar
    </button>
    <button wire:click="confirmarSolicitacao" type="button" class="flex bg-theme hover:bg-secondary text-primary font-semibold  border border-gray-600 rounded-lg shadow-sm px-2 py-2 mx-2">
        Solicitar atendimento
    </button>
</div>