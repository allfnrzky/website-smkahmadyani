-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2026 pada 09.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk_ahyan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `slug`, `konten`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'PPDB 2026', 'ppdb-2026', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. Dalam kursus ini saya menghargai tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ini selalu merupakan kelas yang tepat untuk taciti sosiosqu. Ad litora torquent per conubia nostra inceptos himenaeos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. Dalam kursus ini saya menghargai tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ini selalu merupakan kelas yang tepat untuk taciti sosiosqu. Ad litora torquent per conubia nostra inceptos himenaeos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. Dalam kursus ini saya menghargai tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ini selalu merupakan kelas yang tepat untuk taciti sosiosqu. Ad litora torquent per conubia nostra inceptos himenaeos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. Dalam kursus ini saya menghargai tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ini selalu merupakan kelas yang tepat untuk taciti sosiosqu. Ad litora torquent per conubia nostra inceptos himenaeos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. Dalam kursus ini saya menghargai tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ini selalu merupakan kelas yang tepat untuk taciti sosiosqu. Ad litora torquent per conubia nostra inceptos himenaeos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. Dalam kursus ini saya menghargai tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ini selalu merupakan kelas yang tepat untuk taciti sosiosqu. Ad litora torquent per conubia nostra inceptos himenaeos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. Dalam kursus ini saya menghargai tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ini selalu merupakan kelas yang tepat untuk taciti sosiosqu. Ad litora torquent per conubia nostra inceptos himenaeos.', 'berita/mwobSxDlG0b4s25pUeHgJJ8ZaC7Hqd2KF9hEyfSY.png', 1, '2026-06-30 19:36:15', '2026-07-03 20:43:15'),
(2, 'DAY 1 MPLS', 'day-1-mpls', 'Lorem ipsum dolor sit amet, consectetur adipiscing elite, sed do eiusmod tempor incididunt ut labore dan dolore magna aliqua. Dengan sedikit racun, yang merupakan latihan keras yang tidak bisa dilakukan oleh orang lain sebagai konsekuensinya. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Kecuali sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elite, sed do eiusmod tempor incididunt ut labore dan dolore magna aliqua. Dengan sedikit racun, yang merupakan latihan keras yang tidak bisa dilakukan oleh orang lain sebagai konsekuensinya. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Kecuali sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elite, sed do eiusmod tempor incididunt ut labore dan dolore magna aliqua. Dengan sedikit racun, yang merupakan latihan keras yang tidak bisa dilakukan oleh orang lain sebagai konsekuensinya. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Kecuali sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'berita/eT4kWoUbZ410QLqTUGzWUyG8rq5Wsl6ku3D5Gmx2.jpg', 1, '2026-07-02 04:54:02', '2026-07-03 22:34:35'),
(3, 'PRAKTIKUM 12 LPS', 'praktikum-12-lps', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'berita/jvNk3qQj6JY5gWwIRTassIRv2bQu7BTUSZ81fxG2.jpg', 1, '2026-07-03 21:20:47', '2026-07-03 22:35:22'),
(4, 'PELEPASAN SISWA KELAS 12', 'pelepasan-siswa-kelas-12', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'berita/MHcJ6EtdADNK18wBgYwTp4bKA1C4R8xMOM1AWMFn.jpg', 1, '2026-07-03 23:19:10', '2026-07-12 18:21:27'),
(6, 'SMK Ahmad Yani Jabung Menjadi Paskibra untuk Upacara 17 Agustus di Kecamatan Jabung', 'smk-ahmad-yani-jabung-menjadi-paskibra-untuk-upacara-17-agustus-di-kecamatan-jabung', '<p>JABUNG, 13 Juli 2026 – Menjelang peringatan Hari Kemerdekaan Republik Indonesia ke-81, siswa-siswi SMK Ahmad Yani Jabung kembali menorehkan prestasi yang membanggakan. Berdasarkan hasil seleksi tingkat kecamatan, delegasi SMK Ahmad Yani secara resmi ditunjuk untuk mengemban tugas sebagai Pasukan Pengibar Bendera (Paskibra) utama pada Upacara Peringatan 17 Agustus 2026 yang akan dipusatkan di Lapangan Kecamatan Jabung.</p><p>Terpilihnya perwakilan SMK Ahmad Yani merupakan hasil dari proses seleksi ketat yang menguji ketahanan fisik, postur tubuh, kedisiplinan, serta kemampuan Peraturan Baris Berbaris (PBB). Saat ini, tim Paskibra sekolah telah memasuki fase pemusatan latihan intensif yang dikomandoi langsung oleh instruktur dari Koramil dan Polsek Jabung. Porsi latihan tidak hanya difokuskan pada sinkronisasi gerakan fisik, melainkan juga pembentukan mental dan karakter kepemimpinan.</p><p>Pihak manajemen sekolah menegaskan bahwa penunjukan ini bukan sekadar rutinitas partisipatif, melainkan representasi dari keberhasilan pembinaan karakter siswa di lingkungan SMK Ahmad Yani. Seluruh elemen institusi diinstruksikan untuk memberikan dukungan penuh kepada para siswa yang terpilih, dengan target eksekusi pengibaran dan penurunan bendera merah putih dapat terlaksana secara sempurna tanpa celah pada hari puncak peringatan.</p>', 'berita/NHCUR6Chi62warP3czZtnm4wJpB6T8GrbC0bVir5.jpg', 1, '2026-07-12 23:32:19', '2026-07-12 23:32:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_expired_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `jurusan_id`, `token`, `token_expired_at`, `created_at`, `updated_at`) VALUES
(1, 'X TKJ', 2, 'USF7RP', '2026-08-03 04:23:24', '2026-06-24 23:39:20', '2026-07-03 21:23:24'),
(2, 'XI LPS', 3, 'DC0QER', '2026-07-08 02:47:31', '2026-06-30 19:47:31', '2026-06-30 19:47:31'),
(3, 'XI BD', 1, 'OCWHUZ', '2026-08-12 01:35:46', '2026-07-04 00:02:38', '2026-07-12 18:35:46'),
(4, 'XI TKJ', 2, 'SNEHHS', '2026-08-04 03:54:54', '2026-07-27 20:54:54', '2026-07-27 20:54:54'),
(5, 'XII TKJ', 2, 'IWSIA3', '2026-08-07 03:15:26', '2026-07-30 20:15:26', '2026-07-30 20:15:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `kelas_id`, `guru_id`, `nama`, `created_at`, `updated_at`) VALUES
(5, 1, 12, 'Matematika', '2026-07-04 00:11:10', '2026-07-04 00:11:10'),
(6, 1, 12, 'IPS', '2026-07-04 00:12:10', '2026-07-04 00:12:10'),
(7, 1, 14, 'Paket Program Aplikasi', '2026-07-08 08:52:06', '2026-07-08 08:52:06'),
(8, 1, 14, 'Dasar Komputer', '2026-07-08 08:52:22', '2026-07-08 08:52:22'),
(9, 1, 14, 'Jaringan Dasar', '2026-07-08 08:52:53', '2026-07-08 08:52:53'),
(10, 4, 26, 'matematika', '2026-07-27 20:59:04', '2026-07-27 20:59:04'),
(11, 4, 26, 'matematika', '2026-07-27 20:59:06', '2026-07-27 20:59:06'),
(12, 4, 26, 'ips', '2026-07-27 20:59:52', '2026-07-27 20:59:52'),
(13, 3, 23, 'matematika', '2026-07-27 21:30:31', '2026-07-27 21:30:31'),
(14, 5, 31, 'IPAS', '2026-07-30 20:35:49', '2026-07-30 20:35:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pertemuan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `mata_pelajaran_id`, `judul`, `konten`, `file_path`, `created_at`, `updated_at`, `pertemuan_id`) VALUES
(2, 5, 'Pertemuan 1 - Fungsi', NULL, 'materi/84bST4N9QAD4w55o9f7QuyfpAXGmvjDjhaRA329M.pdf', '2026-07-08 08:40:07', '2026-07-08 08:40:07', 2),
(3, 5, 'Pertemuan 2 - Peluang', NULL, 'materi/AiDCjyV6LZ1XMI50mqBzGY41HKdH05E2PCbTjRig.pdf', '2026-07-08 08:43:25', '2026-07-08 08:43:25', 3),
(4, 7, 'oiuytr', NULL, 'materi/xnAYSoKgDFT2BomT91RG8h4nN802SjhoyRHCIZZE.png', '2026-07-08 23:37:56', '2026-07-08 23:37:56', 4),
(5, 7, 'ujhm', NULL, 'materi/BWUCu1zQXhHFB7sDXGEUkqAy9pDq6b26V0NNMvQN.png', '2026-07-08 23:38:29', '2026-07-08 23:38:29', 5),
(6, 7, 'Pertemuan 1', NULL, NULL, '2026-07-12 21:01:12', '2026-07-12 21:01:12', NULL),
(7, 11, 'pertemuan 1', NULL, 'materi/ROPRfLurDm9k8UZUfPQogsb4mHXqJ31ztXHdPTQv.docx', '2026-07-27 21:05:04', '2026-07-27 21:05:04', 7),
(8, 14, 'Pertemuan 1', NULL, 'materi/JRIvHXCOkUkp9xMOLGAP8dfuqT0rajyPAv1TVzMg.png', '2026-07-30 20:36:28', '2026-07-30 20:36:28', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_24_022742_create_program_keahlians_table', 1),
(5, '2026_04_24_022749_create_beritas_table', 1),
(6, '2026_04_24_022758_create_pendaftarans_table', 1),
(7, '2026_04_26_053425_add_jurusan_diterima_to_pendaftarans_table', 1),
(8, '2026_04_28_154219_create_lms_tables', 1),
(9, '2026_04_29_023440_add_materi_id_to_tugas_table', 1),
(10, '2026_04_29_030511_create_pertemuans_table', 1),
(11, '2026_04_29_034130_add_deskripsi_to_pertemuans_table', 1),
(12, '2026_04_29_053712_create_siswa_kelas_table', 1),
(13, '2026_05_09_025119_create_pengumumen_table', 1),
(14, '2026_07_08_153215_add_cascade_delete_to_pertemuan_foreign_keys', 2),
(15, '2026_07_13_021316_add_alasan_jurusan_to_pendaftarans_table', 3),
(16, '2026_07_13_053200_add_ktp_ayah_to_pendaftarans_table', 4),
(17, '2026_07_13_054451_make_desa_ibu_kab_ibu_nullable', 5),
(18, '2026_07_28_000000_add_nip_to_users_table', 6),
(19, '2026_07_30_031933_add_kuota_to_program_keahlians_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_pendaftaran` varchar(255) NOT NULL,
  `jenis_pendaftaran` enum('baru','pindahan') NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rtrw` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email_siswa` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `status_ibu` enum('hidup','meninggal') NOT NULL,
  `hp_ibu` varchar(255) NOT NULL,
  `kerja_ibu` varchar(255) NOT NULL,
  `gaji_ibu` varchar(255) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL,
  `desa_ibu` varchar(255) DEFAULT NULL,
  `kab_ibu` varchar(255) DEFAULT NULL,
  `ktp_ibu` varchar(255) DEFAULT NULL,
  `ktp_ayah` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `status_ayah` enum('hidup','meninggal') NOT NULL,
  `hp_ayah` varchar(255) NOT NULL,
  `kerja_ayah` varchar(255) NOT NULL,
  `gaji_ayah` varchar(255) NOT NULL,
  `alamat_ayah` varchar(255) NOT NULL,
  `file_kk` varchar(255) DEFAULT NULL,
  `file_ijazah` varchar(255) DEFAULT NULL,
  `jurusan_1` bigint(20) UNSIGNED NOT NULL,
  `jurusan_2` bigint(20) UNSIGNED NOT NULL,
  `alasan_jurusan_1` text DEFAULT NULL,
  `alasan_jurusan_2` text DEFAULT NULL,
  `jurusan_diterima` bigint(20) UNSIGNED DEFAULT NULL,
  `ukuran_seragam` varchar(255) NOT NULL,
  `status` enum('proses','lulus','tidak_lulus') NOT NULL DEFAULT 'proses',
  `catatan_admin` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `user_id`, `no_pendaftaran`, `jenis_pendaftaran`, `nisn`, `asal_sekolah`, `tahun_lulus`, `nama_lengkap`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `rtrw`, `desa`, `kecamatan`, `kabupaten`, `no_hp`, `email_siswa`, `nama_ibu`, `status_ibu`, `hp_ibu`, `kerja_ibu`, `gaji_ibu`, `alamat_ibu`, `desa_ibu`, `kab_ibu`, `ktp_ibu`, `ktp_ayah`, `nama_ayah`, `status_ayah`, `hp_ayah`, `kerja_ayah`, `gaji_ayah`, `alamat_ayah`, `file_kk`, `file_ijazah`, `jurusan_1`, `jurusan_2`, `alasan_jurusan_1`, `alasan_jurusan_2`, `jurusan_diterima`, `ukuran_seragam`, `status`, `catatan_admin`, `created_at`, `updated_at`) VALUES
(1, 3, 'PMB-20260625803', 'baru', '2401981234', 'SMPN 2 JABUNG', '2026', 'SITI NURHALIZA', '45213531465211', 'MALANG', '2025-11-25', 'P', 'HSGDH', '001/002', 'JHSDSC', 'NMDSABF', 'ASJDHF', '12321312312', 'manhs@gmail.com', 'ADSLKFHSE', 'hidup', '09836879416', 'KJSHDFGHS', '< 1jt', 'KSFKJRCKJD', 'SKJBFHKSRK', 'SLRJFRSMRSF', 'C:\\xampp\\tmp\\php72DB.tmp', NULL, 'WHJEGFUIGEWKJ', 'hidup', '653298170431', 'MXCBVDSBKJC', '< 1jt', 'AKFDASHBDKSD', 'berkas/kk/OgTiaAW9wgRBFv2wmv0K7GyqzKF5HP4VNF9COfBh.png', 'berkas/ijazah/slrwuuEpLr20Y2o7Qlzx5jkkAefLc7NCz0G7AFwj.png', 1, 2, NULL, NULL, 1, 'S', 'lulus', NULL, '2026-06-24 21:45:23', '2026-06-24 21:49:33'),
(2, 5, 'PMB-20260625463', 'baru', '0049248910', 'SMPN 2 JABUNG', '2026', 'ALFIAN RIZKY SATRIA PUTRA', '45213531465211', 'MALANG', '2025-11-25', 'L', 'HSGDH', '001/002', 'JHSDSC', 'NMDSABF', 'ASJDHF', '12321312312', 'alfianrizk@gmail.com', 'ADSLKFHSE', 'hidup', '09836879416', 'KJSHDFGHS', '< 1jt', 'KSFKJRCKJD', 'SKJBFHKSRK', 'SLRJFRSMRSF', 'berkas/ktp_ibu/OetxhSlOyO5m7PxJzejEObOmsBzUgQEtR0LgPDvY.png', NULL, 'WHJEGFUIGEWKJ', 'hidup', '653298170431', 'MXCBVDSBKJC', '< 1jt', 'AKFDASHBDKSD', 'berkas/kk/zaoQQYfuivipy1KwlFrz0Y6FXsWOEbCffGnFEMh1.png', 'berkas/ijazah/CvYNIORVNfpyqtdyvgQ4BwfoQTdzCmeSfd1IrgiG.png', 3, 2, NULL, NULL, 2, 'S', 'lulus', 'halooo', '2026-06-24 22:12:31', '2026-06-24 22:18:41'),
(3, 8, 'PMB-20260701763', 'baru', '2343631', 'SMPN 1 JABUNG', '2025', 'RIZKY FATYA MAHDIYAH', '1234567898765432', 'MALANG', '2009-07-24', 'P', 'PAKIS', '004/003', 'PAKIS', 'PAKIS', 'MALANG', '0823456787', 'rizky@gmail.com', 'NUR SRI', 'hidup', '0897654321', 'IBU RUMAH TANGGA', '< 1jt', 'PAKIS', 'PAKIS', 'MALANG', 'berkas/ktp_ibu/BPEuR0jPPQtNFJKaABV89rNuEMxBIwohgRoQ15Y4.png', NULL, 'WAHYU SANTOSO', 'hidup', '0876543219', 'GURU', '< 1jt', 'PAKIS', 'berkas/kk/kWiwBAaPTZbccSaJJw0Ty5r2HcPD7lEYJDjPsH3H.png', 'berkas/ijazah/ZuZVKx2MWYVMftERkJ2kPhtykhFD3eSnHP2uOezO.png', 1, 1, NULL, NULL, 1, 'M', 'tidak_lulus', NULL, '2026-06-30 19:42:32', '2026-06-30 19:44:16'),
(4, 15, 'PMB-20260709369', 'baru', '1653681476', 'SMPN 2 JABUNG', '2026', 'AHMAD HAKIKI SAPUTRA', '35071753625231', 'MALANG', '2015-03-04', 'L', 'SLAMPAREJO', '001/002', 'SLAMPAREJO', 'JABUNG', 'MALANG', '0976351456', 'ahmad@gmail.com', 'SITI', 'hidup', '983274632954325', 'BURUH', '< 1jt', 'SLAMPAREJO', 'SLAMPAREJO', 'MALANG', 'berkas/ktp_ibu/yupVq0kVfNBNpB3miehC9qsMZxMKCoLYO3YS0tIu.png', NULL, 'NUR', 'hidup', '09187653314', 'TANI', '< 1jt', 'SLAMPAREJO', 'berkas/kk/71wbJXmNpyZlEcGMQUF0c7CEigNmJLqyk8X0vo5V.png', 'berkas/ijazah/kyVXAQ7IEe57mg2eJAEgIDspQB7l59aXkRMqMMW9.png', 2, 2, NULL, NULL, 2, 'S', 'lulus', NULL, '2026-07-08 23:33:38', '2026-07-08 23:35:03'),
(5, 17, 'PMB-20260713733', 'baru', '0004902831', 'SMPN 2 JABUNG', '2023', 'ALFIAN RIZKY', '6238943173656354', 'MALANG', '2004-03-12', 'L', 'JABUNG', '001/002', 'ARGOSARI', 'JABUNG', 'MALANG', '087839618569', 'alfrizky625@gmail.com', 'UMUL', 'hidup', '087839618569', 'KUE', '< 1jt', 'ARGOSARI', 'ARGOSARI', 'MALANG', 'berkas/ktp_ibu/2duiix2eTxWea8K0NTiigGzo5jBCpuOzMa94OiyS.png', NULL, 'ANTOK', 'hidup', '087839618569', 'SOPIR', '< 1jt', 'MALANG', 'berkas/kk/ZOcjxfHX97jWfzyLCk20LK51SSuzwBDX1rS7Rlnv.png', 'berkas/ijazah/Gze8CwcjidN8Jxsx9GnVjMqyh8lR1PFvQXmdjHzy.png', 1, 1, NULL, NULL, NULL, 'S', 'proses', NULL, '2026-07-12 18:56:59', '2026-07-12 18:56:59'),
(6, 18, 'PMB-20260713976', 'baru', '0004902831', 'SMPN 2 JABUNG', '2023', 'ALFIAN RIZKY', '6238943173656354', 'MALANG', '2004-06-08', 'L', 'JABUNG', '001/002', 'ARGOSARI', 'JABUNG', 'MALANG', '08873215682', 'alfrizky625@gmail.com', 'ALFIAN RIZKY', 'hidup', '091328746432', 'KUE', '< 1jt', 'ARGOSARI', 'ARGOSARI', 'MALANG', 'berkas/ktp_ibu/yv2eodC7tn9kijnGPcn7Po6QSRzyM248rtgOCN8p.png', NULL, 'ALFIAN RIZKY', 'hidup', '18927364242', 'SOPIR', '< 1jt', 'MALANG', 'berkas/kk/fwvUzdTuLBKDn2xA1t6w6NzOGoau8XQOQSuD6Xsn.png', 'berkas/ijazah/dEUUGa3j2L1fq99DnHeseRWMKwobWzqar70mBCb6.png', 1, 3, 'mnjadeug', 'wnfurehyfureg evtrtihjl', 3, 'L', 'lulus', NULL, '2026-07-12 19:18:38', '2026-07-12 19:21:07'),
(7, 11, 'PMB-20260713307', 'baru', '0198237453', 'SMPN 2 JABUNG', '2026', 'CAHYO KURNIAWAN', '3507170928302001', 'MALANG', '2009-08-09', 'L', 'JALAN TANJUNG SARI, DUSUN PATEGUHAN', '002/001', 'ARGOSARI', 'JABUNG', 'MALANG', '084765384721', 'kurniawancahyo98@gmail.com', 'MESENI', 'hidup', '08376436134', 'BURUH TANI', '< 1jt', 'ARGOSARI', NULL, NULL, 'berkas/ktp_ibu/61dpyTVmwGnoeiDGFAOIjHGd4ybRWOFMwi51WSlu.png', 'berkas/ktp_ayah/ZoRNGIv6VbHGN6PtsgPcApn7ejd4NoNRHjwT9Ne2.png', 'ANTO', 'hidup', '08376376412', 'SOPIR', '< 1jt', 'ARGOSARI', 'berkas/kk/1yWRhncqyaf2rpERD9e3JL904nMl4HWnHvgBzHLT.png', 'berkas/ijazah/9i3tK63kn5OpJZehOBpX57dkpPWmH8mNRjmk3qFp.png', 1, 2, 'Karena saya ingin bisa teknik marketing', 'Jika tidak diterima di bisnis digital, saya ambil tkj karena suka dengan komputer juga', 2, 'L', 'lulus', NULL, '2026-07-12 22:45:57', '2026-07-12 22:57:29'),
(8, 21, 'PMB-20260728936', 'baru', '0917432362', 'SMPN 2 JABUNG', '2025', 'ALFIAN RIZKY SATRIA PUTRA', '3507170806040002', 'MALANG', '2004-06-08', 'L', 'MALANG', '001/002', 'MALANG', 'JABUNG', 'MALANG', '087839618569', 'alfianrizky531@gmail.com', 'MARIDA', 'hidup', '09876543782', 'TANI', '< 1jt', 'ARGOSARI', NULL, NULL, 'berkas/ktp_ibu/fVXPLmNoQrdAujDP9hSGo821Y7QGGlAU8I8pQEXH.png', NULL, 'ANTO', 'hidup', '0876581932143', 'SOPIR', '< 1jt', 'MALANG', 'berkas/kk/ClI5Dn5s155Qolgp8mpg671ing82ZUx0QNL8erWM.png', 'berkas/ijazah/ONDUhxy2QQCrmWXefhCd6EEsSuHBwWFGJG7iFYeu.png', 2, 3, 'maskjdgyd', 'alkjfgsatdef', 3, 'S', 'lulus', NULL, '2026-07-27 20:46:59', '2026-07-29 20:30:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumpulan`
--

INSERT INTO `pengumpulan` (`id`, `tugas_id`, `siswa_id`, `file_path`, `nilai`, `created_at`, `updated_at`) VALUES
(2, 3, 13, 'pengumpulan/aaEVfERyQFLBul82UYoSZyWvPpb6eyiT7csf8aMm.png', 90, '2026-07-08 23:40:53', '2026-07-12 21:09:28'),
(3, 4, 22, 'pengumpulan/UVFQ2J9j9oO8m9zlEr02O8ERpHrBdRuRoPCQG0Ut.png', 100, '2026-07-27 21:06:04', '2026-07-27 21:07:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumumans`
--

CREATE TABLE `pengumumans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori` enum('penting','info','jadwal') NOT NULL DEFAULT 'info',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumumans`
--

INSERT INTO `pengumumans` (`id`, `judul`, `isi`, `kategori`, `created_at`, `updated_at`) VALUES
(5, 'Pengambilan Seragam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'info', '2026-07-03 23:55:00', '2026-07-03 23:55:00'),
(6, 'Jadwal MPLS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'jadwal', '2026-07-03 23:55:18', '2026-07-03 23:55:18'),
(7, 'Administrasi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'penting', '2026-07-03 23:55:49', '2026-07-03 23:55:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertemuans`
--

INSERT INTO `pertemuans` (`id`, `mata_pelajaran_id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 5, 'Pertemuan 1 - Fungsi', 'Pelajari modul yang saya kirimkan. Kemudian kerjakan tugas sesuai instruksi', '2026-07-08 08:40:07', '2026-07-08 08:40:07'),
(3, 5, 'Pertemuan 2 - Peluang', 'Pelajari terlebih dahulu modul yang saya kirimkan. Di pertemuan selanjutnya akan kita bahas', '2026-07-08 08:43:24', '2026-07-08 08:43:24'),
(4, 7, 'oiuytr', 'kjhg', '2026-07-08 23:37:56', '2026-07-08 23:37:56'),
(5, 7, 'ujhm', 'juhgf', '2026-07-08 23:38:29', '2026-07-08 23:38:29'),
(7, 11, 'pertemuan 1', 'jkshufe', '2026-07-27 21:05:04', '2026-07-27 21:05:04'),
(8, 14, 'Pertemuan 1', 'JDIJNEUDF', '2026-07-30 20:36:28', '2026-07-30 20:36:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_keahlians`
--

CREATE TABLE `program_keahlians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `program_keahlians`
--

INSERT INTO `program_keahlians` (`id`, `nama`, `deskripsi`, `kuota`, `created_at`, `updated_at`) VALUES
(1, 'Bisnis Digital', NULL, NULL, '2026-06-24 19:59:52', '2026-06-24 19:59:52'),
(2, 'Teknik Komputer dan Jaringan', NULL, NULL, '2026-06-24 19:59:52', '2026-06-24 23:24:56'),
(3, 'Layanan Perbankan Syariah', NULL, NULL, '2026-06-24 19:59:52', '2026-06-24 19:59:52'),
(4, 'Layanan Penunjang Kefarmasian Klinis dan Komunitas', NULL, NULL, '2026-06-24 19:59:52', '2026-06-24 19:59:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BnCFRtyttV3lUdqXkD0PYijaCZl59OThhbtnpdwi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVTZsTTlRMkxCc1JQaHFNRzJGOHVPbHZtMXB3NEpXM2ZScjh3bENueSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VyIjtzOjU6InJvdXRlIjtzOjEwOiJhZG1pbi51c2VyIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1785469259),
('DzfyDBG6m81CIJBvJnSDBwIwNcAxWBCaFD6BCPDw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVVdlb2paUHQza21jdGVMZnpoUUJmNkFXVm04MjM1aTJJOTdvMTVDMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcGRiLzgiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLnBwZGIuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1785382284),
('gjmtoBRi7S3XxKq2zDveXgm9lB8MqOeaMti6iact', 26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiczhHMVdJenZBS0NSR1FrTTNmTVQ4WW1iSU82NGhYRE1xUTZlREpCMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ndXJ1L3R1Z2FzLzQiO3M6NToicm91dGUiO3M6MTY6Imd1cnUudHVnYXMubGloYXQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNjt9', 1785213092),
('KRJ7qbO6BudDRrwABMaVmaTdmRPkshrUAjo9u7qj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUnlZUGNOVVVIN3Z4TlZYRUtEUUtvemE5ME9XVkVUTkoxeEJ4dXFPSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9rZWxhcyI7czo1OiJyb3V0ZSI7czoxNzoiYWRtaW4ua2VsYXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1785212995),
('P5re9YPCE8M6GJRVRDAy2jyuZSuMPfRDK49vPtnk', 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVFE0aHhjQjJBSGR2ZXpUNGNwRW8yd1pFcmJCVUdmdERUckkyRVZyWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZXRhay1idWt0aSI7czo1OiJyb3V0ZSI7czoxNzoic2lzd2EuY2V0YWstYnVrdGkiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyMTt9', 1785212622),
('t8ui4LkxtZ5VdUJo57LzwPy3aICYR5nMYo5BpZu2', 31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNTQ5c3ZvaUlWcFRQekF2UGlIY3JoVkgxRHBRc2lHdWFWYW9mdFMzRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ndXJ1L21hcGVsLzE0IjtzOjU6InJvdXRlIjtzOjE1OiJndXJ1Lm1hcGVsLnNob3ciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozMTt9', 1785468988),
('vt1j8w2BizZYtn91ppY0e1sJ8Bgy1JBjs8OlmokY', 29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicGZ5NXhOb25ZSXFLenk3MW5ESFRIQUhpVGZBdDNGY2VSSzNSNnRYUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rZWxhcy81IjtzOjU6InJvdXRlIjtzOjEyOiJrZWxhcy5kZXRhaWwiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyOTt9', 1785469281);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id`, `siswa_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(2, 6, 1, NULL, NULL),
(5, 10, 2, NULL, NULL),
(6, 12, 1, NULL, NULL),
(7, 12, 2, NULL, NULL),
(8, 12, 3, NULL, NULL),
(9, 13, 3, NULL, NULL),
(10, 13, 1, NULL, NULL),
(11, 14, 1, NULL, NULL),
(12, 10, 1, NULL, NULL),
(13, 22, 4, NULL, NULL),
(14, 26, 4, NULL, NULL),
(15, 23, 3, NULL, NULL),
(16, 29, 5, NULL, NULL),
(17, 31, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `materi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pertemuan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `mata_pelajaran_id`, `judul`, `deskripsi`, `deadline`, `created_at`, `updated_at`, `materi_id`, `pertemuan_id`) VALUES
(2, 5, 'Tugas - Fungsi', '1. Jika diketahui f(x) = 2x + 8 dan g(x) = 4x - 8, maka (f o g)(x) adalah?\r\n2. Diketahui f (x) = 3x + 3 dan g (x) = 2x berapa nilai dari (f o g) (2)?\r\nJika diberikan f(x) = x - 3 dan (fog)(x) = x² + 2x - 5, maka g(x)=....', '2026-07-11 22:37:00', '2026-07-08 08:40:07', '2026-07-08 08:40:07', NULL, 2),
(3, 7, 'hng', 'gtrvf', '2026-07-29 13:38:00', '2026-07-08 23:38:29', '2026-07-08 23:38:29', NULL, 5),
(4, 11, 'deea', 'aiydgsuayd', '2026-07-30 11:04:00', '2026-07-27 21:05:04', '2026-07-27 21:05:04', NULL, 7),
(5, 14, 'JSAGDU', 'EKDEIUWFC', '2026-08-01 10:36:00', '2026-07-30 20:36:28', '2026-07-30 20:36:28', NULL, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `role` varchar(255) NOT NULL DEFAULT 'siswa',
  `nip` varchar(255) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`role`, `nip`, `id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('admin', NULL, 1, 'Admin SMK', 'admin@gmail.com', NULL, '$2y$12$L77zcPk1xU.rtueY/laoaesdsqigVb.YhAPW/70/S/fdGJhDB8Fm.', NULL, '2026-06-24 19:59:52', '2026-07-04 00:28:48'),
('calon_siswa', NULL, 2, 'Ahmad Fauzi', 'ahmad@siswa.sch.id', NULL, '$2y$12$9HHzP8pgDZx5FhURe1IsEeGuhLEzxO7s3kw1Tzrmo.Is00ooSBecu', NULL, '2026-06-24 21:30:48', '2026-06-24 23:24:55'),
('calon_siswa', NULL, 3, 'Siti Nurhaliza', 'siti@siswa.sch.id', NULL, '$2y$12$r0Pf0eH5zITRLuzHioTkuu3/wcvYCMjk0BLv7DZFxh/Fk611nzpgu', NULL, '2026-06-24 21:30:48', '2026-06-24 23:24:56'),
('calon_siswa', NULL, 4, 'Budi Santoso', 'budi@siswa.sch.id', NULL, '$2y$12$18MYlzCs5GqxdNUi8F/MN.qCktsTExyfzf3kNvp8t6TRBNKx8q6AS', NULL, '2026-06-24 21:30:48', '2026-06-24 23:24:56'),
('calon_siswa', NULL, 5, 'Alfian Rizky Satria Putra', 'alfianrizk78@gmail.com', NULL, '$2y$12$0IekiaN0IGwRtkNett/p5e1mQ6pcXyMxf/SSyjXW7.dTul1IZXla2', 't56ZRmJeXW54YF4yTpnN6b6ZiWaAbkxh9UCe8BSvVKe8gIOdHGgfVvomPZXJ', '2026-06-24 22:07:23', '2026-07-04 00:58:25'),
('siswa', NULL, 6, 'rehan', 'rehan@siswa.sch.id', NULL, '$2y$12$oY23AZyPq7X/CUoLJyw1uuY5SGV4VcGpXO1wsAxTBTe8hSoBQmAVO', NULL, '2026-06-24 22:33:47', '2026-06-24 22:33:47'),
('calon_siswa', NULL, 8, 'RIZKY FATYA MAHDIYAH', 'rizky@gmail.com', NULL, '$2y$12$iJHnGcDmr88IDUJJ9uwBRuFm6fZOiWLcHJEkPEyH.KcioW1ugPne2', NULL, '2026-06-30 19:33:38', '2026-06-30 19:33:38'),
('siswa', NULL, 10, 'dian', 'dian@siswa.sch.id', NULL, '$2y$12$w0uTt45wrvUOJ/O67OviKOYmyh0CYIWtv9uG/Z.LsRHvEANXW3uby', NULL, '2026-06-30 19:51:37', '2026-06-30 19:51:37'),
('calon_siswa', NULL, 11, 'CAHYO KURNIAWAN', 'kurniawancahyo98@gmail.com', NULL, '$2y$12$iSs4yR59CSORHy1hsXnTC.rCPMwJWpMSTDlM7KQXhFc4SkjGWqybe', NULL, '2026-07-03 23:49:20', '2026-07-03 23:49:20'),
('guru', NULL, 12, 'Cahyo Nur', 'cahyo@gmail.com', NULL, '$2y$12$/zB363DGMZrkEJYjQHo0TeZQzxvPH9ECEWKvdyWvGn.VdHWoFfCY.', NULL, '2026-07-03 23:59:45', '2026-07-03 23:59:45'),
('siswa', NULL, 13, 'Alfian', 'alfian@gmail.com', NULL, '$2y$12$DMW.8Xin6oDSvxQSTjACuO2OdnIrYXtHe5NnCMc2S/1.JJn78W/0u', NULL, '2026-07-08 08:15:52', '2026-07-08 08:15:52'),
('guru', NULL, 14, 'Mei', 'mei@gmail.com', NULL, '$2y$12$rUTA6hVQqxR.9B5Bje3Unu5MlEPiI1IAv6UyCHSixmkp6e3YN06CO', NULL, '2026-07-08 08:49:45', '2026-07-08 08:49:45'),
('calon_siswa', NULL, 15, 'Ahmad Hakiki', 'ahmad@gmail.com', NULL, '$2y$12$jNoiq7VaKVVBGEC4732xUeG06YSUK4JskkiadZqNQlIff.TPNNViG', NULL, '2026-07-08 23:30:24', '2026-07-08 23:30:24'),
('siswa', NULL, 16, 'budi', 'budi@gmail.com', NULL, '$2y$12$Uoe.8lSHcSXGVyBPVhvO6ufKUF8uwiWfsMLU7riUT01Ft4Wlf2q7a', NULL, '2026-07-12 18:42:43', '2026-07-12 18:42:43'),
('calon_siswa', NULL, 17, 'Alfian Rizky', 'alfrizky625@gmail.com', NULL, '$2y$12$5wtwu8ZSY3s/wXYuYK4nYeGl8gQx/a5RTWMu4NtqUr/A5ZLlzs49q', NULL, '2026-07-12 18:54:06', '2026-07-12 18:54:06'),
('calon_siswa', NULL, 18, 'Alfian Rizky Satria Putra', 'alfian123@gmail.com', NULL, '$2y$12$Y7u/PjL6NbgF/71Q20vh7umiAUEblQ7IOGIjUK1Z1qTEBKyPyB6ky', NULL, '2026-07-12 19:15:51', '2026-07-12 19:15:51'),
('calon_siswa', NULL, 19, 'antonio arvano', 'antonio@gmail.com', NULL, '$2y$12$nMJiJrF7ha7wt1mfwrcnU.m8qc0zU6NFZQ0wHkkspIZBp2ZMOA7aO', NULL, '2026-07-12 20:06:27', '2026-07-12 20:06:27'),
('calon_siswa', NULL, 21, 'Alfian Rizky Satria Putra', 'alfianrizky531@gmail.com', NULL, '$2y$12$DJ.ZgZq4qp3hkoUoc94OqOQY5igezM5SapT9MYIN6xVI.w6ESvVCG', NULL, '2026-07-27 20:43:50', '2026-07-27 20:43:50'),
('siswa', NULL, 22, 'alfiii', 'aalfiannnnnn@gmail.com', NULL, '$2y$12$Sfub/SkttHz4y49mOf3gU.5IVkFTXk2GSdgW0KM7/7lg79WqwOsvi', NULL, '2026-07-27 20:53:35', '2026-07-27 21:04:05'),
('guru', NULL, 23, 'imron', 'imron@gmail.com', NULL, '$2y$12$sQbRFNy4zYy.7qiLAnVNBeCNW2qaRA8wxj62vqqZG7IM7WgEEx75m', NULL, '2026-07-27 20:54:04', '2026-07-27 20:54:04'),
('guru', NULL, 24, 'wahyu', 'wahyu@gmail.com', NULL, '$2y$12$4S.W4k/2OwHUGvifWyF46e7O4fLR5La4e.Mc/v8yD.PbdFYF8DHqq', NULL, '2026-07-27 20:54:04', '2026-07-27 20:54:04'),
('guru', NULL, 25, 'fatya', 'fatya@gmail.com', NULL, '$2y$12$tdcpOmosc53nKn6P3zjVReDp160UFklBrmnNDWCKQDTjD0VMO8LXy', NULL, '2026-07-27 20:54:05', '2026-07-27 20:54:05'),
('guru', '12.25.1.002', 26, 'satria', 'satria@gmail.com', NULL, '$2y$12$H6ztyyvueig3Gnblfn7/eeaFT31ztBWAHM3oc0kYB1WyQjNlsnAdG', NULL, '2026-07-27 20:54:06', '2026-07-30 20:17:45'),
('siswa', NULL, 27, 'dion', 'dion@gmail.com', NULL, '$2y$12$yEhEMvlXeU77k5Kud8SDgubVEK5.S7a8tFxTNqntI7x1DF0jwk4Ry', NULL, '2026-07-27 20:54:06', '2026-07-27 20:54:06'),
('siswa', NULL, 28, 'rudi', 'rudi@gmail.com', NULL, '$2y$12$cf4ksg4hpLXaVqv02iRutu38QfJ4xsZZybFSnzEeqA6sieSRLhUja', NULL, '2026-07-27 20:54:07', '2026-07-27 20:54:07'),
('siswa', NULL, 29, 'ambar', 'ambar@gmail.com', NULL, '$2y$12$4sOlxuEl5S0O.YmiqdIOduiKmRYdG.b2TiY8GxYpy.ohMmwK5UDVS', NULL, '2026-07-27 20:54:08', '2026-07-27 20:54:08'),
('siswa', NULL, 30, 'rendi', 'rendi@gmail.com', NULL, '$2y$12$XL5p.sXK5MRryNv1.i.07eUa2Qx5lJ0bZG7Yz8okDkC/zMdlcjyuG', NULL, '2026-07-27 20:54:08', '2026-07-27 20:54:08'),
('guru', '12.41.54.001', 31, 'WAHYUDIN', 'wahyudin@gmail.com', NULL, '$2y$12$FBPiuRA95KL4Ixmf2PHW.O8Van3Swr3xuQPjWGPC6x13qNTl7YHdC', NULL, '2026-07-30 20:17:21', '2026-07-30 20:17:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`),
  ADD KEY `beritas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_token_unique` (`token`),
  ADD KEY `kelas_jurusan_id_foreign` (`jurusan_id`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mata_pelajaran_kelas_id_foreign` (`kelas_id`),
  ADD KEY `mata_pelajaran_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_mata_pelajaran_id_foreign` (`mata_pelajaran_id`),
  ADD KEY `materi_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftarans_no_pendaftaran_unique` (`no_pendaftaran`),
  ADD KEY `pendaftarans_user_id_foreign` (`user_id`),
  ADD KEY `pendaftarans_jurusan_diterima_foreign` (`jurusan_diterima`);

--
-- Indeks untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumpulan_tugas_id_foreign` (`tugas_id`),
  ADD KEY `pengumpulan_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `pengumumans`
--
ALTER TABLE `pengumumans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuans_mata_pelajaran_id_foreign` (`mata_pelajaran_id`);

--
-- Indeks untuk tabel `program_keahlians`
--
ALTER TABLE `program_keahlians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_kelas_siswa_id_foreign` (`siswa_id`),
  ADD KEY `siswa_kelas_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_mata_pelajaran_id_foreign` (`mata_pelajaran_id`),
  ADD KEY `tugas_materi_id_foreign` (`materi_id`),
  ADD KEY `tugas_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengumumans`
--
ALTER TABLE `pengumumans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `program_keahlians`
--
ALTER TABLE `program_keahlians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD CONSTRAINT `beritas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `program_keahlians` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mata_pelajaran_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materi_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD CONSTRAINT `pendaftarans_jurusan_diterima_foreign` FOREIGN KEY (`jurusan_diterima`) REFERENCES `program_keahlians` (`id`),
  ADD CONSTRAINT `pendaftarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD CONSTRAINT `pengumpulan_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengumpulan_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD CONSTRAINT `pertemuans_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_kelas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_materi_id_foreign` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
