<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPosterApproveRequest;
use App\Http\Requests\AdminPosterRejectRequest;
use App\Poster;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminPosterController extends Controller
{
    public function index()
    {
        $posters = Poster::paginate(1);
        $users = User::all();

        return view('admin.posters.index',compact('posters','users'));
    }

    public function showApproved()
    {
        $posters = Poster::where('approved','1')->get();
        $users = User::all();

        return view('admin.posters.approved',compact('posters','users'));

    }

    public function showRejected()
    {
        $posters = Poster::where('approved','0')->get();
        $users = User::all();

        return view('admin.posters.waiting',compact('posters','users'));

    }

    public function approve(AdminPosterApproveRequest $request)
    {
        $poster = Poster::find($request->id);

        $poster->approved = 1;

        $poster->save();

        return back();
    }

    public function reject(AdminPosterRejectRequest $request)
    {
        $poster = Poster::find($request->id);

        $poster->delete();

        return back();
    }
}
