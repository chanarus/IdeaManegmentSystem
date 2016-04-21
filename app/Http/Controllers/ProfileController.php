<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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

        if($uid == $id)
        {
            return view('profile.view', compact('user_details'));
        }

        return view('auth.login');

    }


    public function update($id, Request $request)
    {
        $user = User::FindOrFail($id);
        $user->update($request->all());
        return back();
    }
}
