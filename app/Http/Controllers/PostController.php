<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'mimetypes:video/avi,video/mpeg,video/mp4|max:10240',
        ]);

        $post = new Post;
        $post->user_id = Auth::id();
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        if ($request->hasFile('video')) {
            $post->video_path = $request->file('video')->store('videos', 'public');
        }

        $post->save();

        return redirect()->route('home');
    }
}

