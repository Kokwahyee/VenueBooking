<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-lg font-semibold">Request Change Details</h2><br>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="font-bold">Request ID:</p>
                    <p>{{ $requestChange->id }}</p>
                </div>
                <div>
                    <p class="font-bold">Booking ID:</p>
                    <p>{{ $requestChange->booking_id }}</p>
                </div>
                <div>
                    <p class="font-bold">Type:</p>
                    <p>{{ $requestChange->type }}</p>
                </div>
                <div>
                    <p class="font-bold">Reason:</p>
                    <p>{{ $requestChange->reason }}</p>
                </div>
                <div>
                    <p class="font-bold">Status:</p>
                    <p>{{ $requestChange->request_status }}</p>
                </div>
                @if ($requestChange->file_path)
                    <div>
                        <p class="font-bold">Image:</p>
                        
                            <img src="{{ asset($requestChange->file_path) }}" alt="Image">
                        
                    </div>
                @endif
            </div>
            <hr class="mt-6">
            
            <!-- Comment Section -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold">Comments</h3>
                @forelse ($requestChange->requestComments as $comment)
                    <div class="mt-4">
                        <p class="font-bold">{{ $comment->user->name }}</p>
                        <p>{{ $comment->comment }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p>No comments yet.</p>
                @endforelse
                <form action="{{ route('request_comments.store') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="request_change_id" value="{{ $requestChange->id }}">
                    <textarea name="comment" id="comment" rows="3" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Add your comment..."></textarea>
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add Comment</button>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>
