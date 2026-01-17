<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'category' => 'nullable|string|max:255',
                'search' => 'nullable|string|max:255',
            ]);

            $query = Post::published()->with(['category', 'user']);

            if ($request->filled('category')) {
                $category = Category::where('slug', $request->category)->first();
                
                if (!$category) {
                    return redirect()->route('news.index')
                        ->with('error', 'Danh mục không tồn tại');
                }
                
                $query->where('category_id', $category->id);
            }

            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                      ->orWhere('content', 'like', '%' . $searchTerm . '%')
                      ->orWhere('excerpt', 'like', '%' . $searchTerm . '%');
                });
            }

            $posts = $query->latest()->paginate(12);
            $categories = Category::active()->get();

            return view('posts.index', compact('posts', 'categories'));
            
        } catch (\Exception $e) {
            Log::error('Error in PostController@index: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi tải danh sách bài viết');
        }
    }

    public function show($slug)
    {
        try {
            $post = Post::published()
                ->with(['category', 'user', 'images'])
                ->where('slug', $slug)
                ->firstOrFail();

            $post->incrementViews();

            $related_posts = Post::published()
                ->where('category_id', $post->category_id)
                ->where('id', '!=', $post->id)
                ->latest()
                ->take(3)
                ->get();

            return view('posts.show', compact('post', 'related_posts'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Bài viết không tồn tại');
        } catch (\Exception $e) {
            Log::error('Error in PostController@show: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi tải bài viết');
        }
    }
}
