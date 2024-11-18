@extends('layouts.app')
@section('title', 'Events Page')
@section('header-class', 'header-transparent')
@section('content')

<link rel="stylesheet" href="{{ asset('css/eventstyle.css') }}">
<div class="first">
    <h1>{{ $pc->title }}</h1>
</div>
<div class="upper">
    <span class="btn">{{ $pc->button }}</span>
    <p class="text-primary">{{ $pc->title2 }}</p>
</div>
<div class="vlog-grid">
    @foreach($events as $event)
        @if($event->status !== 'past')
            <div class="vlog-item">
                <div class="date">{{ $event->date->format('d M, Y') }}</div>
                <span class="vlog-name"><a class="styled-link" href="#">{{ $event->details }}</a></span>
                <hr>
                <div class="vlog-footer">
                    <img src="{{ asset($event->image) }}" class="vlog-pic">
                    <p class="vlog-title"><a class="styled-link" href="#">{{ $event->title }}</a></p>
                </div>
            </div>
        @endif
    @endforeach
</div>
<div class="slider-dots">
    @for ($i = 0; $i < ceil($events->count() / 4); $i++)
        <span class="dot" onclick="currentSlide({{ $i + 1 }})"></span>
    @endfor
</div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("vlog-item");
        let dots = document.getElementsByClassName("dot");

        let totalSlides = Math.ceil(slides.length / 4);

        if (n > totalSlides) {slideIndex = 1}
        if (n < 1) {slideIndex = totalSlides}

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        let start = (slideIndex - 1) * 4;
        let end = start + 4;
        for (i = start; i < end && i < slides.length; i++) {
            slides[i].style.display = "block";
        }

        dots[slideIndex - 1].className += " active";
    }
</script>
@endsection
