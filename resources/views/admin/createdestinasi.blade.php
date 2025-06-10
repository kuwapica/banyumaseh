@extends('layouts.admin')

@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Wisata</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="Masukkan Judul Destinasi">

                                <!-- error message untuk name -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">

                                <!-- error message untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5"
                                    placeholder="Masukkan Deskripsi Destinasi">{{ old('description') }}</textarea>

                                <!-- error message untuk description -->
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Fasilitas</label>
                                <div id="fasilitas-wrapper">
                                    <input type="text" class="form-control @error('facilities') is-invalid @enderror"
                                        name="facilities[]" placeholder="Masukkan Fasilitas Destinasi"
                                        value="{{ old('facilities.0') }}">
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="tambahFasilitas()">+ Tambah Fasilitas</button>
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jam Operasional</label>
                                <div id="jam-operasional-wrapper">
                                    <div class="row mb-2 jam-item">
                                        <div class="col-md-5">
                                            <input type="text" name="operating_hours[0][hari]" class="form-control"
                                                placeholder="Hari (cth: Senin - Jumat)"
                                                value="{{ old('operating_hours.0.hari') }}">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" @error('operating_hours') is-invalid @enderror"
                                                name="operating_hours[0][jam]" class="form-control"
                                                placeholder="Jam (cth: 08:00 - 17:00)"
                                                value="{{ old('operating_hours.0.jam') }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="tambahJamOperasional()">+ Tambah Jam Operasional</button>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Harga</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" value="{{ old('price') }}"
                                            placeholder="Masukkan Harga Destinasi">

                                        <!-- error message untuk price -->
                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Lokasi</label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                                            name="location" value="{{ old('location') }}" placeholder="Masukkan Lokasi">

                                        <!-- error message untuk location -->
                                        @error('location')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let jamIndex = 1;

        function tambahFasilitas() {
            const wrapper = document.getElementById('fasilitas-wrapper');
            const input = document.createElement('div');
            input.className = 'input-group mt-2 mb-2 fasilitas-item';
            input.innerHTML = `
            <input type="text" name="facilities[]" class="form-control" placeholder="Fasilitas">
            <button type="button" class="btn btn-danger" onclick="hapusBaris(this)">✕</button>
        `;
            wrapper.appendChild(input);
        }

        function tambahJamOperasional() {
            const wrapper = document.getElementById('jam-operasional-wrapper');
            const html = `
            <div class="row mb-2 jam-item">
                <div class="col-md-5">
                    <input type="text" name="operating_hours[${jamIndex}][hari]" class="form-control" placeholder="Hari (cth: Sabtu - Minggu)">
                </div>
                <div class="col-md-5">
                    <input type="text" name="operating_hours[${jamIndex}][jam]" class="form-control" placeholder="Jam (cth: 07:00 - 18:00)">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" onclick="hapusBaris(this)">✕</button>
                </div>
            </div>
        `;
            wrapper.insertAdjacentHTML('beforeend', html);
            jamIndex++;
        }

        function hapusBaris(button) {
            const fasilitasRow = button.closest('.fasilitas-item');
            const jamRow = button.closest('.jam-item');

            if (fasilitasRow) fasilitasRow.remove();
            else if (jamRow) jamRow.remove();
        }
    </script>
@endsection
