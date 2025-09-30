@extends('layouts.app')

@section('title', 'ห้องปฏิบัติการ - สาขาวิศวกรรมซอฟต์แวร์')

@section('content')
<div class="pt-8">
    <!-- Header Section -->
    <section class="bg-gradient-to-br from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-700 py-16 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    ห้องปฏิบัติการ
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    ห้องปฏิบัติการที่ทันสมัยและครบครันสำหรับการเรียนรู้ด้านวิศวกรรมซอฟต์แวร์
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white dark:bg-gray-900 dark-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($laboratories && count($laboratories) > 0)
            <!-- Initial 2 laboratories -->
            <div id="initial-labs" class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                @foreach($laboratories->take(2) as $lab)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                    @if($lab->image)
                    <div class="h-64 overflow-hidden relative">
                        @if(Str::startsWith($lab->image, 'data:image'))
                            <img src="{{ $lab->image }}" alt="{{ $lab->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-6xl mb-4">🔬</div>
                                    <p class="text-gray-600 font-medium">{{ $lab->name }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    @else
                    <div class="h-64 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-6xl mb-4">🔬</div>
                            <p class="text-gray-600 dark:text-gray-300 font-medium">{{ $lab->name }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                            {{ $lab->name }}
                        </h3>
                        <p class="text-primary-600 dark:text-primary-400 font-semibold mb-4">
                            {{ $lab->building }}
                        </p>
                        @if($lab->description)
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $lab->description }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- View All Button -->
            @if(count($laboratories) > 2)
            <div class="text-center mb-8">
                <button id="view-all-btn" onclick="showAllLabs()" class="inline-block bg-primary-600 dark:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 dark:hover:bg-primary-800 transition-colors">
                    ดูทั้งหมด
                </button>
            </div>
            @endif
            
            <!-- Additional 4 laboratories (hidden initially) -->
            @if(count($laboratories) > 2)
            <div id="additional-labs" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-8" style="display: none;">
                @foreach($laboratories->skip(2)->take(4) as $lab)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
                    @if($lab->image)
                    <div class="h-48 overflow-hidden relative">
                        @if(Str::startsWith($lab->image, 'data:image'))
                            <img src="{{ $lab->image }}" alt="{{ $lab->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-4xl mb-2">🔬</div>
                                    <p class="text-gray-600 font-medium text-sm">{{ $lab->name }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    @else
                    <div class="h-48 bg-gradient-to-br from-green-100 to-blue-100 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-4xl mb-2">🔬</div>
                            <p class="text-gray-600 dark:text-gray-300 font-medium text-sm">{{ $lab->name }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                            {{ $lab->name }}
                        </h3>
                        <p class="text-primary-600 dark:text-primary-400 font-semibold mb-3 text-sm">
                            {{ $lab->building }}
                        </p>
                        @if($lab->description)
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-sm">
                            {{ Str::limit($lab->description, 100) }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            
            @else
            <div class="text-center py-16">
                <div class="text-6xl mb-4">🔬</div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">ไม่พบข้อมูลห้องปฏิบัติการ</h2>
                <p class="text-gray-600 dark:text-gray-400">กรุณาติดต่อเจ้าหน้าที่เพื่อขอข้อมูลเพิ่มเติม</p>
            </div>
            @endif
        </div>
    </section>
    
    <!-- JavaScript for View All functionality -->
    <script>
        function showAllLabs() {
            const additionalLabs = document.getElementById('additional-labs');
            const viewAllBtn = document.getElementById('view-all-btn');
            
            if (additionalLabs.style.display === 'none') {
                additionalLabs.style.display = 'grid';
                viewAllBtn.textContent = 'ซ่อน';
                viewAllBtn.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } else {
                additionalLabs.style.display = 'none';
                viewAllBtn.textContent = 'ดูทั้งหมด';
                document.getElementById('initial-labs').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    </script>
</div>
@endsection