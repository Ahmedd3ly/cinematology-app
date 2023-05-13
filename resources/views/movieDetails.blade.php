@extends('layouts.app')

        @if($movieTitle)

        @section('title') 
            {{$movieTitle}}
        @endsection 

        @section('content')
        <p>Tell us what do you think of {{$movieTitle}}.</p>
        @endsection

        @else
        @section('title', 'Movie not found!') 
        @endif