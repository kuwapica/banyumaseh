@extends('layouts.app')

@section('title', $destinasi->name)

@section('content')
    <div class="container-fluid py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.destinasi.show', $destinasi) }}">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $destinasi->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Hero Image -->
                <div class="card shadow-sm mb-4">
                    <div class="position-relative">
                        <img src="{{ $destinasi->image ? asset('images/' . $destinasi->image) : 'https://via.placeholder.com/800x400?text=No+Image' }}"
                            onerror="this.onerror=null; this.src='{{ asset('storage/' . $destinasi->image) }}';"
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
            @if ($relatedDestinations->count() > 0)
                <div class="col-lg-4">
                    <!-- Another Destination -->
                    <div class="card shadow-sm mb-4 position-relative">
                        <h5 class="mb-3 px-3 pt-3">Destinasi Serupa</h5>
                        <div class="px-3 pb-3">
                            @foreach ($relatedDestinations as $related)
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="{{ $related->image ? asset('images/' . $related->image) : 'https://via.placeholder.com/150x100?text=No+Image' }}"
                                            class="img-fluid rounded-start" alt="{{ $related->name }}"
                                            style="height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body p-2 d-flex flex-column">
                                            <h6 class="card-title mb-1">{{ Str::limit($related->name, 30) }}</h6>
                                            <p class="card-text text-muted small flex-grow-1 mb-1">
                                                {{ Str::limit($related->description, 60) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <span class="text-primary fw-bold small">
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
