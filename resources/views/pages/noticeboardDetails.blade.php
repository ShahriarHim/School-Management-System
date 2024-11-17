@extends('layouts.app')

@section('title', 'Noticeboard-details Page')

<!-- Apply header-transparent class on home page only -->
@section('header-class', 'header-transparent')


@section('content')

<div class="noticeboard-header">
    <h1 class="noticeboard-title">Noticeboard</h1>
</div>

<?php
    $titleArray=[
        'Sports day preparation event calling',
        'Picnic registration is now open',
        'Semester exam date postponed',
        'Library building renovated'
        ];

?>



<section class="about-section">
    <div class="about-content">
        <div class="text-content">
            <a href="{{url('/noticeboard')}}" class="back-button">
                <span class="fas fa-arrow-left small back-btn-icon"></span>
                Back to noticeboard</a>
            <h2>{{$titleArray[$title-1]}}</h2>

            <p class="">31 Dec, 2019</p>

            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard 
                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through 
                the cites of the word in classical literature, discovered the undoubtable source.
            </p>
        </div>

        <div class="image-content">
            <img src="{{ asset('images/nb1.jpg') }}" alt="Ekattor High School" />
        </div>
    </div>
</section>
@endsection

