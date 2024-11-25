@extends('layouts.app')

@section('title', 'Home Page')

<!-- Apply header-transparent class on home page only -->
@section('header-class', 'header-transparent')

@section('content')
<link rel="stylesheet" href="{{ asset('css/teacherstyle.css') }}">
<link rel="stylesheet" href="{{ asset('css/eventstyle.css') }}">
<div class="carousel-container">
    <div class="carousel">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider1.jpg') }}" class="d-block w-100" alt="Image 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider2.jpg') }}" class="d-block w-100" alt="Image 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider3.jpg') }}" class="d-block w-100" alt="Image 3">
        </div>
    </div>
    <button class="carousel-control-prev">&#10094;</button>
    <button class="carousel-control-next">&#10095;</button>
</div>

<!-- About Section -->
<section class="about-section">
    <div class="about-content">
        <div class="text-content">
            <h6> {{$home->button}}</h6>
            <h2>{{$home->title}}</h2>
            <p>{{$home->content}}</p>
            <button class="learn-more-btn">Learn More ></button>
        </div>
        <div class="image-content">
            <img src="{{ $home->image}}" alt="Ekattor High School" />
        </div>
    </div>
</section>


<!-- Our Teachers Section -->
<div class="team-container">
    <div class="noticeboard-precontent">
        <p class="noticeboard-subheader">{{$coach->button}}</p>
        <h2 class="section-subtitle">{{$coach->title2}}</h2>
    </div>
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

            @if($index % 2 == 1 || $index == count($teachers) - 1)
                </div>
            @endif
    @endforeach
</div>
<div class="button-container">
    <button class="learn-more-btn">Learn More ></button>
</div>

<!-- Events Section -->

<section class="events-section my-5">
    <div class="container-fluid">
        <div class="noticeboard-precontent">
            <p class="noticeboard-subheader">{{$event_head->button}}</p>
            <h2 class="section-subtitle">Upcoming {{$event_head->button}}</h2>
        </div>
        <div class="vlog-grid">
            @foreach($events as $event)
                @if($event->status !== 'past')
                    <div class="vlog-item">
                        <div class="date">{{\Carbon\Carbon::parse($event->date)->format('d M, Y')}}</div>
                        <span class="vlog-name"><a class="styled-link" href="#">{{ $event->description }}</a></span>
                        <hr>
                        <div class="vlog-footer">
                            <img src="{{ asset($event->image) }}" class="vlog-pic">
                            <p class="vlog-title"><a class="styled-link" href="#">{{ $event->author_name }}</a></p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="slider-dots">
            @for ($i = 0; $i < count($events) / 4; $i++)
                <span class="dot" onclick="currentSlide({{ $i + 1 }})"></span>
            @endfor
        </div>
        <div class="button-container">
            <button class="learn-more-btn">Learn More ></button>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const prevButton = document.querySelector('.carousel-control-prev');
        const nextButton = document.querySelector('.carousel-control-next');
        const carousel = document.querySelector('.carousel');
        const items = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        // Move to the next slide
        nextButton.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel();
        });

        // Move to the previous slide
        prevButton.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel();
        });

        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
        }
    });
</script>
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

        if (n > totalSlides) { slideIndex = 1 }
        if (n < 1) { slideIndex = totalSlides }

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