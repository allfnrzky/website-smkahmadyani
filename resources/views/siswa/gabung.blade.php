<x-app-layout title="Gabung Kelas Baru">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-10 h-10 rounded-xl bg-white text-purple-600 border border-purple-100 shadow-sm"><i class="fas fa-arrow-left"></i></a>
            <h2 class="font-black text-xl text-gray-800 tracking-tight">Gabung Kelas Baru</h2>
        </div>
    </x-slot>

    <div class="py-8 md:py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Gabung (Responsive) -->
            @if($kelasSaya->isEmpty())
            <div class="bg-white p-6 md:p-10 shadow-sm rounded-[2.5rem] mb-12 border border-purple-100">
                <h3 class="font-black text-gray-900 mb-6 uppercase text-[10px] tracking-widest text-center">Gunakan Token Kelas</h3>
                <form action="{{ route('kelas.join.proses') }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                    @csrf
                    <input type="text" name="token" placeholder="CONTOH: KODE6X" 
                        class="border-gray-100 bg-gray-50 rounded-2xl p-4 flex-1 text-center text-xl font-black uppercase tracking-[0.2em] focus:ring-4 focus:ring-purple-100 focus:border-[#8B5CF6] transition-all" required>
                    <button type="submit" class="bg-[#8B5CF6] text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-purple-800 transition-all shadow-xl shadow-purple-100">
                        Masuk Sekarang
                    </button>
                </form>
            </div>
            @else
            <div class="bg-white p-6 md:p-10 shadow-sm rounded-[2.5rem] mb-12 border border-purple-100 text-center">
                <p class="text-sm font-bold text-gray-500 uppercase tracking-widest">Anda sudah tergabung di kelas: <span class="text-purple-600">{{ $kelasSaya->first()->nama }}</span></p>
                <p class="text-xs text-gray-400 mt-2 uppercase tracking-wider">Anda hanya bisa mengikuti satu kelas saja.</p>
            </div>
            @endif

            <!-- List Kelas Saya -->
            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6 ml-2">Daftar Kelas Saya:</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($kelasSaya as $k)
                <a href="{{ route('kelas.detail', $k->id) }}" class="block group">
                    <div class="bg-white p-6 md:p-8 shadow-sm rounded-[2rem] border-t-8 border-purple-600 h-full flex flex-col justify-between hover:-translate-y-1 transition-all">
                        <div>
                            <h4 class="font-extrabold text-lg text-gray-900 mb-1 group-hover:text-purple-600 transition-colors">{{ $k->nama }}</h4>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $k->jurusan->nama ?? 'Umum' }}</p>
                        </div>
                        <span class="text-[9px] font-black text-purple-400 mt-6 block uppercase tracking-widest group-hover:text-purple-600">Klik untuk Mapel <i class="fas fa-chevron-right text-[7px] ml-1"></i></span>
                    </div>
                </a>
                @empty
                    <div class="col-span-full bg-white p-12 text-center rounded-[2rem] border-2 border-dashed border-gray-100">
                        <p class="text-gray-400 italic">Belum ada kelas yang diikuti.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>