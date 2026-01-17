@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Liên hệ với VODIC</h1>
            <p class="text-xl text-gray-600">
                Chúng tôi sẵn sàng hỗ trợ bạn
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Gửi tin nhắn</h2>
                
                <form action="#" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Họ và tên <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Nhập họ và tên của bạn">
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="email@example.com">
                    </div>

                    <div class="mb-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Số điện thoại
                        </label>
                        <input type="tel" id="phone" name="phone"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="0123456789">
                    </div>

                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                            Tiêu đề <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="subject" name="subject" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Nhập tiêu đề">
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Nội dung <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" name="message" rows="6" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Nhập nội dung tin nhắn của bạn"></textarea>
                    </div>

                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                        📧 Gửi tin nhắn
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Thông tin liên hệ</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-2xl mr-4">
                                📍
                                </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Địa chỉ</h3>
                                <p class="text-gray-600">
                                    83 Nguyễn Chí Thanh, Đống Đa, Hà Nội, Việt Nam
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center text-2xl mr-4">
                                📞
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Điện thoại</h3>
                                <p class="text-gray-600">
                                    <a href="tel:+842437687844" class="hover:text-blue-600">
                                        (+84) 24 3768 7844
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-2xl mr-4">
                                ✉️
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600">
                                    <a href="mailto:vodic@vea.gov.vn" class="hover:text-blue-600">
                                        vodic@vea.gov.vn
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-2xl mr-4">
                                🌐
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Website</h3>
                                <p class="text-gray-600">
                                    <a href="https://vodic.vn" target="_blank" class="hover:text-blue-600">
                                        www.vodic.vn
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center text-2xl mr-4">
                                ⏰
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Giờ làm việc</h3>
                                <p class="text-gray-600">
                                    Thứ 2 - Thứ 6: 8:00 - 17:00<br>
                                    Thứ 7 - Chủ nhật: Nghỉ
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0966655467634!2d105.81313731533406!3d21.028511593440577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd0c66f05%3A0xea31563511af2e8!2zODMgTmd1eeG7hW4gQ2jDrSBUaGFuaCwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1642419887194!5m2!1svi!2s" 
                        width="100%" 
                                                height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        class="rounded-lg">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

