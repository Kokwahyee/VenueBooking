<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Booking Website</title>
    <link rel="stylesheet" href="STYLES.css">
</head>
<body>
    <header>
        <a href="/">
            <x-application-mark class="block h-9 w-auto" />
        </a>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Venues</a>
                    <ul class="dropdown">
                        <li><a href="#">Venue List</a></li>
                        <li><a href="#">Venue Management</a></li>
                    </ul></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="login-register">
            @if (Route::has('login'))
                <div class="login-register">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-login">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-register">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <div class="hero">
        <h2 style="color: black">Welcome to Venue Master</h2>
        <div class="search-bar">
            <input class="input-search" type="text" placeholder="Search for venues">
            <button class="btn-search">Search</button>
        </div>
        <div class="featured-venues">
            <div class="venue-card">
                <img src="https://www.fijisportscouncil.com.fj/wp-content/uploads/2023/05/HFC-Bank-Stadium-drone-shot-Photo-Leon-Lord-1-1024x576.jpg" alt="Venue 1">
                <div class="venue-card-content">
                    <h3>Venue 1</h3>
                    <p>Location: City</p>
                    @auth
                        <a href="{{ url('bookings.create') }}" class="btn-login">Book</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-booking">Book</a>
                    @endauth
                </div>
            </div>
            <div class="venue-card">
                <img src="https://www.fijisportscouncil.com.fj/wp-content/uploads/2023/05/HFC-Bank-Stadium-Fisheye_Marist-7s-2023-1024x559.jpg" alt="Venue 2">
                <div class="venue-card-content">
                    <h3>Venue 2</h3>
                    <p>Location: City</p>
                    @auth
                        <a href="{{ url('bookings.create') }}" class="btn-login">Book</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-login">Book</a>
                    @endauth
                </div>
            </div>
            <div class="venue-card">
                <img src="https://www.fijisportscouncil.com.fj/wp-content/uploads/2023/05/HFC-Bank-Stadium-gate-entrance-1024x473.jpg" alt="Venue 3">
                <div class="venue-card-content">
                    <h3>Venue 3</h3>
                    <p>Location: City</p>
                    @auth
                        <a href="{{ url('bookings.create') }}" class="btn-login">Book</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-login">Book</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>


    <footer>
        <p>Contact us at: venuebooking@gmail.com</p>
    </footer>
</body>
</html>
