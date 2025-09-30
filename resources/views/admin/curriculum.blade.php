<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>จัดการหลักสูตร - Admin Dashboard</title>
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
                    <h1 class="text-xl font-bold text-gray-800">จัดการข้อมูลหลักสูตร</h1>
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
                        <a href="{{ route('admin.curriculum') }}" class="flex items-center p-3 text-gray-700 bg-primary-50 border-r-4 border-primary-500 rounded-l">
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
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">ข้อมูลทั่วไปของหลักสูตร</h2>
                        <p class="text-gray-600">จัดการข้อมูลหลักสูตรวิศวกรรมซอฟต์แวร์</p>
                    </div>
                </div>
            </div>
            
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <span class="text-green-400">✅</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <span class="text-red-400">⚠️</span>
                        </div>
                        <div class="ml-3">
                            <ul class="text-sm text-red-700">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow overflow-hidden">
                @foreach($curriculums as $curriculum)
                <div class="border-b border-gray-200 p-6">
                    <form action="{{ route('curriculum.update', $curriculum->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">แก้ไขข้อมูลหลักสูตร ID: {{ $curriculum->id }}</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- ชื่อปริญญา (ไทย) -->
                            <div>
                                <label for="degree_name_th_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ชื่อปริญญา (ไทย)
                                </label>
                                <input type="text" 
                                       name="degree_name_th" 
                                       id="degree_name_th_{{ $curriculum->id }}"
                                       value="{{ old('degree_name_th', $curriculum->degree_name_th) }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                       required>
                            </div>

                            <!-- ชื่อปริญญา (อังกฤษ) -->
                            <div>
                                <label for="degree_name_en_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ชื่อปริญญา (อังกฤษ)
                                </label>
                                <input type="text" 
                                       name="degree_name_en" 
                                       id="degree_name_en_{{ $curriculum->id }}"
                                       value="{{ old('degree_name_en', $curriculum->degree_name_en) }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                       required>
                            </div>

                            <!-- ตัวย่อปริญญา (ไทย) -->
                            <div>
                                <label for="degree_abbr_th_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ตัวย่อปริญญา (ไทย)
                                </label>
                                <input type="text" 
                                       name="degree_abbr_th" 
                                       id="degree_abbr_th_{{ $curriculum->id }}"
                                       value="{{ old('degree_abbr_th', $curriculum->degree_abbr_th) }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- ตัวย่อปริญญา (อังกฤษ) -->
                            <div>
                                <label for="degree_abbr_en_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ตัวย่อปริญญา (อังกฤษ)
                                </label>
                                <input type="text" 
                                       name="degree_abbr_en" 
                                       id="degree_abbr_en_{{ $curriculum->id }}"
                                       value="{{ old('degree_abbr_en', $curriculum->degree_abbr_en) }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- ประเภทหลักสูตร -->
                            <div>
                                <label for="program_type_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ประเภทหลักสูตร
                                </label>
                                <select name="program_type" 
                                        id="program_type_{{ $curriculum->id }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                    <option value="ปริญญาตรี" {{ old('program_type', $curriculum->program_type) == 'ปริญญาตรี' ? 'selected' : '' }}>ปริญญาตรี</option>
                                    <option value="ปริญญาโท" {{ old('program_type', $curriculum->program_type) == 'ปริญญาโท' ? 'selected' : '' }}>ปริญญาโท</option>
                                    <option value="ปริญญาเอก" {{ old('program_type', $curriculum->program_type) == 'ปริญญาเอก' ? 'selected' : '' }}>ปริญญาเอก</option>
                                    <option value="ระดับปริญญาตรี หลักสูตร 4 ปี" {{ old('program_type', $curriculum->program_type) == 'ระดับปริญญาตรี หลักสูตร 4 ปี' ? 'selected' : '' }}>ระดับปริญญาตรี หลักสูตร 4 ปี</option>
                                </select>
                            </div>

                            <!-- ระยะเวลาศึกษา -->
                            <div>
                                <label for="duration_years_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ระยะเวลาศึกษา (ปี)
                                </label>
                                <input type="number" 
                                       name="duration_years" 
                                       id="duration_years_{{ $curriculum->id }}"
                                       value="{{ old('duration_years', $curriculum->duration_years) }}" 
                                       min="1" max="10"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                       required>
                            </div>

                            <!-- จำนวนหน่วยกิต -->
                            <div>
                                <label for="credits_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    จำนวนหน่วยกิต
                                </label>
                                <input type="number" 
                                       name="credits" 
                                       id="credits_{{ $curriculum->id }}"
                                       value="{{ old('credits', $curriculum->credits) }}" 
                                       min="1"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                       required>
                            </div>

                            <!-- ภาษาที่ใช้ในการเรียนการสอน -->
                            <div>
                                <label for="language_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ภาษาที่ใช้ในการเรียนการสอน
                                </label>
                                <select name="language" 
                                        id="language_{{ $curriculum->id }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                                    <option value="ไทย" {{ old('language', $curriculum->language) == 'ไทย' ? 'selected' : '' }}>ไทย</option>
                                    <option value="อังกฤษ" {{ old('language', $curriculum->language) == 'อังกฤษ' ? 'selected' : '' }}>อังกฤษ</option>
                                    <option value="ไทย-อังกฤษ" {{ old('language', $curriculum->language) == 'ไทย-อังกฤษ' ? 'selected' : '' }}>ไทย-อังกฤษ</option>
                                    <option value="ไทย/Thai/๬fຊ語 (Tàiyǔ)" {{ old('language', $curriculum->language) == 'ไทย/Thai/๬fຊ語 (Tàiyǔ)' ? 'selected' : '' }}>ไทย/Thai/๬fຊ語 (Tàiyǔ)</option>
                                </select>
                            </div>

                            <!-- ค่าเรียน -->
                            <div>
                                <label for="tuition_fee_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ค่าเรียน (บาท)
                                </label>
                                <input type="number" 
                                       name="tuition_fee" 
                                       id="tuition_fee_{{ $curriculum->id }}"
                                       value="{{ old('tuition_fee', $curriculum->tuition_fee) }}" 
                                       step="0.01" min="0"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                                       required>
                            </div>

                            <!-- ปีหลักสูตร -->
                            <div>
                                <label for="curriculum_year_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    ปีหลักสูตร
                                </label>
                                <input type="text" 
                                       name="curriculum_year" 
                                       id="curriculum_year_{{ $curriculum->id }}"
                                       value="{{ old('curriculum_year', $curriculum->curriculum_year) }}" 
                                       placeholder="เช่น พ.ศ.2564"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>

                            <!-- URL ไฟล์ PDF -->
                            <div>
                                <label for="pdf_url_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    URL ไฟล์ PDF หลักสูตร
                                </label>
                                <input type="url" 
                                       name="pdf_url" 
                                       id="pdf_url_{{ $curriculum->id }}"
                                       value="{{ old('pdf_url', $curriculum->pdf_url) }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                            
                            <!-- URL วิดีโอ YouTube -->
                            <div>
                                <label for="video_url_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    URL วิดีโอ YouTube แนะนำหลักสูตร
                                </label>
                                <input type="url" 
                                       name="video_url" 
                                       id="video_url_{{ $curriculum->id }}"
                                       value="{{ old('video_url', $curriculum->video_url) }}" 
                                       placeholder="เช่น https://www.youtube.com/watch?v=VIDEO_ID"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">
                            </div>
                        </div>

                        <!-- รายละเอียดหลักสูตร -->
                        <div>
                            <label for="description_{{ $curriculum->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                รายละเอียดหลักสูตร
                            </label>
                            <textarea name="description" 
                                      id="description_{{ $curriculum->id }}"
                                      rows="4" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500">{{ old('description', $curriculum->description) }}</textarea>
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="submit" 
                                    class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                                บันทึกการเปลี่ยนแปลง
                            </button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>

            @if($curriculums->isEmpty())
                <div class="bg-white rounded-lg shadow p-8">
                    <div class="text-center py-12">
                        <div class="text-gray-400 text-lg">ไม่มีข้อมูลหลักสูตร</div>
                        <p class="text-gray-500 mt-2">กรุณาเพิ่มข้อมูลหลักสูตรใหม่</p>
                    </div>
                </div>
            @endif
        </main>
    </div>
</body>
</html>