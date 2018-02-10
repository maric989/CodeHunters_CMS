<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::where('role_id','2')->get();
        $definitions = Definition::all();
        $poster = Poster::all();

        return view('users.autori.index',compact('authors','definitions','poster'));
    }

    public function profile(Request $request)
    {
       $user = User::where('slug','=',$request->slug)->first();

        return view('users.autori.user',compact('user'));
    }

    public function settings(Request $request)
    {

        if (Auth::user()->slug != $request->slug)
        {
            return back();
        }

        $user = User::find(Auth::user()->id);

        return view('users.autori.settings',compact('user'));


    }
}
