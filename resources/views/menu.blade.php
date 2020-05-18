 <!-- Begin Navbar -->
   <!-- Mobile Navbar -->
  <div  class="md:hidden">
    <div class="fixed z-40 bottom-0 w-full h-10 bg-indigo-800">
      <div class="relative flex-1 flex flex-col pt-2 w-full ">
        <nav class="px-2 bg-indigo-800  flex justify-center">
            <a href="#" class="flex px-3">
              <svg class="h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"></path>
              </svg>
            
            </a>
            <a href="#" class="flex px-3">
              <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
              
            </a>
            <a href="#" class="flex px-3">
              <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
              </svg>
              
            </a>
            <a href="{{route('dashboard')}}" class="flex px-3">
              <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              
            </a>
            <a href="{{route('paciente')}}" class="flex px-3">
              <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
              </svg>
              
            </a>
            <a href="" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" class="flex px-3">
              <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              
            </a>
          </nav>
        </div>
      </div>
    </div>
  <!-- Desktop Side Bar -->
  <div x-data="{open: true}"  class="hidden h-full md:flex md:flex-shrink-0">
    <div class="flex flex-col  bg-indigo-800 pt-5 pb-4"  :class="{ 'w-12' : !open , 'w-64' : open}">
      <div x-show="open" class="flex-shrink-0 flex items-center px-4">
        <div class="flex relative w-12 h-12 bg-orange-500 justify-center items-center m-1 mr-2 text-xl rounded-full text-white"><img class="rounded-full" alt="A" src="https://randomuser.me/api/portraits/men/62.jpg">
          <div class="bg-green-500 rounded-full w-3 h-3 absolute bottom-0 right-0"></div>
          
      </div>
        <p class="text-1xl text-gray-500 m-auto">{{Auth::user()->name}}
        <div class="m-auto">
          <svg x-on:click="open=false" class=" text-white h-6 w-6 ml-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
            <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          
        </div>
      </div>
      <div x-show="!open" class="flex flex-col m-auto">
        <svg  x-on:click="open=true" class=" text-white h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14 5L21 12M21 12L14 19M21 12L3 12" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
    
      </div>
      <div class="mt-5 h-0 flex-1 flex flex-col overflow-y-auto">
        
        <nav class="flex-1 px-2 bg-indigo-800">
          <a href="{{route('dashboard')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 hover:bg-indigo-700  transition ease-in-out duration-150"
            :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }"
          >
            <svg :class="{'ml-1' : open,  'm-auto' : !open}" 
              class=" h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
            </svg>
            <p x-show="open"> Dashboard </p>
          </a>
          <a href="#" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
            <svg :class="{'ml-1' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <p x-show="open"> Team</p>
          </a>
          <a href="#" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
            <svg :class="{'ml-1' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
            </svg>
            <p x-show="open"> Projects</p>
          </a>
          <a href="{{route('dashboard')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
            <svg :class="{'ml-1' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p x-show="open"> Dashboard </p>
          </a>
          <a href="{{route('paciente')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }"
            :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white focus:bg-indigo-700' : !open }"
          >
            <svg :class="{'ml-1' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
            <p x-show="open"> Paciente</p>
          </a>
          <a href="#"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
            :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
            <svg :class="{'ml-1' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p x-show="open" >Logout</p>

          </a>
        </nav>
      </div>
    </div>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>   
