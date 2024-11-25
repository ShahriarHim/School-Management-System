<?php
namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\PageContent;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {

        //Page Content
        /* Eloquent ORM Query
            $pc = PageContent::where('slug', 'gallery')->first();
        */
        // Query Builder Equivalent
        //$pc = DB::table('page_contents')->where('slug', 'gallery')->first();
        //Raw SQL Equivalent
        $pc = DB::select('SELECT * FROM page_contents WHERE slug = ? LIMIT 1', ['gallery']);



        //Gallery view
        /*Eloquent ORM Query
        $galleries = Gallery::withCount('images')->get();
        */
        //Query Builder Equivalent
        /*  $galleries = DB::table('galleries')
                       ->leftJoin('gallery_images', 'galleries.id', '=', 'gallery_images.gallery_id')
                       ->select('galleries.*', DB::raw('COUNT(gallery_images.id) as images_count'))
                        ->groupBy('galleries.id')
                       ->get(); */
        //Raw SQL Equivalent
            $galleries = DB::select('
             SELECT galleries.*, COUNT(gallery_images.id) as images_count
             FROM galleries
             LEFT JOIN gallery_images ON galleries.id = gallery_images.gallery_id
            GROUP BY galleries.id
         ');

        return view('pages.gallery', compact('galleries', 'pc'));
    }
}
