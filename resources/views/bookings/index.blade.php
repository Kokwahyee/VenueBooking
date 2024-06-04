<x-app-layout>
    <div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Booking Management</h2><br>

        <!-- Enclosing div with white background -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <!-- Booking Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-black">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Booking ID</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Venue</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Date</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Timeslots</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Booked By</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Status</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @unless($bookings->isEmpty())
                            @foreach ($bookings as $booking)
                                <tr class="hover:bg-gray-100">
                                    <td class="border-2 border-black px-4 py-2">{{ $booking->id }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ $booking->venue->venue_title }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ $booking->date }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ implode(', ', json_decode($booking->time_slots)) }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ $booking->user->email }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ $booking->status }}</td>
                                    <td class="border-2 border-black px-4 py-2">
                                        @if(Auth::user() && Auth::user()->role === 'admin')
                                            <a href="{{ route('bookings.confirmation', $booking->id) }}" class="text-blue-500 hover:text-blue-700 mr-2 px-2 py-1 rounded-md bg-blue-100 hover:bg-blue-200 transition-colors duration-300">View</a>
                                            <a href="{{ route('bookings.show', $booking->id) }}" class="text-green-500 hover:text-green-700 mr-2 px-2 py-1 rounded-md bg-green-100 hover:bg-green-200 transition-colors duration-300">Edit</a>
                                            <a href="{{ route('bookings.requestChange', $booking->id) }}" class="text-purple-500 hover:text-purple-700 px-2 py-1 rounded-md bg-purple-100 hover:bg-purple-200 transition-colors duration-300">Request Change</a>
                                        @else
                                            <a href="{{ route('bookings.confirmation', $booking->id) }}" class="text-blue-500 hover:text-blue-700 mr-2 px-2 py-1 rounded-md bg-blue-100 hover:bg-blue-200 transition-colors duration-300">View</a>
                                            <a href="{{ route('bookings.requestChange', $booking->id) }}" class="text-purple-500 hover:text-purple-700 px-2 py-1 rounded-md bg-purple-100 hover:bg-purple-200 transition-colors duration-300">Request Change</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="border-2 border-black px-4 py-2">No bookings found</td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
