@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la question</h1>

    <form action="{{ route('questions.update', $question) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $question->titre }}" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="5" required>{{ $question->contenu }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection