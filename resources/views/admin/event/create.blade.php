@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
<div class="management-panel">
    <h1 class="panel-header">Create New Event</h1>
    <div id="successMessage" class="alert alert-success" style="display: none;">
        Event created successfully!
    </div>
    <form id="eventForm" enctype="multipart/form-data" class="notice-form">
        @csrf
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the event title" required>
        </div>
        <div class="form-group">
            <label for="author_name">Event Author Name</label>
            <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Enter the author name" required>
        </div>
        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="upcoming">Upcoming</option>
                <option value="past">Past</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Event Author Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Event Description</label>
            <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter the event description"></textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Event</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
    </form>
    <p id="response"></p>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/noticeCopy.css') }}">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize form validation
            $('#eventForm').validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3
                    },
                    author_name: {
                        required: true,
                        minlength: 3
                    },
                    date: {
                        required: true,
                        date: true
                    },
                    status: {
                        required: true
                    },
                    image: {
                        extension: "jpg|jpeg|png|gif"
                    },
                    description: {
                        maxlength: 500
                    }
                },
                messages: {
                    title: {
                        required: "Please enter the event title.",
                        minlength: "Title must be at least 3 characters long."
                    },
                    author_name: {
                        required: "Please enter the author name.",
                        minlength: "Author name must be at least 3 characters long."
                    },
                    date: {
                        required: "Please select an event date.",
                        date: "Please enter a valid date."
                    },
                    status: {
                        required: "Please select the event status."
                    },
                    image: {
                        extension: "Only image files (jpg, jpeg, png, gif) are allowed."
                    },
                    description: {
                        maxlength: "Description cannot exceed 500 characters."
                    }
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    let formData = new FormData(form);

                    $.ajax({
                        url: "{{ route('admin.eventsmanagement.store') }}",
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // Show success message
                            $('#successMessage').css('display', 'block');

                            // Optionally, clear the form fields
                            $('#eventForm')[0].reset();

                            // Optionally, hide the success message after a short delay
                            setTimeout(function() {
                                $('#successMessage').css('display', 'none');
                            }, 3000);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error response:', error);
                            alert('There was an error with the submission.');
                        }
                    });
                }
            });
        });
    </script>
@endpush
