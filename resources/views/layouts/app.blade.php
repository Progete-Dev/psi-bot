<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} - @yield('title') </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
    @stack('styles')
    @livewireStyles 
    <!-- Scripts -->
  
    
    
<script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
</head>
<body >
  <div class="h-screen flex overflow-hidden bg-theme">
    @auth
      @include('menu')
    @endauth
    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none " tabindex="0">
          <div class="m-auto px-4">
            @yield('content')
          </div>
            
              
            @auth
              @include('layouts.notifications',['button' => true])
            @endauth
            
        @stack('body-script')
          <div class="max-w-screen-xl flex justify-center mx-auto pt-12 overflow-hidden sm:px-6 lg:px-8">
             
              <div class="bottom-0  relative text-sm font-semibold leading-9 justify-center text-secondary opacity-50"> 
                <p>Psi - &copy; <a href="" class="text-link">Progete!</a> 2020</p>
              </div>          
          </div>
        
    </main>
    
    @auth
      @include('layouts.notifications',['notifications' => isset($notificacoes) ? $notificacoes : false])
    @endauth
  </div>
  @livewireScripts
</body>
</html>
