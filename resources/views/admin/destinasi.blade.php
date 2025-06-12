@extends('layouts.admin')

@section('title', 'Dashboard Admin - Destinasi')
@push('styles')
@endpush

@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Destinasi</h1>
        <p class="mb-4">Berisi data-data destinasi wisata di Banyumas.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Destinasi</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('destinasi.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Fasilitas</th>
                                <th scope="col">Jam Operasional</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col" style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($destinasis as $destinasi)
                                <tr>
                                    <td>{{ $destinasi->name }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $destinasi->image) }}"
                                            onerror="this.onerror=null; this.src='{{ asset('storage/' . $destinasi->image) }}';"
                                            class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $destinasi->description }}</td>
                                    <td>@php
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
                                    </td>
                                    <td>@php
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
                                    </td>
                                    <td>{{ 'Rp ' . number_format($destinasi->price, 2, ',', '.') }}</td>
                                    <td>{{ $destinasi->location }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('destinasi.destroy', $destinasi->id) }}" method="POST">
                                            <a href="{{ route('destinasi.show', $destinasi->id) }}"
                                                class="btn btn-sm btn-dark">Show</a>
                                            <a href="{{ route('destinasi.edit', $destinasi->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Destinasi belum ada.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @push('scripts')
    @endpush
@endsection
