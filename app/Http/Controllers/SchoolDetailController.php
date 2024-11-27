<?php

namespace App\Http\Controllers;

use App\Models\SchoolDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolDetailController extends Controller
{

    public function index()
    {
        /* $school=SchoolDetail::first(); */

        /* $school=DB::select('select * from school_details limit 1'); */

        $school=DB::table('school_details') ->first();

        return view('admin.schoolInfo',['school'=>$school]);
    }


    public function create()
    {
        /* $school=SchoolDetail::first(); */

        /* $school=DB::select('select * from school_details limit 1'); */

        $school=DB::table('school_details') ->first();

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
    


/* 
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

 */


/* 
        $school=DB::select('select * from school_details');

        if(!$school){

            DB::insert('INSERT INTO school_details (school_name, address, email, phone, fax, facebook, linkedin=? , youtube=?, twitter=?, instagram=?) 
            values(?,?,?,?,?,?,?,?,?,?)',
            [
                 $request->input('school_name'),
                 $request->input('address'),
                 $request->input('email'),
                 $request->input('phone'),
                 $request->input('fax'),
                 $request->input('facebook'),
                 $request->input('linkedin'),
                 $request->input('youtube'),
                 $request->input('twitter'),
                 $request->input('instagram'),
             ]);
             
        }

        else{
            DB::update('update school_details set school_name=?, address=? , email=? , phone=?, fax=?, facebook=?, linkedin=? , youtube=?, twitter=?, instagram=?',[
                $request->input('school_name'),
                $request->input('address'),
                $request->input('email'),
                $request->input('phone'),
                $request->input('fax'),
                $request->input('facebook'),
                $request->input('linkedin'),
                $request->input('youtube'),
                $request->input('twitter'),
                $request->input('instagram'),
            ]);
    
        }
    
 */


        DB::table('school_details')
            ->updateOrInsert(
                ['id'=>1],
                [
                    $request->input('school_name'),
                    $request->input('address'),
                    $request->input('email'),
                    $request->input('phone'),
                    $request->input('fax'),
                    $request->input('facebook'),
                    $request->input('linkedin'),
                    $request->input('youtube'),
                    $request->input('twitter'),
                    $request->input('instagram'),
                ]
            );



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


/*         
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

 */


/* 
        DB::update('update school_details set school_name=?, address=? , email=? , phone=?, fax=?, facebook=?, linkedin=? , youtube=?, twitter=?, instagram=?',[
            $request->input('school_name'),
            $request->input('address'),
            $request->input('email'),
            $request->input('phone'),
            $request->input('fax'),
            $request->input('facebook'),
            $request->input('linkedin'),
            $request->input('youtube'),
            $request->input('twitter'),
            $request->input('instagram'),
        ]);

 */        



        DB::table('school_details')
            ->where('id',1)
            ->update([
                  'school_name' =>  $request->input('school_name'),
                  'address'=>  $request->input('address'),
                  'email'=>  $request->input('email'),
                  'phone'=>  $request->input('phone'),
                  'fax'=>  $request->input('fax'),
                  'facebook'=>  $request->input('facebook'),
                  'linkedin'=>  $request->input('linkedin'),
                  'youtube' => $request->input('youtube'),
                  'twitter' =>  $request->input('twitter'),
                  'instagram' =>   $request->input('instagram'),
                ]
        );



        return redirect()->route('admin.school.index')->with('status', 'School info updated successfully!');


    
    }


    public function destroy(SchoolDetail $schoolDetail)
    {
        //
    }
}
