<x-layout>

<div class="bg-green-900 border border-gray-700 p-10 rounded max-w-lg mx-auto mt-24 shadow-lg">
    
    <header class="text-center">
        <h2 class="text-2xl font-bold text-yellow-400 text-center">TVA ARCHIVE SUBMISSION        </h2>
        <p class="mb-4 text-slate-900 dark:text-white">
           Submit Entry to the Sacred Timeline Archive
        </p>
    </header>

    <form method="POST" action="/listings" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
                Source Archive
            </label>
            <input type="text"
                class="border border-gray-200 rounded p-2 w-full" name="source" value="{{ old('source') }}" placeholder="Example: Marvel Store, Norse Mythology Texts">

            @error('source')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
                Artifact or Story Title
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{ old('title') }}" placeholder="Example: Loki Variant Figure / Loki & Sleipnir Myth">

            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
        <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
        Category
        </label>

        <select name="category"
        class="border border-gray-200 rounded p-2 w-full ">

        <option value="Artifact" {{ old('category') == 'Artifact' ? 'selected' : '' }}>Artifact</option>
        <option value="Norse Mythology" {{ old('category') == 'Norse Mythology' ? 'selected' : '' }}>Norse Mythology</option>
        <option value="Variant Record" {{ old('category') == 'Variant Record' ? 'selected' : '' }}>Variant Record</option>
        <option value="Timeline Event" {{ old('category') == 'Timeline Event' ? 'selected' : '' }}>Timeline Event</option>
        <option value="Sacred Relic" {{ old('category') == 'Sacred Relic' ? 'selected' : '' }}>Sacred Relic</option>
        <option value="Merchantry Object" {{ old('category') == 'Merchantry Object' ? 'selected' : '' }}>Merchantry Object</option>
        <option value="Lore Entry" {{ old('category') == 'Lore Entry' ? 'selected' : '' }}>Lore Entry</option>
        
        </select>
        </div>

        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
                Timeline Origin
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="origin" placeholder="Example: MCU, Norse Mythology, Comics">

            @error('origin')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
                Reference Contact / Link
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contact" value="{{ old('contact') }}">

            @error('contact')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>



        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
                Purchase / Source URL
            </label>

            <input type="url" class="border border-gray-200 rounded p-2 w-full" name="website" required value="{{ old('website') }}">

            @error('website')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
                Tags
            </label>

            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{ old('tags') }}" placeholder="Example: TVA, Variant, Trickster, Norse Gods">

            @error('tags')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">Upload Image</label>

            <input type="file" class="border border-gray-200 rounded p-2 w-full text-slate-900 dark:text-white" name="image" />

                @error('image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

        </div>
        
        
        <div class="mb-6">
            <label class="inline-block text-lg mb-2 text-slate-900 dark:text-white">
                Description / Lore Details
            </label>

            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value="{{ old('description') }}" rows="10" placeholder="Write lore background, item details, mythology references, or collectible info"></textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6 text-center">
            <button class="bg-green-700 text-white rounded py-2 px-6 hover:bg-black transition">
                Add Entry
            </button>

            <a href="/" class="text-slate-900 dark:text-white ml-4">
                Back
            </a>
        </div>

    </form>

</div>

</x-layout>