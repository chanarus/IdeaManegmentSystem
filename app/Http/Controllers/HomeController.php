<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $ideas = Idea::orderBy('category')->latest('updated_at')->get();

        return view('home', compact('ideas'));
    }
}
