<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first();
        $categories = Category::all();

        $posts = [
            [
                'title' => 'Cập nhật dữ liệu chất lượng nước biển năm 2026',
                'excerpt' => 'Trung tâm VODIC công bố bộ dữ liệu chất lượng nước biển mới nhất trên toàn quốc',
                'content' => '<p>Trung tâm Dữ liệu và Thông tin Đại dương Việt Nam (VODIC) vừa công bố bộ dữ liệu chất lượng nước biển năm 2026, được thu thập từ 50 trạm quan trắc dọc theo bờ biển Việt Nam.</p>
                
                <p>Kết quả cho thấy chất lượng nước biển tại hầu hết các vùng đều đạt tiêu chuẩn cho mục đích bảo tồn thủy sinh. Tuy nhiên, một số khu vực gần cửa sông lớn vẫn còn dấu hiệu ô nhiễm do hoạt động của con người.</p>
                
                <h2>Các thông số quan trắc</h2>
                <ul>
                    <li>Nhiệt độ nước</li>
                    <li>Độ mặn</li>
                    <li>pH</li>
                    <li>Oxy hòa tan</li>
                    <li>Các chất dinh dưỡng</li>
                </ul>
                
                <p>Dữ liệu này sẽ được công khai trên trang web VODIC để phục vụ cho các nghiên cứu khoa học và quản lý tài nguyên biển.</p>',
                'category_id' => $categories->where('slug', 'moi-truong-bien')->first()->id,
                'status' => 'published',
                'published_at' => now()->subDays(1),
                'views' => 150,
            ],
            [
                'title' => 'Hội nghị khoa học về biển Đông 2026',
                'excerpt' => 'Hội nghị quốc tế về nghiên cứu biển Đông sẽ được tổ chức tại Hà Nội',
                'content' => '<p>Hội nghị khoa học quốc tế về biển Đông 2026 sẽ được tổ chức từ ngày 15-17/3/2026 tại Hà Nội với sự tham gia của hơn 200 nhà khoa học từ 20 quốc gia.</p>
                
                <p>Chủ đề chính của hội nghị năm nay là "Biển Đông trong bối cảnh biến đổi khí hậu". Các chuyên đề chính bao gồm:</p>
                
                <ul>
                    <li>Tác động của biến đổi khí hậu đến hệ sinh thái biển</li>
                    <li>Quản lý tài nguyên biển bền vững</li>
                    <li>Công nghệ mới trong nghiên cứu biển</li>
                    <li>Hợp tác quốc tế trong bảo vệ môi trường biển</li>
                </ul>',
                'category_id' => $categories->where('slug', 'su-kien')->first()->id,
                'status' => 'published',
                'published_at' => now()->subDays(3),
                'views' => 89,
            ],
            [
                'title' => 'Cảnh báo bão số 1 trên Biển Đông',
                'excerpt' => 'Áp thấp nhiệt đới có khả năng mạnh thành bão, di chuyển vào Biển Đông',
                'content' => '<p>Theo bản tin dự báo mới nhất, một áp thấp nhiệt đới đang hoạt động ở phía Đông Philippines có khả năng mạnh thành bão trong 24 giờ tới.</p>
                
                <p>Dự báo bão sẽ di chuyển theo hướng Tây Tây Bắc với tốc độ 15-20km/h và có khả năng ảnh hưởng đến vùng biển phía Nam.</p>
                
                <h2>Cảnh báo</h2>
                <p>Đề nghị các tàu thuyền hoạt động trên vùng biển này cần theo dõi chặt chẽ bản tin dự báo và có biện pháp tránh trú phù hợp.</p>',
                'category_id' => $categories->where('slug', 'du-bao-thoi-tiet-bien')->first()->id,
                'status' => 'published',
                'published_at' => now(),
                'views' => 320,
            ],
            [
                'title' => 'Khảo sát đáy biển bằng công nghệ sonar 3D',
                'excerpt' => 'Ứng dụng công nghệ sonar 3D tiên tiến trong khảo sát địa hình đáy biển',
                'content' => '<p>Trung tâm VODIC đã triển khai dự án khảo sát địa hình đáy biển sử dụng công nghệ sonar 3D hiện đại.</p>
                
                <p>Công nghệ này cho phép tạo ra bản đồ địa hình đáy biển với độ chính xác cao, hỗ trợ cho các hoạt động:</p>
                
                <ul>
                    <li>Quy hoạch và phát triển kinh tế biển</li>
                    <li>Nghiên cứu địa chất biển</li>
                    <li>Bảo vệ môi trường biển</li>
                    <li>Tìm kiếm tài nguyên khoáng sản</li>
                </ul>',
                'category_id' => $categories->where('slug', 'du-lieu-bien')->first()->id,
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'views' => 75,
            ],
            [
                'title' => 'Nghiên cứu rạn san hô vịnh Nha Trang',
                'excerpt' => 'Kết quả khảo sát tình trạng rạn san hô tại vịnh Nha Trang năm 2026',
                'content' => '<p>Nhóm nghiên cứu của VODIC vừa hoàn thành đợt khảo sát rạn san hô tại vịnh Nha Trang, một trong những hệ sinh thái san hô quan trọng nhất Việt Nam.</p>
                
                <h2>Kết quả chính</h2>
                <p>Độ phủ san hô sống trung bình đạt 45%, tăng 5% so với năm trước nhờ các biện pháp bảo vệ và phục hồi.</p>
                
                <p>Tuy nhiên, một số khu vực vẫn chịu ảnh hưởng từ hoạt động du lịch quá mức và ô nhiễm từ đất liền.</p>',
                'category_id' => $categories->where('slug', 'nghien-cuu-khoa-hoc')->first()->id,
                'status' => 'published',
                'published_at' => now()->subWeek(),
                'views' => 210,
            ],
            
            [
                'title' => 'Bản tin dự báo thời tiết biển tuần 3 tháng 1/2026',
                'excerpt' => 'Dự báo thời tiết biển từ ngày 15-21/01/2026',
                'content' => '<p>Dự báo thời tiết biển từ ngày 15 đến 21 tháng 01 năm 2026:</p>
                
                <h2>Vùng biển phía Bắc</h2>
                <p>Gió Đông Bắc cấp 5-6, giật cấp 7. Biển động. Sóng cao 2-3m.</p>
                
                <h2>Vùng biển Trung Trung Bộ</h2>
                <p>Gió Đông Bắc cấp 4-5. Biển động nhẹ. Sóng cao 1.5-2.5m.</p>
                
                <h2>Vùng biển phía Nam</h2>
                <p>Gió Đông cấp 3-4. Biển lặng đến biển động nhẹ. Sóng cao 1-2m.</p>',
                'category_id' => $categories->where('slug', 'du-bao-thoi-tiet-bien')->first()->id,
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'views' => 180,
            ],
        ];

        foreach ($posts as $postData) {
            $postData['user_id'] = $admin->id;
            $postData['slug'] = \Str::slug($postData['title']);
            Post::create($postData);
        }
    }
}
