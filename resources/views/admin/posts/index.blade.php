@extends('admin.admin')

@section('title', 'Quản lý Bài viết')
@section('page-title', 'Quản lý Bài viết')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2 class="card-title">Danh sách Bài viết</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn-admin btn-primary-admin">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Thêm bài viết mới
        </a>
    </div>

    <div style="padding: 1.5rem 2rem;">
        <!-- Filters -->
        <form method="GET" class="filters-container">
            <select name="category_id" class="filter-select" onchange="this.form.submit()">
                <option value="">Tất cả danh mục</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <select name="status" class="filter-select" onchange="this.form.submit()">
                <option value="">Tất cả trạng thái</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Bản nháp</option>
            </select>
        </form>
    </div>

    <div style="overflow-x: auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Lượt xem</th>
                    <th>Trạng thái</th>
                    <th>Ngày đăng</th>
                    <th style="text-align: center;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>
                        <div class="post-info">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                     alt="{{ $post->title }}" 
                                     class="post-thumbnail">
                            @endif
                            <div class="post-details">
                                <h3>{{ $post->title }}</h3>
                                <p class="post-excerpt">{{ Str::limit($post->excerpt, 80) }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span style="font-weight: 600; color: #0066cc;">{{ $post->category->name }}</span>
                    </td>
                    <td>
                        <span style="font-weight: 600;">{{ number_format($post->views) }}</span>
                    </td>
                    <td>
                        @if($post->published_at && $post->published_at <= now())
                            <span class="status-badge status-published">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                Đã xuất bản
                            </span>
                        @else
                            <span class="status-badge status-draft">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <circle cx="12" cy="12" r="10"/>
                                </svg>
                                Bản nháp
                            </span>
                        @endif
                    </td>
                    <td style="color: #64748b;">
                        {{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : 'Chưa đăng' }}
                    </td>
                    <td>
                        <div class="action-buttons" style="justify-content: center;">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="action-btn action-edit">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                                Sửa
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn action-delete">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                    </svg>
                                    Xóa
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3>Chưa có bài viết nào</h3>
                            <p>Bắt đầu bằng cách tạo bài viết đầu tiên của bạn</p>
                            <a href="{{ route('admin.posts.create') }}" class="btn-admin btn-primary-admin">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                Tạo bài viết đầu tiên
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
    <div style="padding: 1.5rem 2rem; border-top: 1px solid #e2e8f0;">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
