@extends('layouts.admin')

@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('images/' . $destinasi->image) }}"
                            onerror="this.onerror=null; this.src='{{ asset('storage/' . $destinasi->image) }}';"
                            class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="font-weight-bold">{{ $destinasi->name }}</h5>
                        <hr />
                        <p>{{ 'Rp ' . number_format($destinasi->price, 2, ',', '.') }}</p>
                        <p>Lokasi : {{ $destinasi->location }}</p>
                        <hr />
                        <p>Deskripsi : {{ $destinasi->description }}</p>
                        <p>Fasilitas: @php
                            $fasilitas = json_decode($destinasi->facilities, true);
                        @endphp
                            @if ($fasilitas && is_array($fasilitas))
                                <ul class="mb-0 ps-3">
                                    @foreach ($fasilitas as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <em>-</em>
                            @endif
                        </p>
                        <p>Jam Operasional: @php
                            $jam = json_decode($destinasi->operating_hours, true);
                        @endphp
                            @if ($jam && is_array($jam))
                                <ul class="mb-0 ps-3">
                                    @foreach ($jam as $item)
                                        <li><strong>{{ $item['hari'] }}:</strong> {{ $item['jam'] }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <em>-</em>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('destinasi.index') }}" class="btn btn-md btn-primary">Kembali</a>
        </div>
    </div>
@endsection
