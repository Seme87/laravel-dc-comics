@extends('layouts.main')

@section('Page-Content')
    <div class="container">
        <a href="{{ route('comics.index') }}">Torna alla lista</a>
        <h1>{{ $comic->series }}</h1>
        <p>{{ $comic->description }}</p>
    </div>
@endsection