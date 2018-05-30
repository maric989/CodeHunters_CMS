<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use foo\bar;
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

    public function uploadImage(Request $request)
    {
        if (Auth::user()->slug !== $request->slug)
        {
            return back();
        }

        return view('users.autori.uploadImage');
    }

    public function storeImage(Request $request)
    {

        $user = User::find(Auth::user()->id);


        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/user');
        $image->move($destinationPath, $name);

        $user->profile_photo = '/images/user/'.$name;

        $user->save();

        return back();
    }

    public function userPosters(Request $request)
    {
        $user = User::where('slug',$request->slug)->first();
        $posters = $user->posters->sortByDesc('created_at');

        return view('users.autori.userPosters',compact('user','posters'));
    }
}
