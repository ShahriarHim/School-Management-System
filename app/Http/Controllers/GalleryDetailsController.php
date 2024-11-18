<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryDetailsController extends Controller
{
    // Display the details of a specific gallery
    public function show($id)
    {
        $gallery = Gallery::with('images')->findOrFail($id);
        return view('pages.backfromgal', compact('gallery'));
    }
}
