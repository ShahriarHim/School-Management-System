<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeBoard;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use yajra\DataTables\Datatables;

class AdminNoticeBoardController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $notices = NoticeBoard::select('id', 'title', 'date', 'image', 'description');
    
            return DataTables::of($notices)
                ->addColumn('action', function($notice) {
                    return '<a href="'.route('admin.noticeboard.edit', $notice->id).'" class="btn btn-sm btn-primary">Edit</a>
                            <a href="'.route('admin.noticeboard.destroy', $notice->id).'" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</a>';
                })
                ->rawColumns(['action'])  // Make action column HTML-safe
                ->make(true);
        }
    
        return view('admin.notice.noticeManagementYajra');
    }
    


    // public function index()
    // {

    //     /* SECTION 1: Eloquent ORM */
    //     $notices = NoticeBoard::paginate(2);

    //     //* Using Chunks
    //     // $notices = collect(); // Initialize an empty collection

    //     // NoticeBoard::chunk(2, function ($chunk) use ($notices) {
    //     //     $notices->push(...$chunk); 
    //     // });

    //     /* SECTION 2: Query Builder */
    //     // $notices = DB::table("notice_boards")->get();

    //     /* SECTION 3: Raw SQL */
    //     // $notices = DB::select("SELECT * FROM notice_boards");



    //     return view('admin.notice.noticeManagement', compact('notices'));
    // }
    //! for showing the visualization of chunks
    // public function index()
    // {

    //     NoticeBoard::chunk(2, function ($chunk) {
    //         dump('Processing a chunk of size: ' . $chunk->count());

    //         foreach ($chunk as $notice) {
    //             dump('Notice ID: ' . $notice->id);
    //         }
    //     });

    //     dd('Chunk processing complete.');
    // }



    public function create()
    {
        return view('admin.notice.createNotice');
    }


    /* Store a newly created notice in storage */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        try {
            // Handle file upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'images/' . $imageName;
                $image->move(public_path('images'), $imageName);
            }

            // Create new notice
            /* SECTION 1: Eloquent ORM */
            // NoticeBoard::create([
            //     'title' => $request->title,
            //     'date' => $request->date,
            //     'image' => $imagePath,
            //     'description' => $request->description,
            // ]);

            /* SECTION 2: Query Builder */
            // DB::table('notice_boards')->insert([
            //     'title' => $request->title,
            //     'date' => $request->date,
            //     'image' => $imagePath,
            //     'description' => $request->description,
            // ]);

            /* SECTION 3: Raw SQL */
            DB::insert(
                "INSERT INTO notice_boards (title, date, image, description) VALUES ('{$request->title}', '{$request->date}',
            '{$imagePath}','{$request->description}')"
            );


            return redirect()->route('admin.noticeboard.index')->with('success', 'Notice created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.noticeboard.index')->with('error', 'Failed to create notice. Please try again.');
        }
    }




    /* Show the form for editing the specified notice */
    public function edit($id)
    {
        /* SECTION 1: Eloquent ORM */
        // $notice = NoticeBoard::findOrFail($id);

        /* SECTION 2: Query Builder */
        // $notice = DB::table('notice_boards')->where('id', $id)->first();

        /* SECTION 3: Raw SQL */
        $notice = DB::select('SELECT * FROM notice_boards WHERE id = ? ', [$id]);
        $notice = $notice[0];
        // dd($notice);
        return view('admin.notice.editNotice', compact('notice'));
    }

    /* Update the specified notice in storage */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        /* SECTION 1: Eloquent ORM */
        // $notice = NoticeBoard::findOrFail($id);

        /* SECTION 2: Query Builder */
        // $notice = DB::table('notice_boards')->where('id', $id)->first();

        /* SECTION 3: Raw SQL */
        // $temp = (int) $id;
        // $query = 'SELECT * FROM notice_boards WHERE id = $temp';
        // $res = DB::raw($query);

        $notice = DB::select("SELECT * FROM notice_boards WHERE id = $id");
        // dd($notice);

        if (!$notice) {
            return redirect()->route('admin.noticeboard.index')->with('error', 'Notice not found.');
        }
        $notice = $notice[0]; // Converting the result to an object

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($notice->image && file_exists(public_path($notice->image))) {
                unlink(public_path($notice->image)); // Delete old image from the server
            }

            // Process new image upload
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension(); // Generate a unique file name
            $imagePath = 'images/' . $imageName; // Set the custom path
            $image->move(public_path('images'), $imageName); // Move the file to the `public/images` directory

            $notice->image = $imagePath; // Update the image path
        }

        // Update notice details

        /* SECTION 1: Eloquent ORM */
        // $notice->update([
        //     'title' => $request->title,
        //     'date' => $request->date,
        //     'image' => $notice->image,
        //     'description' => $request->description,
        // ]);

        /* SECTION 2: Query Builder */
        // DB::table('notice_boards')
        //     ->where('id', $id)
        //     ->update([
        //         'title' => $request->title,
        //         'date' => $request->date,
        //         'image' => $notice->image,
        //         'description' => $request->description,
        //     ]);

        /* SECTION 3: Raw SQL */
        DB::statement("UPDATE notice_boards 
        SET title = ?, date = ?, image = ?, description = ? 
        WHERE id = ?", [
            $request->title,
            $request->date,
            $notice->image,
            $request->description,
            $id
        ]);

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice updated successfully!');
    }



    /* Remove the specified notice from storage */
    public function destroy($id)
    {   /* SECTION 1: Eloquent ORM */
        /* SECTION 2: Query Builder */
        /* SECTION 3: Raw SQL */

        $notice = NoticeBoard::findOrFail($id);

        // Delete the image file if exists
        if ($notice->image) {
            Storage::disk('public')->delete($notice->image);
        }

        $notice->delete();

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice deleted successfully!');
    }
}

