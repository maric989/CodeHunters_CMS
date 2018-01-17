<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminDefinitionApproveRequest;
use App\Http\Requests\AdminDefinitionUnapproveRequest;
use Illuminate\Http\Request;
use App\Definition;
use App\User;

class AdminDefinitionController extends Controller
{
    public function index(Definition $definition)
    {
        $definitions = $definition->all();
        $users = User::all();
        return view('admin.definitions.index',compact('definitions','users'));
    }

    public function showApproved(Definition $definition)
    {
        $definitions = $definition->where('approved','=','1')->get();
        $users = User::all();

        return view('admin.definitions.approved',compact('definitions','users'));
    }

    public function showUnapproved(Definition $definition)
    {
        $definitions = $definition->where('approved','=','0')->get();
        $users = User::all();

        return view('admin.definitions.disapproval',compact('definitions','users'));
    }

    public function approve(AdminDefinitionApproveRequest $request)
    {
        $definition = Definition::find($request->id);

        $definition->approved = 1;

        $definition->save();

        return back();
    }

    public function disapproval(AdminDefinitionUnapproveRequest $request)
    {
        $definition = Definition::find($request->id);

        $definition->approved = 0;

        $definition->save();

        return back();
    }

    public function showDefinition(Request $request)
    {
        $definition = Definition::find($request->id);

        return view('admin.definitions.single',compact('definition'));
    }
}
