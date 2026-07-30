@extends('layouts.admin')
@section('title', 'Kelola Berita')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('admin.berita.create') }}" class="bg-[#8B5CF6] text-white px-6 py-2 rounded-xl font-bold hover:bg-[#7C3AED] transition">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Berita
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-gray-400 text-xs uppercase font-medium">
            <tr>
                <th class="px-6 py-4">Gambar</th>
                <th class="px-6 py-4">Judul</th>
                <th class="px-6 py-4">Tanggal</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($berita as $b)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/'.$b->gambar) }}" class="w-20 h-12 object-cover rounded-lg">
                </td>
                <td class="px-6 py-4 font-bold text-gray-800">{{ $b->judul }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $b->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end items-center space-x-3">
                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.berita.edit', $b->id) }}" class="text-blue-500 hover:text-blue-700 transition">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition" onclick="return confirm('Hapus berita?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection