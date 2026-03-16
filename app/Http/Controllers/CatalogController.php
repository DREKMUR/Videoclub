<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $peliculas = Movie::paginate(10);
        return view('catalog.index', compact('peliculas'));
    }

    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', compact('pelicula'));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function postCreate(Request $request)
    {
        $pelicula = new Movie();
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->rented = false;
        $pelicula->synopsis = $request->synopsis;
        $pelicula->save();

        Session::flash('mensaje', 'La película se ha añadido correctamente');
        return redirect('/catalog');
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', compact('pelicula'));
    }

    public function putEdit(Request $request, $id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->title = $request->title;
        $pelicula->year = $request->year;
        $pelicula->director = $request->director;
        $pelicula->poster = $request->poster;
        $pelicula->synopsis = $request->synopsis;
        $pelicula->save();

        Session::flash('mensaje', 'La película se ha modificado correctamente');
        return redirect('/catalog/show/'.$id);
    }

    public function putRent($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = true;
        $pelicula->save();

        Session::flash('mensaje', 'La película se ha alquilado correctamente');
        return redirect('/catalog/show/'.$id);
    }

    public function putReturn($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->rented = false;
        $pelicula->save();

        Session::flash('mensaje', 'La película se ha devuelto correctamente');
        return redirect('/catalog/show/'.$id);
    }

    public function deleteMovie($id)
    {
        $pelicula = Movie::findOrFail($id);
        $pelicula->delete();

        Session::flash('mensaje', 'La película se ha eliminado correctamente');
        return redirect('/catalog');
    }
}
