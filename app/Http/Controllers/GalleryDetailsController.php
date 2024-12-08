<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\GalleryDate;
use Illuminate\Http\Request;
use App\Models\PageContent;
use Illuminate\Support\Facades\DB;

class GalleryDetailsController extends Controller
{
    public function show($id)
    {
        // Eloquent ORM Query
        // $pc = PageContent::where('slug', 'gallery_detail')->first();

        // Query Builder Equivalent
        // $pc = DB::table('page_contents')->where('slug', 'gallery_detail')->first();

        // Raw SQL Equivalent without placeholders
        $pc = DB::select("SELECT * FROM page_contents WHERE slug = 'gallery_detail' LIMIT 1");

        // Eloquent ORM Query
        // $gallery_date = GalleryDate::where('gallery_id', $id)->first();

        // Query Builder Equivalent
        // $gallery_date = DB::table('gallery_dates')->where('gallery_id', $id)->first();

        // Raw SQL Equivalent without placeholders
        $gallery_date = DB::select("SELECT * FROM gallery_dates WHERE gallery_id = $id LIMIT 1");

        // Eloquent ORM Query
        //$gallery = Gallery::with('images')->findOrFail($id);
        // Query Builder Equivalent
        // $gallery = DB::table('galleries')
        //              ->leftJoin('gallery_images', 'galleries.id', '=', 'gallery_images.gallery_id')
        //              ->select('galleries.*', 'gallery_images.*')
        //              ->where('galleries.id', $id)
        //              ->get();

        // Raw SQL Equivalent without placeholders
        $gallery = DB::select("
            SELECT galleries.*, gallery_images.*
            FROM galleries
            LEFT JOIN gallery_images ON galleries.id = gallery_images.gallery_id
            WHERE galleries.id = $id
        ");

        return view('pages.backfromgal', compact('gallery', 'gallery_date', 'pc'));
    }
}
