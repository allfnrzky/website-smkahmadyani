<x-app-layout title="Detail Kelas">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <!-- Tombol Back Modern -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center justify-center w-10 h-10 rounded-2xl bg-white text-purple-600 hover:bg-purple-600 hover:text-white transition-all duration-300 shadow-sm border border-purple-100 group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            </a>
            <div>
                <h2 class="font-black text-xl text-gray-800 leading-tight tracking-tighter uppercase">
                    {{ $kelas->nama }}
                </h2>
                <p class="text-[10px] font-bold text-purple-500 uppercase tracking-[0.2em]">Kelola Mata Pelajaran</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 md:py-16" x-data="{ openAdd: false }">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section: Judul Halaman & Tombol Tambah -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h3 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tighter uppercase">
                        Daftar <span class="text-purple-600">Mapel</span>
                    </h3>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-[0.3em] mt-2">
                        Kelola kurikulum dan materi belajar di kelas ini
                    </p>
                </div>
                
                <button @click="openAdd = true" 
                        class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-green-100 transition-all flex items-center gap-3">
                    <i class="fas fa-plus-circle text-sm"></i> Tambah Mapel Baru
                </button>
            </div>

            <!-- Grid Mapel: Menggunakan 3 Kolom agar lebih compact dan rapi -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($mapels as $m)
                    <div class="group bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:border-purple-200 transition-all duration-500 relative overflow-hidden flex flex-col h-full">
                        
                        <!-- Dekorasi Background -->
                        <div class="absolute -right-6 -top-6 text-8xl text-gray-50 group-hover:text-purple-50 transition-colors duration-500 opacity-50">
                            <i class="fas fa-book"></i>
                        </div>

                        <div class="p-8 relative z-10 flex-grow">
                            <!-- Icon Label -->
                            <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-inner group-hover:bg-purple-600 group-hover:text-white transition-all duration-500">
                                <i class="fas fa-layer-group text-xl"></i>
                            </div>

                            <!-- Text Content -->
                            <div class="space-y-2">
                                <h4 class="font-black text-xl text-gray-900 leading-tight uppercase tracking-tight group-hover:text-purple-600 transition-colors">
                                    {{ $m->nama }}
                                </h4>
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Status: Aktif Mengajar</p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Action -->
                        <div class="px-8 pb-8 relative z-10">
                            <a href="{{ route('guru.mapel.show', $m->id) }}" 
                               class="w-full bg-[#8B5CF6] text-white px-6 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] flex items-center justify-center gap-3 hover:bg-purple-700 shadow-lg shadow-purple-100 transition-all active:scale-[0.95]">
                                KELOLA PERTEMUAN <i class="fas fa-chevron-right text-[8px]"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 bg-white rounded-[3rem] border-2 border-dashed border-gray-100 text-center">
                        <div class="w-20 h-20 bg-gray-50 text-gray-200 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <p class="text-gray-400 font-bold uppercase text-xs tracking-widest">Belum ada mata pelajaran.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal Tambah Mapel (Dibuat lebih modern) -->
        <div x-show="openAdd" class="fixed inset-0 z-[999] overflow-y-auto flex items-center justify-center px-4" x-cloak>
            <div class="fixed inset-0 bg-purple-950/60 backdrop-blur-sm transition-opacity" @click="openAdd = false"></div>
            <div class="bg-white rounded-[3rem] overflow-hidden shadow-2xl transform transition-all sm:max-w-lg sm:w-full z-[1000] border border-purple-100 relative">
                <form action="{{ route('guru.mapel.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                    <div class="p-10 text-center">
                        <div class="w-20 h-20 bg-purple-50 text-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-8 text-3xl shadow-inner">
                            <i class="fas fa-plus"></i>
                        </div>
                        <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase tracking-tighter">Mata Pelajaran Baru</h3>
                        <p class="text-xs text-gray-400 mb-8 font-bold uppercase tracking-widest">Tambahkan subjek pengajaran baru di kelas ini</p>
                        
                        <div class="text-left">
                            <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-[0.2em] ml-2">Nama Mata Pelajaran</label>
                            <input type="text" name="nama" required placeholder="Contoh: Matematika Diskrit"
                                class="w-full border-gray-100 bg-gray-50 rounded-2xl py-5 px-6 text-sm font-bold focus:ring-8 focus:ring-purple-50 focus:border-purple-600 transition-all shadow-inner">
                        </div>
                    </div>
                    <div class="bg-gray-50 px-10 py-8 flex justify-center gap-4">
                        <button type="button" @click="openAdd = false" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-gray-600 transition">Batal</button>
                        <button type="submit" class="bg-purple-600 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-purple-100 hover:bg-purple-800 transition-all">SIMPAN DATA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    [x-cloak] { display: none !important; }
</style>