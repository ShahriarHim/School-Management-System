@extends('layouts.admin')

@section('title', 'Gallery Images')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
<div class="management-panel">
    <h1 class="panel-header">Gallery Images for {{ $gallery->title }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="actions">
        <a href="{{ route('admin.galleries.images.create', $gallery->id) }}" class="btn btn-primary">Add New Image</a>
    </div>

    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                    <tr>
                        <td>
                            @if ($image->image)
                                <img src="{{ asset($image->image) }}" alt="Gallery Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.galleries.images.edit', [$gallery->id, $image->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.galleries.images.destroy', [$gallery->id, $image->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $images->links() }}</div>
    </div>
</div>
@endsection
