@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="w-full overflow-hidden flex flex-wrap">
<!-- Login Section -->
    <div class="w-full md:w-1/2 flex flex-col">
        <livewire:auth-login></livewire:auth-login>
    </div>

  <!-- Image Section -->
    <div class="w-1/2 shadow-2xl h-full overflow-hidden">
        <img class="object-cover w-full hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0"/>
    </div>
</div>
@endsection
