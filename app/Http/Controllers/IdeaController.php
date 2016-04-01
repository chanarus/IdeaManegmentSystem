<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use App\Idea;



use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;


class IdeaController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * View all Ideas created by the user
     *
     * return all Ideas
     */
    public function index()
    {
        $uid = Auth::user()->id;
        $ideas = DB::table('ideas')->where('user_id','=', '' . $uid. '')->latest('updated_at')->get();

        return view('idea.index', compact('ideas'));
    }


    /**
     * View wanted Idea
     *
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $idea = Idea::FindOrFail($id);

        $idea->load('user');

        $comments = Idea::find($id);

        $comments->load('comments.user');

        return view('idea.show', compact('idea','comments'));
    }


    /**
     * Create a new Idea
     *
     * return response
     */
    public function create()
    {
        return view('idea.create');
    }


    /**
     * Save a new Idea
     *
     * param CreateIdeaRequest $request
     * return response
     */
    public function store(IdeaRequest $request)
    {
        $idea = new Idea();
        $idea->title = $request->title;
        $idea->category = $request->category;
        $idea->ratings = 0;
        $idea->body = $request->body;
        $idea->likes = 0;
        $idea->user_id = Auth::user()->id;
        $idea->dislikes = 0;

        $idea->save();
        return redirect('ideas');
    }



    /**
     * Edit an existing idea
     *
     * param $id
     * return View
     */
    public function edit($id)
    {
        $uid = Auth::user()->id;
        $idea = Idea::FindOrFail($id);

        if($uid == $idea->user_id)
        {
            return view('idea.edit', compact('idea'));
        }
        else
        {
            Session::flash('flash_message','You dont have permision to edit this Idea!');
            return back();
        }


    }

    /**
     * Update an existing idea
     *
     * param $id
     * param IdeaRequest $request
     * return view
     */
    public function update($id, IdeaRequest $request)
    {
        $idea = Idea::FindOrFail($id);
        $idea->update($request->all());
        return redirect('ideas');
    }

    /**
     * Delete an existing idea
     *
     * param $id
     * return view
     */
    public function delete($id)
    {
        $uid = Auth::user()->id;
        $idea = Idea::find($id);
        if($uid == $idea->user_id)
        {
            $idea->delete();
            return redirect('ideas');
        }
        else
        {
            Session::flash('flash_message','You dont have permision to delete this Idea!');
            return back();
        }


    }


}
