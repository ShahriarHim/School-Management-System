<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\PageContent;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactPageContent=PageContent::where('slug','contact')->first();
        
        return view('pages.contact',['contactPageContent'=>$contactPageContent]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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


        $question=new ContactForm();

        $question->fname=$request->input('fname');
        $question->lname=$request->input('lname');
        $question->email=$request->input('email');
        $question->phone=$request->input('phone');
        $question->location=$request->input('location');
        $question->question=$request->input('question');

        $question->save();

        return redirect()->back()->with('status','question submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
