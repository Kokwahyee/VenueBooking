<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Request Changes</h2><br>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-black">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">ID</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Booking ID</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Type</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Reason</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Status</th>
                            <th class="border-2 border-black px-4 py-2 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr class="hover:bg-gray-100">
                            @if (auth()->user()->id === $request->booking->user_id  || auth()->user()->role === "admin")
                                <td class="border-2 border-black px-4 py-2">{{ $request->id }}</td>
                                <td class="border-2 border-black px-4 py-2">{{ $request->booking_id }}</td>
                                <td class="border-2 border-black px-4 py-2">{{ $request->type }}</td>
                                <td class="border-2 border-black px-4 py-2">{{ $request->reason }}</td>
                                <td class="border-2 border-black px-4 py-2">{{ $request->request_status }}</td>
                                <td class="border-2 border-black px-4 py-2">
                                    <a href="{{ route('request_changes.show', $request->id) }}" class="text-blue-500 hover:text-blue-700 mr-2 px-2 py-1 rounded-md bg-blue-100 hover:bg-blue-200 transition-colors duration-300">View</a>
                                    @if (auth()->user()->id === $request->booking->user_id)
                                        <form action="{{ route('request_changes.destroy', $request->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 px-2 py-1 rounded-md bg-red-100 hover:bg-red-200 transition-colors duration-300">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            @else
                                <td class="border-black px-4 py-2">No records found.</td>
                            @endif
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>