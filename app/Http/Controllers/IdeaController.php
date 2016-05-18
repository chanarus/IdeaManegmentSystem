<?php

namespace App\Http\Controllers;


use App\Http\Requests\IdeaRequest;
use App\Idea;



use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Session;
use UxWeb\SweetAlert\SweetAlert;


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
        alert()->success('You have Successfully added an Idea', 'Idea Added')->persistent("Ok");
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
        alert()->success('You have Update the Idea', 'Idea Updated')->persistent("Ok");
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
        elseif($uid == '2')
        {
            $idea->delete();
            return redirect('home');
        }
        else
        {
            Session::flash('flash_message','You dont have permision to delete this Idea!');
            return back();
        }


    }

    /**
     * Insert images to the idea
     * @return mixed
     */
    public function picture()
    {
        $idea = Idea::find(Input::get('id'));
        $image1 = Input::file('idea_image1');
        $image2 = Input::file('idea_image2');
        $image3 = Input::file('idea_image3');
        $filename1 = time() . "-" . $image1->getClientOriginalExtension();
        $filename2 = time() . "-" . $image2->getClientOriginalExtension();
        $filename3 = time() . "-" . $image3->getClientOriginalExtension();
        $path1 = public_path('idea_image1/' . $filename1);
        $path2 = public_path('idea_image2/' . $filename2);
        $path3 = public_path('idea_image3/' . $filename3);
        Image::make($image1->getRealPath())->resize(300,300)->save($path1);
        Image::make($image2->getRealPath())->resize(300,300)->save($path2);
        Image::make($image3->getRealPath())->resize(300,300)->save($path3);

        $idea->idea_image1 = 'idea_image1/' . $filename1;
        $idea->idea_image2 = 'idea_image2/' . $filename2;
        $idea->idea_image3 = 'idea_image3/' . $filename3;

        $idea->save();

        alert()->success('You have Successfully added images to the Idea', 'Images Added')->persistent("Ok");
        return Redirect::back();
    }


}
