@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeCopy.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Edit Event</h1>

    <div id="successMessage" class="alert alert-success" style="display: none;">
        Event updated successfully!
    </div>

    <div id="errorMessages" class="alert alert-danger" style="display: none;">
        <ul id="errorList"></ul>
    </div>

    @foreach ($event as $e)
    <form id="editEventForm" enctype="multipart/form-data" class="notice-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $e->title }}" required>
        </div>
        <div class="form-group">
            <label for="author_name">Event Author Name</label>
            <input type="text" name="author_name" id="author_name" class="form-control" value="{{ $e->author_name }}" required>
        </div>
        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ \Carbon\Carbon::parse($e->date)->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="upcoming" {{ $e->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="past" {{ $e->status == 'past' ? 'selected' : '' }}>Past</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Event Author Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($e->image)
                <img src="{{ asset($e->image) }}" alt="Author Image" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="description">Event Description</label>
            <textarea name="description" id="description" rows="5" class="form-control">{{ $e->description }}</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Event</button>
        </div>
    </form>
    @endforeach
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/noticeCopy.css') }}">
@endpush
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#editEventForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.eventsmanagement.update', $e->id) }}",
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
@endpush
