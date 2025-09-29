<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\News;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Faculty Data
        Faculty::create([
            'name' => 'ผศ.ดร.อุษณีย์ ภักดีตระกูลวงศ์',
            'position' => 'ประธานฯ สาขาวิชา',
            'image' => '/images/faculty1.jpg'
        ]);
        
        Faculty::create([
            'name' => 'ผศ.ดร. วรเชษฐ์ อุทธา',
            'position' => 'รองประธานสาขา (ประธานสาขา)',
            'image' => '/images/faculty2.jpg'
        ]);
        
        Faculty::create([
            'name' => 'ผศ.สมเกียรติ ช่อเหมือน',
            'position' => 'รองประธานฯ ฝ่ายนโยบายและแผน',
            'image' => '/images/faculty3.jpg'
        ]);
        
        Faculty::create([
            'name' => 'ผศ.นฤพล สุวรรณวิจิตร',
            'position' => 'รองประธานฯ ฝ่ายประกันคุณภาพฯ',
            'image' => '/images/faculty4.jpg'
        ]);
        
        Faculty::create([
            'name' => 'ดร.สุพิฌาย์ จันทร์เรือง',
            'position' => 'รองประธานฯ ฝ่ายกิจการนักศึกษา',
            'image' => '/images/faculty5.jpg'
        ]);
        
        // Programs Data
        Program::create([
            'title' => 'การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัย',
            'duration' => 'ปี 4',
            'description' => 'การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัยเป็นกิจกรรมที่สำคัญที่สุดของปีการศึกษา',
            'activity' => 'กิจกรรม: การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัย 2024',
            'image' => '/images/robot-competition.jpg',
            'date' => 'กุมภาพันธ์ 2024'
        ]);
        
        Program::create([
            'title' => 'กิจกรรมวันวิทยาศาสตร์',
            'duration' => 'ปี 2',
            'description' => 'กิจกรรมวันวิทยาศาสตร์แห่งชาติเป็นกิจกรรมประจำปี',
            'activity' => 'วันวิทยาศาสตร์แห่งชาติ 2566',
            'image' => '/images/science-day.jpg',
            'date' => 'สิงหาคม 2566'
        ]);
        
        Program::create([
            'title' => 'โครงการพัฒนาแอปพลิเคชัน',
            'duration' => 'ปี 3',
            'description' => 'โครงการพัฒนาแอปพลิเคชันมือถือสำหรับการจัดการร้านค้าออนไลน์',
            'activity' => 'โครงการ: ระบบจัดการร้านค้าออนไลน์',
            'image' => '/images/app-development.jpg',
            'date' => 'มิถุนายน 2567'
        ]);
        
        Program::create([
            'title' => 'การสร้างเกมคอมพิวเตอร์',
            'duration' => 'ปี 4',
            'description' => 'การสร้างเกมคอมพิวเตอร์ขึ้นใหม่ด้วยเทคโนโลยีที่ทันสมัย',
            'activity' => 'โครงการ: การสร้างเกมคอมพิวเตอร์ขึ้นใหม่',
            'image' => '/images/game-development.jpg',
            'date' => 'มกราคม 2567'
        ]);
        
        // News Data
        News::create([
            'title' => 'นักศึกษาคว้ารางวัลแข่งขันโปรแกรมมิ่งระดับชาติ',
            'date' => '15 ก.ย. 2567',
            'summary' => 'ทีมนักศึกษาสาขาวิศวกรรมซอฟต์แวร์ได้รับรางวัลที่ 1 ในการแข่งขัน National Programming Contest',
            'image' => '/images/news1.jpg',
            'content' => 'ในการแข่งขันโปรแกรมมิ่งระดับชาติครั้งนี้ นักศึกษาจากสาขาวิศวกรรมซอฟต์แวร์ได้แสดงให้เห็นถึงความสามารถและทักษะด้านการแก้ปัญหาโดยใช้เทคโนโลยีที่ทันสมัย'
        ]);
        
        News::create([
            'title' => 'MOU กับบริษัท Tech Giant เพื่อฝึกงานนักศึกษา',
            'date' => '10 ก.ย. 2567',
            'summary' => 'ลงนามความร่วมมือกับบริษัทเทคโนโลยีชั้นนำ เปิดโอกาสฝึกงานและทำงานจริง',
            'image' => '/images/news2.jpg',
            'content' => 'สาขาวิศวกรรมซอฟต์แวร์ได้ลงนามในข้อตกลงความร่วมมือกับบริษัทเทคโนโลยีชั้นนำระดับโลก เพื่อเปิดโอกาสให้นักศึกษาได้ฝึกงานจริงและมีโอกาสทำงานหลังจบการศึกษา'
        ]);
        
        News::create([
            'title' => 'เปิดห้องปฏิบัติการ AI และ Machine Learning ใหม่',
            'date' => '5 ก.ย. 2567',
            'summary' => 'ห้องปฏิบัติการที่ทันสมัยพร้อมอุปกรณ์ GPU และเครื่องมือสำหรับการเรียนรู้ AI',
            'image' => '/images/news3.jpg',
            'content' => 'สาขาวิศวกรรมซอฟต์แวร์ได้เปิดห้องปฏิบัติการ AI และ Machine Learning ห้องใหม่ที่ทันสมัย พร้อมด้วยอุปกรณ์ GPU ที่ทันสมัยและเครื่องมือต่างๆ สำหรับการเรียนรู้และวิจัยในด้าน AI'
        ]);
    }
}
