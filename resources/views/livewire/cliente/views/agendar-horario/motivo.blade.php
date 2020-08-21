
<div class="p-2 my-2">
    <textarea wire:model.lazy="motivo" class="border @error('motivo') border-red-500 @enderror appearance-none bg-white  focus:outline-none h-40 overflow-scroll p-4 resize-none rounded w-full"></textarea>
    @error('motivo')
        <span class="invalid-feedback text-red-500 text-xs p-2" role="alert">
            {{$message}}
        </span>
    @enderror
</div>