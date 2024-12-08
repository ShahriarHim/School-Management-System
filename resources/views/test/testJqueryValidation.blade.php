@extends('layouts.admin')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> -->
    

@endpush


<div class="school-margin">

    <h1>Submit a New Order</h1>

    <form id="ajax-form">
        @csrf
        @method('POST')

        <div class="col1">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" >
            <span class="error" id="nameError"></span>

        </div>

        <div class="col1">
            <label for="name">Description:</label>
            <input type="text" id="description" name="description">
        </div>

        <div class="col1">
            <label for="name">Price:</label>
            <input type="text" id="price" name="price">
        </div>

        <div class="col1">
            <label for="name">Stock:</label>
            <input type="text" id="stock" name="stock">
        </div>

        <div class="addUpdate-school-button-div">
            <button type="submit" class="addUpdate-school-button">Submit</button>

        </div>

    </form>

    <div id="response-message"></div>
</div>

<!-- 
<script>

$(document).ready(function(){
    $('#ajax-form').validate({
        rules: {
            name: 'required',
            description: {
                required: true,
                minlength: 6
            },
            price: 'required',
            stock: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            name: "Please enter name",
            description: {
                required: "this is a must field",
                minlength: "description must be at least 6 characters"
            },
            price: "this is a must field",
            stock:{
                required: "please enter the stock",
                minlength: "length of the stock must be at least 3"
            }
        }
    });
});

</script>  
-->



<script>
    
    $('#name').on('input', function(){
        let nameVal=$(this).val().trim();

        if(nameVal.length < 3){
            $('#nameError').addClass('error').text('Name must be at least 3 character');
        }
        else{
            $('#nameError').text('').addClass('valid').text('Name looks good');

        }
    })


    $(document).ready(function(){

        $('#ajax-form').on('submit', function(e){
            
            e.preventDefault();
            
            var formData= $(this).serialize();

            $.ajax({
                url: "{{route('test.store')}}", 
                type: 'POST',
                data: formData,

                success: function(response){
                    $('#response-message').html(response.message);
                    $('#response-message').show();
                    $('#ajax-form')[0].reset();

                },

                error: function(){
                    alert('Submit failed');
                }
            })
        })
    });
</script>


@endsection
