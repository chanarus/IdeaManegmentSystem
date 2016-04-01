<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
      $ideas = Idea::latest('created_at')->get();
      return view('home', compact('ideas'));
    }
}