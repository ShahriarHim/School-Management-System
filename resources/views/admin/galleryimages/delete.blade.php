@extends('layouts.admin')

@section('title', 'Delete Gallery Image')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Delete Gallery Image</h1>

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
        Are you sure you want to delete this image? This action cannot be undone.
    </div>

    <form action="{{ route('admin.galleries.images.destroy', [$gallery->id, $image->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Image</button>
        <a href="{{ route('admin.galleries.images.index', $gallery->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
