<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Book Venue') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form id="bookingForm" method="POST" action="{{ route('bookings.store') }}">
                    @csrf
                    <input type="hidden" name="venue_id" value="{{ $venue->id }}">
                    <input type="hidden" id="venue_price" value="{{ $venue->venue_price }}">
                    <input type="hidden" id="total_cost" name="total_cost">

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

                            <!-- Venue Price -->
                            <div class="mt-4">
                                <x-label for="venue_price" :value="__('Price Per Hour:')" />
                                <x-label :value="$venue->venue_price" style="font-weight: bold;" />
                            </div>
                        </div>

                        <!-- Second Column -->
                        <div>
                            <!-- Date and Time -->
                            <div class="mt-4">
                                <x-label for="date" :value="__('Date')" />
                                <x-input id="date" class="block mt-1 w-full flatpickr" type="text" name="date"  required />
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4 mt-2">
                                @foreach($timeSlots as $timeSlot)
                                  <div>
                                    <label class="inline-flex items-center">
                                      <input type="checkbox" name="time[]" value="{{ $timeSlot }}" class="form-checkbox h-5 w-5 text-indigo-600 time-slot-checkbox">
                                      <span class="ml-2 text-gray-700">{{ $timeSlot }}</span>
                                    </label>
                                  </div>
                                @endforeach
                            </div>
                            
                            <!-- Total Cost Display -->
                            <div class="mt-4">
                                <x-label for="total_cost_display" :value="__('Total Cost:')" />
                                <x-label id="total_cost_display" :value="'$0.00'" style="font-weight: bold;" />
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
        dateFormat: 'Y-m-d',
        enableTime: false,
        minDate: new Date().fp_incr(1),
    });

    $(document).ready(function() {
        $('#time').select2();
    });

    $('#date').change(function () {
        var venueId = {{ $venue->id }};
        var selectedDate = $(this).val();
        var status = 'Cancelled';

        $.ajax({
            url: '{{ route("bookings.getTimeSlots") }}',
            method: 'GET',
            data: { date: selectedDate, venue_id: venueId, status: status },
            success: function (response) {
                console.log('Response:', response);
                $('input[type="checkbox"]').prop('checked', false).prop('disabled', false);

                response.forEach(function (element) {
                    var bookedTimeSlots = JSON.parse(element);
                    console.log('Booked Time Slots:', bookedTimeSlots);

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

    // Calculate total cost based on selected time slots
    $('.time-slot-checkbox').change(function () {
        var selectedTimeSlots = $('.time-slot-checkbox:checked').length;
        var venuePrice = parseFloat($('#venue_price').val());
        var totalCost = selectedTimeSlots * venuePrice;
        $('#total_cost').val(totalCost.toFixed(2));
        $('#total_cost_display').text('$' + totalCost.toFixed(2));
    });

    $('#bookingForm').submit(function (e) {
        var totalCost = $('#total_cost').val();
        if (!totalCost || totalCost <= 0) {
            e.preventDefault();
            alert('Please select at least one time slot.');
        }
    });
</script>
