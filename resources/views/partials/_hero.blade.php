<section class="relative h-72 flex flex-col justify-center items-center text-center space-y-4 my-4 bg-gradient-to-r from-yellow-900 via-green-900 to-black text-white overflow-hidden">

    <!-- TVA scanline overlay -->
    <div class="absolute inset-0 opacity-20"
         style="background-image: repeating-linear-gradient(
             45deg,
             rgba(255,255,255,0.05),
             rgba(255,255,255,0.05) 2px,
             transparent 2px,
             transparent 6px
         );">
    </div>

    <div class="z-10">

        <!-- TVA archive label -->
        <span class="inline-block bg-yellow-600 text-black text-xs font-bold px-3 py-1 rounded-full tracking-widest uppercase mb-2">
            TVA Archive File
        </span>

        <!-- Main title -->
        <h1 class="text-6xl uppercase tracking-widest"
            style="font-family: 'Cinzel', serif;">
            Loki<span class="text-yellow-400">Laufeyson</span>
        </h1>

        <!-- Subtitle -->
        <p class="text-2xl text-gray-200 font-italic">
            Norse God of Mischief, Time Variant, and All Things Loki
        </p>

        <!-- Quote of the Day (now inside hero) -->
        @isset($quote)
        <p class="italic text-lg text-yellow-200 mt-2">
            ✨ "{{ $quote }}" ✨
        </p>
        @endisset

        <!-- Button -->
        <div class="mt-3">
            <a href="/register"
                class="inline-block border-2 border-white text-white py-2 px-5 rounded-xl uppercase hover:text-black hover:bg-yellow-400 hover:border-yellow-400 transition">
                Pardon
            </a>
        </div>

    </div>
</section>