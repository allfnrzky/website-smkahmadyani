@extends('layouts.frontend')

@section('content')
<div class="bg-[#8B5CF6] py-16">
    <div class="max-w-7xl mx-auto px-4 text-center text-white">
        <h1 class="text-4xl font-bold italic">{{ $j->nama }}</h1>
        <p class="mt-2 text-purple-100">{{ $deskripsiSingkat }}</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16 space-y-24">

    {{-- =======================
        Mengenal Lebih Dekat Jurusan
    ======================== --}}
    <section>
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="w-full lg:w-1/3 flex justify-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-purple-100 rounded-3xl transform rotate-6"></div>
                    <img src="{{ asset('images/jurusan/' . $logo) }}"
                         alt="{{ $j->nama }}"
                         class="relative rounded-3xl shadow-xl w-72 h-72 object-contain bg-white p-6">
                </div>
            </div>
            <div class="w-full lg:w-2/3 space-y-6">
                <h2 class="text-3xl font-black text-gray-900 tracking-tight uppercase italic">
                    Mengenal Lebih Dekat <br>
                    <span class="text-[#8B5CF6]">{{ $j->nama }}</span>
                </h2>
                <div class="h-1.5 w-24 bg-yellow-500 rounded-full"></div>
                <p class="text-gray-600 leading-relaxed text-lg">
                    {{ $j->deskripsi ?? $deskripsiSingkat }}
                </p>
                <p class="text-gray-600 leading-relaxed text-lg">
                    Selama masa pembelajaran, siswa dibimbing untuk memiliki kompetensi
                    yang sesuai dengan kebutuhan industri. Pembelajaran dilakukan melalui
                    perpaduan teori dan praktik sehingga siswa mampu memahami perkembangan
                    teknologi dan ilmu pengetahuan secara menyeluruh.
                </p>

            </div>
        </div>
    </section>

    {{-- =======================
        Alasan & Materi
    ======================== --}}
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            {{-- Alasan --}}
            <div class="space-y-8">
                <h3 class="text-2xl font-black text-gray-900 tracking-tight uppercase italic flex items-center gap-4">
                    <span class="w-10 h-10 bg-[#8B5CF6] text-white rounded-2xl flex items-center justify-center text-sm shadow-lg shadow-purple-200">
                        <i class="fas fa-question-circle"></i>
                    </span>
                    Alasan Memilih {{ $j->nama }}
                </h3>
                <div class="space-y-6">
                    @foreach($alasan as $a)
                    <div class="flex gap-4 p-6 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-1.5 bg-[#8B5CF6] rounded-full shrink-0"></div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">{{ $a['judul'] }}</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $a['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Materi --}}
            <div class="space-y-8">
                <h3 class="text-2xl font-black text-gray-900 tracking-tight uppercase italic flex items-center gap-4">
                    <span class="w-10 h-10 bg-amber-500 text-white rounded-2xl flex items-center justify-center text-sm shadow-lg shadow-amber-200">
                        <i class="fas fa-book"></i>
                    </span>
                    Materi Yang Dipelajari
                </h3>
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                    @foreach($materi as $i => $m)
                    <div class="flex items-center gap-4 px-6 py-4 {{ $i % 2 == 0 ? 'bg-gray-50/50' : 'bg-white' }} hover:bg-purple-50/50 transition-colors">
                        <span class="w-7 h-7 rounded-lg bg-[#8B5CF6]/10 text-[#8B5CF6] flex items-center justify-center text-xs font-black shrink-0">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="text-sm font-medium text-gray-700">{{ $m }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- =======================
        Galeri & Praktik
    ======================== --}}
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            {{-- Galeri --}}
            <div class="space-y-8">
                <h3 class="text-2xl font-black text-gray-900 tracking-tight uppercase italic flex items-center gap-4">
                    <span class="w-10 h-10 bg-green-500 text-white rounded-2xl flex items-center justify-center text-sm shadow-lg shadow-green-200">
                        <i class="fas fa-images"></i>
                    </span>
                    Galeri Kegiatan
                </h3>

                @if(count($galeri) > 0)
                <div class="space-y-4">
                    <img id="mainImage"
                         src="{{ asset($galeri[0]) }}"
                         class="w-full h-72 md:h-96 object-cover rounded-3xl shadow-lg border border-gray-100">

                    <div class="flex gap-3 flex-wrap">
                        @foreach($galeri as $g)
                        <img src="{{ asset($g) }}"
                             class="galeri-thumb rounded-xl cursor-pointer object-cover border-3 transition-all duration-300 hover:scale-105"
                             style="width:90px;height:70px;border:3px solid transparent;"
                             onclick="gantiGaleri(this)">
                        @endforeach
                    </div>
                </div>
                @else
                <div class="bg-gray-50 rounded-3xl p-12 text-center text-gray-400">
                    <i class="fas fa-image text-5xl mb-4"></i>
                    <p class="font-bold">Belum ada galeri tersedia</p>
                </div>
                @endif
            </div>

            {{-- Praktik --}}
            <div class="space-y-8">
                <h3 class="text-2xl font-black text-gray-900 tracking-tight uppercase italic flex items-center gap-4">
                    <span class="w-10 h-10 bg-red-500 text-white rounded-2xl flex items-center justify-center text-sm shadow-lg shadow-red-200">
                        <i class="fas fa-flask"></i>
                    </span>
                    Pembelajaran Berbasis Praktik
                </h3>

                <div class="space-y-6 text-gray-600 leading-relaxed">
                    <p>{{ $praktik }}</p>
                    <p>Selain pembelajaran di laboratorium, siswa juga mendapatkan pengalaman melalui proyek berbasis tim, Praktik Kerja Lapangan (PKL), kunjungan industri, serta pelatihan dan sertifikasi sesuai perkembangan ilmu pengetahuan dan teknologi. Dengan pendekatan ini, lulusan diharapkan memiliki kompetensi, karakter, dan kesiapan kerja yang sesuai dengan kebutuhan dunia usaha dan dunia industri.</p>
                </div>

                <div class="p-6 bg-purple-50 rounded-3xl border border-purple-100">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-[#8B5CF6] rounded-2xl flex items-center justify-center text-white text-xl shadow-lg shadow-purple-200">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <p class="font-black text-gray-900 text-sm uppercase tracking-tight">Siap Bergabung?</p>
                            <p class="text-xs text-gray-500">Kembangkan potensimu bersama {{ $j->nama }}</p>
                        </div>
                        <a href="{{ route('login') }}" class="ml-auto bg-[#8B5CF6] text-white px-6 py-3 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-[#7C3AED] transition shadow-lg whitespace-nowrap">
                            Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- CTA --}}
<div class="bg-gray-100 py-16 border-t border-b border-gray-200">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-2xl font-bold text-gray-800">Bingung Memilih Jurusan?</h2>
        <p class="text-gray-600 mt-4">Konsultasikan minat dan bakatmu dengan tim bimbingan konseling kami atau unduh brosur lengkap untuk detail kurikulum.</p>
        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('program-keahlian') }}" class="bg-white border-2 border-[#8B5CF6] text-[#8B5CF6] px-6 py-2.5 rounded-xl font-bold hover:bg-[#8B5CF6] hover:text-white transition text-sm">
                Lihat Jurusan Lain
            </a>
            <a href="{{ route('login') }}" class="bg-[#8B5CF6] text-white px-6 py-2.5 rounded-xl font-bold hover:bg-[#7C3AED] transition text-sm">
                Hubungi Kami
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function gantiGaleri(el) {
    document.getElementById('mainImage').src = el.src;
    document.querySelectorAll('.galeri-thumb').forEach(function(img) {
        img.style.borderColor = 'transparent';
    });
    el.style.borderColor = '#8B5CF6';
}

document.addEventListener('DOMContentLoaded', function() {
    const thumbs = document.querySelectorAll('.galeri-thumb');
    if (thumbs.length > 0) {
        thumbs[0].style.borderColor = '#8B5CF6';
    }
});
</script>
@endpush
