@extends('layouts.admin')
@section('title', 'Kelola Pengumuman - Tambah Baru')

@section('content')
<div class="max-w-4xl bg-white rounded-3xl shadow-sm p-8">
    <form action="{{ route('admin.pengumuman.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Pengumuman</label>
                <input type="text" name="judul" required class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-[#8B5CF6]">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                <select name="kategori" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-[#8B5CF6]">
                    <option value="info">Informasi Umum</option>
                    <option value="penting">Penting (Mendesak)</option>
                    <option value="jadwal">Jadwal Kegiatan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Isi Pengumuman</label>
                <textarea name="isi" rows="6" required class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-[#8B5CF6]" placeholder="Tuliskan detail pengumuman di sini..."></textarea>
            </div>
            <div class="pt-4 flex justify-end gap-4">
                <a href="{{ route('admin.pengumuman.index') }}" class="px-6 py-2 rounded-xl border font-bold text-gray-600 hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="bg-[#8B5CF6] text-white px-8 py-3 rounded-xl font-bold hover:bg-[#7C3AED] transition shadow-lg">
                    Terbitkan Pengumuman
                </button>
            </div>
        </div>
    </form>
</div>
@endsection