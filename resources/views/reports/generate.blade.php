<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report from ') . $startDate->format('Y-m-d') . __(' to ') . $endDate->format('Y-m-d') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <h3 class="text-lg font-semibold mb-4">Total Bookings: {{ $bookings->count() }}</h3>
                <h3 class="text-lg font-semibold mb-4">Total Users: {{ $totalUsers }}</h3>
                <h3 class="text-lg font-semibold mb-4">Total Venues: {{ $totalVenues }}</h3>

                <canvas id="bookingsChart"></canvas>

                <h3 class="text-lg font-semibold mt-6 mb-4">Venue Earnings</h3>
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">Venue</th>
                            <th class="px-4 py-2 border-b">Total Earnings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venueEarnings as $venue)
                            <tr>
                                <td class="px-4 py-2 border-b text-center">{{ $venue->venue_title }}</td>
                                <td class="px-4 py-2 border-b text-center">${{ $venue->total_earnings }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>

                <form method="POST" action="{{ route('reports.download') }}">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ $startDate->format('Y-m-d') }}">
                    <input type="hidden" name="end_date" value="{{ $endDate->format('Y-m-d') }}">
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Download Report as PDF') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('bookingsChart').getContext('2d');
        const bookingsChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Paid', 'Cancelled'],
                datasets: [{
                    label: 'Booking Status',
                    data: [
                        {{ $bookings->where('status', 'Pending')->count() }},
                        {{ $bookings->where('status', 'Paid')->count() }},
                        {{ $bookings->where('status', 'Cancelled')->count() }}
                    ],
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Booking Status'
                    }
                }
            },
        });
    </script>
</x-app-layout>
