@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Create New Event</h1>

    <!-- Display Error Messages -->
    <div id="errorMessages" class="alert alert-danger" style="display: none;">
        <ul id="errorList"></ul>
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

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#eventForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.eventsmanagement.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url; // Redirect to the index page
                        $('#response').text(response.message).css('color', 'green');
                    } else {
                        // Display success message in green
                        $('#eventForm')[0].reset(); // Clear form fields
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    $.each(errors, function(key, value) {
                        errorMessages += '<li>' + value[0] + '</li>';
                    });
                    $('#errorMessages').show(); // Show the error message div
                    $('#errorList').html(errorMessages); // Populate the error list
                }
            });
        });
    });
</script>
