<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>จัดการอาจารย์ - Admin Dashboard</title>
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
                    <h1 class="text-xl font-bold text-gray-800">จัดการอาจารย์ประจำสาขา</h1>
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
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">📊</span>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faculty') }}" class="flex items-center p-3 text-gray-700 bg-primary-50 border-r-4 border-primary-500 rounded-l">
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
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">อาจารย์ประจำสาขา</h2>
                        <p class="text-gray-600">จัดการข้อมูลอาจารย์ประจำสาขาวิศวกรรมซอฟต์แวร์</p>
                    </div>
                    <button onclick="openAddModal()" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                        เพิ่มอาจารย์ใหม่
                    </button>
                </div>
            </div>

            <!-- Faculty Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <!-- Success Message -->
                <div id="successMessage" class="hidden bg-green-50 border-l-4 border-green-400 p-4 m-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <span class="text-green-400">✅</span>
                        </div>
                        <div class="ml-3">
                            <p id="successText" class="text-sm text-green-700"></p>
                        </div>
                    </div>
                </div>
                
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">อาจารย์</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ตำแหน่ง</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">รูปภาพ</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody id="facultyTableBody" class="bg-white divide-y divide-gray-200">
                        @foreach($faculty as $member)
                        <tr data-faculty-id="{{ $member['id'] }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $member['name'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $member['position'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-12 h-12 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="editFaculty({{ json_encode($member) }})" class="text-indigo-600 hover:text-indigo-900 mr-3">แก้ไข</button>
                                <button onclick="deleteFaculty({{ json_encode($member['id']) }})" class="text-red-600 hover:text-red-900">ลบ</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Add/Edit Modal -->
    <div id="facultyModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-md w-full">
                <div class="px-6 py-4 border-b">
                    <h3 id="modalTitle" class="text-lg font-semibold">เพิ่มอาจารย์ใหม่</h3>
                </div>
                <form id="facultyForm" class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อ-นามสกุล</label>
                        <input type="text" id="facultyName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ตำแหน่ง</label>
                        <input type="text" id="facultyPosition" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                        <input type="url" id="facultyImage" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="/images/faculty-new.jpg">
                    </div>
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">ยกเลิก</button>
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let editingFacultyId = null;
        
        function showSuccessMessage(message) {
            const successDiv = document.getElementById('successMessage');
            const successText = document.getElementById('successText');
            successText.textContent = message;
            successDiv.classList.remove('hidden');
            
            // Hide message after 5 seconds
            setTimeout(() => {
                successDiv.classList.add('hidden');
            }, 5000);
        }
        
        function addFacultyToTable(faculty) {
            const tbody = document.getElementById('facultyTableBody');
            const row = document.createElement('tr');
            row.setAttribute('data-faculty-id', faculty.id);
            
            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">${faculty.name}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${faculty.position}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <img src="${faculty.image}" alt="${faculty.name}" class="w-12 h-12 rounded-full object-cover">
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="editFaculty(${JSON.stringify(faculty).replace(/"/g, '&quot;')})" class="text-indigo-600 hover:text-indigo-900 mr-3">แก้ไข</button>
                    <button onclick="deleteFaculty(${faculty.id})" class="text-red-600 hover:text-red-900">ลบ</button>
                </td>
            `;
            
            tbody.appendChild(row);
        }
        
        function updateFacultyInTable(faculty) {
            const row = document.querySelector(`tr[data-faculty-id="${faculty.id}"]`);
            if (row) {
                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${faculty.name}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${faculty.position}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="${faculty.image}" alt="${faculty.name}" class="w-12 h-12 rounded-full object-cover">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="editFaculty(${JSON.stringify(faculty).replace(/"/g, '&quot;')})" class="text-indigo-600 hover:text-indigo-900 mr-3">แก้ไข</button>
                        <button onclick="deleteFaculty(${faculty.id})" class="text-red-600 hover:text-red-900">ลบ</button>
                    </td>
                `;
            }
        }
        
        function removeFacultyFromTable(facultyId) {
            const row = document.querySelector(`tr[data-faculty-id="${facultyId}"]`);
            if (row) {
                row.remove();
            }
        }

        function openAddModal() {
            editingFacultyId = null;
            document.getElementById('modalTitle').textContent = 'เพิ่มอาจารย์ใหม่';
            document.getElementById('facultyForm').reset();
            document.getElementById('facultyModal').classList.remove('hidden');
        }

        function editFaculty(faculty) {
            editingFacultyId = faculty.id;
            document.getElementById('modalTitle').textContent = 'แก้ไขข้อมูลอาจารย์';
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
                        removeFacultyFromTable(id);
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

        function closeModal() {
            document.getElementById('facultyModal').classList.add('hidden');
        }

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
                    closeModal();
                    
                    if (isEditing) {
                        // Update existing row with returned data
                        updateFacultyInTable(data.faculty);
                    } else {
                        // Add new row with returned data
                        addFacultyToTable(data.faculty);
                    }
                } else {
                    alert('เกิดข้อผิดพลาด: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('เกิดข้อผิดพลาดในการเชื่อมต่อ');
            });
        });

        // Close modal when clicking outside
        document.getElementById('facultyModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>