<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\PageContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve multiple slugs
        $pageContents = PageContent::whereIn('slug', ['home', 'coaches', 'event'])->get();

        // Separate each page content by slug for easy access in the view
        $home = $pageContents->where('slug', 'home')->first();
        $coach = $pageContents->where('slug', 'coaches')->first();
        $event_head = $pageContents->where('slug', 'event')->first();

        $events = Event::all();
        $teachers = User::where('role', 3)->get();

        // Pass the data to the view
        return view('pages.home', compact('teachers', 'events', 'home', 'coach', 'event_head'));
    }
}
