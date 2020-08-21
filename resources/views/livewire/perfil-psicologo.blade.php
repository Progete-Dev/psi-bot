<div>
    @component('partials.card')
        <form wire:submit.prevent="update" method="POST">
            @csrf
            <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-2">
                    <label for="name" class="block  leading-normal cursor-pointer text-gray-600">
                        Nome
                    </label>
                    <input
                            wire:model="nome"
                            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-secondary border border-gray-200 rounded focus:outline-none focus:bg-primaryfocus:border-gray-500 text-secondary"
                            name="name"
                            id="name"
                            type="text"
                            placeholder="Seu nome"

                    />
                </div>
            </div>
            <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-2">
                    <label for="email" class="block  leading-normal cursor-pointer text-gray-600">
                        Email
                    </label>
                    <input
                            wire:model="email"
                            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-secondary border border-gray-200 rounded focus:outline-none focus:bg-primaryfocus:border-gray-500 text-secondary"
                            name="email"
                            id="email"
                            type="email"
                            placeholder="Seu email"
                    />
                </div>
            </div>
            <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-2">
                    <label for="telefone" class="block  leading-normal cursor-pointer text-gray-600">
                        Telefone
                    </label>
                    <input
                            wire:model="telefone"
                            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-secondary border border-gray-200 rounded focus:outline-none focus:bg-primaryfocus:border-gray-500 text-secondary"
                            name="telefone"
                            id="telefone"
                            type="text"
                            placeholder="Telefone"
                            value="{{old('telefone')}}"
                    />
                </div>
            </div>

            <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-2">
                    <label for="crp" class="block  leading-normal cursor-pointer text-gray-600">
                        CRP
                    </label>
                    <input
                            wire:model="crp"
                            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-secondary border border-gray-200 rounded focus:outline-none focus:bg-primaryfocus:border-gray-500 text-secondary"
                            name="crp"
                            id="crp"
                            type="text"
                    />

                </div>
                <div class="connection flex flex-row w-full">
                    <div class="flex flex-col w-full flex-wrap p-2">
                        <label for="Especialidade" class="block  leading-normal cursor-pointer text-gray-600">
                            Especialidade
                        </label>
                        <input
                                wire:model="especialidade"
                                class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-secondary border border-gray-200 rounded focus:outline-none focus:bg-primaryfocus:border-gray-500 text-secondary"
                                name="especialidade"
                                id="especialidade"
                        />

                    </div>
                </div>
            </div>
            <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-2">
                    <label for="telefone" class="block  leading-normal cursor-pointer text-gray-600">
                        Senha
                    </label>
                    <input
                            wire:model="password"
                            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-secondary border border-gray-200 rounded focus:outline-none focus:bg-primaryfocus:border-gray-500 text-secondary"
                            name="password"
                            id="password"
                            type="password"
                    />
                </div>
            </div>
            <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-2">
                    <label for="telefone" class="block  leading-normal cursor-pointer text-gray-600">
                        Confirmação da Senha
                    </label>
                    <input
                            wire:model="password_confirmation"
                            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-secondary border border-gray-200 rounded focus:outline-none focus:bg-primaryfocus:border-gray-500 text-secondary"
                            name="password_confirm"
                            id="password_confirm"
                            type="password"
                    />

                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="flex bg-button hover:bg-gray-700 text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2" @click="addEvent()">
                    Salvar
                </button>
            </div>
        </form>
    @endcomponent
        @component('partials.card')
            @slot('cardTitle','Horários')
            <div class="flex flex-wrap">
                @foreach($horarios as $diaSemana => $lista)
                    <div class="p-2">
                        <h1 class="text-md text-primary">{{$diaSemana}} </h1>
                        @foreach($lista as $horario)
                            <div class="flex px-4 py-2 m-2 border text-primary">
                                <div class="p-2">{{$horario['hora_inicio']}}</div>
                                <div class="p-2">{{$horario['hora_final']}}</div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="flex bg-button hover:bg-gray-700 text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2" @click="addEvent()">
                    Novo
                </button>
            </div>
        @endcomponent
</div>
