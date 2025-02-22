@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Questions</h1>
    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Poser une question</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="list-group">
        @foreach($questions as $question)
            <a href="{{ route('questions.show', $question) }}" class="list-group-item list-group-item-action">
                <h5 class="mb-1">{{ $question->titre }}</h5>
                <small>Posté par {{ $question->utilisateur->name }} le {{ $question->created_at->format('d/m/Y H:i') }}</small>
            </a>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $questions->links() }}
    </div>
</div>
@endsection