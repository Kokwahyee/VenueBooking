<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venue Details') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8"> <!-- Adjusted max-w class -->
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-auto">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="mt-4">
                            <img src="{{ asset($venue->venue_image) }}" alt="Venue Image" style="width: 100%;">
                        </div>
                    </div>
                    <div>
                        <div>
                            <h3 class="font-semibold">Venue:</h3>
                            <p>{{ $venue->venue_title }}</p>
                        </div>
                        <div>
                            <h3 class="font-semibold">Description:</h3>
                            <p>{{ $venue->venue_description }}</p>
                        </div>
                        <div>
                            <h3 class="font-semibold">Location:</h3>
                            <p>{{ $venue->venue_location }}</p>
                        </div>
                    </div>
                </div>
                

                <div class="mt-1 border-t pt-1 text-xs text-gray-500">
                    <a href="{{ route('booking.create', ['venue' => $venue->id]) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Book Venue
                    </a>
                </div>

                <!-- Add more details as needed -->
            </div>
        </div>
    </div>
</x-app-layout>
