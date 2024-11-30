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
                        <th> First Name  </th>
                        <th> Last Name  </th>
                        <th> Email  </th>
                        <th> Phone  </th>
                        <th> Location  </th>
                        <th> Question  </th>
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
<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.questions') }}",
        columns: [
            {data: 'fname', name: 'fname'},
            {data: 'lname', name: 'lname'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'location', name: 'location'},
            {data: 'question', name: 'question'},
        ]
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

@endpush
