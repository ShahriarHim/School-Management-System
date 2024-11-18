<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){

        $about= PageContent::where('slug','about')->first();

        return view('pages.about',['about'=>$about]);
    }
}
