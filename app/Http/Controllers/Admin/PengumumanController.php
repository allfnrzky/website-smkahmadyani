<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index() {
        $pengumuman = Pengumuman::latest()->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create() {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'kategori' => 'required|in:penting,info,jadwal'
        ]);

        Pengumuman::create($request->all());

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diterbitkan!');
    }

    public function edit(Pengumuman $pengumuman) {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman) {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'kategori' => 'required|in:penting,info,jadwal'
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman diperbarui!');
    }

    public function destroy(Pengumuman $pengumuman) {
        $pengumuman->delete();
        return back()->with('success', 'Pengumuman dihapus!');
    }
}