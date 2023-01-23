@extends('layouts.main')

@section('Page-Content')
    <div class="container">
        <h1>Modifica: {{ $comic->title }}</h1>

        <form action="{{ route('comics.update', $comic->id) }} " method="POST">
         @csrf 
         @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" maxlength="50" value="{{ old('title', $comic->title) }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $comic->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="1" max="100000" value="{{ old('price', $comic->price) }}" required>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" maxlength="100" value="{{old('series', $comic->series)  }}" required>
                @error('series')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="date" name="sale_date" value="{{ old('sale_date', $comic->sale_date)}}" required>
                @error('sale_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
             <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input type="text" class="form-control @error('sale_type') is-invalid @enderror" id="type" name="type" value="{{ old('type', $comic->type)}}" maxlength="50" required>
                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
    
@endsection