@extends('layouts.app')

@section('title', 'Noticeboard')

@section('header-class', 'header-transparent')



@section('content')
<div class="noticeboard-header">
    <h1 class="noticeboard-title">Noticeboard</h1>
</div>
<div class="noticeboard-precontent">
    <p class="noticeboard-subheader">Notices</p>

    <h2 class="section-subtitle">Follow up school notices</h2>
</div>
<div class="noticeboard-content">
    <!-- Sample Notice Item -->
    <div class="notice-item">
        <div class="notice-image">
            <img src="{{ asset('images/nb1.jpg') }}" alt="Notice Image">
        </div>
        <div class="notice-text">
            <span class="notice-date">31 Dec, 2019</span>
            <a href="{{ route('noticeboard-details', ['title' => 1]) }}" class="notice-title-link">
                <h3>Sports day preparation event calling</h3>
            </a>
            <p class="notice-description">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                roots in a piece of classic literature from 45 BC...</p>
            <a href="{{ route('noticeboard-details', ['title' => 1]) }}" class="read-more-btn">Read More</a>

        </div>
    </div>

    <div class="notice-item">
        <div class="notice-image">
            <img src="{{ asset('images/nb2.jpg') }}" alt="Notice Image">
        </div>
        <div class="notice-text">
            <span class="notice-date">30 Dec, 2019</span>
            <a href="{{ route('noticeboard-details', ['title' => 2]) }}" class="notice-title-link">
                <h3 class="notice-title">Picnic registration is now open</h3>
            </a>
            <p class="notice-description">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                roots in a piece of classic literature from 45 BC...</p>
            <a href="{{ route('noticeboard-details', ['title' => 2]) }}" class="read-more-btn">Read More</a>
        </div>
    </div>
    <div class="notice-item">
        <div class="notice-image">
            <img src="{{ asset('images/nb3.jpg') }}" alt="Notice Image">
        </div>
        <div class="notice-text">
            <span class="notice-date">19 Dec, 2019</span>
            <a href="{{ route('noticeboard-details', ['title' => 3]) }}" class="notice-title-link">
                <h3 class="notice-title">Semester exam date postponed</h3>
            </a>
            <p class="notice-description">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                roots in a piece of classic literature from 45 BC...</p>
            <a href="{{ route('noticeboard-details', ['title' => 3]) }}" class="read-more-btn">Read More</a>
        </div>
    </div>
    <div class="notice-item">
        <div class="notice-image">
            <img src="{{ asset('images/nb4.jpg') }}" alt="Notice Image">
        </div>
        <div class="notice-text">
            <span class="notice-date">1 Dec, 2019</span>
            <a href="{{ route('noticeboard-details', ['title' => 4]) }}" class="notice-title-link">
                <h3 class="notice-title">Library building renovated</h3>
            </a>
            <p class="notice-description">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                roots in a piece of classic literature from 45 BC...</p>
                <a href="{{ route('noticeboard-details',['title'=>4]) }}" class="read-more-btn">Read More</a>
        </div>
    </div>
</div>
@endsection