<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    // Afficher toutes les questions
    public function index()
    {
        $questions = Question::latest()->paginate(10);
        return view('questions.index', compact('questions'));
    }

    // Afficher le formulaire pour poser une question
    public function create()
    {
        return view('questions.create');
    }

    // Enregistrer une nouvelle question
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour poser une question.');
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        Question::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'utilisateur_id' => Auth::id(),
        ]);

        return redirect()->route('questions.index')->with('success', 'Question posée avec succès.');
    }

    // Afficher une question spécifique
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    // Afficher le formulaire d'édition
    public function edit(Question $question)
    {
        if (!Auth::check() || Auth::id() !== $question->utilisateur_id) {
            return redirect()->route('questions.index')->with('error', 'Vous ne pouvez pas modifier cette question.');
        }

        return view('questions.edit', compact('question'));
    }

    // Mettre à jour une question
    public function update(Request $request, Question $question)
    {
        if (!Auth::check() || Auth::id() !== $question->utilisateur_id) {
            return redirect()->route('questions.index')->with('error', 'Vous ne pouvez pas modifier cette question.');
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        $question->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question mise à jour.');
    }

    // Supprimer une question
    public function destroy(Question $question)
    {
        if (!Auth::check() || Auth::id() !== $question->utilisateur_id) {
            return redirect()->route('questions.index')->with('error', 'Vous ne pouvez pas supprimer cette question.');
        }

        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question supprimée.');
    }
}
