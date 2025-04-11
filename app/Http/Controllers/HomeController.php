<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $randomPosts = Post::where('publish', 1)->inRandomOrder()->limit(3)->get();
        $latestPosts = Post::latest()->limit(3)->get();
        $topItems = Post::orderBy('views', 'desc')->take(10)->get();
        $worstItems = Post::orderBy('views', 'asc')->take(3)->get();
        $firstSection = $topItems->slice(0, 3);
        $secondSection = $topItems->slice(3, 4);        

        return view('home',compact('categories','randomPosts','latestPosts','firstSection','secondSection','worstItems'));
    }
}
