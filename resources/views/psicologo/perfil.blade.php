@extends('layouts.app')
@section("title", "Perfil ". Auth::user()->name)
@section('content')
@include('partials.page_header')
@component('partials.card')
  <div class="flex flex-col lg:flex-row">
    <div class="w-full lg:w-2/5 ">
      <ul class="pb-10">
        <li>
          <div
            class="w-32 h-32 border border-blue-600 border-solid rounded-full m-auto bg-center bg-cover"
            style="background-image: url(https://images.unsplash.com/photo-1521572267360-ee0c2909d518?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1534&amp;q=80);"
          ></div>
          <div
            class="text-gray-600 font-bold text-xl w-full tracking-wider font-sans pt-4 pb-2"
          >
            Nome : {{auth()->user()->name}}
          </div>
          <div
            class="text-gray-600 font-bold text-xl w-full tracking-wider font-sans pt-4 pb-2"
          >
            Email : {{auth()->user()->email}}
          </div>
          <div
            class="text-gray-600 font-bold text-xl w-full  tracking-wider font-sans pt-4 pb-2"
          >
            Telefone : {{auth()->user()->telefone}}
          </div>
        </li>
      </ul>
      
    </div>      
    <div class="relative w-full border border-indigo-300 shadow-md rounded-md  pb-10">
    <form action="{{ route('psicologo.perfil_update') }}" method="POST">
      @csrf
      <div class="connection flex flex-row w-full">
        <div class="flex flex-col w-full flex-wrap p-2">
          <label for="name" class="block  leading-normal cursor-pointer text-gray-600">
            Nome
          </label>
          <input
            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
            name="name"
            id="name"
            type="text"
            placeholder="Seu nome"
            value="{{old('name') ?? auth()->user()->name}}"
          />
        </div>
      </div>
        <div class="connection flex flex-row w-full">
        <div class="flex flex-col w-full flex-wrap p-2">
          <label for="email" class="block  leading-normal cursor-pointer text-gray-600">
            Email
          </label>
          <input
          class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
            name="email"
            id="email"
            type="email"
            placeholder="Seu email"
            value="{{old('email') ?? auth()->user()->email}}"
          />
        </div>
      </div>
      <div class="connection flex flex-row w-full">
        <div class="flex flex-col w-full flex-wrap p-2">
          <label for="telefone" class="block  leading-normal cursor-pointer text-gray-600">
            Telefone
          </label>
          <input
          class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
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
          <label for="telefone" class="block  leading-normal cursor-pointer text-gray-600">
            Senha
          </label>
          <input
          class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
            name="password"
            id="password"
            type="password"
            value="{{old('password')}}"
          />
          
        </div>
      </div>
      <div class="connection flex flex-row w-full">
        <div class="flex flex-col w-full flex-wrap p-2">
          <label for="telefone" class="block  leading-normal cursor-pointer text-gray-600">
            Confirmação da Senha
          </label>
          <input
          class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
          name="password_confirm"
          id="password_confirm"
          type="password"
          />
          
        </div>
      </div>
      <div class="mt-8 flex justify-end">
        <button type="submit" class="flex bg-indigo-800 hover:bg-gray-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2" @click="addEvent()">
            Salvar 
        </button>	
    </div>
    </form>
    </div>
  </div>
  @endcomponent
@endsection