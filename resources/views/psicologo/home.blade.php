@extends('layouts.app')

@section('title', 'Home')

@section('content')
@if(count($notificacoes) > 0)
<div class="p-2 m-2 bg-indigo-600 items-center text-indigo-100 leading-none rounded-md flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">{{count($notificacoes)}}</span>
    <span class="font-semibold mr-2 text-left flex-auto">
        <a href="{{route('psicologo.historicoList')}}">
            Você tem {{count($notificacoes)}} novas solicitacoes de atendimento. Clique aqui para ver
        </a>
    </span>
    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
</div>
@endif
@endsection