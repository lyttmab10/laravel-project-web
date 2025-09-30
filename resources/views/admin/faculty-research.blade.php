<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผลงานอาจารย์ - Admin Dashboard</title>
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
                <h1 class="text-xl font-bold text-gray-800">จัดการผลงานอาจารย์</h1>
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
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
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
                        <a href="{{ route('admin.faculty.research') }}" class="flex items-center p-3 text-gray-700 bg-primary-50 border-r-4 border-primary-500 rounded-l">
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
                <h2 class="text-2xl font-bold text-gray-800 mb-2">ข้อมูลผลงานอาจารย์</h2>
                <p class="text-gray-600">จัดการข้อมูลผลงานวิจัยของอาจารย์ประจำสาขาวิศวกรรมซอฟต์แวร์</p>
            </div>
            
            @if($facultyResearch && count($facultyResearch) > 0)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ชื่องาน</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ประเภท</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">อาจารย์</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">รายละเอียด</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">รูปภาพ</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($facultyResearch as $research)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $research->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $research->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-100 text-primary-800">
                                        {{ $research->type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $research->faculty->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ str($research->description)->limit(50) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($research->image)
                                        <img src="{{ $research->image }}" alt="Research Image" class="h-10 w-10 rounded object-cover">
                                    @else
                                        ไม่มีรูปภาพ
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">แก้ไข</button>
                                    <button class="text-red-600 hover:text-red-900">ลบ</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-center py-8">
                    <p class="text-gray-500">ไม่มีข้อมูลผลงานอาจารย์ในระบบ</p>
                    <p class="text-sm text-gray-400 mt-2">กรุณาเพิ่มข้อมูลผลงานอาจารย์ใหม่</p>
                </div>
            </div>
            @endif

            <div class="mt-6">
                <button class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2 px-4 rounded">
                    เพิ่มผลงานอาจารย์ใหม่
                </button>
            </div>
        </main>
    </div>
</body>
</html>