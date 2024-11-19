<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index(){

        $contactPageContent=PageContent::where('slug','contact')->first();
        
        return view('pages.contact',['contactPageContent'=>$contactPageContent]);
    }
}
