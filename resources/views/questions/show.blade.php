@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $question->titre }}</h1>
    <p class="text-muted">Posté par {{ $question->utilisateur->name }} le {{ $question->created_at->format('d/m/Y H:i') }}</p>

    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{ $question->contenu }}</p>
        </div>
    </div>

    @if(Auth::check() && Auth::id() === $question->utilisateur_id)
        <div class="d-flex">
            <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning mr-2">Modifier</a>
            <form action="{{ route('questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    @endif
    <a href="{{ route('questions.index') }}" class="btn btn-secondary my-3">Retour à la liste</a>

    <!-- Comment Form -->
    @if(Auth::check())
        <form action="{{ route('comments.store', $question) }}" method="POST" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="contenu">Ajouter un commentaire</label>
                <textarea name="contenu" id="contenu" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Poster</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Connectez-vous</a> pour poster un commentaire.</p>
    @endif

    <!-- Comments List -->
    <h3>Commentaires</h3>
    @foreach($question->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-text">{{ $comment->contenu }}</p>
                <small class="text-muted">Posté par {{ $comment->utilisateur->name }} le {{ $comment->created_at->format('d/m/Y H:i') }}</small>

                @if(Auth::check() && Auth::id() === $comment->utilisateur_id)
                    <div class="mt-2">
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection