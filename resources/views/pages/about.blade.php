@extends('layouts.app')

@section('title', 'About us | University of Michigan')

@section('content')
    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

    <div class="content-header">
        <h1>About us</h1>
    </div>

    <div class="about-page-margin">
        <div class="">
            <img class="about-img" src="{{asset('storage/about.jpg')}}" alt="">
        </div>

        <div>
            <h1 class="first-h1">About Our Schools</h1>

            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has 
                a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. It is a long established fact that 
                a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution 
                of letters, as opposed to using 'Content here, content here', making it look like readable English.
            </p>
        </div>

        <div>
            <h2>Our school historys</h2>

            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard 
                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going 
                through the cites of the word in classical literature, discovered the undoubtable source.
            </p>
        </div>

        <div class="last-div">
            <h2>Something interesting about our schools</h2>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't
                look even slightly believable. If you are going to use a passage
            </p>

                <ul>
                    <li>making this the first true generator</li>
                    <li>to generate Lorem Ipsum which</li>
                    <li>but the majority have suffered alteratio</li>
                    <li>is that it has a more-or-less</li>
                </ul>

            <p class="last-p">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
            
        </div>
    </div>



@endsection
 
