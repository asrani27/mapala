/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80043 (8.0.43)
 Source Host           : localhost:3306
 Source Schema         : mapala

 Target Server Type    : MySQL
 Target Server Version : 80043 (8.0.43)
 File Encoding         : 65001

 Date: 17/06/2026 21:13:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrasi
-- ----------------------------
DROP TABLE IF EXISTS `administrasi`;
CREATE TABLE `administrasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrasi_nomor_surat_unique` (`nomor_surat`),
  KEY `administrasi_user_id_foreign` (`user_id`),
  CONSTRAINT `administrasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of administrasi
-- ----------------------------
BEGIN;
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (1, '001/MAPALA/VI/2026', 'Surat Undangan', '2026-06-01', 'Undangan Rapat Bulanan', 'Undangan rapat untuk membahas program kerja bulan Juni 2026', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (2, '002/MAPALA/VI/2026', 'Surat Keterangan', '2026-06-03', 'Keterangan Aktif Organisasi', 'Surat keterangan bahwa MAPALA merupakan organisasi resmi di lingkungan kampus', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (3, '003/MAPALA/VI/2026', 'Surat Permohonan', '2026-06-05', 'Permohonan Izin Kegiatan Pendakian', 'Permohonan izin untuk kegiatan pendakian Gunung Rinjani pada tanggal 15-17 Juni 2026', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (4, '004/MAPALA/VI/2026', 'Surat Undangan', '2026-06-08', 'Undangan Pelantikan Pengurus Baru', 'Undangan pelantikan pengurus MAPALA periode 2026-2028', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (5, '005/MAPALA/VI/2026', 'Surat Pemberitahuan', '2026-06-10', 'Pemberitahuan Pendaftaran Anggota Baru', 'Pemberitahuan pembukaan pendaftaran anggota baru MAPALA semester ganjil 2026', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (6, '006/MAPALA/VI/2026', 'Surat Rekomendasi', '2026-06-12', 'Rekomendasi Kegiatan Ekspedisi', 'Rekomendasi untuk kegiatan ekspedisi pendakian Gunung Tambora', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (7, '007/MAPALA/VI/2026', 'Surat Permohonan', '2026-06-14', 'Permohonan Dana Kegiatan', 'Permohonan dana untuk kegiatan latihan rutin bulanan', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (8, '008/MAPALA/VI/2026', 'Surat Keterangan', '2026-06-15', 'Keterangan Kepengurusan', 'Keterangan daftar kepengurusan MAPALA untuk keperluan administrasi kampus', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (9, '009/MAPALA/VI/2026', 'Surat Undangan', '2026-06-18', 'Undangan Seminar Pendakian', 'Undangan seminar tentang keamanan pendakian dan penyelamatan di gunung', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `administrasi` (`id`, `nomor_surat`, `jenis_surat`, `tanggal_surat`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES (10, '010/MAPALA/VI/2026', 'Surat Pemberitahuan', '2026-06-20', 'Pemberitahuan Jadwal Latihan', 'Pemberitahuan jadwal latihan rutin setiap hari Sabtu minggu pertama', NULL, 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
COMMIT;

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Nonaktif','Alumni') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `tanggal_daftar` date NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `anggota_nim_unique` (`nim`),
  KEY `anggota_user_id_foreign` (`user_id`),
  CONSTRAINT `anggota_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of anggota
-- ----------------------------
BEGIN;
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (1, '20241001', 'Aditya Nugraha', 'Teknik Informatika', '2024', 'Jl. Merbabu No. 12, Bandung', NULL, '081234567891', 'Aktif', '2024-09-01', 2, '2026-06-14 13:17:25', '2026-06-14 13:17:25');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (2, '20241002', 'Bella Safitri', 'Biologi', '2024', 'Jl. Krakatau No. 45, Malang', NULL, '081234567892', 'Aktif', '2024-09-02', 3, '2026-06-14 13:17:25', '2026-06-14 13:17:25');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (3, '20231003', 'Candra Wirawan', 'Geografi', '2023', 'Jl. Rinjani Gg. 3, Lombok', NULL, '081234567893', 'Aktif', '2023-09-05', 4, '2026-06-14 13:17:25', '2026-06-14 13:17:25');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (4, '20231004', 'Dewi Lestari', 'Ilmu Lingkungan', '2023', 'Jl. Semeru No. 78, Yogyakarta', NULL, '081234567894', 'Aktif', '2023-09-07', 5, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (5, '20222005', 'Eko Prasetyo', 'Teknik Sipil', '2022', 'Perum Bromo Indah Blok A5, Surabaya', NULL, '081234567895', 'Aktif', '2022-09-10', 6, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (6, '20222006', 'Fitri Handayani', 'Kedokteran', '2022', 'Jl. Agung No. 23, Denpasar', NULL, '081234567896', 'Nonaktif', '2022-09-12', 7, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (7, '20212007', 'Gilang Ramadhan', 'Manajemen', '2021', 'Jl. Kerinci No. 56, Padang', NULL, '081234567897', 'Alumni', '2021-09-15', 8, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (8, '20212008', 'Hani Nurjanah', 'Pendidikan Biologi', '2021', 'Jl. Lawu No. 89, Solo', NULL, '081234567898', 'Alumni', '2021-09-18', 9, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (9, '20241009', 'Irfan Hakim', 'Teknik Mesin', '2024', 'Jl. Pangrango No. 34, Bogor', 'foto/anggota/xebUlZ7rjbB8x8bNwY8nNi2k2DoeJWID42NhycBA.png', '0812345678991', 'Aktif', '2024-09-20', 10, '2026-06-14 13:17:27', '2026-06-17 13:06:44');
INSERT INTO `anggota` (`id`, `nim`, `nama`, `jurusan`, `angkatan`, `alamat`, `foto`, `telp`, `status`, `tanggal_daftar`, `user_id`, `created_at`, `updated_at`) VALUES (10, '20231010', 'Jasmine Putri', 'Arsitektur', '2023', 'Jl. Sumbing No. 67, Semarang', NULL, '081234567800', 'Aktif', '2023-09-25', 11, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','Selesai','Batal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kegiatan_user_id_foreign` (`user_id`),
  CONSTRAINT `kegiatan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------
BEGIN;
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (1, 'Pendakian Gunung Rinjani', '2026-07-15', 'Gunung Rinjani, Lombok, NTB', 'Aditya Nugraha', 'Pendakian Gunung Rinjani dengan tujuan mencapai puncak.活动包括 sensibilisasi lingkungan dan pengamatan flora fauna.', 'foto/kegiatan/KWvKwRw4jA2rMUkYTk9pZDrpSRumql3rH3kKmbSa.png', 'Aktif', 1, '2026-06-14 13:17:27', '2026-06-17 11:40:30');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (2, 'Seminar Konservasi Alam', '2026-06-20', 'Aula Utama Universitas', 'Bella Safitri', 'Seminar tentang konservasi alam dan pelestarian lingkungan untuk mahasiswa.', NULL, 'Selesai', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (3, 'Gotong Royong Pantai', '2026-08-10', 'Pantai Kuta, Bali', 'Candra Wirawan', 'Kegiatan bersih-bersih pantai dan edukasi tentang sampah plastik kepada pengunjung.', NULL, 'Aktif', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (4, 'Pelatihan Navigasi Darat', '2026-06-25', 'Hutan Lindung', 'Dewi Lestari', 'Pelatihan navigasi menggunakan kompas dan peta untuk anggota MAPALA.', NULL, 'Selesai', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (5, 'Tree Planting Day', '2026-09-05', 'Gunung Bromo, Jawa Timur', 'Eko Prasetyo', 'Penanaman 500 pohon endemic di kawasan Gunung Bromo.', NULL, 'Aktif', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (6, 'Workshop Fotografi Alam', '2026-07-01', 'Studio Kreatif Universitas', 'Fitri Handayani', 'Workshop fotografi alam untuk dokumentasi kegiatan mountaineering.', NULL, 'Selesai', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (7, 'Rapat Koordinasi Anggota', '2026-06-18', 'Ruang Serbaguna MAPALA', 'Aditya Nugraha', 'Rapat koordinasi untuk persiapan kegiatan semester berikutnya.', NULL, 'Batal', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (8, 'Ekspedisi Sumbing', '2026-08-25', 'Gunung Sumbing, Jawa Tengah', 'Gilang Ramadhan', 'Ekspedisi mountaineering ke Gunung Sumbing dengan melewati jalur via Krasak.', NULL, 'Aktif', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (9, 'Sosialisasi Safety climbing', '2026-07-10', 'Lab Olahraga Universitas', 'Hani Nurjanah', 'Sosialisasi dan simulasi safety climbing untuk pemula.', NULL, 'Selesai', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (10, 'Rapat Umum Tahunan', '2026-12-15', 'Aula Barat Universitas', 'Aditya Nugraha', 'Rapat umum tahunan MAPALA untuk evaluasi dan perencanaan tahun depan.', NULL, 'Aktif', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (11, 'Kunjungan Wisata Alam', '2026-10-20', 'Taman Nasional Bromo Tengger Semeru', 'Irfan Hakim', 'Kunjungan edukasi ke Taman Nasional untuk study comparative flora.', NULL, 'Aktif', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `kegiatan` (`id`, `judul`, `tanggal`, `lokasi`, `penanggung_jawab`, `deskripsi`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES (12, 'Latihan Dasar Kepemimpinan', '2026-11-05', 'Camp MAPALA', 'Jasmine Putri', 'Latihan dasar kepemimpinan outdoor untuk calon pengurus baru.', NULL, 'Aktif', 1, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
COMMIT;

-- ----------------------------
-- Table structure for keuangans
-- ----------------------------
DROP TABLE IF EXISTS `keuangans`;
CREATE TABLE `keuangans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` decimal(15,2) NOT NULL DEFAULT '0.00',
  `kredit` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of keuangans
-- ----------------------------
BEGIN;
INSERT INTO `keuangans` (`id`, `tanggal`, `keterangan`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES (1, '2026-01-05', 'Pendaftaran Anggota Baru', 500000.00, 0.00, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `keuangans` (`id`, `tanggal`, `keterangan`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES (2, '2026-01-15', 'Iuran Bulanan Anggota', 1200000.00, 0.00, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `keuangans` (`id`, `tanggal`, `keterangan`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES (3, '2026-01-20', 'Sumbangan Sponsor', 2000000.00, 0.00, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `keuangans` (`id`, `tanggal`, `keterangan`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES (4, '2026-02-10', 'Pembelian Peralatan Pendakian', 0.00, 750000.00, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `keuangans` (`id`, `tanggal`, `keterangan`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES (5, '2026-02-20', 'Biaya Transportasi Kegiatan', 0.00, 350000.00, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `keuangans` (`id`, `tanggal`, `keterangan`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES (6, '2026-06-14', '567', 5000.00, 0.00, '2026-06-14 13:36:38', '2026-06-14 13:36:38');
INSERT INTO `keuangans` (`id`, `tanggal`, `keterangan`, `debit`, `kredit`, `created_at`, `updated_at`) VALUES (7, '2026-06-14', 'sdf', 0.00, 300000.00, '2026-06-14 13:39:07', '2026-06-14 13:39:07');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2026_06_14_104023_create_anggota_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2026_06_14_120000_create_pengurus_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2026_06_14_130000_create_kegiatan_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2026_06_14_130811_create_keuangans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2026_06_14_140000_add_foto_to_anggota_pengurus_kegiatan_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2026_06_14_150000_create_administrasi_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for pengurus
-- ----------------------------
DROP TABLE IF EXISTS `pengurus`;
CREATE TABLE `pengurus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint unsigned NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengurus_anggota_id_foreign` (`anggota_id`),
  CONSTRAINT `pengurus_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pengurus
-- ----------------------------
BEGIN;
INSERT INTO `pengurus` (`id`, `anggota_id`, `jabatan`, `periode`, `status`, `foto`, `created_at`, `updated_at`) VALUES (1, 1, 'Ketua Umum', '2024-2026', 'aktif', 'foto/pengurus/9TxckMjxm0xw2ouetkdvdymMgpdMsPuVMidgiuBF.png', '2026-06-14 13:17:27', '2026-06-17 11:39:45');
INSERT INTO `pengurus` (`id`, `anggota_id`, `jabatan`, `periode`, `status`, `foto`, `created_at`, `updated_at`) VALUES (2, 2, 'Sekretaris', '2024-2026', 'aktif', NULL, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `pengurus` (`id`, `anggota_id`, `jabatan`, `periode`, `status`, `foto`, `created_at`, `updated_at`) VALUES (3, 3, 'Bendahara', '2024-2026', 'aktif', NULL, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `pengurus` (`id`, `anggota_id`, `jabatan`, `periode`, `status`, `foto`, `created_at`, `updated_at`) VALUES (4, 4, 'Koordinator Divisi Pendakian', '2024-2026', 'aktif', NULL, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `pengurus` (`id`, `anggota_id`, `jabatan`, `periode`, `status`, `foto`, `created_at`, `updated_at`) VALUES (5, 5, 'Koordinator Divisi Lingkungan', '2024-2026', 'nonaktif', NULL, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Anggota') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anggota',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Administrator', 'admin', 'admin@mapala.com', NULL, '$2y$12$mMJoSKxg0V.Sg6p4JE.uwuXsQN0herJK1MlnCdRnXNMUFTcEiv4hW', 'Admin', NULL, '2026-06-14 13:17:25', '2026-06-14 13:17:25');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'Aditya Nugraha', '20241001', '20241001@mapala.com', NULL, '$2y$12$8KMmC31YiUiIKf52jgKiG.SdiBMDr2pZXxbnfDi.bn8BbMv0KcWUm', 'Anggota', NULL, '2026-06-14 13:17:25', '2026-06-14 13:17:25');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (3, 'Bella Safitri', '20241002', '20241002@mapala.com', NULL, '$2y$12$KKZnZXXqXXbX78nusm97WeQT01G4H2rV15RDYmHUAZl2UGqizwJfO', 'Anggota', NULL, '2026-06-14 13:17:25', '2026-06-14 13:17:25');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (4, 'Candra Wirawan', '20231003', '20231003@mapala.com', NULL, '$2y$12$eiKlYjZmJ6xvtXrNd4cv/O5gnlU/OmdIy5d5BnNvhmJHqizvXqYqy', 'Anggota', NULL, '2026-06-14 13:17:25', '2026-06-14 13:17:25');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (5, 'Dewi Lestari', '20231004', '20231004@mapala.com', NULL, '$2y$12$kHkLUqOBMnGSdUgqO/XDs.K9Th0zm8fM64kIOqG9GktDfL62Uy1xW', 'Anggota', NULL, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (6, 'Eko Prasetyo', '20222005', '20222005@mapala.com', NULL, '$2y$12$kG9/4HA7PsHenid1u.OuEu3dofTKNPUbGRFpQIeW3VnDpVNqQ17gK', 'Anggota', NULL, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (7, 'Fitri Handayani', '20222006', '20222006@mapala.com', NULL, '$2y$12$KiQAFPanMAabUFYX/4UGjOE12tTH2cR.vmrCpVKs9Y8/gQpndBdBC', 'Anggota', NULL, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (8, 'Gilang Ramadhan', '20212007', '20212007@mapala.com', NULL, '$2y$12$b0LtxBkhUdWvKtreuNjcH.kHsgPYxzCtk.veYrIzjJB3t4VvsPc.S', 'Anggota', NULL, '2026-06-14 13:17:26', '2026-06-14 13:17:26');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (9, 'Hani Nurjanah', '20212008', '20212008@mapala.com', NULL, '$2y$12$GJTeMoCp2W2vr7qWEvRzLOso5gUQCVUP37oe0Z0ReEotDChRzrQse', 'Anggota', NULL, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (10, 'Irfan Hakim', '20241009', '20241009@mapala.com', NULL, '$2y$12$gDaoEzEI0chRpBifNM78aeeC6eDuvjcj7apvx7XuVAoSSxgXRqHVy', 'Anggota', NULL, '2026-06-14 13:17:27', '2026-06-17 12:56:16');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (11, 'Jasmine Putri', '20231010', '20231010@mapala.com', NULL, '$2y$12$hIwALjoCXqJdNF25Ekrq5.Dvq.sNL1G6YKSM1a6Zr4ucKt8jka.e2', 'Anggota', NULL, '2026-06-14 13:17:27', '2026-06-14 13:17:27');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
