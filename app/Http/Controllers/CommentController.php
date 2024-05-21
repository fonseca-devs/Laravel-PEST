<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{



    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required',
        ]);
        $post = Post::with('comments')->find(1);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->body = 'teste';
        $comment->user_id = '1';

        $post->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
