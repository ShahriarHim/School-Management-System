@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

    <div class="school-margin">
        <div class="school-header">
            <h1>School Info</h1>
        </div>

        @if(isset($school))

        <div class="school-info">
            <div>
                <p> <strong>School Name :</strong>  {{$school->school_name }}</p>   <br>
                <p> <strong>Address :</strong> {{$school->address }}</p>   <br>
                <p> <strong>Email : </strong>{{$school->email }}</p>   <br>
                <p> <strong>Phone :</strong>  {{$school->phone }}</p>   <br>
                <p> <strong>Fax :</strong> {{$school->fax }}</p>   <br>
            </div>

            <div>
                <p> <strong>Facebook :</strong> {{$school->facebook }}</p>   <br>
                <p> <strong>Linkedin : </strong> {{$school->linkedin }}</p>   <br>
                <p> <strong>Youtube :</strong> {{$school->youtube}}</p>   <br>
                <p> <strong>Twitter :</strong> {{$school->twitter }}</p>   <br>
                <p> <strong>Instagram : </strong>{{$school->instagram }}</p>   
            </div>

            
        </div>


        @else
        <div class="school-info-not-found">
            <h1>Not found</h1>
        </div>

        @endif

    </div>


@endsection



   