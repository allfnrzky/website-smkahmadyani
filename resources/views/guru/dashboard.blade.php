<x-app-layout title="Dashboard Mengajar">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Dashboard Mengajar</h2>
    </x-slot>

    <div class="py-6 md:py-10" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Welcome Section & Action Button (Diletakkan di sini agar PASTI MUNCUL) -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div>
                    <h3 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tighter uppercase">
                        Dashboard <span class="text-purple-600">Mengajar</span>
                    </h3>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-[0.3em] mt-2">
                        Selamat datang kembali di Panel Guru SMK Ahmad Yani
                    </p>
                </div>
                
                <button @click="open = true" class="group bg-purple-600 hover:bg-purple-800 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-purple-100 transition-all flex items-center gap-3">
                    <i class="fas fa-plus-circle transition-transform group-hover:rotate-90"></i> Masuk ke Kelas
                </button>
            </div>

            <!-- Modal Join Kelas -->
            <div x-show="open" class="fixed inset-0 z-[999] overflow-y-auto flex items-center justify-center px-4" x-cloak>
                <div class="fixed inset-0 bg-purple-950/60 backdrop-blur-sm transition-opacity" @click="open = false"></div>
                <div class="bg-white rounded-[3rem] overflow-hidden shadow-2xl transform transition-all sm:max-w-lg sm:w-full z-[1000] border border-purple-100 relative">
                    <form action="{{ route('kelas.join.proses') }}" method="POST">
                        @csrf
                        <div class="p-10 text-center">
                            <div class="w-20 h-20 bg-purple-50 text-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-8 text-3xl shadow-inner">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase tracking-tighter">Akses Ruang Kelas</h3>
                            <p class="text-xs text-gray-400 mb-8 font-bold uppercase tracking-widest">Masukkan token kelas untuk mulai mengelola</p>
                            
                            <input type="text" name="token" required 
                                class="w-full border-gray-100 bg-gray-50 rounded-2xl text-center text-3xl font-black uppercase tracking-[0.4em] focus:ring-8 focus:ring-purple-50 focus:border-purple-600 transition-all py-5 shadow-inner" 
                                placeholder="KODE6">
                        </div>
                        <div class="bg-gray-50 px-10 py-8 flex justify-center gap-4">
                            <button type="button" @click="open = false" class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-gray-600 transition">Batal</button>
                            <button type="submit" class="bg-purple-600 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-purple-100 hover:bg-purple-800 transition-all">GABUNG SEKARANG</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- List Kelas Mengajar -->
            <div class="space-y-6">
                <div class="flex items-center gap-3 ml-2">
                    <span class="w-2 h-2 bg-purple-600 rounded-full"></span>
                    <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">Kelas Yang Anda Kelola:</h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($kelasSaya as $k)
                    <a href="{{ route('guru.kelas.detail', $k->id) }}" class="group block">
                        <div class="bg-white p-8 shadow-sm rounded-[2.5rem] border border-gray-100 hover:shadow-2xl hover:border-purple-200 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden h-full flex flex-col">
                            
                            <div class="relative z-10 flex-grow">
                                <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-inner group-hover:bg-purple-600 group-hover:text-white transition-all duration-500">
                                    <i class="fas fa-users-rectangle text-xl"></i>
                                </div>
                                <h4 class="font-black text-2xl text-gray-900 mb-2 leading-tight uppercase tracking-tight group-hover:text-purple-600 transition-colors">{{ $k->nama }}</h4>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $k->jurusan->nama ?? 'Umum' }}</p>
                            </div>

                            <div class="flex items-center justify-between pt-8 border-t border-gray-50 relative z-10 mt-8">
                                <span class="text-[10px] font-black text-purple-600 uppercase tracking-widest flex items-center gap-2">
                                    Kelola Mapel <i class="fas fa-arrow-right text-[8px] group-hover:translate-x-2 transition-transform"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    @empty
                        <div class="col-span-full bg-white p-20 text-center rounded-[3rem] border-2 border-dashed border-gray-100 flex flex-col items-center justify-center">
                            <div class="w-20 h-20 bg-gray-50 text-gray-200 rounded-full flex items-center justify-center mb-6 text-3xl">
                                <i class="fas fa-chalkboard"></i>
                            </div>
                            <p class="text-gray-400 font-bold uppercase text-xs tracking-widest mb-2">Anda belum mengajar di kelas manapun</p>
                            <p class="text-[10px] text-gray-300 italic uppercase">Gunakan tombol di atas untuk bergabung ke kelas</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    [x-cloak] { display: none !important; }
</style>