<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of posts (public news page)
     */
    public function index(Request $request)
    {
        $query = Post::with(['category', 'user', 'images'])
            ->published();

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
            });
        }

        $posts = $query->latest()->paginate(12);
        $categories = Category::active()->withCount('posts')->get();

        return view('news.index', compact('posts', 'categories'));
    }

    /**
     * Display the specified post
     */
    public function show($slug)
    {
        $post = Post::with(['category', 'user', 'images'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment views
        $post->incrementViews();

        // Get related posts
        $relatedPosts = Post::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        // Get popular posts (most viewed)
        $popularPosts = Post::with(['category', 'images'])
            ->published()
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return view('news.show', compact('post', 'relatedPosts', 'popularPosts'));
    }
}
