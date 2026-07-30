<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use App\Exports\PendaftarExport;
use Maatwebsite\Excel\Facades\Excel;

class PPDBController extends Controller
{

    public function index(Request $request) {
        $query = Pendaftaran::with(['user', 'programKeahlian1']);

        // Search logic
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                ->orWhere('nisn', 'like', "%$search%")
                ->orWhere('no_pendaftaran', 'like', "%$search%");
            });
        }

        // Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Jurusan Filter
        if ($request->filled('jurusan')) {
            $query->where('jurusan_1', $request->jurusan);
        }

        // Tanggal Filter
        if ($request->filled('tgl_awal')) {
            $query->whereDate('created_at', '>=', $request->tgl_awal);
        }
        if ($request->filled('tgl_akhir')) {
            $query->whereDate('created_at', '<=', $request->tgl_akhir);
        }

        $pendaftar = $query->latest()->get();
        $jurusan = ProgramKeahlian::all();

        return view('admin.ppdb.index', compact('pendaftar', 'jurusan'));
    }

    public function show($id) {
        // Detail lengkap pendaftar
        $p = Pendaftaran::with(['user', 'programKeahlian1', 'programKeahlian2'])->findOrFail($id);
        return view('admin.ppdb.show', compact('p'));
    }

    public function updateStatus(Request $request, $id) {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $data = [
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ];

        if ($request->status == 'lulus') {
            $request->validate([
                'jurusan_diterima' => 'required|exists:program_keahlians,id',
            ]);

            // Cek kuota
            $jurusan = ProgramKeahlian::findOrFail($request->jurusan_diterima);
            if ($jurusan->kuota) {
                $terdaftar = Pendaftaran::where('jurusan_diterima', $jurusan->id)
                    ->where('status', 'lulus')
                    ->count();
                if ($terdaftar >= $jurusan->kuota) {
                    return back()->with('error', 'Kuota jurusan ' . $jurusan->nama . ' sudah penuh (maksimal ' . $jurusan->kuota . ' siswa).');
                }
            }

            $data['jurusan_diterima'] = $request->jurusan_diterima;
        }

        $pendaftaran->update($data);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function exportExcel() {
    return Excel::download(new PendaftarExport, 'Data_Pendaftar_2026.xlsx');
    }

    public function updateKuota(Request $request) {
        $request->validate([
            'kuota' => 'required|array',
            'kuota.*' => 'nullable|integer|min:0',
        ]);

        foreach ($request->kuota as $id => $kuota) {
            ProgramKeahlian::where('id', $id)->update(['kuota' => $kuota ?: null]);
        }

        return back()->with('success', 'Kuota jurusan berhasil diperbarui.');
    }
}