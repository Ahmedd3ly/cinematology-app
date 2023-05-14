@extends('layouts.app')

@section('content')
<h1> All Movies
    @auth
    <a href="{{ route('movies.create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i></a>
    @endauth
</h1>
<div class="row">
    @if (count ($movies))
    @foreach ($movies as $movie)
    <div class="col-md-4">
        <div class="card h-100">
            <img src='{{ $movie->poster }}' class="card-image-top">
            <div class="card-body">
                <h3> <a href="{{ route('movies.show', $movie->id) }}"> {{ $movie->title }} </a></h3>
                <div class="text-danger">
                    @for ($i = 1; $i <= $movie->rating; $i++) <i class="fas fa-star"></i>
                        @endfor
                </div>
                <p><b> Description: </b> {{ Str::limit($movie->description, 200) }}</p>
                <p><b> Director: </b> {{ $movie->director }}</p>
                <p><b> Genre: </b> {{ $movie->genre }}</p>
                <p><b> Release Date: </b> {{ $movie->release_date }}</p>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p>
        <b> No Movies Found! </b>
    </p>
    @endif
</div>
@endsection