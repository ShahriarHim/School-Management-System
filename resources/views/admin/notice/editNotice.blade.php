@extends('layouts.admin')

@section('title', 'Edit Notice')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">

<div class="management-panel">
    <a href="{{ route('admin.noticeboard.index') }}" class="back-btn-container">
        <span class="fas fa-arrow-left small back-btn-icon"></span>
        <span class="back-btn-text">Noticeboard Management</span>
    </a>
    <h1 class="panel-header">Edit Notice</h1>

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
    <form id="editNoticeForm" method="POST" action="{{ route('admin.noticeboard.update', $notice->id) }}" enctype="multipart/form-data" class="notice-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Notice Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $notice->title) }}" required>
        </div>

        <div class="form-group">
            <label for="date">Notice Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $notice->date) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Notice Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($notice->image)
                <p>Current Image:</p>
                <img src="{{ asset($notice->image) }}" alt="Notice Image" class="notice-image-preview">
            @endif
        </div>

        <div class="form-group">
            <label for="description">Notice Description</label>
            <textarea name="description" id="description" rows="5" class="form-control" required>{{ old('description', $notice->description) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Notice</button>
            <a href="{{ route('admin.noticeboard.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#editNoticeForm').on('submit', function (e) {
            e.preventDefault();  

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.noticeboard.update', $notice->id) }}",  
                type: 'PUT',
                data: formData,
                processData: false,  //preventing jquery to process
                contentType: false,  //preventing jquery to set the formdata
                success: function(response) {
                    if (response.success) {
                        alert('Notice updated successfully!');
                    } else {
                        alert('Failed to update notice. Please try again.');
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
