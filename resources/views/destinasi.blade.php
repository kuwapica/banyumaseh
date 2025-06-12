@extends('layouts.app')

@section('title', 'Destinasi')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-filter me-2"></i>Filter Destinasi</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('destinasi.index') }}" id="filterForm">
                            <!-- Search -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Cari Destinasi</label>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Masukkan nama destinasi..." value="{{ request('search') }}">
                            </div>

                            <!-- Category Filter -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select name="category" class="form-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}"
                                            {{ request('category') == $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Rating Filter -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Rating Minimal</label>
                                <select name="rating" class="form-select">
                                    <option value="">Semua Rating</option>
                                    <option value="4.5" {{ request('rating') == '4.5' ? 'selected' : '' }}>4.5+ ⭐
                                    </option>
                                    <option value="4.0" {{ request('rating') == '4.0' ? 'selected' : '' }}>4.0+ ⭐
                                    </option>
                                    <option value="3.5" {{ request('rating') == '3.5' ? 'selected' : '' }}>3.5+ ⭐
                                    </option>
                                    <option value="3.0" {{ request('rating') == '3.0' ? 'selected' : '' }}>3.0+ ⭐
                                    </option>
                                </select>
                            </div>

                            <!-- Buttons -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-2"></i>Terapkan Filter
                                </button>
                                <a href="{{ route('destinasi.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-undo me-2"></i>Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 col-md-8">
                <!-- Header & Sort -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1">Destinasi Wisata Banyumas</h2>
                        <p class="text-muted mb-0">
                            Menampilkan {{ $destinations->total() }} destinasi
                            @if (request('search'))
                                untuk "{{ request('search') }}"
                            @endif
                        </p>
                    </div>

                    <!-- Sort Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-sort me-2"></i>Urutkan
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'order' => 'asc']) }}">
                                    <i class="fas fa-sort-alpha-down me-2"></i>Nama A-Z
                                </a></li>
                            <li><a class="dropdown-item"
                                    href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'order' => 'desc']) }}">
                                    <i class="fas fa-sort-alpha-up me-2"></i>Nama Z-A
                                </a></li>
                            <li><a class="dropdown-item"
                                    href="{{ request()->fullUrlWithQuery(['sort' => 'rating', 'order' => 'desc']) }}">
                                    <i class="fas fa-star me-2"></i>Rating Tertinggi
                                </a></li>
                            <li><a class="dropdown-item"
                                    href="{{ request()->fullUrlWithQuery(['sort' => 'price', 'order' => 'asc']) }}">
                                    <i class="fas fa-dollar-sign me-2"></i>Harga Terendah
                                </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Destinations Grid -->
                @if ($destinations->count() > 0)
                    <div class="row">
                        @foreach ($destinations as $destinasi)
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                                <div class="card h-100 shadow-sm destination-card">
                                    <!-- Image -->
                                    <div class="position-relative">
                                        <img src="{{ $destinasi->image ? asset('images/' . $destinasi->image) : 'https://via.placeholder.com/400x250?text=No+Image' }}"
                                            class="card-img-top" alt="{{ $destinasi->name }}"
                                            style="height: 200px; object-fit: cover;">

                                        <!-- Featured Badge -->
                                        @if ($destinasi->featured)
                                            <span class="badge bg-warning position-absolute top-0 start-0 m-2">
                                                <i class="fas fa-star me-1"></i>Featured
                                            </span>
                                        @endif

                                        <!-- Category Badge -->
                                        <span class="badge bg-primary position-absolute top-0 end-0 m-2">
                                            {{ $destinasi->category }}
                                        </span>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-bold">{{ $destinasi->name }}</h5>

                                        <!-- Location -->
                                        <div class="d-flex align-items-center text-muted mb-2">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            <small>{{ $destinasi->location }}</small>
                                        </div>

                                        <!-- Rating -->
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-warning me-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($destinasi->rating))
                                                        <i class="fas fa-star"></i>
                                                    @elseif($i - 0.5 <= $destinasi->rating)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="fw-bold">{{ $destinasi->rating }}</span>
                                            <small class="text-muted ms-1">({{ rand(10, 500) }} reviews)</small>
                                        </div>

                                        <!-- Description -->
                                        <p class="card-text text-muted flex-grow-1">
                                            {{ Str::limit($destinasi->description, 100) }}
                                        </p>

                                        <!-- Price & Button -->
                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                            <div>
                                                <span class="h5 text-primary fw-bold">Rp
                                                    {{ number_format($destinasi->price, 0, ',', '.') }}</span>
                                                <small class="text-muted d-block">per orang</small>
                                            </div>
                                            <a href="{{ route('user.destinasi.show', $destinasi) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye me-1"></i>Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $destinations->links() }}
                    </div>
                @else
                    <!-- No Results -->
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>Destinasi tidak ditemukan</h4>
                        <p class="text-muted">Coba ubah kata kunci pencarian atau filter yang Anda gunakan.</p>
                        <a href="{{ route('destinasi.index') }}" class="btn btn-primary">
                            <i class="fas fa-undo me-2"></i>Lihat Semua Destinasi
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Auto submit form when filter changes
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('filterForm');
            const selects = filterForm.querySelectorAll('select');

            selects.forEach(select => {
                select.addEventListener('change', function() {
                    filterForm.submit();
                });
            });

            // Add hover effect to cards
            const cards = document.querySelectorAll('.destination-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.transition = 'transform 0.3s ease';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
@endsection
