@extends('layouts.app')
@section('title', 'Home Page')
@section('header-class', 'header-transparent')
@section('content')
<link rel="stylesheet" href="{{ asset('css/galarystyle.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="noticeboard-header">
    <h1 class="noticeboard-title">Our Teachers</h1>
</div>
<div class="upper">
    <span class="btn1">Teachers</span>
    <h2 class="text-primary">Our Professional Teachers</h2>
</div>
<div class="team-container">



    <div class="team-row">

        <div class="team-member no-pic">
            <div class="name">John Doe</div>
            <div class="position">Developer</div>
            <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor Lorem
                ipsum dolor sit amet consectetur adipisicing elit. Dolore assumenda obcaecati ad deleniti magni minima
                mollitia, eum perferendis ullam itaque? sit amet, consectetur adipiscing elit.</div>
            <div class="social-media">
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://facebook.com/janesmith" tabindex="0">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://twitter.com/janesmith" tabindex="0">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://linkedin.com/in/janesmith" tabindex="0">
                    <span class="fab fa-linkedin-in btn-icon__inner"></span>
                </a>
            </div>
        </div>

        <div class="team-member with-pic">
            <img src="{{ asset('images/pic1.jpeg') }}" alt="John Doe" class="round-pic">
        </div>

        <div class="team-member no-pic">
            <div class="name">Jane Smith</div>
            <div class="position">Designer</div>
            <div class="description">Sed do eiusmod tempor Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Placeat veritatis beatae voluptas quo porro saepe soluta dolor doloribus repellendus delectus.
                incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
            <div class="social-media">
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://facebook.com/janesmith" tabindex="0">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://twitter.com/janesmith" tabindex="0">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://linkedin.com/in/janesmith" tabindex="0">
                    <span class="fab fa-linkedin-in btn-icon__inner"></span>
                </a>
            </div>

        </div>
        <div class="team-member with-pic">
            <img src="{{ asset('images/pic1.jpeg') }}" alt="Jane Smith" class="round-pic">
        </div>

    </div>




    <div class="team-row">
        <div class="team-member no-pic">
            <div class="name">John Doe</div>
            <div class="position">Developer</div>
            <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor Lorem
                ipsum dolor sit amet consectetur adipisicing elit. Dolore assumenda obcaecati ad deleniti magni minima
                mollitia, eum perferendis ullam itaque? sit amet, consectetur adipiscing elit.</div>
            <div class="social-media">
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://facebook.com/janesmith" tabindex="0">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://twitter.com/janesmith" tabindex="0">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://linkedin.com/in/janesmith" tabindex="0">
                    <span class="fab fa-linkedin-in btn-icon__inner"></span>
                </a>
            </div>
        </div>
        <div class="team-member with-pic">
            <img src="{{ asset('images/pic1.jpeg') }}" alt="John Doe" class="round-pic">
        </div>
        <div class="team-member no-pic">
            <div class="name">Jane Smith</div>
            <div class="position">Designer</div>
            <div class="description">Sed do eiusmod tempor Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Placeat veritatis beatae voluptas quo porro saepe soluta dolor doloribus repellendus delectus.
                incididunt ut labore et dolore magna aliqua, Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
            <div class="social-media">
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://facebook.com/janesmith" tabindex="0">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://twitter.com/janesmith" tabindex="0">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                </a>
                <a class="btn btn-sm btn-icon btn-soft-secondary" href="https://linkedin.com/in/janesmith" tabindex="0">
                    <span class="fab fa-linkedin-in btn-icon__inner"></span>
                </a>
            </div>
        </div>
        <div class="team-member with-pic">
            <img src="{{ asset('images/pic1.jpeg') }}" alt="Jane Smith" class="round-pic">
        </div>
    </div>
</div>
@endsection