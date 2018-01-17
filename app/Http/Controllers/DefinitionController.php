<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Definition;
use App\Like;
use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DefinitionController extends Controller
{
    public function index(User $user,Definition $definition)
    {
        $definitions = Definition::where('approved','1')->orderBy('created_at','desc')->get();
        $definition = $definitions->pluck('id');

        $users = User::all();

        $like = Like::all();

        foreach ($definitions as $def){
            $upvote = $like->where('likeable_id',$def->id)->pluck('up')->sum();
            $downvote = $like->where('likeable_id',$def->id)->pluck('down')->sum();
            $sum = $upvote-$downvote;
        }


        return view('users.definicije.index',compact('definitions','users','like','sum'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('users.definicije.create',compact('user'));
    }

    public function store(Request $request,Definition $definition)
    {
        $user = Auth::user();

        $definition->title = $request->title;
        $definition->body  = $request->definicija;
        $definition->example = $request->primer;
        $definition->user_id = $user->id;

        $definition->save();

        return redirect('/definicije');
    }

    public function show(Request $request)
    {
        $definition = Definition::find($request->id);
        $def_creator = User::find($definition->user_id);
        $comments = Comment::where('post_id',$definition->id)->get();
        $users = User::all();
        $like_count = Like::where('likeable_id',$definition->id);

        return view('users.definicije.single',compact(
            'definition',
            'def_creator',
            'comments',
            'users',
            'like_count'
        ));
    }

    public function upvote(Request $request,Like $like)
    {
        $user_id = Auth::user()->id;
        $definition = Definition::find($request->post_id);

        if ($definition->likes()->where('user_id',$user_id)->count()){
            $definition->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
            $like->user_id = $user_id;
            $like->up = 1;
            $like->down = 0;
            $definition->likes()->save($like);

            $liked = true;
        }

        return back();
    }

    public function downvote(Request $request,Like $like)
    {
        $user_id = Auth::user()->id;
        $definition = Definition::find($request->post_id);

        if ($definition->likes()->where('user_id',$user_id)->count()){
            $definition->likes()->where('user_id',$user_id)->delete();

            $liked = false;
        }else{
            $like->user_id = $user_id;
            $like->up = 0;
            $like->down = 1;
            $definition->likes()->save($like);

            $liked = true;
        }

        return back();
    }

    public function hot(Definition $definitions)
    {

        $hots = Like::select(\DB::raw('SUM(up) as count,likeable_id'))
            ->groupBy('likeable_id')
            ->get();

        foreach ($hots as $hot)
        {
            if($hot->count >= 2 )
            {
                $hotdefs = $definitions->where('id',$hot->likeable_id)->orderBy('created_at','desc')->get();
            }
        }
        $users = User::all();
        $like = Like::all();

        return view('users.definicije.hot',compact('hotdefs','users','like'));
    }

}
