<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryDate;
class AdminGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index', compact('galleries'));
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

        $gallery = Gallery::create([
            'title' => $request->title,
            'thumbnail' => $thumbnailPath,
        ]);

        GalleryDate::create([
            'gallery_id' => $gallery->id,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery created successfully!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $galleryDate = GalleryDate::where('gallery_id', $id)->first();
        if (!$galleryDate) {
            $galleryDate = new GalleryDate(['gallery_id' => $gallery->id, 'date' => null]);
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

        $gallery = Gallery::findOrFail($id);

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

        $gallery->update([
            'title' => $request->title,
            'thumbnail' => $gallery->thumbnail,
        ]);

        $galleryDate = GalleryDate::where('gallery_id', $id)->first();
        $galleryDate->update([
            'date' => $request->date,
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery updated successfully!');
    }

    public function confirmDelete($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.delete', compact('gallery'));
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->thumbnail && file_exists(public_path($gallery->thumbnail))) {
            unlink(public_path($gallery->thumbnail));
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery deleted successfully!');
    }
}
