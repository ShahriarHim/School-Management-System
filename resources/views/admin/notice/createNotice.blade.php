@extends('layouts.admin')

@section('title', 'Create Notice')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">

<div class="management-panel">
    <a href="{{ url('/admin/noticeboard') }}" class="back-btn-container">
        <span class="fas fa-arrow-left small back-btn-icon"></span>
        <span class="back-btn-text">Noticeboard Management</span>
    </a>
    <h1 class="panel-header">Create New Notice</h1>

    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Notice Form -->
    <form id="createNoticeForm" method="POST" action="{{ route('admin.noticeboard.store') }}"
        enctype="multipart/form-data" class="notice-form">
        @csrf
        <div class="form-group">
            <label for="title">Notice Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the notice title"
                required>
        </div>

        <div class="form-group">
            <label for="date">Notice Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Notice Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Notice Description</label>
            <textarea name="description" id="description" rows="5" class="form-control"
                placeholder="Enter the notice description"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Notice</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
    </form>
</div>


@endsection
@push ('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#createNoticeForm').validate({

                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 255,
                        pattern: /^[a-zA-Z\s]*$/ 
                    },
                    date: {
                        required: true,
                        date: true
                    },
                    image: {
                        required: true,
                        extension: "jpeg|jpg|png|gif" 
                    },
                    description: {
                        required: true,
                        minlength: 10,
                        maxlength:100
                    }
                },


                messages: {
                    title: {
                        required: "Please enter the notice title.",
                        minlength: "Title must be at least 3 characters long.",
                        maxlength: "Title cannot be longer than 255 characters.",
                        pattern: "Title should not contain numbers."
                    },
                    date: {
                        required: "Please enter the notice date.",
                        date: "Please enter a valid date."
                    },
                    image: {
                        required: "Please upload an image.",
                        extension: "Only image files are allowed (jpg, jpeg, png, gif)."
                    },
                    description: {
                        required: "Please enter a description.",
                        minlength: "Description must be at least 10 characters."
                    }
                },

                
                highlight: function (element) {
                    $(element).addClass("invalid").removeClass("valid");
                },

                
                unhighlight: function (element) {
                    $(element).removeClass("invalid").addClass("valid");
                },

                
                submitHandler: function (form) {
                    var formData = new FormData(form);

                    $.ajax({
                        url: "{{ route('admin.noticeboard.store') }}",
                        type: 'POST',
                        data: formData,
                        processData: false,  // Prevent jQuery from processing the data
                        contentType: false,  // Prevent jQuery from setting the content type
                        success: function (response) {
                            if (response.success) {
                                alert('Notice created successfully!');
                            } else {
                                alert('Failed to create notice. Please try again.');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Error occurred! Please try again.');
                        }
                    });
                }
            });
        });

    </script>
@endpush