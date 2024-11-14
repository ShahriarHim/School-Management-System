@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/galarystyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="first">
        <h1>Photo Gallery</h1>
    </div>
    <div class="upper">
        <span class="btn1">Albums</span>
        <h2 class="text-primary">Our latest photo galleries</h2>
    </div>
    here i need a row of grid with 3 colmn each portion contain an image and out of image layer a title and 8 images
@endsection
