@extends('layouts.app')
@section('title', 'Gallery Page')
@section('header-class', 'header-transparent')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/gal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="first">
        <h1>Photo Gallery</h1>
    </div>
    <div class="upper">
        <span class="btn1">Albums</span>
        <h2 class="text-primary">Our latest photo galleries</h2>
    </div>

    <div class="gal-container">


        <a href="{{ url('/galdetails') }}">
        <div class="pic">
            <img src="{{ asset('images/picg1.jpg') }}" class="vlog-pic">
            <div class="overlay-text">
                <h1>School Images</h1>
                <h2>8 Images</h2>
            </div>
        </div>
        </a>

        <a href="{{ url('/galdetails') }}">
        <div class="pic">
            <img src="{{ asset('images/picg2.jpg') }}" class="vlog-pic">
            <div class="overlay-text">
                <h1>School Images</h1>
                <h2>8 Images</h2>
            </div>
        </div>
        </a>

        <a href="{{ url('/galdetails') }}">
        <div class="pic">
            <img src="{{ asset('images/picg3.jpg') }}" class="vlog-pic">
            <div class="overlay-text">
                <h1>School Images</h1>
                <h2>8 Images</h2>
            </div>
        </div>
        </a>

    </div>

@endsection
