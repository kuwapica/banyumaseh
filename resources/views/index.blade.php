<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Banyumas</title>
</head>
<body>
    <h1>Selamat datang di Banyumas</h1>
    <nav>
        <a href="{{ route('index') }}">Beranda</a> |
        <a href="{{ route('history') }}">Sejarah</a> |
        <a href="{{ route('gallery') }}">Galeri Wisata</a> |
        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a> |
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>
    <p>Ini adalah halaman beranda Banyumas.</p>
</body>
</html>
