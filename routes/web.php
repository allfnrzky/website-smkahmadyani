<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PPDBController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Siswa\PendaftaranController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JoinKelasController;
use App\Http\Controllers\Guru\MapelController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'beranda'])->name('beranda');
Route::get('/tentang-kami', [PublicController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita.index');
Route::get('/berita/{slug}', [PublicController::class, 'showBerita'])->name('berita.show');
Route::get('/program-keahlian', [PublicController::class, 'programKeahlian'])->name('program-keahlian');
Route::get('/program-keahlian/{programKeahlian}', [PublicController::class, 'detailJurusan'])->name('program-keahlian.detail');
Route::get('/info-ppdb', function () {
    return view('frontend.info-ppdb');
})->name('info.ppdb');

/*
|--------------------------------------------------------------------------
| LMS Login (terpisah dari PPDB)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/lms/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'createLms'])->name('login.lms');
    Route::post('/lms/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'storeLms']);
});

/*
|--------------------------------------------------------------------------
| Dashboard (Role-based redirect)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'guru') {
            $kelasSaya = $user->kelas;
            return view('guru.dashboard', compact('kelasSaya'));
        } elseif ($user->role === 'calon_siswa') {
            return redirect()->route('calon-siswa.dashboard');
        }
        return redirect()->route('siswa.dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| All Authenticated Routes (Siswa & Guru & Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::post('/join-kelas', [JoinKelasController::class, 'join'])->name('kelas.join.proses');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Guru Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::post('/guru/mapel', [MapelController::class, 'store'])->name('guru.mapel.store');
    Route::get('/guru/mapel/{id}', [MapelController::class, 'show'])->name('guru.mapel.show');
    Route::get('/guru/kelas/{id}', [MapelController::class, 'showKelas'])->name('guru.kelas.detail');
    Route::delete('/guru/pertemuan/{id}', [MapelController::class, 'destroy'])->name('guru.pertemuan.hapus');
    Route::put('/guru/pertemuan/{id}', [MapelController::class, 'updatePertemuan'])->name('guru.pertemuan.update');
    Route::post('/guru/mapel/{id}/materi', [MapelController::class, 'storeMateri'])->name('guru.materi.store');
    Route::get('/guru/tugas/{id}', [MapelController::class, 'lihatTugas'])->name('guru.tugas.lihat');
    Route::put('/guru/tugas/{id}', [MapelController::class, 'updateTugas'])->name('guru.tugas.update');
    Route::delete('/guru/tugas/{id}', [MapelController::class, 'destroyTugas'])->name('guru.tugas.hapus');
    Route::post('/guru/nilai/{id}', [MapelController::class, 'nilaiTugas'])->name('guru.nilai.simpan');
});

/*
|--------------------------------------------------------------------------
| Siswa Routes (LMS + PPDB)
|--------------------------------------------------------------------------
*/
// Calon Siswa Routes (PPDB only)
Route::middleware(['auth', 'role:calon_siswa'])->group(function () {
    Route::get('/calon-siswa/dashboard', [PendaftaranController::class, 'dashboard'])->name('calon-siswa.dashboard');
    Route::get('/pendaftaran', [PendaftaranController::class, 'buatPendaftaran'])->name('siswa.pendaftaran');
    Route::post('/daftar-ppdb', [PendaftaranController::class, 'kirimPendaftaran'])->name('ppdb.daftar');
    Route::put('/daftar-ppdb/{id}', [PendaftaranController::class, 'updatePendaftaran'])->name('ppdb.update');
    Route::get('/cetak-bukti', [PendaftaranController::class, 'cetakBukti'])->name('siswa.cetak-bukti');
    Route::get('/pengumuman-siswa', [PendaftaranController::class, 'pengumuman'])->name('siswa.pengumuman');
});

// Siswa Routes (LMS only)
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', [JoinKelasController::class, 'index'])->name('siswa.dashboard');
    Route::get('/kelas/{id}', [JoinKelasController::class, 'show'])->name('kelas.detail');
    Route::get('/mapel/{mapel_id}', [JoinKelasController::class, 'bukaMapel'])->name('siswa.mapel.buka');
    Route::post('/tugas/{id}/kumpul', [JoinKelasController::class, 'kumpulTugas'])->name('siswa.tugas.kumpul');
    Route::get('/siswa/daftar-tugas', [JoinKelasController::class, 'daftarTugas'])->name('siswa.tugas.index');
});

/*
|--------------------------------------------------------------------------
| Admin Login (terpisah dari PPDB & LMS)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'createAdmin'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'storeAdmin']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes (PPDB + LMS)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Berita
    Route::post('berita/upload-image', [BeritaController::class, 'uploadImage'])->name('berita.upload-image');
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);

    // PPDB
    Route::get('/ppdb', [PPDBController::class, 'index'])->name('ppdb');
    Route::get('/ppdb/export', [PPDBController::class, 'exportExcel'])->name('ppdb.export');
    Route::get('/ppdb/{id}', [PPDBController::class, 'show'])->name('ppdb.show');
    Route::patch('/ppdb/{id}/status', [PPDBController::class, 'updateStatus'])->name('ppdb.status');
    Route::post('/ppdb/kuota', [PPDBController::class, 'updateKuota'])->name('ppdb.kuota');

    // Pengumuman
    Route::resource('pengumuman', \App\Http\Controllers\Admin\PengumumanController::class);

    // LMS Admin: Users
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/import', [UserController::class, 'import'])->name('user.import');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::delete('/user', [UserController::class, 'destroyBatch'])->name('user.destroy.batch');

    // LMS Admin: Jurusan
    Route::resource('jurusan', JurusanController::class)->except(['create', 'show', 'edit']);

    // LMS Admin: Kelas
    Route::resource('kelas', KelasController::class)->except(['create', 'show', 'edit']);
    Route::patch('/kelas/{id}/update-token', [KelasController::class, 'updateToken'])->name('kelas.update-token');
});

require __DIR__.'/auth.php';
