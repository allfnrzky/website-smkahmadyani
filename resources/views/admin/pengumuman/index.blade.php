@extends('layouts.admin')
@section('title', 'Kelola Pengumuman')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('admin.pengumuman.create') }}" class="bg-[#8B5CF6] text-white px-6 py-2 rounded-xl font-bold hover:bg-[#7C3AED] transition shadow-lg">
        <i class="fa-solid fa-plus mr-2"></i> Tambah Pengumuman
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-gray-400 text-xs uppercase font-medium">
            <tr>
                <th class="px-6 py-4">Kategori</th>
                <th class="px-6 py-4">Judul</th>
                <th class="px-6 py-4">Dibuat</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-sm">
            @foreach($pengumuman as $p)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase {{ $p->kategori == 'penting' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                        {{ $p->kategori }}
                    </span>
                </td>
                <td class="px-6 py-4 font-bold text-gray-800">{{ $p->judul }}</td>
                <td class="px-6 py-4 text-gray-500">{{ $p->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4 text-right space-x-3">
                    <a href="{{ route('admin.pengumuman.edit', $p->id) }}" class="text-blue-500 hover:text-blue-700">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('admin.pengumuman.destroy', $p->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:text-red-700" onclick="return confirm('Hapus pengumuman?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection