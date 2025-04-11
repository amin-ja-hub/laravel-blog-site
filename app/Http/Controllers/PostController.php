<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('post.index',compact('posts'));
    }

    public function frontIndex()
    {
        $posts = Post::where('publish', '1')->latest()->paginate(25);
        $topItems = Post::orderBy('views', 'desc')->take(8)->get();
        $tags = Tag::all();
        $categories = Category::all();

        return view('post.front-index',compact('posts','categories','topItems','tags'));
    }

    public function userIndex()
    {
        $posts = Auth::user()->posts()->paginate(5); // 5 posts per page

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish'     => 'boolean',
            'category_id' => 'required|integer|exists:categories,id',
            'tags'        => 'nullable|string', // Allow users to enter tags
        ]);
    
        $data = array_map('trim', $data); // Clean up inputs
        $data['user_id'] = Auth::id();
        $data['published_at'] = $request->boolean('publish') ? now() : null;
    
        // Handle Image Upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
    
        // Database Transaction: Ensures everything saves or nothing
        DB::transaction(function () use ($data, $request) {
            $post = Post::create($data);
    
            // Process Tags: Allow users to add new tags
            if ($request->filled('tags')) {
                $tagNames = explode(',', $request->tags); // Split tags by commas
                $tagIds = [];
    
                foreach ($tagNames as $tagName) {
                    $tagName = Str::lower(trim($tagName)); // Normalize names
                    $tag = Tag::firstOrCreate(['name' => $tagName]); // Create or find
                    $tagIds[] = $tag->id;
                }
    
                $post->tags()->sync($tagIds); // Attach tags
            }
        });
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        $item = Post::findOrFail($post);
        return view('post.show' , compact('item','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
    
        // Retrieve existing tags as a comma-separated string
        $selectedTags = $post->tags->pluck('name')->implode(', ');
        return view('post.edit' , compact('post', 'categories', 'selectedTags'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish'     => 'boolean',
            'category_id' => 'required|integer|exists:categories,id',
            'tags'        => 'nullable|string', // Allows users to add/modify tags
        ]);
    
        // Process image upload (if updated)
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
    
        // Handle publish date
        $data['published_at'] = $request->boolean('publish') ? now() : null;
    
        DB::transaction(function () use ($post, $data, $request) {
            $post->update($data);
    
            // Process Tags
            if ($request->filled('tags')) {
                $tagNames = explode(',', $request->tags);
                $tagIds = [];
    
                foreach ($tagNames as $tagName) {
                    $tagName = Str::lower(trim($tagName)); // Normalize & clean
                    $tag = Tag::firstOrCreate(['name' => $tagName]); // Create or find
                    $tagIds[] = $tag->id;
                }
    
                $post->tags()->sync($tagIds); // Sync tags efficiently
            }
        });
    
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
