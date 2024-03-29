<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cast = Cast::all();
        return view('cast.index', ['movie_cast' => $cast]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cast_name'  => 'required|string|max:100',
            'cast_image' => 'required'
        ]);

        $cast = Cast::create([
            'name'  => $request->cast_name,
            'image' => $request->cast_image
        ]);

        return redirect()->route('cast.show', ['cast' => $cast->id])->with('message', 'The cast has been added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cast = Cast::findOrFail($id);
        return view('cast.show', ['movie_cast' => $cast]);
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
        //
    }
}
