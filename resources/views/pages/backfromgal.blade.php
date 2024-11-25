@extends('layouts.app')
@section('title', 'Gallery Details Page')
@section('header-class', 'header-transparent')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/galdetail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="first">
        <h1>{{ $pc[0]->title }}</h1>
    </div>
    <div class="upper">
        <span class="btn1">{{ \Carbon\Carbon::parse($gallery_date[0]->date)->format('d M, Y')
 }}</span>
        <p class="text-primary">{{ $gallery[0]->title }}</p>
    </div>
    {{-- <p class="it1">{{ $gallery->description }}</p> --}}
    <div class="gal-container">
        @foreach($gallery as $gal)
            <div class="pic">
                <img src="{{ asset($gal->image) }}" class="vlog-pic">
                <div class="plus-overlay"> <span class="plus-icon">+</span> </div>
            </div>
        @endforeach
    </div>
@endsection
