<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryImageController extends Controller
{
    public function index($gallery_id)
    {
        $gallery = Gallery::findOrFail($gallery_id);
        $images = $gallery->images;
        return view('admin.galleryimages.index', compact('gallery', 'images'));
    }

    public function create($gallery_id)
    {
        $gallery = Gallery::findOrFail($gallery_id);
        return view('admin.galleryimages.create', compact('gallery'));
    }

    public function store(Request $request, $gallery_id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/' . $imageName;
            $image->move(public_path('images'), $imageName);
        }

        GalleryImage::create([
            'gallery_id' => $gallery_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galleries.images.index', $gallery_id)->with('success', 'Gallery image created successfully!');
    }

    public function edit($gallery_id, $id)
    {
        $gallery = Gallery::findOrFail($gallery_id);
        $image = GalleryImage::findOrFail($id);
        return view('admin.galleryimages.edit', compact('gallery', 'image'));
    }

    public function update(Request $request, $gallery_id, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = GalleryImage::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($image->image && file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            $uploadedImage = $request->file('image');
            $imageName = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();
            $imagePath = 'images/' . $imageName;
            $uploadedImage->move(public_path('images'), $imageName);
            $image->image = $imagePath;
        }

        $image->update([
            'image' => $image->image,
        ]);

        return redirect()->route('admin.galleries.images.index', $gallery_id)->with('success', 'Gallery image updated successfully!');
    }
    
    public function confirmDelete($gallery_id, $id){
        $gallery = Gallery::findOrFail($gallery_id);
        $image = GalleryImage::findOrFail($id);
        return view('admin.galleryimages.delete', compact('gallery', 'image'));
    }

    public function destroy($gallery_id, $id)
    {
        $image = GalleryImage::findOrFail($id);

        if ($image->image && file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        $image->delete();

        return redirect()->route('admin.galleries.images.index', $gallery_id)->with('success', 'Gallery image deleted successfully!');
    }
}
