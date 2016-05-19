<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function view($id)
    {
        $uid = Auth::user()->id;
        $user_details = Auth::user()->where('id',$id)->get();

        $ideacount = count(DB::table('ideas')->where('user_id','=', $uid)->get());
        $commencount = count(DB::table('comments')->where('user_id','=', $uid)->get());
        $notification = DB::table('notifications')->where('status', 'like', 'pending')->get();


        if($uid == $id)
        {
            return view('profile.view', compact('user_details','ideacount','commencount','notification'));
        }

        return view('auth.login');

    }

    public function picture()
    {
        $user = User::find(Input::get('id'));
        $image = Input::file('profile_pic');
        $filename = time() . "-" . $image->getClientOriginalExtension();
        $path = public_path('prof_pic/' . $filename);
        Image::make($image->getRealPath())->resize(300,300)->save($path);

        $user->prof_pic = 'prof_pic/' . $filename;

        $user->save();

        alert()->success('You have Successfully added a profile picture', 'Profile picture Added')->persistent("Ok");
        return Redirect::back();


    }

    public function update($id, Request $request)
    {
        $user = User::FindOrFail($id);
        $user->update($request->all());
        return back();
    }

    public function password($id)
    {
        return view('profile.setting');
    }

    public function setting($id, Request $request)
    {
        $password = DB::table('users')->where('id','=',$id)->get();

        $user = User::FindOrFail($id);

        $cp = $request->cp;
        $np = $request->np;
        $cnp = $request->cnp;

        return $cp;

        if($cp==$password)
        {
            if($np == $cnp)
            {
                $user->password = $np;
                alert()->success('You have Successfully added a profile picture', 'Profile picture Added')->persistent("Ok");
                return view('profile.view');
            }
            else
            {

            }

        }



        return view('profile.setting');
    }


}
