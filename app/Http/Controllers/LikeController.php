<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function addlike($id)
    {
        DB::table('ideas')->where('id','=', '' . $id. '')->increment('likes');
        return back();

    }

    /*public function adddislike($id)
    {
        DB::table('ideas')->where('id','=', '' . $id. '')->increment('dislikes');
        return back();

    }*/


}
