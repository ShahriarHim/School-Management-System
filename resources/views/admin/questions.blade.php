@extends('layouts.admin')

@section('content')

    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJxv4n6+QvctFz4tQ+REJrfMhu5no8+Iuq8DdbBsdmWqzSYwoaF3bP5om+H5u" crossorigin="anonymous">
 -->
    <div class="school-margin">

        <div class="questions-header">
            <h1>Questions list</h1>
        </div>

        <div class="questions-list-table" style="overflow-x:auto;">
            <table class="quesitons-table" >

                <tr>
                    <th> First Name  </th>
                    <th> Last Name  </th>
                    <th> Email  </th>
                    <th> Phone  </th>
                    <th> Location  </th>
                    <th> Question  </th>
                </tr>

                @foreach($questions as $question)
                    <tr>
                        <td>{{$question->fname}}</td>
                        <td>{{$question->lname}}</td>
                        <td>{{$question->email}}</td>
                        <td>{{$question->phone}}</td>
                        <td>{{$question->location}}</td>
                        <td class="questions">{{$question->question}}</td>
                    </tr>
                @endforeach



            </table>
        </div>

        <div class="pagination-links">{{$questions->onEachSide(2)->links()}}</div>
    
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0Z5Gr9ZYpiGJN9IB5q8P9rMlhc9kVtGGXvNq6+hDqO75hxnp" crossorigin="anonymous"></script>
 -->
@endsection