<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 3)->get();
        return view('pages.teachers', compact('teachers'));
    }
}
