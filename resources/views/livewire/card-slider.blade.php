<div>
    <div class=" md:flex pb-4 overflow-y-auto  border-t border-gray-300">
    @if($ids[$index] != null )   
        <a @if($index > 0) wire:click="prev" @endif href="#" class="m-auto cursor-pointer">
            <svg class="m-auto h-4 w-4 text-secondary group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                <path class="heroicon-ui" d="M5.41 11H21a1 1 0 0 1 0 2H5.41l5.3 5.3a1 1 0 0 1-1.42 1.4l-7-7a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.42 1.4L5.4 11z"></path>
                </svg>
        </a>
    @endif
        <div>
        @if($card == 'solicitacoes')
            @include('partials.home.solicitacoes')
        @elseif($card == 'atendimentos')
            @include('partials.home.atendimentos')
        @elseif($card == 'notificacoes')
            @include('partials.home.notificacoes')
        @endif
        </div>
        @if($ids[$index] != null )   
            <a @if($index < count($ids)-1) wire:click="next" @endif href="#" class="m-auto cursor-pointer">
                <svg class="m-auto h-4 w-4 text-secondary group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                    <path class="heroicon-ui" d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"/>
                    </svg>
            </a>
        @endif
        
    </div>
    @if($ids[$index] != null )   
    <div class="flex justify-center w-full">
        @for($i =0 ; $i < count($ids) ; $i++ )
        <div wire:click='goTo({{$i}})' class="{{$i == $index ? 'bg-indigo-300' : 'bg-button'}} cursor-pointer  rounded-full w-3 h-3 mx-2"></div>   
        @endfor
        
    </div>            
    @endif
</div>
