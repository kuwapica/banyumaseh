<!DOCTYPE html>
<html>
<head>
    <title>Register - Banyumas</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <br>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</body>
</html>
