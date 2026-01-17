<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::active()
                ->withCount(['posts' => function ($query) {
                    $query->where('status', 'published');
                }])
                ->get();

            return view('categories.index', compact('categories'));
            
        } catch (\Exception $e) {
            Log::error('Error in CategoryController@index: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi tải danh mục');
        }
    }

    public function show($slug)
    {
        try {
            $category = Category::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();

            $posts = Post::published()
                ->where('category_id', $category->id)
                ->with(['user'])
                ->latest()
                ->paginate(12);

            return view('categories.show', compact('category', 'posts'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Danh mục không tồn tại');
        } catch (\Exception $e) {
            Log::error('Error in CategoryController@show: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi tải danh mục');
        }
    }
}
