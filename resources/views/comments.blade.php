<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księga komentarzy</title>
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
        .table-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #555;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #444;
        }
        .footer-button {
            margin-top: 20px;
            text-align: center;
        }
        .btn-secondary {
            background-color: #555;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-secondary:hover {
            background-color: #666;
        }
        .btn-success {
            background-color: #5cb85c;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }
        .btn-success:hover {
            background-color: #4cae4c;
        }
        .btn-danger {
            background-color: #d9534f;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }
        .btn-danger:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <!-- Menu nawigacyjne -->
    @if (Route::has('login'))
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('comments') }}">Komentarze</a>
        </nav>
    @endif

    <!-- Tabela komentarzy -->
    <div class="table-container">
        <h3>Księga komentarzy</h3>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Użytkownik</th>
                    <th>Data dodania</th>
                    <th>Komentarz</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->user->name ?? 'Anonim' }}</td>
                    <td>{{ $comment->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        {{ $comment->message }}
                        <br>
                        @if ($comment->user_id == \Auth::user()->id)
                            <a href="{{ route('edit', $comment->id) }}" class="btn-success" title="Edytuj">Edytuj</a>
                            <form method="POST" action="{{ route('delete', $comment->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer-button">
            <a href="{{ route('create') }}" class="btn-secondary">Dodaj</a>
        </div>
    </div>
</body>
</html>
