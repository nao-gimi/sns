<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function search(Request $request){
        $search = $request->input('search');

        if(isset($search)) {
            $userlists = DB::table('users')
                ->where('username', 'like', '%'.$search.'%')
                ->where('id', '<>', Auth::id())
                ->get();
        } else {
            $userlists = DB::table('users')
                ->where('id', '<>', Auth::id())
                ->get();
        }

        return view('users.search', ['userlists'=>$userlists]);
    }
}
