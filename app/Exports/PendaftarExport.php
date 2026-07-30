<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftarExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendaftaran::with(['user', 'programKeahlian1', 'programKeahlian2', 'jurusanDiterima'])->get();
    }

    /**
    * Menentukan Headings (Judul Kolom) di Excel
    */
    public function headings(): array
    {
        return [
            'No. Pendaftaran',
            'Jenis',
            'Status Seleksi',
            'Nama Lengkap',
            'NISN',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'JK',
            'Alamat Lengkap',
            'No. HP Siswa',
            'Email',
            'Asal Sekolah',
            'Tahun Lulus',
            'Pilihan Jurusan 1',
            'Pilihan Jurusan 2',
            'Jurusan Diterima',
            'Ukuran Seragam',
            'Nama Ibu',
            'Status Ibu',
            'Pekerjaan Ibu',
            'Gaji Ibu',
            'No. HP Ibu',
            'Nama Ayah',
            'Status Ayah',
            'Pekerjaan Ayah',
            'Gaji Ayah',
            'No. HP Ayah',
            'Catatan Admin'
        ];
    }

    /**
    * Memetakan data dari model ke kolom Excel
    */
    public function map($p): array
    {
        return [
            $p->no_pendaftaran,
            strtoupper($p->jenis_pendaftaran),
            strtoupper($p->status),
            $p->nama_lengkap,
            "'" . $p->nisn, // Menambahkan kutip agar angka nol di depan tidak hilang
            "'" . $p->nik,
            $p->tempat_lahir,
            $p->tanggal_lahir,
            $p->jk,
            // Menggabungkan alamat menjadi satu kolom agar ringkas
            $p->alamat . " RT/RW " . $p->rtrw . ", Desa " . $p->desa . ", Kec. " . $p->kecamatan . ", " . $p->kabupaten,
            "'" . $p->no_hp,
            $p->email_siswa,
            $p->asal_sekolah,
            $p->tahun_lulus,
            $p->programKeahlian1->nama ?? '-',
            $p->programKeahlian2->nama ?? '-',
            $p->jurusanDiterima->nama ?? '-',
            $p->ukuran_seragam,
            $p->nama_ibu,
            $p->status_ibu,
            $p->kerja_ibu,
            $p->gaji_ibu,
            "'" . $p->hp_ibu,
            $p->nama_ayah,
            $p->status_ayah,
            $p->kerja_ayah,
            $p->gaji_ayah,
            "'" . $p->hp_ayah,
        ];
    }
}