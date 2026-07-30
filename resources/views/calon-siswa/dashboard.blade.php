<x-app-layout title="Dashboard PPDB">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Dashboard PPDB</h2>
    </x-slot>

    <div class="py-6 md:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Welcome -->
            <div class="bg-gradient-to-br from-[#8B5CF6] to-[#7C3AED] p-8 md:p-10 rounded-[2.5rem] text-white shadow-xl">
                <h3 class="text-2xl md:text-3xl font-black tracking-tighter uppercase">
                    Selamat Datang, {{ auth()->user()->name }}!
                </h3>
                <p class="text-purple-100 text-sm mt-2 font-medium">
                    @if($pendaftaran && $pendaftaran->status == 'lulus')
                        Selamat! Kamu telah diterima. Pantau terus pengumuman selanjutnya dari sekolah.
                    @elseif($pendaftaran)
                        Pendaftaran PPDB kamu sedang dalam proses.
                    @else
                        Silakan lengkapi data pendaftaran PPDB untuk menjadi calon siswa SMK Ahmad Yani.
                    @endif
                </p>
            </div>

            <!-- Status Card / Info -->
            @if($pendaftaran && $pendaftaran->status == 'lulus')
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-blue-100 bg-gradient-to-br from-blue-50 to-indigo-50">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-2xl bg-blue-100 text-blue-600 shadow-inner">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-[10px] font-black text-blue-500 uppercase tracking-widest">Status: DITERIMA</p>
                        <h4 class="text-lg font-black text-gray-900 mt-1">
                            Kamu telah dinyatakan <span class="text-green-600">DITERIMA</span> di SMK Ahmad Yani!
                        </h4>
                        <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                            Selamat! Kamu resmi diterima. Saat ini kamu sedang dalam tahap <strong>menunggu pengumuman selanjutnya</strong> dari pihak sekolah terkait jadwal daftar ulang dan informasi lainnya.
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            Pantau terus halaman <a href="{{ route('siswa.pengumuman') }}" class="text-blue-600 font-bold underline">Pengumuman</a> untuk informasi terbaru.
                        </p>
                        @if($pendaftaran->catatan_admin)
                            <div class="mt-4 p-4 bg-white/70 rounded-2xl border border-blue-200">
                                <p class="text-[10px] font-black text-blue-500 uppercase tracking-widest mb-1">Pesan Admin:</p>
                                <p class="text-sm text-gray-700 font-medium">{{ $pendaftaran->catatan_admin }}</p>
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('siswa.cetak-bukti') }}"
                        class="px-6 py-3 bg-green-600 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-green-700 transition-all shadow-lg whitespace-nowrap">
                        <i class="fa-solid fa-file-pdf mr-1"></i> Cetak Bukti
                    </a>
                </div>
            </div>
            @elseif($pendaftaran && $pendaftaran->status == 'tidak_lulus')
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-red-100 bg-gradient-to-br from-red-50 to-rose-50">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-2xl bg-red-100 text-red-600 shadow-inner">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-[10px] font-black text-red-500 uppercase tracking-widest">Status: TIDAK DITERIMA</p>
                        <h4 class="text-lg font-black text-gray-900 mt-1">
                            Mohon maaf, kamu belum diterima.
                        </h4>
                        <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                            Kamu dinyatakan <strong>Tidak Diterima</strong> di SMK Ahmad Yani. Silakan hubungi panitia PPDB untuk informasi lebih lanjut.
                        </p>
                        @if($pendaftaran->catatan_admin)
                            <div class="mt-4 p-4 bg-white/70 rounded-2xl border border-red-200">
                                <p class="text-[10px] font-black text-red-500 uppercase tracking-widest mb-1">Pesan Admin:</p>
                                <p class="text-sm text-gray-700 font-medium">{{ $pendaftaran->catatan_admin }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @elseif($pendaftaran)
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-2xl shadow-inner bg-yellow-50 text-yellow-600">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Status Pendaftaran</p>
                        <h4 class="text-xl font-black text-gray-900 uppercase tracking-tight mt-1">
                            No. {{ $pendaftaran->no_pendaftaran }}
                        </h4>
                        <span class="inline-block mt-2 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-yellow-100 text-yellow-700">
                            Dalam Proses
                        </span>
                    </div>
                    <a href="{{ route('siswa.pendaftaran') }}"
                        class="px-6 py-3 bg-[#8B5CF6] text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-[#7C3AED] transition-all shadow-lg">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endif

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('siswa.pendaftaran') }}"
                    class="group bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#8B5CF6]/20 transition-all flex items-center gap-6">
                    <div class="w-14 h-14 bg-purple-50 text-[#8B5CF6] rounded-2xl flex items-center justify-center text-xl group-hover:bg-[#8B5CF6] group-hover:text-white transition-all">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div>
                        <h4 class="font-black text-gray-900 uppercase tracking-tight">Pendaftaran</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">
                            {{ $pendaftaran ? 'Lihat data pendaftaran kamu' : 'Isi formulir pendaftaran PPDB' }}
                        </p>
                    </div>
                </a>

                <a href="{{ route('siswa.pengumuman') }}"
                    class="group bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#8B5CF6]/20 transition-all flex items-center gap-6">
                    <div class="w-14 h-14 bg-purple-50 text-[#8B5CF6] rounded-2xl flex items-center justify-center text-xl group-hover:bg-[#8B5CF6] group-hover:text-white transition-all">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div>
                        <h4 class="font-black text-gray-900 uppercase tracking-tight">Pengumuman</h4>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">
                            Lihat pengumuman terbaru dari sekolah
                        </p>
                    </div>
                </a>
            </div>

            <!-- Pengumuman Terbaru -->
            @if($pengumuman_terbaru)
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">Pengumuman Terbaru</h3>
                </div>
                <div class="p-6 bg-gradient-to-br from-red-50 to-orange-50 rounded-2xl border border-red-100">
                    <span class="text-[9px] font-black text-red-500 uppercase tracking-widest bg-red-100 px-3 py-1 rounded-full">
                        {{ $pengumuman_terbaru->kategori }}
                    </span>
                    <h4 class="text-lg font-black text-gray-900 mt-3">{{ $pengumuman_terbaru->judul }}</h4>
                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">{{ Str::limit($pengumuman_terbaru->isi, 200) }}</p>
                    <p class="text-[10px] text-gray-400 mt-4 font-bold">{{ $pengumuman_terbaru->created_at->format('d M Y') }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
