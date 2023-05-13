@extends('layouts.app')

@section('title', 'Movie Details') 
        
@section('content')
        <ul>
            <li>Movie Title: {{ $movie->title }}</li>
            <li>Movie Description: {{ $movie->description }}</li>
            <li>Movie Director: {{ $movie->director }}</li>
            <li>Movie Release Date: {{ $movie->release_date ?? 'Unknown' }}</li>
            <li>Movie Genre: {{ $movie->genre }}</li>
            <li>Movie Rating: {{ $movie->rating ?? 'Unknown' }}</li>
        </ul>
@endsection