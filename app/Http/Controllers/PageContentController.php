<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageContentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
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

/* 
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
  */       


/* 
        $pageContent= DB::select('select * from page_contents where slug = ?',[$request->input('slug')]);

        if(!$pageContent){

            DB::insert('INSERT INTO page_contents (slug, title, button, title2, image, content) 
            values(?,?,?,?,?,?)',
            [
                 $request->input('slug'),
                 $request->input('title'),
                 $request->input('button'),
                 $request->input('title2'),
                 $fileName,
                 $request->input('content'),
             ]);
             
        }

        else{
            DB::update('update page_contents set title=? , button=? , title2=?, image=?, content=? where slug=?',[
                $request->input('title'),
                $request->input('button'),
                $request->input('title2'),
                $fileName,
                $request->input('content'),
                $request->input('slug')
            ]);
    
        }

 */

 
        DB::table('page_contents')
        ->updateOrInsert(
            ['slug'=>$request->input('slug'),
            'status'=>$request->input('status')
            ],
            
            ['title'=>$request->input('title'),
            'button'=>$request->input('button'),
            'title2'=>$request->input('title2'),
            'image'=>$fileName,
            'content'=>$request->input('content')
            ]
        );

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
