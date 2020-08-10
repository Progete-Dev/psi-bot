<div>
    <div class=" md:flex pb-4 overflow-y-auto  border-t border-gray-300">
        @if($index == -1)
            <h2 class="font-bold text-md h-2 m-auto text-secondary ">Sem Notificações</h2>
        @else        
        <a wire:click='anterior' href="#" class="m-auto cursor-pointer">
            <svg class="m-auto h-4 w-4 text-secondary group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                <path class="heroicon-ui" d="M5.41 11H21a1 1 0 0 1 0 2H5.41l5.3 5.3a1 1 0 0 1-1.42 1.4l-7-7a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.42 1.4L5.4 11z"></path>
                </svg>
        </a>
        <div class=" md:mx-2 my-2 text-secondary  font-sans quicksand bg-secondary overflow-hidden hover:bg-primary border hover:border-indigo-400 shadow-md rounded px-1 cursor-pointer">
                    
                    <div class="m-2 text-sm">
                        {{-- <p class="text-right text-xs">{{$notificacao->created_at->format('d, M Y')}}</p> --}}
                        <div class="truncate ">
                        {{-- <h2 class="font-bold text-md h-2 mb-8 ">{{$notificacao->assunto}}</h2> --}}
                        </div>
                        <p class="text-xs text-justify">
                            
                                {{$index}}
                            </p>
                            
                        </div>
                        <div class="justify-end mt-4 p-2 ">
                            <a class="text-secondary uppercase font-bold text-sm" href="#">Detalhes</a>
                        </div>
                    </div>
                    
                    <a wire:click='proximo' href="#" class="m-auto cursor-pointer">
                        <svg class="m-auto h-4 w-4 text-secondary group-focus:text-indigo-300 transition ease-in-out duration-150 m-auto" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                            <path class="heroicon-ui" d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"/>
                        </svg>
                    </a>
                </div>
                <div class="flex justify-center w-full">
                    <div class="bg-indigo-500 rounded-full w-3 h-3 mx-2"></div>   
                    <div class="bg-indigo-500 rounded-full w-3 h-3 mx-2"></div>   
                    <div class="bg-indigo-500 rounded-full w-3 h-3 mx-2"></div>   
                </div>    
            @endif
</div>            