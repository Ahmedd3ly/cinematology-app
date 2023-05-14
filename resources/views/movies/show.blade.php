@extends('layouts.app')

@section('content')
<div class="card my-5">
    <img src='{{ $movie->poster }}' class="card-image-top">
    <div class="card-body">
        <h1>{{ $movie->title }}</h1>
        <div class="text-danger">
            @for ($i = 1; $i <= $movie->rating; $i++) <i class="fas fa-star"></i>
                @endfor
        </div>
        <p><b> Description: </b> {{ $movie->description }}</p>
        <p><b> Director: </b> {{ $movie->director }}</p>
        <p><b> Genre: </b> {{ $movie->genre }}</p>
        <p><b> Release Date: </b> {{ $movie->release_date }}</p>

        <h3>Cast
            @auth
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus"></i>
            </button>
            @endauth
        </h3>
        <ul class="list-group list-group-flush">
            @if (count($movie->casts))
            @foreach($movie->casts as $cast)
            <li class="list-group-item">
                <a href= " {{ route(cast.show, $cast->id) }} "  >{{ $cast -> name }} - </a>
                <span class="text-muted font-italic "> {{ $cast->pivot->role }} </span>
                @auth
                <form action="#" method="POST">
                    <button type="submit" class="btn btn-link text-danger">Delete</button>
                </form>
                @endauth
            </li>
            @endforeach
            @else
            <p> The movie casts have not been defined!</p>
            @endif
        </ul>

        <h3>Reviews</h3>
        <ul class="list-group list-group-flush">
            @if (count($movie->reviews))
            @foreach($movie->reviews as $review)
            <li class="list-group-item"><b> {{ $review->user->name }}</b> {{ $review->review }}
                @auth
                <form action="#" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-link text-danger">Delete</button>
                </form>
                @endauth
            </li>
            @endforeach
            @else
            <p> This movie does not havea any reviews yet! Be the first.</p>
            @endif
        </ul>
        <form action="{{ route('reviews.store', $movie->id) }}" method="POST">
            @csrf
            <input type="text" name="review" class="form-control" placeholder="Tell us what do you think..."
            value="{{ old('review') }}">
            <button type="submit" class="btn btn-primary mt-2 float-end"> Submit Review </button>
        </form>
    </div>
    @auth
    <div class="card-footer" method="POST">
        <form action=" {{ route('movies.destroy', $movie->id) }} ">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-link float-end"> Delete </button>
        </form>
    </div>
    @endauth
</div>

@auth
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Cast</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Cast Role</h1>
                        <form action="{{ route('cast.store', $movie->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Actor Name</label>
                                <select name="cast_movie_name" class="form-control">
                                    <option value="" disabled selected> Choose Cast </option>
                                    @if(count($movie->casts))
                                    @foreach ($movie->casts as $cast)
                                    <option value="{{ $cast->id  }}">{{ $cast->name }} </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class=" form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" name="cast_movie_role">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 float-end">Submit</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h1>New Cast</h1>
                        <form action="{{ route ('cast.store') }}" method="POST">
                            @csrf
                            <div class=" form-group">
                                <label>Actor Name</label>
                                <input type="text" class="form-control" name="cast_name">
                            </div>
                            <div class=" form-group">
                                <label>Actor Image</label>
                                <input type="text" class="form-control" name="cast_image">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2 float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection