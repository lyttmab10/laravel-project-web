@extends('layouts.app')

@section('title', 'ข้อมูลศิษย์เก่า - สาขาวิศวกรรมซอฟต์แวร์')

@section('content')
<div class="pt-8">
    <!-- Header Section -->
    <section class="bg-gradient-to-br from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-700 py-16 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    ข้อมูลศิษย์เก่า
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    บัณฑิตที่ประสบความสำเร็จในสายงานด้านเทคโนโลยีสารสนเทศ
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white dark:bg-gray-900 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($alumni && count($alumni) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($alumni as $alum)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700 text-center p-6">
                    @if($alum->image)
                    <div class="mb-4">
                        <img src="{{ $alum->image }}" alt="{{ $alum->name }}" class="w-24 h-24 rounded-full mx-auto object-cover">
                    </div>
                    @else
                    <div class="mb-4">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary-100 to-secondary-100 dark:from-gray-700 dark:to-gray-600 rounded-full mx-auto flex items-center justify-center">
                            <div class="text-2xl">👨‍💼</div>
                        </div>
                    </div>
                    @endif
                    
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                        {{ $alum->name }}
                    </h3>
                    
                    <p class="text-primary-600 dark:text-primary-400 font-semibold mb-2">
                        {{ $alum->position }}
                    </p>
                    
                    <p class="text-gray-600 dark:text-gray-300 mb-2">
                        {{ $alum->company }}
                    </p>
                    
                    @if($alum->graduation_year)
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                        รุ่น {{ $alum->graduation_year }}
                    </p>
                    @endif
                    
                    @if($alum->role)
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg mt-4">
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{ $alum->role }}
                        </p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">👨‍🎓</div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">ไม่พบข้อมูลศิษย์เก่า</h2>
                <p class="text-gray-600 dark:text-gray-400">กรุณาติดต่อเจ้าหน้าที่เพื่อขอข้อมูลเพิ่มเติม</p>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection