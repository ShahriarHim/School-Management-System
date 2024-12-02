<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Event;
use App\Models\PageContent;

class HomeController extends Controller
{
    public function index()
    {
        /* SECTION 1: Eloquent ORM */

        // Using Eloquent to retrieve data
        // $pageContents = PageContent::whereIn('slug', ['home', 'coaches', 'event'])->get();
        // $home = $pageContents->where('slug', 'home')->first();
        // $coach = $pageContents->where('slug', 'coaches')->first();
        // $event_head = $pageContents->where('slug', 'event')->first();

        // $events = Event::all();
        // $teachers = User::where('role', 3)->get();

        /* SECTION 2: Query Builder */

        // Using Laravel Query Builder to retrieve data
        // $pageContents = DB::table('page_contents')->whereIn('slug', ['home', 'coaches', 'event'])->get();
        // $home = $pageContents->firstWhere('slug', 'home');
        // $coach = $pageContents->firstWhere('slug', 'coaches');
        // $event_head = $pageContents->firstWhere('slug', 'event');

        // $events = DB::table('events')->get();
        // $teachers = DB::table('users')->where('role', 3)->get();

        /* SECTION 3: Raw SQL */
        
        // Using raw SQL to retrieve data
        $pageContents = DB::select("
            SELECT * FROM page_contents WHERE slug IN ('home', 'coaches', 'event')
        ");
        // $home = collect($pageContents)->firstWhere('slug', 'home');
        $home = DB::table("page_contents")
        ->whereIn('slug', ['home']) 
        ->orderBy('status', 'desc')        
        ->first() ;
        // dd($home) ;               
                     


        $coach = collect($pageContents)->firstWhere('slug', 'coaches');
        $event_head = collect($pageContents)->firstWhere('slug', 'event');

        $events = DB::select("SELECT * FROM events");
        $teachers = DB::select("SELECT * FROM users WHERE role = ?", [3]);

        // Pass the data to the view
        return view('pages.home', compact('teachers', 'events', 'home', 'coach', 'event_head'));
    }
}
