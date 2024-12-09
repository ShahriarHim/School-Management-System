<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeBoard;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use yajra\DataTables\Datatables;
use App\Models\NoticeBoardDetails;
use Illuminate\Support\Facades\Auth;

class AdminNoticeBoardController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            // Eager load both user (created_by) and details for each notice
            $notices = NoticeBoard::with(['user', 'details'])->get();

            return DataTables::of($notices)
                ->addColumn('action', function ($notice) {
                    return '<a href="' . route('admin.noticeboard.edit', $notice->id) . '" class="btn btn-sm btn-primary custom-edit-btn">Edit</a>
                        <form action="' . route('admin.noticeboard.destroy', $notice->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger custom-delete-btn"  onclick="return confirm(\'Are you sure?\')">Delete</button>
                        </form>';
                })
                ->addColumn('created_by', function ($notice) {
                    return $notice->user ? $notice->user->name : 'N/A'; // Show the name of the user
                })
                ->addColumn('description', function ($notice) {
                    return $notice->details ? $notice->details->description : 'No description available'; // Show the description from NoticeBoardDetails
                })
                ->addColumn('image', function ($notice) {
                    return $notice->details ? $notice->details->image : 'No image to show'; // Show image if available
                })
                ->addColumn('date', function ($notice) {
                    return $notice->details ? $notice->details->date : 'N/A'; // Show date from NoticeBoardDetails
                })
                ->rawColumns(['action']) // Allow action and image columns to render HTML
                ->make(true);
        }

        return view('admin.notice.noticeManagementYajra');
    }

    // public function index()
    // {
    //     if (request()->ajax()) {

    //         $notices = NoticeBoard::with('details')->get();

    //         return DataTables::of($notices)
    //             ->addColumn('action', function ($notice) {
    //                 return '<a href="' . route('admin.noticeboard.edit', $notice->id) . '" class="btn btn-sm btn-primary custom-edit-btn">Edit</a>
    //                     <form action="' . route('admin.noticeboard.destroy', $notice->id) . '" method="POST" style="display:inline-block;">
    //                         ' . csrf_field() . '
    //                         ' . method_field('DELETE') . '
    //                         <button type="submit" class="btn btn-sm btn-danger custom-delete-btn"  onclick="return confirm(\'Are you sure?\')">Delete</button>
    //                     </form>';
    //             })

    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }


    //     // $notices = NoticeBoard::all();

    //     // return response()->json([
    //     //     'success' => true,
    //     //     'data' => $notices,
    //     //     'message' => 'Notices retrieved successfully!'
    //     // ]);


    //     return view('admin.notice.noticeManagementYajra');
    // }



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

        // Validate the form input
        $request->validate([
            'title' => 'required|min:3|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|min:2|max:255',
        ]);

        // try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'images/' . $imageName;
                $image->move(public_path('images'), $imageName);
            }

            // Get the username of the authenticated user
            $createdBy = Auth::user();
            // dd($name);

            // Save the notice board data
            // $noticeBoard = NoticeBoard::create([
            //     'title' => $request->input('title'),
            //     'created_by' => $createdBy->name,
            // ]);
            $noticeBoard = new NoticeBoard();
            $noticeBoard->title = $request->input('title');
            $noticeBoard->created_by = $createdBy->id;
            // dd($noticeBoard);
            $noticeBoard->save();



            // Save notice board details
            NoticeBoardDetails::create([
                'notice_board_id' => $noticeBoard->id,
                'image' => $imagePath,
                'description' => $request->description,
                'date' => $request->date,
            ]);

            // Redirect with success message
            return redirect()->route('admin.noticeboard.index')->with('success', 'Notice created successfully!');

        // } catch (\Exception $e) {
        //     dd($e);
        //     // Handle any errors
        //     return redirect()->route('admin.noticeboard.index')->with('error', 'Failed to create notice. Please try again.');
        // }
    }




    // Create new notice
    /* SECTION 2: Eloquent ORM */
    // NoticeBoard::create([
    //     'title' => $request->title,
    //     'date' => $request->date,
    //     'image' => $imagePath,
    //     'description' => $request->description,
    // ]);


    /* SECTION 3: Query Builder */
    // DB::table('notice_boards')->insert([
    //     'title' => $request->title,
    //     'date' => $request->date,
    //     'image' => $imagePath,
    //     'description' => $request->description,
    // ]);

    /* SECTION 4: Raw SQL */
    // DB::insert(
    //     "INSERT INTO notice_boards (title, date, image, description) VALUES ('{$request->title}', '{$request->date}',
    // '{$imagePath}','{$request->description}')"
    // );
    // return response()->json(['success' => true, 'message' => 'Notice Created Successfully!']);
    //     dd($request->all());
    //     return redirect()->route('admin.noticeboard.index')->with('success', 'Notice created successfully!');
    // } catch (\Exception $e) {
    //     return redirect()->route('admin.noticeboard.index')->with('error', $e, 'Failed to create notice. Please try again.');
    //     // return response()->json(['success' => false, $e, 'message' => 'Failed to create notice. Please try again.']);
    // }





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
        // return response()->json(['success' => true, '' => $notice]);
    }

    /* Update the specified notice in storage */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validate input

        // Validate input (all fields are optional for updates)
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);


        /* SECTION 1: Eloquent ORM */
        // $notice = NoticeBoard::findOrFail($id);

        /* SECTION 2: Query Builder */
        // Fetch the notice using Query Builder or Raw SQL
        $notice = DB::table('notice_boards')->where('id', $id)->first();



        /* SECTION 3: Raw SQL */
        // $temp = (int) $id;
        // $query = 'SELECT * FROM notice_boards WHERE id = $temp';
        // $res = DB::raw($query);

        // $notice = DB::select("SELECT * FROM notice_boards WHERE id = $id");
        // dd($notice);

        if (!$notice) {
            // return redirect()->route('admin.noticeboard.index')->with('error', 'Notice not found.');
            return response()->json(['success' => false, 'message' => 'Notice not found.']);
        }
        $notice = $notice[0]; // Converting the result to an object

        $imagePath = $notice->image; // Keep the old image path
        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath)); // Delete old image
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
        // dd($request->all());
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
        // Update notice with provided fields

        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice updated successfully!');
        // Fetch updated notice
        // $updatedNotice = DB::table('notice_boards')->where('id', $id)->first();

        // // Return success response with updated data
        // return response()->json([
        //     'success' => true,
        //     'data' => $updatedNotice,
        //     'message' => 'Notice updated successfully!'
        // ]);
    }



    /* Remove the specified notice from storage */
    // public function destroy($id)
    // {   /* SECTION 1: Eloquent ORM */
    //     /* SECTION 2: Query Builder */
    //     /* SECTION 3: Raw SQL */

    //     $notice = NoticeBoard::findOrFail($id);

    //     // Delete the image file if exists
    //     if ($notice->image) {
    //         Storage::disk('public')->delete($notice->image);
    //     }

    //     $notice->delete();
    //     return response()->json(['success' => true, 'message' => 'The notice has been deleted']);
    //     // return redirect()->route('admin.noticeboard.index')->with('success', 'Notice deleted successfully!');
    // }
    public function destroy($id)
    {
        // Fetch the notice
        $notice = NoticeBoard::find($id);

        // If the notice doesn't exist, return 404
        if (!$notice) {
            return response()->json(['success' => false, 'message' => 'Notice not found'], 404);
        }

        // Delete the image file if it exists
        if ($notice->image && Storage::exists('public/' . $notice->image)) {
            Storage::delete('public/' . $notice->image);
        }

        // Delete the notice
        $notice->delete();

        // Return success response
        return redirect()->route('admin.noticeboard.index')->with('success', 'Notice deleted successfully!');
        // return response()->json(['success' => true, 'message' => 'The notice has been deleted']);
    }

    public function deleteData()
    {
        // Step 1: Delete all data from the `notice_board_details` table first
        DB::table('notice_board_details')->delete();
    
        // Step 2: Delete all data from the `notice_boards` table
        DB::table('notice_boards')->delete();
    
        // Step 3: Reset the auto-increment counter for both tables (optional, depending on your DBMS)
        DB::statement('ALTER TABLE notice_boards AUTO_INCREMENT = 1');
        DB::statement('ALTER TABLE notice_board_details AUTO_INCREMENT = 1');
    
        // Return success response
        return redirect()->route('admin.noticeboard.index')->with('success', 'All data has been deleted and auto-increment has been reset');
    }
    



}

