@extends('layouts.admin')
@section('title', 'Gallery Management Panel')
@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Gallery Management Panel</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
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

    <div class="actions">
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Add New Gallery</a>
    </div>

    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleries as $gallery)
                    <tr>
                        <td>{{ $gallery->title }}</td>
                        <td>
                            @if ($gallery->thumbnail)
                                <img src="{{ asset($gallery->thumbnail) }}" alt="{{ $gallery->title }}" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('admin.galleries.images.index', ['gallery_id' => $gallery->id]) }}" class="btn btn-sm btn-info">View Images</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
