@extends('layouts.admin')
@section('title', 'Kelola Pendaftaran PPDB - Detail')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8" x-data="{ selectedStatus: '{{ $p->status }}', jurusanDiterima: '{{ $p->jurusan_diterima ?? $p->jurusan_1 }}', jurusanDiterimaAwal: '{{ $p->jurusan_diterima ?? $p->jurusan_1 }}' }">
    
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-3xl p-8 shadow-sm">
            <h3 class="text-lg font-black text-gray-800 mb-6 border-b pb-4">Identitas Siswa</h3>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div class="text-gray-400">Nama Lengkap</div><div class="font-bold text-gray-800">{{ $p->nama_lengkap }}</div>
                <div class="text-gray-400">NISN / NIK</div><div class="text-gray-800">{{ $p->nisn }} / {{ $p->nik }}</div>
                <div class="text-gray-400">Tempat, Tgl Lahir</div><div class="text-gray-800">{{ $p->tempat_lahir }}, {{ $p->tanggal_lahir }}</div>
                <div class="text-gray-400">Alamat</div><div class="text-gray-800">{{ $p->alamat }}, RT {{ $p->rtrw }}, {{ $p->desa }}, {{ $p->kecamatan }}, {{ $p->kabupaten }}</div>
                <div class="text-gray-400">Ukuran Seragam</div><div class="font-bold text-[#8B5CF6] uppercase">{{ $p->ukuran_seragam }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-3xl p-6 shadow-sm border-l-4 border-purple-400">
                <h4 class="font-black text-gray-800 mb-4">Ibu Kandung</h4>
                <div class="text-xs space-y-2">
                    <p><span class="text-gray-400">Nama:</span> {{ $p->nama_ibu }} ({{ $p->status_ibu }})</p>
                    <p><span class="text-gray-400">Pekerjaan/Gaji:</span> {{ $p->kerja_ibu }} / {{ $p->gaji_ibu }}</p>
                    <p><span class="text-gray-400">WA:</span> {{ $p->hp_ibu }}</p>
                </div>
            </div>
            <div class="bg-white rounded-3xl p-6 shadow-sm border-l-4 border-blue-400">
                <h4 class="font-black text-gray-800 mb-4">Ayah Kandung</h4>
                <div class="text-xs space-y-2">
                    <p><span class="text-gray-400">Nama:</span> {{ $p->nama_ayah }} ({{ $p->status_ayah }})</p>
                    <p><span class="text-gray-400">Pekerjaan/Gaji:</span> {{ $p->kerja_ayah }} / {{ $p->gaji_ayah }}</p>
                    <p><span class="text-gray-400">WA:</span> {{ $p->hp_ayah }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-sm" x-data="{ previewOpen: false, previewSrc: '', previewTitle: '' }">
            <h3 class="text-lg font-black text-gray-800 mb-6">Berkas Dokumen</h3>
            <div class="grid grid-cols-4 gap-4">
                <div @click="previewSrc = '{{ asset('storage/'.$p->file_kk) }}'; previewTitle = 'Kartu Keluarga'; previewOpen = true" class="block p-2 bg-gray-50 rounded-xl text-center hover:bg-purple-50 cursor-pointer transition">
                    <img src="{{ asset('storage/'.$p->file_kk) }}" alt="KK" class="w-full h-24 object-cover rounded-lg mb-2">
                    <p class="text-[10px] font-bold">Kartu Keluarga</p>
                </div>
                <div @click="previewSrc = '{{ asset('storage/'.$p->file_ijazah) }}'; previewTitle = 'Ijazah / SKL'; previewOpen = true" class="block p-2 bg-gray-50 rounded-xl text-center hover:bg-purple-50 cursor-pointer transition">
                    <img src="{{ asset('storage/'.$p->file_ijazah) }}" alt="Ijazah" class="w-full h-24 object-cover rounded-lg mb-2">
                    <p class="text-[10px] font-bold">Ijazah / SKL</p>
                </div>
                @if($p->ktp_ayah)
                <div @click="previewSrc = '{{ asset('storage/'.$p->ktp_ayah) }}'; previewTitle = 'KTP Ayah'; previewOpen = true" class="block p-2 bg-gray-50 rounded-xl text-center hover:bg-purple-50 cursor-pointer transition">
                    <img src="{{ asset('storage/'.$p->ktp_ayah) }}" alt="KTP Ayah" class="w-full h-24 object-cover rounded-lg mb-2">
                    <p class="text-[10px] font-bold">KTP Ayah</p>
                </div>
                @endif
                @if($p->ktp_ibu)
                <div @click="previewSrc = '{{ asset('storage/'.$p->ktp_ibu) }}'; previewTitle = 'KTP Ibu'; previewOpen = true" class="block p-2 bg-gray-50 rounded-xl text-center hover:bg-purple-50 cursor-pointer transition">
                    <img src="{{ asset('storage/'.$p->ktp_ibu) }}" alt="KTP Ibu" class="w-full h-24 object-cover rounded-lg mb-2">
                    <p class="text-[10px] font-bold">KTP Ibu</p>
                </div>
                @endif
            </div>

            <div x-show="previewOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-8" @click="previewOpen = false" style="display:none">
                <div class="relative max-w-3xl w-full bg-white rounded-2xl shadow-2xl overflow-hidden" @click.stop>
                    <div class="flex items-center justify-between px-6 py-4 border-b">
                        <h4 class="font-black text-gray-800" x-text="previewTitle"></h4>
                        <button @click="previewOpen = false" class="text-gray-400 hover:text-gray-800 text-xl"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="p-4">
                        <img :src="previewSrc" :alt="previewTitle" class="w-full max-h-[70vh] object-contain rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="bg-white rounded-3xl p-8 shadow-sm">
            <h3 class="text-lg font-black text-gray-800 mb-6">Verifikasi Kelulusan</h3>
            <form action="{{ route('admin.ppdb.status', $p->id) }}" method="POST" class="space-y-4">
                @csrf @method('PATCH')

                <input type="hidden" name="status" x-model="selectedStatus">
                <input type="hidden" name="jurusan_diterima" x-model="jurusanDiterima">

                <div class="space-y-4">
                    <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest block mb-1">Pilihan 1</label>
                        <p class="text-sm font-bold text-gray-800">{{ $p->programKeahlian1->nama }}</p>
                        @if($p->alasan_jurusan_1)
                            <p class="mt-2 text-xs text-gray-500 italic">"{{ $p->alasan_jurusan_1 }}"</p>
                        @endif
                    </div>
                    <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                        <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest block mb-1">Pilihan 2</label>
                        <p class="text-sm font-bold text-gray-800">{{ $p->programKeahlian2->nama }}</p>
                        @if($p->alasan_jurusan_2)
                            <p class="mt-2 text-xs text-gray-500 italic">"{{ $p->alasan_jurusan_2 }}"</p>
                        @endif
                    </div>
                </div>

                <div x-show="selectedStatus == 'lulus'" class="p-4 bg-green-50 rounded-2xl border border-green-200">
                    <label class="text-[9px] font-black text-green-700 uppercase tracking-widest block mb-2">Diterima di Jurusan</label>
                    <select x-model="jurusanDiterima" class="w-full rounded-xl border-green-300 bg-white p-3 text-sm font-bold focus:ring-4 focus:ring-green-100 focus:border-green-600">
                        <option value="{{ $p->jurusan_1 }}">{{ $p->programKeahlian1->nama }} (Pilihan 1)</option>
                        <option value="{{ $p->jurusan_2 }}">{{ $p->programKeahlian2->nama }} (Pilihan 2)</option>
                    </select>
                </div>

                <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                    <label class="text-[9px] font-black text-gray-400 uppercase tracking-widest block mb-2">
                        <i class="fa-regular fa-note-sticky mr-1"></i> Catatan Admin
                    </label>
                    <textarea name="catatan_admin" rows="3" class="w-full rounded-xl border-gray-200 bg-white p-3 text-sm focus:ring-[#8B5CF6] focus:border-[#8B5CF6]" placeholder="Opsional — isi alasan jika tidak diterima, atau catatan lainnya...">{{ old('catatan_admin', $p->catatan_admin) }}</textarea>
                </div>

                <div class="space-y-2 pt-2">
                    <button type="button" @click="selectedStatus = 'lulus'"
                        class="w-full py-3 rounded-xl font-black transition shadow-sm flex items-center justify-center gap-2"
                        :class="selectedStatus == 'lulus' ? 'bg-green-600 text-white ring-4 ring-green-100' : 'bg-green-100 text-green-600 hover:bg-green-200'">
                        <i class="fa-solid fa-check-circle"></i>
                        DITERIMA
                    </button>

                    <button type="button" @click="selectedStatus = 'tidak_lulus'"
                        class="w-full py-3 rounded-xl font-black transition shadow-sm flex items-center justify-center gap-2"
                        :class="selectedStatus == 'tidak_lulus' ? 'bg-red-600 text-white ring-4 ring-red-100' : 'bg-red-100 text-red-600 hover:bg-red-200'">
                        <i class="fa-solid fa-times-circle"></i>
                        TIDAK DITERIMA
                    </button>
                </div>

                <button type="submit" 
                    class="w-full py-3 rounded-xl font-black uppercase tracking-wider transition shadow-lg flex items-center justify-center gap-2"
                    :class="selectedStatus != '{{ $p->status }}' || jurusanDiterima != jurusanDiterimaAwal ? 'bg-[#8B5CF6] text-white hover:bg-[#7C3AED]' : 'bg-gray-200 text-gray-400 cursor-not-allowed'"
                    :disabled="!selectedStatus || (selectedStatus == '{{ $p->status }}' && jurusanDiterima == jurusanDiterimaAwal)">
                    <i class="fa-solid fa-save"></i>
                    Simpan
                </button>
            </form>
            
            <div class="mt-6 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.ppdb') }}" class="block w-full py-3 bg-gray-100 text-gray-500 text-center rounded-xl font-bold hover:bg-gray-200 transition">
                    TUTUP DETAIL
                </a>
            </div>
    </div>
    </div>
</div>
@endsection