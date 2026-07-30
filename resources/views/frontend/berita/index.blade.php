@extends('layouts.frontend')

@section('content')
<div class="bg-[#8B5CF6] py-16">
    <div class="max-w-7xl mx-auto px-4 text-center text-white">
        <h1 class="text-4xl font-bold italic text-white">Berita & Kegiatan</h1>
        <p class="mt-2 text-purple-100 text-white">Informasi terbaru seputar aktivitas SMK Ahmad Yani Jabung</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        @forelse($berita as $item)
        <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 flex flex-col">
            <div class="relative h-56 overflow-hidden">
                <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://via.placeholder.com/600x400' }}" 
                     class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500" 
                     alt="{{ $item->judul }}">
                <div class="absolute top-4 left-4 bg-[#8B5CF6] text-white text-xs font-bold px-3 py-1 rounded-full uppercase">
                    Terbaru
                </div>
            </div>

            <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center text-gray-400 text-xs mb-3">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $item->created_at->translatedFormat('d F Y') }}
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-3 leading-tight hover:text-[#8B5CF6] transition-colors">
                    <a href="/berita/{{ $item->slug }}">{{ $item->judul }}</a>
                </h2>
                <p class="text-gray-600 text-sm line-clamp-3 mb-6">
                    {{ strip_tags($item->konten) }}
                </p>
                <div class="mt-auto">
                    <a href="/berita/{{ $item->slug }}" class="text-[#8B5CF6] font-bold text-sm inline-flex items-center group">
                        Baca Selengkapnya 
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-3 text-center py-20">
            <img src="https://illustrations.popsy.co/purple/searching.svg" class="w-64 mx-auto mb-6" alt="No News">
            <h3 class="text-xl font-bold text-gray-800">Belum Ada Berita</h3>
            <p class="text-gray-500">Nantikan informasi menarik dari kami segera.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-16">
        {{ $berita->links() }}
    </div>
</div>
@endsection