@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<link rel="stylesheet" href="{{ asset('css/eventstyle.css') }}">
<div class="first">
    <h1>School events</h1>
</div>
<div class="upper">
<span class="btn">Events</span>
<h2 class="text-primary">Upcoming and past events</h2>
</div>
<div class="vlog-grid">

    <div class="vlog-item">
        <div class="date">01 Feb, 2022</div>
        <h2 class="vlog-title"><a class="styled-link" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quos nostrum incidunt.</a></h2>
        <hr>
        <div class="vlog-footer">
            <img src="{{ asset('images/pic1.jpeg') }}" class="vlog-pic">
            <span class="vlog-name"><a class="styled-link" href="#">John Doe</a></span>
        </div>
    </div>


    <div class="vlog-item">
        <div class="date">02 Mar, 2022</div>
        <h2 class="vlog-title"><a class="styled-link" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quos nostrum incidunt.</a></h2>
        <hr>
        <div class="vlog-footer">
            <img src="{{ asset('images/pic1.jpeg') }}" class="vlog-pic">
            <span class="vlog-name"><a class="styled-link" href="#">John Doe</a></span>
        </div>
    </div>


    <div class="vlog-item">
        <div class="date">03 Apr, 2022</div>
        <h2 class="vlog-title"><a class="styled-link" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quos nostrum incidunt.</a></h2>
        <hr>
        <div class="vlog-footer">
            <img src="{{ asset('images/pic1.jpeg') }}" class="vlog-pic">
            <span class="vlog-name"><a class="styled-link" href="#">John Doe</a></span>
        </div>
    </div>


    <div class="vlog-item">
        <div class="date">04 May, 2022</div>
        <h2 class="vlog-title"><a class="styled-link" href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quos nostrum incidunt.</a></h2>
        <hr>
        <div class="vlog-footer">
            <img src="{{ asset('images/pic1.jpeg') }}" class="vlog-pic">
            <span class="vlog-name"><a class="styled-link" href="#">John Doe</a></span>
        </div>
    </div>


</div>
@endsection



