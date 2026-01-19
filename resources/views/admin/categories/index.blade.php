@extends('admin.admin')

@section('title', 'Quản lý Danh mục')
@section('page-title', 'Quản lý Danh mục')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2 class="card-title">Danh sách Danh mục</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn-admin btn-primary-admin">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Thêm danh mục mới
        </a>
    </div>

    <div style="overflow-x: auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th style="width: 150px;">Số bài viết</th>
                    <th style="width: 150px;">Ngày tạo</th>
                    <th style="text-align: center; width: 180px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>
                        <span style="font-weight: 700; color: #64748b;">#{{ $category->id }}</span>
                    </td>
                    <td>
                        <div>
                            <div style="font-weight: 600; color: #1e293b; margin-bottom: 0.25rem;">
                                {{ $category->name }}
                            </div>
                            @if($category->description)
                                <div style="font-size: 0.875rem; color: #64748b;">
                                    {{ Str::limit($category->description, 80) }}
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <code style="background: #f1f5f9; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem; color: #475569;">
                            {{ $category->slug }}
                        </code>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #0066cc;">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span style="font-weight: 600; color: #1e293b;">
                                {{ $category->posts_count ?? 0 }}
                            </span>
                            <span style="color: #64748b; font-size: 0.875rem;">bài viết</span>
                        </div>
                    </td>
                    <td style="color: #64748b;">
                        {{ $category->created_at->format('d/m/Y') }}
                    </td>
                    <td>
                        <div class="action-buttons" style="justify-content: center;">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="action-btn action-edit">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                                Sửa
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')">
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
                                <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                            </svg>
                            <h3>Chưa có danh mục nào</h3>
                            <p>Tạo danh mục đầu tiên để bắt đầu tổ chức nội dung</p>
                            <a href="{{ route('admin.categories.create') }}" class="btn-admin btn-primary-admin">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                Tạo danh mục đầu tiên
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($categories->hasPages())
    <div style="padding: 1.5rem 2rem; border-top: 1px solid #e2e8f0;">
        {{ $categories->links() }}
    </div>
    @endif
</div>
@endsection
