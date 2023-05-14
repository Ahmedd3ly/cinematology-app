@extends('layouts.app')

@section('content')
<h1> All Cast</h1>
<div class="row">
    @if (count($movie_cast))
    @foreach ($movie_cast as $cast)
    <div class="col-md-4">
        <div class="card h-100">
            <img src='{{ $cast->image }}' class="card-image-top">
            <div class="card-body">
                <h3> <a href="{{ route('cast.show', $cast->id)}}"> {{ $cast->name }} </a></h3>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p><b> No Cast Added! </b></p>
    @endif
</div>
@endsection