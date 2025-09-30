@extends('layouts.app')

@section('title', 'หลักสูตรวิศวกรรมซอฟต์แวร์')

@section('content')
<div class="pt-8">
    <!-- Header Section -->
    <section class="bg-gradient-to-br from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-700 py-16 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    หลักสูตรวิศวกรรมซอฟต์แวร์
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    ข้อมูลครบถ้วนเกี่ยวกับหลักสูตรและแผนการเรียนของสาขาวิศวกรรมซอฟต์แวร์
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white dark:bg-gray-900 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($curriculum)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="p-8 md:p-12">
                    <!-- Degree Information Header -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ $curriculum->degree_name_th }}
                        </h2>
                        <p class="text-xl text-primary-600 dark:text-primary-400 font-semibold mb-6">
                            {{ $curriculum->degree_name_en }}
                        </p>
                        <div class="flex justify-center space-x-4">
                            <span class="bg-primary-100 dark:bg-primary-800 text-primary-700 dark:text-primary-200 px-4 py-2 rounded-full font-semibold">
                                {{ $curriculum->degree_abbr_th }}
                            </span>
                            <span class="bg-secondary-100 dark:bg-gray-600 text-secondary-700 dark:text-gray-200 px-4 py-2 rounded-full font-semibold">
                                {{ $curriculum->degree_abbr_en }}
                            </span>
                        </div>
                    </div>

                    <!-- Key Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                        <!-- Credits -->
                        <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">{{ $curriculum->credits }}</div>
                                <div class="text-primary-800 dark:text-primary-200 font-semibold">หน่วยกิต</div>
                                <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">ไม่น้อยกว่า</div>
                            </div>
                        </div>
                        
                        <!-- Duration -->
                        <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">ปี {{ $curriculum->duration_years }}</div>
                                <div class="text-primary-800 dark:text-primary-200 font-semibold">ระยะเวลา</div>
                                <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">ระยะเวลาเรียน</div>
                            </div>
                        </div>
                        
                        <!-- Tuition Fee -->
                        <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">{{ number_format($curriculum->tuition_fee) }}</div>
                                <div class="text-primary-800 dark:text-primary-200 font-semibold">บาท</div>
                                <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">ค่าเรียน/เทอม</div>
                            </div>
                        </div>
                        
                        <!-- Language -->
                        <div class="bg-primary-50 dark:bg-primary-900/20 p-6 rounded-xl border border-primary-200 dark:border-primary-700">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">ไทย</div>
                                <div class="text-primary-800 dark:text-primary-200 font-semibold">ภาษาที่ใช้</div>
                                <div class="text-sm text-primary-600 dark:text-primary-300 mt-1">{{ $curriculum->language }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Program Details -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">รูปแบบหลักสูตร</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $curriculum->program_type }}</p>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">หลักสูตรปรับปรุง</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $curriculum->curriculum_year }}</p>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($curriculum->description)
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">คำอธิบายหลักสูตร</h3>
                        <div class="bg-gradient-to-r from-red-50 to-red-100 dark:from-gray-700 dark:to-gray-600 p-6 rounded-xl">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg">{{ $curriculum->description }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- YouTube Video Section -->
                    @if($curriculum->video_url)
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">วิดีโอแนะนำหลักสูตร</h3>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="aspect-video">
                                @php
                                    // Extract YouTube video ID from various URL formats
                                    $videoId = '';
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/.+|[^?#]*[?#]v=)|youtu\.be\/)([^&\?\/#]+)/', $curriculum->video_url, $matches)) {
                                        $videoId = $matches[1];
                                    }
                                @endphp
                                @if($videoId)
                                <iframe 
                                    class="w-full h-full rounded-lg" 
                                    src="https://www.youtube.com/embed/{{ $videoId }}" 
                                    title="วิดีโอแนะนำหลักสูตร" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    allowfullscreen>
                                </iframe>
                                @else
                                <div class="w-full h-full bg-gray-100 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                    <p class="text-gray-500 dark:text-gray-400">ไม่สามารถโหลดวิดีโอได้</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Career Prospects -->
                    <div class="mb-12">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">อาชีพหลังสำเร็จการศึกษา</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                                <h4 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">เจ้าหน้าที่ตรวจสอบคุณภาพซอฟต์แวร์</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">Quality Assurance Engineer</p>
                            </div>
                            
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                                <h4 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">โปรแกรมเมอร์</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">Programmer</p>
                            </div>
                            
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                                <h4 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">วิศวกรซอฟต์แวร์</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">Software Engineer</p>
                            </div>
                            
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-primary-200 dark:border-primary-700 text-center">
                                <h4 class="text-lg font-semibold text-primary-600 dark:text-primary-400 mb-2">นักทดสอบระบบ</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">System Tester</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="text-center">
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button class="bg-primary-600 dark:bg-primary-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600 text-lg">
                                📚 สมัครเรียน
                            </button>
                            @if($curriculum->pdf_url)
                            <a href="{{ $curriculum->pdf_url }}" target="_blank" class="bg-secondary-600 dark:bg-secondary-700 text-white px-8 py-4 rounded-lg font-semibold hover:bg-secondary-700 dark:hover:bg-secondary-800 transition-colors border-b-2 border-gray-300 dark:border-gray-600 text-lg">
                                📄 ดาวน์โหลดรายละเอียดหลักสูตร
                            </a>
                            @endif
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mt-4">
                            หากต้องการข้อมูลเพิ่มเติม กรุณาติดต่อสาขาวิศวกรรมซอฟต์แวร์
                        </p>
                    </div>
                </div>
            </div>
            @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">📚</div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">ไม่พบข้อมูลหลักสูตร</h2>
                <p class="text-gray-600 dark:text-gray-400">กรุณาติดต่อเจ้าหน้าที่เพื่อขอข้อมูลเพิ่มเติม</p>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection