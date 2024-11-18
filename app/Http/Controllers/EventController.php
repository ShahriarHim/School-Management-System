<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PageContent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        $events = Event::all();
        return view('pages.events', compact('events'));
    }
}
