@extends('layouts.admin')

@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h1 class="h3 mb-2 text-gray-800">Profil Admin</h1>
                        <p class="mb-4">Silakan ubah profil Anda.</p>
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('admin.profil.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $user->name) }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', $user->email) }}">
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Password (Kosongkan jika tidak diganti)</label>
                                <input type="password" class="form-control" name="password">
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Konfirmasi Password</label>
                                <input type="password_confirmation" class="form-control" name="password_confirmation">
                            </div>


                            <button type="submit" class="btn btn-md btn-primary me-3">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
