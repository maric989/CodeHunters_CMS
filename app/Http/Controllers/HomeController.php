<?php

namespace App\Http\Controllers;

use App\Like;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Definition;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
   //     $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $posters = Poster::with('likes')->orderBy('created_at','desc')->get();
        if (Auth::user())
        {
            $logged_user_id = Auth::user()->id;
        }


        $like = Like::all();

        return view('users.posteri.index',compact('posters','like','logged_user_id'));
    }

    public function adminPanel()
    {
        $user = Auth::user();
        $users_count = User::count();
        $definicije_count = Definition::count();
        $posters_count = Poster::count();

        return view('admin.homepage.index',compact('user','definicije_count',
            'users_count','posters_count'));

    }
}
