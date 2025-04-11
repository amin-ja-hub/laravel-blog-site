<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        
        return view('comment.index' ,compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);
    
        Comment::create([
            'body' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'publish' => true,
            'published_at' => now(),

        ]);
    
        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
