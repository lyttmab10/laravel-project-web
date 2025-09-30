<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\News;
use App\Models\Curriculum;
use App\Models\Laboratory;
use App\Models\FacultyResearch;
use App\Models\StudentProject;
use App\Models\Alumni;

class HomeController extends Controller
{

    public function index()
    {
        $facultyData = Faculty::all()->toArray();
        $programsData = Program::all()->toArray();
        $newsData = News::all()->toArray();
        $curriculumData = Curriculum::first(); // Get the main curriculum
        $laboratoriesData = Laboratory::all()->toArray();
        $facultyResearchData = FacultyResearch::with('faculty')->get()->toArray();
        $studentProjectsData = StudentProject::all()->toArray();
        $alumniData = Alumni::all()->toArray();
        
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
            'faculty' => count($facultyData) > 0 ? array_slice($facultyData, 0, 4) : [],
            'programs' => count($programsData) > 0 ? array_slice($programsData, 0, 2) : [],
            'news' => count($newsData) > 0 ? array_slice($newsData, 0, 3) : [],
            'curriculum' => $curriculumData,
            'laboratories' => count($laboratoriesData) > 0 ? array_slice($laboratoriesData, 0, 4) : [],
            'faculty_research' => count($facultyResearchData) > 0 ? array_slice($facultyResearchData, 0, 4) : [],
            'student_projects' => count($studentProjectsData) > 0 ? array_slice($studentProjectsData, 0, 4) : [],
            'alumni' => count($alumniData) > 0 ? array_slice($alumniData, 0, 4) : []
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
    
    public function curriculum()
    {
        $curriculum = Curriculum::first();
        return view('curriculum', compact('curriculum'));
    }
    
    public function laboratories()
    {
        $laboratories = Laboratory::all();
        return view('laboratories', compact('laboratories'));
    }
    
    public function facultyResearch()
    {
        $facultyResearch = FacultyResearch::with('faculty')->get();
        return view('faculty-research', compact('facultyResearch'));
    }
    
    public function studentProjects()
    {
        $studentProjects = StudentProject::all();
        return view('student-projects', compact('studentProjects'));
    }
    
    public function alumni()
    {
        $alumni = Alumni::all();
        return view('alumni', compact('alumni'));
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
            'news_count' => News::count(),
            'curriculum_count' => Curriculum::count(),
            'laboratories_count' => Laboratory::count(),
            'faculty_research_count' => FacultyResearch::count(),
            'student_projects_count' => StudentProject::count(),
            'alumni_count' => Alumni::count()
        ];
        
        // Get actual data for CRUD operations
        $faculty = Faculty::all();
        $news = News::all();
        $programs = Program::all();
        
        return view('admin.dashboard', compact('stats', 'faculty', 'news', 'programs'));
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
    
    public function adminCurriculum()
    {
        $curriculums = Curriculum::all(); // Get all curriculums for editing
        return view('admin.curriculum', compact('curriculums'));
    }
    
    public function adminLaboratories()
    {
        $laboratories = Laboratory::all();
        return view('admin.laboratories', compact('laboratories'));
    }
    
    public function adminFacultyResearch()
    {
        $facultyResearch = FacultyResearch::with('faculty')->get();
        $faculty = Faculty::all(); // For dropdown selection
        return view('admin.faculty-research', compact('facultyResearch', 'faculty'));
    }
    
    public function adminStudentProjects()
    {
        $studentProjects = StudentProject::all();
        return view('admin.student-projects', compact('studentProjects'));
    }
    
    public function adminAlumni()
    {
        $alumni = Alumni::all();
        return view('admin.alumni', compact('alumni'));
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
    
    // Curriculum CRUD Methods
    public function updateCurriculum(Request $request, $id)
    {
        $request->validate([
            'degree_name_th' => 'required|string|max:255',
            'degree_name_en' => 'required|string|max:255',
            'degree_abbr_th' => 'nullable|string|max:50',
            'degree_abbr_en' => 'nullable|string|max:50',
            'program_type' => 'required|string|max:255',
            'duration_years' => 'required|integer|min:1|max:10',
            'credits' => 'required|integer|min:1|max:300',
            'language' => 'required|string|max:200',
            'tuition_fee' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'curriculum_year' => 'nullable|string|max:50',
            'pdf_url' => 'nullable|url|max:500',
            'video_url' => 'nullable|url|max:500'
        ]);

        $curriculum = Curriculum::findOrFail($id);
        
        $curriculum->update([
            'degree_name_th' => $request->degree_name_th,
            'degree_name_en' => $request->degree_name_en,
            'degree_abbr_th' => $request->degree_abbr_th,
            'degree_abbr_en' => $request->degree_abbr_en,
            'program_type' => $request->program_type,
            'duration_years' => $request->duration_years,
            'credits' => $request->credits,
            'language' => $request->language,
            'tuition_fee' => $request->tuition_fee,
            'description' => $request->description,
            'curriculum_year' => $request->curriculum_year,
            'pdf_url' => $request->pdf_url,
            'video_url' => $request->video_url
        ]);
        
        return redirect()->route('admin.curriculum')->with('success', 'แก้ไขข้อมูลหลักสูตรสำเร็จ');
    }
}