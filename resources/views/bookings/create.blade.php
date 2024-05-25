<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
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
                                <x-label :value="$venue->venue_description" style="font-weight: bold;" />
                            </div>

                            <!-- Venue Location -->
                            <div class="mt-4">
                                <x-label for="venue_location" :value="__('Location:')" />
                                <x-label :value="$venue->venue_location" style="font-weight: bold;" />
                            </div>
                            
                            <!-- User Email -->
                            <div class="mt-4">
                                <x-label for="user_email" :value="__('Booked by:')" />
                                <x-label :value="auth()->user()->email" style="font-weight: bold;" />
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div>
                            <!-- Date and Time -->
                            <div class="mt-4">
                                <x-label for="date" :value="__('Date')" />
                                <x-input id="date" class="block mt-1 w-full flatpickr" type="text" name="date" value="{{ date('Y-m-d', strtotime('+1 day')) }}" required />
                            </div>
                            
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

<script>
    flatpickr('.flatpickr', {
        dateFormat: 'Y-m-d', // Set the date format
        enableTime: false, // Disable time selection
        minDate: new Date().fp_incr(1), // Set the minimum selectable date to tomorrow
    });

    $(document).ready(function() {
        $('#time').select2();
    });

    $('#date').change(function () {
        var venueId = {{ $venue->id }};
        var selectedDate = $(this).val();
        var status = 'Cancelled';

        // Send AJAX request to fetch booked time slots for the selected date
        $.ajax({
            url: '{{ route("bookings.getTimeSlots") }}',
            method: 'GET',
            data: { date: selectedDate, venue_id: venueId, status: status },
            success: function (response) {
                // Log the response
                console.log('Response:', response);

                // Clear all checkboxes before updating with the new response
                $('input[type="checkbox"]').prop('checked', false).prop('disabled', false);

                // Iterate through each element of the response array
                response.forEach(function (element) {
                    // Parse the JSON array within the string
                    var bookedTimeSlots = JSON.parse(element);

                    // Log the booked time slots
                    console.log('Booked Time Slots:', bookedTimeSlots);

                    // Disable booked time slots checkboxes
                    bookedTimeSlots.forEach(function (timeSlot) {
                        console.log('Disabling time slot:', timeSlot);
                        $('input[type="checkbox"][value="' + timeSlot + '"]').prop('disabled', true);
                    });
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>