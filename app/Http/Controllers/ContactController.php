<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function index()
    {
        /* $contactPageContent=PageContent::where('slug','contact')->first(); */

        /* $contactPageContent=DB::select('select * from page_contents where slug = ?', ['contact']); */

        /* $slug='contact';
        $contactPageContent=DB::select('select * from page_contents where slug = '."'$slug'"); */

        $contactPageContent = DB::table('page_contents')->where('slug','contact')->first();
        
        return view('pages.contact',['contactPageContent'=>$contactPageContent]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'location'=>'required',
            'question'=>'required'

        ]);

/* 
        $question=new ContactForm();

        $question->fname=$request->input('fname');
        $question->lname=$request->input('lname');
        $question->email=$request->input('email');
        $question->phone=$request->input('phone');
        $question->location=$request->input('location');
        $question->question=$request->input('question');

        $question->save();

         */


/* 
         $question = DB::insert('insert into contact_forms ( fname, lname, email, phone, location, question) values(?,?,?,?,?,?)',
                            [$request->input('fname'),
                            $request->input('lname'),
                            $request->input('email'),
                            $request->input('phone'), 
                            $request->input('location'),
                            $request->input('question') ]);

 */


        $question = DB::table('contact_forms')
                    ->insert([
                        'fname' => $request->input('fname'),
                        'lname'=> $request->input('lname'),
                        'email' => $request->input('email'),
                        'phone' => $request->input('phone'), 
                        'location' => $request->input('location'),
                        'question' => $request->input('question')
                    ]);

        return redirect()->back()->with('status','question submitted');

    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
