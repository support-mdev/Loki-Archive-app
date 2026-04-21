@if(session()->has('message'))
    <div x-data="{show: true}" x-init ="setTimeout(() => show = false, 3000)" x-show="show" class ="fixed top-20 inset-x-0 flex justify-center z-50 bg-laravel text-white px-6 py-3">

        <p>
            {{ session('message') }}
        </p>
    </div>

@endif