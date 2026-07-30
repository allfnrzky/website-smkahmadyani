<x-app-layout title="Kelola Mata Pelajaran">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-9 h-9 rounded-xl bg-white text-purple-600 hover:bg-purple-600 hover:text-white transition-all shadow-sm border border-purple-100">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2 class="font-black text-xl text-gray-800 leading-tight">Kelola Mata Pelajaran</h2>
        </div>
    </x-slot>

    <div class="py-8 md:py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Form Tambah Mapel (Responsive) -->
            <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm mb-10 border-l-8 border-purple-600">
                <h3 class="font-black text-gray-800 mb-6 uppercase text-xs tracking-widest flex items-center gap-2">
                    <i class="fas fa-plus-circle text-purple-600"></i> Tambah Mata Pelajaran Baru
                </h3>
                <form action="{{ route('guru.mapel.store') }}" method="POST" class="flex flex-col md:flex-row gap-4">
                    @csrf
                    <input type="text" name="nama" placeholder="Nama Mapel (ex: Pemrograman Web)" 
                        class="border-gray-100 bg-gray-50 rounded-xl p-3 flex-1 focus:ring-4 focus:ring-purple-100 focus:border-purple-600 transition-all" required>
                    
                    <select name="kelas_id" class="border-gray-100 bg-gray-50 rounded-xl p-3 md:w-64 focus:ring-4 focus:ring-purple-100 focus:border-purple-600 transition-all" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    
                    <button type="submit" class="bg-purple-600 text-white px-8 py-3 rounded-xl hover:bg-purple-800 font-black text-xs uppercase tracking-widest shadow-lg shadow-purple-100 transition-all">
                        Simpan Mapel
                    </button>
                </form>
            </div>

            <!-- Grid Daftar Mapel -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($mapels as $m)
                    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm border border-gray-100 group hover:shadow-md transition-all">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 text-xl shadow-inner">
                                    📚
                                </div>
                                <div>
                                    <h4 class="text-xl font-black text-gray-900 tracking-tight leading-tight uppercase">{{ $m->nama }}</h4>
                                    <p class="text-[10px] font-bold text-purple-500 uppercase tracking-[0.2em] mt-1">{{ $m->kelas->nama }}</p>
                                </div>
                            </div>
                            <span class="bg-gray-50 text-gray-400 text-[10px] font-bold px-3 py-1 rounded-full border border-gray-100">#{{ $m->id }}</span>
                        </div>
                        
                        <a href="{{ route('guru.mapel.show', $m->id) }}" 
                           class="flex items-center justify-center w-full gap-2 text-xs font-black bg-gray-900 text-white px-6 py-3.5 rounded-2xl hover:bg-purple-600 shadow-lg shadow-gray-100 transition-all uppercase tracking-widest">
                            <i class="fas fa-calendar-alt text-[10px]"></i> Kelola Pertemuan
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>