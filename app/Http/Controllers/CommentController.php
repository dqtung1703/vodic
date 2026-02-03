<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|min:1|max:1000',
        ], [
            'content.required' => 'Vui lòng nhập nội dung bình luận.',
            'content.min' => 'Bình luận phải có ít nhất 1 ký tự.',
            'content.max' => 'Bình luận không được vượt quá 1000 ký tự.',
        ]);

        $comment = $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được thêm thành công!');
    }

    /**
     * Remove the specified comment.
     */
    public function destroy(Comment $comment)
    {
        // Only admin or comment owner can delete
        if (!Auth::user()->isAdmin() && Auth::id() !== $comment->user_id) {
            abort(403, 'Bạn không có quyền xóa bình luận này.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Bình luận đã được xóa thành công!');
    }
}
