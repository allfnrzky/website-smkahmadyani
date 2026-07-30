<x-app-layout title="Daftar Tugas">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Daftar Tugas</h2>
    </x-slot>

    <div class="py-10 md:py-16 bg-gray-50/30">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="mb-12">
                <h1 class="text-4xl font-black text-gray-900 tracking-tighter uppercase">Tugas <span class="text-purple-600">Pending</span></h1>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-[0.4em] mt-2">Daftar tugas yang belum kamu kerjakan</p>
            </div>

            <div class="grid grid-cols-1 gap-6">
                @forelse($tugasBelumSelesai as $t)
                    <div class="group bg-white rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden flex flex-col md:flex-row items-stretch">
                        <!-- Sisi Kiri: Info Mapel & Deadline -->
                        <div class="p-8 md:w-1/3 bg-gray-50 border-r border-gray-100 flex flex-col justify-center">
                            <span class="text-[9px] font-black text-purple-600 uppercase tracking-widest mb-2">{{ $t->pertemuan->mapel->nama }}</span>
                            <h4 class="text-xl font-black text-gray-900 leading-tight uppercase mb-4">{{ $t->judul }}</h4>
                            
                            <div class="space-y-2">
                                <div class="flex items-center gap-2 text-red-500">
                                    <i class="fas fa-clock text-[10px] animate-pulse"></i>
                                    <span class="text-[10px] font-black uppercase tracking-widest">Deadline:</span>
                                </div>
                                <p class="text-sm font-bold text-gray-700 ml-5">{{ \Carbon\Carbon::parse($t->deadline)->format('d M Y, H:i') }} WIB</p>
                            </div>
                        </div>

                        <!-- Sisi Kanan: Deskripsi & Tombol Cepat -->
                        <div class="p-8 md:w-2/3 flex flex-col justify-between gap-6 bg-white">
                            <div>
                                <h5 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3">Instruksi Tugas:</h5>
                                <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 italic">{{ $t->deskripsi }}</p>
                            </div>

                            <div class="flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 text-[10px]">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold text-gray-400 uppercase">{{ $t->pertemuan->mapel->guru->name }}</span>
                                        @if($t->pertemuan->mapel->guru->nip)
                                            <br>
                                            <span class="text-[8px] font-bold text-gray-400 uppercase">NIP: {{ $t->pertemuan->mapel->guru->nip }}</span>
                                        @endif
                                    </div>
                                </div>                    
                                <a href="{{ route('siswa.mapel.buka', $t->pertemuan->mata_pelajaran_id) }}" 
                                class="bg-purple-600 text-white px-8 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-purple-800 shadow-lg shadow-purple-100 transition-all active:scale-95">
                                    KERJAKAN TUGAS <i class="fas fa-arrow-right ml-2 text-[8px]"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 bg-white rounded-[3rem] border-2 border-dashed border-gray-100">
                        <div class="w-20 h-20 bg-green-50 text-green-400 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl shadow-inner shadow-green-100">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <h3 class="text-xl font-black text-gray-900 uppercase tracking-tighter">Luar Biasa!</h3>
                        <p class="text-gray-400 font-bold uppercase text-[10px] tracking-widest mt-2">Semua tugasmu sudah dikerjakan dengan baik.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>