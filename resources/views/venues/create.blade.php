<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Venue') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('venue.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Venue Title -->
                    <div>
                        <x-label for="venue_title" :value="__('Title')" />

                        <x-input id="venue_title" class="block mt-1 w-full" type="text" name="venue_title" required autofocus />
                    </div>

                    <!-- Venue Description -->
                    <div class="mt-4">
                        <x-label for="venue_description" :value="__('Description')" />

                        <textarea id="venue_description" class="block mt-1 w-full" name="venue_description" required></textarea>
                    </div>

                    <!-- Venue Location -->
                    <div class="mt-4">
                        <x-label for="venue_location" :value="__('Location')" />

                        <x-input id="venue_location" class="block mt-1 w-full" type="text" name="venue_location" required />
                    </div>

                    <!-- Venue Images -->
                    <div class="mb-3">
                        <label>Upload File/Image</label>
                        <input type="file" name="venue_image" class="form-control" />
                    </div>

                    <!-- Venue Price -->
                    <div>
                        <x-label for="venue_price" :value="__('Price Per Hour')" />

                        <x-input id="venue_price" class="block mt-1 w-full" type="number" name="venue_price" placeholder="0.00" min="0" value="0" step="0.05" pattern="^\d+(?:\.\d{1,2})?$" required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('venue_price').addEventListener('blur', function() {
        let value = parseFloat(this.value);
        if (!isNaN(value)) {
            let roundedValue = Math.round(value / 0.05) * 0.05;
            this.value = roundedValue.toFixed(2); // Ensure two decimal places
        }
    });
</script>