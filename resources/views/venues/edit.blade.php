<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Venue') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form id="editVenueForm" method="POST" action="{{ route('venue.update', $venue->id) }}" enctype="multipart/form-data">
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
                    <div class="mt-4">
                        <label for="venue_image" class="block text-sm font-medium text-gray-700">Upload File/Image</label>
                        <div id="imagePreviewContainer" class="mt-2">
                            @if ($venue->venue_image)
                                <img id="currentImage" src="{{ asset($venue->venue_image) }}" alt="Venue Image" class="h-20 w-auto" />
                            @endif
                        </div>
                        <input type="file" name="venue_image" id="venue_image" class="form-input rounded-md shadow-sm mt-1 block w-full">
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

<script>
    // Add event listener for file input change event
    document.getElementById('venue_image').addEventListener('change', function(e) {
        // Get the selected file
        const file = e.target.files[0];
        
        // Check if a file is selected
        if (file) {
            // Create a new FileReader instance
            const reader = new FileReader();

            // Set the FileReader onload function
            reader.onload = function(e) {
                // Get the image preview container and current image element
                const imagePreviewContainer = document.getElementById('imagePreviewContainer');
                const currentImage = document.getElementById('currentImage');

                // Check if the current image exists
                if (currentImage) {
                    // Replace the current image source with the new image source
                    currentImage.src = e.target.result;
                } else {
                    // Create a new image element
                    const newImage = document.createElement('img');
                    newImage.src = e.target.result;
                    newImage.alt = 'Venue Image';
                    newImage.classList.add('h-20', 'w-auto');

                    // Append the new image to the image preview container
                    imagePreviewContainer.appendChild(newImage);
                }
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    });
</script>
