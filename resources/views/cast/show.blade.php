@extends('layouts.app')

@section('content')
<div class="card my-4">
    <img src='{{ $movie_cast->image }}' class="card-image-top">
    <div class="card-body">
        <h1><b>{{ $movie_cast->name }}</b></h1>
        <p>All Movies of {{ $movie_cast->name }} </p>
        <div class="row">
            @if (count($movie_cast->movies))
            @foreach ($movie_cast->movies as $movie)
            <div class="col-md-4">
                <div class="card h-50">
                        <a href="{{ route('movies.show', $movie->id) }}"> {{ $movie->title }} </a>
                    <img src='{{ $movie->poster }}' class="card-image-top">
                </div>
            </div>
            @endforeach
            @else
            <p><b> No Movies Found! </b></p>
            @endif
        </div>
    </div>

    @auth
    <div class="card-footer">
        <form action="#" method="PUT">
            <button type="submit" class="btn btn-link float-end"> Delete </button>
        </form>
    </div>
    @endauth
</div>
@endsection
