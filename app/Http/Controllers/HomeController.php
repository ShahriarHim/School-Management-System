<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $teachers = User::where('role', 3)->get();
        return view('pages.home', compact('teachers', 'events'));
    }
}

