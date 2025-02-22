@extends('layouts.app')

@section('content')
    <h1>Modifier la question</h1>
    <form action="{{ route('questions.update', $question) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="titre" value="{{ $question->titre }}" required>
        <textarea name="contenu" required>{{ $question->contenu }}</textarea>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
