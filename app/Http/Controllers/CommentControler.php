<?php

namespace App\Http\Controllers;

use App\Comment;
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
        return back();
    }
}
