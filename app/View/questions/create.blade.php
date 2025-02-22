@extends('layouts.app')

@section('content')
    <h1>Poser une question</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <input type="text" name="titre" placeholder="Titre" required>
        <textarea name="contenu" placeholder="Contenu" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
@endsection
