@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1 class="h3">Mes Questions</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('questions.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Nouvelle Question
            </a>
        </div>
    </div>

    @if($questions->count() > 0)
        <div class="row">
            @foreach($questions as $question)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-0">
                                    <a href="{{ route('questions.show', $question) }}" class="text-decoration-none text-dark">
                                        {{ $question->titre }}
                                    </a>
                                </h5>
                                <small class="text-muted">
                                    <i class="fas fa-clock"></i> {{ $question->created_at->diffForHumans() }}
                                </small>
                            </div>
                            <p class="card-text">{{ Str::limit($question->contenu, 200) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-primary">
                                        <i class="fas fa-comment"></i> {{ $question->comments->count() }} réponses
                                    </span>
                                </div>
                                <div>
                                    <a href="{{ route('questions.edit', $question) }}" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <form action="{{ route('questions.destroy', $question) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question ?')">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $questions->links() }}
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> Vous n'avez pas encore posé de questions.
            <a href="{{ route('questions.create') }}" class="alert-link">Posez votre première question</a>
        </div>
    @endif
</div>
@endsection