 <!-- Begin Navbar -->
   <!-- Mobile Navbar -->
  <div  class="md:hidden">
    <div class="fixed z-40 bottom-0 w-full h-10 bg-indigo-800">
        <nav class="py-2 bg-indigo-800 flex justify-center">
          {{-- Perfil --}}
          <a href="{{route("psicologo.perfil")}}"  class="flex ml-2 px-2">
            <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
              
              <path  d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/> 
            </svg>
            
          </a>
          {{--Home  --}}
          <a href="{{route('psicologo.home')}}"  class="flex px-2">
            <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
              <path class="heroicon-ui" d="M13 20v-5h-2v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7.59l-.3.3a1 1 0 1 1-1.4-1.42l9-9a1 1 0 0 1 1.4 0l9 9a1 1 0 0 1-1.4 1.42l-.3-.3V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2zm5 0v-9.59l-6-6-6 6V20h3v-5c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v5h3z"/>
            </svg>
            
          </a>
          {{-- Mensagens --}}
          <a href="{{route('psicologo.mensagens')}}"  class="flex px-2">
          <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6 14H4a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v13a1 1 0 0 1-1.7.7L16.58 18H8a2 2 0 0 1-2-2v-2zm0-2V8c0-1.1.9-2 2-2h8V4H4v8h2zm14-4H8v8h9a1 1 0 0 1 .7.3l2.3 2.29V8z"/>
            
          </svg>
          {{-- Configurações --}}
          </a>
          <a href="{{route('psicologo.config')}}"  class="flex px-2">
            <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
              <path d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
              
            </svg>
            
          </a>
          {{-- Histórico --}}
          <a href="{{route('psicologo.historicoList')}}" class="flex px-2">
          
          <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            
          </a>
          {{-- Calendario --}}
          <a href="{{route('psicologo.calendario')}}"  class="flex px-2">
            <svg class="h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
              <path  d="M17 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h2V3a1 1 0 1 1 2 0v1h6V3a1 1 0 0 1 2 0v1zm-2 2H9v1a1 1 0 1 1-2 0V6H5v4h14V6h-2v1a1 1 0 0 1-2 0V6zm4 6H5v8h14v-8z"/>
            </svg>
            
          </a>
            {{-- Logout --}}
          <a href="#"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="flex px-2 mr-2"
            >
            <svg class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="currentColor" viewBox="0 0 24 24">
                <path stroke="null" id="svg_3" d="m11.82696,22.34704l-6.40879,0c-1.74169,0 -3.15485,-1.35646 -3.15485,-3.01713l0,-14.77148c0,-1.66566 1.41838,-3.01713 3.15485,-3.01713l6.51308,0c0.3911,0 0.70398,-0.29922 0.70398,-0.67324s-0.31288,-0.67324 -0.70398,-0.67324l-6.51308,0c-2.51867,0 -4.5628,1.95989 -4.5628,4.36362l0,14.77148c0,2.40872 2.04935,4.36362 4.5628,4.36362l6.40879,0c0.3911,0 0.70398,-0.29922 0.70398,-0.67324s-0.31809,-0.67324 -0.70398,-0.67324z"/>
                <path stroke="null" id="svg_4" d="m23.42431,11.4704l-4.47416,-4.27884c-0.27638,-0.26431 -0.71962,-0.26431 -0.996,0c-0.27638,0.26431 -0.27638,0.68821 0,0.95252l3.27479,3.13183l-14.28288,0c-0.3911,0 -0.70398,0.29922 -0.70398,0.67324s0.31288,0.67324 0.70398,0.67324l14.28288,0l-3.27479,3.13183c-0.27638,0.26431 -0.27638,0.68821 0,0.95252c0.13558,0.12966 0.31809,0.19948 0.49539,0.19948s0.35981,-0.06483 0.49539,-0.19948l4.47416,-4.27884c0.28159,-0.2693 0.28159,-0.69818 0.00521,-0.9575z"/>
            </svg>
            

          </a>
          </nav>
        
      </div>
    </div>
  <!-- Desktop Side Bar -->
  <div  x-data="{open: true}"  class="hidden h-full md:flex md:flex-shrink-0">
    <div style="transition: linear 0.3s"  class="flex flex-col  bg-indigo-800 pt-5 pb-4"  :class="{ 'w-12' : !open , 'w-64' : open}">
      <div style="transition: 0.5" x-show="open"  class="flex-shrink-0 flex items-center px-4 ">
        <div class="flex relative w-12 h-12 justify-center items-center m-1 mr-2 text-xl rounded-full text-white">
          {{-- Perfil --}}
          <a href="{{route("psicologo.perfil")}}">
            <img class="rounded-full " alt="A" src="https://randomuser.me/api/portraits/men/62.jpg">
          </a>
          <div class="bg-green-500 rounded-full w-3 h-3 absolute bottom-0 right-0"></div>
          
      </div>
      
        <p class="text-1xl text-gray-500 m-auto">{{Auth::user()->name}}
          {{-- Seta de fechar menu --}}
        <div class="m-auto">
          <svg x-on:click="open=false" class=" text-white h-6 w-6 ml-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
            <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          
        </div>
      </div>
        {{-- Seta de abrir menu --}}
      <div x-show="!open" class="flex flex-col m-auto">
        <svg  x-on:click="open=true" class=" text-white h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M14 5L21 12M21 12L14 19M21 12L3 12" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
    
      </div>
      <div class="mt-5 h-0 flex-1 flex flex-col overflow-y-auto">
        
        <nav  class="flex-1 px-2 bg-indigo-800">
          {{-- Perfil --}}
        <a  x-show="!open" href="{{route('psicologo.perfil')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4" >

            <svg  class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 m-auto transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
              <path  d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/> 
            </svg>
            
          </a>
          {{-- Home --}}
        <a href="{{route('psicologo.home')}}" class="appearance-none group flex items-center  text-sm leading-5 font-medium focus:outline-none focus:bg-indigo-700 hover:border-l-2 border-indigo-700 transition ease-in-out duration-150 {{Route::currentRouteName() == 'psicologo.home' ? 'bg-indigo-900 border-l-2 border-indigo-700 rounded-sm' : ' rounded-md '}}"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
            <svg :class="{'mr-2' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
              <path d="M13 20v-5h-2v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7.59l-.3.3a1 1 0 1 1-1.4-1.42l9-9a1 1 0 0 1 1.4 0l9 9a1 1 0 0 1-1.4 1.42l-.3-.3V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2zm5 0v-9.59l-6-6-6 6V20h3v-5c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v5h3z"/>
            </svg>
            <p x-show="open"> Home </p>
          </a>
          {{-- Mensagens --}}
          <a href="{{route('psicologo.mensagens')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
          <svg :class="{'mr-2' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6 14H4a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v13a1 1 0 0 1-1.7.7L16.58 18H8a2 2 0 0 1-2-2v-2zm0-2V8c0-1.1.9-2 2-2h8V4H4v8h2zm14-4H8v8h9a1 1 0 0 1 .7.3l2.3 2.29V8z"/>
            
          </svg>
            <p x-show="open"> Mensagens </p>
          </a>
          {{-- configurações  --}}
          <a href="{{route('psicologo.config')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
            <svg :class="{'mr-2' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
              <path d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
              
            </svg>
            <p x-show="open"> Configurações </p>
          </a>
          {{-- Histórico --}}
          <a href="{{route('psicologo.historicoList')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }"
            :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white focus:bg-indigo-700' : !open }"
          >
          
          <svg :class="{'mr-2' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p x-show="open"> Histórico </p>
          </a>
          {{-- Calendario --}}
          <a href="{{route('psicologo.calendario')}}" class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
          :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }"
            :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white focus:bg-indigo-700' : !open }"
          >
          <svg :class="{'mr-2' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
            <path  d="M17 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h2V3a1 1 0 1 1 2 0v1h6V3a1 1 0 0 1 2 0v1zm-2 2H9v1a1 1 0 1 1-2 0V6H5v4h14V6h-2v1a1 1 0 0 1-2 0V6zm4 6H5v8h14v-8z"/>
            </svg>
            <p x-show="open"> Calendário </p>
          </a>
        
          {{-- Sair --}}
          <a href="#"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="group flex items-center  text-sm leading-5 font-medium  rounded-md focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150"
            :class="{'text-indigo-300  hover:text-white hover:bg-indigo-700  focus:text-white mb-4' : !open, 'text-white bg-indigo-800 px-2 py-2 mb-2 hover:bg-indigo-700' : open }">
            <svg :class="{'ml-2 mr-2' : open,  'm-auto' : !open}" class="ml-1 h-6 w-6 text-indigo-400 group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="currentColor" viewBox="0 0 24 24">
              
                <path stroke="null" id="svg_3" d="m11.82696,22.34704l-6.40879,0c-1.74169,0 -3.15485,-1.35646 -3.15485,-3.01713l0,-14.77148c0,-1.66566 1.41838,-3.01713 3.15485,-3.01713l6.51308,0c0.3911,0 0.70398,-0.29922 0.70398,-0.67324s-0.31288,-0.67324 -0.70398,-0.67324l-6.51308,0c-2.51867,0 -4.5628,1.95989 -4.5628,4.36362l0,14.77148c0,2.40872 2.04935,4.36362 4.5628,4.36362l6.40879,0c0.3911,0 0.70398,-0.29922 0.70398,-0.67324s-0.31809,-0.67324 -0.70398,-0.67324z"/>
                <path stroke="null" id="svg_4" d="m23.42431,11.4704l-4.47416,-4.27884c-0.27638,-0.26431 -0.71962,-0.26431 -0.996,0c-0.27638,0.26431 -0.27638,0.68821 0,0.95252l3.27479,3.13183l-14.28288,0c-0.3911,0 -0.70398,0.29922 -0.70398,0.67324s0.31288,0.67324 0.70398,0.67324l14.28288,0l-3.27479,3.13183c-0.27638,0.26431 -0.27638,0.68821 0,0.95252c0.13558,0.12966 0.31809,0.19948 0.49539,0.19948s0.35981,-0.06483 0.49539,-0.19948l4.47416,-4.27884c0.28159,-0.2693 0.28159,-0.69818 0.00521,-0.9575z"/>
            </svg>
            
            <p x-show="open" > Sair </p>

          </a>
        </nav>
      </div>
    </div>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>   
