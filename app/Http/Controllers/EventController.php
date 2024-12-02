<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PageContent;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function show()
    {
        // Eloquent ORM Query
        // $pc = PageContent::where('slug', 'event')->first();

        // Query Builder Equivalent
        // $pc = DB::table('page_contents')->where('slug', 'event')->orderBy('status', 'desc')->get();

        // Raw SQL Equivalent without placeholders
        $pc = DB::select("SELECT * FROM page_contents WHERE slug = 'event' ORDER BY status DESC limit 1"); //Using Order By
        // Eloquent ORM Query
        // $events = Event::all();

        // Query Builder Equivalent
        // $events = DB::table('events')->get();

        // Raw SQL Equivalent without placeholders
        $events = DB::select("SELECT * FROM events");

        return view('pages.events', compact('events', 'pc'));
    }
}
