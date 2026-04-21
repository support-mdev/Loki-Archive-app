<x-layout>

@include('partials._hero', ['quote' => $quote])
@include('partials._search')


<div class="flex flex-wrap gap-3 justify-center mb-8">
    <a href="/" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-400">All</a>
    <a href="/?category=Artifact" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-black">Artifact</a>
    <a href="/?category=Variant Record" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-black">Variant Record</a>
    <a href="/?category=Timeline Event" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-black">Timeline Event</a>
    <a href="/?category=Norse Mythology" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-black">Norse Mythology</a>
    <a href="/?category=Sacred Relic" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-black">Sacred Relic</a>
    <a href="/?category=Merchantry Object" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-black">Merchantry Object</a>
    <a href="/?category=Lore Entry" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-black">Lore Entry</a>

</div>


<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@unless(count($listings) ==0)

@foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
@endforeach

@else 
    <p>No listings found</p>
@endunless

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>

</div>
</x-layout>