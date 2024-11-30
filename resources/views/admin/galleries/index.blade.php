@extends('layouts.admin')

@section('title', 'Gallery Management Panel')

@section('content')
<link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">

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
        <table class="table table-striped table-bordered" id="events-table">
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
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
                            return `<img src="{{ asset('/${data}') }}" width="50" alt="Event Image"/>`;
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
    });
</script>
@endpush
