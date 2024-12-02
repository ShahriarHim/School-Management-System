@extends('layouts.admin')

@section('title', 'Create Notice')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">

<div class="management-panel">
    <a href="{{ url('/admin/noticeboard') }}" class="back-btn-container">
        <span class="fas fa-arrow-left small back-btn-icon"></span>
        <span class="back-btn-text">Noticeboard Management</span>
    </a>
    <h1 class="panel-header">Create New Notice</h1>

    <!-- Success and Error Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Notice Form -->
    <form id="createNoticeForm" method="POST" action="{{ route('admin.noticeboard.store') }}" enctype="multipart/form-data" class="notice-form">
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

<script>
    $(document).ready(function () {
        $('#createNoticeForm').on('submit', function (e) {
            e.preventDefault();  

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.noticeboard.store') }}",  
                type: 'POST',
                data: formData,
                processData: false,  
                contentType: false,  
                success: function(response) {
                    if (response.success) {
                        alert('Notice created successfully!');
                    } else {
                        alert('Failed to create notice. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error occurred! Please try again.');
                }
            });
        });
    });
</script>

@endsection
