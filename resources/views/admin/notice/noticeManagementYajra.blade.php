@extends('layouts.admin')

@section('title', 'Noticeboard Management Panel')

@section('head')
<!-- DataTables CSS -->




@section('content')


<!-- Display Success/Failure Message -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- DataTable -->
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
        <form action="{{ route('admin.noticeboard.deleteData') }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete All Data</button>
        </form>

    </div>

    <div class="table-container">
        <table class="notices-table datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>

        </table>
    </div>
</div>
<!-- </div> -->






<!-- DataTables JS -->

@endsection

@push('styles')
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}">
@endpush
@push ('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            // Initialize DataTables with additional settings if needed
            $('.datatable').DataTable({
                serverside: true,
                processing: true,
                ajax: {
                    url: '{{route("admin.noticeboard.index")}}'
                },

                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description' },
                    {
                        data: 'image', name: 'image', render: function (data, type, row) {
                            return '<img src="/' + data + '" width="80" height="60">';
                        }
                    },
                    { data: 'date', name: 'date' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                    { data: 'created_by', name: 'created_by' },
                ]

            });
        });
    </script>
@endpush