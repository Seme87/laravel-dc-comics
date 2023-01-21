@extends('layouts.main')

@section('Page-Content')
    <div class="container">
        <h1>Modifica: {{ $comic->title }}</h1>

        <form action="{{ route('comics.update', $comic->id) }} " method="POST">
         @csrf 
         @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="50" value="{{ $comic->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $comic->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" min="1" max="100000" value="{{ $comic->price }}" required>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" id="series" name="series" maxlength="100" value="{{ $comic->series }}" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" class="form-control" id="date" name="sale_date" value="{{ $comic->sale_date}}" required>
            </div>
             <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type}}" maxlength="50" required>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
    
@endsection