<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('post.index',compact('posts'));
    }

    public function frontIndex()
    {
        $posts = Post::all();

        return view('post.index',compact('posts'));
    }

    public function userIndex()
    {
        $posts = Post::all();

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'string|max:255',
            'publish' => 'boolean',
            'category_id' => 'integer|exists:posts,id', 
        ]);
        $data['user_id'] = Auth::id();

        if ($data['publish'] == 1) { 
            $data['published_at'] = now(); 
        }

        Post::crate($data);
        
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $item = Post::findOrFail($post);
        return view('post.show' , compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string|max:255',
            'publish' => 'boolean',
            'category_id' => 'required|integer|exists:categories,id', 
        ]);
    
        if ($data['publish'] == 1) { 
            $data['published_at'] = now(); 
        }
    
        // Update the post
        $post->update($data);
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
