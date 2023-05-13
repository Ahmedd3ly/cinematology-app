@extends('layouts.app')

@section('title', 'Top Movies') 
        
@section('content')
        <h2>The latest releases:</h2>
        <ul>
            @foreach ($movies as $movie)
                <li>{{ $movie->title }}</li>
            @endforeach
        </ul>
@endsection