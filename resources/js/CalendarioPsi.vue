<template>
<div>
    <vue-scheduler :disable-dialog="true" :events="events" :event-display="eventDisplay"  @event-clicked="eventClicked"  @day-clicked="showEventModal = !showEventModal" @time-clicked="showEventModal = !showEventModal"/>
    <div v-show="showEventModal" style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed overflow-auto  z-40 top-0 right-0 left-0 bottom-0 h-full w-full">
			<div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-auto mt-10">
				<div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
					@click="showEventModal = false">
					<svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
					</svg>
				</div>

				<div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
					
					<h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Adicionar detalhes do agendamento</h2>
				 
					<div class="mb-4">
						<label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Nome</label>
						<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" v-model="event.title">
					</div>

					<div class="mb-4">
						<label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Data</label>
						<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" v-model="event.date" readonly>
					</div>

					<div class="mt-8 flex justify-end">
						<button type="button" class="flex bg-white hover:bg-gray-100 text-gray-700 font-semibold  border border-gray-300 rounded-lg shadow-sm px-2 py-2 mx-2" @click="showEventModal = false">
							Cancelar
						</button>	
						<button type="button" class="flex bg-gray-800 hover:bg-gray-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2" @click="showEventModal = false">
							Salvar
						</button>	
					</div>
				</div>
			</div>
		</div>
</div>
</template>
<script>
  export default {
      props : ['atendimentos'],
    data() {
      return {
        showEventModal : false,
        event : {title : '', date : ''},
        events : this.atendimentos.map((atendimento) =>{
            return {name : atendimento.cliente.name, date : new Date(atendimento.data_atendimento),status : atendimento.status, psicologo : atendimento.psicologo, cliente : atendimento.cliente, tempo : atendimento.tempo};
        })
      }
    },
    methods:{
        eventDisplay(event){
            return event.name + ' - ' + event.status;
        },
        eventClicked(event){
            this.event.title = event.name;
            this.event.date  = event.date; 
            this.showEventModal = true;
        },
        openEventDialog(event){
            console.log(event);
        }
    }
  }
</script>