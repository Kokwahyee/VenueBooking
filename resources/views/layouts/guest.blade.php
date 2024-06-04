<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Venue Booking') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        /* Background Image for the body */
        body {
            background-image: url('https://th.bing.com/th/id/OIP.r_vDGac2hYeVs_v6LaVYogHaHa?rs=1&pid=ImgDetMain');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: bottom;
            background-color: #000; /* Fallback color */
        }

        /* Additional styles to make the content readable over the background image */
        .bg-overlay {
            background-color: rgba(255, 255, 255, 0.9);
            min-height: 100vh;
        }
    </style>
</head>
<body class="font-sans antialiased bg-overlay">
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <x-flash-message />
</body>
</html>
