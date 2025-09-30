@extends('layouts.app')

@section('title', $data['page_title'])

@section('content')
<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center bg-cover bg-center bg-no-repeat relative" style="background-image: url('/images/banner1920x600-02.jpg');">
    <!-- Overlay for better text readability -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in">
                {{ $data['hero']['title'] }}
            </h1>
            <p class="text-xl md:text-2xl mb-4 animate-fade-in-delay">
                {{ $data['hero']['subtitle'] }}
            </p>
            <p class="text-lg mb-8 max-w-3xl mx-auto opacity-90 animate-fade-in-delay-2">
                {{ $data['hero']['description'] }}
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-delay-3">
                <button class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105 border-b-2 border-gray-300">
                    {{ $data['hero']['cta_text'] }}
                </button>
                <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary-600 transition-all border-b-2 border-gray-300">
                    ดูผลงาน
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Section -->
<section class="py-20 bg-white dark:bg-gray-900 dark-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                ข้อมูลทั่วไปของหลักสูตร
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                หลักสูตรวิศวกรรมศาสตรบัณฑิต สาขาวิชาวิศวกรรมซอฟต์แวร์
            </p>
        </div>
        
        @if(isset($data['curriculum']) && $data['curriculum'])
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
            <div class="p-8 md:p-12">
                <!-- Degree Information Header -->
                <div class="text-center mb-12">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ $data['curriculum']->degree_name_th }}
                    </h3>
                    <p class="text-lg text-primary-600 dark:text-primary-400 font-semibold mb-6">
                        {{ $data['curriculum']->degree_name_en }}
                    </p>
                    <div class="flex justify-center space-x-4">
                        <span class="bg-primary-100 dark:bg-primary-800 text-primary-700 dark:text-primary-200 px-4 py-2 rounded-full font-semibold">
                            {{ $data['curriculum']->degree_abbr_th }}
                        </span>
                        <span class="bg-secondary-100 dark:bg-gray-600 text-secondary-700 dark:text-gray-200 px-4 py-2 rounded-full font-semibold">
                            {{ $data['curriculum']->degree_abbr_en }}
                        </span>
                    </div>
                </div>

                <!-- Key Information Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                    <!-- Credits -->
                    <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">{{ $data['curriculum']->credits }}</div>
                            <div class="text-primary-800 dark:text-primary-200 font-semibold">หน่วยกิต</div>
                            <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">ไม่น้อยกว่า</div>
                        </div>
                    </div>
                    
                    <!-- Duration -->
                    <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">ปี {{ $data['curriculum']->duration_years }}</div>
                            <div class="text-primary-800 dark:text-primary-200 font-semibold">ระยะเวลา</div>
                            <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">ระยะเวลาเรียน</div>
                        </div>
                    </div>
                    
                    <!-- Tuition Fee -->
                    <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">{{ number_format($data['curriculum']->tuition_fee) }}</div>
                            <div class="text-primary-800 dark:text-primary-200 font-semibold">บาท</div>
                            <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">ค่าเรียน/เทอม</div>
                        </div>
                    </div>
                    
                    <!-- Language -->
                    <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">ไทย</div>
                            <div class="text-primary-800 dark:text-primary-200 font-semibold">ภาษาที่ใช้</div>
                            <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">{{ $data['curriculum']->language }}</div>
                        </div>
                    </div>
                </div>

                <!-- Career Prospects -->
                <div class="mb-8">
                    <h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">อาชีพหลังสำเร็จการศึกษา</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                            <h5 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">เจ้าหน้าที่ตรวจสอบคุณภาพซอฟต์แวร์</h5>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Quality Assurance Engineer</p>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                            <h5 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">โปรแกรมเมอร์</h5>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Programmer</p>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                            <h5 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">วิศวกรซอฟต์แวร์</h5>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Software Engineer</p>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                            <h5 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">นักทดสอบระบบ</h5>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">System Tester</p>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="text-center">
                    <a href="{{ route('curriculum') }}" class="inline-block bg-primary-600 dark:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600">
                        ดูรายละเอียดเพิ่มเติม
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-16">
            <div class="text-6xl mb-4">📚</div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">ไม่พบข้อมูลหลักสูตร</h3>
            <p class="text-gray-600 dark:text-gray-400">กรุณาติดต่อเจ้าหน้าที่เพื่อขอข้อมูลเพิ่มเติม</p>
        </div>
        @endif
    </div>
</section>

<!-- Faculty Section -->
<section id="about" class="py-20 bg-gray-50 dark:bg-gray-800 dark-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                อาจารย์ประจำสาขา
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                ทีมอาจารย์ผู้เชี่ยวชาญที่มีประสบการณ์และความเชี่ยวชาญในด้านวิศวกรรมซอฟต์แวร์
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['faculty'] as $index => $member)
            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg card-hover border border-gray-300 dark:border-gray-600 dark-transition">
                <div class="mb-4">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-24 h-24 rounded-full mx-auto object-cover">
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 text-center">
                    {{ $member['name'] }}
                </h3>
                <p class="text-sm text-primary-600 dark:text-primary-400 mb-2 text-center font-medium">
                    {{ $member['position'] }}
                </p>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('faculty') }}" class="inline-block bg-primary-600 dark:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600">
                ดูทั้งหมด
            </a>
        </div>
    </div>
</section>

<!-- Laboratories Section -->
<section class="py-20 bg-white dark:bg-gray-900 dark-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                ห้องปฏิบัติการ
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                ห้องปฏิบัติการที่ทันสมัยและครบครันสำหรับการเรียนรู้ด้านวิศวกรรมซอฟต์แวร์
            </p>
        </div>
        
        @if(isset($data['laboratories']) && count($data['laboratories']) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach(array_slice($data['laboratories'], 0, 2) as $lab)
            <div class="bg-white dark:bg-gray-700 p-8 rounded-xl shadow-lg card-hover border border-gray-300 dark:border-gray-600 dark-transition">
                @if($lab['image'])
                <div class="mb-6 h-48 overflow-hidden rounded-lg">
                    @if(str_starts_with($lab['image'], 'data:image'))
                        <img src="{{ $lab['image'] }}" alt="{{ $lab['name'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-6xl mb-4">🔬</div>
                                <p class="text-gray-600 font-medium">{{ $lab['name'] }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                @endif
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                    {{ $lab['name'] }}
                </h3>
                <p class="text-md text-primary-600 dark:text-primary-400 mb-4 font-medium">
                    {{ $lab['building'] }}
                </p>
                @if(isset($lab['description']) && $lab['description'])
                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                    {{ str($lab['description'])->limit(120) }}
                </p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-8">
            <div class="text-6xl mb-4">🔬</div>
            <p class="text-gray-600 dark:text-gray-400 text-lg">ไม่มีข้อมูลห้องปฏิบัติการในขณะนี้</p>
        </div>
        @endif
        
        <div class="text-center mt-12">
            <a href="{{ route('laboratories') }}" class="inline-block bg-primary-600 dark:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600">
                ดูทั้งหมด
            </a>
        </div>
    </div>
</section>

<!-- Faculty Research Section -->
<section id="faculty-research" class="py-20 bg-gray-50 dark:bg-gray-800 dark-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                ผลงานอาจารย์
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                ผลงานวิจัยและการนำเสนองานของอาจารย์ประจำสาขา
            </p>
        </div>
        
        @if(isset($data['faculty_research']) && count($data['faculty_research']) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['faculty_research'] as $research)
            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg card-hover border border-gray-300 dark:border-gray-600 dark-transition">
                @if($research['image'])
                <div class="mb-4">
                    <img src="{{ $research['image'] }}" alt="{{ $research['title'] }}" class="w-full h-32 rounded-lg object-cover">
                </div>
                @endif
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                    {{ $research['title'] }}
                </h3>
                <p class="text-sm text-primary-600 dark:text-primary-400 mb-2 font-medium">
                    {{ $research['type'] }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                    โดย: {{ $research['faculty']['name'] ?? 'N/A' }}
                </p>
                @if(isset($research['description']) && $research['description'])
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    {{ str($research['description'])->limit(80) }}
                </p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-8">
            <p class="text-gray-600 dark:text-gray-400">ไม่มีข้อมูลผลงานอาจารย์ในขณะนี้</p>
        </div>
        @endif
        
        <div class="text-center mt-12">
            <a href="{{ route('faculty.research') }}" class="inline-block bg-primary-600 dark:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600">
                ดูทั้งหมด
            </a>
        </div>
    </div>
</section>

<!-- Student Projects Section -->
<section id="student-projects" class="py-20 bg-white dark:bg-gray-900 dark-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                ผลงานนักศึกษา
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                โครงการและผลงานที่น่าประทับใจของนักศึกษาสาขาวิศวกรรมซอฟต์แวร์
            </p>
        </div>
        
        @if(isset($data['student_projects']) && count($data['student_projects']) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['student_projects'] as $project)
            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg card-hover border border-gray-300 dark:border-gray-600 dark-transition">
                @if($project['image'])
                <div class="mb-4">
                    <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-32 rounded-lg object-cover">
                </div>
                @endif
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                    {{ $project['title'] }}
                </h3>
                <p class="text-sm text-primary-600 dark:text-primary-400 mb-2 font-medium">
                    {{ $project['student_name'] }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                    ปีที่ทำ: {{ $project['year'] }}
                </p>
                @if(isset($project['description']) && $project['description'])
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    {{ str($project['description'])->limit(80) }}
                </p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-8">
            <p class="text-gray-600 dark:text-gray-400">ไม่มีข้อมูลผลงานนักศึกษาในขณะนี้</p>
        </div>
        @endif
        
        <div class="text-center mt-12">
            <a href="{{ route('student.projects') }}" class="inline-block bg-primary-600 dark:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600">
                ดูทั้งหมด
            </a>
        </div>
    </div>
</section>

<!-- Alumni Section -->
<section class="py-20 bg-gray-50 dark:bg-gray-800 dark-transition">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                ข้อมูลศิษย์เก่า
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                บัณฑิตที่ประสบความสำเร็จในสายงานด้านเทคโนโลยีสารสนเทศ
            </p>
        </div>
        
        @if(isset($data['alumni']) && count($data['alumni']) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['alumni'] as $alum)
            <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-lg card-hover border border-gray-300 dark:border-gray-600 dark-transition">
                @if($alum['image'])
                <div class="mb-4">
                    <img src="{{ $alum['image'] }}" alt="{{ $alum['name'] }}" class="w-24 h-24 rounded-full mx-auto object-cover">
                </div>
                @endif
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 text-center">
                    {{ $alum['name'] }}
                </h3>
                <p class="text-sm text-primary-600 dark:text-primary-400 mb-2 text-center font-medium">
                    {{ $alum['position'] }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2 text-center">
                    {{ $alum['company'] }}
                </p>
                @if($alum['graduation_year'])
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2 text-center">
                    รุ่น {{ $alum['graduation_year'] }}
                </p>
                @endif
                @if(isset($alum['role']) && $alum['role'])
                <p class="text-sm text-gray-600 dark:text-gray-300 text-center">
                    {{ str($alum['role'])->limit(60) }}
                </p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-8">
            <p class="text-gray-600 dark:text-gray-400">ไม่มีข้อมูลศิษย์เก่าในขณะนี้</p>
        </div>
        @endif
        
        <div class="text-center mt-12">
            <a href="{{ route('alumni') }}" class="inline-block bg-primary-600 dark:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600">
                ดูทั้งหมด
            </a>
        </div>
    </div>
</section>



<!-- News Section -->
<section id="news" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                ข่าวสารและกิจกรรม
            </h2>
            <p class="text-xl text-gray-600">
                ติดตามข่าวสารและความเคลื่อนไหวของสาขาได้ที่นี่
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($data['news'] as $news)
            <article class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                @if(isset($news['image']) && $news['image'])
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $news['image'] }}');">
                    <div class="h-full bg-black bg-opacity-20 flex items-center justify-center">
                        <div class="text-6xl text-white">📰</div>
                    </div>
                </div>
                @else
                <div class="h-48 bg-gradient-to-br from-primary-100 to-secondary-100 flex items-center justify-center">
                    <div class="text-6xl">📰</div>
                </div>
                @endif
                
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-2">{{ $news['date'] }}</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">
                        {{ $news['title'] }}
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $news['summary'] }}
                    </p>
                    <a href="#" class="text-primary-600 hover:text-primary-700 font-semibold">
                        อ่านเพิ่มเติม →
                    </a>
                </div>
            </article>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('news') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors border-b-2 border-gray-300">
                ดูข่าวสารทั้งหมด
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-cover bg-center bg-no-repeat relative" style="background-image: url('/images/contact-banner.jpg');">
    <!-- Overlay for better text readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                พร้อมเริ่มต้นการเรียนรู้แล้วหรือยัง?
            </h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto">
                มาร่วมเป็นส่วนหนึ่งของสาขาวิศวกรรมซอฟต์แวร์ เพื่อสร้างอนาคตที่สดใสในโลกเทคโนโลยี
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-white">
            <div>
                <h3 class="text-2xl font-bold mb-6">ติดต่อเรา</h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-700 rounded-full flex items-center justify-center mr-4">
                            📧
                        </div>
                        <div>
                            <div class="font-semibold">อีเมล</div>
                            <div class="opacity-90">se@university.ac.th</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-700 rounded-full flex items-center justify-center mr-4">
                            📞
                        </div>
                        <div>
                            <div class="font-semibold">โทรศัพท์</div>
                            <div class="opacity-90">02-123-4567</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-700 rounded-full flex items-center justify-center mr-4">
                            📍
                        </div>
                        <div>
                            <div class="font-semibold">ที่อยู่</div>
                            <div class="opacity-90">สาขาวิศวกรรมซอฟต์แวร์<br>กรุงเทพมหานคร 10400</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl">
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold mb-2">ชื่อ-นามสกุล</label>
                        <input type="text" class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/70" placeholder="กรุณากรอกชื่อ-นามสกุล">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold mb-2">อีเมล</label>
                        <input type="email" class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/70" placeholder="your@email.com">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold mb-2">ข้อความ</label>
                        <textarea rows="4" class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/70" placeholder="กรุณากรอกข้อความ"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-white text-primary-900 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        ส่งข้อความ
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }
    
    .animate-fade-in-delay {
        animation: fade-in 1s ease-out 0.2s both;
    }
    
    .animate-fade-in-delay-2 {
        animation: fade-in 1s ease-out 0.4s both;
    }
    
    .animate-fade-in-delay-3 {
        animation: fade-in 1s ease-out 0.6s both;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

@endsection