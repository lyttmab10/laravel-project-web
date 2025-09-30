<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\News;
use App\Models\Curriculum;
use App\Models\Laboratory;
use App\Models\FacultyResearch;
use App\Models\StudentProject;
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
        
        // Curriculum Data
        Curriculum::create([
            'degree_name_th' => 'วิทยาศาสตรบัณฑิต (วิศวกรรมซอฟต์แวร์)',
            'degree_name_en' => 'Bachelor of Science (Software Engineering)',
            'degree_abbr_th' => 'วท.บ.',
            'degree_abbr_en' => 'B.Sc.',
            'program_type' => 'ระดับปริญญาตรี หลักสูตร 4 ปี',
            'duration_years' => 4,
            'credits' => 128,
            'language' => 'ไทย/Thai/泰语 (Tàiyǔ)',
            'tuition_fee' => 11400.00,
            'description' => 'หลักสูตรวิศวกรรมซอฟต์แวร์ที่เน้นการพัฒนาทักษะด้านการออกแบบ พัฒนา และดูแลระบบซอฟต์แวร์ในยุคดิจิทัล พร้อมทั้งการเรียนรู้เทคโนโลยีที่ทันสมัยและการปฏิบัติจริงในสภาพแวดล้อมการทำงาน',
            'curriculum_year' => 'พ.ศ.2564',
            'pdf_url' => 'https://sc.npru.ac.th/sc_major/./assets/attachs/major/1706694468_47edd5cc1ed73615518c.pdf'
        ]);
        
        // Laboratory Data
        Laboratory::create([
            'name' => 'ห้องปฏิบัติการคอมพิวเตอร์ 1',
            'building' => 'อาคาร 30 ชั้น 3',
            'description' => 'ห้องปฏิบัติการคอมพิวเตอร์สำหรับการเรียนการสอนพื้นฐาน พร้อมคอมพิวเตอร์ 40 เครื่อง และอุปกรณ์โปรเจคเตอร์',
            'image' => '/images/lab1.jpg'
        ]);
        
        Laboratory::create([
            'name' => 'ห้องปฏิบัติการเครือข่าย',
            'building' => 'อาคาร 30 ชั้น 3',
            'description' => 'ห้องปฏิบัติการเครือข่ายคอมพิวเตอร์ พร้อมอุปกรณ์ Switch, Router และเครื่องมือวิเคราะห์เครือข่าย',
            'image' => '/images/lab2.jpg'
        ]);
        
        Laboratory::create([
            'name' => 'ห้องปฏิบัติการซอฟต์แวร์',
            'building' => 'อาคาร 30 ชั้น 4',
            'description' => 'ห้องปฏิบัติการพัฒนาซอฟต์แวร์ พร้อมเครื่องคอมพิวเตอร์สเปกสูงสำหรับการเขียนโปรแกรม',
            'image' => '/images/lab3.jpg'
        ]);
        
        Laboratory::create([
            'name' => 'ห้องปฏิบัติการมัลติมีเดีย',
            'building' => 'อาคาร 30 ชั้น 4',
            'description' => 'ห้องปฏิบัติการมัลติมีเดีย สำหรับการออกแบบกราฟิก การตัดต่อวิดีโอ และการผลิตสื่อดิจิทัล',
            'image' => '/images/lab4.jpg'
        ]);
        
        Laboratory::create([
            'name' => 'ห้องปฏิบัติการฐานข้อมูล',
            'building' => 'อาคาร 30 ชั้น 5',
            'description' => 'ห้องปฏิบัติการจัดการฐานข้อมูล พร้อมเซิร์ฟเวอร์และระบบจัดการฐานข้อมูลต่างๆ',
            'image' => '/images/lab5.jpg'
        ]);
        
        Laboratory::create([
            'name' => 'ห้องปฏิบัติการปัญญาประดิษฐ์',
            'building' => 'อาคาร 30 ชั้น 5',
            'description' => 'ห้องปฏิบัติการปัญญาประดิษฐ์และการเรียนรู้ของเครื่อง พร้อม GPU สำหรับการประมวลผลข้อมูลขนาดใหญ่',
            'image' => '/images/lab6.jpg'
        ]);
        
        // Faculty Research Data
        FacultyResearch::create([
            'title' => 'การพัฒนาระบบปัญญาประดิษฐ์สำหรับการวิเคราะห์ข้อมูล',
            'type' => 'งานวิจัย',
            'faculty_id' => 1, // ผศ.ดร.อุษณีย์ ภักดีตระกูลวงศ์
            'description' => 'งานวิจัยด้านการพัฒนาระบบปัญญาประดิษฐ์สำหรับการวิเคราะห์ข้อมูลขนาดใหญ่ โดยใช้เทคนิค Machine Learning และ Deep Learning',
            'image' => '/images/research1.jpg'
        ]);
        
        FacultyResearch::create([
            'title' => 'ระบบจัดการฐานข้อมูลแบบกระจายสำหรับองค์กรขนาดใหญ่',
            'type' => 'งานวิจัย',
            'faculty_id' => 2, // ผศ.ดร. วรเชษฐ์ อุทธา
            'description' => 'การพัฒนาระบบจัดการฐานข้อมูลแบบกระจายที่มีประสิทธิภาพสูง สำหรับองค์กรขนาดใหญ่และข้อมูลปริมาณมาก',
            'image' => '/images/research2.jpg'
        ]);
        
        FacultyResearch::create([
            'title' => 'การออกแบบและพัฒนาแอปพลิเคชันมือถือด้วย Flutter',
            'type' => 'วิทยากร',
            'faculty_id' => 3, // ผศ.สมเกียรติ ช่อเหมือน
            'description' => 'การเป็นวิทยากรในหัวข้อการพัฒนาแอปพลิเคชันมือถือด้วย Flutter Framework และการประยุกต์ใช้ในธุรกิจจริง',
            'image' => '/images/research3.jpg'
        ]);
        
        FacultyResearch::create([
            'title' => 'ระบบรักษาความปลอดภัยข้อมูลด้วย Blockchain Technology',
            'type' => 'งานวิจัย',
            'faculty_id' => 4, // ผศ.นฤพล สุวรรณวิจิตร
            'description' => 'การวิจัยและพัฒนาระบบรักษาความปลอดภัยข้อมูลโดยใช้เทคโนโลยี Blockchain สำหรับการป้องกันการโจมตีทางไซเบอร์',
            'image' => '/images/research4.jpg'
        ]);
        
        FacultyResearch::create([
            'title' => 'การพัฒนาเกมเพื่อการศึกษาด้วย Unity 3D',
            'type' => 'โครงการ',
            'faculty_id' => 5, // ดร.สุพิฌาย์ จันทร์เรือง
            'description' => 'โครงการพัฒนาเกมเพื่อการศึกษาในรูปแบบ Virtual Reality และ Augmented Reality ด้วย Unity 3D Engine',
            'image' => '/images/research5.jpg'
        ]);
        
        FacultyResearch::create([
            'title' => 'ระบบ IoT สำหรับการจัดการอาคารอัจฉริยะ',
            'type' => 'งานวิจัย',
            'faculty_id' => 1, // ผศ.ดร.อุษณีย์ ภักดีตระกูลวงศ์
            'description' => 'การพัฒนาระบบ Internet of Things (IoT) สำหรับการจัดการอาคารอัจฉริยะ ควบคุมแสง อุณหภูมิ และระบบรักษาความปลอดภัย',
            'image' => '/images/research6.jpg'
        ]);
        
        // Student Projects Data
        StudentProject::create([
            'title' => 'แอปพลิเคชันจัดการร้านกาแฟออนไลน์',
            'student_name' => 'นายสมชาย ใจดี',
            'year' => 4,
            'description' => 'การพัฒนาแอปพลิเคชันมือถือสำหรับจัดการร้านกาแฟออนไลน์ ระบบสั่งซื้อ การชำระเงิน และติดตามสถานะออร์เดอร์แบบ Real-time ด้วย Flutter และ Firebase',
            'image' => '/images/project1.jpg'
        ]);
        
        StudentProject::create([
            'title' => 'ระบบจัดการห้องสมุดอัจฉริยะด้วย QR Code',
            'student_name' => 'นางสาวมาลี สวยงาม',
            'year' => 3,
            'description' => 'ระบบจัดการห้องสมุดที่ใช้เทคโนโลยี QR Code ในการยืม-คืนหนังสือ พร้อมระบบแนะนำหนังสือตามความสนใจของผู้ใช้ด้วย Machine Learning',
            'image' => '/images/project2.jpg'
        ]);
        
        StudentProject::create([
            'title' => 'เกมการศึกษาคณิตศาสตร์สำหรับเด็กประถม',
            'student_name' => 'นายวิชัย เก่งคิด',
            'year' => 4,
            'description' => 'การพัฒนาเกมการศึกษาแบบ Gamification สำหรับสอนคณิตศาสตร์ให้เด็กประถมศึกษา ด้วย Unity 3D และระบบติดตามความก้าวหน้าของผู้เรียน',
            'image' => '/images/project3.jpg'
        ]);
        
        StudentProject::create([
            'title' => 'ระบบแนะนำอาหารตามสุขภาพด้วย AI',
            'student_name' => 'นางสาวปิยะดา อยู่ดี',
            'year' => 3,
            'description' => 'แอปพลิเคชันแนะนำอาหารและเมนูที่เหมาะสมกับสุขภาพของผู้ใช้ โดยใช้ปัญญาประดิษฐ์วิเคราะห์จากข้อมูลสุขภาพและความต้องการเฉพาะบุคคล',
            'image' => '/images/project4.jpg'
        ]);
        
        StudentProject::create([
            'title' => 'ระบบตรวจจับใบหน้าสำหรับเช็คชื่อเรียน',
            'student_name' => 'นายธนากร ฉลาดมาก',
            'year' => 4,
            'description' => 'ระบบเช็คชื่อนักเรียนอัตโนมัติด้วยการตรวจจับใบหน้า (Face Recognition) ลดปัญหาการโกงเช็คชื่อ พร้อมระบบรายงานสถิติการเข้าเรียนแบบ Real-time',
            'image' => '/images/project5.jpg'
        ]);
        
        StudentProject::create([
            'title' => 'แพลตฟอร์มซื้อขายของมือสองสำหรับนักศึกษา',
            'student_name' => 'นายอนุพงษ์ ประหยัด',
            'year' => 3,
            'description' => 'เว็บไซต์และแอปพลิเคชันสำหรับซื้อขายของมือสองในมหาวิทยาลัย พร้อมระบบแชท การตรวจสอบตัวตนผู้ใช้ และระบบรีวิวความน่าเชื่อถือ',
            'image' => '/images/project6.jpg'
        ]);
    }
}
