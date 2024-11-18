<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display a listing of events
    public function index()
    {
        $events = Event::all();
        return view('pages.events', compact('events'));
    }
}
