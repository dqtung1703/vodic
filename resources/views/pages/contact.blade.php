@extends('layouts.app')

@section('title', 'Liên hệ - VODIC')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark)); padding: 4rem 1.5rem; color: white; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; background: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); opacity: 0.5;"></div>
    <div class="container" style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 1; text-align: center;">
        <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem; text-shadow: 0 2px 8px rgba(0,0,0,0.2);">
            Liên hệ với VODIC
        </h1>
        <p style="font-size: 1.25rem; opacity: 0.95; max-width: 600px; margin: 0 auto;">
            Chúng tôi sẵn sàng hỗ trợ bạn. Hãy để lại thông tin và chúng tôi sẽ phản hồi sớm nhất.
        </p>
    </div>
</section>

<!-- Main Content -->
<section style="padding: 4rem 1.5rem; background: var(--gray-50);">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem;">
            
            <!-- Contact Form -->
            <div style="background: white; border-radius: 16px; padding: 2.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                <h2 style="font-size: 1.75rem; font-weight: 800; color: var(--gray-900); margin-bottom: 1.5rem;">
                    Gửi tin nhắn
                </h2>
                
                <form action="#" method="POST">
                    @csrf
                    
                    <div style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">
                            Họ và tên <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" id="name" name="name" required
                               style="width: 100%; padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.9375rem; transition: all 0.3s ease;"
                               placeholder="Nhập họ và tên của bạn"
                               onfocus="this.style.borderColor='#0066cc'; this.style.boxShadow='0 0 0 3px rgba(0,102,204,0.1)'"
                               onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">
                            Email <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="email" id="email" name="email" required
                               style="width: 100%; padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.9375rem; transition: all 0.3s ease;"
                               placeholder="email@example.com"
                               onfocus="this.style.borderColor='#0066cc'; this.style.boxShadow='0 0 0 3px rgba(0,102,204,0.1)'"
                               onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="phone" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">
                            Số điện thoại
                        </label>
                        <input type="tel" id="phone" name="phone"
                               style="width: 100%; padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.9375rem; transition: all 0.3s ease;"
                               placeholder="0123456789"
                               onfocus="this.style.borderColor='#0066cc'; this.style.boxShadow='0 0 0 3px rgba(0,102,204,0.1)'"
                               onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="subject" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">
                            Tiêu đề <span style="color: #ef4444;">*</span>
                        </label>
                        <input type="text" id="subject" name="subject" required
                               style="width: 100%; padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.9375rem; transition: all 0.3s ease;"
                               placeholder="Nhập tiêu đề"
                               onfocus="this.style.borderColor='#0066cc'; this.style.boxShadow='0 0 0 3px rgba(0,102,204,0.1)'"
                               onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="message" style="display: block; font-size: 0.875rem; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">
                            Nội dung <span style="color: #ef4444;">*</span>
                        </label>
                        <textarea id="message" name="message" rows="6" required
                                  style="width: 100%; padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 0.9375rem; transition: all 0.3s ease; resize: vertical;"
                                  placeholder="Nhập nội dung tin nhắn của bạn"
                                  onfocus="this.style.borderColor='#0066cc'; this.style.boxShadow='0 0 0 3px rgba(0,102,204,0.1)'"
                                  onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark)); color: white; padding: 1rem; font-size: 1rem; font-weight: 600;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                        </svg>
                        Gửi tin nhắn
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <!-- Info Cards -->
                <div style="background: white; border-radius: 16px; padding: 2.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 2rem;">
                    <h2 style="font-size: 1.75rem; font-weight: 800; color: var(--gray-900); margin-bottom: 2rem;">
                        Thông tin liên hệ
                    </h2>
                    
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div style="display: flex; gap: 1rem;">
                            <div style="flex-shrink: 0; width: 56px; height: 56px; background: linear-gradient(135deg, #dbeafe, #bfdbfe); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0066cc" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Địa chỉ</h3>
                                <p style="color: var(--gray-600); line-height: 1.6;">
                                    83 Nguyễn Chí Thanh, Đống Đa, Hà Nội, Việt Nam
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 1rem;">
                            <div style="flex-shrink: 0; width: 56px; height: 56px; background: linear-gradient(135deg, #d1fae5, #a7f3d0); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Điện thoại</h3>
                                <p style="color: var(--gray-600);">
                                    <a href="tel:+842437687844" style="color: #0066cc; font-weight: 600;">
                                        (+84) 24 3768 7844
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 1rem;">
                            <div style="flex-shrink: 0; width: 56px; height: 56px; background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Email</h3>
                                <p style="color: var(--gray-600);">
                                    <a href="mailto:vodic@vea.gov.vn" style="color: #0066cc; font-weight: 600;">
                                        vodic@vea.gov.vn
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 1rem;">
                            <div style="flex-shrink: 0; width: 56px; height: 56px; background: linear-gradient(135deg, #fce7f3, #fbcfe8); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/>
                                    <polyline points="12 6 12 12 16 14"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Giờ làm việc</h3>
                                <p style="color: var(--gray-600); line-height: 1.6;">
                                    Thứ 2 - Thứ 6: 8:00 - 17:00<br>
                                    Thứ 7 - Chủ nhật: Nghỉ
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div style="background: white; border-radius: 16px; padding: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0966655467634!2d105.81313731533406!3d21.028511593440577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd0c66f05%3A0xea31563511af2e8!2zODMgTmd1eeG7hW4gQ2jDrSBUaGFuaCwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1642419887194!5m2!1svi!2s" 
                        width="100%" 
                        height="350" 
                        style="border:0; border-radius: 12px;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
