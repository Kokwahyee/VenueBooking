<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Report') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                @if(session('error'))
                    <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('reports.generate') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-label for="start_date" :value="__('Start Date')" />
                            <x-input id="start_date" class="block mt-1 w-full flatpickr" type="text" name="start_date" required autofocus />
                        </div>
                        <div>
                            <x-label for="end_date" :value="__('End Date')" />
                            <x-input id="end_date" class="block mt-1 w-full flatpickr" type="text" name="end_date" required />
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Generate Report') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    flatpickr('.flatpickr', {
        dateFormat: 'Y-m-d', // Set the date format
        enableTime: false, // Disable time selection
    });
</script>
