<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogController extends Controller
{
    public function index() {
        return view('catalog.index', [
            'arrayPeliculas' => Movie::paginate(10)
        ]);
    }

    public function show($id){
        return view('catalog.show',[
            'pelicula' => Movie::findOrFail($id)
        ]);
    }

    public function postCreate(Request $request)
    {
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->rented = false;
        $movie->save();

        return redirect()->route('catalog.table');
    }

    public function edit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', compact('pelicula'));
    }

    public function putEdit(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();

        return redirect()->route('catalog.show', ['id' => $id]);
    }

    public function table()
    {
        $movies = Movie::paginate(10);
        return view('catalog.table', compact('movies'));
    }
}
