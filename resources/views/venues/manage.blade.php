<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Venue Management</h2><br>
        <a href="{{ route('venue.create') }}">
            <x-button>
                {{ __('Create Venue') }}
            </x-button>
        </a> 

        <!-- Enclosing div with white background -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <!-- Venue Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-black">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Title</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Description</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Location</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless($venues->isEmpty())
                            @foreach ($venues as $venue)
                                <tr class="hover:bg-gray-100">
                                    <td class="border-2 border-black px-4 py-2">{{ $venue->venue_title }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ $venue->venue_description }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ $venue->venue_location }}</td>
                                    <td class="border-2 border-black px-4 py-2">
                                        <!-- Edit button -->
                                        <a href="{{ route('venue.edit', $venue->id) }}" class="text-blue-500 hover:text-blue-700 mr-2 px-2 py-1 rounded-md bg-blue-100 hover:bg-blue-200 transition-colors duration-300">Edit</a>

                                        <!-- Delete button -->
                                        <form method="POST" action="{{ route('venue.destroy', $venue->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 px-2 py-1 rounded-md bg-red-100 hover:bg-red-200 transition-colors duration-300">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="border-2 border-black px-4 py-2">No venues found</td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
