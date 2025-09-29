@extends('layouts.app')

@section('title', 'อาจารย์ประจำสาขา - สาขาวิศวกรรมซอฟต์แวร์')

@section('content')
<!-- Faculty Page -->
<section class="pt-20 pb-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                อาจารย์ประจำสาขา
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                ทีมอาจารย์ผู้เชี่ยวชาญที่มีประสบการณ์และความเชี่ยวชาญในด้านวิศวกรรมซอฟต์แวร์
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($faculty as $member)
            <div class="bg-white p-8 rounded-xl shadow-lg card-hover border border-gray-300">
                <div class="mb-6">
                    <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-32 h-32 rounded-full mx-auto object-cover">
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3 text-center">
                    {{ $member['name'] }}
                </h3>
                <p class="text-base text-primary-600 mb-4 text-center font-medium">
                    {{ $member['position'] }}
                </p>
            </div>
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