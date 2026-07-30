<x-app-layout title="Kelola Kelas">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Kelola Kelas</h2>
    </x-slot>

    <div class="py-8 md:py-12 px-4" x-data="{ openDelete: null, deleteKelas: {}, openEdit: null, editKelas: {} }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Form Buat Kelas (Responsive) -->
            <div class="bg-white p-6 md:p-10 rounded-[2.5rem] shadow-sm mb-10 border-l-8 border-purple-600">
                <h3 class="font-black text-gray-800 mb-6 uppercase text-[10px] tracking-widest flex items-center gap-2">
                    <i class="fas fa-plus-circle text-purple-600"></i> Buat Kelas Baru
                </h3>
                <form action="{{ route('admin.kelas.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-stretch md:items-end">
                    @csrf
                    <div class="flex-1">
                        <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-widest ml-1">Nama Kelas</label>
                        <input type="text" name="nama" placeholder="Contoh: XII RPL 1" 
                            class="w-full border-gray-100 bg-gray-50 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-purple-100 focus:border-purple-600 transition-all" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-widest ml-1">Jurusan</label>
                        <select name="jurusan_id" class="w-full border-gray-100 bg-gray-50 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-purple-100 focus:border-purple-600 transition-all" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusans as $j)
                                <option value="{{ $j->id }}">{{ $j->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-purple-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-purple-800 shadow-xl shadow-purple-100 transition-all active:scale-95">
                        Buat Kelas
                    </button>
                </form>
            </div>

            <!-- Tabel / List Kelas (Responsive) -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                            <!-- Desktop Table -->
                            <div class="hidden md:block overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-100">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Nama Kelas</th>
                                            <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Jurusan</th>
                                            <th class="px-8 py-5 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Token Akses</th>
                                            <th class="px-8 py-5 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Status & Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-50">
                                        @foreach($kelas as $k)
                                        <tr class="hover:bg-purple-50/30 transition-colors">
                                            <td class="px-8 py-6 font-black text-gray-900 tracking-tight uppercase">{{ $k->nama }}</td>
                                            <td class="px-8 py-6 text-xs font-bold text-gray-500 uppercase tracking-widest">{{ $k->jurusan->nama }}</td>
                                            <td class="px-8 py-6 text-center">
                                                <span class="font-mono font-black text-purple-600 bg-purple-50 border border-purple-100 px-4 py-2 rounded-xl text-lg shadow-inner tracking-[0.2em]">
                                                    {{ $k->token }}
                                                </span>
                                            </td>
                                            <td class="px-8 py-6 text-center">
                                                <div class="flex flex-col items-center gap-2">
                                                    @if(now()->gt($k->token_expired_at))
                                                        <span class="bg-red-50 text-red-500 text-[9px] font-black uppercase px-3 py-1 rounded-full border border-red-100 tracking-widest">Expired</span>
                                                        <!-- Tombol Perbarui Token -->
                                                        <form action="{{ route('admin.kelas.update-token', $k->id) }}" method="POST">
                                                            @csrf @method('PATCH')
                                                            <button type="submit" class="text-[10px] font-bold text-purple-600 hover:text-purple-800 underline uppercase tracking-tighter">
                                                                <i class="fas fa-sync-alt mr-1"></i> Perbarui Token
                                                            </button>
                                                        </form>
                                                    @else
                                                        <span class="bg-green-50 text-green-600 text-[9px] font-black uppercase px-3 py-1 rounded-full border border-green-100 tracking-widest">
                                                            Aktif s/d {{ \Carbon\Carbon::parse($k->token_expired_at)->format('d M Y') }}
                                                        </span>
                                                    @endif
                                                    <!-- Tombol Edit -->
                                                    <button @click="openEdit = {{ $k->id }}; editKelas = {{ json_encode(['nama' => $k->nama, 'jurusan_id' => $k->jurusan_id]) }}" class="text-[10px] font-bold text-blue-500 hover:text-blue-700 underline uppercase tracking-tighter">
                                                        <i class="fas fa-pen mr-1"></i> Edit
                                                    </button>
                                                    <!-- Tombol Hapus -->
                                                    <button @click="openDelete = {{ $k->id }}; deleteKelas = {{ json_encode(['nama' => $k->nama]) }}" class="text-[10px] font-bold text-red-500 hover:text-red-700 underline uppercase tracking-tighter">
                                                        <i class="fas fa-trash-alt mr-1"></i> Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile Card List (Hidden on Desktop) -->
            <!-- Mobile Card List -->
                <div class="md:hidden divide-y divide-gray-100">
                    @foreach($kelas as $k)
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-black text-xl text-gray-900 uppercase leading-none">{{ $k->nama }}</h4>
                                <p class="text-[10px] font-bold text-gray-400 mt-2 uppercase tracking-widest">{{ $k->jurusan->nama }}</p>
                            </div>
                            @if(now()->gt($k->token_expired_at))
                                <span class="bg-red-50 text-red-500 text-[8px] font-black px-2 py-1 rounded-full border border-red-100 uppercase">Expired</span>
                            @else
                                <span class="bg-green-50 text-green-600 text-[8px] font-black px-2 py-1 rounded-full border border-green-100 uppercase">Aktif</span>
                            @endif
                        </div>
                        <div class="bg-purple-50 p-4 rounded-2xl border border-purple-100 text-center relative group">
                            <p class="text-[9px] font-black text-purple-400 uppercase tracking-widest mb-1">Token Akses Kelas</p>
                            <span class="font-mono font-black text-purple-600 text-2xl tracking-[0.3em]">{{ $k->token }}</span>
                            
                            <!-- Tombol Perbarui di Mobile -->
                            @if(now()->gt($k->token_expired_at))
                                <form action="{{ route('admin.kelas.update-token', $k->id) }}" method="POST" class="mt-2">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="bg-purple-600 text-white w-full py-2 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-md">
                                        Perbarui Token Sekarang
                                    </button>
                                </form>
                            @endif
                        </div>
                        @if(!now()->gt($k->token_expired_at))
                            <p class="text-[9px] text-center text-gray-400 font-bold">Berakhir pada {{ \Carbon\Carbon::parse($k->token_expired_at)->format('d M Y') }}</p>
                        @endif
                        <!-- Tombol Edit Mobile -->
                        <button @click="openEdit = {{ $k->id }}; editKelas = {{ json_encode(['nama' => $k->nama, 'jurusan_id' => $k->jurusan_id]) }}" class="w-full text-[10px] font-bold text-blue-500 hover:text-blue-700 bg-blue-50 border border-blue-100 py-3 rounded-xl uppercase tracking-wider transition-all active:scale-95">
                            <i class="fas fa-pen mr-2"></i> Edit Kelas
                        </button>
                        <!-- Tombol Hapus Mobile -->
                        <button @click="openDelete = {{ $k->id }}; deleteKelas = {{ json_encode(['nama' => $k->nama]) }}" class="w-full text-[10px] font-bold text-red-500 hover:text-red-700 bg-red-50 border border-red-100 py-3 rounded-xl uppercase tracking-wider transition-all active:scale-95">
                            <i class="fas fa-trash-alt mr-2"></i> Hapus Kelas
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
            
            <!-- Modal Hapus Kelas -->
            <div x-show="openDelete !== null" 
                 class="fixed inset-0 z-[999] flex items-center justify-center px-4" 
                 x-transition
                 x-cloak>
                
                <div class="fixed inset-0 bg-red-950/40 backdrop-blur-sm" @click="openDelete = null"></div>
                
                <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full relative z-[1000] shadow-2xl border border-red-100 text-center">
                    <div class="w-20 h-20 bg-red-50 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase italic tracking-tighter">Hapus Kelas?</h3>
                    <p class="text-sm text-gray-400 font-medium mb-10 px-4">
                        Kelas <span class="text-red-600 font-bold" x-text="deleteKelas.nama"></span> akan dihapus permanen.
                    </p>
                    
                    <form method="POST" x-bind:action="'{{ url('admin/kelas') }}/' + openDelete" class="flex gap-4 justify-center">
                        @csrf @method('DELETE')
                        <button type="button" @click="openDelete = null" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                        <button type="submit" class="bg-red-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-red-100 hover:bg-red-800 transition-all active:scale-95">Ya, Hapus!</button>
                    </form>
                </div>
            </div>
            
            <!-- Modal Edit Kelas -->
            <div x-show="openEdit !== null" 
                 class="fixed inset-0 z-[999] flex items-center justify-center px-4" 
                 x-transition
                 x-cloak>
                
                <div class="fixed inset-0 bg-blue-950/40 backdrop-blur-sm" @click="openEdit = null"></div>
                
                <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full relative z-[1000] shadow-2xl border border-blue-100">
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                        <i class="fas fa-pen"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase italic tracking-tighter text-center">Edit Kelas</h3>
                    <p class="text-sm text-gray-400 font-medium mb-10 px-4 text-center">
                        Kelas <span class="text-blue-600 font-bold" x-text="editKelas.nama"></span>
                    </p>
                    
                    <form method="POST" x-bind:action="'{{ url('admin/kelas') }}/' + openEdit" class="space-y-6">
                        @csrf @method('PATCH')
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-widest ml-1">Nama Kelas</label>
                            <input type="text" name="nama" x-model="editKelas.nama"
                                class="w-full border-gray-100 bg-gray-50 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 mb-2 uppercase tracking-widest ml-1">Jurusan</label>
                            <select name="jurusan_id" x-model.number="editKelas.jurusan_id"
                                class="w-full border-gray-100 bg-gray-50 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-blue-100 focus:border-blue-600 transition-all" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach($jurusans as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex gap-4 justify-center pt-4">
                            <button type="button" @click="openEdit = null" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                            <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-blue-100 hover:bg-blue-800 transition-all active:scale-95">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>