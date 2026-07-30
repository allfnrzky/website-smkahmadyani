<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    public function index() {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        
        // Hitung total pengumuman untuk angka notifikasi di sidebar
        $pengumuman_count = \App\Models\Pengumuman::count();
        
        // Ambil HANYA SATU pengumuman terbaru
        $pengumuman_terbaru = \App\Models\Pengumuman::latest()->first();

        return view('siswa.dashboard', compact('pendaftaran', 'pengumuman_count', 'pengumuman_terbaru'));
    }

    public function buatPendaftaran() {
        $pendaftaran = Pendaftaran::with(['programKeahlian1', 'programKeahlian2', 'jurusanDiterima'])->where('user_id', auth()->id())->first();
        
        // Ambil data jurusan (untuk dropdown jika user belum daftar)
        $jurusan = ProgramKeahlian::all(); 

        // Hitung pengumuman untuk sidebar
        $pengumuman_count = \App\Models\Pengumuman::count();
        
        // Tetap tampilkan view pendaftaran
        return view('siswa.pendaftaran', compact('pendaftaran', 'jurusan', 'pengumuman_count'));
    }

    public function kirimPendaftaran(Request $request) {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->id();
            $data['no_pendaftaran'] = 'PMB-' . date('Ymd') . rand(100, 999);
            $data['status'] = 'proses';

            // Handle Upload Berkas
            if ($request->hasFile('file_kk')) {
                $request->validate(['file_kk' => 'mimes:jpg,jpeg,png,pdf|max:2048']);
                $data['file_kk'] = $request->file('file_kk')->store('berkas/kk', 'public');
            }
            if ($request->hasFile('file_ijazah')) {
                $request->validate(['file_ijazah' => 'mimes:jpg,jpeg,png,pdf|max:2048']);
                $data['file_ijazah'] = $request->file('file_ijazah')->store('berkas/ijazah', 'public');
            }
            if ($request->hasFile('ktp_ibu')) {
                $request->validate(['ktp_ibu' => 'mimes:jpg,jpeg,png|max:2048']);
                $data['ktp_ibu'] = $request->file('ktp_ibu')->store('berkas/ktp_ibu', 'public');
            }
            if ($request->hasFile('ktp_ayah')) {
                $request->validate(['ktp_ayah' => 'mimes:jpg,jpeg,png|max:2048']);
                $data['ktp_ayah'] = $request->file('ktp_ayah')->store('berkas/ktp_ayah', 'public');
            }

            Pendaftaran::create($data);

            return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil dikirim!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal mengirim: ' . $e->getMessage());
        }
    }

    public function updatePendaftaran(Request $request, $id) {
        try {
            $pendaftaran = Pendaftaran::where('user_id', auth()->id())->findOrFail($id);
            $data = $request->except(['_token', '_method', 'user_id', 'no_pendaftaran', 'status']);

            // Handle Upload Berkas (ganti yang lama)
            if ($request->hasFile('file_kk')) {
                $request->validate(['file_kk' => 'mimes:jpg,jpeg,png,pdf|max:2048']);
                Storage::disk('public')->delete($pendaftaran->file_kk);
                $data['file_kk'] = $request->file('file_kk')->store('berkas/kk', 'public');
            }
            if ($request->hasFile('file_ijazah')) {
                $request->validate(['file_ijazah' => 'mimes:jpg,jpeg,png,pdf|max:2048']);
                Storage::disk('public')->delete($pendaftaran->file_ijazah);
                $data['file_ijazah'] = $request->file('file_ijazah')->store('berkas/ijazah', 'public');
            }
            if ($request->hasFile('ktp_ibu')) {
                $request->validate(['ktp_ibu' => 'mimes:jpg,jpeg,png|max:2048']);
                Storage::disk('public')->delete($pendaftaran->ktp_ibu);
                $data['ktp_ibu'] = $request->file('ktp_ibu')->store('berkas/ktp_ibu', 'public');
            }
            if ($request->hasFile('ktp_ayah')) {
                $request->validate(['ktp_ayah' => 'mimes:jpg,jpeg,png|max:2048']);
                Storage::disk('public')->delete($pendaftaran->ktp_ayah);
                $data['ktp_ayah'] = $request->file('ktp_ayah')->store('berkas/ktp_ayah', 'public');
            }

            $pendaftaran->update($data);

            return redirect()->route('siswa.pendaftaran')->with('success', 'Data pendaftaran berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui: ' . $e->getMessage());
        }
    }

    public function dashboard() {
        $pendaftaran = Pendaftaran::where('user_id', auth()->id())->first();
        $pengumuman_terbaru = \App\Models\Pengumuman::latest()->first();
        return view('calon-siswa.dashboard', compact('pendaftaran', 'pengumuman_terbaru'));
    }

    public function pengumuman() {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->first();
        $semua_pengumuman = \App\Models\Pengumuman::latest()->get();
        
        $pengumuman_count = \App\Models\Pengumuman::count();
        
        return view('siswa.pengumuman', compact('pendaftaran', 'semua_pengumuman', 'pengumuman_count'));
    }

    public function cetakBukti() {

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    $pendaftaran = Pendaftaran::where('user_id', auth()->id())
                    ->with(['programKeahlian1', 'jurusanDiterima'])
                    ->firstOrFail();

    if ($pendaftaran->status !== 'lulus') {
        return back()->with('error', 'Bukti pendaftaran hanya bisa dicetak jika sudah diterima.');
    }

    $pdf = Pdf::loadView('siswa.bukti-pendaftaran', compact('pendaftaran'));
    
    // Download otomatis dengan nama file nomor pendaftaran
    return $pdf->download('Bukti_Diterima_'.$pendaftaran->no_pendaftaran.'.pdf');
}
}