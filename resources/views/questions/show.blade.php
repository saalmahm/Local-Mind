@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 text-center mb-4">{{ $question->titre }}</h1>
            <p class="text-muted text-center mb-4">
                Posté par <strong>{{ $question->utilisateur->name }}</strong> le {{ $question->created_at->format('d/m/Y H:i') }}
            </p>

            <!-- Card principale pour afficher le contenu de la question -->
            <div class="card shadow-lg mb-4">
                <div class="card-body">
                    <p class="card-text">{{ $question->contenu }}</p>
                </div>
            </div>

            <!-- Si l'utilisateur est l'auteur, ajouter des actions de modification et suppression -->
            @if(Auth::check() && Auth::id() === $question->utilisateur_id)
                <div class="d-flex justify-content-between mb-4">
                    <a href="{{ route('questions.edit', $question) }}" class="btn btn-outline-warning">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </button>
                    </form>
                </div>
            @endif

            <!-- Bouton retour à la liste -->
            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary mb-4">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>

            <!-- Formulaire d'ajout de commentaire -->
            @if(Auth::check())
                <form action="{{ route('comments.store', $question) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="contenu" class="h5">Ajouter un commentaire</label>
                        <textarea name="contenu" id="contenu" class="form-control @error('contenu') is-invalid @enderror" rows="4" required>{{ old('contenu') }}</textarea>
                        @error('contenu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Poster
                    </button>
                </form>
            @else
                <p class="text-muted">Connectez-vous pour ajouter un commentaire.</p>
            @endif

            <!-- Liste des commentaires -->
            <h3 class="h4 mb-4">Commentaires</h3>
            @forelse($question->comments as $comment)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->contenu }}</p>
                        <small class="text-muted">Posté par <strong>{{ $comment->utilisateur->name }}</strong> le {{ $comment->created_at->format('d/m/Y H:i') }}</small>

                        @if(Auth::check() && Auth::id() === $comment->utilisateur_id)
                            <div class="mt-3">
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p>Aucun commentaire pour cette question pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
