@isset($button)
<div x-cloak x-data="{}" x-init="initTheme();"  class="fixed md:bottom-0 md:top-auto top-0 right-0 m-4  p-2 md:w-12 md:h-12  h-10 w-10 bg-menu rounded-full shadow-md">
<button x-on:click="$dispatch('notificaoes');" type="button" class="flex relative text-button">
    @if(auth()->user()->hasNotifications())
        <div class="absolute bg-red-500 h-3 leading-3 mb-4 ml-4 right-0 rounded-full shadow-md text-white text-xs top-0 w-3 z-20">
            <span class="animate-ping bg-pink-400 duration-1000 h-full inline-flex opacity-75 rounded-full w-full"></span>
        </div>
    @endif
    <svg class="duration-150 ease-in-out group-focus:text-menu h-6 m-auto md:h-8 md:w-8 relative text-secondary transition w-6 z-10" stroke="none" fill="currentColor" viewBox="0 0 24 24">
      <path class="heroicon-ui" d="M15 19a3 3 0 0 1-6 0H4a1 1 0 0 1 0-2h1v-6a7 7 0 0 1 4.02-6.34 3 3 0 0 1 5.96 0A7 7 0 0 1 19 11v6h1a1 1 0 0 1 0 2h-5zm-4 0a1 1 0 0 0 2 0h-2zm0-12.9A5 5 0 0 0 7 11v6h10v-6a5 5 0 0 0-4-4.9V5a1 1 0 0 0-2 0v1.1z"></path>
    </svg>
  </button>
</div>
@endisset
@isset($notifications)
<div x-cloak x-data="{open : false}" x-on:notificaoes.window="open = true">
    <div x-show="open" class="fixed h-full w-full top-0 right-0 z-40">
      <div  x-on:click="open = false" x-show="open" class="fixed z-40 bg-gray-900 opacity-50 w-full h-full"></div>
      <div class="h-full md:flex md:flex-shrink-0 z-40 fixed right-0 dark:bg-gray-900 "  x-show="open">
      
        <div style="transition: linear 0.3s" x-show="open"  class="flex flex-col h-full  dark:bg-gray-900 bg-menu pt-5 pb-4 px-2  w-64 overflow-y-auto">
                <div class="flex justify-center ">        
                    <div class="font-bold text-secondary md:text-xl mb-4 border-b w-full border-gray-400">
                        <p class="" >Notificações</p>
                    </div>
                    <!-- Toggle Button -->
                    <label 
                    for="toogleTheme"
                  >
                    <!-- toggle -->
                    <div class="relative">
                      <style scoped>
                        .toggle__dot {
                          top: -.25rem;
                          left: -.25rem;
                          transition: all 0.3s ease-in-out;
                        }
                        
                        input:checked ~ .toggle__dot {
                          transform: translateX(100%);
                        }
                      </style>
                      <!-- input -->
                      <input id="toogleTheme" type="checkbox" class="hidden"  x-on:change="switchTheme($event.target)"/>
                      <!-- line -->
                      <div
                        class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"
                      ></div>
                      <!-- dot -->
                      <div
                        class="toggle__dot absolute w-6 h-6 bg-button rounded-full shadow inset-y-0 left-0"
                      ></div>
                    </div>
                    <!-- label -->

                  </label>
              </div>

                @if($notifications != false ){
                  @foreach(auth()->user()->notificacoes as $notification)
                  @component('partials.card')        
                  @slot('class',"text-secondary  font-sans quicksandoverflow-hidden hover:bg-secondary border hover:border-indigo-400 px-1 cursor-pointer")
                      <div class="text-sm">
                          <p class="text-right text-xs">{{$notification->created_at->format('d, M Y')}}</p>
                          <div class="truncate ">
                              <h2 class="font-bold text-md h-2 mb-8 ">{{$notification->notificacao}} </h2>
                          </div>
                          <p class="text-xs text-justify">
                              {{$notification->mensagem}}
                          <div class="justify-end mt-4 p-2 ">
                              <a class="text-secondary uppercase font-bold text-sm" href="#">Detalhes</a>
                          </div>
                      </div>
                  @endcomponent
                  @endforeach
                  @endif
        </div>
      </div>
    </div>
</div>
<script>
  function initTheme(){
    document.documentElement.setAttribute('data-theme', localStorage.getItem('theme'))
    document.getElementById('toogleTheme').checked = localStorage.getItem('theme') == 'dark';
  }
  function switchTheme(e) {
        if (e.checked == true) {
            localStorage.setItem('theme', 'dark');
            document.documentElement.setAttribute('data-theme', 'dark');

        } else {
            localStorage.setItem('theme', 'light');
            document.documentElement.setAttribute('data-theme', 'light');
        }    
    }
  
  
</script>

@endisset