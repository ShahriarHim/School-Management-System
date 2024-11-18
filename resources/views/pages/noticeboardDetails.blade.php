@extends('layouts.app')

@section('title', 'Noticeboard-details Page')

<!-- Apply header-transparent class on home page only -->
@section('header-class', 'header-transparent')




<div class="noticeboard-header">
    <h1 class="noticeboard-title">Noticeboard</h1>
</div>

<?php
$titleArray = [
    'Sports day preparation event calling',
    'Picnic registration is now open',
    'Semester exam date postponed',
    'Library building renovated'
];
?>
<section class="notice-details-section">

    <div class="notice-details-content">
        <div class="notice-text-content">
            <a href="{{url('/noticeboard')}}" class="back-btn-container">
                <span class="fas fa-arrow-left small back-btn-icon"></span>
                <span class="back-btn-text">Back to noticeboard</span>
            </a>

            <h1>{{$titleArray[$title - 1]}}</h1>
            <span>31 Dec, 2019</span>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
                undoubtable source.</p>
        </div>
        <div class="notice-details-image">
            <img src="{{ asset('images/nb1.jpg') }}" alt="Ekattor High School" />
        </div>
    </div>
</section>