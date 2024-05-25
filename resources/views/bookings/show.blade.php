<!-- resources/views/bookings/show.blade.php -->

<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Booking Details</h2><br>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div><br>
        @endif

        <!-- Enclosing div with white background -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <!-- Booking Details -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-black">
                    <tbody>
                        <tr>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Booking ID</th>
                            <td class="border-2 border-black px-4 py-2">{{ $booking->id }}</td>
                        </tr>
                        <tr>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Venue</th>
                            <td class="border-2 border-black px-4 py-2">{{ $booking->venue->venue_title }}</td>
                        </tr>
                        <tr>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Date</th>
                            <td class="border-2 border-black px-4 py-2">{{ $booking->date }}</td>
                        </tr>
                        <tr>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Timeslots</th>
                            <td class="border-2 border-black px-4 py-2">{{ implode(', ', json_decode($booking->time_slots)) }}</td>
                        </tr>
                        <tr>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Booked By</th>
                            <td class="border-2 border-black px-4 py-2">{{ $booking->user->email }}</td>
                        </tr>
                        @if(Auth::user() && Auth::user()->role === 'admin')
                        <tr>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Status</th>
                            <td class="border-2 border-black px-4 py-2">
                                <!-- Form to update status -->
                                <form action="{{ route('bookings.updateStatus', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div>
                                        <label>
                                            <input type="radio" name="status" value="Pending" {{ $booking->status == 'Pending' ? 'checked' : '' }}>
                                            Pending
                                        </label>
                                    </div>
                                    <div>
                                        <label>
                                            <input type="radio" name="status" value="Paid" {{ $booking->status == 'Paid' ? 'checked' : '' }}>
                                            Paid
                                        </label>
                                    </div>
                                    <div>
                                        <label>
                                            <input type="radio" name="status" value="Cancelled" {{ $booking->status == 'Cancelled' ? 'checked' : '' }}>
                                            Cancelled
                                        </label>
                                    </div>
                                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
                                </form>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Status</th>
                            <td class="border-2 border-black px-4 py-2">{{ $booking->status }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
``
