<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Venue') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('bookings.store') }}">
                    @csrf
                    <input type="hidden" name="venue_id" value="{{ $venue->id }}">

                    <div class="grid grid-cols-2 gap-4">

                        <!-- First Column -->
                        <div>
                            <!-- Venue Title -->
                            <div>
                                <x-label for="venue_title" :value="__('Venue:')" />
                                <x-label :value="$venue->venue_title" style="font-weight: bold;" />
                            </div>

                            <!-- Venue Description -->
                            <div class="mt-4">
                                <x-label for="venue_description" :value="__('Description:')" />
                                <x-label value="{{ $venue->venue_description }}"  style="font-weight: bold;" />
                            </div>

                            <!-- Venue Location -->
                            <div class="mt-4">
                                <x-label for="venue_location" :value="__('Location:')" />
                                <x-label value="{{ $venue->venue_location }}"  style="font-weight: bold;" />
                            </div>
                            
                            <!-- User Email -->
                            <div class="mt-4">
                                <x-label for="user_email" :value="__('Booked by:')" />
                                <x-label value="{{ auth()->user()->email }}"  style="font-weight: bold;" />
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div>
                            <!-- Date and Time -->
                            <div class="mt-4">
                                <x-label for="date" :value="__('Date')" />
                                <x-input id="date" class="block mt-1 w-full flatpickr" type="text" name="date" value="{{ date('Y-m-d') }}" required />
                            </div>
                            
                            <div class="mt-4">
                                <x-label for="time" :value="__('Timeslot')" />
                            
                                <div class="grid grid-cols-3 gap-4 mt-2">
                                    @foreach($timeSlots as $timeSlot)
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="time[]" value="{{ $timeSlot }}" class="form-checkbox h-5 w-5 text-indigo-600">
                                            <span class="ml-2 text-gray-700">{{ $timeSlot }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            
                            
                            

                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Book') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

