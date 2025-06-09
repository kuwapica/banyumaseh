@extends('layouts.admin')

@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $destinasi->image) }}" class="rounded" style="width: 100%">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('destinasi.index') }}" class="btn btn-md btn-primary">Kembali</a>
        </div>
    </div>
@endsection
