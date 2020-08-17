<div>
    <div class=" md:flex pb-4 overflow-y-auto  border-t border-gray-300 pt-4">
    @if(count($ids)> 0 )   
        <a wire:click="prev" href="#" class="m-auto cursor-pointer">
            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" transform="rotate(180 0 0)">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
        </a>
    @endif
      
        @if($card == 'solicitacoes')
            @include('partials.home.solicitacoes')
        @elseif($card == 'atendimentos')
            @include('partials.home.atendimentos')
        @elseif($card == 'notificacoes')
            @include('partials.home.notificacoes')
        @endif
     
        @if(count($ids)> 0 )   
            <a  wire:click="next" href="#" class="m-auto cursor-pointer">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        @endif
        
    </div>
    @if(count($ids)> 0 )     
    <div class="flex justify-center w-full">
        @for($i =0 ; $i < count($ids) ; $i++ )
        <div wire:click="goTo({{$i}})" class="{{$i == $index ? 'bg-indigo-300' : 'bg-button'}} cursor-pointer  rounded-full w-3 h-3 mx-2">
        </div>   
        @endfor
        
    </div>            
    @endif
</div>
