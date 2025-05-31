<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Film;
use Illuminate\Support\Facades\File; // Tambahkan ini

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

     
    public function index()
    {
        $film = Film::all(); 
        return view('film.index', ['film' => $film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', ['genre' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1',
            'summary' => 'required|min:10',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre_id' => 'required'
        ]);
    
        // Simpan file poster
        $filename = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('image'), $filename);
    
        // Simpan data film
        $film = new Film();
        $film->title = $request->title;
        $film->summary = $request->summary;
        $film->release_year = $request->release_year;
        $film->genre_id = $request->genre_id;
        $film->poster = $filename;
        $film->save();
    
        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::findOrFail($id);
        return view('film.detail', ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();
        return view('film.edit', ['film' => $film, 'genre' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:1',
            'summary' => 'required|min:10',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre_id' => 'required'
        ]);

        $film = Film::findOrFail($id);

        if ($request->has('poster')) {
            $path = public_path('image/');
            File::delete($path . $film->poster);

            $fileName = time() . '.' . $request->poster->extension();
            $request->poster->move($path, $fileName);

            $film->poster = $fileName;
        }

        $film->title = $request->title;
        $film->summary = $request->summary;
        $film->release_year = $request->release_year;
        $film->genre_id = $request->genre_id;
        $film->save();

        return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);
    
        // Hapus semua review yang terkait dengan film ini
        $film->reviews()->delete();
    
        // Hapus poster jika ada
        $path = public_path('image/');
        File::delete($path . $film->poster);
    
        // Hapus film
        $film->delete();
    
        return redirect()->route('film.index')->with('success', 'Film berhasil dihapus.');
    }
}
