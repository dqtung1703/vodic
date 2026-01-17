@extends('admin.admin')

@section('title', 'Chi tiết Bài viết')
@section('page-title', 'Chi tiết Bài viết')

@section('content')
<div class="max-w-5xl">
    <!-- Header Actions -->
    <div class="bg-white rounded-lg shadow p-4 mb-6 flex justify-between items-center">
        <div class="flex gap-3">
            <a href="{{ route('admin.posts.index') }}" 
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium transition">
                ← Quay lại
            </a>
            <a href="{{ route('admin.posts.edit', $post) }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">
                ✏️ Chỉnh sửa
            </a>
            <a href="{{ route('news.show', $post->slug) }}" target="_blank"
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition">
                👁️ Xem trên web
            </a>
        </div>
        
        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" 
              onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này? Hành động này không thể hoàn tác!')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition">
                🗑️ Xóa bài viết
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
                
                <!-- Meta Info -->
                <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-6 pb-6 border-b">
                    <div class="flex items-center gap-2">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-semibold">
                            {{ $post->category->name }}
                        </span>
                    </div>
                    <div>📅 {{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : 'Chưa xuất bản' }}</div>
                    <div>👁️ {{ number_format($post->views) }} lượt xem</div>
                    <div>👤 {{ $post->user->name }}</div>
                </div>

                <!-- Featured Image -->
                @if($post->featured_image)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3">Ảnh đại diện</h3>
                    <img src="{{ asset('storage/' . $post->featured_image) }}" 
                         alt="{{ $post->title }}"
                         class="w-full rounded-lg shadow-md">
                </div>
                @endif

                <!-- Excerpt -->
                @if($post->excerpt)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3">Tóm tắt</h3>
                    <p class="text-gray-700 bg-gray-50 p-4 rounded-lg border-l-4 border-blue-500">
                        {{ $post->excerpt }}
                    </p>
                </div>
                @endif

                <!-- Content -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3">Nội dung</h3>
                    <div class="prose max-w-none text-gray-700 bg-gray-50 p-6 rounded-lg">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                <!-- Gallery Images -->
                @if($post->images->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3">
                        Hình ảnh bổ sung ({{ $post->images->count() }})
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($post->images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                 alt="Image {{ $loop->iteration }}"
                                 class="w-full h-48 object-cover rounded-lg shadow-md cursor-pointer hover:shadow-xl transition"
                                 onclick="openImageModal(this.src)">
                            <div class="absolute bottom-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                                #{{ $loop->iteration }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="font-semibold text-lg mb-4">Thông tin</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-medium text-gray-700">Trạng thái</label>
                        <div class="mt-1">
                            @if($post->status === 'published')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    ✅ Đã xuất bản
                                </span>
                            @elseif($post->status === 'draft')
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    📝 Bản nháp
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">
                                    📦 Lưu trữ
                                </span>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Slug</label>
                        <div class="mt-1 text-sm text-gray-600 bg-gray-50 p-2 rounded font-mono">
                            {{ $post->slug }}
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Danh mục</label>
                        <div class="mt-1 text-sm text-gray-900">
                            {{ $post->category->name }}
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Tác giả</label>
                        <div class="mt-1 text-sm text-gray-900">
                            {{ $post->user->name }}
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Ngày tạo</label>
                        <div class="mt-1 text-sm text-gray-600">
                            {{ $post->created_at->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Cập nhật lần cuối</label>
                        <div class="mt-1 text-sm text-gray-600">
                            {{ $post->updated_at->format('d/m/Y H:i') }}
                        </div>
                    </div>

                    @if($post->published_at)
                    <div>
                        <label class="text-sm font-medium text-gray-700">Ngày xuất bản</label>
                        <div class="mt-1 text-sm text-gray-600">
                            {{ $post->published_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                    @endif

                    <div>
                        <label class="text-sm font-medium text-gray-700">Lượt xem</label>
                        <div class="mt-1 text-lg font-bold text-blue-600">
                            {{ number_format($post->views) }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-blue-50 rounded-lg shadow p-6">
                <h3 class="font-semibold text-lg mb-4 text-blue-900">Thống kê</h3>
                
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Số ký tự nội dung:</span>
                        <span class="font-semibold">{{ number_format(strlen($post->content)) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-700">Số từ:</span>
                        <span class="font-semibold">{{ number_format(str_word_count(strip_tags($post->content))) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-700">Số hình ảnh:</span>
                        <span class="font-semibold">{{ $post->images->count() + ($post->featured_image ? 1 : 0) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4" onclick="closeImageModal()">
    <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-lg shadow-2xl">
    <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300">
        ×
    </button>
</div>

@push('scripts')
<script>
    function openImageModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });
</script>
@endpush
@endsection