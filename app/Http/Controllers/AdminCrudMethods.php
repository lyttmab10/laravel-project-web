<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait AdminCrudMethods
{
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