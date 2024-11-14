@extends('layouts.app')
@section('title', 'Gallery Details Page')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/galdetail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="first">
        <h1>Gallery</h1>
    </div>
    <div class="upper">
        <span class="btn1">01 Jan, 1897</span>
        <h2 class="text-primary">Convocation Day</h2>
    </div>

<div class="gal-container">
        <p class="it1">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
        layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
        using 'Content here, content here', making it look like readable English. It is a long established fact that a
        reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
        Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content
        here', making it look like readable English.</p>
        <div class="pic">
            <img src="{{ asset('images/picg5.jpg') }}" class="vlog-pic">
        </div>
        <div class="pic">
            <img src="{{ asset('images/picg6.jpg') }}" class="vlog-pic">
        </div>
        <div class="pic">
            <img src="{{ asset('images/picg1.jpg') }}" class="vlog-pic">
        </div>
        <div class="pic">
            <img src="{{ asset('images/picg3.jpg') }}" class="vlog-pic">
        </div>
        <div class="pic">
            <img src="{{ asset('images/picg2.jpg') }}" class="vlog-pic">
        </div>
        <div class="pic">
            <img src="{{ asset('images/picg1.jpg') }}" class="vlog-pic">
        </div>
        <div class="pic">
            <img src="{{ asset('images/picg4.jpg') }}" class="vlog-pic">
        </div>
        <div class="pic">
            <img src="{{ asset('images/picg5.jpg') }}" class="vlog-pic">
        </div>
    </div>

@endsection
