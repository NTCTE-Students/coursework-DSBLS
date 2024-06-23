<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
            // Другие правила валидации
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id; // Устанавливаем связь с постом
        $comment->content = $request->input('content');
        // Другие поля комментария, если они есть

        $comment->save();

        return redirect()->back()->with('success', 'Комментарий успешно добавлен.');
    }
}
