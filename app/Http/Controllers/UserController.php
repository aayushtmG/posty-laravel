<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user){
        $posts = $user->posts;

        return view('user.posts.index',[
            'posts'=> $posts,
            'user'=> $user

        ]);
    }

}

