<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>จัดการข่าวสาร - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <h1 class="text-xl font-bold text-gray-800">จัดการข่าวสารและกิจกรรม</h1>
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
                    <li><a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded"><span class="mr-3">📊</span>Dashboard</a></li>
                    <li><a href="{{ route('admin.faculty') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded"><span class="mr-3">👨‍🏫</span>อาจารย์ประจำสาขา</a></li>
                    <li><a href="{{ route('admin.programs') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded"><span class="mr-3">🎯</span>ผลงาน</a></li>
                    <li><a href="{{ route('admin.news') }}" class="flex items-center p-3 text-gray-700 bg-blue-50 border-r-4 border-blue-500 rounded-l"><span class="mr-3">📰</span>ข่าวสารและกิจกรรม</a></li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">ข่าวสารและกิจกรรม</h2>
                    <p class="text-gray-600">จัดการข่าวสารและกิจกรรมของสาขาวิศวกรรมซอฟต์แวร์</p>
                </div>
                <button onclick="openAddModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">เพิ่มข่าวใหม่</button>
            </div>

            <!-- News List -->
            <div class="space-y-4">
                @foreach($news as $item)
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-800 mr-4">{{ $item['title'] }}</h3>
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-sm">{{ $item['date'] }}</span>
                            </div>
                            <p class="text-gray-600 mb-3">{{ $item['summary'] }}</p>
                            <div class="text-sm text-gray-500">{{ Str::limit($item['content'], 150) }}</div>
                        </div>
                        <div class="ml-6 flex space-x-2">
                            <button onclick="editNews({{ $item['id'] }})" class="text-indigo-600 hover:text-indigo-900 text-sm px-3 py-1 border border-indigo-200 rounded">แก้ไข</button>
                            <button onclick="deleteNews({{ $item['id'] }})" class="text-red-600 hover:text-red-900 text-sm px-3 py-1 border border-red-200 rounded">ลบ</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>

    <!-- Add/Edit Modal -->
    <div id="newsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-2xl w-full max-h-96 overflow-y-auto">
                <div class="px-6 py-4 border-b">
                    <h3 id="modalTitle" class="text-lg font-semibold">เพิ่มข่าวใหม่</h3>
                </div>
                <form id="newsForm" class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">หัวข้อข่าว</label>
                        <input type="text" id="newsTitle" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">วันที่</label>
                            <input type="text" id="newsDate" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="15 ก.ย. 2567" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                            <input type="url" id="newsImage" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="/images/news-new.jpg">
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
                        <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">ยกเลิก</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'เพิ่มข่าวใหม่';
            document.getElementById('newsForm').reset();
            document.getElementById('newsModal').classList.remove('hidden');
        }

        function editNews(id) {
            document.getElementById('modalTitle').textContent = 'แก้ไขข่าว';
            document.getElementById('newsModal').classList.remove('hidden');
            alert('แก้ไขข่าว ID: ' + id + '\n\nในระบบจริง จะแสดงข้อมูลเดิมในฟอร์ม');
        }

        function deleteNews(id) {
            if (confirm('คุณต้องการลบข่าวนี้หรือไม่?')) {
                alert('ลบข่าว ID: ' + id + ' สำเร็จ\n\nในระบบจริง จะลบข้อมูลจากฐานข้อมูล');
            }
        }

        function closeModal() {
            document.getElementById('newsModal').classList.add('hidden');
        }

        document.getElementById('newsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const title = document.getElementById('newsTitle').value;
            const date = document.getElementById('newsDate').value;
            const summary = document.getElementById('newsSummary').value;
            
            alert('บันทึกข่าวสำเร็จ!\n\nหัวข้อ: ' + title + '\nวันที่: ' + date + '\n\nในระบบจริง จะบันทึกลงฐานข้อมูล');
            closeModal();
        });

        document.getElementById('newsModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    </script>
</body>
</html>