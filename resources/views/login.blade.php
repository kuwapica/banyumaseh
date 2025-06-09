@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-6 col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5 rounded">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                            </div>
                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    @error('password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </form>
                            <hr>
                            <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
