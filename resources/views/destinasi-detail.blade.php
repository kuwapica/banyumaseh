@extends('layouts.app')

@section('title', $destinasi->name)

@section('content')
    <div class="container-fluid py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('destination') }}">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $destinasi->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Hero Image -->
                <div class="card shadow-sm mb-4">
                    <div class="position-relative">
                        <img src="{{ $destinasi->image ? asset('storage/' . $destinasi->image) : 'https://via.placeholder.com/800x400?text=No+Image' }}"
                            class="card-img-top" alt="{{ $destinasi->name }}"
                            style="height: 400px; object-fit: cover; border-radius: 0.375rem;">

                        <!-- Featured Badge -->
                        @if ($destinasi->featured)
                            <span class="badge bg-warning position-absolute top-0 start-0 m-3 fs-6">
                                <i class="fas fa-star me-1"></i>Featured
                            </span>
                        @endif

                        <!-- Category Badge -->
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3 fs-6">
                            {{ $destinasi->category }}
                        </span>
                    </div>
                </div>

                <!-- Destination Info -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h1 class="card-title mb-3">{{ $destinasi->name }}</h1>

                        <!-- Location & Rating -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center text-muted mb-2">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                    <span>{{ $destinasi->location }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
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
                                    <span class="fw-bold me-2">{{ $destinasi->rating }}</span>
                                    <small class="text-muted">({{ rand(10, 500) }} reviews)</small>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <h5 class="mb-3">Deskripsi</h5>
                            <p class="text-muted lh-lg">{{ $destinasi->description }}</p>
                        </div>

                        <!-- Features -->
                        <div class="mb-4">
                            <h5 class="mb-3">Fasilitas</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Parkir luas</li>
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Toilet bersih</li>
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mushola</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Warung makan</li>
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Spot foto</li>
                                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pemandu wisata</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Operating Hours -->
                        <div class="mb-4">
                            <h5 class="mb-3">Jam Operasional</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Senin - Jumat:</strong> 08:00 - 17:00</p>
                                    <p class="mb-1"><strong>Sabtu - Minggu:</strong> 07:00 - 18:00</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Libur Nasional:</strong> 07:00 - 18:00</p>
                                    <p class="mb-1 text-muted"><small>*Jam dapat berubah sewaktu-waktu</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Price & Booking -->
                <div class="card shadow-sm mb-4 sticky-top" style="top: 20px;">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h3 class="text-primary fw-bold mb-1">
                                Rp {{ number_format($destinasi->price, 0, ',', '.') }}
                            </h3>
                            <small class="text-muted">per orang</small>
                        </div>

                        <!-- Booking Form -->
                        <form action="{{ route('pesan.store', $destinasi) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                                <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan"
                                    required min="{{ date('Y-m-d') }}">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                                <select class="form-select" id="jumlah_orang" name="jumlah_orang" required>
                                    <option value="">Pilih jumlah</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }} orang</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Total Price Display -->
                            <div class="mb-3 p-3 bg-light rounded">
                                <div class="d-flex justify-content-between">
                                    <span>Harga per orang:</span>
                                    <span>Rp {{ number_format($destinasi->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Jumlah orang:</span>
                                    <span id="selected-count">0</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total:</span>
                                    <span id="total-price">Rp 0</span>
                                </div>
                            </div>

                            @auth
                                <a href="{{ route('pesan_tiket', $destinasi) }}" class="btn btn-primary w-100 mb-3">
                                    <i class="fas fa-ticket-alt me-2"></i>Pesan Sekarang
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login untuk Memesan
                                </a>
                            @endauth
                        </form>

                        <!-- Contact Info -->
                        <div class="border-top pt-3">
                            <h6 class="mb-2">Butuh bantuan?</h6>
                            <p class="text-muted small mb-1">
                                <i class="fas fa-phone me-2"></i>+62 123 456 789
                            </p>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-envelope me-2"></i>info@wisatabanyumas.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Destinations -->
        @if ($relatedDestinations->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-4">Destinasi Serupa</h3>
                    <div class="row">
                        @foreach ($relatedDestinations as $related)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                                        class="card-img-top" alt="{{ $related->name }}"
                                        style="height: 200px; object-fit: cover;">

                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">{{ $related->name }}</h6>
                                        <p class="card-text text-muted small flex-grow-1">
                                            {{ Str::limit($related->description, 80) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                            <span class="text-primary fw-bold">
                                                Rp {{ number_format($related->price, 0, ',', '.') }}
                                            </span>
                                            <a href="{{ route('user.destinasi.show', $related) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                Lihat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jumlahSelect = document.getElementById('jumlah_orang');
            const selectedCount = document.getElementById('selected-count');
            const totalPrice = document.getElementById('total-price');

            const priceData = @json($destinasi->price);
            const pricePerPerson = parseInt(priceData.replace(/[^\d]/g, '')) || 0;

            jumlahSelect.addEventListener('change', function() {
                const count = parseInt(this.value) || 0;
                const total = count * pricePerPerson;

                selectedCount.textContent = count;
                totalPrice.textContent = 'Rp ' + total.toLocaleString('id-ID');
            });
        });
    </script>
@endsection
