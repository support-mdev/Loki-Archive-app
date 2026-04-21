<x-layout>

@include('partials._search')

    <a href="/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">

        <x-card class="p-10">

            <div class="flex flex-col items-center justify-center text-center">

            <img class="w-48 mr-6 mb-6"
            src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('images/no-image.png') }}" alt=""/>

            <h3 class="text-2xl mb-2">
            {{$listing->title}}
            </h3>

            <div class="text-xl font-bold mb-4">
            Source: {{$listing->source}}
            </div>

            <span class="bg-gray-300 px-3 py-1 rounded text-sm mb-4">
            Category: {{$listing->category}}
            </span>

            <x-listing-tags :tagsCsv="$listing->tags" />

            <div class="text-lg my-4">
            <i class="fa-solid fa-book"></i>
            Origin: {{$listing->origin}}
            </div>

            <div class="border border-gray-200 w-full mb-6"></div>

            <div>

            <h3 class="text-3xl font-bold mb-4">
            Lore / Item Details
            </h3>

            <div class="text-lg space-y-6">

                <p>
                {{$listing->description}}
                </p>

                        @if($listing->contact)
                        <a href="mailto:{{$listing->contact}}"
                        class="block bg-green-700 text-white mt-6 py-2 rounded-xl hover:opacity-80">

                        <i class="fa-solid fa-envelope"></i>
                        Reference Contact

                        </a>
                        @endif


                        @if($listing->website)
                        <a href="{{$listing->website}}"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80">

                        <i class="fa-solid fa-globe"></i>
                        View Source / Purchase Link

                        </a>
                        @endif

            </div>

            </div>

            </div>

        </x-card>

        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{$listing->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit> 


            <form method="POST" action="/listings/{{$listing->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
            </form>
        </x-card>

    </div>

</x-layout>