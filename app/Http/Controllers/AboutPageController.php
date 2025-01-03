<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutPageController extends Controller
{
    public function index(){

        

        /* $about=DB::select('select * from page_contents where slug = ?', ['about']); */

        /* $slug='about';
        $about=DB::select('select * from page_contents where slug = '."'$slug'"); */

        
/*         
        $about= DB::table('page_contents')
        ->where('slug','about')
        ->orderBy('status', 'desc')
        ->first();  */

/* 
        $about= DB::table('page_contents')
        ->where('slug','about')
        ->where('status', 1)
        ->first(); 

*/      
        $about= PageContent::where('slug','about')->first(); //$about= PageContent::where('slug','about')->with('pageContentDetail')->first();

        return view('pages.about',['about'=>$about]);

    }

    public function apiIndex(){

        $about= DB::table('page_contents')
        ->where('slug','about')
        ->where('status', 1)
        ->first(); 
        
        return response()->json($about);
    }
}
