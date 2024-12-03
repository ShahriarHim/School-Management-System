@extends('layouts.admin')
@section('title', 'Create Gallery')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/noticeCopy.css') }}">
    <div class="management-panel">
        <h1 class="panel-header">Create New Gallery</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Gallery Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    placeholder="Enter the gallery title" required>
            </div>
            <div class="form-group">
                <label for="thumbnail">Gallery Image</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">Gallery Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save Gallery</button>
                <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
        </form>
    </div>
@endsection
