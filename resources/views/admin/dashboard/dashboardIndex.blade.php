@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{asset('css/salauddin.css')}}">

<div class="school-margin">

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>User Dashboard</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{asset('images/admin/' . $user->image) }}" 
                             alt="User Image" 
                             class="img-fluid rounded-circle" 
                             style="width: 150px; height: 150px;">
                    </div>
                    <div class="col-md-8">
                        <h4>{{ $user->name }}</h4>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong> 
                            @if($user->role == 1)
                                Student
                            @elseif($user->role == 2)
                                Admin
                            @elseif($user->role == 3)
                                Teacher
                            @else
                                Unknown
                            @endif
                        </p>
                        @if($user->designation)
                            <p><strong>Designation:</strong> {{ $user->designation }}</p>
                        @endif
                        @if($user->description)
                            <p><strong>Description:</strong> {{ $user->description }}</p>
                        @endif
                        <div class="social-links mt-3">
                            @if($user->fb)
                                <a href="{{ $user->fb }}" target="_blank" class="btn btn-primary btn-sm">
                                    Facebook
                                </a>
                            @endif
                            @if($user->twitter)
                                <a href="{{ $user->twitter }}" target="_blank" class="btn btn-info btn-sm">
                                    Twitter
                                </a>
                            @endif
                            @if($user->linkedin)
                                <a href="{{ $user->linkedin }}" target="_blank" class="btn btn-primary btn-sm">
                                    LinkedIn
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
