@extends('layouts.admin')

@section('title', 'Kelola Pendaftaran PPDB')

@section('content')
<div x-data="{ kuotaOpen: false }">
<div class="bg-white p-4 rounded-2xl shadow-sm mb-6 border border-gray-100">
    <form action="{{ route('admin.ppdb') }}" method="GET" class="grid grid-cols-1 md:grid-cols-6 gap-4">
        <div class="relative">
            <input type="text" name="search" value="{{ request('search') }}" 
                placeholder="Cari Nama / NISN..." 
                class="w-full pl-10 pr-4 py-2 rounded-xl border-gray-200 text-sm focus:ring-[#8B5CF6] focus:border-[#8B5CF6]">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-3 text-gray-400"></i>
        </div>

        <select name="status" class="rounded-xl border-gray-200 text-sm focus:ring-[#8B5CF6]">
            <option value="">Semua Status</option>
            <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Pending</option>
            <option value="lulus" {{ request('status') == 'lulus' ? 'selected' : '' }}>Diterima</option>
            <option value="tidak_lulus" {{ request('status') == 'tidak_lulus' ? 'selected' : '' }}>Tidak Diterima</option>
        </select>

        <select name="jurusan" class="rounded-xl border-gray-200 text-sm focus:ring-[#8B5CF6]">
            <option value="">Semua Jurusan</option>
            @foreach($jurusan as $j)
                <option value="{{ $j->id }}" {{ request('jurusan') == $j->id ? 'selected' : '' }}>{{ $j->nama }}</option>
            @endforeach
        </select>

        <input type="date" name="tgl_awal" value="{{ request('tgl_awal') }}" 
            class="rounded-xl border-gray-200 text-sm focus:ring-[#8B5CF6] focus:border-[#8B5CF6]">

        <input type="date" name="tgl_akhir" value="{{ request('tgl_akhir') }}" 
            class="rounded-xl border-gray-200 text-sm focus:ring-[#8B5CF6] focus:border-[#8B5CF6]">

        <div class="flex gap-2">
            <button type="submit" class="flex-1 bg-[#8B5CF6] text-white rounded-xl font-bold text-sm hover:bg-[#7C3AED] transition">
                Filter
            </button>
            <a href="{{ route('admin.ppdb') }}" class="px-4 py-2 bg-gray-100 text-gray-500 rounded-xl hover:bg-gray-200 transition flex items-center">
                <i class="fa-solid fa-rotate-right"></i>
            </a>
        </div>
    </form>

    {{-- Modal Kuota Jurusan --}}
    <div x-show="kuotaOpen" class="fixed inset-0 z-[999] flex items-center justify-center px-4" x-cloak>
        <div class="fixed inset-0 bg-purple-950/60 backdrop-blur-sm" @click="kuotaOpen = false"></div>
        <div class="bg-white rounded-[3rem] p-8 w-full max-w-2xl z-[1000] max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-black text-gray-900">Atur Kuota Jurusan</h3>
                <button @click="kuotaOpen = false" class="w-10 h-10 rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 transition flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form action="{{ route('admin.ppdb.kuota') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    @foreach($jurusan as $j)
                        @php
                            $terdaftar = \App\Models\Pendaftaran::where('jurusan_diterima', $j->id)
                                ->where('status', 'lulus')
                                ->count();
                        @endphp
                        <div class="flex items-center justify-between p-5 bg-gray-50 rounded-2xl border border-gray-100">
                            <div>
                                <p class="font-bold text-gray-800">{{ $j->nama }}</p>
                                <p class="text-xs text-gray-400 mt-1">Sudah diterima: <span class="font-bold {{ $j->kuota && $terdaftar >= $j->kuota ? 'text-red-500' : 'text-green-600' }}">{{ $terdaftar }}</span>@if($j->kuota) / {{ $j->kuota }} @endif</p>
                            </div>
                            <div class="w-28">
                                <input type="number" name="kuota[{{ $j->id }}]" value="{{ $j->kuota }}" min="0" placeholder="Maksimal" class="w-full border-gray-200 rounded-xl text-sm py-2.5 text-center font-bold focus:ring-[#8B5CF6] focus:border-[#8B5CF6]">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" @click="kuotaOpen = false" class="px-6 py-3 rounded-2xl border border-gray-200 text-sm font-bold text-gray-500 hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" class="px-8 py-3 rounded-2xl bg-[#8B5CF6] text-white text-sm font-bold hover:bg-[#7C3AED] transition">Simpan Kuota</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
    <div class="p-6 border-b flex justify-between items-center">
        <h3 class="font-bold text-gray-800">Daftar Calon Siswa</h3>
        <div class="flex items-center gap-3">
            <button @click="kuotaOpen = true" class="bg-[#8B5CF6] text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-[#7C3AED] transition flex items-center gap-2">
                <i class="fa-solid fa-layer-group"></i> Jurusan
            </button>
            <a href="{{ route('admin.ppdb.export') }}" class="bg-green-600 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-green-700 transition">
                <i class="fa-solid fa-file-excel mr-2"></i> Rekap Excel
            </a>
            <span class="bg-purple-100 text-[#8B5CF6] px-4 py-1 rounded-full text-xs font-bold">
                Total: {{ $pendaftar->count() }} Pendaftar
            </span>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-400 text-xs uppercase font-medium">
                <tr>
                    <th class="px-6 py-4 text-center">No. Daftar</th>
                    <th class="px-6 py-4">Nama Lengkap</th>
                    <th class="px-6 py-4">NISN / Asal Sekolah</th>
                    <th class="px-6 py-4">Jurusan Diterima</th> <th class="px-6 py-4 text-center">Status Siswa</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($pendaftar as $p)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-bold text-[#8B5CF6] text-center">{{ $p->no_pendaftaran }}</td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-800">{{ $p->nama_lengkap }}</div>
                        <div class="text-xs text-gray-400">{{ $p->user->email ?? '-' }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-600">{{ $p->nisn }}</div>
                        <div class="text-xs text-gray-400">{{ $p->asal_sekolah }}</div>
                    </td>
                    <td class="px-6 py-4">
                        @if($p->status == 'lulus' && $p->jurusan_diterima)
                            <span class="text-xs font-bold text-green-700 bg-green-50 px-2 py-1 rounded border border-green-100">
                                {{ $p->jurusanDiterima->nama }}
                            </span>
                        @elseif($p->status == 'tidak_lulus')
                            <span class="text-[10px] font-medium text-red-400 italic">Tidak Diterima</span>
                        @else
                            <span class="text-[10px] font-medium text-gray-400 italic">Menunggu Keputusan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($p->status == 'lulus')
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider">
                                <i class="fa-solid fa-circle-check mr-1"></i> Diterima
                            </span>
                        @elseif($p->status == 'tidak_lulus')
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider">
                                <i class="fa-solid fa-circle-xmark mr-1"></i> Tidak Diterima
                            </span>
                        @else
                            <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider">
                                <i class="fa-solid fa-clock mr-1"></i> Pending
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.ppdb.show', $p->id) }}" class="inline-flex items-center justify-center bg-[#8B5CF6] text-white w-10 h-10 rounded-xl hover:bg-[#7C3AED] transition shadow-sm shadow-purple-200" title="Periksa Data">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-400 italic">Data tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection