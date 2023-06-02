<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        // return response()->json(["data" => $users]);
        // return UserResource::collection($users);
        return new UserCollection($users);
    }
}
