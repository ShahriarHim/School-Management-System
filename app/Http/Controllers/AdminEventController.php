<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
class AdminEventController extends Controller
{
    /**
     * Display a listing of the events.
     */


    /* public function index()
    {
        // Query Builder
        // $events = DB::table('events')->get();

        // Raw SQL without placeholders
        $events = DB::select('SELECT * FROM events');

        // Eloquent ORM
        // $events = Event::all();

        return view('admin.event.index', compact('events'));
    }
 */



 public function index(Request $request)
 {
     if ($request->ajax()) {
         $data = Event::select(['id', 'title', 'author_name', 'date', 'status', 'image', 'description']);

         return DataTables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function ($row) {
                 $editUrl = route('admin.eventsmanagement.edit', $row->id);
                 $deleteUrl = route('admin.eventsmanagement.destroy', $row->id);

                 return '
                     <a href="' . $editUrl . '" class="edit btn btn-primary btn-sm">Edit</a>
                     <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                         ' . csrf_field() . '
                         ' . method_field('DELETE') . '
                         <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                     </form>
                 ';
             })
             ->rawColumns(['action'])
             ->make(true);
     }

     return view('admin.event.index');
 }





    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created event in storage.
     */
    /* public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|string|in:upcoming,past',
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

            // Raw SQL without placeholders
            DB::insert("INSERT INTO events (title, author_name, date, status, image, description, created_at, updated_at)
                        VALUES ('{$request->title}', '{$request->author_name}', '{$request->date}', '{$request->status}', '{$imagePath}', '{$request->description}', '" . now() . "', '" . now() . "')");

            // Query Builder
            // DB::table('events')->insert([
            //     'title' => $request->title,
            //     'author_name' => $request->author_name,
            //     'date' => $request->date,
            //     'status' => $request->status,
            //     'image' => $imagePath,
            //     'description' => $request->description,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // Eloquent ORM
            // Event::create([
            //     'title' => $request->title,
            //     'author_name' => $request->author_name,
            //     'date' => $request->date,
            //     'status' => $request->status,
            //     'image' => $imagePath,
            //     'description' => $request->description,
            // ]);

            return redirect()->route('admin.eventsmanagement.index')->with('success', 'Event created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.eventsmanagement.index')->with('error', 'Failed to create event. Please try again.');
        }
    } */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|string|in:upcoming,past',
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

            // Insert data using Eloquent ORM
            Event::create([
                'title' => $request->title,
                'author_name' => $request->author_name,
                'date' => $request->date,
                'status' => $request->status,
                'image' => $imagePath,
                'description' => $request->description,
            ]);

            return response()->json([
                'message' => 'Event created successfully!',
                'redirect_url' => route('admin.eventsmanagement.index')
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create event. Please try again.'], 500);
        }
    }


    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        // Raw SQL without placeholders
        $event = DB::select("SELECT * FROM events WHERE id = $id");
        // Query Builder
        // $event = DB::table('events')->where('id', $id)->first();

        // Eloquent ORM
        // $event = Event::findOrFail($id);

        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|string|in:upcoming,past',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Raw SQL without placeholders
        $id = (int)$id;
        $eventArray = DB::select("SELECT * FROM events WHERE id = $id");
        $event = !empty($eventArray) ? $eventArray[0] : null;

        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/' . $imageName;
            $image->move(public_path('images'), $imageName);
            $event->image = $imagePath;
        }

        DB::update("UPDATE events SET title = '{$request->title}', author_name = '{$request->author_name}', date = '{$request->date}', status = '{$request->status}', image = '{$event->image}', description = '{$request->description}', updated_at = '" . now() . "' WHERE id = $id");

        // Query Builder
        // DB::table('events')->where('id', $id)->update([
        //     'title' => $request->title,
        //     'author_name' => $request->author_name,
        //     'date' => $request->date,
        //     'status' => $request->status,
        //     'image' => $event->image,
        //     'description' => $request->description,
        //     'updated_at' => now(), // Optionally update the timestamp
        // ]);

        // Eloquent ORM
        // $event->update([
        //     'title' => $request->title,
        //     'author_name' => $request->author_name,
        //     'date' => $request->date,
        //     'status' => $request->status,
        //     'image' => $event->image,
        //     'description' => $request->description,
        // ]);

        return redirect()->route('admin.eventsmanagement.index')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        // Raw SQL without placeholders
        /* $id = (int)$id;
        $eventArray = DB::select("SELECT * FROM events WHERE id = $id");
        if (empty($eventArray)) {
            return redirect()->route('admin.eventsmanagement.index')->with('error', 'Event not found!');
        }
        $event = $eventArray[0];

        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }
 */
        /* DB::delete("DELETE FROM events WHERE id = $id"); */

        // Query Builder
        DB::table('events')->where('id', $id)->delete();

        // Eloquent ORM
        // $event->delete();

        return redirect()->route('admin.eventsmanagement.index')->with('success', 'Event deleted successfully!');
    }
}
