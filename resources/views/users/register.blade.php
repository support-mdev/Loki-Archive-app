<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1 text-yellow-300">Register</h2>
      <p class="mb-4">Create an account to add archive items</p>
    </header>

    <form method="POST" action="/users">
      @csrf
      <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2"> Name </label>
        <input type="text" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white caret-white focus:outline-none focus:ring-2 focus:ring-green-400" name="name" value="{{old('name')}}" />

        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="email" class="border border-green-700 bg-green-900 text-white rounded p-2 w-full focus:ring-2 focus:ring-green-400" name="email" value="{{old('email')}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">
          Password
        </label>
        <input type="password" name="password" class="border border-green-700 bg-green-900 text-white rounded p-2 w-full focus:ring-2 focus:ring-green-400"
          value="{{old('password')}}" />

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="password2" class="inline-block text-lg mb-2">
          Confirm Password
        </label>
        <input type="password" class="border border-green-700 bg-green-900 text-white rounded p-2 w-full focus:ring-2 focus:ring-green-400" name="password_confirmation"
          value="{{old('password_confirmation')}}" />

        @error('password_confirmation')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Sign Up
        </button>
      </div>

      <div class="mt-8">
        <p>
          Already have an account?
          <a href="/login" class="text-laravel dark:text-yellow-300">Login</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>