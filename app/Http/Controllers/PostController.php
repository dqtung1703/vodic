<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::with(['category', 'user', 'images']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
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

        $posts = $query->latest()->paginate(15);
        $categories = Category::active()->get();

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:posts,slug',
                'excerpt' => 'nullable|string|max:500',
                'content' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ], [
                'title.required' => 'Tiêu đề bài viết là bắt buộc',
                'content.required' => 'Nội dung bài viết là bắt buộc',
                'category_id.required' => 'Vui lòng chọn danh mục',
                'category_id.exists' => 'Danh mục không tồn tại',
                'status.required' => 'Vui lòng chọn trạng thái',
                'featured_image.image' => 'File phải là hình ảnh',
                'featured_image.max' => 'Kích thước ảnh không được vượt quá 2MB',
            ]);

            // Auto-generate slug if empty
            if (empty($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            // Set user_id
            $validated['user_id'] = auth()->id();

            // Upload featured image
            if ($request->hasFile('featured_image')) {
                $validated['featured_image'] = $request->file('featured_image')
                    ->store('posts/featured', 'public');
            }

            // Auto set published_at if status is published and no date set
            if ($validated['status'] === 'published' && empty($validated['published_at'])) {
                $validated['published_at'] = now();
            }

            // Create post
            $post = Post::create($validated);

            // Upload gallery images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('posts/gallery', 'public');
                    
                    PostImage::create([
                        'post_id' => $post->id,
                        'image_path' => $path,
                        'order' => $index,
                    ]);
                }
            }

            return redirect()->route('admin.posts.index')
                ->with('success', '✅ Bài viết đã được tạo thành công!');
                
        } catch (\Exception $e) {
            Log::error('Error creating post: ' . $e->getMessage());
            return back()->withInput()
                ->with('error', '❌ Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load(['category', 'user', 'images']);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::active()->get();
        $post->load('images');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
                'excerpt' => 'nullable|string|max:500',
                'content' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'status' => 'required|in:draft,published,archived',
                'published_at' => 'nullable|date',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'remove_featured_image' => 'nullable|in:0,1',
            ], [
                'title.required' => 'Tiêu đề bài viết là bắt buộc',
                'content.required' => 'Nội dung bài viết là bắt buộc',
                'category_id.required' => 'Vui lòng chọn danh mục',
                'featured_image.image' => 'File phải là hình ảnh',
                'featured_image.max' => 'Kích thước ảnh không được vượt quá 2MB',
            ]);

            // Auto-generate slug if empty
            if (empty($validated['slug'])) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            // XỬ LÝ XÓA FEATURED IMAGE
            if ($request->input('remove_featured_image') == '1' && $post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
                $validated['featured_image'] = null;
            }

            // UPLOAD FEATURED IMAGE MỚI (nếu có)
            if ($request->hasFile('featured_image')) {
                // Xóa ảnh cũ nếu có
                if ($post->featured_image) {
                    Storage::disk('public')->delete($post->featured_image);
                }
                
                $validated['featured_image'] = $request->file('featured_image')
                    ->store('posts/featured', 'public');
            }

            // Auto set published_at nếu chuyển từ draft sang published
            if ($validated['status'] === 'published' && 
                $post->status !== 'published' && 
                empty($validated['published_at'])) {
                $validated['published_at'] = now();
            }

            // Update post
            $post->update($validated);

            // UPLOAD GALLERY IMAGES MỚI (không xóa ảnh cũ)
            if ($request->hasFile('images')) {
                $maxOrder = $post->images()->max('order') ?? -1;
                
                foreach ($request->file('images') as $index => $image) {
                    $path = $image->store('posts/gallery', 'public');
                    
                    PostImage::create([
                        'post_id' => $post->id,
                        'image_path' => $path,
                        'order' => $maxOrder + $index + 1,
                    ]);
                }
            }

            return redirect()->route('admin.posts.index')
                ->with('success', '✅ Bài viết đã được cập nhật thành công!');
                
        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage());
            return back()->withInput()
                ->with('error', '❌ Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            // Xóa featured image
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            // Xóa tất cả gallery images
            foreach ($post->images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }

            // Xóa post
            $post->delete();

            return redirect()->route('admin.posts.index')
                ->with('success', '✅ Bài viết đã được xóa thành công!');
                
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return back()->with('error', '❌ Có lỗi xảy ra khi xóa bài viết');
        }
    }

    /**
     * Delete a single image from post gallery (AJAX)
     */
    public function deleteImage(PostImage $image)
    {
        try {
            // Xóa file từ storage
            Storage::disk('public')->delete($image->image_path);
            
            // Xóa record từ database
            $image->delete();

            return response()->json([
                'success' => true,
                'message' => 'Đã xóa hình ảnh thành công'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error deleting image: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xóa hình ảnh'
            ], 500);
        }
    }
}