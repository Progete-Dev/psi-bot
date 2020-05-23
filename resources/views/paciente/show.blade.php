@extends('layouts.app')
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
          Profile Info
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
            User Name
          </div>
          <div
            class="text-white text-gray-800 text-xs w-full text-center tracking-wider font-sans"
          >
            User Role
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
              Basic Info
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
                    Your name
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
              Professional Info
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
                    Your name
                  </label>
                </div>
              </div>
            </div>
          </div>
        
      </div>
    </div>      
    <div class="relative w-full  pb-10">
      <div class="connection flex sm:invisible md:invisible lg:visible flex-row w-full">
        <div class="bg-white rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                  First Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Jane">
                <p class="text-red text-xs italic">Please fill out this field.</p>
              </div>
              <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                  Last Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="Doe">
              </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                  Password
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="password" placeholder="******************">
                <p class="text-grey-dark text-xs italic">Make it as long and as crazy as you'd like</p>
              </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                  City
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-city" type="text" placeholder="Albuquerque">
              </div>
              <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                  State
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                    <option>New Mexico</option>
                    <option>Missouri</option>
                    <option>Texas</option>
                  </select>
                  <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
              </div>
              <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
                  Zip
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-zip" type="text" placeholder="90210">
              </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="button" class="flex bg-indigo-800 hover:bg-gray-700 text-white font-semibold  border border-gray-700 rounded-lg shadow-sm px-2 py-2 mx-2" @click="addEvent()">
                    Save 
                </button>	
          </div>
      
      
    </div>
    </div>
  </div>
  
@endsection