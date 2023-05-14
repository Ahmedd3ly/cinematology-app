@extends('layouts.app')

@section('content')
<div class="card my-5">
    <div class="card-body">
        <h1><b>Add New Movie</b></h1>
        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Movie Title</label>
                <input type="text" class="form-control" name="title"
                 value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label>Movie Poster</label>
                <input type="text" class="form-control" name="poster">
            </div>
            <div class="form-group">
                <label>Movie Rating</label>
                <select class="form-select" name="rating"
                value="{{ old('rating') }}">
                    <option value='1'> 1 </option>
                    <option value='2'> 2 </option>
                    <option value='3'> 3 </option>
                    <option value='4'> 4 </option>
                    <option value='5'> 5 </option>
                </select>
            </div>
            <div class="form-group">
                <label>Movie Director</label>
                <input type="text" class="form-control" name="director"
                value="{{ old('director') }}">
            </div>
            <div class="form-group">
                <label>Movie Genre</label>
                <select class="form-select" name="genre"
                value="{{ old('genre') }}">
                    <option value="Action">Action</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Horror">Horror</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Romance">Romance</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Thriller">Thriller</option>
                </select>
            </div>
            <div class="form-group">
                <label>Release Date</label>
                <input type="date" class="form-control" name="release_date"
                value="{{ old('release_date') }}">
            </div>
            <div class="form-group">
                <label>Movie Description</label>
                <textarea class="form-control" name="description" rows="10"> </textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2 float-end"> Submit Movie </button>
        </form>
    </div>
</div>

@endsection