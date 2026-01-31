@extends('layouts.app')

@section('title', 'Giới thiệu - VODIC')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark)); padding: 4rem 1.5rem; color: white; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; background: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); opacity: 0.5;"></div>
    <div class="container" style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 1; text-align: center;">
        <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem; text-shadow: 0 2px 8px rgba(0,0,0,0.2);">
            Về VODIC
        </h1>
        <p style="font-size: 1.25rem; opacity: 0.95; max-width: 700px; margin: 0 auto;">
            Trung tâm Thông tin, dữ liệu biển và hải đảo quốc gia
        </p>
    </div>
</section>

<!-- Main Content -->
<section style="padding: 4rem 1.5rem; background: var(--gray-50);">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Mission & Vision Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 4rem;">
            <!-- Mission Card -->
            <div style="background: white; border-radius: 16px; padding: 2.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.12)'" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'">
                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #0066cc, #003d82); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">Sứ mệnh</h3>
                <p style="color: var(--gray-600); line-height: 1.7;">
                    Cung cấp dữ liệu và thông tin chính xác, kịp thời về biển và hải đảo Việt Nam, phục vụ hiệu quả cho công tác quản lý nhà nước, nghiên cứu khoa học và phát triển kinh tế biển.
                </p>
            </div>

            <!-- Vision Card -->
            <div style="background: white; border-radius: 16px; padding: 2.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.12)'" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'">
                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">Tầm nhìn</h3>
                <p style="color: var(--gray-600); line-height: 1.7;">
                    Trở thành trung tâm dữ liệu và thông tin đại dương hàng đầu trong khu vực Đông Nam Á, đóng góp tích cực vào việc quản lý bền vững tài nguyên biển và phát triển kinh tế biển Việt Nam.
                </p>
            </div>
        </div>

        <!-- Functions Section -->
        <div style="background: white; border-radius: 16px; padding: 3rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 4rem;">
            <h2 style="font-size: 2rem; font-weight: 800; color: var(--gray-900); margin-bottom: 2rem; text-align: center;">
                Chức năng nhiệm vụ
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                <div style="display: flex; gap: 1rem;">
                    <div style="flex-shrink: 0; width: 48px; height: 48px; background: #dbeafe; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066cc" stroke-width="2">
                            <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Thu thập & Quản lý</h4>
                        <p style="color: var(--gray-600); font-size: 0.9375rem;">Thu thập, quản lý và lưu trữ dữ liệu về biển và hải đảo Việt Nam</p>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <div style="flex-shrink: 0; width: 48px; height: 48px; background: #d1fae5; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Cung cấp Thông tin</h4>
                        <p style="color: var(--gray-600); font-size: 0.9375rem;">Cung cấp thông tin, dữ liệu phục vụ nghiên cứu và quản lý biển</p>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <div style="flex-shrink: 0; width: 48px; height: 48px; background: #fef3c7; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                            <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Xây dựng Hệ thống</h4>
                        <p style="color: var(--gray-600); font-size: 0.9375rem;">Xây dựng và vận hành hệ thống cơ sở dữ liệu quốc gia về biển</p>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <div style="flex-shrink: 0; width: 48px; height: 48px; background: #e0e7ff; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Hợp tác Quốc tế</h4>
                        <p style="color: var(--gray-600); font-size: 0.9375rem;">Hợp tác quốc tế trong lĩnh vực dữ liệu và thông tin đại dương</p>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem;">
                    <div style="flex-shrink: 0; width: 48px; height: 48px; background: #fce7f3; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ec4899" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                        </svg>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Đào tạo</h4>
                        <p style="color: var(--gray-600); font-size: 0.9375rem;">Đào tạo và chuyển giao công nghệ về quản lý dữ liệu biển</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-bottom: 4rem;">
            <div style="background: linear-gradient(135deg, #0066cc, #003d82); border-radius: 16px; padding: 2.5rem; text-align: center; color: white; box-shadow: 0 8px 16px rgba(0,102,204,0.3);">
                <div style="font-size: 3.5rem; font-weight: 800; margin-bottom: 0.5rem;">15+</div>
                <div style="font-size: 1rem; opacity: 0.9;">Năm kinh nghiệm</div>
            </div>
            <div style="background: linear-gradient(135deg, #10b981, #059669); border-radius: 16px; padding: 2.5rem; text-align: center; color: white; box-shadow: 0 8px 16px rgba(16,185,129,0.3);">
                <div style="font-size: 3.5rem; font-weight: 800; margin-bottom: 0.5rem;">1000+</div>
                <div style="font-size: 1rem; opacity: 0.9;">Bộ dữ liệu</div>
            </div>
            <div style="background: linear-gradient(135deg, #6366f1, #4f46e5); border-radius: 16px; padding: 2.5rem; text-align: center; color: white; box-shadow: 0 8px 16px rgba(99,102,241,0.3);">
                <div style="font-size: 3.5rem; font-weight: 800; margin-bottom: 0.5rem;">50+</div>
                <div style="font-size: 1rem; opacity: 0.9;">Đối tác</div>
            </div>
            <div style="background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 16px; padding: 2.5rem; text-align: center; color: white; box-shadow: 0 8px 16px rgba(245,158,11,0.3);">
                <div style="font-size: 3.5rem; font-weight: 800; margin-bottom: 0.5rem;">100+</div>
                <div style="font-size: 1rem; opacity: 0.9;">Dự án nghiên cứu</div>
            </div>
        </div>

        <!-- CTA Section -->
        <div style="background: linear-gradient(135deg, rgba(0,102,204,0.05), rgba(0,61,130,0.05)); border-radius: 16px; padding: 3rem; text-align: center; border: 2px solid rgba(0,102,204,0.1);">
            <h2 style="font-size: 2rem; font-weight: 800; color: var(--gray-900); margin-bottom: 1rem;">
                Liên hệ với chúng tôi
            </h2>
            <p style="color: var(--gray-600); font-size: 1.125rem; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Để biết thêm thông tin chi tiết về VODIC và các dịch vụ của chúng tôi
            </p>
            <a href="{{ route('contact') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark)); color: white; padding: 1rem 2.5rem; font-size: 1.125rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Liên hệ ngay
            </a>
        </div>
    </div>
</section>
@endsection
