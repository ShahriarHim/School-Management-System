@extends('layouts.app')
@section('title', 'Coaches Page')
@section('header-class', 'header-transparent')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/teacherstyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <div class="first">
        <h1>{{ $pc->title }}</h1>
    </div>
    <div class="upper">
        <span class="btn1">{{ $pc->button }}</span>
        <p class="text-primary">{{ $pc->title2 }}</p>
    </div>
    <div class="team-container">
        @foreach($teachers as $index => $teacher)
            @if($index % 2 == 0)
                <div class="team-row">
            @endif

            <div class="team-member no-pic">
                <div class="name">{{ $teacher->name }}</div>
                <div class="position">{{ $teacher->designation }}</div>
                <div class="description">{{ $teacher->description }}</div>
                <div class="social-media">
                    <a class="btn btn-sm btn-icon btn-soft-secondary" href="{{ $teacher->fb }}" tabindex="0">
                        <span class="fab fa-facebook-f btn-icon__inner"></span>
                    </a>
                    <a class="btn btn-sm btn-icon btn-soft-secondary" href="{{ $teacher->twitter }}" tabindex="0">
                        <span class="fab fa-twitter btn-icon__inner"></span>
                    </a>
                    <a class="btn btn-sm btn-icon btn-soft-secondary" href="{{ $teacher->linkedin }}" tabindex="0">
                        <span class="fab fa-linkedin-in btn-icon__inner"></span>
                    </a>
                </div>
            </div>
            <div class="team-member with-pic">
                <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name }}" class="round-pic">
            </div>

            @if($index % 2 == 1 || $index == $teachers->count() - 1)
                </div>
            @endif
        @endforeach
    </div>
@endsection
