<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreatePosterRequest;
use App\Like;
use App\Poster;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    public function create()
    {
        if (!Auth::user())
        {
            return back();
        }

        $user = Auth::user();
        $last_poster = $user->posters()->orderBy('created_at','desc')->first();

        $date = Carbon::now()->subHour(5);

        if (!is_null($last_poster)) {
            if ($last_poster->created_at > $date) {
                return view('users.posteri.create_limit', compact('last_poster'));
            }
        }

        return view('users.posteri.create');
    }

    public function store(CreatePosterRequest $request,Poster $poster)
    {
        if (!Auth::user())
        {
            return back();
        }
        $user_id = Auth::user()->id;

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $poster->image = '/images/'.$name;
        $poster->title = $request->title;
        $poster->body = $request->body;
        $poster->slug = str_slug($request->body,'-');
        $poster->user_id = Auth::user()->id;

        $poster->save();

        $user = User::find($user_id);

        if(empty($user->role_id))
        {
           $user->role_id = 2;
           $user->save();
        }

        return back()->with('success','Vas Poster mora dobiti odobrenje od moderatora!');

    }

    public function trending()
    {
        $posters = Poster::where('approved','1')->with('likes')->orderBy('created_at','desc')->get();
        if (Auth::user())
        {
            $logged_user_id = Auth::user()->id;
        }


        $like = Like::all();

        return view('users.posteri.trending',compact('posters','logged_user_id','like'));
    }

    public function fresh()
    {
        $posters = Poster::where('approved','1')->with('likes')->orderBy('created_at','desc')->paginate(5);

        if (Auth::user()) {
            $logged_user_id = Auth::user()->id;
        }

        $like = Like::all();

        return view('users.posteri.fresh',compact('like','logged_user_id','posters'));
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

    public function show(Request $request)
    {

        $poster = Poster::find($request->id);
        $creator = User::find($poster->user_id);
        $comments = Comment::where([['post_id','=',$poster->id],['comm_type','=','App\Poster']])->get();
        $users = User::all();
        $like_count = Like::where('likeable_id',$poster->id);


        return view('users.posteri.single',compact(
   'poster',
         'creator',
            'comments',
            'users',
            'like_count'));
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
