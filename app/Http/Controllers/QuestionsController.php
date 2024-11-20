<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(){

        $questions=ContactForm::all();
        
        return view('admin.questions',['questions'=>$questions]);
    }
}
