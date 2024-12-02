@extends('layouts.admin')

@section('content')

    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

    <div class="school-margin">

        <div class="questions-header">
            <h1>Questions list</h1>
        </div>

        <div class="questions-list-table" style="overflow-x:auto;">
            <table class="quesitons-table" >

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
                </tbody>




            </table>
        </div>

        <div class="pagination-links">{{$questions->onEachSide(2)->links()}}</div>
    
    </div>

@endsection