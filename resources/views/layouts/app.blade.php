<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Banyumas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #f0f4f8;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 1rem;
            font-weight: 600;
        }
        nav a:hover {
            text-decoration: underline;
        }
        nav form {
            display: inline;
        }
        nav button {
            background: transparent;
            border: none;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }
        main {
            max-width: 900px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #007bff;
            margin-bottom: 1rem;
        }
        footer {
            text-align: center;
            padding: 1rem;
            color: #666;
            font-size: 0.9rem;
            margin-top: 2rem;
        }
        .error {
            color: #d9534f;
            margin-top: 0.25rem;
            font-size: 0.9rem;
        }
        label {
            display: block;
            margin-top: 1rem;
            font-weight: 600;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.25rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            margin-top: 1.5rem;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('index') }}">Beranda</a>
            <a href="{{ route('history') }}">Sejarah</a>
            <a href="{{ route('gallery') }}">Galeri Wisata</a>
            @auth
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; {{ date('Y') }} Banyumas. All rights reserved.
    </footer>
</body>
</html>
