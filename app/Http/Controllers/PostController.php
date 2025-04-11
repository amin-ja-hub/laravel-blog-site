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
     * Display a listing of all posts.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Display front-end posts.
     */
    public function frontIndex()
    {
        $posts = Post::where('publish', true)->latest()->paginate(25);
        $topItems = Post::orderBy('views', 'desc')->take(8)->get();
        $tags = Tag::all();
        $categories = Category::all();

    }

    /**
     * Display posts created by the authenticated user.
     */
    public function userIndex()
    {
        $posts = Auth::user()->posts()->paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the post creation form.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created post.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish'     => 'boolean',
            'category_id' => 'required|integer|exists:categories,id',
            'tags'        => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id();
        $data['published_at'] = $request->boolean('publish') ? now() : null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        DB::transaction(function () use ($data, $request) {
            $post = Post::create($data);

            if ($request->filled('tags')) {
                $tagIds = collect(explode(',', $request->tags))
                    ->map(fn($tag) => Str::lower(trim($tag)))
                    ->map(fn($tag) => Tag::firstOrCreate(['name' => $tag])->id)
                    ->toArray();
                    
                $post->tags()->sync($tagIds);
            }
        });

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display a single post.
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = $post->tags->pluck('name')->toArray();
        $comments = $post->comments()->latest()->get();
        $relatedPosts = $post->category->posts()
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(4)
            ->get();

        return view('post.show', compact('post', 'categories', 'tags', 'comments', 'relatedPosts'));
    }

    /**
     * Show the post edit form.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $selectedTags = $post->tags->pluck('name')->implode(', ');

        return view('post.edit', compact('post', 'categories', 'selectedTags'));
    }

    /**
     * Update an existing post.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish'     => 'boolean',
            'category_id' => 'required|integer|exists:categories,id',
            'tags'        => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $data['published_at'] = $request->boolean('publish') ? now() : null;

        DB::transaction(function () use ($post, $data, $request) {
            $post->update($data);

            if ($request->filled('tags')) {
                $tagIds = collect(explode(',', $request->tags))
                    ->map(fn($tag) => Str::lower(trim($tag)))
                    ->map(fn($tag) => Tag::firstOrCreate(['name' => $tag])->id)
                    ->toArray();

                $post->tags()->sync($tagIds);
            }
        });

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Delete a post.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    /**
     * Display posts by category.
     */
    public function searchByCategoryOrTag(Request $request)
    {
        $filter = $request->query('filter'); // Get filter from query string
    
        if (!$filter) {
            return redirect()->route('posts.front.index')->with('error', 'Search term missing!');
        }
    
        // Search category, tag, or posts by title
        $category = Category::where('name', $filter)->first();
        $tag = Tag::where('name', $filter)->first();
    
        if ($category) {
            $posts = $category->posts()->latest()->paginate(10);
        } elseif ($tag) {
            $posts = $tag->posts()->latest()->paginate(10);
        } else {
            $posts = Post::where('title', 'LIKE', "%$filter%")->latest()->paginate(10);
        }
    
        $topItems = Post::orderBy('views', 'desc')->take(8)->get();
        $tags = Tag::all();
        $categories = Category::all();
    
        return view('post.front-index', compact('posts', 'topItems', 'tags', 'categories'));
    }
    
    
}
