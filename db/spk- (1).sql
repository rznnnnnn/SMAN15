-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2025 pada 16.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftra_ekskul`
--

CREATE TABLE `daftra_ekskul` (
  `ekstrakurikuler` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_ekskul` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `daftra_ekskul`
--

INSERT INTO `daftra_ekskul` (`ekstrakurikuler`, `deskripsi`, `id_ekskul`) VALUES
('ROHIS (Rohani Islam)', 'Kegiatan yang bertujuan memperdalam pengetahuan dan praktik keagamaan Islam, memperkuat ukhuwah Islamiyah, serta membentuk karakter religius siswa.', 6),
('PASKIBRA (Pasukan Pengibar Bendera)', 'Organisasi yang melatih kedisiplinan, ketangkasan, dan kemampuan pengibaran bendera dalam upacara resmi, serta memupuk jiwa patriotisme.', 7),
('PMR (Palang Merah Remaja)', 'Ekstrakurikuler yang fokus pada pendidikan dan pelatihan pertolongan pertama, kesehatan masyarakat, serta kegiatan sosial kemanusiaan.', 8),
('PRAMUKA', 'Gerakan kepanduan yang mengajarkan keterampilan bertahan hidup, kepemimpinan, serta pengembangan karakter melalui kegiatan alam dan sosial.', 9),
('KABAR 15', 'Media informasi sekolah yang dikelola oleh siswa, bertujuan mengembangkan kemampuan jurnalistik, komunikasi, dan penyebaran informasi positif di lingkungan sekolah.', 10),
('KIR (Karya Ilmiah Remaja)', 'Kelompok yang mendorong siswa melakukan penelitian ilmiah, mengembangkan kreativitas dan pemikiran kritis dalam bidang sains dan teknologi.', 11),
('JAPANESE CLUB', 'Klub yang mengajarkan bahasa dan budaya Jepang, meningkatkan pemahaman lintas budaya, serta memperluas wawasan global siswa.', 12),
('OSIS (Organisasi Siswa Intra Sekolah)', 'Organisasi resmi siswa yang berperan dalam pengembangan kepemimpinan, organisasi, serta penyelenggaraan berbagai kegiatan sekolah.', 13),
('BASKET', 'Ekstrakurikuler olahraga bola basket yang meningkatkan kebugaran, kerjasama tim, dan teknik permainan bola basket.', 14),
('BADMINTON (Bulutangkis)', 'Kegiatan olahraga bulutangkis yang melatih kecepatan, ketangkasan, serta strategi permainan.', 15),
('VOLI (Volleyball)', 'Ekstrakurikuler bola voli yang mengembangkan kekuatan fisik, koordinasi, dan sportivitas melalui latihan dan pertandingan.', 16),
('SEPAK BOLA', 'Kegiatan olahraga sepak bola yang mengasah teknik dasar, kerja sama tim, dan daya tahan fisik siswa.', 17),
('FUTSAL', 'Variasi sepak bola dalam lapangan yang lebih kecil, mengutamakan kecepatan, kelincahan, dan strategi permainan.', 18),
('SENI SUARA', 'Kegiatan pengembangan kemampuan vokal dan teknik bernyanyi, serta apresiasi musik dan pertunjukan seni suara.', 19),
('TARI SAMAN', 'Seni tari tradisional khas Aceh yang melibatkan gerakan cepat dan kompak, melatih kekompakan dan budaya lokal.', 20),
('TARI LENGGANG CISADANE', 'Tari tradisional yang merepresentasikan budaya masyarakat sekitar Cisadane, mengasah kepekaan seni dan pelestarian warisan budaya.', 21),
('TEATER', 'Ekstrakurikuler seni pertunjukan yang mengembangkan kemampuan akting, ekspresi kreatif, serta penguasaan teknik drama.', 22),
('TAEKWONDO', 'Olahraga bela diri asal Korea yang mengajarkan teknik bertahan dan menyerang, disiplin, serta meningkatkan kebugaran jasmani.', 23),
('CANDA BIRAWA', 'Latihan bela diri khas yang menekankan pengembangan kemampuan fisik, mental, dan disiplin siswa.', 24),
('BELA DIRI MATAHARI', 'Latihan bela diri khas yang menekankan pengembangan kemampuan fisik, mental, dan disiplin siswa.', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `keterangan`) VALUES
(21, 'Minat', 'Menilai ketertarikan siswa pada berbagai bidang ekstrakurikuler'),
(22, 'Kemampuan', 'Menilai kemampuan siswa dalam bidang terkait ekstrakurikuler\r\n'),
(23, 'Waktu', 'Menilai ketersediaan waktu siswa untuk mengikuti ekstrakurikuler'),
(24, 'Motivasi', 'Menilai motivasi siswa mengikuti ekstrakurikuler (pengembangan diri, prestasi, sosial)'),
(25, 'Karakteristik', 'Menilai sifat dan karakter siswa seperti kedisiplinan, kepemimpinan, komunikasi, kreativitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_bobot_gap`
--

CREATE TABLE `nilai_bobot_gap` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `students_id` int(11) NOT NULL,
  `bobot_rohis` float(6,2) DEFAULT NULL,
  `bobot_paskibra` float(6,2) DEFAULT NULL,
  `bobot_pmr` float(6,2) DEFAULT NULL,
  `bobot_pramuka` float(6,2) DEFAULT NULL,
  `bobot_kabar_15` float(6,2) DEFAULT NULL,
  `bobot_kir` float(6,2) DEFAULT NULL,
  `bobot_japanese_club` float(6,2) DEFAULT NULL,
  `bobot_osis` float(6,2) DEFAULT NULL,
  `bobot_basket` float(6,2) DEFAULT NULL,
  `bobot_badminton` float(6,2) DEFAULT NULL,
  `bobot_voli` float(6,2) DEFAULT NULL,
  `bobot_sepak_bola` float(6,2) DEFAULT NULL,
  `bobot_futsal` float(6,2) DEFAULT NULL,
  `bobot_seni_suara` float(6,2) DEFAULT NULL,
  `bobot_tari_saman` float(6,2) DEFAULT NULL,
  `bobot_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `bobot_teater` float(6,2) DEFAULT NULL,
  `bobot_taekwondo` float(6,2) DEFAULT NULL,
  `bobot_canda_birawa` float(6,2) DEFAULT NULL,
  `bobot_bela_diri_matahari` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_bobot_gap`
--

INSERT INTO `nilai_bobot_gap` (`id`, `kode`, `students_id`, `bobot_rohis`, `bobot_paskibra`, `bobot_pmr`, `bobot_pramuka`, `bobot_kabar_15`, `bobot_kir`, `bobot_japanese_club`, `bobot_osis`, `bobot_basket`, `bobot_badminton`, `bobot_voli`, `bobot_sepak_bola`, `bobot_futsal`, `bobot_seni_suara`, `bobot_tari_saman`, `bobot_tari_lenggang_cisadane`, `bobot_teater`, `bobot_taekwondo`, `bobot_canda_birawa`, `bobot_bela_diri_matahari`) VALUES
(1, 'C1', 165, 5.00, 2.50, 4.50, 4.50, 2.50, 2.50, 2.50, 4.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50),
(2, 'C2', 165, 3.50, 3.50, 3.50, 4.50, 4.50, 5.00, 4.50, 4.50, 3.50, 2.50, 2.50, 4.50, 3.50, 4.50, 4.50, 4.50, 4.50, 2.50, 3.50, 2.50),
(3, 'C3', 165, 3.50, 3.50, 3.50, 4.50, 4.50, 4.50, 5.00, 4.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 4.50, 4.50, 5.00, 3.50, 3.50, 3.50),
(4, 'C4', 165, 4.50, 5.00, 4.50, 5.00, 3.50, 3.50, 3.50, 5.00, 4.50, 4.50, 4.50, 5.00, 5.00, 3.50, 3.50, 3.50, 3.50, 5.00, 5.00, 5.00),
(5, 'C5', 165, 4.00, 3.00, 4.00, 3.00, 4.00, 4.00, 4.00, 2.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 4.00),
(6, 'C6', 165, 5.00, 4.50, 4.00, 5.00, 5.00, 4.50, 4.50, 4.00, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 5.00, 4.50, 4.50, 4.50),
(7, 'C7', 165, 5.00, 4.00, 5.00, 4.00, 4.00, 3.00, 4.00, 5.00, 3.00, 3.00, 3.00, 3.00, 3.00, 5.00, 5.00, 5.00, 5.00, 3.00, 3.00, 3.00),
(8, 'C8', 165, 4.50, 5.00, 4.50, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.50, 4.50, 4.50, 5.00, 5.00, 5.00),
(9, 'C9', 165, 3.50, 4.50, 3.50, 3.50, 4.50, 3.50, 3.50, 4.50, 4.50, 4.50, 4.50, 5.00, 5.00, 3.50, 3.50, 3.50, 3.50, 4.50, 4.50, 4.50),
(10, 'C10', 165, 2.50, 2.50, 4.50, 3.50, 5.00, 5.00, 4.50, 4.50, 3.50, 3.50, 3.50, 3.50, 3.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50, 2.50),
(11, 'C11', 165, 3.50, 5.00, 4.50, 4.50, 3.50, 2.50, 2.50, 4.50, 5.00, 4.50, 5.00, 5.00, 5.00, 2.50, 4.50, 4.50, 4.50, 2.50, 2.50, 2.50),
(12, 'C12', 165, 3.50, 5.00, 4.50, 5.00, 3.50, 4.50, 3.50, 5.00, 4.50, 4.50, 4.50, 4.50, 4.50, 2.50, 3.50, 3.50, 4.50, 4.50, 4.50, 4.50),
(13, 'C13', 165, 4.50, 4.50, 4.50, 4.50, 5.00, 4.00, 4.50, 4.00, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 5.00, 4.50, 4.50, 4.50),
(14, 'C14', 165, 4.50, 5.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 3.50, 3.50, 3.50, 4.00, 4.50, 4.50, 4.50),
(15, 'C15', 165, 2.50, 5.00, 3.50, 4.50, 2.50, 2.50, 2.50, 3.50, 4.00, 5.00, 4.00, 4.00, 4.00, 2.50, 2.50, 2.50, 2.50, 4.00, 4.00, 4.00),
(16, 'C16', 165, 1.50, 1.50, 1.50, 1.50, 3.50, 3.50, 2.50, 3.50, 1.50, 1.50, 1.50, 1.50, 1.50, 3.50, 2.50, 2.50, 3.50, 1.50, 1.50, 1.50),
(17, 'C17', 165, 3.50, 2.50, 4.50, 3.50, 4.50, 4.50, 2.50, 5.00, 3.50, 3.50, 3.50, 3.50, 3.50, 2.50, 2.50, 2.50, 2.50, 3.50, 3.50, 3.50),
(18, 'C18', 165, 1.50, 1.50, 3.50, 3.50, 3.50, 5.00, 4.50, 4.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50),
(19, 'C19', 165, 3.50, 4.00, 4.50, 5.00, 3.50, 3.50, 3.50, 3.50, 3.00, 3.00, 3.00, 3.00, 3.00, 3.50, 3.50, 3.50, 3.50, 3.00, 3.00, 3.00),
(20, 'C20', 165, 3.50, 2.50, 2.50, 3.50, 2.50, 2.50, 3.50, 4.50, 2.50, 2.50, 2.50, 2.50, 2.50, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 5.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_gap`
--

CREATE TABLE `nilai_gap` (
  `id` int(11) NOT NULL,
  `gap` float NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_gap`
--

INSERT INTO `nilai_gap` (`id`, `gap`, `bobot`) VALUES
(3, 0, 5),
(9, 1, 4.5),
(10, -1, 4),
(11, 2, 3.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_murni`
--

CREATE TABLE `nilai_murni` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `minat_bidang_seni` float(6,2) DEFAULT NULL,
  `minat_bidang_olahraga` float(6,2) DEFAULT NULL,
  `minat_bidang_akademik` float(6,2) DEFAULT NULL,
  `minat_bidang_sosial` float(6,2) DEFAULT NULL,
  `minat_bidang_teknologi` float(6,2) DEFAULT NULL,
  `kemampuan_fisik` float(6,2) DEFAULT NULL,
  `kemampuan_pemecahan_masalah` float(6,2) DEFAULT NULL,
  `kemampuan_berpikir_kritis` float(6,2) DEFAULT NULL,
  `kemampuan_manajemen_waktu` float(6,2) DEFAULT NULL,
  `kemampuan_kerja_sama_tim` float(6,2) DEFAULT NULL,
  `kemampuan_teknologi` float(6,2) DEFAULT NULL,
  `waktu_tersedia_per_minggu` float(6,2) DEFAULT NULL,
  `motivasi_pengembangan_diri` float(6,2) DEFAULT NULL,
  `motivasi_prestasi_kompetitif` float(6,2) DEFAULT NULL,
  `motivasi_sosial` float(6,2) DEFAULT NULL,
  `kepemimpinan` float(6,2) DEFAULT NULL,
  `kedisiplinan` float(6,2) DEFAULT NULL,
  `komunikasi` float(6,2) DEFAULT NULL,
  `kreativitas` float(6,2) DEFAULT NULL,
  `minat_bidang_keagamaan` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_murni`
--

INSERT INTO `nilai_murni` (`id`, `students_id`, `minat_bidang_seni`, `minat_bidang_olahraga`, `minat_bidang_akademik`, `minat_bidang_sosial`, `minat_bidang_teknologi`, `kemampuan_fisik`, `kemampuan_pemecahan_masalah`, `kemampuan_berpikir_kritis`, `kemampuan_manajemen_waktu`, `kemampuan_kerja_sama_tim`, `kemampuan_teknologi`, `waktu_tersedia_per_minggu`, `motivasi_pengembangan_diri`, `motivasi_prestasi_kompetitif`, `motivasi_sosial`, `kepemimpinan`, `kedisiplinan`, `komunikasi`, `kreativitas`, `minat_bidang_keagamaan`) VALUES
(35, 57, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 4.00),
(36, 58, 3.00, 5.00, 3.00, 4.00, 4.00, 5.00, 5.00, 3.00, 3.00, 4.00, 5.00, 5.00, 2.00, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 2.00),
(37, 59, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 4.00, 3.00, 5.00, 5.00, 5.00),
(38, 60, 4.00, 3.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00),
(39, 61, 5.00, 4.00, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 2.00, 2.00, 5.00, 4.00, 4.00, 5.00, 5.00),
(40, 62, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 5.00, 3.00, 4.00, 5.00, 4.00, 4.00, 5.00, 4.00, 3.00, 3.00, 5.00, 4.00, 4.00, 4.00),
(41, 63, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 4.00, 4.00),
(42, 64, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 3.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00),
(43, 65, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 3.00, 4.00),
(58, 68, 3.00, 2.00, 4.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 4.00, 3.00, 3.00, 4.00),
(59, 69, 3.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 3.00, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 2.00, 5.00, 4.00),
(60, 70, 2.00, 5.00, 5.00, 3.00, 2.00, 5.00, 5.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 3.00, 2.00, 5.00, 4.00, 3.00, 3.00, 3.00),
(62, 72, 3.00, 5.00, 4.00, 4.00, 3.00, 4.00, 5.00, 3.00, 5.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 3.00),
(66, 73, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 3.00, 4.00, 5.00, 3.00, 5.00, 4.00, 3.00, 3.00, 3.00, 5.00, 4.00, 4.00, 3.00, 3.00),
(67, 71, 5.00, 4.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 5.00, 3.00, 5.00, 3.00, 4.00, 4.00, 5.00, 5.00),
(68, 74, 4.00, 5.00, 5.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 4.00, 5.00, 3.00),
(69, 75, 4.00, 5.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 5.00, 4.00, 2.00),
(70, 76, 4.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 1.00, 3.00, 5.00, 5.00, 3.00, 5.00),
(80, 80, 4.00, 5.00, 5.00, 2.00, 4.00, 3.00, 5.00, 5.00, 5.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00),
(81, 81, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 3.00, 5.00, 4.00, 5.00),
(85, 85, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 3.00, 3.00, 5.00, 4.00, 3.00, 3.00, 5.00, 4.00, 3.00, 5.00, 3.00, 3.00, 5.00),
(86, 86, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 3.00, 3.00, 5.00, 4.00, 3.00, 3.00, 5.00, 4.00, 3.00, 5.00, 3.00, 3.00, 5.00),
(87, 87, 3.00, 5.00, 5.00, 5.00, 4.00, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 2.00),
(88, 88, 3.00, 5.00, 5.00, 5.00, 4.00, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 2.00),
(89, 89, 3.00, 4.00, 4.00, 4.00, 2.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 3.00, 4.00, 5.00),
(90, 90, 1.00, 5.00, 5.00, 3.00, 5.00, 3.00, 3.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 3.00, 5.00, 5.00, 5.00, 3.00),
(91, 91, 1.00, 5.00, 5.00, 3.00, 5.00, 3.00, 3.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 3.00, 5.00, 5.00, 5.00, 3.00),
(93, 94, 2.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 3.00, 3.00, 5.00, 5.00),
(94, 95, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00),
(95, 96, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00),
(97, 98, 2.00, 5.00, 4.00, 2.00, 4.00, 4.00, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 3.00, 3.00, 5.00, 5.00, 3.00, 3.00, 5.00, 5.00),
(98, 99, 3.00, 5.00, 3.00, 4.00, 4.00, 3.00, 5.00, 4.00, 2.00, 5.00, 5.00, 5.00, 3.00, 5.00, 5.00, 2.00, 2.00, 5.00, 4.00, 4.00),
(99, 100, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 5.00, 3.00, 5.00, 5.00, 2.00, 3.00, 5.00, 5.00, 4.00, 1.00, 4.00, 4.00, 3.00, 3.00),
(100, 101, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 5.00, 3.00, 5.00, 5.00, 2.00, 3.00, 5.00, 5.00, 4.00, 1.00, 4.00, 4.00, 3.00, 3.00),
(101, 102, 1.00, 4.00, 5.00, 4.00, 3.00, 5.00, 3.00, 5.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 3.00, 3.00),
(102, 103, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 5.00, 5.00, 3.00, 5.00, 4.00, 3.00, 3.00, 5.00, 4.00, 5.00, 3.00),
(103, 106, 5.00, 5.00, 3.00, 5.00, 4.00, 4.00, 5.00, 4.00, 4.00, 4.00, 5.00, 3.00, 5.00, 4.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(104, 107, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00, 4.00, 5.00, 2.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(105, 108, 4.00, 5.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 5.00, 4.00, 3.00, 5.00, 5.00, 5.00, 5.00, 3.00),
(106, 109, 4.00, 5.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 5.00, 4.00, 3.00, 5.00, 5.00, 5.00, 5.00, 3.00),
(107, 110, 3.00, 5.00, 4.00, 3.00, 5.00, 3.00, 2.00, 5.00, 5.00, 4.00, 4.00, 3.00, 3.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00),
(108, 111, 3.00, 5.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 5.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 5.00, 3.00, 3.00, 4.00, 5.00),
(109, 112, 3.00, 5.00, 5.00, 3.00, 3.00, 2.00, 5.00, 4.00, 4.00, 3.00, 4.00, 5.00, 3.00, 3.00, 5.00, 4.00, 2.00, 4.00, 4.00, 3.00),
(110, 113, 5.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 2.00, 4.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 2.00, 4.00),
(111, 114, 1.00, 5.00, 4.00, 5.00, 5.00, 5.00, 4.00, 2.00, 4.00, 4.00, 2.00, 4.00, 4.00, 5.00, 5.00, 5.00, 4.00, 3.00, 3.00, 2.00),
(112, 115, 4.00, 4.00, 4.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 5.00, 4.00, 4.00, 4.00),
(113, 116, 3.00, 5.00, 5.00, 3.00, 3.00, 4.00, 3.00, 1.00, 5.00, 5.00, 3.00, 3.00, 2.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(114, 117, 3.00, 5.00, 5.00, 3.00, 3.00, 4.00, 3.00, 1.00, 5.00, 5.00, 3.00, 3.00, 2.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(115, 118, 3.00, 5.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 3.00, 5.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(116, 119, 4.00, 5.00, 5.00, 3.00, 3.00, 4.00, 3.00, 4.00, 3.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 4.00, 4.00),
(117, 120, 4.00, 5.00, 5.00, 3.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 5.00, 4.00),
(118, 121, 5.00, 5.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 4.00, 5.00, 4.00, 2.00, 3.00, 4.00, 5.00, 3.00, 4.00, 5.00, 3.00, 3.00),
(119, 122, 3.00, 5.00, 4.00, 4.00, 4.00, 2.00, 4.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(120, 123, 5.00, 5.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 4.00, 1.00, 3.00, 3.00, 3.00, 4.00),
(121, 124, 5.00, 5.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 4.00, 1.00, 3.00, 3.00, 3.00, 4.00),
(122, 126, 3.00, 5.00, 5.00, 5.00, 2.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 2.00, 5.00),
(123, 127, 3.00, 5.00, 5.00, 5.00, 2.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 2.00, 5.00),
(124, 128, 3.00, 5.00, 5.00, 5.00, 2.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 2.00, 5.00),
(125, 129, 5.00, 5.00, 5.00, 5.00, 4.00, 2.00, 5.00, 5.00, 3.00, 4.00, 2.00, 5.00, 5.00, 3.00, 3.00, 4.00, 5.00, 2.00, 3.00, 4.00),
(126, 130, 4.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 3.00, 3.00, 5.00, 5.00, 3.00, 2.00, 2.00, 3.00, 3.00, 4.00, 4.00, 3.00, 4.00),
(127, 131, 4.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 3.00, 3.00, 5.00, 5.00, 3.00, 2.00, 2.00, 3.00, 3.00, 4.00, 4.00, 3.00, 4.00),
(128, 132, 4.00, 5.00, 5.00, 2.00, 4.00, 4.00, 4.00, 5.00, 2.00, 5.00, 4.00, 3.00, 5.00, 2.00, 4.00, 4.00, 3.00, 3.00, 5.00, 4.00),
(129, 133, 1.00, 4.00, 4.00, 2.00, 3.00, 2.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 3.00, 3.00, 5.00, 3.00, 4.00, 3.00, 3.00, 5.00),
(130, 134, 1.00, 4.00, 4.00, 2.00, 3.00, 2.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 3.00, 3.00, 5.00, 3.00, 4.00, 3.00, 3.00, 5.00),
(131, 135, 1.00, 4.00, 4.00, 2.00, 3.00, 2.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 3.00, 3.00, 5.00, 3.00, 4.00, 3.00, 3.00, 5.00),
(132, 136, 2.00, 5.00, 4.00, 5.00, 4.00, 3.00, 5.00, 3.00, 4.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 4.00, 2.00),
(133, 137, 2.00, 5.00, 5.00, 4.00, 4.00, 3.00, 3.00, 5.00, 5.00, 4.00, 2.00, 3.00, 5.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 2.00),
(134, 138, 2.00, 5.00, 5.00, 4.00, 4.00, 3.00, 3.00, 5.00, 5.00, 4.00, 2.00, 3.00, 5.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 2.00),
(135, 138, 3.00, 5.00, 5.00, 3.00, 3.00, 2.00, 2.00, 5.00, 5.00, 3.00, 1.00, 2.00, 2.00, 2.00, 5.00, 4.00, 3.00, 2.00, 3.00, 4.00),
(136, 139, 3.00, 5.00, 5.00, 4.00, 5.00, 1.00, 3.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 3.00, 5.00, 5.00, 3.00, 4.00, 4.00, 4.00),
(137, 141, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 2.00, 4.00, 2.00, 4.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 5.00),
(138, 142, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 2.00, 4.00, 2.00, 4.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 5.00),
(139, 143, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 2.00, 4.00, 2.00, 4.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 5.00),
(140, 144, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 2.00, 2.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(141, 145, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 2.00, 2.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(142, 146, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 2.00, 2.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(143, 147, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(144, 148, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(145, 149, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(146, 150, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(147, 151, 4.00, 5.00, 4.00, 4.00, 4.00, 2.00, 3.00, 3.00, 3.00, 5.00, 2.00, 3.00, 3.00, 1.00, 5.00, 4.00, 4.00, 3.00, 3.00, 3.00),
(148, 152, 2.00, 5.00, 4.00, 2.00, 5.00, 3.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 3.00, 3.00, 4.00, 5.00, 3.00, 4.00),
(149, 153, 2.00, 5.00, 4.00, 2.00, 5.00, 3.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 3.00, 3.00, 4.00, 5.00, 3.00, 4.00),
(150, 155, 3.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 2.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00),
(151, 156, 3.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 2.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00),
(152, 157, 3.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 2.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00),
(153, 159, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 5.00, 2.00, 2.00, 5.00, 4.00),
(154, 160, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 5.00, 2.00, 2.00, 5.00, 4.00),
(155, 161, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 5.00, 2.00, 2.00, 5.00, 4.00),
(156, 162, 4.00, 4.00, 1.00, 2.00, 2.00, 5.00, 4.00, 4.00, 2.00, 4.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 3.00, 5.00, 3.00, 4.00),
(158, 165, 5.00, 5.00, 5.00, 2.00, 4.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 4.00, 4.00, 5.00, 5.00, 5.00, 3.00, 4.00, 4.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_target`
--

CREATE TABLE `nilai_target` (
  `id` int(11) NOT NULL,
  `ekskul` varchar(50) NOT NULL,
  `nilai_target` int(11) NOT NULL,
  `sub_kriteria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_target`
--

INSERT INTO `nilai_target` (`id`, `ekskul`, `nilai_target`, `sub_kriteria_id`) VALUES
(58, 'ROHIS (Rohani Islam)', 4, 74),
(59, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 74),
(60, 'PMR (Palang Merah Remaja)', 3, 74),
(61, 'PRAMUKA', 3, 74),
(62, 'KABAR 15', 1, 74),
(63, 'JAPANESE CLUB', 1, 74),
(64, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 74),
(65, 'BASKET', 1, 74),
(66, 'BADMINTON (Bulutangkis)', 1, 74),
(67, 'VOLI (Volleyball)', 1, 74),
(68, 'SEPAK BOLA', 1, 74),
(69, 'FUTSAL', 1, 74),
(70, 'SENI SUARA', 1, 74),
(71, 'TARI SAMAN', 1, 74),
(72, 'TARI LENGGANG CISADANE', 1, 74),
(73, 'TEATER', 1, 74),
(74, 'TAEKWONDO', 1, 74),
(75, 'BELA DIRI MATAHARI', 1, 74),
(76, 'CANDA BIRAWA', 1, 74),
(77, 'KIR (Karya Ilmiah Remaja)', 1, 74),
(78, 'ROHIS (Rohani Islam)', 3, 73),
(79, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 73),
(80, 'PMR (Palang Merah Remaja)', 3, 73),
(81, 'PRAMUKA', 4, 73),
(82, 'KABAR 15', 4, 73),
(83, 'KIR (Karya Ilmiah Remaja)', 5, 73),
(84, 'JAPANESE CLUB', 4, 73),
(85, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 73),
(86, 'BASKET', 3, 73),
(87, 'BADMINTON (Bulutangkis)', 2, 73),
(88, 'VOLI (Volleyball)', 2, 73),
(89, 'SEPAK BOLA', 4, 73),
(90, 'FUTSAL', 3, 73),
(91, 'SENI SUARA', 4, 73),
(92, 'TARI SAMAN', 4, 73),
(93, 'TARI LENGGANG CISADANE', 4, 73),
(94, 'TEATER', 4, 73),
(95, 'TAEKWONDO', 2, 73),
(96, 'CANDA BIRAWA', 3, 73),
(97, 'BELA DIRI MATAHARI', 2, 73),
(98, 'ROHIS (Rohani Islam)', 3, 72),
(99, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 72),
(100, 'PMR (Palang Merah Remaja)', 3, 72),
(101, 'PRAMUKA', 4, 72),
(102, 'KABAR 15', 4, 72),
(103, 'KIR (Karya Ilmiah Remaja)', 4, 72),
(104, 'JAPANESE CLUB', 5, 72),
(105, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 72),
(106, 'BASKET', 3, 72),
(107, 'BADMINTON (Bulutangkis)', 3, 72),
(108, 'VOLI (Volleyball)', 3, 72),
(109, 'SEPAK BOLA', 3, 72),
(110, 'FUTSAL', 3, 72),
(111, 'SENI SUARA', 3, 72),
(112, 'TARI SAMAN', 4, 72),
(113, 'TARI LENGGANG CISADANE', 4, 72),
(114, 'TEATER', 5, 72),
(115, 'TAEKWONDO', 3, 72),
(116, 'CANDA BIRAWA', 3, 72),
(117, 'BELA DIRI MATAHARI', 3, 72),
(118, 'ROHIS (Rohani Islam)', 4, 71),
(119, 'PASKIBRA (Pasukan Pengibar Bendera)', 5, 71),
(120, 'PMR (Palang Merah Remaja)', 4, 71),
(121, 'PRAMUKA', 5, 71),
(122, 'KABAR 15', 3, 71),
(123, 'KIR (Karya Ilmiah Remaja)', 3, 71),
(124, 'JAPANESE CLUB', 3, 71),
(125, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 71),
(126, 'BASKET', 4, 71),
(127, 'BADMINTON (Bulutangkis)', 4, 71),
(128, 'VOLI (Volleyball)', 4, 71),
(129, 'SEPAK BOLA', 5, 71),
(130, 'FUTSAL', 5, 71),
(131, 'SENI SUARA', 3, 71),
(132, 'TARI SAMAN', 3, 71),
(133, 'TARI LENGGANG CISADANE', 3, 71),
(134, 'TEATER', 3, 71),
(135, 'TAEKWONDO', 5, 71),
(136, 'CANDA BIRAWA', 5, 71),
(137, 'BELA DIRI MATAHARI', 5, 71),
(138, 'ROHIS (Rohani Islam)', 3, 70),
(139, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 70),
(140, 'PMR (Palang Merah Remaja)', 3, 70),
(141, 'PRAMUKA', 4, 70),
(142, 'KABAR 15', 3, 70),
(143, 'KIR (Karya Ilmiah Remaja)', 3, 70),
(144, 'JAPANESE CLUB', 3, 70),
(145, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 70),
(146, 'BASKET', 3, 70),
(147, 'BADMINTON (Bulutangkis)', 3, 70),
(148, 'VOLI (Volleyball)', 3, 70),
(149, 'SEPAK BOLA', 3, 70),
(150, 'FUTSAL', 3, 70),
(151, 'SENI SUARA', 2, 70),
(152, 'TARI SAMAN', 2, 70),
(153, 'TARI LENGGANG CISADANE', 3, 70),
(154, 'TEATER', 4, 70),
(155, 'TAEKWONDO', 3, 70),
(156, 'CANDA BIRAWA', 3, 70),
(157, 'BELA DIRI MATAHARI', 3, 70),
(158, 'ROHIS (Rohani Islam)', 4, 69),
(159, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 69),
(160, 'PMR (Palang Merah Remaja)', 5, 69),
(161, 'PRAMUKA', 4, 69),
(162, 'KABAR 15', 4, 69),
(163, 'KIR (Karya Ilmiah Remaja)', 3, 69),
(164, 'JAPANESE CLUB', 3, 69),
(165, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 69),
(166, 'BASKET', 3, 69),
(167, 'BADMINTON (Bulutangkis)', 3, 69),
(168, 'VOLI (Volleyball)', 3, 69),
(169, 'SEPAK BOLA', 3, 69),
(170, 'FUTSAL', 3, 69),
(171, 'TARI SAMAN', 3, 69),
(172, 'TARI LENGGANG CISADANE', 3, 69),
(173, 'TEATER', 4, 69),
(174, 'TAEKWONDO', 3, 69),
(175, 'CANDA BIRAWA', 3, 69),
(176, 'BELA DIRI MATAHARI', 3, 69),
(177, 'SENI SUARA', 3, 69),
(178, 'ROHIS (Rohani Islam)', 3, 68),
(179, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 68),
(180, 'PMR (Palang Merah Remaja)', 3, 68),
(181, 'PRAMUKA', 4, 68),
(182, 'KABAR 15', 4, 68),
(183, 'KIR (Karya Ilmiah Remaja)', 5, 68),
(184, 'JAPANESE CLUB', 4, 68),
(185, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 68),
(186, 'BASKET', 5, 68),
(187, 'BADMINTON (Bulutangkis)', 5, 68),
(188, 'VOLI (Volleyball)', 5, 68),
(189, 'SEPAK BOLA', 5, 68),
(190, 'FUTSAL', 5, 68),
(191, 'SENI SUARA', 3, 68),
(192, 'TARI SAMAN', 3, 68),
(193, 'TARI LENGGANG CISADANE', 3, 68),
(194, 'TEATER', 3, 68),
(195, 'TAEKWONDO', 5, 68),
(196, 'CANDA BIRAWA', 5, 68),
(197, 'BELA DIRI MATAHARI', 5, 68),
(198, 'ROHIS (Rohani Islam)', 3, 67),
(199, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 67),
(200, 'PMR (Palang Merah Remaja)', 3, 67),
(201, 'PRAMUKA', 4, 67),
(202, 'KABAR 15', 4, 67),
(203, 'KIR (Karya Ilmiah Remaja)', 5, 67),
(204, 'JAPANESE CLUB', 5, 67),
(205, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 67),
(206, 'BASKET', 4, 67),
(207, 'BADMINTON (Bulutangkis)', 4, 67),
(208, 'VOLI (Volleyball)', 4, 67),
(209, 'SEPAK BOLA', 4, 67),
(210, 'FUTSAL', 4, 67),
(211, 'SENI SUARA', 4, 67),
(212, 'TARI SAMAN', 3, 67),
(213, 'TARI LENGGANG CISADANE', 3, 67),
(214, 'TEATER', 3, 67),
(215, 'TAEKWONDO', 4, 67),
(216, 'CANDA BIRAWA', 4, 67),
(217, 'BELA DIRI MATAHARI', 4, 67),
(218, 'ROHIS (Rohani Islam)', 3, 66),
(219, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 66),
(220, 'PMR (Palang Merah Remaja)', 3, 66),
(221, 'PRAMUKA', 3, 66),
(222, 'KABAR 15', 4, 66),
(223, 'KIR (Karya Ilmiah Remaja)', 3, 66),
(224, 'JAPANESE CLUB', 3, 66),
(225, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 66),
(226, 'BASKET', 4, 66),
(227, 'BADMINTON (Bulutangkis)', 4, 66),
(228, 'VOLI (Volleyball)', 4, 66),
(229, 'SEPAK BOLA', 5, 66),
(230, 'FUTSAL', 5, 66),
(231, 'SENI SUARA', 3, 66),
(232, 'TARI SAMAN', 3, 66),
(233, 'TARI LENGGANG CISADANE', 3, 66),
(234, 'TEATER', 3, 66),
(235, 'TAEKWONDO', 4, 66),
(236, 'CANDA BIRAWA', 4, 66),
(237, 'BELA DIRI MATAHARI', 4, 66),
(238, 'ROHIS (Rohani Islam)', 1, 65),
(239, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 65),
(240, 'PRAMUKA', 2, 65),
(241, 'KABAR 15', 4, 65),
(242, 'KIR (Karya Ilmiah Remaja)', 4, 65),
(243, 'JAPANESE CLUB', 3, 65),
(244, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 65),
(245, 'BASKET', 2, 65),
(246, 'BADMINTON (Bulutangkis)', 2, 65),
(247, 'VOLI (Volleyball)', 2, 65),
(248, 'SEPAK BOLA', 2, 65),
(249, 'FUTSAL', 2, 65),
(250, 'SENI SUARA', 1, 65),
(251, 'TARI SAMAN', 1, 65),
(252, 'TARI LENGGANG CISADANE', 1, 65),
(253, 'TEATER', 1, 65),
(254, 'TAEKWONDO', 1, 65),
(255, 'CANDA BIRAWA', 1, 65),
(256, 'BELA DIRI MATAHARI', 1, 65),
(257, 'PMR (Palang Merah Remaja)', 3, 65),
(258, 'ROHIS (Rohani Islam)', 3, 64),
(259, 'PASKIBRA (Pasukan Pengibar Bendera)', 5, 64),
(260, 'PMR (Palang Merah Remaja)', 4, 64),
(261, 'PRAMUKA', 4, 64),
(262, 'KABAR 15', 3, 64),
(263, 'KIR (Karya Ilmiah Remaja)', 2, 64),
(264, 'JAPANESE CLUB', 2, 64),
(265, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 64),
(266, 'BASKET', 5, 64),
(267, 'BADMINTON (Bulutangkis)', 4, 64),
(268, 'VOLI (Volleyball)', 5, 64),
(269, 'SEPAK BOLA', 5, 64),
(270, 'FUTSAL', 5, 64),
(271, 'SENI SUARA', 2, 64),
(272, 'TARI SAMAN', 4, 64),
(273, 'TARI LENGGANG CISADANE', 4, 64),
(274, 'TEATER', 4, 64),
(275, 'TAEKWONDO', 2, 64),
(276, 'CANDA BIRAWA', 2, 64),
(277, 'BELA DIRI MATAHARI', 2, 64),
(278, 'ROHIS (Rohani Islam)', 3, 63),
(279, 'PASKIBRA (Pasukan Pengibar Bendera)', 5, 63),
(280, 'PMR (Palang Merah Remaja)', 4, 63),
(281, 'PRAMUKA', 5, 63),
(282, 'KABAR 15', 3, 63),
(283, 'KIR (Karya Ilmiah Remaja)', 4, 63),
(284, 'JAPANESE CLUB', 3, 63),
(285, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 63),
(286, 'BASKET', 4, 63),
(287, 'BADMINTON (Bulutangkis)', 4, 63),
(288, 'VOLI (Volleyball)', 4, 63),
(289, 'SEPAK BOLA', 4, 63),
(290, 'FUTSAL', 4, 63),
(291, 'SENI SUARA', 2, 63),
(292, 'TARI SAMAN', 3, 63),
(293, 'TARI LENGGANG CISADANE', 3, 63),
(294, 'TEATER', 4, 63),
(295, 'TAEKWONDO', 4, 63),
(296, 'CANDA BIRAWA', 4, 63),
(297, 'BELA DIRI MATAHARI', 4, 63),
(298, 'ROHIS (Rohani Islam)', 3, 62),
(299, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 62),
(300, 'PMR (Palang Merah Remaja)', 3, 62),
(301, 'PRAMUKA', 3, 62),
(302, 'KABAR 15', 4, 62),
(303, 'KIR (Karya Ilmiah Remaja)', 5, 62),
(304, 'JAPANESE CLUB', 3, 62),
(305, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 62),
(306, 'BASKET', 3, 62),
(307, 'BADMINTON (Bulutangkis)', 3, 62),
(308, 'VOLI (Volleyball)', 3, 62),
(309, 'SEPAK BOLA', 3, 62),
(310, 'FUTSAL', 3, 62),
(311, 'SENI SUARA', 3, 62),
(312, 'TARI SAMAN', 3, 62),
(313, 'TARI LENGGANG CISADANE', 3, 62),
(314, 'TEATER', 4, 62),
(315, 'TAEKWONDO', 3, 62),
(316, 'CANDA BIRAWA', 3, 62),
(317, 'BELA DIRI MATAHARI', 3, 62),
(318, 'ROHIS (Rohani Islam)', 3, 61),
(319, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 61),
(320, 'PMR (Palang Merah Remaja)', 5, 61),
(321, 'PRAMUKA', 4, 61),
(322, 'KABAR 15', 4, 61),
(323, 'KIR (Karya Ilmiah Remaja)', 5, 61),
(324, 'JAPANESE CLUB', 4, 61),
(325, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 61),
(326, 'BASKET', 4, 61),
(327, 'BADMINTON (Bulutangkis)', 4, 61),
(328, 'VOLI (Volleyball)', 4, 61),
(329, 'SEPAK BOLA', 4, 61),
(330, 'SENI SUARA', 2, 61),
(331, 'TARI SAMAN', 2, 61),
(332, 'TARI LENGGANG CISADANE', 2, 61),
(333, 'TEATER', 5, 61),
(334, 'TAEKWONDO', 3, 61),
(335, 'BELA DIRI MATAHARI', 3, 61),
(336, 'CANDA BIRAWA', 3, 61),
(337, 'FUTSAL', 4, 61),
(338, 'ROHIS (Rohani Islam)', 1, 60),
(339, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 60),
(340, 'PMR (Palang Merah Remaja)', 2, 60),
(341, 'PRAMUKA', 3, 60),
(342, 'KABAR 15', 1, 60),
(343, 'KIR (Karya Ilmiah Remaja)', 1, 60),
(344, 'JAPANESE CLUB', 1, 60),
(345, 'OSIS (Organisasi Siswa Intra Sekolah)', 2, 60),
(346, 'BASKET', 5, 60),
(347, 'BADMINTON (Bulutangkis)', 4, 60),
(348, 'VOLI (Volleyball)', 5, 60),
(349, 'SEPAK BOLA', 5, 60),
(350, 'FUTSAL', 5, 60),
(351, 'SENI SUARA', 1, 60),
(352, 'TARI SAMAN', 1, 60),
(353, 'TARI LENGGANG CISADANE', 1, 60),
(354, 'TEATER', 1, 60),
(355, 'TAEKWONDO', 5, 60),
(356, 'CANDA BIRAWA', 5, 60),
(357, 'BELA DIRI MATAHARI', 5, 60),
(358, 'ROHIS (Rohani Islam)', 1, 59),
(359, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 59),
(360, 'PMR (Palang Merah Remaja)', 1, 59),
(361, 'PRAMUKA', 1, 59),
(362, 'KABAR 15', 3, 59),
(363, 'KIR (Karya Ilmiah Remaja)', 3, 59),
(364, 'JAPANESE CLUB', 2, 59),
(365, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 59),
(366, 'BASKET', 1, 59),
(367, 'BADMINTON (Bulutangkis)', 1, 59),
(368, 'VOLI (Volleyball)', 1, 59),
(369, 'SEPAK BOLA', 1, 59),
(370, 'FUTSAL', 1, 59),
(371, 'SENI SUARA', 3, 59),
(372, 'TARI SAMAN', 2, 59),
(373, 'TARI LENGGANG CISADANE', 2, 59),
(374, 'TEATER', 3, 59),
(375, 'TAEKWONDO', 1, 59),
(376, 'CANDA BIRAWA', 1, 59),
(377, 'BELA DIRI MATAHARI', 1, 59),
(378, 'ROHIS (Rohani Islam)', 3, 58),
(379, 'PASKIBRA (Pasukan Pengibar Bendera)', 2, 58),
(380, 'PRAMUKA', 3, 58),
(381, 'PMR (Palang Merah Remaja)', 4, 58),
(382, 'KABAR 15', 4, 58),
(383, 'KIR (Karya Ilmiah Remaja)', 4, 58),
(384, 'JAPANESE CLUB', 2, 58),
(385, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 58),
(386, 'BASKET', 3, 58),
(387, 'BADMINTON (Bulutangkis)', 3, 58),
(388, 'VOLI (Volleyball)', 3, 58),
(389, 'SEPAK BOLA', 3, 58),
(390, 'FUTSAL', 3, 58),
(391, 'SENI SUARA', 2, 58),
(392, 'TARI SAMAN', 2, 58),
(393, 'TARI LENGGANG CISADANE', 2, 58),
(394, 'TEATER', 2, 58),
(395, 'TAEKWONDO', 3, 58),
(396, 'CANDA BIRAWA', 3, 58),
(397, 'BELA DIRI MATAHARI', 3, 58),
(398, 'ROHIS (Rohani Islam)', 1, 57),
(399, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 57),
(400, 'PMR (Palang Merah Remaja)', 3, 57),
(401, 'PRAMUKA', 3, 57),
(402, 'KABAR 15', 3, 57),
(403, 'KIR (Karya Ilmiah Remaja)', 5, 57),
(404, 'JAPANESE CLUB', 4, 57),
(405, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 57),
(406, 'BASKET', 1, 57),
(407, 'BADMINTON (Bulutangkis)', 1, 57),
(408, 'VOLI (Volleyball)', 1, 57),
(409, 'SEPAK BOLA', 1, 57),
(410, 'FUTSAL', 1, 57),
(411, 'SENI SUARA', 1, 57),
(412, 'TARI SAMAN', 1, 57),
(413, 'TARI LENGGANG CISADANE', 1, 57),
(414, 'TEATER', 1, 57),
(415, 'TAEKWONDO', 1, 57),
(416, 'CANDA BIRAWA', 1, 57),
(417, 'BELA DIRI MATAHARI', 1, 57),
(418, 'ROHIS (Rohani Islam)', 1, 56),
(419, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 56),
(420, 'PMR (Palang Merah Remaja)', 2, 56),
(421, 'PRAMUKA', 3, 56),
(422, 'KABAR 15', 1, 56),
(423, 'JAPANESE CLUB', 1, 56),
(424, 'OSIS (Organisasi Siswa Intra Sekolah)', 1, 56),
(425, 'BASKET', 5, 56),
(426, 'BADMINTON (Bulutangkis)', 5, 56),
(427, 'VOLI (Volleyball)', 5, 56),
(428, 'SEPAK BOLA', 5, 56),
(429, 'FUTSAL', 5, 56),
(430, 'SENI SUARA', 1, 56),
(431, 'TARI SAMAN', 1, 56),
(432, 'TARI LENGGANG CISADANE', 1, 56),
(433, 'TEATER', 1, 56),
(434, 'TAEKWONDO', 5, 56),
(435, 'CANDA BIRAWA', 5, 56),
(436, 'BELA DIRI MATAHARI', 5, 56),
(437, 'KIR (Karya Ilmiah Remaja)', 1, 56),
(438, 'ROHIS (Rohani Islam)', 2, 55),
(439, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 55),
(440, 'PMR (Palang Merah Remaja)', 1, 55),
(441, 'PRAMUKA', 2, 55),
(442, 'KABAR 15', 1, 55),
(443, 'KIR (Karya Ilmiah Remaja)', 1, 55),
(444, 'JAPANESE CLUB', 2, 55),
(445, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 55),
(446, 'BASKET', 1, 55),
(447, 'BADMINTON (Bulutangkis)', 1, 55),
(448, 'VOLI (Volleyball)', 1, 55),
(449, 'SEPAK BOLA', 1, 55),
(450, 'FUTSAL', 1, 55),
(451, 'SENI SUARA', 5, 55),
(452, 'TARI SAMAN', 5, 55),
(453, 'TARI LENGGANG CISADANE', 5, 55),
(454, 'TEATER', 5, 55),
(455, 'TAEKWONDO', 4, 55),
(456, 'CANDA BIRAWA', 4, 55),
(457, 'BELA DIRI MATAHARI', 4, 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_matching`
--

CREATE TABLE `profile_matching` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `ncf_minat_rohis` float(6,2) DEFAULT NULL,
  `nsf_minat_rohis` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_rohis` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_rohis` float(6,2) DEFAULT NULL,
  `ncf_waktu_rohis` float(6,2) DEFAULT NULL,
  `nsf_waktu_rohis` float(6,2) DEFAULT NULL,
  `ncf_motivasi_rohis` float(6,2) DEFAULT NULL,
  `nsf_motivasi_rohis` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_rohis` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_rohis` float(6,2) DEFAULT NULL,
  `n1_rohis` float(6,2) DEFAULT NULL,
  `n2_rohis` float(6,2) DEFAULT NULL,
  `n3_rohis` float(6,2) DEFAULT NULL,
  `n4_rohis` float(6,2) DEFAULT NULL,
  `n5_rohis` float(6,2) DEFAULT NULL,
  `n_total_rohis` float(6,2) DEFAULT NULL,
  `ncf_minat_paskibra` float(6,2) DEFAULT NULL,
  `nsf_minat_paskibra` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_paskibra` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_paskibra` float(6,2) DEFAULT NULL,
  `ncf_waktu_paskibra` float(6,2) DEFAULT NULL,
  `nsf_waktu_paskibra` float(6,2) DEFAULT NULL,
  `ncf_motivasi_paskibra` float(6,2) DEFAULT NULL,
  `nsf_motivasi_paskibra` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_paskibra` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_paskibra` float(6,2) DEFAULT NULL,
  `n1_paskibra` float(6,2) DEFAULT NULL,
  `n2_paskibra` float(6,2) DEFAULT NULL,
  `n3_paskibra` float(6,2) DEFAULT NULL,
  `n4_paskibra` float(6,2) DEFAULT NULL,
  `n5_paskibra` float(6,2) DEFAULT NULL,
  `n_total_paskibra` float(6,2) DEFAULT NULL,
  `ncf_minat_pmr` float(6,2) DEFAULT NULL,
  `nsf_minat_pmr` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_pmr` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_pmr` float(6,2) DEFAULT NULL,
  `ncf_waktu_pmr` float(6,2) DEFAULT NULL,
  `nsf_waktu_pmr` float(6,2) DEFAULT NULL,
  `ncf_motivasi_pmr` float(6,2) DEFAULT NULL,
  `nsf_motivasi_pmr` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_pmr` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_pmr` float(6,2) DEFAULT NULL,
  `n1_pmr` float(6,2) DEFAULT NULL,
  `n2_pmr` float(6,2) DEFAULT NULL,
  `n3_pmr` float(6,2) DEFAULT NULL,
  `n4_pmr` float(6,2) DEFAULT NULL,
  `n5_pmr` float(6,2) DEFAULT NULL,
  `n_total_pmr` float(6,2) DEFAULT NULL,
  `ncf_minat_pramuka` float(6,2) DEFAULT NULL,
  `nsf_minat_pramuka` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_pramuka` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_pramuka` float(6,2) DEFAULT NULL,
  `ncf_waktu_pramuka` float(6,2) DEFAULT NULL,
  `nsf_waktu_pramuka` float(6,2) DEFAULT NULL,
  `ncf_motivasi_pramuka` float(6,2) DEFAULT NULL,
  `nsf_motivasi_pramuka` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_pramuka` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_pramuka` float(6,2) DEFAULT NULL,
  `n1_pramuka` float(6,2) DEFAULT NULL,
  `n2_pramuka` float(6,2) DEFAULT NULL,
  `n3_pramuka` float(6,2) DEFAULT NULL,
  `n4_pramuka` float(6,2) DEFAULT NULL,
  `n5_pramuka` float(6,2) DEFAULT NULL,
  `n_total_pramuka` float(6,2) DEFAULT NULL,
  `ncf_minat_kabar_15` float(6,2) DEFAULT NULL,
  `nsf_minat_kabar_15` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_kabar_15` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_kabar_15` float(6,2) DEFAULT NULL,
  `ncf_waktu_kabar_15` float(6,2) DEFAULT NULL,
  `nsf_waktu_kabar_15` float(6,2) DEFAULT NULL,
  `ncf_motivasi_kabar_15` float(6,2) DEFAULT NULL,
  `nsf_motivasi_kabar_15` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_kabar_15` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_kabar_15` float(6,2) DEFAULT NULL,
  `n1_kabar_15` float(6,2) DEFAULT NULL,
  `n2_kabar_15` float(6,2) DEFAULT NULL,
  `n3_kabar_15` float(6,2) DEFAULT NULL,
  `n4_kabar_15` float(6,2) DEFAULT NULL,
  `n5_kabar_15` float(6,2) DEFAULT NULL,
  `n_total_kabar_15` float(6,2) DEFAULT NULL,
  `ncf_minat_kir` float(6,2) DEFAULT NULL,
  `nsf_minat_kir` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_kir` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_kir` float(6,2) DEFAULT NULL,
  `ncf_waktu_kir` float(6,2) DEFAULT NULL,
  `nsf_waktu_kir` float(6,2) DEFAULT NULL,
  `ncf_motivasi_kir` float(6,2) DEFAULT NULL,
  `nsf_motivasi_kir` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_kir` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_kir` float(6,2) DEFAULT NULL,
  `n1_kir` float(6,2) DEFAULT NULL,
  `n2_kir` float(6,2) DEFAULT NULL,
  `n3_kir` float(6,2) DEFAULT NULL,
  `n4_kir` float(6,2) DEFAULT NULL,
  `n5_kir` float(6,2) DEFAULT NULL,
  `n_total_kir` float(6,2) DEFAULT NULL,
  `ncf_minat_japanese_club` float(6,2) DEFAULT NULL,
  `nsf_minat_japanese_club` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_japanese_club` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_japanese_club` float(6,2) DEFAULT NULL,
  `ncf_waktu_japanese_club` float(6,2) DEFAULT NULL,
  `nsf_waktu_japanese_club` float(6,2) DEFAULT NULL,
  `ncf_motivasi_japanese_club` float(6,2) DEFAULT NULL,
  `nsf_motivasi_japanese_club` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_japanese_club` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_japanese_club` float(6,2) DEFAULT NULL,
  `n1_japanese_club` float(6,2) DEFAULT NULL,
  `n2_japanese_club` float(6,2) DEFAULT NULL,
  `n3_japanese_club` float(6,2) DEFAULT NULL,
  `n4_japanese_club` float(6,2) DEFAULT NULL,
  `n5_japanese_club` float(6,2) DEFAULT NULL,
  `n_total_japanese_club` float(6,2) DEFAULT NULL,
  `ncf_minat_osis` float(6,2) DEFAULT NULL,
  `nsf_minat_osis` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_osis` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_osis` float(6,2) DEFAULT NULL,
  `ncf_waktu_osis` float(6,2) DEFAULT NULL,
  `nsf_waktu_osis` float(6,2) DEFAULT NULL,
  `ncf_motivasi_osis` float(6,2) DEFAULT NULL,
  `nsf_motivasi_osis` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_osis` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_osis` float(6,2) DEFAULT NULL,
  `n1_osis` float(6,2) DEFAULT NULL,
  `n2_osis` float(6,2) DEFAULT NULL,
  `n3_osis` float(6,2) DEFAULT NULL,
  `n4_osis` float(6,2) DEFAULT NULL,
  `n5_osis` float(6,2) DEFAULT NULL,
  `n_total_osis` float(6,2) DEFAULT NULL,
  `ncf_minat_basket` float(6,2) DEFAULT NULL,
  `nsf_minat_basket` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_basket` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_basket` float(6,2) DEFAULT NULL,
  `ncf_waktu_basket` float(6,2) DEFAULT NULL,
  `nsf_waktu_basket` float(6,2) DEFAULT NULL,
  `ncf_motivasi_basket` float(6,2) DEFAULT NULL,
  `nsf_motivasi_basket` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_basket` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_basket` float(6,2) DEFAULT NULL,
  `n1_basket` float(6,2) DEFAULT NULL,
  `n2_basket` float(6,2) DEFAULT NULL,
  `n3_basket` float(6,2) DEFAULT NULL,
  `n4_basket` float(6,2) DEFAULT NULL,
  `n5_basket` float(6,2) DEFAULT NULL,
  `n_total_basket` float(6,2) DEFAULT NULL,
  `ncf_minat_badminton` float(6,2) DEFAULT NULL,
  `nsf_minat_badminton` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_badminton` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_badminton` float(6,2) DEFAULT NULL,
  `ncf_waktu_badminton` float(6,2) DEFAULT NULL,
  `nsf_waktu_badminton` float(6,2) DEFAULT NULL,
  `ncf_motivasi_badminton` float(6,2) DEFAULT NULL,
  `nsf_motivasi_badminton` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_badminton` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_badminton` float(6,2) DEFAULT NULL,
  `n1_badminton` float(6,2) DEFAULT NULL,
  `n2_badminton` float(6,2) DEFAULT NULL,
  `n3_badminton` float(6,2) DEFAULT NULL,
  `n4_badminton` float(6,2) DEFAULT NULL,
  `n5_badminton` float(6,2) DEFAULT NULL,
  `n_total_badminton` float(6,2) DEFAULT NULL,
  `ncf_minat_voli` float(6,2) DEFAULT NULL,
  `nsf_minat_voli` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_voli` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_voli` float(6,2) DEFAULT NULL,
  `ncf_waktu_voli` float(6,2) DEFAULT NULL,
  `nsf_waktu_voli` float(6,2) DEFAULT NULL,
  `ncf_motivasi_voli` float(6,2) DEFAULT NULL,
  `nsf_motivasi_voli` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_voli` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_voli` float(6,2) DEFAULT NULL,
  `n1_voli` float(6,2) DEFAULT NULL,
  `n2_voli` float(6,2) DEFAULT NULL,
  `n3_voli` float(6,2) DEFAULT NULL,
  `n4_voli` float(6,2) DEFAULT NULL,
  `n5_voli` float(6,2) DEFAULT NULL,
  `n_total_voli` float(6,2) DEFAULT NULL,
  `ncf_minat_sepak_bola` float(6,2) DEFAULT NULL,
  `nsf_minat_sepak_bola` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_sepak_bola` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_sepak_bola` float(6,2) DEFAULT NULL,
  `ncf_waktu_sepak_bola` float(6,2) DEFAULT NULL,
  `nsf_waktu_sepak_bola` float(6,2) DEFAULT NULL,
  `ncf_motivasi_sepak_bola` float(6,2) DEFAULT NULL,
  `nsf_motivasi_sepak_bola` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_sepak_bola` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_sepak_bola` float(6,2) DEFAULT NULL,
  `n1_sepak_bola` float(6,2) DEFAULT NULL,
  `n2_sepak_bola` float(6,2) DEFAULT NULL,
  `n3_sepak_bola` float(6,2) DEFAULT NULL,
  `n4_sepak_bola` float(6,2) DEFAULT NULL,
  `n5_sepak_bola` float(6,2) DEFAULT NULL,
  `n_total_sepak_bola` float(6,2) DEFAULT NULL,
  `ncf_minat_futsal` float(6,2) DEFAULT NULL,
  `nsf_minat_futsal` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_futsal` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_futsal` float(6,2) DEFAULT NULL,
  `ncf_waktu_futsal` float(6,2) DEFAULT NULL,
  `nsf_waktu_futsal` float(6,2) DEFAULT NULL,
  `ncf_motivasi_futsal` float(6,2) DEFAULT NULL,
  `nsf_motivasi_futsal` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_futsal` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_futsal` float(6,2) DEFAULT NULL,
  `n1_futsal` float(6,2) DEFAULT NULL,
  `n2_futsal` float(6,2) DEFAULT NULL,
  `n3_futsal` float(6,2) DEFAULT NULL,
  `n4_futsal` float(6,2) DEFAULT NULL,
  `n5_futsal` float(6,2) DEFAULT NULL,
  `n_total_futsal` float(6,2) DEFAULT NULL,
  `ncf_minat_seni_suara` float(6,2) DEFAULT NULL,
  `nsf_minat_seni_suara` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_seni_suara` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_seni_suara` float(6,2) DEFAULT NULL,
  `ncf_waktu_seni_suara` float(6,2) DEFAULT NULL,
  `nsf_waktu_seni_suara` float(6,2) DEFAULT NULL,
  `ncf_motivasi_seni_suara` float(6,2) DEFAULT NULL,
  `nsf_motivasi_seni_suara` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_seni_suara` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_seni_suara` float(6,2) DEFAULT NULL,
  `n1_seni_suara` float(6,2) DEFAULT NULL,
  `n2_seni_suara` float(6,2) DEFAULT NULL,
  `n3_seni_suara` float(6,2) DEFAULT NULL,
  `n4_seni_suara` float(6,2) DEFAULT NULL,
  `n5_seni_suara` float(6,2) DEFAULT NULL,
  `n_total_seni_suara` float(6,2) DEFAULT NULL,
  `ncf_minat_tari_saman` float(6,2) DEFAULT NULL,
  `nsf_minat_tari_saman` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_tari_saman` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_tari_saman` float(6,2) DEFAULT NULL,
  `ncf_waktu_tari_saman` float(6,2) DEFAULT NULL,
  `nsf_waktu_tari_saman` float(6,2) DEFAULT NULL,
  `ncf_motivasi_tari_saman` float(6,2) DEFAULT NULL,
  `nsf_motivasi_tari_saman` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_tari_saman` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_tari_saman` float(6,2) DEFAULT NULL,
  `n1_tari_saman` float(6,2) DEFAULT NULL,
  `n2_tari_saman` float(6,2) DEFAULT NULL,
  `n3_tari_saman` float(6,2) DEFAULT NULL,
  `n4_tari_saman` float(6,2) DEFAULT NULL,
  `n5_tari_saman` float(6,2) DEFAULT NULL,
  `n_total_tari_saman` float(6,2) DEFAULT NULL,
  `ncf_minat_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `nsf_minat_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `ncf_waktu_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `nsf_waktu_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `ncf_motivasi_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `nsf_motivasi_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `n1_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `n2_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `n3_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `n4_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `n5_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `n_total_tari_lenggang_cisadane` float(6,2) DEFAULT NULL,
  `ncf_minat_teater` float(6,2) DEFAULT NULL,
  `nsf_minat_teater` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_teater` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_teater` float(6,2) DEFAULT NULL,
  `ncf_waktu_teater` float(6,2) DEFAULT NULL,
  `nsf_waktu_teater` float(6,2) DEFAULT NULL,
  `ncf_motivasi_teater` float(6,2) DEFAULT NULL,
  `nsf_motivasi_teater` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_teater` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_teater` float(6,2) DEFAULT NULL,
  `n1_teater` float(6,2) DEFAULT NULL,
  `n2_teater` float(6,2) DEFAULT NULL,
  `n3_teater` float(6,2) DEFAULT NULL,
  `n4_teater` float(6,2) DEFAULT NULL,
  `n5_teater` float(6,2) DEFAULT NULL,
  `n_total_teater` float(6,2) DEFAULT NULL,
  `ncf_minat_taekwondo` float(6,2) DEFAULT NULL,
  `nsf_minat_taekwondo` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_taekwondo` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_taekwondo` float(6,2) DEFAULT NULL,
  `ncf_waktu_taekwondo` float(6,2) DEFAULT NULL,
  `nsf_waktu_taekwondo` float(6,2) DEFAULT NULL,
  `ncf_motivasi_taekwondo` float(6,2) DEFAULT NULL,
  `nsf_motivasi_taekwondo` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_taekwondo` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_taekwondo` float(6,2) DEFAULT NULL,
  `n1_taekwondo` float(6,2) DEFAULT NULL,
  `n2_taekwondo` float(6,2) DEFAULT NULL,
  `n3_taekwondo` float(6,2) DEFAULT NULL,
  `n4_taekwondo` float(6,2) DEFAULT NULL,
  `n5_taekwondo` float(6,2) DEFAULT NULL,
  `n_total_taekwondo` float(6,2) DEFAULT NULL,
  `ncf_minat_canda_birawa` float(6,2) DEFAULT NULL,
  `nsf_minat_canda_birawa` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_canda_birawa` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_canda_birawa` float(6,2) DEFAULT NULL,
  `ncf_waktu_canda_birawa` float(6,2) DEFAULT NULL,
  `nsf_waktu_canda_birawa` float(6,2) DEFAULT NULL,
  `ncf_motivasi_canda_birawa` float(6,2) DEFAULT NULL,
  `nsf_motivasi_canda_birawa` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_canda_birawa` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_canda_birawa` float(6,2) DEFAULT NULL,
  `n1_canda_birawa` float(6,2) DEFAULT NULL,
  `n2_canda_birawa` float(6,2) DEFAULT NULL,
  `n3_canda_birawa` float(6,2) DEFAULT NULL,
  `n4_canda_birawa` float(6,2) DEFAULT NULL,
  `n5_canda_birawa` float(6,2) DEFAULT NULL,
  `n_total_canda_birawa` float(6,2) DEFAULT NULL,
  `ncf_minat_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `nsf_minat_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `ncf_kemampuan_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `nsf_kemampuan_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `ncf_waktu_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `nsf_waktu_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `ncf_motivasi_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `nsf_motivasi_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `ncf_karakteristik_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `nsf_karakteristik_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `n1_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `n2_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `n3_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `n4_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `n5_bela_diri_matahari` float(6,2) DEFAULT NULL,
  `n_total_bela_diri_matahari` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile_matching`
--

INSERT INTO `profile_matching` (`id`, `students_id`, `ncf_minat_rohis`, `nsf_minat_rohis`, `ncf_kemampuan_rohis`, `nsf_kemampuan_rohis`, `ncf_waktu_rohis`, `nsf_waktu_rohis`, `ncf_motivasi_rohis`, `nsf_motivasi_rohis`, `ncf_karakteristik_rohis`, `nsf_karakteristik_rohis`, `n1_rohis`, `n2_rohis`, `n3_rohis`, `n4_rohis`, `n5_rohis`, `n_total_rohis`, `ncf_minat_paskibra`, `nsf_minat_paskibra`, `ncf_kemampuan_paskibra`, `nsf_kemampuan_paskibra`, `ncf_waktu_paskibra`, `nsf_waktu_paskibra`, `ncf_motivasi_paskibra`, `nsf_motivasi_paskibra`, `ncf_karakteristik_paskibra`, `nsf_karakteristik_paskibra`, `n1_paskibra`, `n2_paskibra`, `n3_paskibra`, `n4_paskibra`, `n5_paskibra`, `n_total_paskibra`, `ncf_minat_pmr`, `nsf_minat_pmr`, `ncf_kemampuan_pmr`, `nsf_kemampuan_pmr`, `ncf_waktu_pmr`, `nsf_waktu_pmr`, `ncf_motivasi_pmr`, `nsf_motivasi_pmr`, `ncf_karakteristik_pmr`, `nsf_karakteristik_pmr`, `n1_pmr`, `n2_pmr`, `n3_pmr`, `n4_pmr`, `n5_pmr`, `n_total_pmr`, `ncf_minat_pramuka`, `nsf_minat_pramuka`, `ncf_kemampuan_pramuka`, `nsf_kemampuan_pramuka`, `ncf_waktu_pramuka`, `nsf_waktu_pramuka`, `ncf_motivasi_pramuka`, `nsf_motivasi_pramuka`, `ncf_karakteristik_pramuka`, `nsf_karakteristik_pramuka`, `n1_pramuka`, `n2_pramuka`, `n3_pramuka`, `n4_pramuka`, `n5_pramuka`, `n_total_pramuka`, `ncf_minat_kabar_15`, `nsf_minat_kabar_15`, `ncf_kemampuan_kabar_15`, `nsf_kemampuan_kabar_15`, `ncf_waktu_kabar_15`, `nsf_waktu_kabar_15`, `ncf_motivasi_kabar_15`, `nsf_motivasi_kabar_15`, `ncf_karakteristik_kabar_15`, `nsf_karakteristik_kabar_15`, `n1_kabar_15`, `n2_kabar_15`, `n3_kabar_15`, `n4_kabar_15`, `n5_kabar_15`, `n_total_kabar_15`, `ncf_minat_kir`, `nsf_minat_kir`, `ncf_kemampuan_kir`, `nsf_kemampuan_kir`, `ncf_waktu_kir`, `nsf_waktu_kir`, `ncf_motivasi_kir`, `nsf_motivasi_kir`, `ncf_karakteristik_kir`, `nsf_karakteristik_kir`, `n1_kir`, `n2_kir`, `n3_kir`, `n4_kir`, `n5_kir`, `n_total_kir`, `ncf_minat_japanese_club`, `nsf_minat_japanese_club`, `ncf_kemampuan_japanese_club`, `nsf_kemampuan_japanese_club`, `ncf_waktu_japanese_club`, `nsf_waktu_japanese_club`, `ncf_motivasi_japanese_club`, `nsf_motivasi_japanese_club`, `ncf_karakteristik_japanese_club`, `nsf_karakteristik_japanese_club`, `n1_japanese_club`, `n2_japanese_club`, `n3_japanese_club`, `n4_japanese_club`, `n5_japanese_club`, `n_total_japanese_club`, `ncf_minat_osis`, `nsf_minat_osis`, `ncf_kemampuan_osis`, `nsf_kemampuan_osis`, `ncf_waktu_osis`, `nsf_waktu_osis`, `ncf_motivasi_osis`, `nsf_motivasi_osis`, `ncf_karakteristik_osis`, `nsf_karakteristik_osis`, `n1_osis`, `n2_osis`, `n3_osis`, `n4_osis`, `n5_osis`, `n_total_osis`, `ncf_minat_basket`, `nsf_minat_basket`, `ncf_kemampuan_basket`, `nsf_kemampuan_basket`, `ncf_waktu_basket`, `nsf_waktu_basket`, `ncf_motivasi_basket`, `nsf_motivasi_basket`, `ncf_karakteristik_basket`, `nsf_karakteristik_basket`, `n1_basket`, `n2_basket`, `n3_basket`, `n4_basket`, `n5_basket`, `n_total_basket`, `ncf_minat_badminton`, `nsf_minat_badminton`, `ncf_kemampuan_badminton`, `nsf_kemampuan_badminton`, `ncf_waktu_badminton`, `nsf_waktu_badminton`, `ncf_motivasi_badminton`, `nsf_motivasi_badminton`, `ncf_karakteristik_badminton`, `nsf_karakteristik_badminton`, `n1_badminton`, `n2_badminton`, `n3_badminton`, `n4_badminton`, `n5_badminton`, `n_total_badminton`, `ncf_minat_voli`, `nsf_minat_voli`, `ncf_kemampuan_voli`, `nsf_kemampuan_voli`, `ncf_waktu_voli`, `nsf_waktu_voli`, `ncf_motivasi_voli`, `nsf_motivasi_voli`, `ncf_karakteristik_voli`, `nsf_karakteristik_voli`, `n1_voli`, `n2_voli`, `n3_voli`, `n4_voli`, `n5_voli`, `n_total_voli`, `ncf_minat_sepak_bola`, `nsf_minat_sepak_bola`, `ncf_kemampuan_sepak_bola`, `nsf_kemampuan_sepak_bola`, `ncf_waktu_sepak_bola`, `nsf_waktu_sepak_bola`, `ncf_motivasi_sepak_bola`, `nsf_motivasi_sepak_bola`, `ncf_karakteristik_sepak_bola`, `nsf_karakteristik_sepak_bola`, `n1_sepak_bola`, `n2_sepak_bola`, `n3_sepak_bola`, `n4_sepak_bola`, `n5_sepak_bola`, `n_total_sepak_bola`, `ncf_minat_futsal`, `nsf_minat_futsal`, `ncf_kemampuan_futsal`, `nsf_kemampuan_futsal`, `ncf_waktu_futsal`, `nsf_waktu_futsal`, `ncf_motivasi_futsal`, `nsf_motivasi_futsal`, `ncf_karakteristik_futsal`, `nsf_karakteristik_futsal`, `n1_futsal`, `n2_futsal`, `n3_futsal`, `n4_futsal`, `n5_futsal`, `n_total_futsal`, `ncf_minat_seni_suara`, `nsf_minat_seni_suara`, `ncf_kemampuan_seni_suara`, `nsf_kemampuan_seni_suara`, `ncf_waktu_seni_suara`, `nsf_waktu_seni_suara`, `ncf_motivasi_seni_suara`, `nsf_motivasi_seni_suara`, `ncf_karakteristik_seni_suara`, `nsf_karakteristik_seni_suara`, `n1_seni_suara`, `n2_seni_suara`, `n3_seni_suara`, `n4_seni_suara`, `n5_seni_suara`, `n_total_seni_suara`, `ncf_minat_tari_saman`, `nsf_minat_tari_saman`, `ncf_kemampuan_tari_saman`, `nsf_kemampuan_tari_saman`, `ncf_waktu_tari_saman`, `nsf_waktu_tari_saman`, `ncf_motivasi_tari_saman`, `nsf_motivasi_tari_saman`, `ncf_karakteristik_tari_saman`, `nsf_karakteristik_tari_saman`, `n1_tari_saman`, `n2_tari_saman`, `n3_tari_saman`, `n4_tari_saman`, `n5_tari_saman`, `n_total_tari_saman`, `ncf_minat_tari_lenggang_cisadane`, `nsf_minat_tari_lenggang_cisadane`, `ncf_kemampuan_tari_lenggang_cisadane`, `nsf_kemampuan_tari_lenggang_cisadane`, `ncf_waktu_tari_lenggang_cisadane`, `nsf_waktu_tari_lenggang_cisadane`, `ncf_motivasi_tari_lenggang_cisadane`, `nsf_motivasi_tari_lenggang_cisadane`, `ncf_karakteristik_tari_lenggang_cisadane`, `nsf_karakteristik_tari_lenggang_cisadane`, `n1_tari_lenggang_cisadane`, `n2_tari_lenggang_cisadane`, `n3_tari_lenggang_cisadane`, `n4_tari_lenggang_cisadane`, `n5_tari_lenggang_cisadane`, `n_total_tari_lenggang_cisadane`, `ncf_minat_teater`, `nsf_minat_teater`, `ncf_kemampuan_teater`, `nsf_kemampuan_teater`, `ncf_waktu_teater`, `nsf_waktu_teater`, `ncf_motivasi_teater`, `nsf_motivasi_teater`, `ncf_karakteristik_teater`, `nsf_karakteristik_teater`, `n1_teater`, `n2_teater`, `n3_teater`, `n4_teater`, `n5_teater`, `n_total_teater`, `ncf_minat_taekwondo`, `nsf_minat_taekwondo`, `ncf_kemampuan_taekwondo`, `nsf_kemampuan_taekwondo`, `ncf_waktu_taekwondo`, `nsf_waktu_taekwondo`, `ncf_motivasi_taekwondo`, `nsf_motivasi_taekwondo`, `ncf_karakteristik_taekwondo`, `nsf_karakteristik_taekwondo`, `n1_taekwondo`, `n2_taekwondo`, `n3_taekwondo`, `n4_taekwondo`, `n5_taekwondo`, `n_total_taekwondo`, `ncf_minat_canda_birawa`, `nsf_minat_canda_birawa`, `ncf_kemampuan_canda_birawa`, `nsf_kemampuan_canda_birawa`, `ncf_waktu_canda_birawa`, `nsf_waktu_canda_birawa`, `ncf_motivasi_canda_birawa`, `nsf_motivasi_canda_birawa`, `ncf_karakteristik_canda_birawa`, `nsf_karakteristik_canda_birawa`, `n1_canda_birawa`, `n2_canda_birawa`, `n3_canda_birawa`, `n4_canda_birawa`, `n5_canda_birawa`, `n_total_canda_birawa`, `ncf_minat_bela_diri_matahari`, `nsf_minat_bela_diri_matahari`, `ncf_kemampuan_bela_diri_matahari`, `nsf_kemampuan_bela_diri_matahari`, `ncf_waktu_bela_diri_matahari`, `nsf_waktu_bela_diri_matahari`, `ncf_motivasi_bela_diri_matahari`, `nsf_motivasi_bela_diri_matahari`, `ncf_karakteristik_bela_diri_matahari`, `nsf_karakteristik_bela_diri_matahari`, `n1_bela_diri_matahari`, `n2_bela_diri_matahari`, `n3_bela_diri_matahari`, `n4_bela_diri_matahari`, `n5_bela_diri_matahari`, `n_total_bela_diri_matahari`) VALUES
(69, 147, 4.40, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.84, 0.00, 0.00, 0.00, 0.00, 3.84, 3.50, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.90, 0.00, 0.00, 0.00, 0.00, 2.90, 4.10, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.66, 0.00, 0.00, 0.00, 0.00, 3.66, 4.10, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.26, 0.00, 0.00, 0.00, 0.00, 3.26, 3.90, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.54, 0.00, 0.00, 0.00, 0.00, 3.54, 3.70, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.42, 0.00, 0.00, 0.00, 0.00, 3.42, 4.20, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.72, 0.00, 0.00, 0.00, 0.00, 3.72, 4.20, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.92, 0.00, 0.00, 0.00, 0.00, 2.92, 3.70, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.42, 0.00, 0.00, 0.00, 0.00, 3.42, 3.60, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.36, 0.00, 0.00, 0.00, 0.00, 3.36, 3.60, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.36, 0.00, 0.00, 0.00, 0.00, 3.36, 3.30, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.18, 0.00, 0.00, 0.00, 0.00, 3.18, 3.50, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.30, 0.00, 0.00, 0.00, 0.00, 3.30, 3.60, 4.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.76, 0.00, 0.00, 0.00, 0.00, 3.76, 3.80, 4.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.88, 0.00, 0.00, 0.00, 0.00, 3.88, 3.80, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.48, 0.00, 0.00, 0.00, 0.00, 3.48, 3.90, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.14, 0.00, 0.00, 0.00, 0.00, 3.14, 3.50, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.30, 0.00, 0.00, 0.00, 0.00, 3.30, 3.60, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.36, 0.00, 0.00, 0.00, 0.00, 3.36, 3.50, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.30, 0.00, 0.00, 0.00, 0.00, 3.30),
(70, 148, 4.40, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.84, 0.00, 0.00, 0.00, 0.00, 3.84, 3.50, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.90, 0.00, 0.00, 0.00, 0.00, 2.90, 4.10, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.66, 0.00, 0.00, 0.00, 0.00, 3.66, 4.10, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.26, 0.00, 0.00, 0.00, 0.00, 3.26, 3.90, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.54, 0.00, 0.00, 0.00, 0.00, 3.54, 3.70, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.42, 0.00, 0.00, 0.00, 0.00, 3.42, 4.20, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.72, 0.00, 0.00, 0.00, 0.00, 3.72, 4.20, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.92, 0.00, 0.00, 0.00, 0.00, 2.92, 3.70, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.42, 0.00, 0.00, 0.00, 0.00, 3.42, 3.60, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.36, 0.00, 0.00, 0.00, 0.00, 3.36, 3.60, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.36, 0.00, 0.00, 0.00, 0.00, 3.36, 3.30, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.18, 0.00, 0.00, 0.00, 0.00, 3.18, 3.50, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.30, 0.00, 0.00, 0.00, 0.00, 3.30, 3.60, 4.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.76, 0.00, 0.00, 0.00, 0.00, 3.76, 3.80, 4.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.88, 0.00, 0.00, 0.00, 0.00, 3.88, 3.80, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.48, 0.00, 0.00, 0.00, 0.00, 3.48, 3.90, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.14, 0.00, 0.00, 0.00, 0.00, 3.14, 3.50, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.30, 0.00, 0.00, 0.00, 0.00, 3.30, 3.60, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.36, 0.00, 0.00, 0.00, 0.00, 3.36, 3.50, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.30, 0.00, 0.00, 0.00, 0.00, 3.30),
(71, 155, 4.30, 4.50, 3.70, 4.50, 0.00, 4.50, 4.50, 3.50, 0.00, 0.00, 4.38, 4.02, 0.00, 4.10, 0.00, 12.50, 3.30, 5.00, 3.80, 5.00, 0.00, 4.00, 4.00, 4.00, 0.00, 0.00, 3.98, 4.28, 0.00, 4.00, 0.00, 12.26, 3.90, 4.50, 4.00, 4.50, 0.00, 5.00, 3.50, 4.50, 0.00, 0.00, 4.14, 4.20, 0.00, 3.90, 0.00, 12.24, 3.90, 5.00, 3.80, 5.00, 0.00, 4.00, 4.00, 5.00, 0.00, 0.00, 4.34, 4.28, 0.00, 4.40, 0.00, 13.02, 3.70, 4.50, 4.30, 5.00, 0.00, 4.50, 3.50, 3.50, 0.00, 0.00, 4.02, 4.58, 0.00, 3.50, 0.00, 12.10, 3.50, 4.50, 3.90, 4.00, 0.00, 5.00, 2.50, 3.50, 0.00, 0.00, 3.90, 3.94, 0.00, 2.90, 0.00, 10.74, 4.00, 4.50, 3.70, 5.00, 0.00, 4.50, 4.00, 3.50, 0.00, 0.00, 4.20, 4.22, 0.00, 3.80, 0.00, 12.22, 4.00, 4.00, 4.00, 4.50, 0.00, 4.00, 2.50, 4.50, 0.00, 0.00, 4.00, 4.20, 0.00, 3.30, 0.00, 11.50, 3.50, 4.50, 4.00, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.90, 4.00, 0.00, 3.60, 0.00, 11.50, 3.40, 4.50, 4.20, 4.00, 0.00, 5.00, 4.00, 4.00, 0.00, 0.00, 3.84, 4.12, 0.00, 4.00, 0.00, 11.96, 3.40, 4.50, 4.00, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.84, 4.00, 0.00, 3.60, 0.00, 11.44, 3.10, 4.50, 4.10, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.66, 4.06, 0.00, 3.60, 0.00, 11.32, 3.30, 4.50, 4.10, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.78, 4.06, 0.00, 3.60, 0.00, 11.44, 3.40, 3.50, 3.50, 4.50, 0.00, 3.50, 5.00, 3.50, 0.00, 0.00, 3.44, 3.90, 0.00, 4.40, 0.00, 11.74, 3.60, 3.50, 4.00, 4.50, 0.00, 4.50, 5.00, 3.50, 0.00, 0.00, 3.56, 4.20, 0.00, 4.40, 0.00, 12.16, 3.60, 4.50, 4.00, 4.50, 0.00, 4.50, 5.00, 3.50, 0.00, 0.00, 3.96, 4.20, 0.00, 4.40, 0.00, 12.56, 3.70, 5.00, 3.80, 4.50, 0.00, 5.00, 3.00, 3.50, 0.00, 0.00, 4.22, 4.08, 0.00, 3.20, 0.00, 11.50, 3.30, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.78, 3.82, 0.00, 3.90, 0.00, 11.50, 3.40, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.84, 3.82, 0.00, 3.90, 0.00, 11.56, 3.30, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.78, 3.82, 0.00, 3.90, 0.00, 11.50),
(72, 156, 4.30, 4.50, 3.70, 4.50, 0.00, 4.50, 4.50, 3.50, 0.00, 0.00, 4.38, 4.02, 0.00, 4.10, 0.00, 12.50, 3.30, 5.00, 3.80, 5.00, 0.00, 4.00, 4.00, 4.00, 0.00, 0.00, 3.98, 4.28, 0.00, 4.00, 0.00, 12.26, 3.90, 4.50, 4.00, 4.50, 0.00, 5.00, 3.50, 4.50, 0.00, 0.00, 4.14, 4.20, 0.00, 3.90, 0.00, 12.24, 3.90, 5.00, 3.80, 5.00, 0.00, 4.00, 4.00, 5.00, 0.00, 0.00, 4.34, 4.28, 0.00, 4.40, 0.00, 13.02, 3.70, 4.50, 4.30, 5.00, 0.00, 4.50, 3.50, 3.50, 0.00, 0.00, 4.02, 4.58, 0.00, 3.50, 0.00, 12.10, 3.50, 4.50, 3.90, 4.00, 0.00, 5.00, 2.50, 3.50, 0.00, 0.00, 3.90, 3.94, 0.00, 2.90, 0.00, 10.74, 4.00, 4.50, 3.70, 5.00, 0.00, 4.50, 4.00, 3.50, 0.00, 0.00, 4.20, 4.22, 0.00, 3.80, 0.00, 12.22, 4.00, 4.00, 4.00, 4.50, 0.00, 4.00, 2.50, 4.50, 0.00, 0.00, 4.00, 4.20, 0.00, 3.30, 0.00, 11.50, 3.50, 4.50, 4.00, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.90, 4.00, 0.00, 3.60, 0.00, 11.50, 3.40, 4.50, 4.20, 4.00, 0.00, 5.00, 4.00, 4.00, 0.00, 0.00, 3.84, 4.12, 0.00, 4.00, 0.00, 11.96, 3.40, 4.50, 4.00, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.84, 4.00, 0.00, 3.60, 0.00, 11.44, 3.10, 4.50, 4.10, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.66, 4.06, 0.00, 3.60, 0.00, 11.32, 3.30, 4.50, 4.10, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.78, 4.06, 0.00, 3.60, 0.00, 11.44, 3.40, 3.50, 3.50, 4.50, 0.00, 3.50, 5.00, 3.50, 0.00, 0.00, 3.44, 3.90, 0.00, 4.40, 0.00, 11.74, 3.60, 3.50, 4.00, 4.50, 0.00, 4.50, 5.00, 3.50, 0.00, 0.00, 3.56, 4.20, 0.00, 4.40, 0.00, 12.16, 3.60, 4.50, 4.00, 4.50, 0.00, 4.50, 5.00, 3.50, 0.00, 0.00, 3.96, 4.20, 0.00, 4.40, 0.00, 12.56, 3.70, 5.00, 3.80, 4.50, 0.00, 5.00, 3.00, 3.50, 0.00, 0.00, 4.22, 4.08, 0.00, 3.20, 0.00, 11.50, 3.30, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.78, 3.82, 0.00, 3.90, 0.00, 11.50, 3.40, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.84, 3.82, 0.00, 3.90, 0.00, 11.56, 3.30, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.78, 3.82, 0.00, 3.90, 0.00, 11.50),
(73, 157, 4.30, 4.50, 3.70, 4.50, 0.00, 4.50, 4.50, 3.50, 0.00, 0.00, 4.38, 4.02, 0.00, 4.10, 0.00, 12.50, 3.30, 5.00, 3.80, 5.00, 0.00, 4.00, 4.00, 4.00, 0.00, 0.00, 3.98, 4.28, 0.00, 4.00, 0.00, 12.26, 3.90, 4.50, 4.00, 4.50, 0.00, 5.00, 3.50, 4.50, 0.00, 0.00, 4.14, 4.20, 0.00, 3.90, 0.00, 12.24, 3.90, 5.00, 3.80, 5.00, 0.00, 4.00, 4.00, 5.00, 0.00, 0.00, 4.34, 4.28, 0.00, 4.40, 0.00, 13.02, 3.70, 4.50, 4.30, 5.00, 0.00, 4.50, 3.50, 3.50, 0.00, 0.00, 4.02, 4.58, 0.00, 3.50, 0.00, 12.10, 3.50, 4.50, 3.90, 4.00, 0.00, 5.00, 2.50, 3.50, 0.00, 0.00, 3.90, 3.94, 0.00, 2.90, 0.00, 10.74, 4.00, 4.50, 3.70, 5.00, 0.00, 4.50, 4.00, 3.50, 0.00, 0.00, 4.20, 4.22, 0.00, 3.80, 0.00, 12.22, 4.00, 4.00, 4.00, 4.50, 0.00, 4.00, 2.50, 4.50, 0.00, 0.00, 4.00, 4.20, 0.00, 3.30, 0.00, 11.50, 3.50, 4.50, 4.00, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.90, 4.00, 0.00, 3.60, 0.00, 11.50, 3.40, 4.50, 4.20, 4.00, 0.00, 5.00, 4.00, 4.00, 0.00, 0.00, 3.84, 4.12, 0.00, 4.00, 0.00, 11.96, 3.40, 4.50, 4.00, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.84, 4.00, 0.00, 3.60, 0.00, 11.44, 3.10, 4.50, 4.10, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.66, 4.06, 0.00, 3.60, 0.00, 11.32, 3.30, 4.50, 4.10, 4.00, 0.00, 5.00, 4.00, 3.00, 0.00, 0.00, 3.78, 4.06, 0.00, 3.60, 0.00, 11.44, 3.40, 3.50, 3.50, 4.50, 0.00, 3.50, 5.00, 3.50, 0.00, 0.00, 3.44, 3.90, 0.00, 4.40, 0.00, 11.74, 3.60, 3.50, 4.00, 4.50, 0.00, 4.50, 5.00, 3.50, 0.00, 0.00, 3.56, 4.20, 0.00, 4.40, 0.00, 12.16, 3.60, 4.50, 4.00, 4.50, 0.00, 4.50, 5.00, 3.50, 0.00, 0.00, 3.96, 4.20, 0.00, 4.40, 0.00, 12.56, 3.70, 5.00, 3.80, 4.50, 0.00, 5.00, 3.00, 3.50, 0.00, 0.00, 4.22, 4.08, 0.00, 3.20, 0.00, 11.50, 3.30, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.78, 3.82, 0.00, 3.90, 0.00, 11.50, 3.40, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.84, 3.82, 0.00, 3.90, 0.00, 11.56, 3.30, 4.50, 3.70, 4.00, 0.00, 5.00, 4.50, 3.00, 0.00, 0.00, 3.78, 3.82, 0.00, 3.90, 0.00, 11.50),
(74, 159, 4.00, 4.50, 4.00, 4.50, 0.00, 5.00, 4.00, 2.50, 0.00, 0.00, 4.20, 4.20, 0.00, 3.40, 0.00, 11.80, 3.40, 5.00, 3.60, 5.00, 0.00, 3.00, 4.50, 5.00, 0.00, 0.00, 4.04, 4.16, 0.00, 4.70, 0.00, 12.90, 3.70, 4.50, 4.60, 4.50, 0.00, 4.00, 4.75, 3.50, 0.00, 0.00, 4.02, 4.56, 0.00, 4.25, 0.00, 12.83, 4.30, 5.00, 4.10, 5.00, 0.00, 3.00, 4.50, 4.50, 0.00, 0.00, 4.58, 4.46, 0.00, 4.50, 0.00, 13.54, 3.40, 4.50, 4.50, 5.00, 0.00, 5.00, 4.75, 2.50, 0.00, 0.00, 3.84, 4.70, 0.00, 3.85, 0.00, 12.39, 3.20, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 2.50, 0.00, 0.00, 3.72, 3.88, 0.00, 3.70, 0.00, 11.30, 3.70, 4.50, 3.60, 5.00, 0.00, 5.00, 4.50, 2.50, 0.00, 0.00, 4.02, 4.16, 0.00, 3.70, 0.00, 11.88, 4.50, 4.00, 4.50, 4.50, 0.00, 3.00, 4.50, 3.50, 0.00, 0.00, 4.30, 4.50, 0.00, 4.10, 0.00, 12.90, 3.30, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 4.00, 0.00, 0.00, 3.78, 3.88, 0.00, 4.30, 0.00, 11.96, 3.10, 4.50, 4.00, 4.00, 0.00, 4.00, 4.50, 5.00, 0.00, 0.00, 3.66, 4.00, 0.00, 4.70, 0.00, 12.36, 3.10, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 4.00, 0.00, 0.00, 3.66, 3.88, 0.00, 4.30, 0.00, 11.84, 3.50, 4.50, 3.60, 4.00, 0.00, 4.00, 4.50, 4.00, 0.00, 0.00, 3.90, 3.76, 0.00, 4.30, 0.00, 11.96, 3.40, 4.50, 3.60, 4.00, 0.00, 4.00, 4.50, 4.00, 0.00, 0.00, 3.84, 3.76, 0.00, 4.30, 0.00, 11.90, 3.90, 3.50, 3.40, 4.50, 0.00, 4.50, 3.50, 2.50, 0.00, 0.00, 3.74, 3.84, 0.00, 3.10, 0.00, 10.68, 4.10, 3.50, 3.90, 4.50, 0.00, 5.00, 3.50, 2.50, 0.00, 0.00, 3.86, 4.14, 0.00, 3.10, 0.00, 11.10, 4.10, 4.50, 3.90, 4.50, 0.00, 5.00, 3.50, 2.50, 0.00, 0.00, 4.26, 4.14, 0.00, 3.10, 0.00, 11.50, 4.20, 5.00, 4.10, 4.50, 0.00, 4.00, 5.00, 2.50, 0.00, 0.00, 4.52, 4.26, 0.00, 4.00, 0.00, 12.78, 3.80, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 0.00, 0.00, 4.08, 3.70, 0.00, 4.00, 0.00, 11.78, 4.00, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 0.00, 0.00, 4.20, 3.70, 0.00, 4.00, 0.00, 11.90, 3.80, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 0.00, 0.00, 4.08, 3.70, 0.00, 4.00, 0.00, 11.78),
(75, 160, 4.00, 4.50, 4.00, 4.50, 0.00, 5.00, 4.00, 2.50, 3.00, 4.50, 4.20, 4.20, 0.00, 3.40, 3.60, 15.40, 3.40, 5.00, 3.60, 5.00, 0.00, 3.00, 4.50, 5.00, 2.50, 3.75, 4.04, 4.16, 0.00, 4.70, 3.00, 15.90, 3.70, 4.50, 4.60, 4.50, 0.00, 4.00, 4.75, 3.50, 3.50, 4.50, 4.02, 4.56, 0.00, 4.25, 3.90, 16.73, 4.30, 5.00, 4.10, 5.00, 0.00, 3.00, 4.50, 4.50, 3.00, 4.00, 4.58, 4.46, 0.00, 4.50, 3.40, 16.94, 3.40, 4.50, 4.50, 5.00, 0.00, 5.00, 4.75, 2.50, 4.50, 4.25, 3.84, 4.70, 0.00, 3.85, 4.40, 16.79, 3.20, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 2.50, 4.50, 3.25, 3.72, 3.88, 0.00, 3.70, 4.00, 15.30, 3.70, 4.50, 3.60, 5.00, 0.00, 5.00, 4.50, 2.50, 3.00, 3.75, 4.02, 4.16, 0.00, 3.70, 3.30, 15.18, 4.50, 4.00, 4.50, 4.50, 0.00, 3.00, 4.50, 3.50, 4.75, 3.75, 4.30, 4.50, 0.00, 4.10, 4.35, 17.25, 3.30, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.78, 3.88, 0.00, 4.30, 3.10, 15.06, 3.10, 4.50, 4.00, 4.00, 0.00, 4.00, 4.50, 5.00, 3.00, 3.25, 3.66, 4.00, 0.00, 4.70, 3.10, 15.46, 3.10, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.66, 3.88, 0.00, 4.30, 3.10, 14.94, 3.50, 4.50, 3.60, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.90, 3.76, 0.00, 4.30, 3.10, 15.06, 3.40, 4.50, 3.60, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.84, 3.76, 0.00, 4.30, 3.10, 15.00, 3.90, 3.50, 3.40, 4.50, 0.00, 4.50, 3.50, 2.50, 3.50, 4.50, 3.74, 3.84, 0.00, 3.10, 3.90, 14.58, 4.10, 3.50, 3.90, 4.50, 0.00, 5.00, 3.50, 2.50, 3.00, 4.50, 3.86, 4.14, 0.00, 3.10, 3.60, 14.70, 4.10, 4.50, 3.90, 4.50, 0.00, 5.00, 3.50, 2.50, 3.00, 4.50, 4.26, 4.14, 0.00, 3.10, 3.60, 15.10, 4.20, 5.00, 4.10, 4.50, 0.00, 4.00, 5.00, 2.50, 3.50, 4.50, 4.52, 4.26, 0.00, 4.00, 3.90, 16.68, 3.80, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 3.00, 3.25, 4.08, 3.70, 0.00, 4.00, 3.10, 14.88, 4.00, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 3.00, 3.25, 4.20, 3.70, 0.00, 4.00, 3.10, 15.00, 3.80, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 3.00, 3.25, 4.08, 3.70, 0.00, 4.00, 3.10, 14.88),
(76, 161, 4.00, 4.50, 4.00, 4.50, 0.00, 5.00, 4.00, 2.50, 3.00, 4.50, 4.20, 4.20, 0.00, 3.40, 3.60, 15.40, 3.40, 5.00, 3.60, 5.00, 0.00, 3.00, 4.50, 5.00, 2.50, 3.75, 4.04, 4.16, 0.00, 4.70, 3.00, 15.90, 3.70, 4.50, 4.60, 4.50, 0.00, 4.00, 4.75, 3.50, 3.50, 4.50, 4.02, 4.56, 0.00, 4.25, 3.90, 16.73, 4.30, 5.00, 4.10, 5.00, 0.00, 3.00, 4.50, 4.50, 3.00, 4.00, 4.58, 4.46, 0.00, 4.50, 3.40, 16.94, 3.40, 4.50, 4.50, 5.00, 0.00, 5.00, 4.75, 2.50, 4.50, 4.25, 3.84, 4.70, 0.00, 3.85, 4.40, 16.79, 3.20, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 2.50, 4.50, 3.25, 3.72, 3.88, 0.00, 3.70, 4.00, 15.30, 3.70, 4.50, 3.60, 5.00, 0.00, 5.00, 4.50, 2.50, 3.00, 3.75, 4.02, 4.16, 0.00, 3.70, 3.30, 15.18, 4.50, 4.00, 4.50, 4.50, 0.00, 3.00, 4.50, 3.50, 4.75, 3.75, 4.30, 4.50, 0.00, 4.10, 4.35, 17.25, 3.30, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.78, 3.88, 0.00, 4.30, 3.10, 15.06, 3.10, 4.50, 4.00, 4.00, 0.00, 4.00, 4.50, 5.00, 3.00, 3.25, 3.66, 4.00, 0.00, 4.70, 3.10, 15.46, 3.10, 4.50, 3.80, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.66, 3.88, 0.00, 4.30, 3.10, 14.94, 3.50, 4.50, 3.60, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.90, 3.76, 0.00, 4.30, 3.10, 15.06, 3.40, 4.50, 3.60, 4.00, 0.00, 4.00, 4.50, 4.00, 3.00, 3.25, 3.84, 3.76, 0.00, 4.30, 3.10, 15.00, 3.90, 3.50, 3.40, 4.50, 0.00, 4.50, 3.50, 2.50, 3.50, 4.50, 3.74, 3.84, 0.00, 3.10, 3.90, 14.58, 4.10, 3.50, 3.90, 4.50, 0.00, 5.00, 3.50, 2.50, 3.00, 4.50, 3.86, 4.14, 0.00, 3.10, 3.60, 14.70, 4.10, 4.50, 3.90, 4.50, 0.00, 5.00, 3.50, 2.50, 3.00, 4.50, 4.26, 4.14, 0.00, 3.10, 3.60, 15.10, 4.20, 5.00, 4.10, 4.50, 0.00, 4.00, 5.00, 2.50, 3.50, 4.50, 4.52, 4.26, 0.00, 4.00, 3.90, 16.68, 3.80, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 3.00, 3.25, 4.08, 3.70, 0.00, 4.00, 3.10, 14.88, 4.00, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 3.00, 3.25, 4.20, 3.70, 0.00, 4.00, 3.10, 15.00, 3.80, 4.50, 3.50, 4.00, 0.00, 4.00, 4.00, 4.00, 3.00, 3.25, 4.08, 3.70, 0.00, 4.00, 3.10, 14.88),
(77, 162, 4.10, 4.00, 4.20, 3.50, 0.00, 4.50, 4.75, 2.50, 2.50, 2.50, 4.06, 3.92, 0.00, 3.85, 2.50, 14.33, 3.20, 3.00, 4.50, 4.50, 0.00, 4.00, 5.00, 5.00, 2.00, 4.00, 3.12, 4.50, 0.00, 5.00, 2.80, 15.42, 3.80, 4.00, 4.00, 3.50, 0.00, 5.00, 4.50, 3.50, 3.00, 3.75, 3.88, 3.80, 0.00, 4.10, 3.30, 15.08, 4.00, 3.00, 4.50, 4.50, 0.00, 4.00, 5.00, 4.50, 2.50, 4.25, 3.60, 4.50, 0.00, 4.80, 3.20, 16.10, 3.80, 4.00, 4.10, 4.50, 0.00, 4.50, 4.50, 2.50, 4.00, 3.25, 3.88, 4.26, 0.00, 3.70, 3.70, 15.54, 3.60, 4.00, 3.80, 5.00, 0.00, 5.00, 3.50, 2.50, 4.00, 2.25, 3.76, 4.28, 0.00, 3.10, 3.30, 14.44, 3.80, 4.00, 4.00, 4.50, 0.00, 4.50, 5.00, 2.50, 2.50, 2.75, 3.88, 4.20, 0.00, 4.00, 2.60, 14.68, 4.10, 2.00, 4.20, 3.50, 0.00, 4.00, 3.50, 3.50, 4.25, 2.75, 3.26, 3.92, 0.00, 3.50, 3.65, 14.33, 3.40, 4.00, 4.60, 5.00, 0.00, 5.00, 5.00, 4.00, 2.50, 4.25, 3.64, 4.76, 0.00, 4.60, 3.20, 16.20, 3.20, 4.00, 4.80, 5.00, 0.00, 5.00, 5.00, 5.00, 2.50, 4.25, 3.52, 4.88, 0.00, 5.00, 3.20, 16.60, 3.20, 4.00, 4.60, 5.00, 0.00, 5.00, 5.00, 4.00, 2.50, 4.25, 3.52, 4.76, 0.00, 4.60, 3.20, 16.08, 3.30, 4.00, 4.40, 5.00, 0.00, 5.00, 5.00, 4.00, 2.50, 4.25, 3.58, 4.64, 0.00, 4.60, 3.20, 16.02, 3.20, 4.00, 4.40, 5.00, 0.00, 5.00, 5.00, 4.00, 2.50, 4.25, 3.52, 4.64, 0.00, 4.60, 3.20, 15.96, 3.60, 5.00, 4.30, 3.50, 0.00, 3.50, 4.25, 2.50, 3.00, 2.50, 4.16, 3.98, 0.00, 3.55, 2.80, 14.49, 3.70, 5.00, 4.50, 3.50, 0.00, 4.50, 4.25, 2.50, 2.50, 2.50, 4.22, 4.10, 0.00, 3.55, 2.50, 14.37, 3.70, 4.00, 4.50, 3.50, 0.00, 4.50, 4.25, 2.50, 2.50, 2.50, 3.82, 4.10, 0.00, 3.55, 2.50, 13.97, 3.50, 3.00, 4.30, 3.50, 0.00, 5.00, 4.00, 2.50, 3.00, 2.50, 3.30, 3.98, 0.00, 3.40, 2.80, 13.48, 3.10, 4.00, 4.40, 5.00, 0.00, 5.00, 4.75, 4.00, 2.50, 4.25, 3.46, 4.64, 0.00, 4.45, 3.20, 15.75, 3.30, 4.00, 4.40, 5.00, 0.00, 5.00, 4.75, 4.00, 2.50, 4.25, 3.58, 4.64, 0.00, 4.45, 3.20, 15.87, 3.10, 4.00, 4.40, 5.00, 0.00, 5.00, 4.75, 4.00, 2.50, 4.25, 3.46, 4.64, 0.00, 4.45, 3.20, 15.75),
(79, 165, 4.00, 4.00, 3.80, 5.00, 0.00, 3.50, 4.50, 2.50, 2.50, 2.50, 4.00, 4.28, 0.00, 3.70, 2.50, 14.48, 3.40, 3.00, 4.30, 4.00, 0.00, 5.00, 4.75, 5.00, 2.00, 2.75, 3.24, 4.18, 0.00, 4.85, 2.30, 14.57, 3.70, 4.00, 4.20, 5.00, 0.00, 4.50, 4.25, 3.50, 3.00, 4.00, 3.82, 4.52, 0.00, 3.95, 3.40, 15.69, 4.40, 3.00, 4.30, 4.00, 0.00, 5.00, 4.75, 4.50, 2.50, 4.25, 3.84, 4.18, 0.00, 4.65, 3.20, 15.87, 3.50, 4.00, 4.60, 4.00, 0.00, 3.50, 5.00, 2.50, 4.00, 3.50, 3.70, 4.36, 0.00, 4.00, 3.80, 15.86, 3.60, 4.00, 3.90, 3.00, 0.00, 4.50, 4.00, 2.50, 4.00, 4.25, 3.76, 3.54, 0.00, 3.40, 4.10, 14.80, 3.80, 4.00, 3.80, 4.00, 0.00, 3.50, 4.75, 2.50, 2.50, 4.00, 3.88, 3.88, 0.00, 3.85, 3.10, 14.71, 4.60, 2.00, 4.50, 5.00, 0.00, 5.00, 4.00, 3.50, 4.25, 4.00, 3.56, 4.70, 0.00, 3.80, 4.15, 16.21, 3.30, 4.00, 4.50, 3.00, 0.00, 4.50, 4.75, 4.00, 2.50, 2.25, 3.58, 3.90, 0.00, 4.45, 2.40, 14.33, 3.10, 4.00, 4.40, 3.00, 0.00, 4.50, 4.75, 5.00, 2.50, 2.25, 3.46, 3.84, 0.00, 4.85, 2.40, 14.55, 3.10, 4.00, 4.50, 3.00, 0.00, 4.50, 4.75, 4.00, 2.50, 2.25, 3.46, 3.90, 0.00, 4.45, 2.40, 14.21, 3.60, 4.00, 4.60, 3.00, 0.00, 4.50, 4.75, 4.00, 2.50, 2.25, 3.76, 3.96, 0.00, 4.45, 2.40, 14.57, 3.40, 4.00, 4.60, 3.00, 0.00, 4.50, 4.75, 4.00, 2.50, 2.25, 3.64, 3.96, 0.00, 4.45, 2.40, 14.45, 3.60, 5.00, 3.60, 5.00, 0.00, 2.50, 4.00, 2.50, 3.00, 2.50, 4.16, 4.16, 0.00, 3.40, 2.80, 14.52, 3.80, 5.00, 3.90, 5.00, 0.00, 3.50, 4.00, 2.50, 2.50, 2.50, 4.28, 4.34, 0.00, 3.40, 2.50, 14.52, 3.80, 4.00, 3.90, 5.00, 0.00, 3.50, 4.00, 2.50, 2.50, 2.50, 3.88, 4.34, 0.00, 3.40, 2.50, 14.12, 3.90, 3.00, 4.00, 5.00, 0.00, 4.50, 4.50, 2.50, 3.00, 2.50, 3.54, 4.40, 0.00, 3.70, 2.80, 14.44, 3.70, 4.00, 3.80, 3.00, 0.00, 4.50, 4.50, 4.00, 2.50, 2.25, 3.82, 3.48, 0.00, 4.30, 2.40, 14.00, 3.90, 4.00, 3.80, 3.00, 0.00, 4.50, 4.50, 4.00, 2.50, 2.25, 3.94, 3.48, 0.00, 4.30, 2.40, 14.12, 3.70, 4.00, 3.80, 3.00, 0.00, 4.50, 4.50, 4.00, 2.50, 2.25, 3.82, 3.48, 0.00, 4.30, 2.40, 14.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'Siswa'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `scoring`
--

CREATE TABLE `scoring` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `minat_bidang_seni` float(6,2) DEFAULT NULL,
  `minat_bidang_olahraga` float(6,2) DEFAULT NULL,
  `minat_bidang_akademik` float(6,2) DEFAULT NULL,
  `minat_bidang_sosial` float(6,2) DEFAULT NULL,
  `minat_bidang_teknologi` float(6,2) DEFAULT NULL,
  `kemampuan_fisik` float(6,2) DEFAULT NULL,
  `kemampuan_pemecahan_masalah` float(6,2) DEFAULT NULL,
  `kemampuan_berpikir_kritis` float(6,2) DEFAULT NULL,
  `kemampuan_manajemen_waktu` float(6,2) DEFAULT NULL,
  `kemampuan_kerja_sama_tim` float(6,2) DEFAULT NULL,
  `kemampuan_teknologi` float(6,2) DEFAULT NULL,
  `waktu_tersedia_per_minggu` float(6,2) DEFAULT NULL,
  `motivasi_pengembangan_diri` float(6,2) DEFAULT NULL,
  `motivasi_prestasi_kompetitif` float(6,2) DEFAULT NULL,
  `motivasi_sosial` float(6,2) DEFAULT NULL,
  `kepemimpinan` float(6,2) DEFAULT NULL,
  `kedisiplinan` float(6,2) DEFAULT NULL,
  `komunikasi` float(6,2) DEFAULT NULL,
  `kreativitas` float(6,2) DEFAULT NULL,
  `minat_bidang_keagamaan` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `scoring`
--

INSERT INTO `scoring` (`id`, `students_id`, `minat_bidang_seni`, `minat_bidang_olahraga`, `minat_bidang_akademik`, `minat_bidang_sosial`, `minat_bidang_teknologi`, `kemampuan_fisik`, `kemampuan_pemecahan_masalah`, `kemampuan_berpikir_kritis`, `kemampuan_manajemen_waktu`, `kemampuan_kerja_sama_tim`, `kemampuan_teknologi`, `waktu_tersedia_per_minggu`, `motivasi_pengembangan_diri`, `motivasi_prestasi_kompetitif`, `motivasi_sosial`, `kepemimpinan`, `kedisiplinan`, `komunikasi`, `kreativitas`, `minat_bidang_keagamaan`) VALUES
(35, 63, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 4.00, 4.00),
(36, 64, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 3.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00),
(37, 65, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 3.00, 4.00),
(52, 68, 3.00, 2.00, 4.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 4.00, 3.00, 3.00, 4.00),
(53, 69, 3.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 3.00, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 2.00, 5.00, 4.00),
(54, 70, 2.00, 5.00, 5.00, 3.00, 2.00, 5.00, 5.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 3.00, 2.00, 5.00, 4.00, 3.00, 3.00, 3.00),
(56, 72, 3.00, 5.00, 4.00, 4.00, 3.00, 4.00, 5.00, 3.00, 5.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 3.00),
(60, 73, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 3.00, 4.00, 5.00, 3.00, 5.00, 4.00, 3.00, 3.00, 3.00, 5.00, 4.00, 4.00, 3.00, 3.00),
(61, 71, 5.00, 4.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 5.00, 3.00, 5.00, 3.00, 4.00, 4.00, 5.00, 5.00),
(62, 74, 4.00, 5.00, 5.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 4.00, 5.00, 3.00),
(63, 75, 4.00, 5.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 5.00, 4.00, 2.00),
(64, 76, 4.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 1.00, 3.00, 5.00, 5.00, 3.00, 5.00),
(74, 80, 4.00, 5.00, 5.00, 2.00, 4.00, 3.00, 5.00, 5.00, 5.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00),
(75, 81, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 3.00, 5.00, 4.00, 5.00),
(79, 85, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 3.00, 3.00, 5.00, 4.00, 3.00, 3.00, 5.00, 4.00, 3.00, 5.00, 3.00, 3.00, 5.00),
(80, 86, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 3.00, 3.00, 5.00, 4.00, 3.00, 3.00, 5.00, 4.00, 3.00, 5.00, 3.00, 3.00, 5.00),
(81, 87, 3.00, 5.00, 5.00, 5.00, 4.00, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 2.00),
(82, 88, 3.00, 5.00, 5.00, 5.00, 4.00, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00, 5.00, 2.00),
(83, 89, 3.00, 4.00, 4.00, 4.00, 2.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 3.00, 4.00, 5.00),
(84, 90, 1.00, 5.00, 5.00, 3.00, 5.00, 3.00, 3.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 3.00, 5.00, 5.00, 5.00, 3.00),
(85, 91, 1.00, 5.00, 5.00, 3.00, 5.00, 3.00, 3.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 3.00, 5.00, 5.00, 5.00, 3.00),
(87, 94, 2.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 3.00, 3.00, 5.00, 5.00),
(88, 95, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00),
(89, 96, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 5.00),
(91, 98, 2.00, 5.00, 4.00, 2.00, 4.00, 4.00, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 3.00, 3.00, 5.00, 5.00, 3.00, 3.00, 5.00, 5.00),
(92, 99, 3.00, 5.00, 3.00, 4.00, 4.00, 3.00, 5.00, 4.00, 2.00, 5.00, 5.00, 5.00, 3.00, 5.00, 5.00, 2.00, 2.00, 5.00, 4.00, 4.00),
(93, 100, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 5.00, 3.00, 5.00, 5.00, 2.00, 3.00, 5.00, 5.00, 4.00, 1.00, 4.00, 4.00, 3.00, 3.00),
(94, 101, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 5.00, 3.00, 5.00, 5.00, 2.00, 3.00, 5.00, 5.00, 4.00, 1.00, 4.00, 4.00, 3.00, 3.00),
(95, 102, 1.00, 4.00, 5.00, 4.00, 3.00, 5.00, 3.00, 5.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 3.00, 3.00),
(96, 103, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 4.00, 3.00, 5.00, 5.00, 5.00, 3.00, 5.00, 4.00, 3.00, 3.00, 5.00, 4.00, 5.00, 3.00),
(97, 106, 5.00, 5.00, 3.00, 5.00, 4.00, 4.00, 5.00, 4.00, 4.00, 4.00, 5.00, 3.00, 5.00, 4.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(98, 107, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00, 4.00, 5.00, 2.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(99, 108, 4.00, 5.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 5.00, 4.00, 3.00, 5.00, 5.00, 5.00, 5.00, 3.00),
(100, 109, 4.00, 5.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 5.00, 4.00, 3.00, 5.00, 5.00, 5.00, 5.00, 3.00),
(101, 110, 3.00, 5.00, 4.00, 3.00, 5.00, 3.00, 2.00, 5.00, 5.00, 4.00, 4.00, 3.00, 3.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00),
(102, 111, 3.00, 5.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 5.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 5.00, 3.00, 3.00, 4.00, 5.00),
(103, 112, 3.00, 5.00, 5.00, 3.00, 3.00, 2.00, 5.00, 4.00, 4.00, 3.00, 4.00, 5.00, 3.00, 3.00, 5.00, 4.00, 2.00, 4.00, 4.00, 3.00),
(104, 113, 5.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 2.00, 4.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 2.00, 4.00),
(105, 114, 1.00, 5.00, 4.00, 5.00, 5.00, 5.00, 4.00, 2.00, 4.00, 4.00, 2.00, 4.00, 4.00, 5.00, 5.00, 5.00, 4.00, 3.00, 3.00, 2.00),
(106, 115, 4.00, 4.00, 4.00, 5.00, 4.00, 4.00, 3.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 5.00, 4.00, 4.00, 4.00),
(107, 116, 3.00, 5.00, 5.00, 3.00, 3.00, 4.00, 3.00, 1.00, 5.00, 5.00, 3.00, 3.00, 2.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(108, 117, 3.00, 5.00, 5.00, 3.00, 3.00, 4.00, 3.00, 1.00, 5.00, 5.00, 3.00, 3.00, 2.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(109, 118, 3.00, 5.00, 4.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 3.00, 5.00, 4.00, 3.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(110, 119, 4.00, 5.00, 5.00, 3.00, 3.00, 4.00, 3.00, 4.00, 3.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 4.00, 4.00),
(111, 120, 4.00, 5.00, 5.00, 3.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 5.00, 4.00),
(112, 121, 5.00, 5.00, 5.00, 4.00, 5.00, 3.00, 4.00, 5.00, 4.00, 5.00, 4.00, 2.00, 3.00, 4.00, 5.00, 3.00, 4.00, 5.00, 3.00, 3.00),
(113, 122, 3.00, 5.00, 4.00, 4.00, 4.00, 2.00, 4.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 4.00, 3.00, 4.00, 4.00),
(114, 123, 5.00, 5.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 4.00, 1.00, 3.00, 3.00, 3.00, 4.00),
(115, 124, 5.00, 5.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 3.00, 3.00, 4.00, 4.00, 5.00, 4.00, 4.00, 1.00, 3.00, 3.00, 3.00, 4.00),
(116, 126, 3.00, 5.00, 5.00, 5.00, 2.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 2.00, 5.00),
(117, 127, 3.00, 5.00, 5.00, 5.00, 2.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 2.00, 5.00),
(118, 128, 3.00, 5.00, 5.00, 5.00, 2.00, 4.00, 4.00, 5.00, 3.00, 4.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 4.00, 2.00, 5.00),
(119, 129, 5.00, 5.00, 5.00, 5.00, 4.00, 2.00, 5.00, 5.00, 3.00, 4.00, 2.00, 5.00, 5.00, 3.00, 3.00, 4.00, 5.00, 2.00, 3.00, 4.00),
(120, 130, 4.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 3.00, 3.00, 5.00, 5.00, 3.00, 2.00, 2.00, 3.00, 3.00, 4.00, 4.00, 3.00, 4.00),
(121, 131, 4.00, 4.00, 5.00, 4.00, 5.00, 5.00, 2.00, 3.00, 3.00, 5.00, 5.00, 3.00, 2.00, 2.00, 3.00, 3.00, 4.00, 4.00, 3.00, 4.00),
(122, 132, 4.00, 5.00, 5.00, 2.00, 4.00, 4.00, 4.00, 5.00, 2.00, 5.00, 4.00, 3.00, 5.00, 2.00, 4.00, 4.00, 3.00, 3.00, 5.00, 4.00),
(123, 133, 1.00, 4.00, 4.00, 2.00, 3.00, 2.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 3.00, 3.00, 5.00, 3.00, 4.00, 3.00, 3.00, 5.00),
(124, 134, 1.00, 4.00, 4.00, 2.00, 3.00, 2.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 3.00, 3.00, 5.00, 3.00, 4.00, 3.00, 3.00, 5.00),
(125, 135, 1.00, 4.00, 4.00, 2.00, 3.00, 2.00, 4.00, 4.00, 4.00, 3.00, 3.00, 5.00, 3.00, 3.00, 5.00, 3.00, 4.00, 3.00, 3.00, 5.00),
(126, 136, 2.00, 5.00, 4.00, 5.00, 4.00, 3.00, 5.00, 3.00, 4.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 5.00, 4.00, 3.00, 4.00, 2.00),
(127, 137, 2.00, 5.00, 5.00, 4.00, 4.00, 3.00, 3.00, 5.00, 5.00, 4.00, 2.00, 3.00, 5.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 2.00),
(128, 138, 2.00, 5.00, 5.00, 4.00, 4.00, 3.00, 3.00, 5.00, 5.00, 4.00, 2.00, 3.00, 5.00, 4.00, 4.00, 4.00, 3.00, 5.00, 5.00, 2.00),
(129, 138, 3.00, 5.00, 5.00, 3.00, 3.00, 2.00, 2.00, 5.00, 5.00, 3.00, 1.00, 2.00, 2.00, 2.00, 5.00, 4.00, 3.00, 2.00, 3.00, 4.00),
(130, 139, 3.00, 5.00, 5.00, 4.00, 5.00, 1.00, 3.00, 4.00, 5.00, 4.00, 5.00, 4.00, 4.00, 3.00, 5.00, 5.00, 3.00, 4.00, 4.00, 4.00),
(131, 141, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 2.00, 4.00, 2.00, 4.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 5.00),
(132, 142, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 2.00, 4.00, 2.00, 4.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 5.00),
(133, 143, 2.00, 5.00, 4.00, 4.00, 4.00, 4.00, 4.00, 5.00, 5.00, 2.00, 4.00, 2.00, 4.00, 5.00, 4.00, 3.00, 3.00, 3.00, 3.00, 5.00),
(134, 144, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 2.00, 2.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(135, 145, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 2.00, 2.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(136, 146, 5.00, 5.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 2.00, 2.00, 5.00, 3.00, 3.00, 4.00, 3.00, 3.00),
(137, 147, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(138, 148, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(139, 149, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(140, 150, 3.00, 5.00, 3.00, 1.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 3.00, 4.00, 4.00, 4.00, 5.00, 4.00, 3.00, 4.00, 3.00, 4.00),
(141, 151, 4.00, 5.00, 4.00, 4.00, 4.00, 2.00, 3.00, 3.00, 3.00, 5.00, 2.00, 3.00, 3.00, 1.00, 5.00, 4.00, 4.00, 3.00, 3.00, 3.00),
(142, 152, 2.00, 5.00, 4.00, 2.00, 5.00, 3.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 3.00, 3.00, 4.00, 5.00, 3.00, 4.00),
(143, 153, 2.00, 5.00, 4.00, 2.00, 5.00, 3.00, 4.00, 4.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 3.00, 3.00, 4.00, 5.00, 3.00, 4.00),
(144, 155, 3.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 2.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00),
(145, 156, 3.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 2.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00),
(146, 157, 3.00, 5.00, 3.00, 4.00, 3.00, 4.00, 3.00, 5.00, 5.00, 4.00, 4.00, 3.00, 2.00, 3.00, 4.00, 4.00, 3.00, 5.00, 3.00, 5.00),
(147, 159, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 5.00, 2.00, 2.00, 5.00, 4.00),
(148, 160, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 5.00, 2.00, 2.00, 5.00, 4.00),
(149, 161, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 3.00, 4.00, 5.00, 4.00, 4.00, 5.00, 2.00, 2.00, 5.00, 4.00),
(150, 162, 4.00, 4.00, 1.00, 2.00, 2.00, 5.00, 4.00, 4.00, 2.00, 4.00, 4.00, 3.00, 4.00, 4.00, 5.00, 5.00, 3.00, 5.00, 3.00, 4.00),
(152, 165, 5.00, 5.00, 5.00, 2.00, 4.00, 3.00, 4.00, 5.00, 4.00, 5.00, 5.00, 4.00, 4.00, 4.00, 5.00, 5.00, 5.00, 3.00, 4.00, 4.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skala`
--

CREATE TABLE `skala` (
  `id` int(11) NOT NULL,
  `nilai_pertama` float(6,2) NOT NULL,
  `kondisi_pertama` varchar(10) NOT NULL,
  `nilai_kedua` float(6,2) NOT NULL,
  `kondisi_kedua` varchar(10) NOT NULL,
  `skala` float NOT NULL,
  `sub_kriteria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skala`
--

INSERT INTO `skala` (`id`, `nilai_pertama`, `kondisi_pertama`, `nilai_kedua`, `kondisi_kedua`, `skala`, `sub_kriteria_id`) VALUES
(1, 61.00, '2', 100.00, '4', 5, 1),
(2, 56.00, '2', 60.00, '4', 4, 1),
(3, 51.00, '2', 55.00, '4', 3, 1),
(4, 46.00, '2', 50.00, '4', 2, 1),
(5, 0.00, '2', 45.00, '4', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `nis`, `nama_siswa`, `jenis_kelamin`, `kelas`, `tahun_ajaran`) VALUES
(165, '3322', 'refauzan', 'Laki-Laki', 'xii', '2025'),
(166, '3221', 'daffa', 'Perempuan', 'xii', '2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` int(11) NOT NULL,
  `sub_kriteria` varchar(100) NOT NULL,
  `faktor` varchar(100) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `sub_kriteria`, `faktor`, `kode`, `kriteria_id`, `keterangan`) VALUES
(55, 'Minat bidang seni', 'NCF', 'C1', 21, 'Ketertarikan pada kegiatan seni (musik, tari)'),
(56, 'Minat bidang olahraga', 'NCF', 'C2', 21, 'Ketertarikan pada kegiatan olahraga'),
(57, 'Minat bidang akademik', 'NCF', 'C3', 21, 'Ketertarikan pada kegiatan akademik/ilmiah'),
(58, 'Minat bidang sosial', 'NCF', 'C4', 21, 'Ketertarikan pada kegiatan sosial/kemanusiaan'),
(59, 'Minat bidang teknologi', 'NSF', 'C5', 21, 'Ketertarikan pada bidang teknologi \r\n'),
(60, 'Kemampuan fisik', 'NCF', 'C6', 22, 'Kemampuan fisik untuk ekstrakurikuler olahraga dan beladiri\r\n'),
(61, 'Kemampuan pemecahan masalah', 'NSF', 'C7', 22, 'Kemampuan dalam memecahkan masalah'),
(62, 'Kemampuan berpikir kritis', 'NCF', 'C8', 22, 'Kemampuan analisis dan logika dalam akademik'),
(63, 'Kemampuan manajemen waktu', 'NCF', 'C9', 22, 'Kemampuan Memanajemen waktu dengan baik\r\n'),
(64, 'Kemampuan kerja sama tim', 'NCF', 'C10', 22, 'Kemampuan bekerja sama dalam tim\r\n'),
(65, 'Kemampuan teknologi', 'NCF', 'C11', 22, 'Kemampuan dalam bidang teknologi \r\n'),
(66, 'Waktu tersedia per minggu', 'NSF', 'C12', 23, 'Jumlah jam waktu yang dapat dihabiskan'),
(67, 'Motivasi pengembangan diri', 'NCF', 'C13', 24, 'Motivasi untuk belajar dan berkembang'),
(68, 'Motivasi prestasi kompetitif', 'NCF', 'C14', 24, 'Motivasi untuk berkompetisi dan meraih prestasi'),
(69, 'Motivasi sosial', 'NSF', 'C15', 24, 'Motivasi untuk berinteraksi dan berkontribusi sosial'),
(70, 'Kepemimpinan', 'NCF', 'C16', 25, 'Kemampuan memimpin dan memotivasi kelompok'),
(71, 'Kedisiplinan', 'NCF', 'C17', 25, 'Tingkat konsistensi dan ketaatan aturan'),
(72, 'Komunikasi', 'NSF', 'C18', 25, 'Kemampuan berkomunikasi efektif'),
(73, 'Kreativitas', 'NSF', 'C19', 25, 'Kemampuan inovasi dan menghasilkan ide baru'),
(74, 'Minat bidang Keagamaan', 'NCF', 'C20', 21, 'Ketertarikan pada kegiatan Keagamaan\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role_id`) VALUES
(23, 'admin', 'admin', 'admin', 2),
(27, 'refauzan ', 'refauzan', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftra_ekskul`
--
ALTER TABLE `daftra_ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_bobot_gap`
--
ALTER TABLE `nilai_bobot_gap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_gap`
--
ALTER TABLE `nilai_gap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_murni`
--
ALTER TABLE `nilai_murni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_target`
--
ALTER TABLE `nilai_target`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile_matching`
--
ALTER TABLE `profile_matching`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `scoring`
--
ALTER TABLE `scoring`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skala`
--
ALTER TABLE `skala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftra_ekskul`
--
ALTER TABLE `daftra_ekskul`
  MODIFY `id_ekskul` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `nilai_bobot_gap`
--
ALTER TABLE `nilai_bobot_gap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `nilai_gap`
--
ALTER TABLE `nilai_gap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `nilai_murni`
--
ALTER TABLE `nilai_murni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT untuk tabel `nilai_target`
--
ALTER TABLE `nilai_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT untuk tabel `profile_matching`
--
ALTER TABLE `profile_matching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `scoring`
--
ALTER TABLE `scoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `skala`
--
ALTER TABLE `skala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
