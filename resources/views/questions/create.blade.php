@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Poser une question</h1>

    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Poser la question</button>
    </form>
</div>
@endsection