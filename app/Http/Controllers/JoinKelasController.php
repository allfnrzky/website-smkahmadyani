<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class JoinKelasController extends Controller
{
    public function index()
    {
        // Cukup ambil kelas dari relasi user yang sedang login
        $kelasSaya = auth()->user()->kelas;
        
        // Arahkan ke dashboard siswa
        return view('siswa.dashboard', compact('kelasSaya'));
    }

    public function join(Request $request)
    {
        $request->validate(['token' => 'required|string']);

        // Cek apakah siswa sudah tergabung di kelas lain
        $jumlahKelas = auth()->user()->kelas()->count();
        if ($jumlahKelas >= 1) {
            return back()->with('error', 'Anda sudah tergabung di sebuah kelas. Anda hanya bisa mengikuti satu kelas saja.');
        }

        $kelas = Kelas::where('token', $request->token)->first();

        // 1. Validasi Token Ada
        if (!$kelas) {
            return back()->with('error', 'Token kelas tidak ditemukan!');
        }

        // 2. Validasi Expired
        if (now()->gt($kelas->token_expired_at)) {
            return back()->with('error', 'Token sudah kedaluwarsa!');
        }

        // 3. Gabung (Many-to-Many)
        auth()->user()->kelas()->syncWithoutDetaching([$kelas->id]);

        return back()->with('success', 'Berhasil bergabung di kelas: ' . $kelas->nama);
    }

    public function show($id)
    {
        // Cari kelas dan pastikan user tersebut memang anggota kelas ini (Security check)
        $kelas = auth()->user()->kelas()->where('kelas_id', $id)->firstOrFail();

        // Ambil semua mata pelajaran di kelas ini beserta data gurunya
        $mapel = MataPelajaran::where('kelas_id', $id)->with('guru')->get();

        return view('siswa.detail_kelas', compact('kelas', 'mapel'));
    }

    public function bukaMapel($mapel_id)
    {
        // 1. Ambil detail mapel
        $mapel = \App\Models\MataPelajaran::with(['guru', 'kelas'])->findOrFail($mapel_id);
        
        // 2. Ambil data Pertemuan, Materi, dan Tugas sekaligus (Eager Loading)
        $pertemuans = \App\Models\Pertemuan::where('mata_pelajaran_id', $mapel_id)
                    ->with([
                        'materis', 
                        'tugas.pengumpulans' => function($query) {
                            $query->where('siswa_id', auth()->id());
                        }
                    ])
                    ->get();

        // 3. Kirim variabel $pertemuans ke view
        return view('siswa.mapel_detail', compact('mapel', 'pertemuans'));
    }

    public function kumpulTugas(Request $request, $tugas_id)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf,doc,docx,zip|max:5120',
        ]);

        $path = $request->file('file')->store('pengumpulan', 'public');

        \App\Models\Pengumpulan::updateOrCreate(
            ['tugas_id' => $tugas_id, 'siswa_id' => auth()->id()],
            ['file_path' => $path]
        );

        return back()->with('success', 'Tugas berhasil dikumpulkan!');
    }

    public function daftarTugas()
    {
        $siswaId = auth()->id();
        
        // Ambil ID kelas dari tabel siswa_kelas
        $kelasIds = \DB::table('siswa_kelas')
            ->where('siswa_id', $siswaId)
            ->pluck('kelas_id');

        $tugasBelumSelesai = \App\Models\Tugas::whereIn('pertemuan_id', function($query) use ($kelasIds) {
                $query->select('id')
                    ->from('pertemuans')
                    ->whereIn('mata_pelajaran_id', function($q) use ($kelasIds) {
                        $q->select('id')
                            ->from('mata_pelajaran')
                            ->whereIn('kelas_id', $kelasIds);
                    });
            })
            ->whereDoesntHave('pengumpulans', function($query) use ($siswaId) {
                $query->where('siswa_id', $siswaId);
            })
            ->with(['pertemuan.mapel.guru'])
            ->orderBy('deadline', 'asc')
            ->get();

        return view('siswa.tugas.index', compact('tugasBelumSelesai'));
    }

}