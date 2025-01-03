@extends('layouts.admin')

@section('title', 'Gallery Management Panel')

@section('content')


<div class="management-panel">
    <h1 class="panel-header">Gallery Management Panel</h1>

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

    <div class="actions">
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Add New Gallery</a>
    </div>

    <!-- Gallery Table -->
    <div class="table-container">
        <table class="notices-table datatable" id="events-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables will populate the rows dynamically -->
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/noticeCopy.css') }}">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#events-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.galleries.index') }}",
            columns: [
                {data: 'title', name: 'title'},
                {
                    data: 'thumbnail',
                    name: 'thumbnail',
                    render: function(data) {
                        if (data) {
                            return `<img src="{{ asset('/${data}') }}" width="50" alt="Gallery Image"/>`;
                        } else {
                            return 'N/A';
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // Optional: Handle the view images button click event if you need any additional functionality
        $('#events-table').on('click', '.view-images', function() {
            const viewImagesUrl = $(this).attr('href');
            window.location.href = viewImagesUrl;
        });
    });
</script>
@endpush
