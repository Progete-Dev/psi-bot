@if(count($ids)> 0 )                 
<div class="md:mx-2 my-2 text-secondary  font-sans quicksand bg-secondary overflow-hidden hover:bg-primary border hover:border-indigo-400 shadow-md rounded px-1 cursor-pointer">
    <div class="m-2 text-sm">
        <p class="text-right text-xs">{{$this->notificacao->created_at->format('d, M Y')}}</p>
        <div class="truncate ">
        <h2 class="font-bold text-md h-2 mb-8 ">{{$this->notificacao->assunto}}</h2>
        </div>
        <p class="text-xs text-justify">
            {{$this->notificacao->mensagem}}
        </p>

    </div>
    <div class="justify-end mt-4 p-2 ">
    <a class="text-secondary uppercase font-bold text-sm" href="#">Detalhes</a>
    </div>
    
</div>
@else
<div class="text-md leading-5 mx-auto mt-4 font-medium text-secondary">Sem Notificações</div>
@endif