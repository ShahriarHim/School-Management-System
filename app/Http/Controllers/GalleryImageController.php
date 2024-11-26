<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\DB;

class GalleryImageController extends Controller
{
    public function index($gallery_id)
    {
        // Eloquent ORM
      /*   $gallery = Gallery::findOrFail($gallery_id);
        $images = $gallery->images; */

        // Query Builder
        // $gallery = DB::table('galleries')->where('id', $gallery_id)->first();
        // $images = DB::table('gallery_images')->where('gallery_id', $gallery_id)->get();

        // Raw SQL
        $galleryArray = DB::select("SELECT * FROM galleries WHERE id = $gallery_id");
        $gallery = !empty($galleryArray) ? $galleryArray[0] : null;
        $images = DB::select("SELECT * FROM gallery_images WHERE gallery_id = $gallery_id");

        return view('admin.galleryimages.index', compact('gallery', 'images'));
    }

    public function create($gallery_id)
    {
        // Eloquent ORM
        //$gallery = Gallery::findOrFail($gallery_id);

        // Query Builder
        // $gallery = DB::table('galleries')->where('id', $gallery_id)->first();

        // Raw SQL
        $galleryArray = DB::select("SELECT * FROM galleries WHERE id = $gallery_id");
        $gallery = !empty($galleryArray) ? $galleryArray[0] : null;

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

        // Eloquent ORM
        /* GalleryImage::create([
            'gallery_id' => $gallery_id,
            'image' => $imagePath,
        ]);
 */
        // Query Builder
        // DB::table('gallery_images')->insert([
        //     'gallery_id' => $gallery_id,
        //     'image' => $imagePath,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Raw SQL
        DB::insert("INSERT INTO gallery_images (gallery_id, image, created_at, updated_at) VALUES ($gallery_id, '$imagePath', '" . now() . "', '" . now() . "')");
        return redirect()->route('admin.galleries.images.index', $gallery_id)->with('success', 'Gallery image created successfully!');
    }

    public function edit($gallery_id, $id)
    {
        // Eloquent ORM
        /* $gallery = Gallery::findOrFail($gallery_id);
        $image = GalleryImage::findOrFail($id);
 */
        // Query Builder
        // $gallery = DB::table('galleries')->where('id', $gallery_id)->first();
        // $image = DB::table('gallery_images')->where('id', $id)->first();

        // Raw SQL
        $galleryArray = DB::select("SELECT * FROM galleries WHERE id = $gallery_id");
        $gallery = !empty($galleryArray) ? $galleryArray[0] : null;
        $imageArray = DB::select("SELECT * FROM gallery_images WHERE id = $id");
        $image = !empty($imageArray) ? $imageArray[0] : null;

        return view('admin.galleryimages.edit', compact('gallery', 'image'));
    }

    public function update(Request $request, $gallery_id, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Eloquent ORM
        //$image = GalleryImage::findOrFail($id);

        // Query Builder
        // $image = DB::table('gallery_images')->where('id', $id)->first();

        // Raw SQL
        $imageArray = DB::select("SELECT * FROM gallery_images WHERE id = $id");
        $image = !empty($imageArray) ? $imageArray[0] : null;

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

        // Eloquent ORM
        /* $image->update([
            'image' => $image->image,
        ]); */

        // Query Builder
        // DB::table('gallery_images')->where('id', $id)->update([
        //     'image' => $image->image,
        //     'updated_at' => now(),
        // ]);

        // Raw SQL
        DB::update("UPDATE gallery_images SET image = '$image->image', updated_at = '" . now() . "' WHERE id = $id");
        return redirect()->route('admin.galleries.images.index', $gallery_id)->with('success', 'Gallery image updated successfully!');
    }

    public function destroy($gallery_id, $id)
    {
        // Eloquent ORM
        //$image = GalleryImage::findOrFail($id);

        // Query Builder
        // $image = DB::table('gallery_images')->where('id', $id)->first();

        // Raw SQL
        $imageArray = DB::select("SELECT * FROM gallery_images WHERE id = $id");
        $image = $imageArray[0];

        if ($image->image && file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }
        // Eloquent ORM
        //$image->delete();

        // Query Builder
        // DB::table('gallery_images')->where('id', $id)->delete();

        // Raw SQL
        DB::delete("DELETE FROM gallery_images WHERE id = $id");

        return redirect()->route('admin.galleries.images.index', $gallery_id)->with('success', 'Gallery image deleted successfully!');
    }
}
