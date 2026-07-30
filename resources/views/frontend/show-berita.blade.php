@extends('layouts.frontend')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <article class="bg-white rounded-3xl shadow-sm overflow-hidden border border-gray-100">
        <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-full h-[400px] object-cover" alt="{{ $berita->judul }}">
        
        <div class="p-8 md:p-12">
            <div class="flex items-center text-sm text-gray-500 mb-4">
                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full font-bold mr-4">Berita Sekolah</span>
                <span>{{ $berita->created_at->format('d M Y') }}</span>
                <span class="mx-2">•</span>
                <span>Oleh: {{ $berita->user->name }}</span>
            </div>

            <h1 class="text-3xl md:text-4xl font-black text-gray-800 mb-6 leading-tight">
                {{ $berita->judul }}
            </h1>

            <div class="prose prose-purple max-w-none text-gray-600 leading-relaxed text-lg">
                {!! $berita->konten !!}
            </div>

            <div class="mt-12 pt-8 border-t border-gray-100">
                <a href="/berita" class="text-[#8B5CF6] font-bold hover:underline italic">
                    ← Kembali ke daftar berita
                </a>
            </div>
        </div>
    </article>
</div>
@endsection