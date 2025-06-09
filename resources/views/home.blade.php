@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @php
    $heroImages = ['Gunung-Slamet.jpg', 'Sate-Buntel-Pak-Gambir.jpg', 'Curug-Cipendok.jpg', 'Owabong-Water-Park.jpg'];

    $destinationImages = ['Gunung-Slamet.jpg', 'Sate-Buntel-Pak-Gambir.jpg', 'Curug-Cipendok.jpg'];
    @endphp
    <!-- Hero Carousel Section -->
    <section id="hero-carousel" class="position-relative">
        <div id="destinationCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                @foreach($featuredDestinations as $index => $destinasi)
                    <button type="button" data-bs-target="#destinationCarousel" data-bs-slide-to="{{ $index }}" 
                            class="{{ $index == 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
            
            <div class="carousel-inner">
                @foreach($featuredDestinations as $index => $destinasi)
                    @php
                        $heroImage = asset('images/' . $heroImages[$index % count($heroImages)]);
                    @endphp
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="hero-slide" style="background-image: url('{{ $heroImage }}');">
                            <div class="hero-overlay"></div>
                            <div class="container">
                                <div class="row align-items-center min-vh-100">
                                    <div class="col-lg-8">
                                        <div class="hero-content text-white">
                                            <span class="badge bg-primary mb-3 px-3 py-2">Featured Destination</span>
                                            <h1 class="display-2 fw-bold mb-4">{{ $destinasi->name }}</h1>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                <span class="fs-5">{{ $destinasi->location }}</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-4">
                                                <div class="text-warning me-3">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= floor($destinasi->rating))
                                                            <i class="fas fa-star"></i>
                                                        @elseif($i - 0.5 <= $destinasi->rating)
                                                            <i class="fas fa-star-half-alt"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span class="fs-5 fw-bold me-3">{{ $destinasi->rating }}</span>
                                                <span class="fs-4 fw-bold text-primary">Rp {{ number_format($destinasi->price, 0, ',', '.') }} <small class="fs-6 text-white-50">/orang</small></span>
                                            </div>
                                            <p class="fs-5 mb-4 text-white-75" style="max-width: 600px;">
                                                {{ $destinasi->description }}
                                            </p>
                                            <div class="d-flex gap-3">
                                                <a href="#" class="btn btn-primary btn-lg px-4 py-3">
                                                    <i class="fas fa-eye me-2"></i>Jelajahi Sekarang
                                                </a>
                                                <a href="#" class="btn btn-outline-light btn-lg px-4 py-3">
                                                    <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#destinationCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#destinationCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Featured Destinations Section -->
    <section id="featured-destinations" class="py-5 bg-light">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-5">
                <span class="text-primary fw-semibold text-uppercase tracking-wider mb-3 d-block">
                    know some destination locations before you travel
                </span>
                <h2 class="display-4 fw-bold text-dark mb-4">VARIOUS DESTINATIONS FOR YOU</h2>
                <div class="mx-auto bg-primary" style="width: 100px; height: 4px; border-radius: 2px;"></div>
            </div>

            <!-- Destinations Grid -->
            <div class="row g-4">
                @foreach($mainDestinations as $destinasi)
                    @php
                        $destinationImage = asset('images/' . $destinationImages[$loop->index % count($destinationImages)]);
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm destination-card border-0">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ $destinationImage }}" 
                                     class="card-img-top destination-img" alt="{{ $destinasi->name }}" style="height: 250px; object-fit: cover;">
                                
                                <!-- Featured Badge -->
                                <span class="badge bg-primary position-absolute top-0 start-0 m-3">
                                    <i class="fas fa-star me-1"></i>Featured
                                </span>

                                <!-- Category Badge -->
                                <span class="badge bg-success position-absolute top-0 end-0 m-3">
                                    {{ $destinasi->category }}
                                </span>

                                <!-- Overlay -->
                                <div class="card-overlay"></div>
                            </div>

                            <div class="card-body p-4">
                                <!-- Location -->
                                <div class="d-flex align-items-center text-muted mb-3">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <small>{{ $destinasi->location }}</small>
                                </div>

                                <!-- Title -->
                                <h5 class="card-title fw-bold mb-3">{{ $destinasi->name }}</h5>

                                <!-- Rating -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="text-warning me-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($destinasi->rating))
                                                <i class="fas fa-star"></i>
                                            @elseif($i - 0.5 <= $destinasi->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="fw-bold me-2">{{ $destinasi->rating }}</span>
                                    <small class="text-muted">({{ rand(10, 500) }} reviews)</small>
                                </div>

                                <!-- Description -->
                                <p class="card-text text-muted mb-4" style="font-size: 0.9rem; line-height: 1.6;">
                                    {{ Str::limit($destinasi->description, 100) }}...
                                </p>

                                <!-- Price and Button -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="h5 text-primary fw-bold">Rp {{ number_format($destinasi->price, 0, ',', '.') }}</span>
                                        <small class="text-muted d-block">per orang</small>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-sm px-3">
                                        <i class="fas fa-eye me-1"></i>Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-5">
                <a href="{{ route('destinasi.index') }}" class="btn btn-outline-primary btn-lg px-5 py-3">
                    <i class="fas fa-compass me-2"></i>Lihat Semua Destinasi
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize carousel
        var carousel = new bootstrap.Carousel(document.getElementById('destinationCarousel'), {
            interval: 5000,
            wrap: true,
            pause: 'hover'
        });

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation for images
        const images = document.querySelectorAll('.destination-img');
        images.forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });
        });
    });
</script>
@endsection