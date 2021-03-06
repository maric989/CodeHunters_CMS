<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Definition;
use App\Http\Requests\CreateDefinitionRequest;
use App\Like;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DefinitionController extends Controller
{
    public function index(User $user,Definition $definition)
    {
        $definitions = Definition::where('approved','1')->orderBy('created_at','desc')->get();
        $definition = $definitions->pluck('id');
        if (Auth::user()) {
            $logged_user_id = Auth::user()->id;
        }
        $users = User::all();

        $like = Like::all();

        foreach ($definitions as $def){
            $upvote = $like->where('likeable_id',$def->id)->pluck('up')->sum();
            $downvote = $like->where('likeable_id',$def->id)->pluck('down')->sum();
            $sum = $upvote-$downvote;
        }


        return view('users.definicije.index',compact('definitions','users','like','sum','logged_user_id'));
    }

    public function create()
    {
        if (!Auth::user())
        {
            return back();
        }

        $user = Auth::user();
        $last_definition = $user->definition()->orderBy('created_at','desc')->first();

        $date = Carbon::now()->subHour(5);

        if (!is_null($last_definition)) {
            if ($last_definition->created_at > $date) {
                return view('users.definicije.create_limit', compact('last_definition'));
            }
        }

        return view('users.definicije.create',compact('user'));
    }

    public function store(CreateDefinitionRequest $request,Definition $definition)
    {
        if (!Auth::user())
        {
            return back();
        }

        $user_id = Auth::user()->id;

        $definition->title = $request->title;
        $definition->body  = $request->definicija;
        $definition->example = $request->primer;
        $definition->user_id = $user_id;
        $definition->slug = str_slug($request->title,'-');

        $definition->save();

        $user = User::find($user_id);

        if (empty($user->role_id))
        {
            $user->role_id = 2;
            $user->save();
        }

        return redirect('/definicije');
    }

    public function show(Request $request)
    {
        $definition = Definition::find($request->id);
        $def_creator = User::find($definition->user_id);
        $comments = Comment::where([
            ['post_id',$definition->id],
            ['comm_type','App\Definition']
        ])->get();
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

        $users = User::all();
        $hotdefs = Definition::where('approved','1')->with('likes')->orderBy('created_at','desc')->get();
        if (Auth::user()) {
            $logged_user_id = Auth::user()->id;
        }

        $like = Like::all();


        return view('users.definicije.hot',compact('hotdefs','users','like','logged_user_id'));
    }

    public function trending(Definition $definitions)
    {

        $users = User::all();
        $trending_defs = Definition::where('approved','1')->with('likes')->orderBy('created_at','desc')->get();
        if (Auth::user()) {
            $logged_user_id = Auth::user()->id;
        }


        $like = Like::all();

        return view('users.definicije.trending',compact('trending_defs','users','like','logged_user_id'));
    }

    public function fresh()
    {
        $users = User::all();
        $fresh_defs = Definition::where('approved','1')->with('likes')->orderBy('created_at','desc')->get();
        if (Auth::user()) {
            $logged_user_id = Auth::user()->id;
        }

        $like = Like::all();

        return view('users.definicije.fresh',compact('fresh_defs','users','like','logged_user_id'));
    }

}
