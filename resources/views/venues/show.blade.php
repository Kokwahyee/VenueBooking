<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Venue Details') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
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
                        <div>
                            <h3 class="font-semibold">Price:</h3> <!-- Added Price section -->
                            <p>${{ number_format($venue->venue_price, 2) }}</p>
                        </div>
                        <div class="mt-1 border-t pt-1 text-xs text-gray-500">
                            <a href="{{ route('booking.create', ['venue' => $venue->id]) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Book Venue
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Button to toggle comment section -->
                <button id="toggleCommentSection" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-xs mt-4">
                    Give Feedback
                </button>

                <!-- Comment Section (Initially hidden) -->
                <div id="commentSection" class="hidden mt-4">
                    <h3 class="font-semibold">Your Feedback:</h3>
                    <form action="{{ url('/venues/' . $venue->id . '/comments') }}" method="POST">
                        @csrf
                        <textarea name="content" rows="4" class="mt-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Enter your feedback here"></textarea>
                        <button type="submit" class="mt-2 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                            Submit
                        </button>
                    </form>
                </div>

                <!-- Existing comments -->
                <div class="mt-4">
                    <h3 class="font-semibold">Comments:</h3>
                    @foreach($venue->comments->sortByDesc('created_at') as $comment)
                        <div class="bg-gray-100 p-2 rounded mb-2">
                            <p>{{ $comment->content }}</p>
                            <small>by {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y \a\t H:i') }}</small>
                            @can('update', $comment)
                                <a href="{{ route('comments.edit', $comment->id) }}" class="text-blue-500 hover:text-blue-700 text-sm">Edit</a>
                            @endcan
                            @can('delete', $comment)
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mt-2 inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    document.getElementById('toggleCommentSection').addEventListener('click', function() {
        document.getElementById('commentSection').classList.toggle('hidden');
    });
</script>
