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
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Notice Board Management
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>




<!-- DataTables JS -->

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
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
                {data:'id', name: 'id'},
                {data:'title', name: 'title'},
                {data:'description', name: 'description'},
                {data:'image', name: 'image'},
                {data:'date', name: 'date'},
            ]

        });
    });
</script>
@endpush