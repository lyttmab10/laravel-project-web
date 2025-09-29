<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function initializeSessionData()
    {
        if (!session()->has('faculty_data')) {
            session(['faculty_data' => [
                1 => [
                    'id' => 1,
                    'name' => 'ผศ.ดร.อุษณีย์ ภักดีตระกูลวงศ์',
                    'position' => 'ประธานฯ สาขาวิชา',
                    'image' => '/images/faculty1.jpg'
                ],
                2 => [
                    'id' => 2,
                    'name' => 'ผศ.ดร. วรเชษฐ์ อุทธา',
                    'position' => 'รองประธานสาขา (ประธานสาขา)',
                    'image' => '/images/faculty2.jpg'
                ],
                3 => [
                    'id' => 3,
                    'name' => 'ผศ.สมเกียรติ ช่อเหมือน',
                    'position' => 'รองประธานฯ ฝ่ายนโยบายและแผน',
                    'image' => '/images/faculty3.jpg'
                ],
                4 => [
                    'id' => 4,
                    'name' => 'ผศ.นฤพล สุวรรณวิจิตร',
                    'position' => 'รองประธานฯ ฝ่ายประกันคุณภาพฯ',
                    'image' => '/images/faculty4.jpg'
                ],
                5 => [
                    'id' => 5,
                    'name' => 'ดร.สุพิฌาย์ จันทร์เรือง',
                    'position' => 'รองประธานฯ ฝ่ายกิจการนักศึกษา',
                    'image' => '/images/faculty5.jpg'
                ]
            ]]);
        }

        if (!session()->has('programs_data')) {
            session(['programs_data' => [
                1 => [
                    'id' => 1,
                    'title' => 'การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัย',
                    'duration' => 'ปี 4',
                    'description' => 'การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัยเป็นกิจกรรมที่สำคัญที่สุดของปีการศึกษา',
                    'activity' => 'กิจกรรม: การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัย 2024',
                    'image' => '/images/robot-competition.jpg',
                    'date' => 'กุมภาพันธ์ 2024'
                ],
                2 => [
                    'id' => 2,
                    'title' => 'กิจกรรมวันวิทยาศาสตร์',
                    'duration' => 'ปี 2',
                    'description' => 'กิจกรรมวันวิทยาศาสตร์แห่งชาติเป็นกิจกรรมประจำปี',
                    'activity' => 'วันวิทยาศาสตร์แห่งชาติ 2566',
                    'image' => '/images/science-day.jpg',
                    'date' => 'สิงหาคม 2566'
                ],
                3 => [
                    'id' => 3,
                    'title' => 'โครงการพัฒนาแอปพลิเคชัน',
                    'duration' => 'ปี 3',
                    'description' => 'โครงการพัฒนาแอปพลิเคชันมือถือสำหรับการจัดการร้านค้าออนไลน์',
                    'activity' => 'โครงการ: ระบบจัดการร้านค้าออนไลน์',
                    'image' => '/images/app-development.jpg',
                    'date' => 'มิถุนายน 2567'
                ],
                4 => [
                    'id' => 4,
                    'title' => 'การสร้างเกมคอมพิวเตอร์',
                    'duration' => 'ปี 4',
                    'description' => 'การสร้างเกมคอมพิวเตอร์ขึ้นใหม่ด้วยเทคโนโลยีที่ทันสมัย',
                    'activity' => 'โครงการ: การสร้างเกมคอมพิวเตอร์ขึ้นใหม่',
                    'image' => '/images/game-development.jpg',
                    'date' => 'มกราคม 2567'
                ]
            ]]);
        }

        if (!session()->has('news_data')) {
            session(['news_data' => [
                1 => [
                    'id' => 1,
                    'title' => 'นักศึกษาคว้ารางวัลแข่งขันโปรแกรมมิ่งระดับชาติ',
                    'date' => '15 ก.ย. 2567',
                    'summary' => 'ทีมนักศึกษาสาขาวิศวกรรมซอฟต์แวร์ได้รับรางวัลที่ 1 ในการแข่งขัน National Programming Contest',
                    'image' => '/images/news1.jpg',
                    'content' => 'ในการแข่งขันโปรแกรมมิ่งระดับชาติครั้งนี้ นักศึกษาจากสาขาวิศวกรรมซอฟต์แวร์ได้แสดงให้เห็นถึงความสามารถและทักษะด้านการแก้ปัญหาโดยใช้เทคโนโลยีที่ทันสมัย'
                ],
                2 => [
                    'id' => 2,
                    'title' => 'MOU กับบริษัท Tech Giant เพื่อฝึกงานนักศึกษา',
                    'date' => '10 ก.ย. 2567',
                    'summary' => 'ลงนามความร่วมมือกับบริษัทเทคโนโลยีชั้นนำ เปิดโอกาสฝึกงานและทำงานจริง',
                    'image' => '/images/news2.jpg',
                    'content' => 'สาขาวิศวกรรมซอฟต์แวร์ได้ลงนามในข้อตกลงความร่วมมือกับบริษัทเทคโนโลยีชั้นนำระดับโลก เพื่อเปิดโอกาสให้นักศึกษาได้ฝึกงานจริงและมีโอกาสทำงานหลังจบการศึกษา'
                ],
                3 => [
                    'id' => 3,
                    'title' => 'เปิดห้องปฏิบัติการ AI และ Machine Learning ใหม่',
                    'date' => '5 ก.ย. 2567',
                    'summary' => 'ห้องปฏิบัติการที่ทันสมัยพร้อมอุปกรณ์ GPU และเครื่องมือสำหรับการเรียนรู้ AI',
                    'image' => '/images/news3.jpg',
                    'content' => 'สาขาวิศวกรรมซอฟต์แวร์ได้เปิดห้องปฏิบัติการ AI และ Machine Learning ห้องใหม่ที่ทันสมัย พร้อมด้วยอุปกรณ์ GPU ที่ทันสมัยและเครื่องมือต่างๆ สำหรับการเรียนรู้และวิจัยในด้าน AI'
                ]
            ]]);
        }

        if (!session()->has('next_faculty_id')) {
            session(['next_faculty_id' => 6]);
        }
        if (!session()->has('next_program_id')) {
            session(['next_program_id' => 5]);
        }
        if (!session()->has('next_news_id')) {
            session(['next_news_id' => 4]);
        }
    }
    public function index()
    {
        $this->initializeSessionData();
        
        $facultyData = array_values(session('faculty_data', []));
        $programsData = array_values(session('programs_data', []));
        $newsData = array_values(session('news_data', []));
        
        $data = [
            'page_title' => 'สาขาวิศวกรรมซอฟต์แวร์',
            'hero' => [
                'title' => 'สาขาวิศวกรรมซอฟต์แวร์',
                'subtitle' => 'สร้างอนาคตด้วยเทคโนโลยี พัฒนาโลกด้วยซอฟต์แวร์',
                'description' => 'เรียนรู้การพัฒนาซอฟต์แวร์ระดับมืออาชีพ ด้วยหลักสูตรที่ทันสมัยและอาจารย์ผู้เชี่ยวชาญ',
                'cta_text' => 'สมัครเรียน',
                'cta_secondary' => 'ดูหลักสูตร'
            ],
            'stats' => [
                ['number' => '500+', 'label' => 'นักศึกษา'],
                ['number' => '95%', 'label' => 'ได้งานทำ'],
                ['number' => '20+', 'label' => 'อาจารย์ผู้เชี่ยวชาญ'],
                ['number' => '100+', 'label' => 'บริษัทพันธมิตร']
            ],
            'faculty' => array_slice($facultyData, 0, 4),
            'programs' => array_slice($programsData, 0, 2),
            'news' => array_slice($newsData, 0, 3)
        ];

        return view('home', compact('data'));
    }

    public function faculty()
    {
        $this->initializeSessionData();
        $faculty = array_values(session('faculty_data', []));
        return view('faculty', compact('faculty'));
    }

    public function news()
    {
        $this->initializeSessionData();
        $news = array_values(session('news_data', []));
        return view('news', compact('news'));
    }

    public function programs()
    {
        $this->initializeSessionData();
        $programs = array_values(session('programs_data', []));
        return view('programs', compact('programs'));
    }

    public function adminLogin()
    {
        return view('admin.login');
    }

    public function adminDashboard()
    {
        $this->initializeSessionData();
        $stats = [
            'faculty_count' => count(session('faculty_data', [])),
            'programs_count' => count(session('programs_data', [])),
            'news_count' => count(session('news_data', []))
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function adminFaculty()
    {
        $this->initializeSessionData();
        $faculty = array_values(session('faculty_data', []));
        return view('admin.faculty', compact('faculty'));
    }

    public function adminPrograms()
    {
        $this->initializeSessionData();
        $programs = array_values(session('programs_data', []));
        return view('admin.programs', compact('programs'));
    }

    public function adminNews()
    {
        $this->initializeSessionData();
        $news = array_values(session('news_data', []));
        return view('admin.news', compact('news'));
    }

    // Faculty CRUD Methods
    public function storeFaculty(Request $request)
    {
        $this->initializeSessionData();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|string|max:500'
        ]);

        $facultyData = session('faculty_data', []);
        $nextId = session('next_faculty_id', 6);
        
        $facultyData[$nextId] = [
            'id' => $nextId,
            'name' => $request->name,
            'position' => $request->position,
            'image' => $request->image ?: '/images/faculty-default.jpg'
        ];
        
        session(['faculty_data' => $facultyData]);
        session(['next_faculty_id' => $nextId + 1]);
        
        return response()->json(['success' => true, 'message' => 'เพิ่มอาจารย์สำเร็จ']);
    }

    public function updateFaculty(Request $request, $id)
    {
        $this->initializeSessionData();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|string|max:500'
        ]);

        $facultyData = session('faculty_data', []);
        
        if (!isset($facultyData[$id])) {
            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูลอาจารย์']);
        }
        
        $facultyData[$id] = [
            'id' => (int)$id,
            'name' => $request->name,
            'position' => $request->position,
            'image' => $request->image ?: $facultyData[$id]['image']
        ];
        
        session(['faculty_data' => $facultyData]);
        
        return response()->json(['success' => true, 'message' => 'แก้ไขข้อมูลอาจารย์สำเร็จ']);
    }

    public function deleteFaculty($id)
    {
        $this->initializeSessionData();
        
        $facultyData = session('faculty_data', []);
        
        if (!isset($facultyData[$id])) {
            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูลอาจารย์']);
        }
        
        unset($facultyData[$id]);
        session(['faculty_data' => $facultyData]);
        
        return response()->json(['success' => true, 'message' => 'ลบอาจารย์สำเร็จ']);
    }

    // Programs CRUD Methods
    public function storeProgram(Request $request)
    {
        $this->initializeSessionData();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'activity' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'date' => 'nullable|string|max:100'
        ]);

        $programsData = session('programs_data', []);
        $nextId = session('next_program_id', 5);
        
        $programsData[$nextId] = [
            'id' => $nextId,
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description ?: '',
            'activity' => $request->activity ?: '',
            'image' => $request->image ?: '/images/program-default.jpg',
            'date' => $request->date ?: ''
        ];
        
        session(['programs_data' => $programsData]);
        session(['next_program_id' => $nextId + 1]);
        
        return response()->json(['success' => true, 'message' => 'เพิ่มผลงานสำเร็จ']);
    }

    public function updateProgram(Request $request, $id)
    {
        $this->initializeSessionData();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'activity' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'date' => 'nullable|string|max:100'
        ]);

        $programsData = session('programs_data', []);
        
        if (!isset($programsData[$id])) {
            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูลผลงาน']);
        }
        
        $programsData[$id] = [
            'id' => (int)$id,
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description ?: '',
            'activity' => $request->activity ?: '',
            'image' => $request->image ?: $programsData[$id]['image'],
            'date' => $request->date ?: ''
        ];
        
        session(['programs_data' => $programsData]);
        
        return response()->json(['success' => true, 'message' => 'แก้ไขผลงานสำเร็จ']);
    }

    public function deleteProgram($id)
    {
        $this->initializeSessionData();
        
        $programsData = session('programs_data', []);
        
        if (!isset($programsData[$id])) {
            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูลผลงาน']);
        }
        
        unset($programsData[$id]);
        session(['programs_data' => $programsData]);
        
        return response()->json(['success' => true, 'message' => 'ลบผลงานสำเร็จ']);
    }

    // News CRUD Methods
    public function storeNews(Request $request)
    {
        $this->initializeSessionData();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:100',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string|max:500'
        ]);

        $newsData = session('news_data', []);
        $nextId = session('next_news_id', 4);
        
        $newsData[$nextId] = [
            'id' => $nextId,
            'title' => $request->title,
            'date' => $request->date,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $request->image ?: '/images/news-default.jpg'
        ];
        
        session(['news_data' => $newsData]);
        session(['next_news_id' => $nextId + 1]);
        
        return response()->json(['success' => true, 'message' => 'เพิ่มข่าวสำเร็จ']);
    }

    public function updateNews(Request $request, $id)
    {
        $this->initializeSessionData();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:100',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string|max:500'
        ]);

        $newsData = session('news_data', []);
        
        if (!isset($newsData[$id])) {
            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูลข่าว']);
        }
        
        $newsData[$id] = [
            'id' => (int)$id,
            'title' => $request->title,
            'date' => $request->date,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $request->image ?: $newsData[$id]['image']
        ];
        
        session(['news_data' => $newsData]);
        
        return response()->json(['success' => true, 'message' => 'แก้ไขข่าวสำเร็จ']);
    }

    public function deleteNews($id)
    {
        $this->initializeSessionData();
        
        $newsData = session('news_data', []);
        
        if (!isset($newsData[$id])) {
            return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูลข่าว']);
        }
        
        unset($newsData[$id]);
        session(['news_data' => $newsData]);
        
        return response()->json(['success' => true, 'message' => 'ลบข่าวสำเร็จ']);
    }
}