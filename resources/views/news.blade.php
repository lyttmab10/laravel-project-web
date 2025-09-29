@extends('layouts.app')

@section('title', 'ข่าวสารและกิจกรรม - สาขาวิศวกรรมซอฟต์แวร์')

@section('content')
<!-- News Page -->
<section class="pt-20 pb-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                ข่าวสารและกิจกรรม
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                ติดตามข่าวสารและความเคลื่อนไหวของสาขาวิศวกรรมซอฟต์แวร์
            </p>
        </div>
        
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
        
        <div id="newsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $article)
            <article class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-300" data-news-id="{{ $article['id'] }}">
                <div class="h-64 bg-gradient-to-br from-primary-100 to-secondary-100 flex items-center justify-center">
                    <div class="text-6xl">📰</div>  
                </div>
                
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-2">{{ $article['date'] }}</div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">
                        {{ $article['title'] }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ $article['summary'] }}
                    </p>
                    <div class="text-gray-700 text-sm mb-4">
                        {{ $article['content'] }}
                    </div>
                    <button class="text-primary-600 hover:text-primary-700 font-semibold">
                        อ่านเพิ่มเติม →
                    </button>
                </div>
            </article>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('home') }}" class="bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors border-b-2 border-gray-300">
                กลับหน้าแรก
            </a>
        </div>
    </div>
</section>

<!-- Floating Add Button -->
<button id="addNewsBtn" onclick="openAddModal()" class="fixed bottom-6 right-6 bg-primary-600 text-white w-14 h-14 rounded-full shadow-lg hover:bg-primary-700 transition-all hover:scale-110 z-40" title="เพิ่มข่าวใหม่">
    <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
</button>

<!-- Add News Modal -->
<div id="newsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg max-w-lg w-full max-h-96 overflow-y-auto">
            <div class="px-6 py-4 border-b">
                <h3 id="modalTitle" class="text-lg font-semibold">เพิ่มข่าวใหม่</h3>
            </div>
            <form id="newsForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">หัวข้อข่าว</label>
                    <input type="text" id="newsTitle" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">วันที่</label>
                    <input type="text" id="newsDate" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="15 ก.ย. 2567" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">สรุป</label>
                    <textarea id="newsSummary" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">เนื้อหา</label>
                    <textarea id="newsContent" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">รูปภาพ (URL)</label>
                    <input type="url" id="newsImage" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500" placeholder="/images/news-new.jpg">
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
    
    function addNewsToGrid(news) {
        const grid = document.getElementById('newsGrid');
        const article = document.createElement('article');
        article.className = 'bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-300';
        article.setAttribute('data-news-id', news.id);
        
        article.innerHTML = `
            <div class="h-64 bg-gradient-to-br from-primary-100 to-secondary-100 flex items-center justify-center">
                <div class="text-6xl">📰</div>  
            </div>
            
            <div class="p-6">
                <div class="text-sm text-gray-500 mb-2">${news.date}</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">
                    ${news.title}
                </h3>
                <p class="text-gray-600 mb-4">
                    ${news.summary}
                </p>
                <div class="text-gray-700 text-sm mb-4">
                    ${news.content}
                </div>
                <button class="text-primary-600 hover:text-primary-700 font-semibold">
                    อ่านเพิ่มเติม →
                </button>
            </div>
        `;
        
        grid.appendChild(article);
        
        // Add animation
        article.style.opacity = '0';
        article.style.transform = 'translateY(20px)';
        setTimeout(() => {
            article.style.transition = 'all 0.5s ease';
            article.style.opacity = '1';
            article.style.transform = 'translateY(0)';
        }, 100);
    }

    function openAddModal() {
        document.getElementById('modalTitle').textContent = 'เพิ่มข่าวใหม่';
        document.getElementById('newsForm').reset();
        document.getElementById('newsModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('newsModal').classList.add('hidden');
    }

    document.getElementById('newsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            title: document.getElementById('newsTitle').value,
            date: document.getElementById('newsDate').value,
            summary: document.getElementById('newsSummary').value,
            content: document.getElementById('newsContent').value,
            image: document.getElementById('newsImage').value
        };
        
        fetch('/admin/news', {
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
                closeModal();
                if (data.news) {
                    addNewsToGrid(data.news);
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
    document.getElementById('newsModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Add CSRF token to page
    if (!document.querySelector('meta[name="csrf-token"]')) {
        const meta = document.createElement('meta');
        meta.name = 'csrf-token';
        meta.content = '{{ csrf_token() }}';
        document.head.appendChild(meta);
    }
</script>
@endsection