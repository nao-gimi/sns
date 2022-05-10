<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Auth;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->middleware(function ($request, $next) {

            $followcount = DB::table('follows')
              ->where('follower', Auth::id())
              ->count();

            $followercount = DB::table('follows')
              ->where('follow', Auth::id())
              ->count();

            // viewに共通データを渡す
            View::share('followcount', $followcount);
            View::share('followercount', $followercount);

            return $next($request);
        });
    }
}
