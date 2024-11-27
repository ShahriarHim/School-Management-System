<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    public function index(){

        /* $questions=ContactForm::all(); */

        /* $questions=DB::select('select * from contact_forms'); */

        $questions=DB::table('contact_forms')->paginate(2);
        
        return view('admin.questions',['questions'=>$questions]);
    }
}
