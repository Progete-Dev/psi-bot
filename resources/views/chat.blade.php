@extends('layouts.app')
@section('title','Assitente')
@include('partials.botman')
@php
$month = now()->monthName;
$days = \Carbon\CarbonPeriod::create(now()->firstOfMonth(),now()->lastOfMonth());
$weekDays = ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'];
@endphp
@section('content')
    <div class="antialiased sans-serif ">
        <div class="mx-auto container px-4">
            <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
                <div x-data="{day : null}" class="flex flex-wrap sm:max-w-xl divide-x-2 sm:mx-auto">
                    <div class="z-20 relative bg-white sm:rounded-l p-2 shadow">
                        <div class="grid grid-cols-7 grid-rows-7 gap-6">
                            <div class="col-span-7 flex justify-between">
                                <div><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></div>
                                <div>{{$month}}</div>
                                <div><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></div>
                            </div>
                            <div class="col-span-7 flex justify-between">
                                @foreach ($weekDays as $weekDay)
                                    <div>{{$weekDay}}</div>
                                @endforeach
                            </div>
                            @foreach($days as $index => $day)
                                <div x-on:click="day = {{$index}}"  class="{{$day->isToday() ? 'text-blue-500' : '' }} px-1 hover:bg-gray-500 rounded-full text-center">{{$day->day}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div x-show="day"
                         x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                         x-transition:enter-start="-translate-x-full"
                         x-transition:enter-end="translate-x-0"
                         x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                         x-transition:leave-start="translate-x-0"
                         x-transition:leave-end="-translate-x-full"
                         class="z-10 relative px-4 py-10 bg-white sm:rounded-r sm:p-20">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('body-script')
        <script type="text/javascript">
            function calendar(){
                return {
                    date : new Date(),

                }
            }
        </script>
    @endpush
@endsection

