@extends('layouts.app')

@section('title', 'Giới thiệu')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">Giới thiệu về VODIC</h1>
            <p class="text-xl text-gray-600">
                Trung tâm Dữ liệu và Thông tin Đại dương Việt Nam
            </p>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <div class="prose prose-lg max-w-none">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Về chúng tôi</h2>
                <p class="text-gray-700 mb-4">
                    Trung tâm Dữ liệu và Thông tin Đại dương (VODIC) trực thuộc Tổng cục Biển và Hải đảo Việt Nam, 
                    là đơn vị chuyên trách về thu thập, quản lý, lưu trữ và phân phối dữ liệu, thông tin về biển và 
                    hải đảo Việt Nam.
                </p>

                <h3 class="text-xl font-bold text-gray-900 mb-3 mt-6">Chức năng nhiệm vụ</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700 mb-4">
                    <li>Thu thập, quản lý và lưu trữ dữ liệu về biển và hải đảo Việt Nam</li>
                    <li>Cung cấp thông tin, dữ liệu phục vụ nghiên cứu và quản lý biển</li>
                    <li>Xây dựng và vận hành hệ thống cơ sở dữ liệu quốc gia về biển</li>
                    <li>Hợp tác quốc tế trong lĩnh vực dữ liệu và thông tin đại dương</li>
                    <li>Đào tạo và chuyển giao công nghệ về quản lý dữ liệu biển</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-900 mb-3 mt-6">Tầm nhìn</h3>
                <p class="text-gray-700 mb-4">
                    Trở thành trung tâm dữ liệu và thông tin đại dương hàng đầu trong khu vực Đông Nam Á, 
                    đóng góp tích cực vào việc quản lý bền vững tài nguyên biển và phát triển kinh tế biển Việt Nam.
                </p>

                <h3 class="text-xl font-bold text-gray-900 mb-3 mt-6">Sứ mệnh</h3>
                <p class="text-gray-700 mb-4">
                    Cung cấp dữ liệu và thông tin chính xác, kịp thời về biển và hải đảo Việt Nam, 
                    phục vụ hiệu quả cho công tác quản lý nhà nước, nghiên cứu khoa học và phát triển kinh tế biển.
                </p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-blue-600 text-white rounded-lg p-6 text-center">
                <div class="text-4xl font-bold mb-2">15+</div>
                <div class="text-sm">Năm kinh nghiệm</div>
            </div>
            <div class="bg-green-600 text-white rounded-lg p-6 text-center">
                <div class="text-4xl font-bold mb-2">1000+</div>
                <div class="text-sm">Bộ dữ liệu</div>
            </div>
            <div class="bg-purple-600 text-white rounded-lg p-6 text-center">
                <div class="text-4xl font-bold mb-2">50+</div>
                <div class="text-sm">Đối tác</div>
            </div>
            <div class="bg-orange-600 text-white rounded-lg p-6 text-center">
                <div class="text-4xl font-bold mb-2">100+</div>
                <div class="text-sm">Dự án</div>
            </div>
        </div>

        <!-- Contact CTA -->
        <div class="bg-blue-50 rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Liên hệ với chúng tôi</h2>
            <p class="text-gray-700 mb-6">
                Để biết thêm thông tin chi tiết về VODIC và các dịch vụ của chúng tôi
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold">
                Liên hệ ngay
            </a>
        </div>
    </div>
</div>
@endsection

