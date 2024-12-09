@extends('layouts.admin')

@section('content')

    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

    <div class="school-margin">

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2>{{ $pageContent->title }} Page Content</h2>
                

            </div>
            <div class="card-body">
                <div class="page-content-manager"><p>Managed By: {{ $pageContent->user->name }}</p></div>

                @if($pageContent->image)
                    <div>
                        <strong>Image:</strong><br>
                        <img src="{{ asset('images/admin/' . $pageContent->image) }}" alt="Image" style="max-width: 100%;">
                    </div>
                @else
                    <p><strong>Image:</strong> No image available.</p>
                @endif
                <p><strong>Slug:</strong> {{ $pageContent->slug }}</p>
                <p><strong>Status:</strong> {{ $pageContent->status }}</p>
                <p><strong>Content:</strong>
                @if($pageContent->pageContentDetail->content)
                 {!! $pageContent->pageContentDetail->content !!}</p>
                @else
                    No Content available
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.page-content.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
