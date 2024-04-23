<x-app-layout>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Booking Management</h2><br>

        <!-- Booking Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Venue</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Timeslots</th>
                        <th class="px-4 py-2">Booked By</th>
                    </tr>
                </thead>
                <tbody>
                    @unless($bookings->isEmpty())
                        @foreach ($bookings as $booking)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $booking->venue->venue_title }}</td>
                                <td class="border px-4 py-2">{{ $booking->date }}</td>
                                <td class="border px-4 py-2">{{ implode(', ', json_decode($booking->time_slots)) }}</td>
                                <td class="border px-4 py-2">{{ $booking->user->email }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="border px-4 py-2">No bookings found</td>
                        </tr>
                    @endunless
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
