@extends('layouts.app')
@section('title', 'Gallery Details Page')
@section('header-class', 'header-transparent')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/galdetail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="first">
        <h1>Gallery</h1>
    </div>
    <div class="upper">
        <span class="btn1">2 Feb 1990</span>
        <p class="text-primary">Convocation Day </p>
    </div>
    <p class="it1">{{ $gallery->description }}</p>
    <div class="gal-container">
        @foreach($gallery->images as $image)
            <div class="pic">
                <img src="{{ asset($image->image) }}" class="vlog-pic">
                <div class="plus-overlay"> <span class="plus-icon">+</span> </div>
            </div>
        @endforeach
    </div>
@endsection
