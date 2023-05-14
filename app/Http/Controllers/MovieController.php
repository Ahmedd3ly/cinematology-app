<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'poster' => 'required|',
            'rating' => 'required|integer',
            'director' => 'required|max:100',
            'genre' => 'required',
            'release_date' => 'required|date',
            'description' => 'required|max:1000'
        ]);

        $movie = Movie::create($request->all());

        session()->flash('message', "Movie was created.");

        return redirect()->route('movies.show', $movie->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $movie = Movie::findOrFail($id);
        return view('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        if ($id !== Auth::user()->id) {
            abort(403);
        }
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
