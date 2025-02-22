@extends('layouts.app')

@section('content')
    <h1>{{ $question->titre }}</h1>
    <p>{{ $question->contenu }}</p>
    <p>Posée par : {{ $question->utilisateur->nom }}</p>

    <!-- Ajouter un like -->
    <form action="{{ route('likes.store', $question->id) }}" method="POST">
        @csrf
        <button type="submit">J'aime</button>
    </form>

    <h2>Commentaires</h2>
    <ul>
        @foreach ($question->comments as $comment)
            <li>{{ $comment->contenu }} - par {{ $comment->utilisateur->nom }}</li>
        @endforeach
    </ul>

    <!-- Ajouter un commentaire -->
    <form action="{{ route('comments.store', $question->id) }}" method="POST">
        @csrf
        <textarea name="contenu" placeholder="Ajouter un commentaire" required></textarea>
        <button type="submit">Commenter</button>
    </form>
@endsection
