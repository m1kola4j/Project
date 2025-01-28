<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        .logout-form {
            display: inline;
        }
        .logout-form button {
            background: none;
            border: none;
            color: #ccc;
            font-size: 1.2em;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-form button:hover {
            color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    @if (Route::has('login'))
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <!-- Formularz wylogowania -->
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    @endif

    <div class="container">
        <h1>Witaj na dashboardzie</h1>
        <p>Jesteś zalogowany jako: <strong>{{ Auth::user()->name }}</strong></p>
    </div>
</body>
</html>
