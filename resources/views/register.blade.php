@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card o-hidden border-0 shadow-lg my-5 rounded">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    @error('password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation">Konfirmasi Password:</label>
                                    <input type="password" class="form-control" iid="password_confirmation"
                                        name="password_confirmation" name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Daftar</button>
                            </form>
                            <hr>
                            <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
