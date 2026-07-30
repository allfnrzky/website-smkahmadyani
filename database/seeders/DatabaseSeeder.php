<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void {
    // Gunakan updateOrCreate agar jika email sudah ada, sistem hanya mengupdate passwordnya saja
    \App\Models\User::updateOrCreate(
        // ['email' => 'admin@smkungu.sch.id'],
        // [
        //     'name' => 'Administrator SMK',
        //     'password' => bcrypt('password123'),
        //     'role' => 'admin'
        // ]
        ['email' => 'admin@smkungu.sch.id'],
        [
            'name' => 'Admin SMK',
            'password' => bcrypt('password123'),
            'role' => 'admin'
        ]
    );

    // Contoh akun calon siswa untuk PPDB
    $calonSiswa = [
        ['name' => 'Ahmad Fauzi', 'email' => 'ahmad@siswa.sch.id', 'password' => 'siswa123'],
        ['name' => 'Siti Nurhaliza', 'email' => 'siti@siswa.sch.id', 'password' => 'siswa123'],
        ['name' => 'Budi Santoso', 'email' => 'budi@siswa.sch.id', 'password' => 'siswa123'],
    ];

    foreach ($calonSiswa as $s) {
        \App\Models\User::updateOrCreate(
            ['email' => $s['email']],
            [
                'name' => $s['name'],
                'password' => bcrypt($s['password']),
                'role' => 'calon_siswa'
            ]
        );
    }

    // Handle rename jurusan lama ke baru agar tidak duplikat saat re-seed
    \App\Models\ProgramKeahlian::where('nama', 'Teknik Jaringan Komputer dan Telekomunikasi')
        ->update(['nama' => 'Teknik Komputer dan Jaringan']);

    // Hapus duplikat jika ada (akibat seed sebelumnya)
    \App\Models\ProgramKeahlian::where('nama', 'Teknik Komputer dan Jaringan')
        ->skip(1)
        ->delete();

    $jurusan = [
        ['nama' => 'Bisnis Digital'],
        ['nama' => 'Teknik Komputer dan Jaringan'],
        ['nama' => 'Layanan Perbankan Syariah'],
        ['nama' => 'Layanan Penunjang Kefarmasian Klinis dan Komunitas'],
    ];

    foreach ($jurusan as $j) {
        // Gunakan updateOrCreate juga untuk jurusan agar tidak duplikat
        \App\Models\ProgramKeahlian::updateOrCreate(['nama' => $j['nama']], $j);
    }
}
}
