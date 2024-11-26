<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
     /*    $pageContent = PageContent::where('slug','about'); */
        return view('admin.pageContent');
    }


    public function store(Request $request)
    {
        $request->validate([
            'slug'=>'required',
            'title'=>'required',
            'button' =>'nullable',
            'title2' =>'nullable',
            'image' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'content' =>'nullable'
        ]);


        $fileName=null;

        if($request->file('image')){
            $file=$request->file('image');
            $fileDestination='images/admin';
            $fileName=time().'_'.$file->getClientOriginalName() ;
            $file->move(public_path($fileDestination),$fileName);
        }


        $pagecontent = PageContent::where('slug',$request->input('slug'))->first();

        if(!$pagecontent){
            $pagecontent= new PageContent();
            $pagecontent->slug=$request->input('slug');
        }

        $pagecontent->title=$request->input('title');
        $pagecontent->button=$request->input('button');
        $pagecontent->title2=$request->input('title2');
        $pagecontent->image=$fileName;
        $pagecontent->content=$request->input('content');
        $pagecontent->save();
        

        return redirect()->back()->with('status', 'Saved successfully');

    }


    public function show(PageContent $pageContent)
    {
        //
    }


    public function edit(PageContent $pageContent)
    {
        //
    }


    public function update(Request $request, PageContent $pageContent)
    {
        //
    }

    public function destroy(PageContent $pageContent)
    {
        //
    }
}
