@extends('layouts.main');

@section('Page-Content')
    <div class="container">
        <h1>Lista Comics</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Price</th>
                    <th scope="col">Series</th>
                    <th scope="col">sale_date</th>
                    <th scope="col">type</th>
                    <th scope="col">Azioni</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach ($comics as $comic)
                    <tr>
                        <td>{{$comic->id}}</td>
                        <td>{{$comic->title}}</td>
                        <td>{{$comic->series}}</td>
                        <td>{{$comic->price}}</td>
                        <td>{{$comic->sale_date}}</td>
                        <td>{{$comic->type}}</td>
                        <td>
                            <a href="{{ route('comics.show', $comic->id ) }}" class="btn btn-primary">Vedi</a>
                            <a href="{{ route('comics.edit', $comic->id ) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancella</button>     
                            </form>
                        </td>
                    </tr>
                @endforeach
        
            </tbody>

            
        </table>

        <a href="{{ route('comics.create') }}" class="btn btn-secondary">Crea un nuovo Comic</a>
    </div>
@endsection