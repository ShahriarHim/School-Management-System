<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PageContent;
class TeacherController extends Controller
{
    public function index()
    {
        $pc = PageContent::where('slug', 'coaches')->first();
        $teachers = User::where('role', 3)->get();
        return view('pages.teachers', compact('teachers', 'pc'));
    }
}
