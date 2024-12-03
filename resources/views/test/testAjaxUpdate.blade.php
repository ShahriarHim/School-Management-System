@extends('layouts.admin')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<link rel="stylesheet" href="{{asset('css/salauddin.css')}}">
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush
<div class="school-margin">


    <h1>Submit a New Order</h1>

    <form id="ajax-form">
        @csrf
        @method('PUT')

        <div class="col1">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value=" {{$test->name}} ">
        </div>

        <div class="col1">
            <label for="name">Description:</label>
            <input type="text" id="name" name="description" required value=" {{$test->description}} ">
        </div>

        <div class="col1">
            <label for="name">Price:</label>
            <input type="text" id="name" name="price" required value=" {{$test->price}} ">
        </div>

        <div class="col1">
            <label for="name">Stock:</label>
            <input type="text" id="name" name="stock" required value=" {{$test->stock}} ">
        </div>

        <div class="addUpdate-school-button-div">
            <button type="submit" class="addUpdate-school-button">Submit</button>

        </div>

    </form>

    <div id="response-message"></div>
</div>
<!--     
    <script>
        $(document).ready(function() {
            $('#ajax-form').on('submit', function(e) {
                e.preventDefault(); 

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{route('test.store')}}", 
                    type: 'POST', 
                    data: formData, 
                    success: function(response) {
                        $('#response-message').html('<p style="background-color: gray">' + response.message + '</p>');
                    },

                    error: function(){
                        alert('couldnot submit');
                    }
                });
            });
        });
    </script>
-->



    <script>
        $(document).ready(function(){

            $('#ajax-form').on('submit', function(e){
                
                /* e.preventDefault(); */
                
                var formData= $(this).serialize();

                $.ajax({
                    url: "{{route('test.update',[$test->id])}}" ,
                    type: 'PUT',
                    data: formData,

                    success: function(response){
                        $('#response-message').html(response.message);
                        $('#response-message').show();
                        $('#ajax-form')[0].reset();

                    },

                    error: function(){
                        alert('Update failed');
                    }
                })
            })
        });
    </script>

@endsection
