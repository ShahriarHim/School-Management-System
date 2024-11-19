@extends('layouts.app')

@section('title', 'About us | University of Michigan')

@section('header-class', 'header-transparent')

@section('content')
    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

    <div class="noticeboard-header">
        <h1 class="noticeboard-title">{{$about->title}}</h1>
    </div>

    <div class="about-page-margin">
        <div class="">
            <img class="about-img" src="{{asset('images/admin/'.$about->image)}}" alt="">
        </div>


        <div>
            {!!$about->content!!}
        </div>
    </div>



@endsection
 
