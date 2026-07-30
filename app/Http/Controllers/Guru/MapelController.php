<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Models\Pengumpulan;
use App\Models\Pertemuan;

class MapelController extends Controller
{
    public function index()
    {
        // Guru hanya melihat Mapel yang dia ampu
        $mapels = MataPelajaran::where('guru_id', auth()->id())->with('kelas')->get();
        $kelas = Kelas::all(); // Untuk dropdown saat buat mapel baru
        return view('guru.mapel.index', compact('mapels', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        MataPelajaran::create([
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'guru_id' => auth()->id(),
        ]);

        return back()->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function storeMateri(Request $request, $mapel_id)
    {
        return \DB::transaction(function () use ($request, $mapel_id) {
            // 1. Buat Pertemuan
            $pertemuan = \App\Models\Pertemuan::create([
                'mata_pelajaran_id' => $mapel_id,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi_pertemuan,
            ]);

            // 2. Simpan Materi
            $materi = new \App\Models\Materi();
            $materi->pertemuan_id = $pertemuan->id; // Mengikat ke pertemuan
            $materi->mata_pelajaran_id = $mapel_id;
            $materi->judul = $request->judul;
            if ($request->hasFile('file')) {
                $materi->file_path = $request->file('file')->store('materi', 'public');
            }
            $materi->save();

            // 3. Simpan Banyak Tugas
            if ($request->has('tugas')) {
                foreach ($request->tugas as $tData) {
                    if (!empty($tData['judul'])) {
                        \App\Models\Tugas::create([
                            'pertemuan_id' => $pertemuan->id, // ** INI KUNCINYA: Harus pakai ID dari $pertemuan di atas
                            'mata_pelajaran_id' => $mapel_id,
                            'judul' => $tData['judul'],
                            'deskripsi' => $tData['deskripsi'] ?? '-',
                            'deadline' => $tData['deadline'],
                        ]);
                    }
                }
            }
            return back()->with('success', 'Pertemuan berhasil dipublikasikan!');
        });
    }

    public function storeTugas(Request $request, $mapel_id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deadline' => 'required|date|after:now',
        ]);

        \App\Models\Tugas::create([
            'mata_pelajaran_id' => $mapel_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ]);

        return back()->with('success', 'Tugas berhasil dibuat.');
    }

    public function show($id)
    {
        // 1. Ambil data Mapel
        $mapel = MataPelajaran::where('id', $id)
                            ->where('guru_id', auth()->id())
                            ->firstOrFail();

        // 2. Ambil data Pertemuan beserta relasinya (Materi & Tugas)
        // Gunakan 'with' agar query efisien (Eager Loading)
        $pertemuans = \App\Models\Pertemuan::where('mata_pelajaran_id', $id)
                        ->with(['materis', 'tugas']) 
                        ->latest()
                        ->get();

        // 3. Kirimkan $pertemuans ke View
        return view('guru.mapel.show', compact('mapel', 'pertemuans'));
    }

    public function lihatTugas($tugas_id)
    {
        // Ubah 'mataPelajaran' menjadi 'mapel' sesuai dengan nama fungsi di Model Tugas
        $tugas = \App\Models\Tugas::with('mapel')->findOrFail($tugas_id);
        
        // Ambil data pengumpulan beserta nama siswanya
        $pengumpulans = \App\Models\Pengumpulan::where('tugas_id', $tugas_id)
                        ->with('siswa')
                        ->get();

        return view('guru.mapel.tugas_detail', compact('tugas', 'pengumpulans'));
    }

    public function nilaiTugas(Request $request, $pengumpulan_id)
    {
        $request->validate(['nilai' => 'required|integer|min:0|max:100']);
        
        $p = \App\Models\Pengumpulan::findOrFail($pengumpulan_id);
        $p->update(['nilai' => $request->nilai]);

        return back()->with('success', 'Nilai berhasil disimpan.');
    }

    public function showKelas($id)
    {
        // Ambil data kelas
        $kelas = \App\Models\Kelas::findOrFail($id);

        // Ambil mapel yang diajar oleh guru ini DI KELAS TERSEBUT saja
        $mapels = \App\Models\MataPelajaran::where('kelas_id', $id)
                    ->where('guru_id', auth()->id())
                    ->get();

        return view('guru.kelas_detail', compact('kelas', 'mapels'));
    }

    public function updatePertemuan(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $pertemuan = Pertemuan::findOrFail($id);
        $pertemuan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Pertemuan berhasil diperbarui.');
    }

    public function destroy($id) {
        $pertemuan = Pertemuan::with(['materis', 'tugas'])->findOrFail($id);

        foreach ($pertemuan->materis as $materi) {
            if ($materi->file_path && \Storage::disk('public')->exists($materi->file_path)) {
                \Storage::disk('public')->delete($materi->file_path);
            }
        }

        $pertemuan->delete();

        return back()->with('success', 'Pertemuan dan seluruh kontennya berhasil dihapus.');
    }

    public function updateTugas(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
        ]);

        return back()->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroyTugas($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();

        return back()->with('success', 'Tugas berhasil dihapus.');
    }
}