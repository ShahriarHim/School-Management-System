<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB for query builder and raw SQL
use App\Models\NoticeBoard;
use App\Models\PageContent;

class NoticeBoardController extends Controller
{
    // Method to display all notices
    public function index()
    {

        /* SECTION 1: Eloquent ORM */

        // $notices = NoticeBoard::all(); 
        // $pageContents = PageContent::where('slug', 'notice')->first(); 

        /* SECTION 2: Query Builder */

        // $notices = DB::table('notice_boards')->get(); 
        // $pageContents = DB::table('page_contents')->where('slug', 'notice')->first(); 

        /* SECTION 3: Raw SQL */

        $notices = DB::select("SELECT * FROM notice_boards"); 
        $pageContents = DB::select("SELECT * FROM page_contents WHERE slug = ?", ['notice']);
        $pageContents = $pageContents ? collect($pageContents)->first() : null; 

        // Pass the notices and pageContents to the view
        return view('pages.noticeboard', compact('notices', 'pageContents'));
    }

    // Method to display a single notice
    public function show($id)
    {

        /* SECTION 1: Eloquent ORM */

        // $notice = NoticeBoard::findOrFail($id); 
        // $pageContents = PageContent::where('slug', 'notice')->first(); 

        /* SECTION 2: Query Builder */

        // $notice = DB::table('notice_boards')->where('id', $id)->first(); 
        // if (!$notice) abort(404); 
        // $pageContents = DB::table('page_contents')->where('slug', 'notice')->first(); 

        /* SECTION 3: Raw SQL */

        $notice = DB::select("SELECT * FROM notice_boards WHERE id = ?", [$id]); 
        if (empty($notice)) abort(404); 
        $notice = collect($notice)->first(); 
        $pageContents = DB::select("SELECT * FROM page_contents WHERE slug = ?", ['notice']);
        $pageContents = $pageContents ? collect($pageContents)->first() : null; 

        // Pass the notice and pageContents to the view
        return view('pages.noticeboardDetails', compact('notice', 'pageContents'));
    }
}
