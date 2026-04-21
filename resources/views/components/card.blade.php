{{-- <div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6 space-y-3']) }}>
    {{ $slot }}
</div> --}}


<div {{ $attributes->merge(['class' => 'bg-green-800 border border-green-700 rounded-lg p-6 space-y-3 shadow-md hover:border-4 hover:border-green-500 hover:shadow-green-900/40 transition-all dark:text-white']) }}>
    {{ $slot }}
</div>