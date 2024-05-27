<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Request Change for Booking ID: {{ $booking->id }}</h2><br>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <form action="{{ route('bookings.submitChangeRequest', $booking->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="type" class="block text-gray-700">Type of Request</label>
                    <select id="type" name="type" class="form-select mt-1 block w-full">
                        <option value="refund">Refund</option>
                        <option value="change">Change</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="reason" class="block text-gray-700">Reason</label>
                    <textarea id="reason" name="reason" class="form-textarea mt-1 block w-full" rows="4"></textarea>
                </div>

                <div class="mb-4">
                    <label for="file" class="block text-gray-700">Upload Image/File</label>
                    <input type="file" id="file" name="file" class="form-input mt-1 block w-full">
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>