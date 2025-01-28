<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        nav {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        nav a {
            color: #ccc;
            text-decoration: none;
            margin-left: 15px;
            font-size: 1.2em;
        }
        nav a:hover {
            color: #fff;
        }
        .container {
            text-align: center;
            margin-top: 100px;
        }
        .container h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        .container p {
            font-size: 1.5em;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Menu nawigacyjne -->
    @if (Route::has('login'))
        <nav>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                <a href="{{ route('comments') }}">Komentarze</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </nav>
    @endif

    <!-- Treść powitalna -->
    <div class="container">
        <h1>Welcome to Laravel</h1>
        <p>This is the home page of your application.</p>
        <a href="{{ route('comments') }}" class="btn-primary">View Comments</a>
    </div>
</body>
</html>
