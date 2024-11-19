<?php
namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\PageContent;

class GalleryController extends Controller
{
    public function index() {
        $pc = PageContent::where('slug', 'gallery')->first();
        $galleries = Gallery::withCount('images')->get();
        return view('pages.gallery', compact('galleries', 'pc'));
    }
}
