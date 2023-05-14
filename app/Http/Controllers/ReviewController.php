<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewReviewAdded;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Movie $movie)
    {
        $request->validate(['review' => 'required|max:1000']);
        $review = Review::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $movie->id,
            'review' => $request->review,
        ]);

        $users = User::all();
        $movieTitle = $movie->title;
        $reviewerEmail = Auth::user()->email;

        // Send email notification to all users
        foreach ($users as $user) {
        Mail::to($user->email)->send(new NewReviewAdded($movieTitle, $reviewerEmail));
    }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $review = Review::findOrFail($id);
        if($id !== Auth::user()->id){        
            abort(403);
        }
        $review->delete();
        return back();  
    }
}
