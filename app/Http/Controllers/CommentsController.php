<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index()
    {
        // Pobranie wszystkich komentarzy z bazy danych, posortowanych rosnąco po dacie
        $comments = Comment::orderBy('created_at', 'asc')->get();

        // Przekazanie komentarzy do widoku
        return view('comments', ['comments' => $comments]);
    }

    public function create()
    {
        // Renderowanie formularza dodawania komentarza
        return view('commentsForm');
    }

    public function store(Request $request)
    {
        // Walidacja danych z formularza
        $validatedData = $request->validate([
            'message' => 'required|min:10|max:255',
        ]);

        // Utworzenie nowego komentarza i zapisanie go do bazy danych
        Comment::create([
            'user_id' => Auth::id(), // Automatycznie przypisuje ID zalogowanego użytkownika
            'message' => $validatedData['message'],
        ]);

        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('comments')->with('success', 'Komentarz został dodany.');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        // Sprawdzenie, czy użytkownik jest autorem komentarza
        if (\Auth::user()->id != $comment->user_id) {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.'
            ]);
        }

        return view('commentsEditForm', ['comment' => $comment]);
    }


    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        // Sprawdzenie, czy użytkownik jest autorem komentarza
        if (Auth::user()->id != $comment->user_id) {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.'
            ]);
        }

        // Walidacja danych wejściowych
        $request->validate([
            'message' => 'required|min:10|max:255',
        ]);

        // Aktualizacja treści komentarza
        $comment->message = $request->message;

        if ($comment->save()) {
            return redirect()->route('comments')->with('success', 'Komentarz został zaktualizowany.');
        }

        return back()->with('error', 'Wystąpił błąd podczas zapisywania komentarza.');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        // Sprawdzenie, czy użytkownik jest autorem komentarza
        if (Auth::user()->id != $comment->user_id) {
            return back()->with('error', 'Nie możesz usunąć tego komentarza.');
        }

        // Usunięcie komentarza
        if ($comment->delete()) {
            return redirect()->route('comments')->with('success', 'Komentarz został usunięty.');
        }

        return back()->with('error', 'Wystąpił problem podczas usuwania komentarza.');
    }
}
