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
        $movies = Movie::paginate(10);
        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        return view('movies.create', ['movies' => $movies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'poster' => 'required|string',
            'rating' => 'required|integer',
            'director' => 'required|string|max:100',
            'genre' => 'required',
            'release_date' => 'required|date',
            'description' => 'required|max:1000'
        ]);

        $movie = Movie::create($request->all());

        return redirect()->route('movies.show', ['id' => $movie->id])->with('message', 'The movie is created successfully.');
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
        $movie->delete();

        return redirect()->route('movies.index')->with('message', 'The movie was deleted.');
    }
}
