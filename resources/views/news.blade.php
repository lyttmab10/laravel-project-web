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
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $article)
            <article class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-300">
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
@endsection