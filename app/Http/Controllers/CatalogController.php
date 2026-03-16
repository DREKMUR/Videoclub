<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index() {
        return view('catalog.index', [
            'arrayPeliculas' => Movie::all()
        ]);
    }

    public function show($id){
        return view('catalog.show',[
            'pelicula' => Movie::findOrFail($id)
        ]);
    }

    public function create(){
        return view('catalog.create');
    }

    public function edit($id){
        return view('catalog.edit', [
            'pelicula' => Movie::findOrFail($id)
        ]);
    }


}
