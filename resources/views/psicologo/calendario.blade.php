@extends('layouts.app')
@section('title', 'Agenda')
@section('content')
@include('partials.page_header')
<div id="app">
	
<agenda-psi :atendimentos="{{($atendimentos)}}"></agenda-psi>
</div>


{{-- 
	<style>
		[x-cloak] {
			display: none;
		}
	</style>

<div class="antialiased sans-serif bg-gray-100 ">
	<div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
		<div class="w-full">
			  
			

			<div class="bg-primaryrounded shadow overflow-hidden mb-4">

				<div class="flex items-center justify-between py-2 px-6">
					<div>
						<span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
						<span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
					</div>
					<div class="border rounded-lg px-1" style="padding-top: 2px;">
						<button 
							type="button"
							class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-primary p-1 items-center" 
							:class="{'cursor-not-allowed opacity-25': month == 0 }"
							:disabled="month == 0 ? true : false"
							@click="month--; getNoOfDays()">
							<svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
							</svg>  
						</button>
						<div class="border-r inline-flex h-6"></div>		
						<button 
							type="button"
							class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-primary p-1" 
							:class="{'cursor-not-allowed opacity-25': month == 11 }"
							:disabled="month == 11 ? true : false"
							@click="month++; getNoOfDays()">
							<svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
							</svg>									  
						</button>
					</div>
				</div>	

				<div class="mx-1 mb-1">
					<div class="flex flex-wrap" style="margin-bottom: -40px;">
						<template x-for="(day, index) in DAYS" :key="index">	
							<div style="width: 14.26%" class="px-2 py-2">
								<div
									x-text="day" 
									class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
							</div>
						</template>
					</div>

					<div class="flex flex-wrap border-t border-l">
						<template x-for="blankday in blankdays">
							<div 
								style="width: 14.28%; height: 80px"
								class="text-center border-r border-b px-4 pt-2"	
							></div>
						</template>	
						<template x-for="(date, dateIndex) in no_of_days" >	
							<div style="width: 14.28%; height: 80px" class="px-4 pt-8 border-r border-b relative">
								<div
									:x-ref="dateIndex"
									@click="showEventModal($refs[dateIndex].innerText)"
									x-text="date"
									class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100 text-1xl"
									:class="{'bg-blue-500 text-button md:text-2xl': isToday($refs[dateIndex].innerText) == true, 'text-secondary hover:bg-blue-200 md:text-2xl': isToday($refs[dateIndex].innerText) == false }"	
								></div>
								<div style="" class="overflow-hidden mt-1">
									<div 
										class="absolute top-0 right-0 mt-2 mr-2 inline-flex items-center justify-center rounded-full text-sm w-6 h-4 bg-gray-700 text-button leading-none"
										x-show="events.filter(e => e.event_date === new Date(year, month, $refs[dateIndex].innerText).toDateString()).length"
										x-text="events.filter(e => e.event_date === new Date(year, month, $refs[dateIndex].innerText).toDateString()).length"></div>

								
								</div>
							</div>
						</template>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed overflow-auto  z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
			<div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-auto mt-10">
				<div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-primary text-gray-500 hover:text-primary  inline-flex items-center justify-center cursor-pointer"
					x-on:click="openEventModal = !openEventModal">
					<svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
					</svg>
				</div>

				<div class="shadow w-full rounded-lg bg-secondary overflow-hidden w-full block p-8">
					
					<h2 class="font-bold text-2xl mb-6 text-primary  border-b pb-2">Adicionar detalhes do agendamento</h2>
				 
					<div class="mb-4">
						<label class="text-primary  block mb-1 font-bold text-sm tracking-wide">Nome</label>
						<input class="bg-primary appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-secondary leading-tight focus:outline-none focus:bg-primaryfocus:border-blue-500" type="text" x-model="event_title">
					</div>

					<div class="mb-4">
						<label class="text-primary  block mb-1 font-bold text-sm tracking-wide">Data</label>
						<input class="bg-primary appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-secondary leading-tight focus:outline-none focus:bg-primaryfocus:border-blue-500" type="text" x-model="event_date" readonly>
					</div>

					<div class="mt-8 flex justify-end">
						<button type="button" class="flex bg-primaryhover:bg-secondary text-secondary font-semibold  border border-gray-300 rounded-lg shadow-sm px-2 py-2 mx-2" @click="openEventModal = !openEventModal">
							Cancelar
						</button>	
						<button type="button" class="flex bg-gray-800 hover:bg-gray-700 text-button font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2" @click="addEvent()">
							Salvar
						</button>	
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal -->
	</div>
</div>

	<script>
		const MONTH_NAMES = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
		const DAYS = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];

		function app() {
			return {
				month: '',
				year: '',
				no_of_days: [],
				blankdays: [],
				days: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],

				events: [],
				event_title: '',
				event_date: '',
				openEventModal: false,

				initDate() {
					let today = new Date();
					this.month = today.getMonth();
					this.year = today.getFullYear();
					this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
				},

				isToday(date) {
					const today = new Date();
					const d = new Date(this.year, this.month, date);

					return today.toDateString() === d.toDateString() ? true : false;
				},

				showEventModal(date) {
					// open the modal
					this.openEventModal = true;
					this.event_date = new Date(this.year, this.month, date).toDateString();
				},

				addEvent() {
					if (this.event_title == '') {
						return;
					}

					this.events.push({
						event_date: this.event_date,
						event_title: this.event_title,
					});

					console.log(this.events);

					// clear the form data
					this.event_title = '';
					this.event_date = '';

					//close the modal
					this.openEventModal = false;
				},

				getNoOfDays() {
					let daysInMonth = new Date(this.year, this.month, 0).getDate();

					// find where to start calendar day of week
					let dayOfWeek = new Date(this.year, this.month).getDay();
					let blankdaysArray = [];
					for ( var i=1; i <= dayOfWeek; i++) {
						blankdaysArray.push(i);
					}

					let daysArray = [];
					for ( var i=1; i <= daysInMonth; i++) {
						daysArray.push(i);
					}
					
					this.blankdays = blankdaysArray;
					this.no_of_days = daysArray;
				}
			}
		}
	</script> --}}
@endsection

