<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - BanyuMaseh</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container inline-flex" >
            <a href="{{ route('home') }}" class="site-brand">
                Banyu<span>Maseh</span>
            </a>
            <div id="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('destination') }}" class="nav-link {{ request()->routeIs('destination*') ? 'active' : '' }}">Destination</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pesan_tiket') }}" class="nav-link {{ request()->routeIs('pesan_tiket*') ? 'active' : '' }}">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('culinary') }}" class="nav-link {{ request()->routeIs('culinary*') ? 'active' : '' }}">Culinary</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('regional-art') }}" class="nav-link {{ request()->routeIs('regional-art*') ? 'active' : '' }}">Regional Art</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('history') }}" class="nav-link {{ request()->routeIs('history*') ? 'active' : '' }}">History</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about*') ? 'active' : '' }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login*') ? 'active' : '' }}">Login</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn-logout">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="header-home flex">
        <div class="container">
            <div class="header-title">
                @yield('header')
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container footer-row">
            <div class="footer-item">
                <a href="{{ route('home') }}" class="site-brand">
                    Banyu<span>Maseh</span>
                </a>
            </div>

            <div class="footer-item">
                <h2>Follow us on:</h2>
                <ul class="social-links">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                </ul>
            </div>

            <div class="footer-item">
                <h2>Another Pages:</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('destination') }}">Destination</a></li>
                    <li><a href="{{ route('culinary') }}">Culinary</a></li>
                    <li><a href="{{ route('regional-art') }}">Regional Art</a></li>
                    <li><a href="{{ route('history') }}">History</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>