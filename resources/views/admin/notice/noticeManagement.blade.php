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
    <!-- Button to Create a New Notice -->
    <div class="actions">
        <a href="{{ route('admin.noticeboard.create') }}" class="btn btn-primary">Create Notice</a>
    </div>

    <!-- Notices Table -->
    <div class="table-container">
        <table class="notices-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notices as $notice)
                    <tr>
                        <td>{{ $notice->id }}</td>
                        <td>{{ $notice->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($notice->date)->format('d M, Y') }}</td>
                        <td>{{ Str::limit($notice->description, 50, '...') }}</td>
                        <td>
                            @if ($notice->image)
                                <img src="{{ asset($notice->image) }}" alt="{{ $notice->title }}" class="notice-image">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="actions-container">
                            <a href="{{ route('admin.noticeboard.edit', $notice->id) }}"
                                class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.noticeboard.destroy', $notice->id) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection