@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">📍 Poser une question</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf

                        <!-- Champ Titre -->
                        <div class="mb-3">
                            <label for="titre" class="form-label fw-bold">Titre de la question</label>
                            <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                            @error('titre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ Contenu -->
                        <div class="mb-3">
                            <label for="contenu" class="form-label fw-bold">Détail de la question</label>
                            <textarea name="contenu" id="contenu" class="form-control @error('contenu') is-invalid @enderror" rows="5" required>{{ old('contenu') }}</textarea>
                            @error('contenu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ Emplacement -->
                        <div class="mb-3">
                            <label for="emplacement" class="form-label fw-bold">Emplacement</label>
                            <input type="text" name="emplacement" id="emplacement" class="form-control @error('emplacement') is-invalid @enderror" placeholder="Ex: Casablanca, Maroc" required>
                            @error('emplacement')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
