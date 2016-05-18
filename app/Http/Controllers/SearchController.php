<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('idea.search');
    }

    public function index()
    {

        $count = 0;
        $results = NULL;

        return view('search.results', compact('count', 'results'));
    }

    public function search(Request $request)
    {
        $sort = $request->input('sort');
        $cat = $request->input('cat');
        $keyword = $request->input('keyword');


        if ($keyword != '') {

            if ($sort == 'Date' || $sort == null) {
                $sort = 'created_at';
            } elseif ($sort == 'Rating') {
                $sort = 'ratings';
            }


            $results = DB::table('ideas')->where([
                ['title', 'like', '%' . $keyword . '%'],
                ['category', 'like', '%' . $cat . '%']
            ])->orderBy('' . $sort . '')->get();
            $count = count(DB::table('ideas')->where([
                ['title', 'like', '%' . $keyword . '%'],
                ['category', 'like', '%' . $cat . '%']
            ])->orderBy('' . $sort . '')->get());

            return view('idea.result', compact('results', 'count'));
        } else {
            if ($sort == 'Date' || $sort == null) {
                $sort = 'created_at';
            } elseif ($sort == 'Rating') {
                $sort = 'ratings';
            }
            $results = DB::table('ideas')->where('category', 'like', '%' . $cat . '%')->orderBy('' . $sort . '')->get();
            $count = count(DB::table('ideas')->where('category', 'like', '%' . $cat . '%')->orderBy('' . $sort . '')->get());
            return compact('results', 'count');
        }
    }

    public function executeSearch(Request $request)
    {
        $keywords = $request->input('keywords'); //Input::get('keywords');

        return $results = DB::table('ideas')->where('title', 'like', '%' . $keywords . '%')->get();
    }


}
