<?php

namespace App\Http\Controllers;

use App\Comment;
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

        $comment->save();

        return back();
    }
}
