<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-auto">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="venue_id" value="{{ $comment->venue_id }}">
                    <div>
                        <textarea name="content" rows="4" class="mt-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">{{ $comment->content }}</textarea>
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                            Update Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-auto">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="venue_id" value="{{ $comment->venue_id }}">
                    <div>
                        <textarea name="content" rows="4" class="mt-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">{{ $comment->content }}</textarea>
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                            Update Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mx-auto">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="venue_id" value="{{ $comment->venue_id }}">
                    <div>
                        <textarea name="content" rows="4" class="mt-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">{{ $comment->content }}</textarea>
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                            Update Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
