<x-app-layout title="Detail Mapel">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-10 h-10 rounded-2xl bg-white text-purple-600 hover:bg-purple-600 hover:text-white transition-all shadow-sm border border-purple-100 group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            </a>
            <div>
                <h2 class="font-black text-xl text-gray-800 leading-tight tracking-tighter uppercase italic">
                    Mapel: <span class="text-purple-600">{{ $mapel->nama }}</span>
                </h2>
                <p class="text-[10px] font-bold text-purple-400 uppercase tracking-[0.2em]">Kelola Pertemuan & Tugas</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 md:py-16 bg-gray-50/30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Form Buat Pertemuan (Modern & Bold) -->
            <div class="bg-white p-8 md:p-12 rounded-[3rem] shadow-sm mb-16 border border-purple-50 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-5 text-8xl"><i class="fas fa-paper-plane"></i></div>
                
                <h3 class="font-black mb-10 text-gray-900 text-2xl tracking-tighter uppercase italic flex items-center gap-4">
                    <span class="w-12 h-12 bg-purple-600 text-white rounded-2xl flex items-center justify-center text-sm shadow-lg shadow-purple-200 animate-pulse">
                        <i class="fas fa-plus"></i>
                    </span>
                    Buat Pertemuan Baru
                </h3>
                
                <form action="{{ route('guru.materi.store', $mapel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10 relative z-10">
                    @csrf
                    
                    <!-- Materi Section -->
                    <div class="p-8 bg-purple-50/50 rounded-[2.5rem] border border-purple-100">
                        <label class="block text-[11px] font-black text-purple-600 mb-5 uppercase tracking-[0.3em] ml-2">I. Materi & Judul</label>
                        <input type="text" name="judul" class="w-full border-gray-100 bg-white rounded-2xl mb-5 py-4 px-6 focus:ring-8 focus:ring-purple-100 focus:border-purple-600 transition-all text-sm font-bold shadow-sm" placeholder="Contoh: Pertemuan 1 - Dasar Algoritma" required>
                        
                        <div class="flex items-center gap-4 bg-white p-4 rounded-2xl border-2 border-dashed border-purple-200 group hover:border-purple-400 transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-purple-600 shrink-0">
                                <i class="fas fa-file-arrow-up"></i>
                            </div>
                            <div class="flex-grow">
                                <input type="file" name="file" class="text-xs w-full file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:bg-purple-600 file:text-white cursor-pointer hover:file:bg-purple-800 transition-all">
                                <p class="text-[9px] text-gray-400 mt-2 font-bold uppercase tracking-widest">Format: PDF, ZIP, DOCX (Maks 5MB)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi Section -->
                    <div class="space-y-4">
                        <label class="block text-[11px] font-black text-gray-400 mb-2 uppercase tracking-[0.3em] ml-4">II. Instruksi Belajar</label>
                        <textarea name="deskripsi_pertemuan" rows="4" class="w-full border-gray-100 bg-gray-50 rounded-[2rem] p-7 text-sm focus:ring-8 focus:ring-purple-50 focus:border-purple-600 transition-all font-medium italic" placeholder="Tuliskan instruksi apa yang harus dilakukan siswa pada pertemuan ini..."></textarea>
                    </div>

                    <!-- Tugas Section -->
                    <div id="tugas-wrapper" class="space-y-6">
                        <div class="flex justify-between items-center px-4">
                            <label class="text-[11px] font-black text-red-500 uppercase tracking-[0.3em]">III. Evaluasi / Tugas</label>
                            <button type="button" onclick="addTugasRow()" class="bg-white text-red-500 border-2 border-red-100 hover:bg-red-500 hover:text-white text-[10px] font-black px-6 py-2.5 rounded-full transition-all uppercase tracking-widest shadow-sm active:scale-90">
                                + Tambah Slot Tugas
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gray-900 text-white py-5 rounded-[2rem] font-black text-xs tracking-[0.3em] shadow-2xl shadow-gray-200 hover:bg-purple-600 transition-all uppercase flex items-center justify-center gap-4 group">
                        PUBLIKASIKAN MATERI <i class="fas fa-paper-plane group-hover:translate-x-2 transition-transform"></i>
                    </button>
                </form>
            </div>

            <!-- List Pertemuan -->
            <div class="space-y-8">
                <div class="flex items-center gap-3 ml-2 mb-8">
                    <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                    <h3 class="font-black text-gray-400 uppercase text-[11px] tracking-[0.4em]">Daftar Pertemuan</h3>
                </div>
                
                @foreach($pertemuans as $p)
                        <div x-data="{ open: false, showDelete: false, showEdit: false, showEditTugas: null, showDeleteTugas: null }" class="relative">
                        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden transition-all duration-300 hover:shadow-xl">
                            <div class="flex">
                                <!-- Bagian Konten Utama -->
                                <div @click="open = !open" class="flex-grow p-8 flex justify-between items-center cursor-pointer hover:bg-gray-50/50 transition-all border-l-[12px] border-purple-600">
                                    <div>
                                        <h4 class="text-xl font-black text-gray-900 tracking-tight uppercase italic leading-none mb-2">{{ $p->judul }}</h4>
                                        <div class="flex items-center gap-3">
                                            <span class="text-[9px] font-black text-purple-600 bg-purple-50 px-2 py-0.5 rounded uppercase tracking-widest">{{ $p->materis->count() }} Modul</span>
                                            <span class="text-[9px] font-black text-red-600 bg-red-50 px-2 py-0.5 rounded uppercase tracking-widest">{{ $p->tugas->count() }} Tugas</span>
                                            <span class="text-[9px] font-bold text-gray-300 uppercase tracking-widest italic">{{ $p->created_at->format('d/m/y') }}</span>
                                        </div>
                                    </div>
                                    <i :class="open ? 'rotate-180' : ''" class="fas fa-chevron-down text-gray-300 transition-transform duration-500"></i>
                                </div>

                                <!-- Tombol Edit -->
                                <button @click="showEdit = true" class="px-5 bg-amber-50 text-amber-300 hover:bg-amber-500 hover:text-white transition-all border-l border-gray-50 group">
                                    <i class="fas fa-pen group-hover:scale-110 transition-transform"></i>
                                </button>
                                <!-- Tombol Hapus Cepat -->
                                <button @click="showDelete = true" class="px-6 bg-red-50 text-red-300 hover:bg-red-600 hover:text-white transition-all border-l border-gray-50 group">
                                    <i class="fas fa-trash-can group-hover:scale-110 transition-transform"></i>
                                </button>
                            </div>

                            <!-- Detail Content -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4" class="p-8 md:p-12 border-t border-gray-50 bg-gray-50/30 space-y-12">
                                @if($p->deskripsi)
                                    <div class="p-7 bg-amber-50/50 border-l-4 border-amber-400 rounded-2xl italic">
                                        <p class="text-[10px] font-black text-amber-800 uppercase mb-3 tracking-widest flex items-center gap-2">
                                            <i class="fas fa-bullhorn"></i> Catatan Pengajar
                                        </p>
                                        <p class="text-sm text-gray-700 leading-relaxed">{{ $p->deskripsi }}</p>
                                    </div>
                                @endif

                                <!-- Materi List -->
                                <div class="space-y-4">
                                    <h5 class="text-[10px] font-black text-purple-600 uppercase tracking-[0.3em] flex items-center gap-3">
                                        <span class="w-1.5 h-1.5 bg-purple-500 rounded-full"></span> File Materi
                                    </h5>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        @foreach($p->materis as $m)
                                            <div class="flex justify-between items-center p-5 bg-white border border-gray-100 rounded-2xl group hover:border-purple-200 transition-all shadow-sm">
                                                <div class="flex items-center gap-3 overflow-hidden">
                                                    <i class="fas fa-file-pdf text-purple-200 text-lg group-hover:text-purple-600 transition-colors"></i>
                                                    <span class="text-xs font-black text-gray-800 truncate uppercase tracking-tight">{{ $m->judul }}</span>
                                                </div>
                                                @if($m->file_path)
                                                    <a href="{{ asset('storage/'.$m->file_path) }}" target="_blank" class="text-[9px] font-black text-purple-600 border border-purple-100 px-4 py-2 rounded-xl hover:bg-purple-600 hover:text-white transition-all uppercase tracking-widest">
                                                        OPEN
                                                    </a>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Tugas List -->
                                <div class="space-y-4">
                                    <h5 class="text-[10px] font-black text-red-500 uppercase tracking-[0.3em] flex items-center gap-3">
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span> Panel Penugasan
                                    </h5>
                                    <div class="grid grid-cols-1 gap-4">
                                        @foreach($p->tugas as $t)
                                            <div class="flex flex-col sm:flex-row justify-between items-center p-6 bg-white border-l-4 border-red-500 rounded-2xl gap-4 shadow-sm hover:shadow-md transition-shadow">
                                                <div class="text-center sm:text-left flex-grow">
                                                    <p class="text-base font-black text-gray-950 uppercase italic leading-tight">{{ $t->judul }}</p>
                                                    <p class="text-[10px] text-red-500 font-bold uppercase mt-2 tracking-[0.1em] flex items-center gap-2 justify-center sm:justify-start">
                                                        <i class="fas fa-clock text-[8px] animate-pulse"></i> Batas: {{ \Carbon\Carbon::parse($t->deadline)->format('d M Y, H:i') }}
                                                    </p>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <button @click="showEditTugas = {{ $t->id }}" class="bg-amber-50 text-amber-400 hover:bg-amber-500 hover:text-white w-10 h-10 rounded-xl transition-all">
                                                        <i class="fas fa-pen text-xs"></i>
                                                    </button>
                                                    <button @click="showDeleteTugas = {{ $t->id }}" class="bg-red-50 text-red-300 hover:bg-red-600 hover:text-white w-10 h-10 rounded-xl transition-all">
                                                        <i class="fas fa-trash-can text-xs"></i>
                                                    </button>
                                                    <a href="{{ route('guru.tugas.lihat', $t->id) }}" class="bg-gray-900 text-white px-6 py-3 rounded-2xl text-[10px] font-black hover:bg-red-600 transition-all shadow-lg shadow-gray-100 uppercase tracking-widest text-center active:scale-95 whitespace-nowrap">
                                                        Lihat
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Modal Edit Tugas -->
                                            <div x-show="showEditTugas === {{ $t->id }}" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
                                                <div class="fixed inset-0 bg-gray-950/40 backdrop-blur-sm" @click="showEditTugas = null"></div>
                                                <div class="bg-white rounded-[2.5rem] p-10 max-w-lg w-full relative z-[101] shadow-2xl border border-amber-100">
                                                    <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-3xl flex items-center justify-center mx-auto mb-5 text-2xl shadow-inner">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <h3 class="text-2xl font-black text-gray-900 mb-6 text-center uppercase italic tracking-tighter">Edit Tugas</h3>
                                                    <form action="{{ route('guru.tugas.update', $t->id) }}" method="POST">
                                                        @csrf @method('PUT')
                                                        <div class="space-y-5">
                                                            <div>
                                                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Judul Tugas</label>
                                                                <input type="text" name="judul" value="{{ $t->judul }}" class="w-full border-gray-100 bg-gray-50 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-amber-100 focus:border-amber-500 transition-all text-sm font-bold" required>
                                                            </div>
                                                            <div>
                                                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Deskripsi</label>
                                                                <textarea name="deskripsi" rows="3" class="w-full border-gray-100 bg-gray-50 rounded-2xl p-6 focus:ring-4 focus:ring-amber-100 focus:border-amber-500 transition-all text-sm font-medium italic">{{ $t->deskripsi }}</textarea>
                                                            </div>
                                                            <div>
                                                                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Deadline</label>
                                                                <input type="datetime-local" name="deadline" value="{{ \Carbon\Carbon::parse($t->deadline)->format('Y-m-d\TH:i') }}" class="w-full border-gray-100 bg-gray-50 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-amber-100 focus:border-amber-500 transition-all text-sm font-bold" required>
                                                            </div>
                                                        </div>
                                                        <div class="flex gap-4 justify-center mt-8">
                                                            <button type="button" @click="showEditTugas = null" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                                                            <button type="submit" class="bg-amber-500 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-amber-100 hover:bg-amber-600 transition-all active:scale-95">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus Tugas -->
                                            <div x-show="showDeleteTugas === {{ $t->id }}" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
                                                <div class="fixed inset-0 bg-red-950/40 backdrop-blur-sm" @click="showDeleteTugas = null"></div>
                                                <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full relative z-[101] shadow-2xl border border-red-100 text-center">
                                                    <div class="w-20 h-20 bg-red-50 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                    </div>
                                                    <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase italic tracking-tighter">Hapus Tugas?</h3>
                                                    <p class="text-sm text-gray-400 font-medium mb-10 px-4">Tugas <span class="text-red-600 font-bold">"{{ $t->judul }}"</span> akan dihapus permanen beserta semua pengumpulan siswa.</p>
                                                    <form action="{{ route('guru.tugas.hapus', $t->id) }}" method="POST" class="flex gap-4 justify-center">
                                                        @csrf @method('DELETE')
                                                        <button type="button" @click="showDeleteTugas = null" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                                                        <button type="submit" class="bg-red-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-red-100 hover:bg-red-800 transition-all active:scale-95">Ya, Hapus!</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit Pertemuan -->
                        <div x-show="showEdit" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
                            <div class="fixed inset-0 bg-gray-950/40 backdrop-blur-sm" @click="showEdit = false"></div>
                            <div class="bg-white rounded-[2.5rem] p-10 max-w-lg w-full relative z-[101] shadow-2xl border border-amber-100">
                                <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-3xl flex items-center justify-center mx-auto mb-5 text-2xl shadow-inner">
                                    <i class="fas fa-pen"></i>
                                </div>
                                <h3 class="text-2xl font-black text-gray-900 mb-6 text-center uppercase italic tracking-tighter">Edit Pertemuan</h3>
                                <form action="{{ route('guru.pertemuan.update', $p->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="space-y-5">
                                        <div>
                                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Judul Pertemuan</label>
                                            <input type="text" name="judul" value="{{ $p->judul }}" class="w-full border-gray-100 bg-gray-50 rounded-2xl py-4 px-6 focus:ring-4 focus:ring-amber-100 focus:border-amber-500 transition-all text-sm font-bold" required>
                                        </div>
                                        <div>
                                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Deskripsi</label>
                                            <textarea name="deskripsi" rows="4" class="w-full border-gray-100 bg-gray-50 rounded-2xl p-6 focus:ring-4 focus:ring-amber-100 focus:border-amber-500 transition-all text-sm font-medium italic">{{ $p->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="flex gap-4 justify-center mt-8">
                                        <button type="button" @click="showEdit = false" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                                        <button type="submit" class="bg-amber-500 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-amber-100 hover:bg-amber-600 transition-all active:scale-95">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Konfirmasi Hapus Pertemuan -->
                        <div x-show="showDelete" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
                            <div class="fixed inset-0 bg-red-950/40 backdrop-blur-sm" @click="showDelete = false"></div>
                            <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full relative z-[101] shadow-2xl border border-red-100 text-center">
                                <div class="w-20 h-20 bg-red-50 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase italic tracking-tighter">Hapus Pertemuan?</h3>
                                <p class="text-sm text-gray-400 font-medium mb-10 px-4">Semua file materi dan data tugas di dalam pertemuan <span class="text-red-600 font-bold">"{{ $p->judul }}"</span> akan dihapus permanen.</p>
                                
                                <form action="{{ route('guru.pertemuan.hapus', $p->id) }}" method="POST" class="flex gap-4 justify-center">
                                    @csrf @method('DELETE')
                                    <button type="button" @click="showDelete = false" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                                    <button type="submit" class="bg-red-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-red-100 hover:bg-red-800 transition-all active:scale-95">Ya, Hapus!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        let tugasCount = 0;
        function addTugasRow() {
            const wrapper = document.getElementById('tugas-wrapper');
            const row = document.createElement('div');
            row.className = "p-7 border-2 border-red-50 rounded-[2.5rem] bg-red-50/20 relative animate-fade-in mb-6 group";
            row.innerHTML = `
                <button type="button" onclick="this.parentElement.remove()" class="absolute -top-3 -right-3 w-10 h-10 bg-white border-2 border-red-100 text-red-300 hover:text-red-600 rounded-full flex items-center justify-center transition-all shadow-sm">
                    <i class="fas fa-times"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-2 text-left">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-2">Judul Tugas</label>
                        <input type="text" name="tugas[${tugasCount}][judul]" placeholder="Masukkan nama tugas..." class="w-full text-sm font-bold border-gray-100 bg-white rounded-xl p-4 focus:ring-4 focus:ring-red-50 transition-all shadow-sm" required>
                    </div>
                    <div class="space-y-2 text-left">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-2">Deadline</label>
                        <input type="datetime-local" name="tugas[${tugasCount}][deadline]" class="w-full text-sm font-bold border-gray-100 bg-white rounded-xl p-4 focus:ring-4 focus:ring-red-50 transition-all shadow-sm" required>
                    </div>
                </div>
                <div class="text-left">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest ml-2">Instruksi Tugas</label>
                    <textarea name="tugas[${tugasCount}][deskripsi]" class="w-full text-sm font-medium border-gray-100 bg-white rounded-2xl p-5 focus:ring-4 focus:ring-red-50 transition-all shadow-sm" rows="3" placeholder="Jelaskan apa yang harus dikerjakan siswa..."></textarea>
                </div>
            `;
            wrapper.appendChild(row);
            tugasCount++;
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        @keyframes fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fade-in 0.4s ease-out; }
    </style>
</x-app-layout>