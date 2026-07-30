<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function beranda() {
        $berita = Berita::latest()->take(4)->get();
        $jurusan = ProgramKeahlian::all();
        return view('frontend.beranda', compact('berita', 'jurusan'));
    }

    public function tentangKami() {
        return view('frontend.tentang-kami');
    }

    public function programKeahlian() {
        $jurusan = ProgramKeahlian::all();
        return view('frontend.program-keahlian', compact('jurusan'));
    }

    public function berita() {
        $berita = Berita::latest()->paginate(9);
        return view('frontend.berita.index', compact('berita'));
    }
    
    public function showBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();   
        return view('frontend.show-berita', compact('berita'));
    }

    public function detailJurusan(ProgramKeahlian $programKeahlian)
    {
        $j = $programKeahlian;
        $nama = $j->nama;

        $logoMap = [
            'Bisnis Digital' => 'pemasaran.png',
            'Teknik Komputer dan Jaringan' => 'tkj.png',
            'Layanan Perbankan Syariah' => 'perbankan.png',
            'Layanan Penunjang Kefarmasian Klinis dan Komunitas' => 'farmasi.png',
        ];
        $logo = $logoMap[$nama] ?? 'farmasi.png';

        $folderMap = [
            'Bisnis Digital' => 'bd',
            'Teknik Komputer dan Jaringan' => 'tkj',
            'Layanan Perbankan Syariah' => 'lpbs',
            'Layanan Penunjang Kefarmasian Klinis dan Komunitas' => 'lpkk',
        ];
        $folder = $folderMap[$nama] ?? 'bd';

        $galeriFiles = glob(public_path("images/galeri/{$folder}/*.{jpeg,jpg,png}"), GLOB_BRACE);
        $galeri = array_map(function($f) {
            return 'images/galeri/' . basename(dirname($f)) . '/' . basename($f);
        }, $galeriFiles);
        sort($galeri);

        $alasan = $this->getAlasanJurusan($nama);
        $materi = $this->getMateriJurusan($nama);
        $praktik = $this->getPraktikJurusan($nama);
        $deskripsiSingkat = $this->getDeskripsiSingkat($nama);

        return view('frontend.program-keahlian-detail', compact(
            'j', 'logo', 'galeri', 'alasan', 'materi', 'praktik', 'deskripsiSingkat'
        ));
    }

    private function getDeskripsiSingkat($nama)
    {
        $data = [
            'Bisnis Digital' => 'Fokus pada strategi pemasaran online, pengelolaan e-commerce, dan kewirausahaan berbasis teknologi untuk menghadapi ekonomi digital masa kini.',
            'Teknik Komputer dan Jaringan' => 'Mempelajari infrastruktur jaringan, perakitan komputer, hingga administrasi server dan keamanan siber yang krusial bagi industri IT.',
            'Layanan Perbankan Syariah' => 'Membekali siswa dengan kompetensi akuntansi dan manajemen keuangan berbasis syariah yang kini menjadi tren besar di industri finansial.',
            'Layanan Penunjang Kefarmasian Klinis dan Komunitas' => 'Mendalami manajemen kefarmasian, pelayanan obat, dan komunikasi kesehatan untuk mendukung tenaga medis profesional.',
        ];
        return $data[$nama] ?? 'Mendalami manajemen kefarmasian, pelayanan obat, dan komunikasi kesehatan untuk mendukung tenaga medis profesional.';
    }

    private function getAlasanJurusan($nama)
    {
        $data = [
            'Bisnis Digital' => [
                ['judul' => 'Relevan dengan Era Digital', 'desc' => 'Kompetensi yang dipelajari sesuai dengan kebutuhan industri digital yang terus berkembang pesat.'],
                ['judul' => 'Peluang Karir Luas', 'desc' => 'Lulusan dapat bekerja sebagai digital marketer, content creator, social media specialist, atau entrepreneur.'],
                ['judul' => 'Praktik Langsung', 'desc' => 'Pembelajaran berfokus pada praktik pembuatan konten, pengelolaan toko online, dan strategi pemasaran digital.'],
                ['judul' => 'Sertifikasi Kompetensi', 'desc' => 'Siswa dipersiapkan untuk meraih sertifikasi nasional di bidang pemasaran digital.'],
            ],
            'Teknik Komputer dan Jaringan' => [
                ['judul' => 'Relevan dengan Dunia Industri', 'desc' => 'Kompetensi yang dipelajari sesuai dengan kebutuhan industri teknologi informasi yang terus berkembang.'],
                ['judul' => 'Peluang Kerja Sangat Luas', 'desc' => 'Lulusan dapat bekerja sebagai teknisi komputer, administrator jaringan, IT Support, Network Engineer.'],
                ['judul' => 'Praktik Lebih Banyak', 'desc' => 'Pembelajaran berfokus pada praktik sehingga kemampuan siswa lebih siap menghadapi dunia kerja.'],
                ['judul' => 'Mengikuti Perkembangan Teknologi', 'desc' => 'Materi selalu diperbarui sesuai perkembangan teknologi komputer dan jaringan modern.'],
            ],
            'Layanan Perbankan Syariah' => [
                ['judul' => 'Industri Keuangan Syariah Berkembang', 'desc' => 'Perbankan syariah tumbuh signifikan dan membutuhkan tenaga ahli di bidang ini.'],
                ['judul' => 'Peluang Karir Menjanjikan', 'desc' => 'Lulusan dapat bekerja di bank syariah, lembaga keuangan mikro, atau asuransi syariah.'],
                ['judul' => 'Kompetensi Akuntansi & Keuangan', 'desc' => 'Siswa dibekali kemampuan akuntansi dan manajemen keuangan berbasis prinsip syariah.'],
                ['judul' => 'Praktik Langsung di Industri', 'desc' => 'Pembelajaran dilengkapi praktik kerja lapangan di lembaga keuangan syariah.'],
            ],
            'Layanan Penunjang Kefarmasian Klinis dan Komunitas' => [
                ['judul' => 'Tenaga Kesehatan Profesional', 'desc' => 'Mendidik tenaga farmasi yang kompeten dan siap bekerja di fasilitas kesehatan.'],
                ['judul' => 'Peluang Karir bidang Farmasi', 'desc' => 'Lulusan dapat bekerja di apotek, rumah sakit, industri farmasi, atau puskesmas.'],
                ['judul' => 'Laboratorium Lengkap', 'desc' => 'Praktik dilakukan di laboratorium farmasi yang modern dan lengkap.'],
                ['judul' => 'Sertifikasi Kompetensi', 'desc' => 'Siswa dipersiapkan untuk uji kompetensi sebagai tenaga teknis kefarmasian.'],
            ],
        ];
        return $data[$nama] ?? [];
    }

    private function getMateriJurusan($nama)
    {
        $data = [
            'Bisnis Digital' => [
                'Dasar-Dasar Pemasaran', 'Copywriting & Content Creation', 'Fotografi & Videografi Produk',
                'E-commerce Management', 'Social Media Marketing', 'Search Engine Optimization (SEO)',
                'Digital Advertising', 'Branding & Desain Grafis', 'Kewirausahaan Digital',
                'Analisis Data Pemasaran',
            ],
            'Teknik Komputer dan Jaringan' => [
                'Dasar-Dasar Komputer', 'Sistem Operasi Windows & Linux', 'Jaringan Komputer Dasar',
                'Routing & Switching', 'Administrasi Server', 'Mikrotik & Cisco Networking',
                'Keamanan Jaringan (Cyber Security)', 'Cloud Computing', 'Pemrograman Dasar',
                'Internet of Things (IoT)',
            ],
            'Layanan Perbankan Syariah' => [
                'Dasar-Dasar Perbankan', 'Akuntansi Perbankan Syariah', 'Manajemen Keuangan Syariah',
                'Produk & Layanan Bank Syariah', 'Hukum Ekonomi Syariah', 'Analisis Kredit & Pembiayaan',
                'Administrasi Transaksi Keuangan', 'Teknologi Informasi Perbankan', 'Komunikasi Bisnis',
                'Etika Profesi Perbankan Syariah',
            ],
            'Layanan Penunjang Kefarmasian Klinis dan Komunitas' => [
                'Dasar-Dasar Farmasi', 'Anatomi & Fisiologi', 'Farmakologi Dasar',
                'Manajemen Kefarmasian', 'Pelayanan Obat', 'Komunikasi Kesehatan',
                'Etika Profesi Farmasi', 'Teknologi Farmasi', 'K3 di Bidang Farmasi',
                'Praktik Kerja Lapangan',
            ],
        ];
        return $data[$nama] ?? [];
    }

    private function getPraktikJurusan($nama)
    {
        $data = [
            'Bisnis Digital' => 'Jurusan Bisnis Digital menerapkan metode pembelajaran yang menitikberatkan pada praktik langsung. Setiap materi yang dipelajari di kelas akan diterapkan melalui kegiatan praktik pembuatan konten digital, pengelolaan toko online, dan strategi pemasaran berbasis digital. Siswa juga mendapatkan pengalaman melalui proyek berbasis tim, Praktik Kerja Lapangan (PKL) di industri, serta pelatihan sertifikasi sesuai perkembangan dunia usaha.',
            'Teknik Komputer dan Jaringan' => 'Jurusan Teknik Komputer dan Jaringan menerapkan metode pembelajaran yang menitikberatkan pada praktik langsung di laboratorium. Setiap materi yang dipelajari di kelas akan diterapkan melalui kegiatan praktik sehingga siswa tidak hanya memahami konsep, tetapi juga mampu menguasai keterampilan yang dibutuhkan di dunia kerja. Berbagai kegiatan praktik meliputi perakitan komputer, instalasi sistem operasi, konfigurasi jaringan LAN/WAN, administrasi server, konfigurasi router Mikrotik, troubleshooting perangkat keras dan lunak, hingga pengenalan cloud computing dan IoT.',
            'Layanan Perbankan Syariah' => 'Jurusan Layanan Perbankan Syariah menerapkan pembelajaran berbasis praktik untuk membekali siswa dengan keterampilan nyata di dunia perbankan. Siswa berlatih menggunakan sistem informasi perbankan, melakukan simulasi transaksi keuangan syariah, serta mempelajari analisis pembiayaan dan akuntansi perbankan secara langsung. Pembelajaran dilengkapi dengan praktik kerja lapangan di bank syariah dan lembaga keuangan mikro untuk memberikan pengalaman industri yang sesungguhnya.',
            'Layanan Penunjang Kefarmasian Klinis dan Komunitas' => 'Jurusan Farmasi menerapkan pembelajaran berbasis praktik di laboratorium untuk membekali siswa dengan keterampilan nyata di bidang kefarmasian. Siswa berlatih melakukan peracikan obat, pelayanan informasi obat, komunikasi kesehatan, serta manajemen pengelolaan obat di apotek dan rumah sakit. Pembelajaran dilengkapi dengan praktik kerja lapangan di fasilitas kesehatan untuk memberikan pengalaman industri yang sesungguhnya.',
        ];
        return $data[$nama] ?? 'Jurusan ini menerapkan metode pembelajaran yang mengedepankan praktik langsung. Materi yang dipelajari di kelas diaplikasikan melalui kegiatan praktik di laboratorium maupun lapangan. Siswa mendapatkan pengalaman berharga melalui proyek berbasis tim, Praktik Kerja Lapangan (PKL), kunjungan industri, serta pelatihan dan sertifikasi. Dengan pendekatan ini, lulusan diharapkan memiliki kompetensi, karakter, dan kesiapan kerja yang sesuai dengan kebutuhan dunia usaha dan dunia industri.';
    }
}