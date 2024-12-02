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
        <table class="table table-striped table-bordered" id="images-table">
            <thead>
                <tr>
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
        const table = $('#images-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.galleries.images.index', ['gallery_id' => $gallery->id]) }}",
            columns: [
                {
                    data: 'image',
                    name: 'image',
                    render: function(data) {
                        if (data) {
                            return `<img src="{{ asset('${data}') }}" width="50" alt="Gallery Image"/>`;
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
