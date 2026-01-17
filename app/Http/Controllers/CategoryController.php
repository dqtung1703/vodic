<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::active()
            ->withCount(['posts' => function ($query) {
                $query->where('status', 'published');
            }])
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $posts = Post::published()
            ->where('category_id', $category->id)
            ->with(['user'])
            ->latest()
            ->paginate(12);

        return view('categories.show', compact('category', 'posts'));
    }
}
