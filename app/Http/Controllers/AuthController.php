<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getSignUp()
    {
        return view('auth.sign_up');
    }

    public function postSignUp(RegisterRequest $request)
    {
        User::create([
           'email' => $request->input('email'),
           'name'  => $request->input('name'),
           'password' => bcrypt($request->input('password')),
           'slug'   =>  str_slug($request->input('name'),'-')
        ]);

        return redirect('/login')->with('success','Tvoj nalog je kreiran');
    }

    public function getSignIn()
    {
        return view('auth.login');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request,[
           'email'  =>  'required',
           'password'  =>  'required'
        ]);

        if (!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
            return redirect()->back()->with('info','Ne mozete se prijaviti sa tim podacima');
        }

        return redirect()->route('home')->with('success','Uspesno ste se prijavili');
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('home')->with('info','Dovidjenja');
    }
}
