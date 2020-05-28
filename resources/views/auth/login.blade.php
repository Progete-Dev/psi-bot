@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="w-full overflow-hidden flex flex-wrap"> 
<!-- Login Section -->
 <div class="w-full md:w-1/2 flex flex-col">

    <div class="flex justify-center md:justify-start pt-12 ">
        <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
    </div>

    <div class="flex flex-col justify-center md:justify-start p-10">
        <p class="text-center text-3xl">Login</p>
        <form class="flex flex-col pt-3 md:pt-8"  method="POST" action="{{ route('login') }}">
          @csrf
            <div class="flex flex-col pt-4">
                <label for="email" class="text-lg">Email</label>
                <input type="email" id="email" name="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('email') border border-red-500 @enderror">
            </div>
            @error('email')
              <span class="invalid-feedback text-red-500 text-xs p-2" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="flex flex-col pt-4">
                <label for="password" class="text-lg">Senha</label>
                <input type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('password') border border-red-500 @enderror">
            </div>
            @error('password')
            <span class="invalid-feedback text-red-500 text-xs p-2" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            @if (Route::has('password.request'))
              <a class="block w-full text-sm text-right text-white hover:text-gray-300" href="{{route('password.request')}}">
                Forgot Password?
              </a>
            @endif
            <button type="submit"  class="bg-indigo-600 text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">Log In</button>
        </form>

    </div>

  </div>

  <!-- Image Section -->
  <div class="w-1/2 shadow-2xl h-full overflow-hidden">
    <img class="object-cover w-full hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
  </div>
</div>
@endsection
