<x-layout>

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24 shadow-lg">
    
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1 text-green-700">Edit Loki Merch & Lore Entry</h2>
        <p class="mb-4 text-gray-600">Edit: {{$listing->title}}</p>
    </header>

    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="inline-block text-lg mb-2">
                Source / Seller
            </label>
            <input type="text"
                class="border border-gray-200 rounded p-2 w-full" name="source" value="{{$listing->source}}" placeholder="Example: Marvel Store, Norse Mythology Texts">

            @error('source')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="inline-block text-lg mb-2">
                Item or Story Title
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$listing->title}}" placeholder="Example: Loki Variant Figure / Loki & Sleipnir Myth">

            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
        <label class="inline-block text-lg mb-2">
        Category
        </label>

        <select name="category"
        class="border border-gray-200 rounded p-2 w-full">

        <option value="Artifact" {{ old('category', $listing->category) == 'Artifact' ? 'selected' : '' }}>Artifact</option>
        <option value="Norse Mythology" {{ old('category', $listing->category) == 'Norse Mythology' ? 'selected' : '' }}>Norse Mythology</option>
        <option value="Variant Record" {{ old('category', $listing->category) == 'Variant Record' ? 'selected' : '' }}>Variant Record</option>
        <option value="Timeline Event" {{ old('category', $listing->category) == 'Timeline Event' ? 'selected' : '' }}>Timeline Event</option>
        <option value="Sacred Relic" {{ old('category', $listing->category) == 'Sacred Relic' ? 'selected' : '' }}>Sacred Relic</option>
        <option value="Merchantry Object" {{ old('category', $listing->category) == 'Merchantry Object' ? 'selected' : '' }}>Merchantry Object</option>
        <option value="Lore Entry" {{ old('category', $listing->category) == 'Lore Entry' ? 'selected' : '' }}>Lore Entry</option>

        </select>
        </div>

        <div class="mb-6">
            <label class="inline-block text-lg mb-2">
                Origin Category
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="origin" value="{{$listing->origin}}" placeholder="Example: MCU, Norse Mythology, Comics">

            @error('origin')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="inline-block text-lg mb-2">
                Reference Contact / Link
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contact" value="{{$listing->contact}}">

            @error('contact')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="inline-block text-lg mb-2">
                Purchase / Source URL
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{$listing->website}}">

            @error('website')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="inline-block text-lg mb-2">
                Tags
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{$listing->tags}}" placeholder="Example: TVA, Variant, Trickster, Norse Gods">

            @error('tags')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="inline-block text-lg mb-2">Upload Image</label>

            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

            <img class="w-48 mr-6 mb-6"
            src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('images/no-image.png') }}" alt=""/>


                @error('image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

        </div>
        
        
        <div class="mb-6">
            <label class="inline-block text-lg mb-2">
                Description / Lore Details
            </label>

            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Write lore background, item details, mythology references, or collectible info">{{ old('description', $listing->description) }}</textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6 text-center">
            <button class="bg-green-700 text-white rounded py-2 px-6 hover:bg-black transition">
                Update Entry
            </button>

            <a href="/" class="text-black ml-4">
                Back
            </a>
        </div>

    </form>

</div>

</x-layout>