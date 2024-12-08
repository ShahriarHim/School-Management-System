@extends('layouts.admin')

@section('content')

    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

    <div class="school-margin">

        <div class="questions-header">
            <h1>Questions list</h1>
        </div>

        <div class="questions-list-table" >
            <table class="table table-bordered data-table " >

                <thead>
                    <tr>
                        <th> Slug </th>
                        <th> Status </th>
                        <th> Title </th>
                        <th> Button </th>
                        <th> Title2 </th>
                        <th> Action </th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>

    </div>

@endsection


@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('scripts')

<script>
    $(function(){
        var table= $('.data-table').DataTable({
            processing:true,
            serverSide:true,
            ajax: "{{route('admin.page-content.index')}}",
            columns: [
                {data: 'slug', name: 'slug'},
                {data: 'status', name: 'status'},
                {data: 'title', name: 'title'},
                {data: 'button', name: 'button'},
                {data: 'title2', name: 'title2'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                
            ]
        })
    })
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

@endpush
