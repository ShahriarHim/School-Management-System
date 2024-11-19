<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeBoard;

class NoticeBoardController extends Controller
{
    // Method to display all notices
    public function index()
    {
        // Fetch all notices
        $notices = NoticeBoard::all();

        // Pass the notices to the view
        return view('pages.noticeboard', compact('notices'));
    }

    // Method to display a single notice
    public function show($id)
    {
        // Fetch the notice by ID
        $notice = NoticeBoard::findOrFail($id);
    
        // Pass the notice to the view
        return view('pages.noticeboardDetails', compact('notice'));
    }
    
}
