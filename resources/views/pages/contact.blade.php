@extends('layouts.app')

@section('title', 'Contact us | University of Michigan')

@section('header-class', 'header-transparent')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

    <div class="noticeboard-header">

        @if($contactPageContent)
            <h1 class="noticeboard-title">{{$contactPageContent->title}}</h1>
        @endif
    </div>
    
    <div class="contact-info-header">

        @if($contactPageContent)
            <p> {{$contactPageContent->button}} </p>
        @endif
        
    </div>

<div class="contact-row">

    <div class="col col-1">
        <i class="fa-solid fa-globe"></i>
        <h2>Address</h2>
        <p>4333 Factoria Blvd SE, Bellevue, WA 98006</p>
    </div>

    <div class="divider"></div>

    <div class="col col-2">
        <i class="fa-regular fa-envelope"></i>
        <h2>Email</h2>
        <p>ekattor@example.com</p>
    </div>

    <div class="divider"></div>


    <div class="col col-3">
        <i class="fa-solid fa-phone"></i>
        <h2>Phone</h2>
        <p>677492151</p>
    </div>

    <div class="divider"></div>

    <div class="col col-4">
        <i class="fa-solid fa-fax"></i>
        <h2>Fax</h2>
        <p>1234567890</p>
    </div>

</div>

<div class="line"></div>

<div class="form-header">
    <p>Contact Form</p>
</div>

<div class="form-header2">
    <p>Send us a message</p>
</div>




<div class="form-body">

    <form id="contactForm">
    @csrf
    
        <div class="row1">
            
            <div class="err-message alert alert-success">
                
            </div>
        
        </div>
        
        <div class="row1">
            <div class="col1">
                <label for="name1-label">FIRST NAME<span class="required">*</span></label>
                <input type="text" name="fname" required>
            </div>

            <div class="col1">
                <label for="name1-label">LAST NAME<span class="required">*</span></label>
                <input type="text" name="lname" required>
            </div>
        </div>

        <div class="row1">
            <div class="col1">
                <label for="name1-label">YOUR EMAIL ADDRESS<span class="required">*</span></label>
                <input type="email" name="email" required>
            </div>

            <div class="col1">
                <label for="name1-label">YOUR PHONE NUMBER<span class="required">*</span></label>
                <input type="phone" name="phone" required>
            </div>
        </div>


        <div class="row2">
            <div class="col2">
                <label for="name1-label">LOCATION<span class="required">*</span> </label>
                <input type="text" name="location" required>
            </div>
        </div>


        <div class="row2">
            <div class="col2">
                <label for="name1-label">COMMENTS OR QUESTIONS<span class="required">*</span></label>
                <textarea name="question" class="comments" required></textarea>
            </div>
        </div>


        <div class="row3">
            <button type="submit" class="qna-button">Submit</button>
        </div>

    </form>

</div>


<script>
    $(document).ready(function(){

        $('#contactForm').on('submit', function(e){

            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: "{{route('contact.store')}}",
                type: "POST", 
                data: formData,

                success: function(response){
                    $('.alert-success').html('<h1>' + response.message + '</h1>');
                    $('#contactForm')[0].reset();
                },

                error: function(){
                    alert('form submit failed');
                }

            });
        });
    });
</script>

<script src="https://kit.fontawesome.com/2d7883494f.js" crossorigin="anonymous"></script>

@endsection