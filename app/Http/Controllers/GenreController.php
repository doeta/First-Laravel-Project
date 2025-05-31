<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|unique:genres,name'
        ]);

        Genre::create($request->only('name'));
        
        return redirect()->route('genre.index')->with('success', 'Genre berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $genre = Genre::find($id);
        return view('genre.detail', ['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|unique:genres,name,' . $id
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update($request->only('name'));

        return redirect()->route('genre.index')->with('success', 'Genre berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::findOrFail($id)->delete();
        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus.');
    }
}
