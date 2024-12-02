<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class QuestionsController extends Controller
{
    public function index(Request $request){

        /* $questions=ContactForm::all(); */

        /* $questions=DB::select('select * from contact_forms'); */
/* 
        $questions=DB::table('contact_forms')->paginate(4);
        
        return view('admin.questions1',['questions'=>$questions]); */

        if($request->ajax()){

            $questions = ContactForm::all();
            return DataTables::of($questions)->make(true);
        }

        return view('admin.questions');
    }
}
