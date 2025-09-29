@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-primary-600 to-secondary-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">
            ผลงานทั้งหมด
        </h1>
        <p class="text-xl opacity-90 max-w-3xl mx-auto">
            รวมผลงานและกิจกรรมที่โดดเด่นของสาขาวิศวกรรมซอฟต์แวร์
        </p>
    </div>
</section>

<!-- Programs Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Message -->
        <div id="successMessage" class="hidden bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <span class="text-green-400">✅</span>
                </div>
                <div class="ml-3">
                    <p id="successText" class="text-sm text-green-700"></p>
                </div>
            </div>
        </div>
        
        <div id="programsGrid" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($programs as $index => $program)
            <div class="bg-gradient-to-br from-primary-50 to-secondary-50 rounded-2xl shadow-lg card-hover overflow-hidden" data-program-id="{{ $program['id'] }}">
                <div class="h-64 overflow-hidden">
                    <img src="{{ $program['image'] }}" alt="{{ $program['title'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">
                            {{ $program['title'] }}
                        </h3>
                        <div class="text-right">
                            <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-sm font-semibold block mb-2">
                                {{ $program['duration'] }}
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $program['date'] }}
                            </span>
                        </div>
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
                    
                    <button onclick="openModal('{{ $index }}')"
                            class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                        อ่านเพิ่มเติม →
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('home') }}" class="inline-block bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                กลับสู่หน้าหลัก
            </a>
        </div>
    </div>
</section>

<!-- Floating Add Button -->
<button id="addProgramBtn" onclick="openAddModal()" class="fixed bottom-6 right-6 bg-primary-600 text-white w-14 h-14 rounded-full shadow-lg hover:bg-primary-700 transition-all hover:scale-110 z-40" title="เพิ่มผลงานใหม่">
    <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
</button>

<!-- Add Program Modal -->
<div id="programAddModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg max-w-lg w-full max-h-96 overflow-y-auto">
            <div class="px-6 py-4 border-b">
                <h3 id="addModalTitle" class="text-lg font-semibold">เพิ่มผลงานใหม่</h3>
            </div>
            <form id="programAddForm" class="p-6 space-y-4">
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
                    <textarea id="programDescription" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">กิจกรรม</label>
                    <input type="text" id="programActivity" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="กิจกรรม: ..." required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                    <input type="url" id="programImage" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="/images/program-new.jpg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">วันที่</label>
                    <input type="text" id="programDate" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="มกราคม 2567" required>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">ยกเลิก</button>
                    <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

<script>
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
    const programDiv = document.createElement('div');
    programDiv.className = 'bg-gradient-to-br from-primary-50 to-secondary-50 rounded-2xl shadow-lg card-hover overflow-hidden';
    programDiv.setAttribute('data-program-id', program.id);
    
    programDiv.innerHTML = `
        <div class="h-64 overflow-hidden">
            <img src="${program.image}" alt="${program.title}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
        
        <div class="p-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-900">
                    ${program.title}
                </h3>
                <div class="text-right">
                    <span class="bg-primary-100 text-primary-700 px-3 py-1 rounded-full text-sm font-semibold block mb-2">
                        ${program.duration}
                    </span>
                    <span class="text-sm text-gray-500">
                        ${program.date}
                    </span>
                </div>
            </div>
            
            <p class="text-gray-600 mb-6">
                ${program.description}
            </p>
            
            <div class="bg-primary-50 border-l-4 border-primary-500 p-4 mb-6">
                <p class="text-primary-800 font-medium">
                    ${program.activity}
                </p>
            </div>
            
            <button onclick="openModal('new')" class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                อ่านเพิ่มเติม →
            </button>
        </div>
    `;
    
    grid.appendChild(programDiv);
    
    // Add animation
    programDiv.style.opacity = '0';
    programDiv.style.transform = 'translateY(20px)';
    setTimeout(() => {
        programDiv.style.transition = 'all 0.5s ease';
        programDiv.style.opacity = '1';
        programDiv.style.transform = 'translateY(0)';
    }, 100);
}

function openAddModal() {
    document.getElementById('addModalTitle').textContent = 'เพิ่มผลงานใหม่';
    document.getElementById('programAddForm').reset();
    document.getElementById('programAddModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('programAddModal').classList.add('hidden');
}

document.getElementById('programAddForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = {
        title: document.getElementById('programTitle').value,
        duration: document.getElementById('programDuration').value,
        description: document.getElementById('programDescription').value,
        activity: document.getElementById('programActivity').value,
        image: document.getElementById('programImage').value,
        date: document.getElementById('programDate').value
    };
    
    fetch('/admin/programs', {
        method: 'POST',
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
            closeAddModal();
            if (data.program) {
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
document.getElementById('programAddModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAddModal();
    }
});

// Add CSRF token to page
if (!document.querySelector('meta[name="csrf-token"]')) {
    const meta = document.createElement('meta');
    meta.name = 'csrf-token';
    meta.content = '{{ csrf_token() }}';
    document.head.appendChild(meta);
}

// Original modal functions
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
        กิจกรรมจัดขึ้นทุกปีในเดือนกุมภาพันธ์-มีนาคม
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
    },
    {
        title: 'โครงการพัฒนาแอปพลิเคชัน',
        image: '/images/app-development.jpg',
        activity: 'โครงการ: ระบบจัดการร้านค้าออนไลน์',
        details: `โครงการพัฒนาแอปพลิเคชันระบบจัดการร้านค้าออนไลน์
        เป็นโครงการที่นักศึกษาชั้นปีที่ 3 ได้ทำร่วมกับร้านค้าจริง
        เพื่อแก้ปัญหาการจัดการสินค้าและการขายออนไลน์`,
        results: `ระบบได้รับการติดตั้งและใช้งานจริงใน 5 ร้านค้า
        ช่วยเพิ่มยอดขายเฉลี่ย 30% และลดต้นทุนการดำเนินงาน
        นักศึกษาได้รับประสบการณ์จริงในการทำงาน`,
        participation: `นักศึกษาชั้นปี 3 สามารถสมัครเข้าร่วมได้
        โครงการจัดขึ้นทุกภาคเรียนที่ 2
        ติดต่อได้ที่: se.projects@university.ac.th`
    },
    {
        title: 'การสร้างเกมคอมพิวเตอร์',
        image: '/images/game-development.jpg',
        activity: 'โครงการ: การสร้างเกมคอมพิวเตอร์ขึ้นใหม่',
        details: `โครงการสร้างเกมคอมพิวเตอร์ขึ้นใหม่ด้วยเทคโนโลยีที่ทันสมัย
        นักศึกษาได้เรียนรู้การออกแบบและพัฒนาเกม
        ตั้งแต่การวางแผน การเขียนโค้ด จนถึงการทดสอบ`,
        results: `เกมที่พัฒนาได้รับการเผยแพร่บน Steam และ Play Store
        มียอดดาวน์โหลดรวมกว่า 10,000 ครั้ง
        นักศึกษาได้รับรางวัลจากการแข่งขันเกมระดับชาติ`,
        participation: `นักศึกษาชั้นปี 4 สามารถสมัครเข้าร่วมได้
        โครงการจัดขึ้นทุกภาคเรียนที่ 1
        ติดต่อได้ที่: se.gamedev@university.ac.th`
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