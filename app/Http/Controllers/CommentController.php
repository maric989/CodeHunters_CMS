<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Definition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function store(Request $request,Comment $comment)
    {
        $user = Auth::user();
        $comment->post_id = $request->post_id;
        $comment->user_id = $user->id;
        $comment->body = $request->komentar;
        $comment->comm_type = 'App\Definition';

        $comment->save();

        return back();
    }

    public function posterComm(Request $request,Comment $comment)
    {
        $user = Auth::user();
        $comment->post_id = $request->post_id;
        $comment->user_id = $user->id;
        $comment->body = $request->komentar;
        $comment->comm_type = 'App\Poster';

        $comment->save();

        return back();
    }
}
