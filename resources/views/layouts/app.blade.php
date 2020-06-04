<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} - @yield('title') </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
    @stack('styles')
    <!-- Scripts -->
  
    
<script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
</head>
<body >
  <div class="h-screen flex overflow-hidden bg-gray-200">
    @auth
      @include('menu')
    @endauth
    <main class="flex-1 relative z-0 overflow-y-auto p-4 focus:outline-none" tabindex="0">
            @yield('content')
            
            <div x-data="{}"  class="fixed md:bottom-0 md:top-auto top-0 right-0 m-4  p-2 md:w-12 md:h-12  h-10 w-10 bg-indigo-500 rounded-full shadow-md">
              
              
              <button x-on:click="$dispatch('notificaoes');" type="button" class="flex relative text-white">
                <div class="absolute bg-red-600 h-3 leading-3 right-0 rounded-full shadow-md text-xs top-0 w-3 z-20 mb-4 ml-4">9</div>
                <svg class="duration-150 ease-in-out group-focus:text-indigo-300 h-6 m-auto md:h-8 md:w-8 relative text-white transition w-6 z-10" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                  <path class="heroicon-ui" d="M15 19a3 3 0 0 1-6 0H4a1 1 0 0 1 0-2h1v-6a7 7 0 0 1 4.02-6.34 3 3 0 0 1 5.96 0A7 7 0 0 1 19 11v6h1a1 1 0 0 1 0 2h-5zm-4 0a1 1 0 0 0 2 0h-2zm0-12.9A5 5 0 0 0 7 11v6h10v-6a5 5 0 0 0-4-4.9V5a1 1 0 0 0-2 0v1.1z"></path>
                  
                </svg>
              </button>
            </div>
        @stack('body-script')
    </main>
    <div x-data="{open : false}" x-on:notificaoes.window="open = true">
      <div x-show="open" class="fixed h-full w-full top-0 right-0">
        <div  x-on:click="open = false" x-show="open" class="fixed z-40 bg-gray-900 opacity-50 w-full h-full"></div>
        <div    class="h-full md:flex md:flex-shrink-0 z-40 fixed right-0" x-show="open">
        
          <div style="transition: linear 0.3s" x-show="open"  class="flex flex-col  bg-indigo-500 pt-5 pb-4  w-64">
            <div style="transition: 0.5" x-show="open"  class="border-gray-300 border-l fixed h-full md:flex md:flex-shrink-0 right-0 rounded-bl shadow-md z-40">
            
                
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
