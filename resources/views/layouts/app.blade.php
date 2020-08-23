<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} - @yield('title') </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" defer>
    <!-- Web Application Manifest -->
    <link rel="manifest" href="/manifest.json">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#d6e6f5">
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PAPO">
    <link rel="icon" sizes="512x512" href="/images/icons/icon-512x512.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PAPO">
    <link rel="apple-touch-icon" href="/images/icons/icon-512x512.png">

    <link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

    <!-- Tile for Win8 -->
    <meta name="msapplication-TileColor" content="#d6e6f5">
    <meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">
    @stack('styles')
    @livewireStyles
    <script src="{{ asset('js/app.js') }}" defer></script>
    @laravelPWA
    <style>
       [x-cloak] { display: none; }
    </style>
</head>
<body >
  <main class="flex bg-theme">
    @auth('psicologo')
      @include('menu')
    @endauth
    <div class="flex-1 relative z-0 overflow-y-auto h-screen focus:outline-none py-2" tabindex="0">
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
  <script type="text/javascript">
      window.addEventListener("beforeinstallprompt", function(e) {
          // log the platforms provided as options in an install prompt
          console.log(e.platforms); // e.g., ["web", "android", "windows"]
          e.userChoice.then(function(choiceResult) {
              console.log(choiceResult.outcome); // either "accepted" or "dismissed"
          }, handleError);
      });
  </script>
</body>
</html>
