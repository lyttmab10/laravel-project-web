<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SE Department</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
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
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">ภาพรวมระบบ</h2>
                <p class="text-gray-600">สถิติและข้อมูลสำคัญของเว็บไซต์</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
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

                <div class="bg-white rounded-lg shadow p-6">
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

                <div class="bg-white rounded-lg shadow p-6">
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
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-800">การจัดการเนื้อหา</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('admin.faculty') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">👨‍🏫</span>
                                <div>
                                    <h4 class="font-medium text-gray-800">จัดการอาจารย์</h4>
                                    <p class="text-sm text-gray-600">เพิ่ม แก้ไข ลบข้อมูลอาจารย์</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.programs') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">🎯</span>
                                <div>
                                    <h4 class="font-medium text-gray-800">จัดการผลงาน</h4>
                                    <p class="text-sm text-gray-600">เพิ่ม แก้ไข ลบผลงานและกิจกรรม</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.news') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">📰</span>
                                <div>
                                    <h4 class="font-medium text-gray-800">จัดการข่าวสาร</h4>
                                    <p class="text-sm text-gray-600">เพิ่ม แก้ไข ลบข่าวสารและกิจกรรม</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="mt-8 bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-800">กิจกรรมล่าสุด</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <span class="text-green-600 mr-3">✅</span>
                            <div>
                                <p class="text-sm font-medium text-gray-800">เพิ่มข่าวสารใหม่</p>
                                <p class="text-xs text-gray-600">5 นาทีที่แล้ว</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <span class="text-blue-600 mr-3">📝</span>
                            <div>
                                <p class="text-sm font-medium text-gray-800">แก้ไขข้อมูลอาจารย์</p>
                                <p class="text-xs text-gray-600">15 นาทีที่แล้ว</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-yellow-50 rounded-lg">
                            <span class="text-yellow-600 mr-3">🔄</span>
                            <div>
                                <p class="text-sm font-medium text-gray-800">อัปเดตผลงาน</p>
                                <p class="text-xs text-gray-600">1 ชั่วโมงที่แล้ว</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>