<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())
            ->with(['category', 'images'])
            ->latest()
            ->paginate(10);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        return view('user.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:posts,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // User posts default to draft
        $validated['status'] = 'draft';
        $validated['user_id'] = auth()->id();

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post = Post::create($validated);

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                $post->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('user.posts.index')
            ->with('success', 'Bài viết đã được tạo và đang chờ duyệt!');
    }

    public function edit(Post $post)
    {
        // Check ownership
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Bạn không có quyền chỉnh sửa bài viết này.');
        }

        // User can only edit draft posts
        if ($post->status !== 'draft') {
            return redirect()->route('user.posts.index')
                ->with('error', 'Bạn chỉ có thể chỉnh sửa bài viết ở trạng thái nháp.');
        }

        $categories = Category::active()->get();
        return view('user.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        // Check ownership
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Bạn không có quyền chỉnh sửa bài viết này.');
        }

        // User can only edit draft posts
        if ($post->status !== 'draft') {
            return redirect()->route('user.posts.index')
                ->with('error', 'Bạn chỉ có thể chỉnh sửa bài viết ở trạng thái nháp.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:posts,slug,' . $post->id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'remove_featured_image' => 'nullable|boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Remove featured image if requested
        if ($request->remove_featured_image && $post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
            $validated['featured_image'] = null;
        }

        // Handle new featured image
        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        $post->update($validated);

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                $post->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('user.posts.index')
            ->with('success', 'Bài viết đã được cập nhật!');
    }

    public function destroy(Post $post)
    {
        // Check ownership
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Bạn không có quyền xóa bài viết này.');
        }

        // User can only delete draft posts
        if ($post->status !== 'draft') {
            return redirect()->route('user.posts.index')
                ->with('error', 'Bạn chỉ có thể xóa bài viết ở trạng thái nháp.');
        }

        // Delete images
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $post->delete();

        return redirect()->route('user.posts.index')
            ->with('success', 'Bài viết đã được xóa!');
    }
}
