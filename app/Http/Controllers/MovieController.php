<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        
        if (!$movie) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        return response()->json($movie);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'synopsis' => 'required|string',
            'year' => 'required|integer',
            'cover' => 'required|string',
        ]);
    
        $movie = Movie::create($request->all());
    
        return response()->json($movie, 201);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        
        if (!$movie) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $request->validate([
            'title' => 'string',
            'synopsis' => 'string',
            'year' => 'integer',
            'cover' => 'string',
        ]);

        $movie->update($request->all());

        return response()->json($movie);
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        
        if (!$movie) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $movie->delete();

        return response()->json(['message' => 'Registro eliminado con éxito']);
    }
}
