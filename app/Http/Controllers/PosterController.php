<?php

namespace App\Http\Controllers;

use App\Like;
use App\Poster;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    public function create()
    {


        return view('users.posteri.create');
    }

    public function store(Request $request,Poster $poster)
    {

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $poster->image = '/images/'.$name;
        $poster->title = 'ssss';
        $poster->body = 'aa';
        $poster->user_id = Auth::user()->id;

        $poster->save();


        return back()->with('success','Image Upload successfully');

    }

    public function trending()
    {
        return view('users.posteri.trending');
    }

    public function fresh()
    {
        return view('users.posteri.fresh');
    }

    public function upvote(Request $request,Like $like)
    {
        $user_id = Auth::user()->id;
        $poster = Poster::find($request->post_id);

        if ($poster->likes()->where('user_id',$user_id)->count()){
            $poster->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
            $like->user_id = $user_id;
            $like->up = 1;
            $like->down = 0;
            $poster->likes()->save($like);

            $liked = true;
        }

        return back();
    }

    public function downvote(Request $request,Like $like)
    {
        $user_id = Auth::user()->id;
        $poster = Poster::find($request->post_id);

        if ($poster->likes()->where('user_id',$user_id)->count()){
            $poster->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
            $like->user_id = $user_id;
            $like->up = 0;
            $like->down = 1;
            $poster->likes()->save($like);

            $liked = true;
        }

        return back();
    }

}
