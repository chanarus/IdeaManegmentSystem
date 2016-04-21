<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Idea;
use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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

        $i = new Idea();
        return $i->user_id;

        $notification->save();

        return back();
    }
}
