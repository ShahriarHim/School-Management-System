<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserTestController extends Controller
{
    public function processUsers()
    {
        /* DB::table('users')->where('fb', 'http://www.faceook.com')->lazyById()->each(function (object $user)
        {
            DB::table('users')->where('id', $user->id)->update(['fb' => 'http://m.facebook.com']);
        });
        $users = User::all();
        return view('utest', ['users'=>$users]); */
        //return DB::table('users')->avg('id');
        /*  return DB::table('users')
                ->whereRaw('id % 2 = 0')
                ->avg('id'); */
        /* $n = 21;
        $users = [];
        for($id=1; $id <=$n; $id++){
            $user = DB::table('users')->where('id', $id)->first();
            if($user){
                $users[] = $user->name;
            }
            else $users[] = "Has no any user who's id $id";
        }
        return response()->json($users); */

        /* $users = DB::table('users')->select('name', 'email as user_email')->get();*/
        /* $users = DB::table('users')->distinct()->select('fb', 'twitter')->get(); */
        /* $query = DB::table('users')->select('name');
        $users = $query->addSelect('fb')->get(); */
        /* $users = DB::table('users')
             ->select(DB::raw('count(*) as user_count, fb'))
             ->where('fb', 'http://m.facebook.com')
             ->groupBy('fb')
             ->get(); */

        /*  $users = DB::table('users')
             ->selectRaw('id * ? as id_with_some', [100])
             ->get(); */
        /* $users = DB::table('users')
                ->select('role', 'fb', DB::raw('SUM(id) as total_id_sum'))
                ->groupBy('role', 'fb')
                ->havingRaw('total_id_sum < ?', [49])
                ->get(); */
        /* $users = DB::table('users')
            ->orderByRaw('updated_at - created_at DESC')
            ->get(); */
        /* $users = DB::table('users')
            ->select('role', DB::raw('GROUP_CONCAT(name) as names'))
            ->groupByRaw('role')
            ->get(); */

        /* $galleries = DB::table('galleries')
            ->join('gallery_images', 'galleries.id', '=', 'gallery_images.gallery_id')
            ->select('*')
            ->get(); */

        /* DB::insert('INSERT INTO users (name, role, email, password) VALUES (?, ?, ?, ?)', ['John Doe1', 3, 'john@ex1ample.com', "qwerty"]);
        $users = DB::select('select * from users'); */
        $query = User::all();
        $query->toSql();
        return response()->json($query);
    }
}
