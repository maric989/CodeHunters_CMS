<?php

namespace App\Http\Controllers;

use App\Definition;
use App\User;
use Illuminate\Http\Request;

class DefinitionController extends Controller
{
    public function index(User $user,Definition $definition)
    {
        $definition = Definition::all();
        return view('users.definicije.index');
    }
}
