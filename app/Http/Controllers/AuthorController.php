<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Poster;
use App\User;
use Illuminate\Http\Request;

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
        $user = User::find($request->id);

        return view('users.autori.user',compact('user'));
    }
}
