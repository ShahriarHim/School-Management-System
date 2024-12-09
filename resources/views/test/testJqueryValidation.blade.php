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
            <span class="errorSpan" id="nameError"></span>

        </div>

        <div class="col1">
            <label for="name">Description:</label>
            <input type="text" id="description" name="description">
            <span class="errorSpan" id="descriptionError"></span>
        </div>

        <div class="col1">
            <label for="name">Price:</label>
            <input type="text" id="price" name="price">
            <span class="errorSpan" id="priceError"></span>

        </div>

        <div class="col1">
            <label for="name">Stock:</label>
            <input type="text" id="stock" name="stock">
            <span class="errorSpan" id="stockError"></span>
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
            $('#nameError').addClass('errorSpan').text('Name must be at least 3 characters').removeClass('validSpan');
        }
        else{
            $('#nameError').addClass('validSpan').text('Name looks good').removeClass('errorSpan');

        }
    })

    $('#description').on('input', function(){
        let val=$(this).val().trim();

        if(val.length < 5){
            $('#descriptionError').addClass('errorSpan').text('Description must be at least 5 characters').removeClass('validSpan');
        }

        else{
            $('#descriptionError').addClass('validSpan').text('looks fine now').removeClass('errorSpan');
        }
    })


    $('#price').on('input', function(){
        let val=$(this).val();

        if(isNaN(val) || val.length ==''){
            $('#priceError').addClass('errorSpan').text('price must be a number').removeClass('validSpan');
        }
        else{
            $('#priceError').addClass('validSpan').text('looks fine now').removeClass('errorSpan');
        }
    })


    $('#stock').on('input', function(){
        let val=$(this).val();

        if(isNaN(val) || val.length ==''){
            $('#stockError').addClass('errorSpan').text('stock must be a number').removeClass('validSpan');
        }
        else{
            $('#stockError').addClass('validSpan').text('looks fine now').removeClass('errorSpan');
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
                    $('.validSpan').text('');

                },

                error: function(){
                    alert('Submit failed');
                }
            })
        })
    });
</script>


@endsection
