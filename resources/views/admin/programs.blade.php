<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>จัดการผลงาน - Admin Dashboard</title>
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
                    <h1 class="text-xl font-bold text-gray-800">จัดการผลงาน</h1>
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
                        <a href="{{ route('admin.faculty') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 rounded">
                            <span class="mr-3">👨‍🏫</span>
                            อาจารย์ประจำสาขา
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.programs') }}" class="flex items-center p-3 text-gray-700 bg-primary-50 border-r-4 border-primary-500 rounded-l">
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
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">ผลงาน</h2>
                        <p class="text-gray-600">จัดการผลงานและกิจกรรมของสาขาวิศวกรรมซอฟต์แวร์</p>
                    </div>
                    <button onclick="openAddModal()" class="bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700">
                        เพิ่มผลงานใหม่
                    </button>
                </div>
            </div>

            <!-- Programs Grid -->
            <div id="programsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($programs as $program)
                <div class="bg-white rounded-lg shadow overflow-hidden" data-program-id="{{ $program['id'] }}">
                    <img src="{{ $program['image'] }}" alt="{{ $program['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $program['title'] }}</h3>
                            <span class="bg-primary-100 text-primary-700 px-2 py-1 rounded text-sm">{{ $program['duration'] }}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">{{ str($program['description'])->limit(100) }}</p>
                        <div class="bg-primary-50 border-l-4 border-primary-500 p-2 mb-3">
                            <p class="text-primary-800 text-sm">{{ $program['activity'] }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">{{ $program['date'] }}</span>
                            <div class="space-x-2">
                                <button onclick="editProgram({{ json_encode($program) }})" class="text-indigo-600 hover:text-indigo-900 text-sm">แก้ไข</button>
                                <button onclick="deleteProgram({{ $program['id'] }})" class="text-red-600 hover:text-red-900 text-sm">ลบ</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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

    <!-- Add/Edit Modal -->
    <div id="programModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg max-w-lg w-full max-h-96 overflow-y-auto">
                <div class="px-6 py-4 border-b">
                    <h3 id="modalTitle" class="text-lg font-semibold">เพิ่มผลงานใหม่</h3>
                </div>
                <form id="programForm" class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อผลงาน</label>
                        <input type="text" id="programTitle" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">ระยะเวลา</label>
                        <input type="text" id="programDuration" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="ปี 4" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">คำอธิบาย</label>
                        <textarea id="programDescription" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">กิจกรรม</label>
                        <input type="text" id="programActivity" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="กิจกรรม: ...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                        <input type="url" id="programImage" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="/images/program-new.jpg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">วันที่</label>
                        <input type="text" id="programDate" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="มกราคม 2567">
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
        let editingProgramId = null;
        
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
        
        function addProgramToGrid(program) {
            const grid = document.getElementById('programsGrid');
            const div = document.createElement('div');
            div.setAttribute('data-program-id', program.id);
            div.className = 'bg-white rounded-lg shadow overflow-hidden';
            
            div.innerHTML = `
                <img src="${program.image}" alt="${program.title}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-semibold text-gray-800">${program.title}</h3>
                        <span class="bg-primary-100 text-primary-700 px-2 py-1 rounded text-sm">${program.duration}</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">${program.description.length > 100 ? program.description.substring(0, 100) + '...' : program.description}</p>
                    <div class="bg-primary-50 border-l-4 border-primary-500 p-2 mb-3">
                        <p class="text-primary-800 text-sm">${program.activity}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-500">${program.date}</span>
                        <div class="space-x-2">
                            <button onclick="editProgram(${JSON.stringify(program).replace(/"/g, '&quot;')})" class="text-indigo-600 hover:text-indigo-900 text-sm">แก้ไข</button>
                            <button onclick="deleteProgram(${program.id})" class="text-red-600 hover:text-red-900 text-sm">ลบ</button>
                        </div>
                    </div>
                </div>
            `;
            
            grid.appendChild(div);
        }
        
        function updateProgramInGrid(program) {
            const card = document.querySelector(`div[data-program-id="${program.id}"]`);
            if (card) {
                card.innerHTML = `
                    <img src="${program.image}" alt="${program.title}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">${program.title}</h3>
                            <span class="bg-primary-100 text-primary-700 px-2 py-1 rounded text-sm">${program.duration}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-3">${program.description.length > 100 ? program.description.substring(0, 100) + '...' : program.description}</p>
                        <div class="bg-primary-50 border-l-4 border-primary-500 p-2 mb-3">
                            <p class="text-primary-800 text-sm">${program.activity}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">${program.date}</span>
                            <div class="space-x-2">
                                <button onclick="editProgram(${JSON.stringify(program).replace(/"/g, '&quot;')})" class="text-indigo-600 hover:text-indigo-900 text-sm">แก้ไข</button>
                                <button onclick="deleteProgram(${program.id})" class="text-red-600 hover:text-red-900 text-sm">ลบ</button>
                            </div>
                        </div>
                    </div>
                `;
            }
        }
        
        function removeProgramFromGrid(programId) {
            const card = document.querySelector(`div[data-program-id="${programId}"]`);
            if (card) {
                card.remove();
            }
        }

        function openAddModal() {
            editingProgramId = null;
            document.getElementById('modalTitle').textContent = 'เพิ่มผลงานใหม่';
            document.getElementById('programForm').reset();
            document.getElementById('programModal').classList.remove('hidden');
        }

        function editProgram(program) {
            editingProgramId = program.id;
            document.getElementById('modalTitle').textContent = 'แก้ไขผลงาน';
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
                        removeProgramFromGrid(id);
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
            document.getElementById('programModal').classList.add('hidden');
        }

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
                    closeModal();
                    
                    if (isEditing) {
                        // Update existing card with returned data
                        updateProgramInGrid(data.program);
                    } else {
                        // Add new card with returned data
                        addProgramToGrid(data.program);
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
        document.getElementById('programModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>