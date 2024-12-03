@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

<div class="school-margin">


    <h1>Submit Form with AJAX</h1>

    <form id="ajax-form">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="name">Description:</label>
        <input type="text" id="name" name="description" required><br><br>

        <label for="name">Price:</label>
        <input type="text" id="name" name="price" required><br><br>

        <label for="name">Stock:</label>
        <input type="text" id="name" name="stock" required><br><br>

        <button type="submit">Submit</button>
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
                
                e.preventDefault();
                
                var formData= $(this).serialize();

                $.ajax({
                    url: "{{route('test.store')}}" ,
                    type: 'POST',
                    data: formData,

                    success: function(response){
                        $('#response-message').html(response.message);
                    },

                    error: function(){
                        alert('form submit failed');
                    }
                })
            })
        });
    </script>

@endsection
