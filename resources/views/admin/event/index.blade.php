@extends('layouts.admin')

@section('title', 'Event Management Panel')

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('css/noticeManagement.css') }}"> --}}

    <div class="management-panel">
        <h1 class="panel-header">Event Management Panel</h1>

        <!-- Display Success Message -->
        @if (session('success'))
            <div id="flash-message" class="alert alert-success">
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
            <a href="{{ route('admin.eventsmanagement.create') }}" class="btn btn-primary mb-3">Add New Event</a>
        </div>

        <!-- Events Table -->
        <div class="table-container">
            <table class="notices-table datatable" id="events-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Description</th>
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
                ajax: "{{ route('admin.eventsmanagement.index') }}",
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'author_name',
                        name: 'author_name'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data) {
                            if (data) {
                                return `<img src="{{ url('/') }}/${data}" width="50" alt="Event Image"/>`;
                            } else {
                                return 'N/A';
                            }
                        }
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            if ($('#flash-message').length) {
                $('#flash-message').show().delay(1000).fadeOut();
            }
        });
    </script>
@endpush
