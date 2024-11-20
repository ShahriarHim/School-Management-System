@extends('layouts.admin')

@section('title', 'Noticeboard Management Panel')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Noticeboard Management Panel</h1>
    

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
    
    <form action="{{ route('admin.noticeboard.store') }}" method="POST" enctype="multipart/form-data" class="notice-form">
        @csrf
        <div class="form-group">
            <label for="title">Notice Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the notice title" required>
        </div>

        <div class="form-group">
            <label for="date">Notice Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Notice Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Notice Description</label>
            <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter the notice description"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Notice</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
    </form>
</div>
@endsection
