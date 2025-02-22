<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Question $question)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'contenu' => 'required|string',
        ]);

        $question->comments()->create([
            'contenu' => $request->contenu,
            'utilisateur_id' => Auth::id(),
        ]);

        return redirect()->route('questions.show', $question);
    }

    public function update(Request $request, Comment $comment)
    {
        if (!Auth::check() || Auth::id() !== $comment->utilisateur_id) {
            return redirect()->route('questions.show', $comment->question);
        }

        $request->validate([
            'contenu' => 'required|string',
        ]);

        $comment->update([
            'contenu' => $request->contenu,
        ]);

        return redirect()->route('questions.show', $comment->question);
    }

    public function destroy(Comment $comment)
    {
        if (!Auth::check() || Auth::id() !== $comment->utilisateur_id) {
            return redirect()->route('questions.show', $comment->question);
        }

        $comment->delete();
        return redirect()->route('questions.show', $comment->question);
    }
}