<?php

namespace App\Http\Controllers;

use App\Models\SchoolDetail;
use Illuminate\Http\Request;

class SchoolDetailController extends Controller
{

    public function index()
    {
        $school= SchoolDetail::first();

        return view('admin.schoolInfo',['school'=>$school]);
    }


    public function create()
    {
        $school=SchoolDetail::first();
        return view('admin.addUpdateSchool',['school'=>$school]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'fax' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'youtube' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
        ]);
    



        $school = SchoolDetail::first();

        if (!$school) {
            $school = new SchoolDetail();
        }
    
        $school->school_name = $request->input('school_name');
        $school->address = $request->input('address');
        $school->email = $request->input('email');
        $school->phone = $request->input('phone');
        $school->fax = $request->input('fax');
        $school->facebook = $request->input('facebook');
        $school->linkedin = $request->input('linkedin');
        $school->youtube = $request->input('youtube');
        $school->twitter = $request->input('twitter');
        $school->instagram = $request->input('instagram');
    
        $school->save();
    
        return redirect()->route('admin.school.index')->with('status', 'School info added successfully!');

    }
    


    public function show(SchoolDetail $schoolDetail)
    {
        //
    }


    public function edit($id)
    {
        $school=SchoolDetail::first();
        return view('admin.addUpdateSchool',['school'=>$school]);
    }

 
    public function update(Request $request, $id)
    {

        $request->validate([
            'school_name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'fax' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'youtube' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
        ]);

        $school= SchoolDetail::first();

        $school->school_name = $request->input('school_name');
        $school->address = $request->input('address');
        $school->email = $request->input('email');
        $school->phone = $request->input('phone');
        $school->fax = $request->input('fax');
        $school->facebook = $request->input('facebook');
        $school->linkedin = $request->input('linkedin');
        $school->youtube = $request->input('youtube');
        $school->twitter = $request->input('twitter');
        $school->instagram = $request->input('instagram');
    
        $school->save();

        return redirect()->route('admin.school.index')->with('status', 'School info updated successfully!');


    
    }


    public function destroy(SchoolDetail $schoolDetail)
    {
        //
    }
}
