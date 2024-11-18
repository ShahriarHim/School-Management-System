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
            <img src="{{ asset('images/slider4.jpg') }}" class="d-block w-100" alt="Image 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider5.jpg') }}" class="d-block w-100" alt="Image 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider6.jpg') }}" class="d-block w-100" alt="Image 3">
        </div>
    </div>
    <button class="carousel-control-prev">&#10094;</button>
    <button class="carousel-control-next">&#10095;</button>
</div>

<!-- About Section -->
<section class="about-section">
    <div class="about-content">
        <div class="text-content">
            <h6> About</h6>
            <h2>Welcome to Ekattor High School</h2>
            <p>Ekattor High School (NHS) is a public secondary school in Bellevue, Washington. It serves students in
                grades 9–12 in the southern part of the Bellevue School District, including the neighborhoods of
                Eastgate, Factoria, Newport Hills, Newport Shores, Somerset, The Summit, and Sunset. As of the 2014-2015
                school year, the principal is Dion Yahoudy. The mascot is the Knight, and the school colors are scarlet
                and gold.</p>
            <button class="learn-more-btn">Learn More ></button>
        </div>
        <div class="image-content">
            <img src="{{ asset('images/home_promo_1.png') }}" alt="Ekattor High School" />
        </div>
    </div>
</section>


<!-- Our Teachers Section -->
<div class="team-container">
    <div class="noticeboard-precontent">
        <p class="noticeboard-subheader">Teachers</p>
        <h2 class="section-subtitle">Our Professional Teachers</h2>
    </div>
    <div class="team-row">
        @foreach ($teachers as $teacher)
            <div class="team-member {{ $teacher->image ? 'with-pic' : 'no-pic' }}">

                <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name }}" class="round-pic">

                <div class="name">{{ $teacher->name }}</div>
                <div class="position">{{ $teacher->designation }}</div>
                <div class="description">{{ $teacher->description }}</div>
                <div class="social-media">
                    @if ($teacher->fb)
                        <a class="btn btn-sm btn-icon btn-soft-secondary" href="{{ $teacher->fb}}" tabindex="0">
                            <span class="fab fa-facebook-f btn-icon__inner"></span>
                        </a>
                    @endif
                    @if ($teacher->twitter)
                        <a class="btn btn-sm btn-icon btn-soft-secondary" href="{{ $teacher->twitter }}" tabindex="0">
                            <span class="fab fa-twitter btn-icon__inner"></span>
                        </a>
                    @endif
                    @if ($teacher->linkedin)
                        <a class="btn btn-sm btn-icon btn-soft-secondary" href="{{ $teacher->linkedin }}" tabindex="0">
                            <span class="fab fa-linkedin-in btn-icon__inner"></span>
                        </a>
                    @endif
                </div>

            </div>
        @endforeach
    </div>
</div>
<div class="button-container">
    <button class="learn-more-btn">Learn More ></button>
</div>

<!-- Events Section -->

<section class="events-section my-5">
    <div class="container-fluid">
        <div class="noticeboard-precontent">
            <p class="noticeboard-subheader">Events</p>
            <h2 class="section-subtitle">Upcoming Events</h2>
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
            @for ($i = 0; $i < ceil($event->count() / 4); $i++)
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