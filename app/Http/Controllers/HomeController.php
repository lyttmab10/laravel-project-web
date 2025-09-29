<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\News;

class HomeController extends Controller
{

    public function index()
    {
        $facultyData = Faculty::all()->toArray();
        $programsData = Program::all()->toArray();
        $newsData = News::all()->toArray();
        
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
        $faculty = Faculty::all();
        return view('faculty', compact('faculty'));
    }

    public function news()
    {
        $news = News::all();
        return view('news', compact('news'));
    }

    public function programs()
    {
        $programs = Program::all();
        return view('programs', compact('programs'));
    }

    public function adminLogin()
    {
        return view('admin.login');
    }

    public function adminDashboard()
    {
        $stats = [
            'faculty_count' => Faculty::count(),
            'programs_count' => Program::count(),
            'news_count' => News::count()
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function adminFaculty()
    {
        $faculty = Faculty::all();
        return view('admin.faculty', compact('faculty'));
    }

    public function adminPrograms()
    {
        $programs = Program::all();
        return view('admin.programs', compact('programs'));
    }

    public function adminNews()
    {
        $news = News::all();
        return view('admin.news', compact('news'));
    }

    // Faculty CRUD Methods
    public function storeFaculty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|string|max:500'
        ]);

        $faculty = Faculty::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $request->image ?: '/images/faculty-default.jpg'
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'เพิ่มอาจารย์สำเร็จ',
            'faculty' => $faculty
        ]);
    }

    public function updateFaculty(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|string|max:500'
        ]);

        $faculty = Faculty::findOrFail($id);
        
        $faculty->update([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $request->image ?: $faculty->image
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'แก้ไขข้อมูลอาจารย์สำเร็จ',
            'faculty' => $faculty
        ]);
    }

    public function deleteFaculty($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        
        return response()->json(['success' => true, 'message' => 'ลบอาจารย์สำเร็จ']);
    }

    // Programs CRUD Methods
    public function storeProgram(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'activity' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'date' => 'nullable|string|max:100'
        ]);

        $program = Program::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description ?: '',
            'activity' => $request->activity ?: '',
            'image' => $request->image ?: '/images/program-default.jpg',
            'date' => $request->date ?: ''
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'เพิ่มผลงานสำเร็จ',
            'program' => $program
        ]);
    }

    public function updateProgram(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'description' => 'nullable|string',
            'activity' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'date' => 'nullable|string|max:100'
        ]);

        $program = Program::findOrFail($id);
        
        $program->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description ?: '',
            'activity' => $request->activity ?: '',
            'image' => $request->image ?: $program->image,
            'date' => $request->date ?: ''
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'แก้ไขผลงานสำเร็จ',
            'program' => $program
        ]);
    }

    public function deleteProgram($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        
        return response()->json(['success' => true, 'message' => 'ลบผลงานสำเร็จ']);
    }

    // News CRUD Methods
    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:100',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string|max:500'
        ]);

        $news = News::create([
            'title' => $request->title,
            'date' => $request->date,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $request->image ?: '/images/news-default.jpg'
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'เพิ่มข่าวสำเร็จ',
            'news' => $news
        ]);
    }

    public function updateNews(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:100',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string|max:500'
        ]);

        $news = News::findOrFail($id);
        
        $news->update([
            'title' => $request->title,
            'date' => $request->date,
            'summary' => $request->summary,
            'content' => $request->content,
            'image' => $request->image ?: $news->image
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'แก้ไขข่าวสำเร็จ',
            'news' => $news
        ]);
    }

    public function deleteNews($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        
        return response()->json(['success' => true, 'message' => 'ลบข่าวสำเร็จ']);
    }
}