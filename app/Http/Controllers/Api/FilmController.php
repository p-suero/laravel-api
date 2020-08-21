<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Film;

class FilmController extends Controller
{
    public function index() {
        $films = Film::all();
        return response()->json($films);
    }

    public function show($id) {
        $film = Film::find($id);
        if ($film) {
            return response()->json([
                    'success' => true,
                    'results' => $film
            ]);
        } else {
            return response()->json([
                    'success' => true,
                    "error" => "nessu film trovato",
                    'results' => []
            ]);
        }
    }

    public function store(Request $request) {
        $new_film = new Film;
        $dati = $request->all();
        $new_film->fill($dati);
        $new_film->save();
        return response()->json([
                'success' => true,
                'results' => $new_film
        ]);
    }

    public function update(Request $request, $id) {
        $dati = $request->all();
        $film = Film::find($id);
        if ($film) {
            $film->update($dati);
            return response()->json([
                    'success' => true,
                    'results' => $film
            ]);
        }
        return response()->json([
                'success' => true,
                "error" => "nessu film trovato",
                'results' => []
        ]);
    }

    public function destroy($id) {
        $film = Film::find($id);
        if ($film) {
            $film->delete();
            return response()->json([
                    'success' => true,
                    'results' => $film
            ]);
        }
        return response()->json([
                'success' => true,
                "error" => "nessu film trovato",
                'results' => []
        ]);

    }
}
