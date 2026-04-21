<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1 text-yellow-300">Login</h2>
      <p class="mb-4">Log into your account to post archives</p>
    </header>

    <form method="POST" action="/login">
      @csrf

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="email" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white caret-white focus:outline-none focus:ring-2 focus:ring-green-400" name="email" value="{{old('email')}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2 dark:text-white">
          Password
        </label>
        <input type="password" name="password"class="w-full p-2 rounded border border-green-600 bg-green-900 text-white caret-white focus:outline-none focus:ring-2 focus:ring-green-400"
          value="{{old('password')}}" />

        {{-- <button type="button" onclick="togglePassword()" class="absolute right-3 top-2 text-green-300 hover:text-green-100 text-sm">
          Show
        </button> --}}

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Login
        </button>
      </div>

      <div class="mt-8">
        <p>
          Don't have an account?
          <a href="/register" class="text-laravel text-yellow-300">Register</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>