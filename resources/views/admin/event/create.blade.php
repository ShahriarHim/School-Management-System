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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('css/noticeCopy.css') }}">
@endpush
@push ('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
                    console.log('Success response:', response);
                    $('#successMessage').css({ 'display': 'block'});
                    setTimeout(function() {
                        window.location.href = "{{ route('admin.eventsmanagement.index') }}";
                    }, 1000);
                },
            });
        });
    });
</script>
