@extends('layouts.admin')

@section('title', 'Delete Event')

@section('content')
<div class="management-panel">
    <h1 class="panel-header">Delete Event</h1>

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

    <div class="alert alert-warning">
        Are you sure you want to delete the event titled "{{ $event->title }}"? This action cannot be undone.
    </div>

    <form action="{{ route('admin.eventsmanagement.destroy', $event->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Event</button>
        <a href="{{ route('admin.eventsmanagement.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
