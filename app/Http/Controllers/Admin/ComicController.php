<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index',compact('comics') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione dei dati
        $request->validate([
            'title' => 'required|string|max:100',
            'image' => 'nullable|url',
            'description' => 'required|string',
            'price'=> 'required|numeric',
            'series'=> 'required|string',
            'sale_date' => 'required|date',
            'type'=> 'required|string|max:100'
            
        ]);
        //prendo tt i dati
        $data = $request->all();

        //creo oggetto Model
        $new_comic = new Comic();

        //compilo l'oggetto(o meglio le sue proprieta)
        // $new_comic->title = $data['title'];
        // $new_comic->description = $data['description'];
        // $new_comic->price= $data['price'];
        // $new_comic->series = $data['series'];
        // $new_comic->sale_date = $data['sale_date'];
        // $new_comic->type = $data['type'];


        // Mass assignement
        $new_comic->fill($data);

        
        //salvo (creo a db la riga)
        $new_comic->save();

        //reindirizzo l'utente al comic creato
        return redirect()->route('comics.show' ,$new_comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
       return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // validazione dati
        $request->validate([
            'title' => 'required|string|max:100',
            'image' => 'nullable|url',
            'description' => 'required|string',
            'price'=> 'required|numeric',
            'series'=> 'required|string',
            'sale_date' => 'required|date',
            'type'=> 'required|string|max:100'
            
        ]);
        // recupero tutti i dati del form
        $data = $request->all();

        //aggiorno la risorsa per intero
        $comic->update($data);

        //faccio un redirect alla pagina principale(index)
        return redirect()->route('comics.index', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}