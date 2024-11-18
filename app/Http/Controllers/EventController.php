<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PageContent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        $pc = PageContent::where('slug', 'event')->first();
        $events = Event::all();
        return view('pages.events', compact('events', 'pc'));
    }
}
