<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Venue') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('venue.update', $venue->id) }}"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Venue Title -->
                    <div>
                        <x-label for="venue_title" :value="__('Title')" />

                        <x-input id="venue_title" class="block mt-1 w-full" type="text" name="venue_title" required autofocus value="{{ $venue->venue_title }}" />
                    </div>

                    <!-- Venue Description -->
                    <div class="mt-4">
                        <x-label for="venue_description" :value="__('Description')" />

                        <textarea id="venue_description" class="block mt-1 w-full" name="venue_description" required>{{ $venue->venue_description }}</textarea>
                    </div>

                    <!-- Venue Location -->
                    <div class="mt-4">
                        <x-label for="venue_location" :value="__('Location')" />

                        <x-input id="venue_location" class="block mt-1 w-full" type="text" name="venue_location" required value="{{ $venue->venue_location }}" />
                    </div>

                    <!-- Venue Images -->
                    <div class="mb-3">
                        <label>Upload File/Image</label>
                        <input type="file" name="venue_image" class="form-control" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
