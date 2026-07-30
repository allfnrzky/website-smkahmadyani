<x-app-layout title="Detail Kelas">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}"
               class="flex items-center justify-center w-10 h-10 rounded-2xl bg-white text-purple-600 hover:bg-purple-600 hover:text-white transition-all duration-300 shadow-sm border border-purple-100 group">
                <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            </a>
            <div>
                <h2 class="font-black text-xl text-gray-800 leading-tight tracking-tighter uppercase">
                    {{ $kelas->nama }}
                </h2>
                <p class="text-[10px] font-bold text-purple-500 uppercase tracking-[0.2em]">Daftar Mata Pelajaran</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Judul Section -->
            <div class="flex items-center gap-3 mb-10 ml-2">
                <span class="w-8 h-1 bg-purple-600 rounded-full shadow-sm shadow-purple-200"></span>
                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">Daftar Mata Pelajaran</h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($mapel as $m)
                    <div class="group bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:border-purple-200 transition-all duration-500 relative overflow-hidden flex flex-col h-full">
                        
                        <!-- Dekorasi Background -->
                        <div class="absolute -right-6 -top-6 text-8xl text-gray-50 group-hover:text-purple-50 transition-colors duration-500 opacity-40">
                            <i class="fas fa-book-open"></i>
                        </div>

                        <div class="p-8 relative z-10 flex-grow">
                            <!-- Icon Label -->
                            <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-inner group-hover:bg-purple-600 group-hover:text-white transition-all duration-500">
                                <i class="fas fa-graduation-cap text-xl"></i>
                            </div>

                            <!-- Text Content -->
                            <div class="space-y-2">
                                <h3 class="font-black text-2xl text-gray-950 leading-tight uppercase tracking-tight group-hover:text-purple-600 transition-colors">
                                    {{ $m->nama }}
                                </h3>
                                <div class="flex items-start gap-2">
                                    <div class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse mt-1"></div>
                                    <div>
                                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none">
                                            Guru: {{ $m->guru->name }}
                                        </p>
                                        @if($m->guru->nip)
                                            <p class="text-[8px] font-bold text-gray-400 uppercase tracking-widest leading-none mt-0.5">
                                                NIP: {{ $m->guru->nip }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Card / Action -->
                        <div class="px-8 pb-8 relative z-10">
                            <!-- Tombol sekarang berwarna Ungu Cerah (#8B5CF6) -->
                            <a href="{{ route('siswa.mapel.buka', $m->id) }}" 
                               class="w-full bg-[#8B5CF6] text-white px-6 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] flex items-center justify-center gap-3 hover:bg-purple-700 shadow-lg shadow-purple-100 transition-all active:scale-[0.95]">
                                BUKA MATERI 
                                <i class="fas fa-chevron-right text-[8px] transition-transform group-hover:translate-x-1"></i>
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
    </div>
</x-app-layout>