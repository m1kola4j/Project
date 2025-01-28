<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja komentarza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #aaa;
        }
        .form-group textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #222;
            color: #fff;
        }
        .form-group .error-message {
            color: #f00;
            font-size: 0.9em;
        }
        .btn-submit {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Formularz edycji komentarza -->
    <div class="form-container">
        <h3>Edycja komentarza</h3>
        <form method="POST" action="{{ route('update', $comment->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="message">Treść</label>
                <textarea name="message" id="message" required>{{ $comment->message }}</textarea>
                @error('message')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn-submit">Zapisz</button>
        </form>
    </div>
</body>
</html>
