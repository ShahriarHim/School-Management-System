@extends('layouts.app')

@section('title', 'Noticeboard')

@section('header-class', 'header-transparent')



@section('content')
<div class="noticeboard-header">
    <h1 class="noticeboard-title">Noticeboard</h1>
</div>
<div class="noticeboard-content">
    <h2 class="section-subtitle">Follow up school notices</h2>

    <!-- Sample Notice Item -->
    <div class="notice-item">
        <div class="notice-image">
            <img src="{{ asset('images/notice-image.jpg') }}" alt="Notice Image">
        </div>
        <div class="notice-text">
            <span class="notice-date">31 Dec, 2019</span>
            <h3 class="notice-title">Sports day preparation event calling</h3>
            <p class="notice-description">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                roots in a piece of classic literature from 45 BC...</p>
        </div>
    </div>

    <!-- Add more notice items as needed -->
</div>
@endsection