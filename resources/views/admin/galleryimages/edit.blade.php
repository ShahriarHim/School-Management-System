@extends('layouts.admin')

@section('title', 'Edit Gallery Image')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Edit Image for {{ $gallery->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.images.update', [$gallery->id, $image->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($image->image)
                <img src="{{ asset($image->image) }}" alt="Gallery Image" width="100">
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Image</button>
        </div>
    </form>
</div>
@endsection
