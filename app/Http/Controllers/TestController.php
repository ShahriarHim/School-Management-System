<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
/*         $order=DB::table('orders')
        ->select('state','city')
        ->groupBy('state','city')
        ->get(); */
        
/*         $users = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.id')
            ->select('users.*', 'orders.price')
            ->where('orders.id','>',5)
            ->get(); */

/*         $users=DB::table('users')
            ->join('orders', function(JoinClause $join){
                $join->on('users.id','=','orders.id')
                ->whereRaw('users.id > 5');
            })
            ->get(); */
/* 
        $orders=DB::table('orders');

        $users=DB::table('users')
            ->joinSub($orders,'user_order', function(JoinClause $join){
                $join->on('users.id','=','user_order.id')
                ->whereRaw('users.id > 3');
                
            })
            ->get(); */

/*             $first=DB::table('users')
                ->select('name');

            $second=DB::table('users')
                ->select('email as name')
                ->union($first)
                ->get();

        return response()->json($second); */

/*         $users = DB::table('users')
            ->where('id','=',1)
            ->orWhere([
                ['id', '>', '2'],
                ['name', '=', 'Tony Stark'],
            ])
            ->get(); */
/* 
            $users = DB::table('users')
            ->whereBetween('id',[2,4])
            ->get(); */

/*         $salad=DB::table('json_types')
            ->where('preference->fruits->eatable')
            ->get(); */

/*             $uid=DB::table('users')->select('id');

            $orders=DB::table('orders')
                ->whereIn('id', $uid)
                ->get(); */

/*             $users = DB::table('users')
            ->whereColumn('created_at','>' ,'updated_at')
            ->get();
 */
/*             $users=DB::table('users')
                ->where('name','like','%Stark')
                ->where(function(Builder $query){
                    $query->where('updated_at','<>',Null)
                          ->orwhere('created_at','<>',Null);
                })
                ->get(); */ 

        /* return response()->json($users); */

/* 
        $users=User::find(1);
        $rawSql = $users->toSql();


        dd($rawSql);

 */

/*         $query = DB::table('users')->where('email', 'test@example.com');
        $sql = $query->toSql();
        dd($sql);
        
        $sql=$users->toSql();
        dd($sql); */

        /* $users=DB::select('select * from users where id > 5'); */
        /* $users=DB::select('select * from users where id > ?' ,[3]); */

        //$users=DB::update('update users set name = ? where name = ?',['salauddin' ,'Tony Stark'] );

        //$count = User::where('role', 3)->count();
 
/*         $max = User::max('id');
        return response()->json($max);
         */

/*          $test1=Test::create([
            'name'=>'test1'
         ]); */
/* 
         $tests=Test::chunkById(2, function(Collection $tests){
            $tests->each->update(['name'=>'testing purpose']);
         });

         return response()->json($tests);
 */
/* 
        if($request->ajax()){

            $tests = Test::all();
            return DataTables::of($tests)->make(true);
        }

        return view('test1');

*/

        if($request->ajax()){
            $data=Test::all();
            return response()->json($data);

        }
        
        return view('test.testAjaxGet');
         
    }


    public function apiIndex(Request $request)
    {
        $data=Test::all();
        return response()->json($data);
                 
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $test= new Test();
        $test->name=$request->input('name');
        $test->description=$request->input('description');
        $test->price=$request->input('price');
        $test->stock=$request->input('stock');

        $test->save();
        
        return response()->json(['message'=>'form submitted']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        return view('test.testAjaxUpdate' , ['test'=>$test]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $test= Test::find($id);

        if(!$test){
            return response()->json(['message'=>'No record found']);

        }

        $test->name=$request->input('name');
        $test->description=$request->input('description');
        $test->price=$request->input('price');
        $test->stock=$request->input('stock');
        $test->save();
        
        return response()->json(['message'=>'Order data Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $test= Test::find($id);
        if(!$test){
            return response()->json(['status'=>'No record found']);
        }
        $test->delete();
        return response()->json(['status'=>'delete success']);
    }
}
