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
                        <td>{{$comic->price}}</td>
                        <td>{{$comic->sales_date}}</td>
                        <td>{{$comic->type}}</td>
                        <td>...</td>
                    </tr>
                @endforeach
        
            </tbody>
        </table>
    </div>
@endsection