@extends('layouts.app')
@section('title','Assistente')
@include('partials.botman')

@section('content')
    <div class="antialiased sans-serif ">
        <div class="mx-auto container px-4">
            <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
                <livewire:calendar/>
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

