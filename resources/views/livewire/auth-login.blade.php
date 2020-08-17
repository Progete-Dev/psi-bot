<div>

    <div class="flex justify-center md:justify-start pt-12 ">
        <a href="#" class="bg-black text-button font-bold text-xl p-4">Logo</a>
    </div>

    <div class="flex flex-col justify-center md:justify-start p-10">
        <p class="text-center text-3xl mb-2">Login</p>
        @include('shared.alerts.error')
        <form wire:submit.prevent="login" class="flex flex-col pt-3 md:pt-8"  method="POST">
            @csrf
            <div class="flex flex-col pt-4">
                <label for="email" class="text-lg">Email</label>
                <input wire:model="email" type="email" id="email" name="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('email') border border-red-500 @enderror">
            </div>
            <div class="flex flex-col pt-4">
                <label for="password" class="text-lg">Senha</label>
                <input wire:model="password" type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-secondary mt-1 leading-tight focus:outline-none focus:shadow-outline @error('password') border border-red-500 @enderror">
            </div>
            @if (Route::has('password.request'))
                <a class="block w-full text-sm text-right text-button hover:text-gray-300" href="{{route('password.request')}}">
                    Recupera senha
                </a>
            @endif
            <a href="#"  class="bg-indigo-600 text-button font-bold text-lg hover:bg-gray-700 p-2 mt-8">Realizar Pré cadastro </a>
            <button type="submit"  class="bg-indigo-600 text-button font-bold text-lg hover:bg-gray-700 p-2 mt-8">Log In</button>
        </form>

    </div>
</div>
