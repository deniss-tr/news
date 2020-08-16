<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function loginCheck(Request $req)
    {
        $name = $req->input('text');
        $user = \DB::table('users')
        ->where('name', '=', $name)
        ->get();
        if(count($user) > 0) {
            return response()->json(true);
        }
        return response()->json(false);
        
    }


}
