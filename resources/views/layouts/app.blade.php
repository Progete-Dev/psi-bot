<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} - @yield('title') </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" defer>
    @stack('styles')
    @stack('head-script')
    @livewireStyles
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
       [x-cloak] { display: none; }
       *{
           transition: all 0.2s;
       }
    </style>
    @laravelPWA
</head>
<body >
  <main class="flex bg-theme">
    @auth('psicologo')
      @include('menu')
    @endauth
    <div class="flex-1 relative z-0 overflow-y-auto h-screen focus:outline-none py-2" tabindex="0">
        @include('partials.page_header')
        @yield('content')
        @auth('psicologo')
          @include('layouts.notifications',['button' => true])
        @endauth
        @stack('body-script')
        <footer class="max-w-screen-xl flex justify-center mx-auto pt-12 overflow-hidden sm:px-6 lg:px-8">
            <div class="bottom-0  relative text-sm font-semibold leading-9 justify-center text-secondary opacity-50">
                <p>Psi - &copy; <a href="" class="text-secondary">Progete!</a> 2020</p>
            </div>
        </footer>
    </div>
    @auth('psicologo')
        @include('layouts.notifications',['notifications' => true])
    @endauth
  </main>
  @livewireScripts

</body>
</html>
