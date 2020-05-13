
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{config('app.name')}} - @yield('title') </title>

    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    
    @stack('styles')
  </head>
  <body>
        <div class="h-full w-full flex overflow-hidden antialiased text-gray-800">

            <main class="flex-grow flex min-h-0 ">
            @if(request()->has('user'))
                <section class="flex flex-col p-4 max-w-sm flex-none bg-gray-300 min-h-0 overflow-auto w-1/5">
                    @include('menu')
                </section>
              @endif
                <section aria-label="main content" class="flex min-h-0 flex-col flex-auto">
                    @yield('body')

                </section>
              
              </div>
            </main>
  </body>

  </html>
        
