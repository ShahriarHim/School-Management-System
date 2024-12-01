<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryDate;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
class AdminGalleryController extends Controller
{
    /* public function index(Request $request)
    {
        // ORM
        // $galleries = Gallery::all();

        // Query Builder
        // $galleries = DB::table('galleries')->get();

        if($request->ajax()){
            $data = Gallery::select('*');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.galleries.edit', $row->id);
                $deleteUrl = route('admin.galleries.destroy', $row->id);

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
        return view('admin.galleries.index');
    } */

    public function index(Request $request)
{
    if ($request->ajax()) {
        $data = Gallery::select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('admin.galleries.edit', $row->id);
                $deleteUrl = route('admin.galleries.destroy', $row->id);
                $viewImagesUrl = route('admin.galleries.images.index', ['gallery_id' => $row->id]);

                return '
                    <a href="' . $editUrl . '" class="edit btn btn-primary btn-sm">Edit</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a href="' . $viewImagesUrl . '" class="view-images btn btn-info btn-sm">View Images</a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('admin.galleries.index');
}


    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date'
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = 'images/' . $thumbnailName;
            $thumbnail->move(public_path('images'), $thumbnailName);
        }

        // ORM
        // $gallery = Gallery::create([
        //     'title' => $request->title,
        //     'thumbnail' => $thumbnailPath,
        // ]);

        // Query Builder
        // $galleryId = DB::table('galleries')->insertGetId([
        //     'title' => $request->title,
        //     'thumbnail' => $thumbnailPath,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Raw SQL without placeholders
        DB::insert("INSERT INTO galleries (title, thumbnail, created_at, updated_at) VALUES ('{$request->title}', '{$thumbnailPath}', '" . now() . "', '" . now() . "')");
        $galleryId = DB::getPdo()->lastInsertId();

        // ORM
        // GalleryDate::create([
        //     'gallery_id' => $gallery->id,
        //     'date' => $request->date,
        // ]);

        // Query Builder
        // DB::table('gallery_dates')->insert([
        //     'gallery_id' => $galleryId,
        //     'date' => $request->date,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Raw SQL without placeholders
        DB::insert("INSERT INTO gallery_dates (gallery_id, date, created_at, updated_at) VALUES ({$galleryId}, '{$request->date}', '" . now() . "', '" . now() . "')");

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery created successfully!');
    }

    public function edit($id)
    {
        // ORM
        // $gallery = Gallery::findOrFail($id);
        // $galleryDate = GalleryDate::where('gallery_id', $id)->first();

        // Query Builder
        // $gallery = DB::table('galleries')->where('id', $id)->first();
        // $galleryDate = DB::table('gallery_dates')->where('gallery_id', $id)->first();

        // Raw SQL without placeholders
        $galleryArray = DB::select("SELECT * FROM galleries WHERE id = $id");
        $gallery = !empty($galleryArray) ? $galleryArray[0] : null;
        $galleryDateArray = DB::select("SELECT * FROM gallery_dates WHERE gallery_id = $id");
        $galleryDate = !empty($galleryDateArray) ? $galleryDateArray[0] : null;

        if (!$galleryDate) {
            $galleryDate = (object) ['gallery_id' => $gallery->id, 'date' => null];
        }

        return view('admin.galleries.edit', compact('gallery', 'galleryDate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date'
        ]);

        // ORM
        // $gallery = Gallery::findOrFail($id);

        // Query Builder
        // $gallery = DB::table('galleries')->where('id', $id)->first();

        // Raw SQL without placeholders
        $galleryArray = DB::select("SELECT * FROM galleries WHERE id = $id");
        $gallery = !empty($galleryArray) ? $galleryArray[0] : null;

        if ($request->hasFile('thumbnail')) {
            if ($gallery->thumbnail && file_exists(public_path($gallery->thumbnail))) {
                unlink(public_path($gallery->thumbnail));
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = 'images/' . $thumbnailName;
            $thumbnail->move(public_path('images'), $thumbnailName);
            $gallery->thumbnail = $thumbnailPath;
        }

        // ORM
        // $gallery->update([
        //     'title' => $request->title,
        //     'thumbnail' => $gallery->thumbnail,
        // ]);

        // Query Builder
        // DB::table('galleries')->where('id', $id)->update([
        //     'title' => $request->title,
        //     'thumbnail' => $gallery->thumbnail,
        //     'updated_at' => now(),
        // ]);

        // Raw SQL without placeholders
        DB::update("UPDATE galleries SET title = '{$request->title}', thumbnail = '{$gallery->thumbnail}', updated_at = '" . now() . "' WHERE id = $id");

        // ORM
        // $galleryDate = GalleryDate::where('gallery_id', $id)->first();
        // $galleryDate->update([
        //     'date' => $request->date,
        // ]);

        // Query Builder
        // DB::table('gallery_dates')->where('gallery_id', $id)->update([
        //     'date' => $request->date,
        //     'updated_at' => now(),
        // ]);

        // Raw SQL without placeholders
        DB::update("UPDATE gallery_dates SET date = '{$request->date}', updated_at = '" . now() . "' WHERE gallery_id = $id");

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery updated successfully!');
    }

    public function destroy($id)
    {
        // ORM
        // $gallery = Gallery::findOrFail($id);

        // Query Builder
        // $gallery = DB::table('galleries')->where('id', $id)->first();

        // Raw SQL without placeholders
       /*  $id = (int) $id;
        $galleryArray = DB::select("SELECT * FROM galleries WHERE id = $id");
        if (empty($galleryArray)) {
            return redirect()->route('admin.galleries.index')->with('error', 'Gallery not found!');
        }
        $gallery = $galleryArray[0];

        if ($gallery->thumbnail && file_exists(public_path($gallery->thumbnail))) {
            unlink(public_path($gallery->thumbnail));
        } */

        // ORM
        // $gallery->delete();

        // Query Builder
        // DB::table('galleries')->where('id', $id)->delete();

        // Raw SQL without placeholders
        DB::delete("DELETE FROM galleries WHERE id = $id");

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery deleted successfully!');
    }
}


