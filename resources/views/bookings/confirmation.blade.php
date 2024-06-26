<!-- Confirmation page-->

<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Venue Booking') }}
        </h1>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Confirmation') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="mt-4">
                    <p class="text-xl font-semibold mb-2">Your booking has been confirmed!</p>
                    <p class="text-xl font-semibold mb-2">Booking ID: #<span class="font-semibold">{{ $booking->id }}</span></p>
                    <p class="text-gray-700">Venue: <span class="font-semibold">{{ $booking->venue->venue_title }}</span></p>
                    <p class="text-gray-700">Description: <span class="font-semibold">{{ $booking->venue->venue_description }}</span></p>
                    <p class="text-gray-700">Location: <span class="font-semibold">{{ $booking->venue->venue_location }}</span></p>
                    <p class="text-gray-700">Date: <span class="font-semibold">{{ $booking->date }}</span></p>
                    <p class="text-gray-700">Time Slots:</p>
                    <ul class="list-disc pl-8">
                        @foreach(json_decode($booking->time_slots) as $timeSlot)
                            <li>{{ $timeSlot }}</li>
                        @endforeach
                    </ul>
                    <br>
                    <p class="text-gray-900">Status: <span class="font-semibold">{{ $booking->status }}</span></p>
                    <p class="text-gray-700 mt-4">Booked by: <span class="font-semibold">{{ $booking->user->email }}</span></p>
                    <p class="text-xl font-semibold mb-2">Total Price: <span class="font-semibold">${{ $booking->total_cost }}</span></p>
                    <br>
                    @if (in_array($booking->status, ['Pending', 'Cancelled']))
                        <p class="text-xl font-semibold mb-2">Note: If you wish to pay in cash then pay at our nearest office</p>
                        <br>
                        <a href="{{ route('payment.form', $booking->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Checkout
                        </a>
                    @endif
                    <br>
                    <br>
                    <a href="{{ route('bookings.downloadPdf', $booking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Download PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
