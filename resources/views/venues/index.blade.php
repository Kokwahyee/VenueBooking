<x-app-layout>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials._search')<br>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> <!-- Changed from 2 to 3 columns -->
                @unless($venues->isEmpty())
                    @foreach ($venues as $venue)
                    <div class="col-md-4" style="position: relative;"> <!-- Added position: relative -->
                        <div class="bg-white shadow-md rounded-lg p-6" style="position: relative;"> <!-- Added position: relative -->
                            <h2 class="text-lg font-semibold">{{ $venue->venue_title }}</h2>
                            <div class="card" style="width: 300px; height: 200px;">
                                <div style="width: 100%; height: 100%; overflow: hidden;">
                                    <img src="{{ asset($venue->venue_image) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Venue Image" />
                                </div>
                            </div>
                            
                            <div class="mt-1 text-sm">
                                <!--<p>{{ $venue->venue_description }}</p>
                                <p>{{ $venue->venue_location }}</p> -->
                                <p class="text-gray-700">Price: ${{ number_format($venue->venue_price, 2) }} per hour</p> <!-- Display venue price -->
                                <div class="text-xs text-blue-500 p-2">
                                <a href="{{ route('venue.show', ['venue' => $venue->id]) }}">
                                    View Details
                                </a>
                                </div>
                            </div>
                            
                            <div class="mt-1 border-t pt-1 text-xs text-gray-500">
                                <a href="{{ route('booking.create', ['venue' => $venue->id]) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Book Venue
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>No venues found</p>
                @endunless
            </div>
            <div class="mt-2"> <!-- Reduced margin top -->
                {{ $venues->links() }}
            </div>
        </div>
    </div>
    <x-flash-message />
</x-app-layout>
