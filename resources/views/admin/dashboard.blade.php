<x-app-layout title="Dashboard Admin">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Dashboard Admin</h2>
    </x-slot>

    <div class="space-y-8">
        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Total Siswa</p>
                    <h3 class="text-2xl font-black text-gray-800 leading-none mt-1">{{ $stats['total_siswa'] ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Total Guru</p>
                    <h3 class="text-2xl font-black text-gray-800 leading-none mt-1">{{ $stats['total_guru'] ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-door-open"></i>
                </div>
                <div>
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Total Kelas</p>
                    <h3 class="text-2xl font-black text-gray-800 leading-none mt-1">{{ $stats['total_kelas'] ?? 0 }}</h3>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-all group">
                <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div>
                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Pendaftar PPDB</p>
                    <h3 class="text-2xl font-black text-gray-800 leading-none mt-1">{{ $stats['total'] ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <!-- PPDB Latest -->
        <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
            <h3 class="font-black text-sm text-gray-800 uppercase tracking-tighter mb-6 flex items-center gap-3">
                <span class="w-2 h-6 bg-purple-600 rounded-full"></span> Pendaftar Terbaru
            </h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead>
                        <tr class="text-[10px] font-black text-gray-400 uppercase tracking-widest">
                            <th class="px-4 py-3 text-left">No. Daftar</th>
                            <th class="px-4 py-3 text-left">Nama</th>
                            <th class="px-4 py-3 text-left">Jurusan</th>
                            <th class="px-4 py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm font-bold">
                        @forelse($latest_pendaftar ?? [] as $p)
                        <tr class="hover:bg-purple-50/30">
                            <td class="px-4 py-4 text-gray-500">{{ $p->no_pendaftaran }}</td>
                            <td class="px-4 py-4 text-gray-800">{{ $p->nama_lengkap }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $p->programKeahlian1->nama ?? '-' }}</td>
                            <td class="px-4 py-4 text-center">
                                @if($p->status == 'lulus')
                                    <span class="px-3 py-1 text-[10px] font-black rounded-full uppercase bg-green-100 text-green-700">
                                        Diterima
                                    </span>
                                @elseif($p->status == 'tidak_lulus')
                                    <span class="px-3 py-1 text-[10px] font-black rounded-full uppercase bg-red-100 text-red-700">
                                        Tidak Diterima
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-[10px] font-black rounded-full uppercase bg-yellow-100 text-yellow-700">
                                        Pending
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="px-4 py-8 text-center text-gray-400 text-xs">Belum ada pendaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pintasan Navigasi -->
        <div class="bg-white p-8 md:p-10 rounded-[2.5rem] shadow-sm border border-purple-50 relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 text-9xl text-purple-50/50 -rotate-12">
                <i class="fas fa-bolt"></i>
            </div>
            <div class="relative z-10">
                <h3 class="text-lg font-black text-gray-800 uppercase tracking-tighter mb-8 flex items-center gap-3">
                    <span class="w-2 h-6 bg-purple-600 rounded-full"></span> Pintasan Navigasi
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('admin.ppdb') }}" class="group bg-gray-50 hover:bg-purple-600 p-6 rounded-2xl border border-gray-100 hover:border-purple-600 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-purple-600 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="font-black text-sm text-gray-700 group-hover:text-white uppercase tracking-widest">Kelola Pendaftaran</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.user') }}" class="group bg-gray-50 hover:bg-purple-600 p-6 rounded-2xl border border-gray-100 hover:border-purple-600 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-purple-600 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <span class="font-black text-sm text-gray-700 group-hover:text-white uppercase tracking-widest">Kelola User LMS</span>
                        </div>
                    </a>
                    <a href="{{ route('admin.kelas.index') }}" class="group bg-gray-50 hover:bg-purple-600 p-6 rounded-2xl border border-gray-100 hover:border-purple-600 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-purple-600 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                                <i class="fas fa-school"></i>
                            </div>
                            <span class="font-black text-sm text-gray-700 group-hover:text-white uppercase tracking-widest">Kelola Kelas</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
