@extends('layouts.app')

@section('title', 'Noticeboard')

@section('header-class', 'header-transparent')

@section('content')
<div class="noticeboard-header">
    <h1 class="noticeboard-title">{{$pageContents->title}}</h1>
</div>
<div class="noticeboard-precontent">
    <p class="noticeboard-subheader">{{$pageContents->button}}</p>
    <h2 class="section-subtitle">{{$pageContents->title2}}</h2>
</div>

<div class="noticeboard-content">
    @foreach ($notices as $item)
        <div class="notice-item">
            <div class="notice-image">
                @if ($item->image)
                    <img src="{{ $item->image}}" alt="{{ $item->title }}">
                @else
                    <img src="{{ asset('images/default-notice.jpg') }}" alt="Default Image">
                @endif
            </div>
            <div class="notice-text">
                <span class="notice-date">{{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</span>
                <a href="{{ url('/noticeboard-details', ['id' => $item->id]) }}" class="notice-title-link">
                    <h3>{{ $item->title }}</h3>
                </a>
                <p class="notice-description">{{ Str::limit($item->description, 100, '...') }}</p>
                <a href="{{ url('/noticeboard-details', ['id' => $item->id]) }}" class="read-more-btn">Read More</a>
            </div>
        </div>
    @endforeach

</div>
@endsection