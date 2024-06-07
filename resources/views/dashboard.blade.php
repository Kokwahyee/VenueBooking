<x-app-layout>
    <title>User Dashboard - Event Booking System</title>
    <style>
        /* CSS Styles (from styles.css) */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 2em;
            color: #333;
        }

        header button {
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #333;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        header button:hover {
            background-color: #555;
        }

        .dashboard {
            display: flex;
        }

        .sidebar {
            width: 20%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            font-size: 1.2em;
            color: #333;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
        }

        .content {
            width: 80%;
            padding: 20px;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .team-member {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 2em;
            }

            .about-section h2, .team-section h2 {
                font-size: 1.5em;
            }

            .about-section p, .team-section p {
                font-size: 1em;
            }
        }
    </style>
    <div class="container">
        <header>
            <h1>Event Booking System</h1>
        </header>
        <div class="dashboard">
            <div class="sidebar">
                <ul>
                    <li><a href="{{ route('booking.index') }}">My Bookings</a></li>
                    <li><a href="{{ route('transaction') }}">My Transaction</a></li>
                    <li><a href="{{ route('profile.show') }}">Account Settings</a></li>
                </ul>
            </div>
            <div class="content">
                <div id="upcomingEvents" class="tab-content">
                    <h2>Upcoming Events</h2>
                    <div id="eventsList"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>