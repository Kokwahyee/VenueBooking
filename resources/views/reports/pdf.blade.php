<!-- resources/views/reports/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Report from {{ $startDate }} to {{ $endDate }}</h1>
    <p>Total Bookings: <strong>{{ $totalBookings }}</strong></p>

    <h2>Booking Details</h2>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Venue</th>
                <th>Date</th>
                <th>User</th>
                <th>Time Slots</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->venue->venue_title }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ implode(', ', json_decode($booking->time_slots)) }}</td>
                    <td>{{ $booking->total_cost }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
