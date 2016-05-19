<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Idea;
use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentControler extends Controller
{
    public function create($id, Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->idea_id = $id;

        $comment->save();

        $notification = new Notification();
        $notification->idea_id = $id;
        $notification->user_id = 1;
        $notification->cmt_user_id = Auth::user()->id;
        $notification->status = "pending";


        $notification->save();

        return back();
    }

    public function show()
    {
        $uid = Auth::user()->id;
        $comments = DB::table('comments')->where('user_id','=', $uid)->get();
        $notification = DB::table('notifications')->where('status', 'like', 'pending')->get();
        return view('comment.view', compact('comments','notification'));
    }


    public function update($id, Request $request)
    {
        $cmnt = Comment::FindOrFail($id);
        alert()->success('update', 'update')->persistent('ok');
        $cmnt->update($request->all());
        return back();
    }

    public function delete($id)
    {
        $cmnt = Comment::FindOrFail($id);
        alert()->message('delete', 'delete')->persistent('ok');
        $cmnt->delete();
        return back();
    }
}
