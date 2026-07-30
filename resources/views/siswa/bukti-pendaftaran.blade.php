<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Diterima - {{ $pendaftaran->nama_lengkap }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 11pt; color: #333; margin: 0; padding: 0; }
        .container { padding: 20px; }
        
        /* KOP SURAT */
        .kop-tabel { width: 100%; border-bottom: 3px solid #000; margin-bottom: 20px; padding-bottom: 10px; }
        .logo { width: 80px; text-align: left; }
        .instansi { text-align: center; }
        .instansi h2 { margin: 0; font-size: 18pt; text-transform: uppercase; }
        .instansi p { margin: 2px 0; font-size: 9pt; }

        .title { text-align: center; text-decoration: underline; font-weight: bold; margin-bottom: 20px; }
        
        /* TABEL DATA */
        .data-tabel { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .section-title { background: #f2f2f2; font-weight: bold; padding: 5px 10px; border: 1px solid #ccc; font-size: 10pt; }
        .data-tabel td { padding: 6px 10px; border: 1px solid #ccc; font-size: 9pt; vertical-align: top; }
        .label { width: 30%; background: #fafafa; }

        /* TANDA TANGAN */
        .footer-ttd { margin-top: 30px; width: 100%; }
        .ttd-box { float: right; width: 200px; text-align: center; }
        .ttd-box p { margin: 0; font-size: 9pt; }
        .qr-code { margin: 10px 0; }
        
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <div class="container">
        <table class="kop-tabel">
            <tr>
                <td class="logo">
                    <img src="{{ public_path('images/logo-smk.jpg') }}" width="80">
                </td>
                <td class="instansi">
                    <p>YAYASAN PENDIDIKAN SMK AHMAD YANI</p>
                    <h2>SMK AHMAD YANI JABUNG</h2>
                    <p>Jl. Raya Sukolilo No.02, Kec. Jabung, Kab. Malang, Jawa Timur</p>
                    <p>Email: smkahmadyanijabung@gmail.com | Website: www.smkahmadyanijabung.com</p>
                </td>
            </tr>
        </table>

        <div class="title">BUKTI DITERIMA PENDAFTARAN SISWA BARU 2026</div>

        <table class="data-tabel">
            <tr><td colspan="2" class="section-title">I. DATA PENDAFTARAN</td></tr>
            <tr><td class="label">No. Pendaftaran</td><td><strong>{{ $pendaftaran->no_pendaftaran }}</strong></td></tr>
            <tr>
                <td class="label">Jurusan Diterima</td>
                <td><strong>{{ $pendaftaran->jurusanDiterima->nama ?? $pendaftaran->programKeahlian1->nama }}</strong></td>
            </tr>
            <tr>
                <td class="label">Status Calon Siswa</td>
                <td><strong style="color: green;">{{ $pendaftaran->status == 'lulus' ? 'DITERIMA' : strtoupper($pendaftaran->status) }}</strong></td>
            </tr>
            <tr><td class="label">Jenis Pendaftaran</td><td>{{ strtoupper($pendaftaran->jenis_pendaftaran) }}</td></tr>
        </table>

        <table class="data-tabel">
            <tr><td colspan="2" class="section-title">II. IDENTITAS CALON SISWA</td></tr>
            <tr><td class="label">Nama Lengkap</td><td>{{ $pendaftaran->nama_lengkap }}</td></tr>
            <tr><td class="label">NISN / NIK</td><td>{{ $pendaftaran->nisn }} / {{ $pendaftaran->nik }}</td></tr>
            <tr><td class="label">Tempat, Tgl Lahir</td><td>{{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d F Y') }}</td></tr>
            <tr><td class="label">Jenis Kelamin</td><td>{{ $pendaftaran->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
            <tr><td class="label">Alamat Lengkap</td>
                <td>{{ $pendaftaran->alamat }}, RT/RW {{ $pendaftaran->rtrw }}, DESA {{ $pendaftaran->desa }}, KEC. {{ $pendaftaran->kecamatan }}, KAB. {{ $pendaftaran->kabupaten }}</td>
            </tr>
            <tr><td class="label">Sekolah Asal</td><td>{{ $pendaftaran->asal_sekolah }} (Lulus Tahun {{ $pendaftaran->tahun_lulus }})</td></tr>
            <tr><td class="label">Kontak</td><td>{{ $pendaftaran->no_hp }} / {{ $pendaftaran->email_siswa }}</td></tr>
        </table>

        <table class="data-tabel">
            <tr><td colspan="3" class="section-title">III. DATA ORANG TUA / WALI</td></tr>
            <tr style="background: #eee;">
                <td>Keterangan</td><td>DATA IBU</td><td>DATA AYAH</td>
            </tr>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td>{{ $pendaftaran->nama_ibu }} ({{ ucfirst($pendaftaran->status_ibu) }})</td>
                <td>{{ $pendaftaran->nama_ayah }} ({{ ucfirst($pendaftaran->status_ayah) }})</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan / Gaji</td>
                <td>{{ $pendaftaran->kerja_ibu }} / {{ $pendaftaran->gaji_ibu }}</td>
                <td>{{ $pendaftaran->kerja_ayah }} / {{ $pendaftaran->gaji_ayah ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">No. HP</td>
                <td>{{ $pendaftaran->hp_ibu }}</td>
                <td>{{ $pendaftaran->hp_ayah }}</td>
            </tr>
        </table>

        <div class="footer-ttd">
            <div style="float: left; width: 60%; font-size: 8pt; color: #666;">
                <p><strong>Catatan:</strong><br>
                1. Lembar ini adalah bukti sah diterima seleksi administrasi.<br>
                2. Silakan melakukan daftar ulang dengan membawa dokumen fisik.<br>
                3. Dokumen ini dicetak otomatis oleh sistem PPDB SMK Ahmad Yani.</p>
            </div>
            <div class="ttd-box">
                <p>Malang, {{ date('d M Y') }}</p>
                <p>Panitia PPDB,</p>
            <div style="margin: 5px 0;">
                @php
                    // 1. Definisikan data yang akan disimpan di dalam QR Code
                    // Anda bisa menaruh URL verifikasi, atau sekadar data pendaftar
                    $dataValidasi = "VALIDASI PPDB SMK AHMAD YANI | NO: " . $pendaftaran->no_pendaftaran . " | NAMA: " . $pendaftaran->nama_lengkap;
                    
                    // 2. Panggil API eksternal pembuat QR Code
                    $apiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=100x100&margin=0&data=' . urlencode($dataValidasi);
                    
                    // 3. Konversi langsung ke Base64 (Bypass restriksi remote image DOMPDF)
                    $qrImage = @file_get_contents($apiUrl);
                @endphp
            
                @if($qrImage)
                    <img src="data:image/png;base64,{{ base64_encode($qrImage) }}" width="80" alt="QR Code Validasi"/>
                @else
                    <!-- Failsafe jika server Hostinger memblokir koneksi keluar -->
                    <div style="width: 80px; height: 80px; border: 1px dashed #000; display: inline-block; text-align: center; font-size: 8pt; line-height: 80px;">
                        [ QR INVALID ]
                    </div>
                @endif
            </div>
                <p><strong>PANITIA PENERIMAAN</strong></p>
                <p>NIP. 19200321100221</p>
            </div>
        </div>
    </div>
</body>
</html>