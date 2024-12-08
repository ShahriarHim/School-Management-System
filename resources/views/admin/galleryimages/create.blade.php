@extends('layouts.admin')

@section('title', 'Add Gallery Image')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeCopy.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Add New Image for {{ $gallery->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galleries.images.store', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Image</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
    </form>
</div>
@endsection
