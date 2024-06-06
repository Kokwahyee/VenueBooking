<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Transaction</h2><br>

        <!-- Enclosing div with white background -->
        <div class="bg-white p-4 rounded-lg shadow-md">
            <!-- Transaction Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-black">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Payment ID</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Booking ID</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless($payments->isEmpty())
                            @foreach ($payments as $payment)
                                <tr class="hover:bg-gray-100">
                                    <td class="border-2 border-black px-4 py-2">{{ $payment->id }}</td>
                                    <td class="border-2 border-black px-4 py-2">{{ $payment->booking_id  }}</td>
                                    <td class="border-2 border-black px-4 py-2">${{ $payment->amount }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="border-2 border-black px-4 py-2">No transactions found</td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
