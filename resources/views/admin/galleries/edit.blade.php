@extends('layouts.admin')
@section('title', 'Edit Gallery')
@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Edit Gallery</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Gallery Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $gallery->title }}" required>
        </div>
        <div class="form-group">
            <label for="thumbnail">Gallery Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            @if ($gallery->thumbnail)
                <img src="{{ asset($gallery->thumbnail) }}" alt="{{ $gallery->title }}" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="date">Gallery Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $gallery->dates->first()->date }}" required>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Gallery</button>
        </div>
    </form>
</div>
@endsection
