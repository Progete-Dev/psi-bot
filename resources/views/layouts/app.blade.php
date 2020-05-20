<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} - @yield('title') </title>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
  
    @stack('styles')
    <!-- Scripts -->
  
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
<script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
</head>
<body>
    
   
        <div class="h-screen flex overflow-hidden bg-gray-200">
     

                
                    @auth
                        @include('menu')
                    @endauth
                
                    <main class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0">
                        @include('partials.alerts_partial')
                        <div class="px-2 py-2">
                            <div class="font-sans bg-grey flex flex-col min-h-screen w-full">
                                <div class="flex justify-between ">        
                                  <div class="font-bold text-indigo-600 text-xl mb-4 border-b w-full border-gray-400">
                                      <p class="pl-6" >@yield('title') </p>
                                  </div>
                                </div>
                              <div>
                            @yield('content')

                        </div>
                        @stack('body-script')
                      </main>
              
              </div>
            
    
</body>
</html>
