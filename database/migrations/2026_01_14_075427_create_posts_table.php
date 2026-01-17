<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Thêm indexes cho bảng posts
        Schema::table('posts', function (Blueprint $table) {
            $table->index('slug');
            $table->index('status');
            $table->index('published_at');
            $table->index('category_id');
            $table->index('user_id');
            $table->index(['status', 'published_at']); // Composite index
        });

        // Thêm indexes cho bảng categories
        Schema::table('categories', function (Blueprint $table) {
            $table->index('slug');
            $table->index('is_active');
        });

        // Thêm indexes cho bảng post_images
        Schema::table('post_images', function (Blueprint $table) {
            $table->index('post_id');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['status']);
            $table->dropIndex(['published_at']);
            $table->dropIndex(['category_id']);
            $table->dropIndex(['user_id']);
            $table->dropIndex(['status', 'published_at']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['is_active']);
        });

        Schema::table('post_images', function (Blueprint $table) {
            $table->dropIndex(['post_id']);
            $table->dropIndex(['order']);
        });
    }
};
