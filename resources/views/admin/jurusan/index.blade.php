<x-app-layout title="Kelola Jurusan">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Kelola Jurusan</h2>
    </x-slot>

    <div class="py-8 px-4" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button @click="open = true" class="bg-purple-600 hover:bg-purple-800 text-white px-6 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg mb-8 transition-all">
                <i class="fas fa-plus mr-2"></i> Tambah Jurusan
            </button>

            <div x-show="open" class="fixed inset-0 z-[999] flex items-center justify-center px-4" x-cloak>
                <div class="fixed inset-0 bg-purple-950/60 backdrop-blur-sm" @click="open = false"></div>
                <div class="bg-white rounded-[3rem] p-10 w-full max-w-lg z-[1000]">
                    <h3 class="text-2xl font-black mb-6">Tambah Jurusan Baru</h3>
                    <form action="{{ route('admin.jurusan.store') }}" method="POST">
                        @csrf
                        <input type="text" name="nama" required placeholder="Nama Jurusan" class="w-full border-gray-100 bg-gray-50 rounded-2xl p-4 text-sm font-bold mb-6">
                        <button type="submit" class="bg-purple-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase">Simpan</button>
                    </form>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Nama Jurusan</th>
                            <th class="px-8 py-5 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($jurusans as $j)
                        <tr class="hover:bg-purple-50/30">
                            <td class="px-8 py-6 text-sm font-bold text-gray-800">{{ $j->nama }}</td>
                            <td class="px-8 py-6 text-center">
                                <form action="{{ route('admin.jurusan.destroy', $j) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 text-xs font-black uppercase tracking-widest" onclick="return confirm('Hapus jurusan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
