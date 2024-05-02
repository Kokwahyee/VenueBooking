{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('STYLES.css') }}">
    <title>Document</title>
</head>
<body>
    <div>
        
        @livewire('navigation-menu')
    
        <!-- Page Heading -->
        @if (isset($header))
            <header>
                <div>
                    {{ $header }}
                </div>
            </header>
        @endif
</body>
</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('STYLES.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Styles -->
    @livewireStyles

    <!-- Custom CSS for Checkbox -->
    <style>
        /* CSS to add cross overlay on disabled checkboxes */
        input[type="checkbox"][disabled] {
            position: relative;
        }

        input[type="checkbox"][disabled]::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 1;
        }

        input[type="checkbox"][disabled]::after {
            content: '\2715'; /* Unicode for cross symbol */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.2rem;
            color: red; /* Change color as needed */
            z-index: 2;
        }
    </style>
</head>
<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-gray-100">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
<x-flash-message />
</body>
</html>

<script>
    flatpickr('.flatpickr', {
        dateFormat: 'Y-m-d', // Set the date format
        enableTime: false, // Disable time selection
        minDate: 'today', // Set the minimum selectable date to today
    });

    $(document).ready(function() {
        $('#time').select2();
    });

    $('#date').change(function () {
        var selectedDate = $(this).val();

        // Send AJAX request to fetch booked time slots for the selected date
        $.ajax({
            url: '{{ route("bookings.getTimeSlots") }}',
            method: 'GET',
            data: { date: selectedDate },
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
