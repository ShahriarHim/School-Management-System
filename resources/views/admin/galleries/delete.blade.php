@extends('layouts.admin')

@section('title', 'Delete Gallery')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Delete Gallery</h1>

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
        Are you sure you want to delete the gallery titled "{{ $gallery->title }}"? This action cannot be undone.
    </div>

    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Gallery</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
