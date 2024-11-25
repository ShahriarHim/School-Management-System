@extends('layouts.app')

@section('title', 'Noticeboard Details')

@section('header-class', 'header-transparent')

@section('content')
<div class="noticeboard-header">
    <h1 class="noticeboard-title">{{$pageContents-> title}}</h1>
</div>

<section class="notice-details-section">
    <div class="notice-details-content">
        <div class="notice-text-content">
            <a href="{{ url('/noticeboard') }}" class="back-btn-container">
                <span class="fas fa-arrow-left small back-btn-icon"></span>
                <span class="back-btn-text">Back to noticeboard</span>
            </a>

            <h1>{{ $notice->title }}</h1>
            <span>{{ \Carbon\Carbon::parse($notice->date)->format('d M, Y') }}</span>
            <p>{{ $notice->description }}</p>
        </div>
        <div class="notice-details-image">
            @if ($notice->image)
                <img src="{{ asset($notice->image) }}" alt="{{ $notice->title }}" />
            @else
                <img src="{{ asset('images/default-notice.jpg') }}" alt="Default Image" />
            @endif
        </div>
    </div>
</section>
@endsection
