<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PageContent;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        // Eloquent ORM Query
        // $pc = PageContent::where('slug', 'coaches')->first();

        // Query Builder Equivalent
        // $pc = DB::table('page_contents')->where('slug', 'coaches')->first();

        // Raw SQL Equivalent without placeholders
        $pc = DB::select("SELECT * FROM page_contents WHERE slug = 'coaches' LIMIT 1");

        // Eloquent ORM Query
        // $teachers = User::where('role', 3)->get();

        // Query Builder Equivalent
        // $teachers = DB::table('users')->where('role', 3)->get();

        // Raw SQL Equivalent without placeholders
        $teachers = DB::select("SELECT * FROM users WHERE role = 3");

        return view('pages.teachers', compact('teachers', 'pc'));
    }
}
