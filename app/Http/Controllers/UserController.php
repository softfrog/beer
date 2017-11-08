<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	//add a new user
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }
}
