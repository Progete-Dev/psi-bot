<div class="max-w-7xl mt-4">
    @if($showHorarios == false)
        <div class="bg-primary border border-gray-300 mt-2 p-2 rounded-md shadow-xl">
            <form wire:submit.prevent="validaMotivo">
            <div class="px-3 py-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Motivo da Solicitação
                </h3>
                <p class="mt-1 max-w-2xl  leading-5 text-gray-500">
                        Descreva no campo o motivo para a sua solicitação de atendimento psicológico,
                        você poderá alterar o motivo antes de confirmar a solicitação.
                </p>
            </div>

            @include('livewire.cliente.views.agendar-horario.motivo')
            <div class="p-2 mt-4 flex justify-end">
                <button type="submit" class="flex bg-theme hover:bg-secondary text-primary font-semibold  border border-gray-600 rounded-lg shadow-sm px-2 py-2 mx-2">
                    Avançar
                </button>
            </div>
            </form>
        </div>
    @else
    @if($slot == null)
        <div x-data="{}" class="fixed top-0 w-full p-2 bg-primary rounded-b">
            <label for="data" class="text-lg text-primary p-2 leading-5 mt-4">Selecione uma data</label>
            <input data-date-inline-picker="true"  wire:model.lazy="data" wire:change="buscarData" type="date" id="data" class="w-full mt-2 rounded shadow focus:outline-none text-primary px-4 py-3 bg-white "  min="{{now()->addDay()->format('Y-m-d')}}">
        </div>
    @endif
    <div class="py-2 px-4">
        @if($data != null and $slot == null)
            <div  class="bg-primary border border-gray-300 rounded-md shadow-xl mt-24">
                @include('livewire.cliente.views.agendar-horario.horarios-list')
            </div>
        @elseif($slot != null and $data != null)
            <div class="bg-primary border border-gray-300 mt-2 rounded-md shadow-xl">
                @include('livewire.cliente.views.agendar-horario.confirmacao')
            </div>
        @endif
    </div>
    @endif
</div>
