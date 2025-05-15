<!DOCTYPE html>
<html>
<head>
    <title>Login - Banyumas</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
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
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
</body>
</html>
