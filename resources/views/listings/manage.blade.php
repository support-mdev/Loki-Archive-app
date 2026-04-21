<x-layout>

    <nav class="flex justify-between items-center mb-6 px-6">

        <ul class="flex space-x-6 text-lg">

        </ul>
    </nav>


    <main class="mx-4">

        <!-- Search -->
        <form action="/">
            <div class="relative border-2 border-gray-200 rounded-lg mb-6">
                <div class="absolute top-4 left-3">
                    <i class="fa fa-search text-gray-400"></i>
                </div>

                <input
                    type="text"
                    name="search"
                    class="h-14 w-full pl-10 pr-24 rounded-lg focus:outline-none"
                    placeholder="Search Loki merch, variants, mythology..."
                >

                <div class="absolute top-2 right-2">
                    <button
                        type="submit"
                        class="h-10 px-5 text-white rounded-lg bg-green-700 hover:bg-black"
                    >
                        Search
                    </button>
                </div>
            </div>
        </form>


        <div class="bg-gray-50 border border-gray-200 p-10 rounded shadow">

            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase text-green-700">
                    Manage Loki Archive Entries
                </h1>
            </header>


            <table class="w-full table-auto">

                <tbody>

                    @unless($listings->isEmpty())

                    @foreach($listings as $listing)

                    <tr class="border-gray-300">

                        <!-- Title -->
                        <td class="px-4 py-6 border-t border-b text-lg font-semibold">
                            <a href="/listings/{{$listing->id}}">
                                {{$listing->title}}
                            </a>

                            <p class="text-sm text-gray-500">
                                {{$listing->category}} • {{$listing->origin}}
                            </p>
                        </td>


                        <!-- Edit Button -->
                        <td class="px-4 py-6 border-t border-b text-lg">
                            <a
                                href="/listings/{{$listing->id}}/edit"
                                class="text-blue-500 hover:text-black"
                            >
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                        </td>


                        <!-- Delete Button -->
                        <td class="px-4 py-6 border-t border-b text-lg">

                            <form method="POST" action="/listings/{{$listing->id}}">
                                @csrf
                                @method('DELETE')

                                <button class="text-red-600 hover:text-black">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                    @else

                    <tr>
                        <td class="px-4 py-6 text-center text-gray-500">
                            No Loki entries found 🐍
                        </td>
                    </tr>

                    @endunless

                </tbody>

            </table>

        </div>

    </main>


    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-green-700 text-white h-24 opacity-90 md:justify-center">

    <p class="ml-2">
    © Loki Merch & Lore Archive
    </p>

    <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5 rounded">Add Entry</a>

    </footer>

</x-layout>