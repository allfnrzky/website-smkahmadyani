<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Berita;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Pendaftaran::count(),
            'lulus' => Pendaftaran::where('status', 'lulus')->count(),
            'berita' => Berita::count(),
            'total_siswa' => User::where('role', 'siswa')->count(),
            'total_guru' => User::where('role', 'guru')->count(),
            'total_kelas' => Kelas::count(),
            'total_jurusan' => Jurusan::count(),
        ];

        $latest_pendaftar = Pendaftaran::with(['user', 'programKeahlian1'])
                            ->latest()
                            ->take(5)
                            ->get();
        return view('admin.dashboard', compact('stats', 'latest_pendaftar'));
    }
}