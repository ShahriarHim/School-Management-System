<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\GalleryDate;
use Illuminate\Http\Request;
use App\Models\PageContent;

class GalleryDetailsController extends Controller
{
    public function show($id)
    {
        $pc = PageContent::where('slug', 'gallery_detail')->first();
        $gallery_date = GalleryDate::where('gallery_id', $id)->first();
        $gallery = Gallery::with('images')->findOrFail($id);
        return view('pages.backfromgal', compact('gallery', 'gallery_date', 'pc'));
    }
}
