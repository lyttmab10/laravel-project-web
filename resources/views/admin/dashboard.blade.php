<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - SE Department</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            500: '#dc2626',
                            600: '#b91c1c',
                            700: '#991b1b',
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Sans Thai', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <h1 class="text-xl font-bold text-gray-800">Admin Dashboard</h1>
                    <span class="text-sm text-gray-500">SE Department</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-800">← Back to Website</a>
                    <a href="{{ route('admin.login') }}" class="text-sm text-red-600 hover:text-red-800">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <nav class="w-64 bg-white shadow-sm h-screen">
            <div class="p-6">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-gray-700 bg-primary-50 border-r-4 border-primary-500 rounded-l">
                            <span class="mr-3">📊</span>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faculty') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">👨‍🏫</span>
                            อาจารย์ประจำสาขา
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.programs') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">🎯</span>
                            ผลงาน
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.news') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">📰</span>
                            ข่าวสารและกิจกรรม
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.curriculum') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">📚</span>
                            หลักสูตร
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.laboratories') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">🔬</span>
                            ห้องปฏิบัติการ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faculty.research') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">📊</span>
                            ผลงานอาจารย์
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.student.projects') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">💻</span>
                            ผลงานนักศึกษา
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.alumni') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">👨‍🎓</span>
                            ข้อมูลศิษย์เก่า
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">ภาพรวมระบบและการจัดการข้อมูล</h2>
                <p class="text-gray-600">จัดการข้อมูลสำคัญของเว็บไซต์และดูสถิติการใช้งาน</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6 border border-gray-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <span class="text-2xl">👨‍🏫</span>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">อาจารย์ประจำสาขา</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $stats['faculty_count'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border border-gray-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">ผลงาน</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $stats['programs_count'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border border-gray-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full">
                            <span class="text-2xl">📰</span>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">ข่าวสารและกิจกรรม</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $stats['news_count'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border border-gray-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <span class="text-2xl">👨‍🎓</span>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">ข้อมูลศิษย์เก่า</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $stats['alumni_count'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Data Management Sections -->
            <div class="space-y-8">
                <!-- Faculty Management Section -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800">👨‍🏫 อาจารย์ประจำสาขา</h3>
                        <div class="flex items-center space-x-3">
                            <button onclick="openAddFacultyModal()" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 text-sm">เพิ่มอาจารย์ใหม่</button>
                            <a href="{{ route('admin.faculty') }}" class="text-primary-600 hover:text-primary-700 text-sm">ดูทั้งหมด →</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div id="facultyList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($faculty->take(6) as $member)
                            <div class="border border-gray-200 rounded-lg p-4" data-faculty-id="{{ $member['id'] }}">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-12 h-12 rounded-full object-cover">
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-800">{{ $member['name'] }}</h4>
                                        <p class="text-sm text-gray-600">{{ $member['position'] }}</p>
                                    </div>
                                    <div class="flex space-x-1">
                                        <button onclick="editFaculty({{ json_encode($member) }})" class="text-indigo-600 hover:text-indigo-900 text-xs px-2 py-1">แก้ไข</button>
                                        <button onclick="deleteFaculty({{ $member['id'] }})" class="text-red-600 hover:text-red-900 text-xs px-2 py-1">ลบ</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- News Management Section -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800">📰 ข่าวสารและกิจกรรม</h3>
                        <div class="flex items-center space-x-3">
                            <button onclick="openAddNewsModal()" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 text-sm">เพิ่มข่าวใหม่</button>
                            <a href="{{ route('admin.news') }}" class="text-primary-600 hover:text-primary-700 text-sm">ดูทั้งหมด →</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div id="newsList" class="space-y-4">
                            @foreach($news->take(3) as $item)
                            <div class="border border-gray-200 rounded-lg p-4" data-news-id="{{ $item['id'] }}">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <h4 class="font-medium text-gray-800 mr-4">{{ $item['title'] }}</h4>
                                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">{{ $item['date'] }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">{{ $item['summary'] }}</p>
                                        <div class="text-xs text-gray-500">{{ str($item['content'])->limit(100) }}</div>
                                    </div>
                                    <div class="ml-4 flex space-x-1">
                                        <button onclick="editNews({{ json_encode($item) }})" class="text-indigo-600 hover:text-indigo-900 text-xs px-2 py-1">แก้ไข</button>
                                        <button onclick="deleteNews({{ $item['id'] }})" class="text-red-600 hover:text-red-900 text-xs px-2 py-1">ลบ</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Programs Management Section -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800">🎯 ผลงาน</h3>
                        <div class="flex items-center space-x-3">
                            <button onclick="openAddProgramModal()" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 text-sm">เพิ่มผลงานใหม่</button>
                            <a href="{{ route('admin.programs') }}" class="text-primary-600 hover:text-primary-700 text-sm">ดูทั้งหมด →</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div id="programsList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($programs->take(6) as $program)
                            <div class="border border-gray-200 rounded-lg overflow-hidden" data-program-id="{{ $program['id'] }}">
                                <img src="{{ $program['image'] }}" alt="{{ $program['title'] }}" class="w-full h-32 object-cover">
                                <div class="p-3">
                                    <div class="flex items-center justify-between mb-2">
                                        <h4 class="font-medium text-gray-800 text-sm">{{ $program['title'] }}</h4>
                                        <span class="bg-primary-100 text-primary-700 px-2 py-1 rounded text-xs">{{ $program['duration'] }}</span>
                                    </div>
                                    <p class="text-xs text-gray-600 mb-2">{{ str($program['description'])->limit(60) }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-gray-500">{{ $program['date'] }}</span>
                                        <div class="flex space-x-1">
                                            <button onclick="editProgram({{ json_encode($program) }})" class="text-indigo-600 hover:text-indigo-900 text-xs px-1 py-1">แก้ไข</button>
                                            <button onclick="deleteProgram({{ $program['id'] }})" class="text-red-600 hover:text-red-900 text-xs px-1 py-1">ลบ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            <div id="successMessage" class="hidden bg-green-50 border-l-4 border-green-400 p-4 mt-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <span class="text-green-400">✅</span>
                    </div>
                    <div class="ml-3">
                        <p id="successText" class="text-sm text-green-700"></p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Faculty Modal -->
    <div id="facultyModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-md w-full">
                <div class="px-6 py-4 border-b">
                    <h3 id="facultyModalTitle" class="text-lg font-semibold">เพิ่มอาจารย์ใหม่</h3>
                </div>
                <form id="facultyForm" class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อ-นามสกุล</label>
                        <input type="text" id="facultyName" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ตำแหน่ง</label>
                        <input type="text" id="facultyPosition" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                        <input type="url" id="facultyImage" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeFacultyModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">ยกเลิก</button>
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- News Modal -->
    <div id="newsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-2xl w-full max-h-96 overflow-y-auto">
                <div class="px-6 py-4 border-b">
                    <h3 id="newsModalTitle" class="text-lg font-semibold">เพิ่มข่าวใหม่</h3>
                </div>
                <form id="newsForm" class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">หัวข้อข่าว</label>
                        <input type="text" id="newsTitle" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">วันที่</label>
                            <input type="text" id="newsDate" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                            <input type="url" id="newsImage" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">สรุปข่าว</label>
                        <textarea id="newsSummary" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md" required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">เนื้อหาข่าว</label>
                        <textarea id="newsContent" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md" required></textarea>
                    </div>
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeNewsModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">ยกเลิก</button>
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Program Modal -->
    <div id="programModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-lg w-full max-h-96 overflow-y-auto">
                <div class="px-6 py-4 border-b">
                    <h3 id="programModalTitle" class="text-lg font-semibold">เพิ่มผลงานใหม่</h3>
                </div>
                <form id="programForm" class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อผลงาน</label>
                        <input type="text" id="programTitle" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ระยะเวลา</label>
                        <input type="text" id="programDuration" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">คำอธิบาย</label>
                        <textarea id="programDescription" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">กิจกรรม</label>
                        <input type="text" id="programActivity" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                        <input type="url" id="programImage" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">วันที่</label>
                        <input type="text" id="programDate" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeProgramModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">ยกเลิก</button>
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let editingFacultyId = null;
        let editingNewsId = null;
        let editingProgramId = null;
        
        function showSuccessMessage(message) {
            const successDiv = document.getElementById('successMessage');
            const successText = document.getElementById('successText');
            successText.textContent = message;
            successDiv.classList.remove('hidden');
            
            setTimeout(() => {
                successDiv.classList.add('hidden');
            }, 5000);
        }
        
        // Faculty Functions
        function openAddFacultyModal() {
            editingFacultyId = null;
            document.getElementById('facultyModalTitle').textContent = 'เพิ่มอาจารย์ใหม่';
            document.getElementById('facultyForm').reset();
            document.getElementById('facultyModal').classList.remove('hidden');
        }
        
        function editFaculty(faculty) {
            editingFacultyId = faculty.id;
            document.getElementById('facultyModalTitle').textContent = 'แก้ไขข้อมูลอาจารย์';
            document.getElementById('facultyName').value = faculty.name;
            document.getElementById('facultyPosition').value = faculty.position;
            document.getElementById('facultyImage').value = faculty.image;
            document.getElementById('facultyModal').classList.remove('hidden');
        }
        
        function deleteFaculty(id) {
            if (confirm('คุณต้องการลบอาจารย์คนนี้หรือไม่?')) {
                fetch(`/admin/faculty/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showSuccessMessage(data.message);
                        location.reload();
                    } else {
                        alert('เกิดข้อผิดพลาด: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
                });
            }
        }
        
        function closeFacultyModal() {
            document.getElementById('facultyModal').classList.add('hidden');
        }
        
        // News Functions
        function openAddNewsModal() {
            editingNewsId = null;
            document.getElementById('newsModalTitle').textContent = 'เพิ่มข่าวใหม่';
            document.getElementById('newsForm').reset();
            document.getElementById('newsModal').classList.remove('hidden');
        }
        
        function editNews(news) {
            editingNewsId = news.id;
            document.getElementById('newsModalTitle').textContent = 'แก้ไขข่าว';
            document.getElementById('newsTitle').value = news.title;
            document.getElementById('newsDate').value = news.date;
            document.getElementById('newsSummary').value = news.summary;
            document.getElementById('newsContent').value = news.content;
            document.getElementById('newsImage').value = news.image;
            document.getElementById('newsModal').classList.remove('hidden');
        }
        
        function deleteNews(id) {
            if (confirm('คุณต้องการลบข่าวนี้หรือไม่?')) {
                fetch(`/admin/news/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showSuccessMessage(data.message);
                        location.reload();
                    } else {
                        alert('เกิดข้อผิดพลาด: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
                });
            }
        }
        
        function closeNewsModal() {
            document.getElementById('newsModal').classList.add('hidden');
        }
        
        // Program Functions
        function openAddProgramModal() {
            editingProgramId = null;
            document.getElementById('programModalTitle').textContent = 'เพิ่มผลงานใหม่';
            document.getElementById('programForm').reset();
            document.getElementById('programModal').classList.remove('hidden');
        }
        
        function editProgram(program) {
            editingProgramId = program.id;
            document.getElementById('programModalTitle').textContent = 'แก้ไขผลงาน';
            document.getElementById('programTitle').value = program.title;
            document.getElementById('programDuration').value = program.duration;
            document.getElementById('programDescription').value = program.description;
            document.getElementById('programActivity').value = program.activity;
            document.getElementById('programImage').value = program.image;
            document.getElementById('programDate').value = program.date;
            document.getElementById('programModal').classList.remove('hidden');
        }
        
        function deleteProgram(id) {
            if (confirm('คุณต้องการลบผลงานนี้หรือไม่?')) {
                fetch(`/admin/programs/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showSuccessMessage(data.message);
                        location.reload();
                    } else {
                        alert('เกิดข้อผิดพลาด: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
                });
            }
        }
        
        function closeProgramModal() {
            document.getElementById('programModal').classList.add('hidden');
        }
        
        // Form Submissions
        document.getElementById('facultyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                name: document.getElementById('facultyName').value,
                position: document.getElementById('facultyPosition').value,
                image: document.getElementById('facultyImage').value
            };
            
            const isEditing = editingFacultyId !== null;
            const url = isEditing ? `/admin/faculty/${editingFacultyId}` : '/admin/faculty';
            const method = isEditing ? 'PUT' : 'POST';
            
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage(data.message);
                    closeFacultyModal();
                    location.reload();
                } else {
                    alert('เกิดข้อผิดพลาด: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
            });
        });
        
        document.getElementById('newsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                title: document.getElementById('newsTitle').value,
                date: document.getElementById('newsDate').value,
                summary: document.getElementById('newsSummary').value,
                content: document.getElementById('newsContent').value,
                image: document.getElementById('newsImage').value
            };
            
            const isEditing = editingNewsId !== null;
            const url = isEditing ? `/admin/news/${editingNewsId}` : '/admin/news';
            const method = isEditing ? 'PUT' : 'POST';
            
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage(data.message);
                    closeNewsModal();
                    location.reload();
                } else {
                    alert('เกิดข้อผิดพลาด: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
            });
        });
        
        document.getElementById('programForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                title: document.getElementById('programTitle').value,
                duration: document.getElementById('programDuration').value,
                description: document.getElementById('programDescription').value,
                activity: document.getElementById('programActivity').value,
                image: document.getElementById('programImage').value,
                date: document.getElementById('programDate').value
            };
            
            const isEditing = editingProgramId !== null;
            const url = isEditing ? `/admin/programs/${editingProgramId}` : '/admin/programs';
            const method = isEditing ? 'PUT' : 'POST';
            
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showSuccessMessage(data.message);
                    closeProgramModal();
                    location.reload();
                } else {
                    alert('เกิดข้อผิดพลาด: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
            });
        });
        
        // Modal click outside to close
        document.getElementById('facultyModal').addEventListener('click', function(e) {
            if (e.target === this) closeFacultyModal();
        });
        
        document.getElementById('newsModal').addEventListener('click', function(e) {
            if (e.target === this) closeNewsModal();
        });
        
        document.getElementById('programModal').addEventListener('click', function(e) {
            if (e.target === this) closeProgramModal();
        });
    </script>
</body>
</html>