<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('jurusan')->latest()->get();
        $jurusans = Jurusan::all();
        return view('admin.kelas.index', compact('kelas', 'jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:program_keahlians,id',
        ]);

        Kelas::create($request->all());

        return back()->with('success', 'Kelas berhasil dibuat dengan token otomatis.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:program_keahlians,id',
        ]);
        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan_id,
        ]);
        return back()->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return back()->with('success', 'Kelas berhasil dihapus!');
    }

    public function updateToken($id)
    {
        $kelas = Kelas::findOrFail($id);
        
        $kelas->update([
            'token' => strtoupper(Str::random(6)),
            'token_expired_at' => now()->addDays(30), 
        ]);

        return back()->with('success', "Token kelas {$kelas->nama} berhasil diperbarui!");
    }
}
