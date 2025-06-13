<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Banyumas Tourism') - BanyuMaseh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand site-brand" href="{{ route('home') }}">
                Banyu<span>Maseh</span>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Main Navigation -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('destination*') || request()->routeIs('destinasi.*') ? 'active' : '' }}"
                            href="{{ route('destination') ?? route('user.destinasi.index') }}">Destination</a>
                    </li>
                    @if (Route::has('pesan_tiket'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pesan_tiket*') ? 'active' : '' }}"
                                href="{{ route('pesan_tiket') }}">Booking</a>
                        </li>
                    @endif
                </ul>

                <!-- User Navigation -->
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown">
                                @if (method_exists(Auth::user(), 'profile_photo_url') && Auth::user()->profile_photo_url)
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile"
                                        class="rounded-circle me-2" width="32" height="32">
                                @else
                                    <i class="fas fa-user-circle me-2 fs-4"></i>
                                @endif
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if (Route::has('profile.show'))
                                    <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i
                                                class="fas fa-user me-2"></i>Profile</a></li>
                                @endif
                                @if (method_exists(Auth::user(), 'isAdmin') && Auth::user()->isAdmin() && Route::has('admin.dashboard'))
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i
                                                class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i
                                                class="fas fa-sign-out-alt me-2"></i>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light ms-2 {{ request()->routeIs('login*') ? 'active' : '' }}"
                                href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @hasSection('header')
        <header class="header-home">
            <div class="container">
                <div class="header-title">
                    @yield('header')
                </div>
            </div>
        </header>
    @endif

    <!-- Main Content -->
    <main class="@hasSection('header')
''
@else
@endif">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row footer-row">
                <!-- Brand & Description -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-item">
                        <a href="{{ route('home') }}" class="site-brand">
                            Banyu<span>Maseh</span>
                        </a>
                        <p class="text-muted mt-3" style="width: max-content">Jelajahi keindahan dan budaya Banyumas.
                        </p>

                        <!-- Social Links -->
                        <div class="social-links mt-3">
                            <h6 class="mb-2">Follow us on:</h6>
                            <a href="#" class="me-3" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="me-3" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="me-3" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="me-3" title="Pinterest"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-item" style="width: max-content">
                        <h6>Main Pages</h6>
                        <ul class="list-unstyled mt-3">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('destination') ?? route('user.destinasi.index') }}">Destination</a></li>
                            <li><a href="{{ route('pesan_tiket') }}">Booking</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-3 col-md-6 mb-4" style="width: max-content">
                    <div class="footer-item" style="width: max-content">
                        <h6>Quick Links</h6>
                        <ul class="list-unstyled mt-3">
                            <li><a href="{{ route('help') }}">Help & Support</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-item" style="width: max-content">
                        <h6>Contact Info</h6>
                        <div class="contact-info mt-3" style="width: max-content">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt me-2 mt-1"></i>
                                <span class="small">Purwokerto, Banyumas, Jawa Tengah</span>
                            </div>
                            <div class="d-flex align-items-center mb-2" style="width: max-content">
                                <i class="fas fa-phone me-2"></i>
                                <span class="small">+62 812-3456-7890</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-envelope me-2"></i>
                                <span class="small">info@banyumaseh.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center mt-4 pt-4 border-top">
                <p class="mb-0 text-muted">&copy; {{ date('Y') }} BanyuMaseh Tourism. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
