<x-app-layout title="Monitoring Tugas">
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="javascript:history.back()" class="flex items-center justify-center w-9 h-9 rounded-xl bg-white text-purple-600 hover:bg-purple-600 hover:text-white transition-all shadow-sm border border-purple-100">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2 class="font-black text-xl text-gray-800">Monitoring: <span class="text-purple-600">{{ $tugas->judul }}</span></h2>
        </div>
    </x-slot>

    <div class="py-8 md:py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 md:p-10 rounded-[2.5rem] shadow-sm border border-gray-100">
                <h3 class="font-black text-gray-900 mb-8 uppercase text-xs tracking-widest flex items-center gap-2">
                    <i class="fas fa-clipboard-list text-purple-600"></i> Daftar Pengumpulan Tugas
                </h3>

                <!-- Versi Mobile: List Card (Hidden on Desktop) -->
                <div class="block lg:hidden space-y-4">
                    @forelse($pengumpulans as $p)
                        <div class="p-6 border border-gray-100 rounded-3xl bg-gray-50/50 space-y-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Nama Siswa</p>
                                    <p class="text-lg font-black text-gray-900 tracking-tight leading-tight">{{ $p->siswa->name }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-black text-gray-400 uppercase">Nilai</p>
                                    <p class="text-xl font-black text-green-600">{{ $p->nilai ?? '-' }}</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-2 text-[10px] font-bold">
                                <div class="bg-white p-3 rounded-xl border border-gray-100">
                                    <p class="text-gray-400 uppercase mb-1">Waktu</p>
                                    <p class="text-gray-700">{{ $p->created_at->format('d M, H:i') }}</p>
                                </div>
                                <a href="{{ asset('storage/' . $p->file_path) }}" target="_blank" class="bg-blue-50 text-blue-600 p-3 rounded-xl border border-blue-100 flex items-center justify-center gap-2">
                                    <i class="fas fa-eye"></i> LIHAT
                                </a>
                            </div>

                            <form action="{{ route('guru.nilai.simpan', $p->id) }}" method="POST" class="flex gap-2">
                                @csrf
                                <input type="number" name="nilai" class="flex-1 border-gray-100 rounded-xl p-3 text-sm focus:ring-purple-500" placeholder="Input 0-100">
                                <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-xl font-black text-[10px] uppercase transition shadow-lg shadow-purple-100">SIMPAN</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-center py-10 italic text-gray-400">Belum ada pengumpulan.</p>
                    @endforelse
                </div>

                <!-- Versi Desktop: Table (Hidden on Mobile) -->
                <div class="hidden lg:block overflow-hidden border border-gray-100 rounded-3xl">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-[10px] font-black text-gray-400 uppercase tracking-widest">Siswa</th>
                                <th class="px-6 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">File</th>
                                <th class="px-6 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Waktu</th>
                                <th class="px-6 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Nilai</th>
                                <th class="px-6 py-4 text-center text-[10px] font-black text-gray-400 uppercase tracking-widest">Input Skor</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($pengumpulans as $p)
                                <tr class="hover:bg-purple-50/30 transition-colors">
                                    <td class="px-6 py-4 text-sm font-bold text-gray-900 tracking-tight">{{ $p->siswa->name }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ asset('storage/' . $p->file_path) }}" class="inline-flex items-center gap-2 bg-purple-50 text-purple-600 px-4 py-2 rounded-full text-[10px] font-black hover:bg-purple-600 hover:text-white transition uppercase tracking-widest" target="_blank">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-center text-[10px] font-bold text-gray-400 italic">{{ $p->created_at->format('d M, H:i') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-lg font-black {{ $p->nilai ? 'text-green-600' : 'text-gray-300' }}">{{ $p->nilai ?? '-' }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('guru.nilai.simpan', $p->id) }}" method="POST" class="flex justify-center gap-2">
                                            @csrf
                                            <input type="number" name="nilai" class="w-20 border-gray-100 rounded-xl p-2 text-xs text-center focus:ring-purple-600" placeholder="0-100">
                                            <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded-xl text-[9px] font-black uppercase hover:bg-purple-600 transition tracking-widest">Kirim</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center py-12 italic text-gray-400">Belum ada siswa yang mengumpulkan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>