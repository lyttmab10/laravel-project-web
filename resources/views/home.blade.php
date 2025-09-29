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
                <button class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105">
                    {{ $data['hero']['cta_text'] }}
                </button>
                <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary-600 transition-all">
                    ดูผลงาน
                </button>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                อาจารย์ประจำสาขา
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                ทีมอาจารย์ผู้เชี่ยวชาญที่มีประสบการณ์และความเชี่ยวชาญในด้านวิศวกรรมซอฟต์แวร์
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['faculty'] as $index => $member)
            <div class="bg-white p-6 rounded-xl shadow-lg card-hover border border-gray-300">
                <div class="mb-4">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-24 h-24 rounded-full mx-auto object-cover">
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2 text-center">
                    {{ $member['name'] }}
                </h3>
                <p class="text-sm text-primary-600 mb-2 text-center font-medium">
                    {{ $member['position'] }}
                </p>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('faculty') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors border-b-2 border-gray-300">
                ดูทั้งหมด
            </a>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section id="programs" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                ผลงานของเรา
            </h2>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($data['programs'] as $program)
            <div class="bg-gradient-to-br from-primary-50 to-secondary-50 rounded-2xl shadow-lg card-hover overflow-hidden">
                <div class="h-64 overflow-hidden">
                    <img src="{{ $program['image'] }}" alt="{{ $program['title'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">
                            {{ $program['title'] }}
                        </h3>
                        <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $program['duration'] }}
                        </span>
                    </div>
                    
                    <p class="text-gray-600 mb-6">
                        {{ $program['description'] }}
                    </p>
                    
                    @if(isset($program['activity']))
                    <div class="bg-primary-50 border-l-4 border-primary-500 p-4 mb-6">
                        <p class="text-primary-800 font-medium">
                            {{ $program['activity'] }}
                        </p>
                    </div>
                    @endif
                    
                    @if(isset($program['highlights']) && is_array($program['highlights']) && count($program['highlights']) > 0)
                    <div class="space-y-3 mb-6">
                        @foreach($program['highlights'] as $highlight)
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-primary-500 rounded-full mr-3"></div>
                            <span class="text-gray-700">{{ $highlight }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    
                    <button onclick="openModal('{{ $loop->index }}')"
                            class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                        อ่านเพิ่มเติม →
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('programs') }}" class="inline-block bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors border-b-2 border-gray-300">
                ดูผลงานทั้งหมด
            </a>
        </div>
    </div>
</section>

<!-- Program Detail Modal -->
<div id="programModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 id="modalTitle" class="text-2xl font-bold text-gray-900"></h3>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div id="modalImage" class="mb-6">
                    <img id="modalImg" src="" alt="" class="w-full h-64 object-cover rounded-lg">
                </div>
                
                <div id="modalActivity" class="bg-primary-50 border-l-4 border-primary-500 p-4 mb-6">
                    <p id="modalActivityText" class="text-primary-800 font-medium"></p>
                </div>
                
                <div id="modalContent" class="space-y-4">
                    <div class="prose max-w-none">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">รายละเอียดเพิ่มเติม</h4>
                        <div id="modalDetails" class="text-gray-600"></div>
                        
                        <h4 class="text-lg font-semibold text-gray-900 mt-6 mb-3">ผลลัพธ์ที่ได้รับ</h4>
                        <div id="modalResults" class="text-gray-600"></div>
                        
                        <h4 class="text-lg font-semibold text-gray-900 mt-6 mb-3">การมีส่วนร่วม</h4>
                        <div id="modalParticipation" class="text-gray-600"></div>
                    </div>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <button onclick="closeModal()" class="w-full bg-gray-600 text-white py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                        ปิด
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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

<script>
const programDetails = [
    {
        title: 'การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัย',
        image: '/images/robot-competition.jpg',
        activity: 'กิจกรรม: การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัย 2024',
        details: `การแข่งขันหุ่นยนต์ระดับมหาวิทยาลัยเป็นกิจกรรมที่สำคัญที่สุดของปีการศึกษา 
        โดยมีนักศึกษาจากหลายมหาวิทยาลัยทั่วประเทศเข้าร่วมแข่งขัน
        กิจกรรมนี้ประกอบด้วยการออกแบบหุ่นยนต์ที่สามารถทำงานต่างๆ ได้`,
        results: `ทีมจากสาขาวิศวกรรมซอฟต์แวร์คว้ารางวัลที่ 2 ในการแข่งขันในปี 2024
        และได้รับรางวัลชนะเลิศด้านนวัตกรรมอีกด้วย
        นักศึกษาที่เข้าร่วมได้รับทุนสนับสนุนจากมหาวิทยาลัยชั้นนำ`,
        participation: `นักศึกษาชั้นปี 2-4 สามารถสมัครเข้าร่วมทีมได้
        กิจกรรมจัดขึ้นทุกปีในเดือนกุมภาพันธ์์-มีนาคม
        ติดต่อได้ที่: se.robotics@university.ac.th`
    },
    {
        title: 'กิจกรรมวันวิทยาศาสตร์',
        image: '/images/science-day.jpg',
        activity: 'วันวิทยาศาสตร์แห่งชาติ 2566',
        details: `กิจกรรมวันวิทยาศาสตร์แห่งชาติเป็นกิจกรรมประจำปีที่สาขาจัดขึ้นเพื่อส่งเสริม
        ความสนใจด้านวิทยาศาสตร์และเทคโนโลยีให้กับประชาชนทั่วไป
        โดยมีนิทรรศการซอฟต์แวร์ และปฏิบัติการควบคู่ไป`,
        results: `มีผู้เข้าร่วมกิจกรรมมากกว่า 500 คน
        มีการจัดนิทรรศการและการสาธิตโครงการต่างๆ
        ได้รับการตอบรับที่ดีมากจากผู้เข้าร่วมและประชาชน`,
        participation: `เปิดรับสมัครนักศึกษาทุกชั้นปีและประชาชนทั่วไป
        กิจกรรมจัดขึ้นทุกปีในเดือนสิงหาคม
        สมัครออนไลน์ได้ที่: se.scienceday@university.ac.th`
    }
];

function openModal(index) {
    const modal = document.getElementById('programModal');
    const program = programDetails[index];
    
    document.getElementById('modalTitle').textContent = program.title;
    document.getElementById('modalImg').src = program.image;
    document.getElementById('modalImg').alt = program.title;
    document.getElementById('modalActivityText').textContent = program.activity;
    document.getElementById('modalDetails').innerHTML = program.details.replace(/\n/g, '<br>');
    document.getElementById('modalResults').innerHTML = program.results.replace(/\n/g, '<br>');
    document.getElementById('modalParticipation').innerHTML = program.participation.replace(/\n/g, '<br>');
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('programModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('programModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endsection