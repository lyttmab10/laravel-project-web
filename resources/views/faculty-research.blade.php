@extends('layouts.app')

@section('title', 'ผลงานอาจารย์ - สาขาวิศวกรรมซอฟต์แวร์')

@section('content')
<div class="pt-8">
    <!-- Header Section -->
    <section class="bg-gradient-to-br from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-700 py-16 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    ผลงานอาจารย์
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    ผลงานวิจัยและการนำเสนองานของอาจารย์ประจำสาขาวิศวกรรมซอฟต์แวร์
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white dark:bg-gray-900 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($facultyResearch && count($facultyResearch) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($facultyResearch as $research)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                    @if($research->image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $research->image }}" alt="{{ $research->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @else
                    <div class="h-48 bg-gradient-to-br from-primary-100 to-secondary-100 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                        <div class="text-6xl">📊</div>
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                {{ $research->title }}
                            </h3>
                            <span class="bg-primary-100 dark:bg-primary-800 text-primary-700 dark:text-primary-200 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $research->type }}
                            </span>
                        </div>
                        
                        <p class="text-primary-600 dark:text-primary-400 font-semibold mb-4">
                            โดย: {{ $research->faculty->name ?? 'N/A' }}
                        </p>
                        
                        @if($research->description)
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $research->description }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">📊</div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">ไม่พบข้อมูลผลงานอาจารย์</h2>
                <p class="text-gray-600 dark:text-gray-400">กรุณาติดต่อเจ้าหน้าที่เพื่อขอข้อมูลเพิ่มเติม</p>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection