@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold">📌 Questions</h1>
        <a href="{{ route('questions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Poser une question
        </a>
    </div>

    <!-- Alertes de succès/erreur -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Liste des questions -->
    @if($questions->count() > 0)
        <div class="row">
            @foreach($questions as $question)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('questions.show', $question) }}" class="text-decoration-none text-dark">
                                    {{ $question->titre }}
                                </a>
                            </h5>
                            <p class="card-text text-muted">
                                Posté par <strong>{{ $question->utilisateur->name }}</strong> 
                                le {{ $question->created_at->format('d/m/Y H:i') }}
                            </p>
                            
                            <!-- Affichage des tags si disponibles -->
                            @if($question->tags)
                                <div>
                                    @foreach($question->tags as $tag)
                                        <span class="badge bg-secondary">#{{ $tag->nom }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $questions->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="alert alert-warning text-center">Aucune question trouvée.</div>
    @endif
</div>
@endsection
