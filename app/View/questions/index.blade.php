@extends('layouts.app')

@section('content')
    <h1>Questions</h1>
    <a href="{{ route('questions.create') }}">Poser une question</a>
    <ul>
        @foreach ($questions as $question)
            <li>
                <a href="{{ route('questions.show', $question) }}">{{ $question->titre }}</a>
                <a href="{{ route('questions.edit', $question) }}">Modifier</a>
                <form action="{{ route('questions.destroy', $question) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
