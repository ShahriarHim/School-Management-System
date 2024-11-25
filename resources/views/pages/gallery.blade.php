@extends('layouts.app')
@section('title', 'Gallery Page')
@section('header-class', 'header-transparent')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/gal.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="first">
        <h1>{{ $pc[0]->title }}</h1>
    </div>
    <div class="upper">
        <span class="btn1">{{ $pc[0]->button }}</span>
        <p class="text-primary">{{ $pc[0]->title2 }}</p>
    </div>
    <div class="gal-container">
        @foreach ($galleries as $gallery)
            <a href="{{ url('/galdetails', $gallery->id) }}">
                <div class="pic">
                    <img src="{{ asset($gallery->thumbnail) }}" class="vlog-pic">
                    <div class="overlay-text">
                        <h1>{{ $gallery->title }}</h1>
                        <h2>{{ $gallery->images_count }} Images</h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
