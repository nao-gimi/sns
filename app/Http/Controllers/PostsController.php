<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PostsController extends Controller
{
    //
    public function index(){
        $tweets = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.username', 'users.images', 'posts.*')
            ->get();

        return view('posts.index', ['tweets' => $tweets]);
    }

    public function post(Request $request){
        $newpost = $request->input('post');

        \DB::table('posts')->insert([
            'posts' => $newpost,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/top');
    }

    public function delete($id){
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }
}
