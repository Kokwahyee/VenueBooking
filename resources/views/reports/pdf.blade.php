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
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h1, h2, h3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Venue Booking</h1>
    <h3>Report from {{ $startDate }} to {{ $endDate }}</h3>
    <p>Total Bookings: <strong>{{ $bookings->count() }}</strong></p>
    <p>Total Users: <strong>{{ $totalUsers }}</strong></p>
    <p>Total Venues: <strong>{{ $totalVenues }}</strong></p>

    <h2>Booking Status</h2>
    <table>
        <thead>
            <tr>
                <th>Status</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pending</td>
                <td>{{ $pendingCount }}</td>
            </tr>
            <tr>
                <td>Paid</td>
                <td>{{ $paidCount }}</td>
            </tr>
            <tr>
                <td>Cancelled</td>
                <td>{{ $cancelledCount }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Venue Earnings</h2>
    <table>
        <thead>
            <tr>
                <th>Venue</th>
                <th>Total Earnings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venueEarnings as $venue)
                <tr>
                    <td>{{ $venue->venue_title }}</td>
                    <td>${{ $venue->total_earnings }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
