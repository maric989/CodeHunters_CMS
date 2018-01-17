<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('users.index');
    }

    public function adminPanel()
    {
        $user = Auth::user();
        $users_count = User::count();
        $definicije_count = Definition::count();


        return view('admin.homepage.index',compact('user','definicije_count',
            'users_count'));

    }
}
