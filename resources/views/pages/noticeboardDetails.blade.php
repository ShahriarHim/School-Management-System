@extends('layouts.app')

@section('title', 'Noticeboard-details Page')

<!-- Apply header-transparent class on home page only -->
@section('header-class', 'header-transparent')





<section class="about-section">
    <div class="about-content">
        <div class="text-content">
            <h5> About</h5>
            <h2>Welcome to Ekattor High School</h2>
            <p>Ekattor High School (NHS) is a public secondary school in Bellevue, Washington. It serves students in
                grades 9–12 in the southern part of the Bellevue School District, including the neighborhoods of
                Eastgate, Factoria, Newport Hills, Newport Shores, Somerset, The Summit, and Sunset. As of the 2014-2015
                school year, the principal is Dion Yahoudy. The mascot is the Knight, and the school colors are scarlet
                and gold.</p>
            <button class="learn-more-btn">Learn More</button>
        </div>
        <div class="image-content">
            <img src="{{ asset('images/home_promo_1.png') }}" alt="Ekattor High School" />
        </div>
    </div>
</section>