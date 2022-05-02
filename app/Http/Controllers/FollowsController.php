<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function followlist(){
        $followlist = DB::table('follows')
            ->join('users', 'users.id', '=', 'follows.follow')
            ->where('follower', Auth::id())
            ->select('users.id', 'users.images')
            ->get();
        $followpost = DB::table('follows')
            ->join('users', 'users.id', '=', 'follows.follow')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follower', Auth::id())
            ->select('users.id', 'users.images', 'users.username', 'posts.posts', 'posts.created_at')
            ->get();

        return view('follows.followlist', [ 'followlist' => $followlist, 'followpost' => $followpost]);
    }

    public function followerlist(){
        $followerlist = DB::table('follows')
            ->join('users', 'users.id', '=', 'follows.follower')
            ->where('follow', Auth::id())
            ->select('users.id', 'users.images')
            ->get();
        $followerpost = DB::table('follows')
            ->join('users', 'users.id', '=', 'follows.follower')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follow', Auth::id())
            ->select('users.id', 'users.images', 'users.username', 'posts.posts', 'posts.created_at')
            ->get();

        return view('follows.followerlist', [ 'followerlist' => $followerlist, 'followerpost' => $followerpost]);
    }
    public function follow($follow){
        DB::table('follows')->insert([
            'follow' => $follow,
            'follower' => Auth::id(),
        ]);

        return back();
    }
    public function unfollow($unfollow){
        DB::table('follows')
            ->where('follow', $unfollow)
            ->where('follower', Auth::id())
            ->delete();

        return back();
    }
    public function follower($follower){
        DB::table('follow')->insert([
            'follower' => $follower,
            'follow' => Auth::id(),
        ]);

        return back();
    }
}
