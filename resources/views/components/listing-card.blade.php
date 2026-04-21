@props(['listing'])

<x-card>

        <div class="flex gap-2 items-top">

            <!-- Image with TVA scan effect -->
        <div class="relative hidden md:block w-48 mr-6 overflow-hidden rounded-lg">

        <img
            class="rounded-lg shadow-2xl"
            src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('images/no-image.png') }}"
            alt=""
        >

        <!-- TVA scan overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-yellow-400/30 to-transparent animate-[scan_3s_linear_infinite] pointer-events-none"></div>

        </div>
        <!-- Image with TVA scan effect end -->

            <div>

                <h3 class="text-2xl mb-2 text-yellow-300">
                <a href="/listings/{{$listing->id}}">
                {{$listing->title}}
                </a>
                </h3>

                <div class="text-xl font-bold mb-2">
                Source: {{$listing->source}}
                </div>

            <div class="mt-2 space-y-2">
                <!-- Category -->
                <span class="inline-block bg-gray-300 text-sm px-3 py-1 rounded text-gray-950">
                {{$listing->category}}
                </span>

                <!-- Tags -->
                <div>
                <x-listing-tags :tagsCsv="$listing->tags" />
                </div>
            </div>

            <div class="text-lg mt-4">
            <i class="fa-solid fa-book"></i>
            Origin: {{$listing->origin}}
            </div>

        </div>

    </div>

</x-card>