<x-app-layout>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Venue Management</h2><br>
        <a href="{{ route('venue.create') }}">
            <x-button>
                {{ __('Add') }}
            </x-button>
        </a> 

        <!-- Venue Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @unless($venues->isEmpty())
                    @foreach ($venues as $venue)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $venue->venue_title }}</td>
                        <td class="border px-4 py-2">{{ $venue->venue_description }}</td>
                        <td class="border px-4 py-2">{{ $venue->venue_location }}</td>
                        <td class="border px-4 py-2">
                            <!-- Edit button -->
                        <a href="{{ route('venue.edit', $venue->id) }}" class="text-blue-500 hover:text-blue-700 mr-2 px-4 py-2 rounded-md bg-blue-100 hover:bg-blue-200 transition-colors duration-300">Edit</a>

                        <!-- Delete button -->
                        <form method="POST" action="{{ route('venue.destroy', $venue->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 px-4 py-2 rounded-md bg-red-100 hover:bg-red-200 transition-colors duration-300">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <p>No venues found</p>
                @endunless
                <div class="mt-2"> <!-- Reduced margin top -->
                    {{ $venues->links() }}
                </div>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
