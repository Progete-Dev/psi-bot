<div>
<div class="w-full overflow-hidden flex flex-wrap"> 
<!-- Login Section -->
 <div class="w-full md:w-1/2 flex flex-col">

    <div class="flex justify-center md:justify-start pt-8 ">
        <a href="#" class="bg-black text-button font-bold text-xl p-4">Logo</a>
    </div>

    <div class="flex flex-col justify-center md:justify-start p-8">
        <p class="text-center text-3xl">Pré Cadastro</p>
        <form wire:submit.prevent="enviar" class="flex flex-col pt-3 md:pt-8"  method="POST">
          @csrf
            <div class="flex flex-col pt-4">
                <label for="nome-completo" class="text-lg"> Nome Completo</label>
                <input wire:model="nome" placeholder="Digite aqui seu no Completo" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('nome') border border-red-500 @enderror">
            </div>
            @error('nome')
              <span class="invalid-feedback text-red-500 text-xs p-2" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="flex flex-col pt-4 mt-2">
                <label for="email" class="text-lg">Email</label>
                <input wire:model="email" type="email" id="email" name="email" placeholder="seu@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('email') border border-red-500 @enderror">
            </div>
            @error('email')
              <span class="invalid-feedback text-red-500 text-xs p-2" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="flex flex-col pt-4 mt-2">
                <label for="telefone" class="text-lg">Telefone</label>
                <input wire:model="telefone" type="telefone" id="telefone" name="telefone" placeholder="85999999999" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('telefone') border border-red-500 @enderror">
            </div>
            @error('telefone')
              <span class="invalid-feedback text-red-500 text-xs p-2" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            {{-- pattern="[0-9]{2}\/\d" --}}
            <div class="flex flex-col pt-4 mt-2">
                <label for="crp" class="text-lg">CRP</label>
                <input wire:model="crp" placeholder="00/00000" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('crp') border border-red-500 @enderror">                    
            </div>
            @error('crp')
            <span class="invalid-feedback text-red-500 text-xs p-2" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div class="w-full md:w-full mt-6 mb-6 md:mb-0">
                <label  class="text-lg" for="grid-zip">
                  Cep
                </label>
                <input wire:model.debounce.250ms="cep" wire:input.debounce.300ms='buscarEndereco' class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('cep') border border-red-500 @enderror" id="grid-zip" placeholder="6000000">
              </div>
            
            <div class="flex flex-wrap -mx-3 mb-2 mt-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label  class="text-lg" for="grid-city">
                    Cidade
                  </label>
                  <input wire:model="cidade" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('cidade') border border-red-500 @enderror" id="grid-city" placeholder="Russas">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="text-lg" for="grid-state">
                    Estado
                  </label>
                  <div class="relative">
                    <select wire:model="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('estado') border border-red-500 @enderror" id="grid-state">
                        @foreach ($estados as $cod => $nome)
                            <option value="{{$cod}}" {{$cod==$nome ? "selected" : ""}}> {{$nome}} </option>
                        @endforeach
                        
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                </div>
                
              </div>
              <button type="submit"  class="bg-indigo-600 text-button font-bold text-lg hover:bg-gray-700 p-2 mt-8">Enviar</button>
        </form>

    </div>

  </div>

  <!-- Image Section -->
  <div class="w-1/2 shadow-2xl h-full overflow-hidden">
    <img class="object-cover w-full hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
  </div>
</div>
</div>