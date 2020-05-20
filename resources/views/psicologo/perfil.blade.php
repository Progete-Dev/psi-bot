@extends('layouts.app')
@section("title", "Perfil ". Auth::user()->name)
@section('content')
<style>
    /* Tab content - closed */
    .tab-content {
      max-height: 0;
      -webkit-transition: max-height 0.35s;
      -o-transition: max-height 0.35s;
      transition: max-height 0.35s;
    }
    /* :checked - resize to full height */
    .tab input:checked ~ .tab-content {
      max-height: 100vh;
    }
    /* Label formatting when open */
    .tab input:checked + label {
      background-color: #f8fafc; /*.bg-gray-100 */
    }
    /* Icon */
    .tab label::after {
      float: right;
      right: 0;
      top: 0;
      display: block;
      width: 1.5em;
      height: 1.5em;
      line-height: 1.5;
      font-size: 1.25rem;
      text-align: center;
      -webkit-transition: all 0.35s;
      -o-transition: all 0.35s;
      transition: all 0.35s;
    }
    /* Icon formatting - open */
    .tab input[type='checkbox']:checked + label::after {
      transform: rotate(315deg);
    }
    .tab input[type='radio']:checked + label::after {
      transform: rotateX(180deg);
    }
  </style>
  <div class="font-sans bg-grey flex flex-col min-h-screen w-full">
    <div class="flex justify-between ">        
      <div class="font-bold text-gray-800 text-xl mb-4 border-b w-full border-gray-400">
          Informações de perfil
      </div>
    </div>
  <div>
  <div
    class="max-w-full p-4  w-full shadow-lg m-auto lg:mt-10 border-b-2 border-gray-400 bg-white flex flex-col lg:flex-row"
  >
    <div class="w-full lg:w-2/5 ">
      <ul class="pb-10">
        <li>
          <div
            class="w-32 h-32 border border-blue-600 border-solid rounded-full m-auto bg-center bg-cover"
            style="background-image: url(https://images.unsplash.com/photo-1521572267360-ee0c2909d518?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1534&amp;q=80);"
          ></div>
          <div
            class="text-gray-800 font-bold text-gray-100 text-xl w-full text-center tracking-wider font-sans pt-4 pb-2"
          >
            Nome
          </div>
          <div
            class="text-white text-gray-800 text-xs w-full text-center tracking-wider font-sans"
          >
           Papel
          </div>
        </li>
      </ul>
      <div class="w-full bg-white">
        <div class="w-full">
          <div class="tab w-full overflow-hidden border-t hover:bg-indigo-200">
            <input
              class="absolute opacity-0 lg:hidden"
              id="tab-multi-one"
              type="checkbox"
              name="tabs"
            />
            <label
              class="block border-l border-indigo-400   p-5 leading-normal cursor-pointer"
              for="tab-multi-one"
            >
              Informações básicas
            </label>
            <div
              class="lg:hidden tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal"
            >
              <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-4">
                  <input
                    class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="name"
                    type="text"
                    placeholder="Your name"
                    required=""
                  />
                  <label
                    for="name"
                    class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
                  >
                    Seu nome
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab w-full overflow-hidden border-t hover:bg-indigo-200">
            <input
              class="absolute opacity-0 lg:hidden"
              id="tab-multi-two"
              type="checkbox"
              name="tabs"
            />
            <label
              class="block border-l border-indigo-400   p-5 leading-normal cursor-pointer"
              for="tab-multi-two"
            >
              Informações Profissionais
            </label>
            <div
              class="lg:hidden tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal"
            >
              <div class="connection flex flex-row w-full">
                <div class="flex flex-col w-full flex-wrap p-4">
                  <input
                    class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                    id="name"
                    type="text"
                    placeholder="."
                    required=""
                  />
                  <label
                    for="name"
                    class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
                  >
                    Seu nome
                  </label>
                </div>
              </div>
            </div>
          </div>
        
      </div>
    </div>      
    <div class="relative w-full  pb-10">
      <div class="connection flex sm:invisible md:invisible lg:visible flex-row w-full">
        <div class="flex flex-col w-full flex-wrap mt-6 ml-6 p-6">
          <input
            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
            id="name"
            type="text"
            placeholder="Seu nome"
            required=""
          />
          <label
              for="name"
              class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
          >
            Seu email 
          </label>
        </div>
      </div>
            <div class="connection flex sm:invisible md:invisible lg:visible flex-row w-full">
        <div class="flex flex-col w-full flex-wrap mt-6 ml-6 p-6">
          <input
            class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
            id="name"
            type="text"
            placeholder="Seu email"
            required=""
          />
          <label
              for="name"
              class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
          >
            Your name
          </label>
        </div>
      </div>
      
      <div class="mt-8 flex justify-end">
        <button type="button" class="flex bg-indigo-800 hover:bg-gray-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2" @click="addEvent()">
            Save 
        </button>	
    </div>
    </div>
  </div>
  
@endsection