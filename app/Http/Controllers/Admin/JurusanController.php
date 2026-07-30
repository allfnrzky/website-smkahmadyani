<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::latest()->get();
        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Jurusan::create($request->all());
        return back()->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $jurusan->update($request->all());
        return back()->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return back()->with('success', 'Jurusan berhasil dihapus.');
    }
}
