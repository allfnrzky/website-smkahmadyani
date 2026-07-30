@extends('layouts.frontend')

@section('content')
<article class="max-w-4xl mx-auto px-4 py-16">
    <nav class="flex mb-8 text-sm text-gray-500">
        <a href="/" class="hover:text-[#8B5CF6]">Beranda</a>
        <span class="mx-2">/</span>
        <a href="/berita" class="hover:text-[#8B5CF6]">Berita</a>
        <span class="mx-2">/</span>
        <span class="text-gray-800 truncate">{{ $berita->judul }}</span>
    </nav>

    <header class="mb-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            {{ $berita->judul }}
        </h1>
        <div class="flex items-center gap-4 text-gray-500">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-[#8B5CF6] font-bold mr-3">
                    A
                </div>
                <span>Admin SMK</span>
            </div>
            <span>•</span>
            <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
        </div>
    </header>

    <div class="rounded-3xl overflow-hidden mb-10 shadow-lg">
        <img src="{{ $berita->gambar ? asset('storage/'.$berita->gambar) : 'https://via.placeholder.com/1200x600' }}" 
             class="w-full h-auto" alt="{{ $berita->judul }}">
    </div>

    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
        {!! $berita->konten !!}
    </div>

    <div class="mt-16 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="flex gap-4">
            <span class="font-bold text-gray-800">Bagikan:</span>
            <a href="#" class="text-blue-600 hover:opacity-75">Facebook</a>
            <a href="#" class="text-blue-400 hover:opacity-75">Twitter</a>
            <a href="#" class="text-green-500 hover:opacity-75">WhatsApp</a>
        </div>
        <a href="/berita" class="bg-gray-100 text-gray-700 px-6 py-2 rounded-full font-bold hover:bg-gray-200 transition">
            &larr; Kembali ke Daftar Berita
        </a>
    </div>
</article>
@endsection