@extends('layouts.app')

@section('title', 'Home Page')

@section('header')
<!-- Image Slider (Custom CSS Carousel) -->
<header class="header">
    <img src="{{ asset('images/logo-light.png') }}" alt="Logo">
    <button class="nav-toggle" aria-label="Toggle navigation">☰</button>
    <nav class="navbar">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/noticeboard">Noticeboard</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="/coaches">Coaches</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>
</header>
@section('content')
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

<!-- Welcome Section -->
<section class="welcome-section text-center my-5">
    <h1>Welcome to the School Management System</h1>
    <p>Manage students, classes, schedules, and more, all from one centralized platform.</p>
</section>

<!-- Our Teachers Section -->
<section class="teachers-section my-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Teachers</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/teacher1.jpg') }}" class="rounded-circle mb-3" alt="Teacher 1" width="150">
                <h4>John Doe</h4>
                <p>Mathematics Teacher</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/teacher2.jpg') }}" class="rounded-circle mb-3" alt="Teacher 2" width="150">
                <h4>Jane Smith</h4>
                <p>Science Teacher</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/teacher3.jpg') }}" class="rounded-circle mb-3" alt="Teacher 3" width="150">
                <h4>Michael Brown</h4>
                <p>History Teacher</p>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="events-section my-5">
    <div class="container">
        <h2 class="text-center mb-4">Upcoming Events</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/event1.jpg') }}" class="card-img-top" alt="Event 1">
                    <div class="card-body">
                        <h5 class="card-title">Science Fair</h5>
                        <p class="card-text">Join us for an exciting science fair showcasing projects from our students.
                        </p>
                        <p><small>Date: Dec 15, 2024</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/event2.jpg') }}" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Math Olympiad</h5>
                        <p class="card-text">A competition for math enthusiasts to show their skills and win prizes.</p>
                        <p><small>Date: Jan 10, 2025</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/event3.jpg') }}" class="card-img-top" alt="Event 3">
                    <div class="card-body">
                        <h5 class="card-title">Art Exhibition</h5>
                        <p class="card-text">Experience beautiful art pieces created by our talented students.</p>
                        <p><small>Date: Feb 20, 2025</small></p>
                    </div>
                </div>
            </div>
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

@endsection