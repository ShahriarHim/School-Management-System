@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Edit Event</h1>

    <!-- Display Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.eventsmanagement.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="notice-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="author_name">Event Author Name</label>
            <input type="text" name="author_name" id="author_name" class="form-control" value="{{ $event->author_name }}" required>
        </div>
        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $event->date->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="past" {{ $event->status == 'past' ? 'selected' : '' }}>Past</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Event Author Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($event->image)
                <img src="{{ asset($event->image) }}" alt="Author Image" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="description">Event Description</label>
            <textarea name="description" id="description" rows="5" class="form-control">{{ $event->description }}</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Event</button>
        </div>
    </form>
</div>
@endsection
