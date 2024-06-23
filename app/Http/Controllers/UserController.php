<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->get();
        return view('users.show', compact('user', 'posts'));
    }

}
