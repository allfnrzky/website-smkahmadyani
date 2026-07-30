@extends('layouts.frontend')

@section('content')
<div class="bg-[#8B5CF6] py-16">
    <div class="max-w-7xl mx-auto px-4 text-center text-white">
        <h1 class="text-4xl font-bold italic">Program Keahlian</h1>
        <p class="mt-2 text-purple-100">Mencetak tenaga kerja profesional yang siap bersaing secara global</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    @foreach($jurusan as $index => $j)
    <div class="flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} items-center gap-12 mb-24 last:mb-0">
        
        <div class="w-full md:w-1/2">
            <div class="relative">
                <div class="absolute -inset-4 bg-purple-100 rounded-2xl transform {{ $index % 2 == 0 ? 'rotate-3' : '-rotate-3' }}"></div>
                <img src="{{ asset('images/jurusan/jurusan-' . ($index + 1) . '.jpeg') }}" 
                     alt="{{ $j->nama }}" 
                     class="relative rounded-2xl shadow-xl w-full h-[350px] object-cover">
            </div>
        </div>

        <div class="w-full md:w-1/2 space-y-6">
            <div class="inline-block px-4 py-1 bg-purple-100 text-[#8B5CF6] rounded-full text-sm font-bold uppercase tracking-wider">
                Unggulan
            </div>
            <h2 class="text-3xl font-extrabold text-gray-800">{{ $j->nama }}</h2>
            <div class="h-1.5 w-20 bg-yellow-500"></div>
            
            <p class="text-gray-600 leading-relaxed text-lg">
                @if($j->nama == 'Bisnis Digital')
                    Fokus pada strategi pemasaran online, pengelolaan e-commerce, dan kewirausahaan berbasis teknologi untuk menghadapi ekonomi digital masa kini.
                @elseif($j->nama == 'Teknik Komputer dan Jaringan')
                    Mempelajari infrastruktur jaringan, perakitan komputer, hingga administrasi server dan keamanan siber yang krusial bagi industri IT.
                @elseif($j->nama == 'Layanan Perbankan Syariah')
                    Membekali siswa dengan kompetensi akuntansi dan manajemen keuangan berbasis syariah yang kini menjadi tren besar di industri finansial.
                @else
                    Mendalami manajemen kefarmasian, pelayanan obat, dan komunikasi kesehatan untuk mendukung tenaga medis profesional.
                @endif
            </p>

            <ul class="space-y-3">
                <li class="flex items-center text-gray-700">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Kurikulum berbasis industri (DUDI)
                </li>
                <li class="flex items-center text-gray-700">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Laboratorium lengkap & modern
                </li>
            </ul>

            <div class="pt-4">
                <a href="{{ route('program-keahlian.detail', $j->id) }}" class="inline-flex items-center px-6 py-3 bg-white border-2 border-[#8B5CF6] text-[#8B5CF6] font-bold rounded-lg hover:bg-[#8B5CF6] hover:text-white transition">
                    Lihat Selengkapnya
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="bg-gray-100 py-16 border-t border-b border-gray-200">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-2xl font-bold text-gray-800">Bingung Memilih Jurusan?</h2>
        <p class="text-gray-600 mt-4">Konsultasikan minat dan bakatmu dengan tim bimbingan konseling kami atau unduh brosur lengkap untuk detail kurikulum.</p>
        <div class="mt-8 flex justify-center gap-4">
            <!-- <button class="bg-white border-2 border-[#8B5CF6] text-[#8B5CF6] px-6 py-2 rounded-lg font-bold hover:bg-[#8B5CF6] hover:text-white transition">Unduh Brosur</button> -->
            <button class="bg-[#8B5CF6] text-white px-6 py-2 rounded-lg font-bold hover:bg-[#7C3AED] transition">Hubungi Kami</button>
        </div>
    </div>
</div>
@endsection