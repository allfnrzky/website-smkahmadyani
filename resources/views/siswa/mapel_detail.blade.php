<x-app-layout title="Detail Mapel">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('kelas.detail', $mapel->kelas_id) }}" 
               class="flex items-center justify-center w-10 h-10 rounded-2xl bg-white text-purple-600 hover:bg-purple-600 hover:text-white transition-all duration-300 shadow-sm border border-purple-100 group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            </a>
            <div>
                <h2 class="font-black text-xl text-gray-800 leading-tight tracking-tighter uppercase">
                    {{ $mapel->nama }}
                </h2>
                <p class="text-[10px] font-bold text-purple-500 uppercase tracking-[0.2em]">Siswa Area - SMK Ahmad Yani</p>
                <p class="text-[9px] font-bold text-gray-500 uppercase tracking-[0.15em] mt-1">
                    Guru: {{ $mapel->guru->name }} @if($mapel->guru->nip) | NIP: {{ $mapel->guru->nip }} @endif
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 md:py-16 bg-gray-50/30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Judul Halaman Di Atas Konten -->
            <div class="mb-12 text-center md:text-left relative">
                <div class="flex items-center justify-center md:justify-start gap-4 mb-2">
                    <span class="w-12 h-1.5 bg-purple-600 rounded-full hidden md:block"></span>
                    <h1 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tighter uppercase">Daftar <span class="text-purple-600">Pertemuan</span></h1>
                </div>
            </div>

            <div class="space-y-16">
                @forelse($pertemuans as $p)
                    <div class="relative">
                        <!-- Garis Timeline samping (Desktop Only) -->
                        <div class="absolute left-[-24px] top-0 bottom-[-64px] w-1 bg-gradient-to-b from-purple-200 to-transparent rounded-full hidden md:block">
                            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-4 h-4 bg-purple-600 rounded-full border-4 border-white shadow-sm"></div>
                        </div>

                        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-xl">
                            <!-- Header Pertemuan -->
                            <div class="p-8 md:p-10 bg-gradient-to-br from-purple-600 to-indigo-700 text-white relative overflow-hidden">
                                <div class="absolute right-[-5%] top-[-15%] text-[10rem] opacity-10 font-black select-none">
                                    {{ $loop->iteration }}
                                </div>
                                
                                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div>
                                        <span class="inline-block text-[9px] font-black uppercase tracking-[0.3em] bg-white/20 px-3 py-1 rounded-full mb-3">Sesi Belajar</span>
                                        <h3 class="text-3xl md:text-4xl font-black tracking-tighter uppercase leading-none">{{ $p->judul }}</h3>
                                        <p class="text-[10px] font-bold text-purple-100 uppercase tracking-widest mt-4 flex items-center gap-2">
                                            <i class="fas fa-calendar-alt text-[8px]"></i> Tanggal Rilis: {{ $p->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-2 bg-black/20 backdrop-blur-md px-5 py-3 rounded-2xl border border-white/10 shadow-inner">
                                        <div class="text-center px-2">
                                            <p class="text-[16px] font-black leading-none">{{ $p->materis->count() }}</p>
                                            <p class="text-[8px] font-bold uppercase opacity-70 tracking-tighter">Materi</p>
                                        </div>
                                        <div class="w-px h-8 bg-white/20"></div>
                                        <div class="text-center px-2">
                                            <p class="text-[16px] font-black leading-none">{{ $p->tugas->count() }}</p>
                                            <p class="text-[8px] font-bold uppercase opacity-70 tracking-tighter">Tugas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-8 md:p-10 space-y-12">
                                <!-- Instruksi Guru -->
                                @if($p->deskripsi)
                                    <div class="relative p-6 bg-amber-50 border-l-4 border-amber-400 rounded-2xl shadow-sm">
                                        <div class="flex items-center gap-2 mb-3">
                                            <div class="w-7 h-7 bg-amber-400 text-white rounded-lg flex items-center justify-center text-xs">
                                                <i class="fas fa-bullhorn"></i>
                                            </div>
                                            <h4 class="text-[10px] font-black text-amber-800 uppercase tracking-widest">Informasi Penting</h4>
                                        </div>
                                        <div class="text-gray-700 leading-relaxed font-medium text-sm italic break-words">
                                            {!! nl2br(e($p->deskripsi)) !!}
                                        </div>
                                    </div>
                                @endif

                                <!-- Daftar Materi -->
                                <div class="space-y-6">
                                    <h4 class="text-[11px] font-black text-gray-900 uppercase tracking-[0.3em] flex items-center gap-3">
                                        <span class="w-8 h-1 bg-purple-600 rounded-full"></span> Modul Pembelajaran
                                    </h4>
                                    <div class="grid grid-cols-1 gap-4">
                                        @forelse($p->materis as $mt)
                                            <div class="group p-5 border border-gray-100 rounded-3xl flex justify-between items-center bg-gray-50/50 hover:bg-white hover:border-purple-200 hover:shadow-md transition-all duration-300">
                                                <div class="flex items-center gap-4">
                                                    <div class="w-12 h-12 rounded-2xl bg-white text-purple-600 flex items-center justify-center shadow-sm group-hover:bg-purple-600 group-hover:text-white transition-all">
                                                        <i class="fas fa-file-pdf text-xl"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-black text-gray-900 text-sm uppercase tracking-tight">{{ $mt->judul }}</h5>
                                                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">Format: Dokumen PDF</p>
                                                    </div>
                                                </div>
                                                @if($mt->file_path)
                                                    <a href="{{ asset('storage/' . $mt->file_path) }}" target="_blank" class="bg-[#8B5CF6] text-white px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-purple-700 shadow-lg shadow-purple-100 transition-all active:scale-90 flex items-center gap-2">
                                                        LIHAT <i class="fas fa-eye text-[8px]"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        @empty
                                            <p class="text-xs text-gray-400 italic text-center py-4 bg-gray-50 rounded-2xl border-2 border-dashed">Tidak ada file modul.</p>
                                        @endforelse
                                    </div>
                                </div>

                                <!-- Daftar Tugas -->
                                <div class="space-y-6">
                                    <h4 class="text-[11px] font-black text-gray-900 uppercase tracking-[0.3em] flex items-center gap-3">
                                        <span class="w-8 h-1 bg-red-500 rounded-full"></span> Evaluasi / Tugas
                                    </h4>
                                    <div class="space-y-4">
                                        @forelse($p->tugas as $tg)
                                            @php $sudahKumpul = $tg->pengumpulans->first(); @endphp
                                            
                                            <div class="p-6 md:p-8 border rounded-[2rem] flex flex-col gap-6 {{ $sudahKumpul ? 'bg-green-50/30 border-green-200' : 'bg-white border-gray-100 shadow-sm' }}">
                                                <div class="flex flex-col md:flex-row justify-between items-start gap-4">
                                                    <div class="flex-1">
                                                        <div class="flex items-center flex-wrap gap-3 mb-2">
                                                            <h5 class="font-black text-gray-950 text-xl uppercase tracking-tight leading-none">{{ $tg->judul }}</h5>
                                                            @if($sudahKumpul)
                                                                <span class="text-[9px] bg-green-600 text-white px-3 py-1 rounded-full font-black uppercase tracking-widest shadow-lg shadow-green-100">Selesai</span>
                                                            @endif
                                                        </div>
                                                        <p class="text-[9px] text-red-600 font-black mb-4 uppercase tracking-[0.2em] flex items-center gap-2">
                                                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-ping"></span> 
                                                            Deadline: {{ \Carbon\Carbon::parse($tg->deadline)->format('d M, H:i') }}
                                                        </p>
                                                        <p class="text-sm text-gray-600 font-medium leading-relaxed max-w-2xl italic">{{ $tg->deskripsi }}</p>
                                                    </div>

                                                    @if($sudahKumpul && $sudahKumpul->nilai !== null)
                                                        <div class="w-full md:w-auto bg-white p-5 rounded-3xl border border-green-200 shadow-inner flex flex-col items-center justify-center min-w-[120px]">
                                                            <p class="text-[9px] font-black text-green-700 uppercase tracking-widest mb-1">Skor Diperoleh</p>
                                                            <span class="text-5xl font-black text-green-800 tracking-tighter">{{ $sudahKumpul->nilai }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                                <div class="pt-6 border-t border-gray-100">
                                                    @if(!$sudahKumpul)
                                                        <form action="{{ route('siswa.tugas.kumpul', $tg->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                                                            @csrf
                                                            <div class="flex-grow bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl p-3">
                                                                <input type="file" name="file" class="text-[10px] w-full file:bg-purple-600 file:text-white file:border-0 file:rounded-xl file:px-4 file:py-2 file:font-black file:uppercase file:mr-4 cursor-pointer" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.zip" required>
                                                                <p class="text-[9px] text-gray-400 mt-2 font-bold uppercase tracking-widest">Format: JPG, PNG, PDF, DOC, DOCX, ZIP (Max 5MB)</p>
                                                            </div>
                                                            <button type="submit" class="bg-gray-900 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-purple-600 shadow-xl transition-all">
                                                                Submit Tugas
                                                            </button>
                                                        </form>
                                                    @else
                                                        <div class="flex flex-wrap gap-3">
                                                            <a href="{{ asset('storage/' . $sudahKumpul->file_path) }}" target="_blank" class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-gray-50 transition-all shadow-sm">
                                                                <i class="fas fa-eye text-purple-600"></i> Jawaban Anda
                                                            </a>
                                                            @if($sudahKumpul->nilai === null)
                                                                <div class="flex items-center gap-2 text-orange-500 bg-orange-50 px-4 py-2 rounded-2xl border border-orange-100">
                                                                    <i class="fas fa-clock text-[10px] animate-spin"></i>
                                                                    <span class="text-[9px] font-black uppercase tracking-widest">Verifikasi Guru</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-xs text-gray-400 italic text-center py-8 bg-gray-50 rounded-[2rem] border-2 border-dashed">Belum ada tugas.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-300">
                            <i class="fas fa-folder-open text-2xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium italic text-sm">Belum ada aktivitas belajar.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>