@extends('layouts.admin')
@section('title', 'Event Management Panel')
@section('content')
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Event Management Panel</h1>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

    <a href="{{ route('admin.eventsmanagement.create') }}" class="btn btn-primary mb-3">Add New Event</a>

    <!-- Events Table -->
    <div class="events-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->author_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</td>
                        <td>{{ ucfirst($event->status) }}</td>
                        <td>
                            @if ($event->image)
                                <img src="{{ asset($event->image) }}" alt="Author Image" width="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $event->description }}</td>
                        <td>
                            <a href="{{ route('admin.eventsmanagement.edit', $event->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.eventsmanagement.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
