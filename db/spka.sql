-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2025 pada 11.00
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
-- Database: `spka`
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
(181, 'C1', 172, 5.00, 4.50, 4.50, 5.00, 4.50, 4.50, 5.00, 4.00, 4.50, 4.50, 4.50, 4.50, 4.50, 2.00, 2.00, 2.00, 2.00, 3.00, 3.00, 3.00),
(182, 'C2', 172, 1.50, 4.50, 2.50, 3.50, 1.50, 1.50, 1.50, 1.50, 5.00, 5.00, 5.00, 5.00, 5.00, 1.50, 1.50, 1.50, 1.50, 5.00, 5.00, 5.00),
(183, 'C3', 172, 5.00, 5.00, 3.00, 3.00, 3.00, 1.00, 2.00, 2.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00),
(184, 'C4', 172, 5.00, 4.50, 4.00, 5.00, 4.00, 4.00, 4.50, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.50, 4.50, 4.50, 4.50, 5.00, 5.00, 5.00),
(185, 'C5', 172, 1.50, 1.50, 1.50, 1.50, 3.50, 3.50, 2.50, 3.50, 1.50, 1.50, 1.50, 1.50, 1.50, 3.50, 2.50, 2.50, 3.50, 1.50, 1.50, 1.50),
(186, 'C6', 172, 1.50, 4.50, 2.50, 3.50, 1.50, 1.50, 1.50, 2.50, 5.00, 4.50, 5.00, 5.00, 5.00, 1.50, 1.50, 1.50, 1.50, 5.00, 5.00, 5.00),
(187, 'C7', 172, 4.50, 5.00, 4.00, 5.00, 5.00, 4.00, 5.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 3.50, 3.50, 3.50, 4.00, 4.50, 4.50, 4.50),
(188, 'C8', 172, 5.00, 5.00, 5.00, 5.00, 4.00, 3.00, 5.00, 3.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.00, 5.00, 5.00, 5.00),
(189, 'C9', 172, 4.50, 4.00, 5.00, 4.00, 4.50, 5.00, 4.50, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 3.50, 4.50, 4.50, 5.00, 5.00, 5.00, 5.00),
(190, 'C10', 172, 3.50, 5.00, 4.50, 4.50, 3.50, 2.50, 2.50, 4.50, 5.00, 4.50, 5.00, 5.00, 5.00, 2.50, 4.50, 4.50, 4.50, 2.50, 2.50, 2.50),
(191, 'C11', 172, 1.50, 1.50, 3.50, 2.50, 4.50, 4.50, 3.50, 3.50, 2.50, 2.50, 2.50, 2.50, 2.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 1.50),
(192, 'C12', 172, 4.50, 5.00, 4.50, 4.50, 5.00, 4.50, 4.50, 5.00, 5.00, 5.00, 5.00, 4.00, 4.00, 4.50, 4.50, 4.50, 4.50, 5.00, 5.00, 5.00),
(193, 'C13', 172, 4.50, 5.00, 4.50, 5.00, 5.00, 4.00, 4.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 5.00, 4.50, 4.50, 4.50, 5.00, 5.00, 5.00),
(194, 'C14', 172, 3.50, 4.50, 3.50, 4.50, 4.50, 5.00, 4.50, 3.50, 5.00, 5.00, 5.00, 5.00, 5.00, 3.50, 3.50, 3.50, 3.50, 5.00, 5.00, 5.00),
(195, 'C15', 172, 5.00, 4.50, 4.00, 5.00, 5.00, 4.50, 4.50, 4.00, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 5.00, 4.50, 4.50, 4.50),
(196, 'C16', 172, 4.50, 5.00, 4.50, 5.00, 4.50, 4.50, 4.50, 4.00, 4.50, 4.50, 4.50, 4.50, 4.50, 3.50, 3.50, 4.50, 5.00, 4.50, 4.50, 4.50),
(197, 'C17', 172, 4.50, 5.00, 4.50, 5.00, 3.50, 3.50, 3.50, 5.00, 4.50, 4.50, 4.50, 5.00, 5.00, 3.50, 3.50, 3.50, 3.50, 5.00, 5.00, 5.00),
(198, 'C18', 172, 4.50, 4.50, 4.50, 5.00, 5.00, 5.00, 4.00, 5.00, 4.50, 4.50, 4.50, 4.50, 4.50, 4.50, 5.00, 5.00, 4.00, 4.50, 4.50, 4.50),
(199, 'C19', 172, 3.50, 3.50, 3.50, 4.50, 4.50, 5.00, 4.50, 4.50, 3.50, 2.50, 2.50, 4.50, 3.50, 4.50, 4.50, 4.50, 4.50, 2.50, 3.50, 2.50),
(200, 'C20', 172, 3.00, 3.50, 5.00, 5.00, 3.50, 3.50, 3.50, 5.00, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50, 3.50);

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
(178, 172, 2.00, 5.00, 1.00, 3.00, 5.00, 5.00, 4.00, 3.00, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 3.00);

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
(1, 'ROHIS (Rohani Islam)', 2, 55),
(2, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 55),
(3, 'PMR (Palang Merah Remaja)', 1, 55),
(4, 'PRAMUKA', 2, 55),
(5, 'KABAR 15', 1, 55),
(6, 'KIR (Karya Ilmiah Remaja)', 1, 55),
(7, 'JAPANESE CLUB', 2, 55),
(8, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 55),
(9, 'BASKET', 1, 55),
(10, 'BADMINTON (Bulutangkis)', 1, 55),
(11, 'VOLI (Volleyball)', 1, 55),
(12, 'SEPAK BOLA', 1, 55),
(13, 'FUTSAL', 1, 55),
(14, 'SENI SUARA', 5, 55),
(15, 'TARI SAMAN', 5, 55),
(16, 'TARI LENGGANG CISADANE', 5, 55),
(17, 'TEATER', 5, 55),
(18, 'TAEKWONDO', 4, 55),
(19, 'CANDA BIRAWA', 4, 55),
(20, 'BELA DIRI MATAHARI', 4, 55),
(21, 'ROHIS (Rohani Islam)', 1, 56),
(22, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 56),
(23, 'PMR (Palang Merah Remaja)', 2, 56),
(24, 'PRAMUKA', 3, 56),
(25, 'KABAR 15', 1, 56),
(26, 'KIR (Karya Ilmiah Remaja)', 1, 56),
(27, 'JAPANESE CLUB', 1, 56),
(28, 'OSIS (Organisasi Siswa Intra Sekolah)', 1, 56),
(29, 'BASKET', 5, 56),
(30, 'BADMINTON (Bulutangkis)', 5, 56),
(31, 'VOLI (Volleyball)', 5, 56),
(32, 'SEPAK BOLA', 5, 56),
(33, 'FUTSAL', 5, 56),
(34, 'SENI SUARA', 1, 56),
(35, 'TARI SAMAN', 1, 56),
(36, 'TARI LENGGANG CISADANE', 1, 56),
(37, 'TEATER', 1, 56),
(38, 'TAEKWONDO', 5, 56),
(39, 'CANDA BIRAWA', 5, 56),
(40, 'BELA DIRI MATAHARI', 5, 56),
(41, 'ROHIS (Rohani Islam)', 1, 57),
(42, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 57),
(43, 'PMR (Palang Merah Remaja)', 3, 57),
(44, 'PRAMUKA', 3, 57),
(45, 'KABAR 15', 3, 57),
(46, 'KIR (Karya Ilmiah Remaja)', 5, 57),
(47, 'JAPANESE CLUB', 4, 57),
(48, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 57),
(49, 'BASKET', 1, 57),
(50, 'BADMINTON (Bulutangkis)', 1, 57),
(51, 'VOLI (Volleyball)', 1, 57),
(52, 'SEPAK BOLA', 1, 57),
(53, 'FUTSAL', 1, 57),
(54, 'SENI SUARA', 1, 57),
(55, 'TARI SAMAN', 1, 57),
(56, 'TARI LENGGANG CISADANE', 1, 57),
(57, 'TEATER', 1, 57),
(58, 'TAEKWONDO', 1, 57),
(59, 'CANDA BIRAWA', 1, 57),
(60, 'BELA DIRI MATAHARI', 1, 57),
(61, 'ROHIS (Rohani Islam)', 3, 58),
(62, 'PASKIBRA (Pasukan Pengibar Bendera)', 2, 58),
(63, 'PRAMUKA', 3, 58),
(64, 'PMR (Palang Merah Remaja)', 4, 58),
(65, 'KABAR 15', 4, 58),
(66, 'KIR (Karya Ilmiah Remaja)', 4, 58),
(67, 'JAPANESE CLUB', 2, 58),
(68, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 58),
(69, 'BASKET', 3, 58),
(70, 'BADMINTON (Bulutangkis)', 3, 58),
(71, 'VOLI (Volleyball)', 3, 58),
(72, 'SEPAK BOLA', 3, 58),
(73, 'FUTSAL', 3, 58),
(74, 'SENI SUARA', 2, 58),
(75, 'TARI SAMAN', 2, 58),
(76, 'TARI LENGGANG CISADANE', 2, 58),
(77, 'TEATER', 2, 58),
(78, 'TAEKWONDO', 3, 58),
(79, 'CANDA BIRAWA', 3, 58),
(80, 'BELA DIRI MATAHARI', 3, 58),
(81, 'ROHIS (Rohani Islam)', 1, 59),
(82, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 59),
(83, 'PMR (Palang Merah Remaja)', 1, 59),
(84, 'PRAMUKA', 1, 59),
(85, 'KABAR 15', 3, 59),
(86, 'KIR (Karya Ilmiah Remaja)', 3, 59),
(87, 'JAPANESE CLUB', 2, 59),
(88, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 59),
(89, 'BASKET', 1, 59),
(90, 'BADMINTON (Bulutangkis)', 1, 59),
(91, 'VOLI (Volleyball)', 1, 59),
(92, 'SEPAK BOLA', 1, 59),
(93, 'FUTSAL', 1, 59),
(94, 'SENI SUARA', 3, 59),
(95, 'TARI SAMAN', 2, 59),
(96, 'TARI LENGGANG CISADANE', 2, 59),
(97, 'TEATER', 3, 59),
(98, 'TAEKWONDO', 1, 59),
(99, 'CANDA BIRAWA', 1, 59),
(100, 'BELA DIRI MATAHARI', 1, 59),
(101, 'ROHIS (Rohani Islam)', 1, 60),
(102, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 60),
(103, 'PMR (Palang Merah Remaja)', 2, 60),
(104, 'PRAMUKA', 3, 60),
(105, 'KABAR 15', 1, 60),
(106, 'KIR (Karya Ilmiah Remaja)', 1, 60),
(107, 'JAPANESE CLUB', 1, 60),
(108, 'OSIS (Organisasi Siswa Intra Sekolah)', 2, 60),
(109, 'BASKET', 5, 60),
(110, 'BADMINTON (Bulutangkis)', 4, 60),
(111, 'VOLI (Volleyball)', 5, 60),
(112, 'SEPAK BOLA', 5, 60),
(113, 'FUTSAL', 5, 60),
(114, 'SENI SUARA', 1, 60),
(115, 'TARI SAMAN', 1, 60),
(116, 'TARI LENGGANG CISADANE', 1, 60),
(117, 'TEATER', 1, 60),
(118, 'TAEKWONDO', 5, 60),
(119, 'CANDA BIRAWA', 5, 60),
(120, 'BELA DIRI MATAHARI', 5, 60),
(121, 'ROHIS (Rohani Islam)', 3, 61),
(122, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 61),
(123, 'PMR (Palang Merah Remaja)', 5, 61),
(124, 'PRAMUKA', 4, 61),
(125, 'KABAR 15', 4, 61),
(126, 'KIR (Karya Ilmiah Remaja)', 5, 61),
(127, 'JAPANESE CLUB', 4, 61),
(128, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 61),
(129, 'BASKET', 4, 61),
(130, 'BADMINTON (Bulutangkis)', 4, 61),
(131, 'VOLI (Volleyball)', 4, 61),
(132, 'SEPAK BOLA', 4, 61),
(133, 'FUTSAL', 4, 61),
(134, 'SENI SUARA', 2, 61),
(135, 'TARI SAMAN', 2, 61),
(136, 'TARI LENGGANG CISADANE', 2, 61),
(137, 'TEATER', 5, 61),
(138, 'TAEKWONDO', 3, 61),
(139, 'CANDA BIRAWA', 3, 61),
(140, 'BELA DIRI MATAHARI', 3, 61),
(141, 'ROHIS (Rohani Islam)', 3, 62),
(142, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 62),
(143, 'PMR (Palang Merah Remaja)', 3, 62),
(144, 'PRAMUKA', 3, 62),
(145, 'KABAR 15', 4, 62),
(146, 'KIR (Karya Ilmiah Remaja)', 5, 62),
(147, 'JAPANESE CLUB', 3, 62),
(148, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 62),
(149, 'BASKET', 3, 62),
(150, 'BADMINTON (Bulutangkis)', 3, 62),
(151, 'VOLI (Volleyball)', 3, 62),
(152, 'SEPAK BOLA', 3, 62),
(153, 'FUTSAL', 3, 62),
(154, 'SENI SUARA', 3, 62),
(155, 'TARI SAMAN', 3, 62),
(156, 'TARI LENGGANG CISADANE', 3, 62),
(157, 'TEATER', 4, 62),
(158, 'TAEKWONDO', 3, 62),
(159, 'CANDA BIRAWA', 3, 62),
(160, 'BELA DIRI MATAHARI', 3, 62),
(161, 'ROHIS (Rohani Islam)', 3, 63),
(162, 'PASKIBRA (Pasukan Pengibar Bendera)', 5, 63),
(163, 'PMR (Palang Merah Remaja)', 4, 63),
(164, 'PRAMUKA', 5, 63),
(165, 'KABAR 15', 3, 63),
(166, 'KIR (Karya Ilmiah Remaja)', 4, 63),
(167, 'JAPANESE CLUB', 3, 63),
(168, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 63),
(169, 'BASKET', 4, 63),
(170, 'BADMINTON (Bulutangkis)', 4, 63),
(171, 'VOLI (Volleyball)', 4, 63),
(172, 'SEPAK BOLA', 4, 63),
(173, 'FUTSAL', 4, 63),
(174, 'SENI SUARA', 2, 63),
(175, 'TARI SAMAN', 3, 63),
(176, 'TARI LENGGANG CISADANE', 3, 63),
(177, 'TEATER', 4, 63),
(178, 'TAEKWONDO', 4, 63),
(179, 'CANDA BIRAWA', 4, 63),
(180, 'BELA DIRI MATAHARI', 4, 63),
(181, 'ROHIS (Rohani Islam)', 3, 64),
(182, 'PASKIBRA (Pasukan Pengibar Bendera)', 5, 64),
(183, 'PMR (Palang Merah Remaja)', 4, 64),
(184, 'PRAMUKA', 4, 64),
(185, 'KABAR 15', 3, 64),
(186, 'KIR (Karya Ilmiah Remaja)', 2, 64),
(187, 'JAPANESE CLUB', 2, 64),
(188, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 64),
(189, 'BASKET', 5, 64),
(190, 'BADMINTON (Bulutangkis)', 4, 64),
(191, 'VOLI (Volleyball)', 5, 64),
(192, 'SEPAK BOLA', 5, 64),
(193, 'FUTSAL', 5, 64),
(194, 'SENI SUARA', 2, 64),
(195, 'TARI SAMAN', 4, 64),
(196, 'TARI LENGGANG CISADANE', 4, 64),
(197, 'TEATER', 4, 64),
(198, 'TAEKWONDO', 2, 64),
(199, 'CANDA BIRAWA', 2, 64),
(200, 'BELA DIRI MATAHARI', 2, 64),
(201, 'ROHIS (Rohani Islam)', 1, 65),
(202, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 65),
(203, 'PRAMUKA', 2, 65),
(204, 'KABAR 15', 4, 65),
(205, 'KIR (Karya Ilmiah Remaja)', 4, 65),
(206, 'JAPANESE CLUB', 3, 65),
(207, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 65),
(208, 'BASKET', 2, 65),
(209, 'BADMINTON (Bulutangkis)', 2, 65),
(210, 'VOLI (Volleyball)', 2, 65),
(211, 'SEPAK BOLA', 2, 65),
(212, 'FUTSAL', 2, 65),
(213, 'SENI SUARA', 1, 65),
(214, 'TARI SAMAN', 1, 65),
(215, 'TARI LENGGANG CISADANE', 1, 65),
(216, 'TEATER', 1, 65),
(217, 'TAEKWONDO', 1, 65),
(218, 'CANDA BIRAWA', 1, 65),
(219, 'BELA DIRI MATAHARI', 1, 65),
(220, 'PMR (Palang Merah Remaja)', 3, 65),
(221, 'ROHIS (Rohani Islam)', 3, 66),
(222, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 66),
(223, 'PMR (Palang Merah Remaja)', 3, 66),
(224, 'PRAMUKA', 3, 66),
(225, 'KABAR 15', 4, 66),
(226, 'KIR (Karya Ilmiah Remaja)', 3, 66),
(227, 'JAPANESE CLUB', 3, 66),
(228, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 66),
(229, 'BASKET', 4, 66),
(230, 'BADMINTON (Bulutangkis)', 4, 66),
(231, 'VOLI (Volleyball)', 4, 66),
(232, 'SEPAK BOLA', 5, 66),
(233, 'FUTSAL', 5, 66),
(234, 'SENI SUARA', 3, 66),
(235, 'TARI SAMAN', 3, 66),
(236, 'TARI LENGGANG CISADANE', 3, 66),
(237, 'TEATER', 3, 66),
(238, 'TAEKWONDO', 4, 66),
(239, 'CANDA BIRAWA', 4, 66),
(240, 'BELA DIRI MATAHARI', 4, 66),
(241, 'ROHIS (Rohani Islam)', 3, 67),
(242, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 67),
(243, 'PMR (Palang Merah Remaja)', 3, 67),
(244, 'PRAMUKA', 4, 67),
(245, 'KABAR 15', 4, 67),
(246, 'KIR (Karya Ilmiah Remaja)', 5, 67),
(247, 'JAPANESE CLUB', 5, 67),
(248, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 67),
(249, 'BASKET', 4, 67),
(250, 'BADMINTON (Bulutangkis)', 4, 67),
(251, 'VOLI (Volleyball)', 4, 67),
(252, 'SEPAK BOLA', 4, 67),
(253, 'FUTSAL', 4, 67),
(254, 'SENI SUARA', 4, 67),
(255, 'TARI SAMAN', 3, 67),
(256, 'TARI LENGGANG CISADANE', 3, 67),
(257, 'TEATER', 3, 67),
(258, 'TAEKWONDO', 4, 67),
(259, 'CANDA BIRAWA', 4, 67),
(260, 'BELA DIRI MATAHARI', 4, 67),
(261, 'ROHIS (Rohani Islam)', 3, 68),
(262, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 68),
(263, 'PMR (Palang Merah Remaja)', 3, 68),
(264, 'PRAMUKA', 4, 68),
(265, 'KABAR 15', 4, 68),
(266, 'KIR (Karya Ilmiah Remaja)', 5, 68),
(267, 'JAPANESE CLUB', 4, 68),
(268, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 68),
(269, 'BASKET', 5, 68),
(270, 'BADMINTON (Bulutangkis)', 5, 68),
(271, 'VOLI (Volleyball)', 5, 68),
(272, 'SEPAK BOLA', 5, 68),
(273, 'FUTSAL', 5, 68),
(274, 'SENI SUARA', 3, 68),
(275, 'TARI SAMAN', 3, 68),
(276, 'TARI LENGGANG CISADANE', 3, 68),
(277, 'TEATER', 3, 68),
(278, 'TAEKWONDO', 5, 68),
(279, 'CANDA BIRAWA', 5, 68),
(280, 'BELA DIRI MATAHARI', 5, 68),
(281, 'ROHIS (Rohani Islam)', 4, 69),
(282, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 69),
(283, 'PMR (Palang Merah Remaja)', 5, 69),
(284, 'PRAMUKA', 4, 69),
(285, 'KABAR 15', 4, 69),
(286, 'KIR (Karya Ilmiah Remaja)', 3, 69),
(287, 'JAPANESE CLUB', 3, 69),
(288, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 69),
(289, 'BASKET', 3, 69),
(290, 'BADMINTON (Bulutangkis)', 3, 69),
(291, 'VOLI (Volleyball)', 3, 69),
(292, 'SEPAK BOLA', 3, 69),
(293, 'FUTSAL', 3, 69),
(294, 'SENI SUARA', 3, 69),
(295, 'TARI SAMAN', 3, 69),
(296, 'TARI LENGGANG CISADANE', 3, 69),
(297, 'TEATER', 4, 69),
(298, 'TAEKWONDO', 3, 69),
(299, 'CANDA BIRAWA', 3, 69),
(300, 'BELA DIRI MATAHARI', 3, 69),
(301, 'ROHIS (Rohani Islam)', 3, 70),
(302, 'PASKIBRA (Pasukan Pengibar Bendera)', 4, 70),
(303, 'PMR (Palang Merah Remaja)', 3, 70),
(304, 'PRAMUKA', 4, 70),
(305, 'KABAR 15', 3, 70),
(306, 'KIR (Karya Ilmiah Remaja)', 3, 70),
(307, 'JAPANESE CLUB', 3, 70),
(308, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 70),
(309, 'BASKET', 3, 70),
(310, 'BADMINTON (Bulutangkis)', 3, 70),
(311, 'VOLI (Volleyball)', 3, 70),
(312, 'SEPAK BOLA', 3, 70),
(313, 'FUTSAL', 3, 70),
(314, 'SENI SUARA', 2, 70),
(315, 'TARI SAMAN', 2, 70),
(316, 'TARI LENGGANG CISADANE', 3, 70),
(317, 'TEATER', 4, 70),
(318, 'TAEKWONDO', 3, 70),
(319, 'CANDA BIRAWA', 3, 70),
(320, 'BELA DIRI MATAHARI', 3, 70),
(321, 'ROHIS (Rohani Islam)', 4, 71),
(322, 'PASKIBRA (Pasukan Pengibar Bendera)', 5, 71),
(323, 'PMR (Palang Merah Remaja)', 4, 71),
(324, 'PRAMUKA', 5, 71),
(325, 'KABAR 15', 3, 71),
(326, 'KIR (Karya Ilmiah Remaja)', 3, 71),
(327, 'JAPANESE CLUB', 3, 71),
(328, 'OSIS (Organisasi Siswa Intra Sekolah)', 5, 71),
(329, 'BASKET', 4, 71),
(330, 'BADMINTON (Bulutangkis)', 4, 71),
(331, 'VOLI (Volleyball)', 4, 71),
(332, 'SEPAK BOLA', 5, 71),
(333, 'FUTSAL', 5, 71),
(334, 'SENI SUARA', 3, 71),
(335, 'TARI SAMAN', 3, 71),
(336, 'TARI LENGGANG CISADANE', 3, 71),
(337, 'TEATER', 3, 71),
(338, 'TAEKWONDO', 5, 71),
(339, 'CANDA BIRAWA', 5, 71),
(340, 'BELA DIRI MATAHARI', 5, 71),
(341, 'ROHIS (Rohani Islam)', 3, 72),
(342, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 72),
(343, 'PMR (Palang Merah Remaja)', 3, 72),
(344, 'PRAMUKA', 4, 72),
(345, 'KABAR 15', 4, 72),
(346, 'KIR (Karya Ilmiah Remaja)', 4, 72),
(347, 'JAPANESE CLUB', 5, 72),
(348, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 72),
(349, 'BASKET', 3, 72),
(350, 'BADMINTON (Bulutangkis)', 3, 72),
(351, 'VOLI (Volleyball)', 3, 72),
(352, 'SEPAK BOLA', 3, 72),
(353, 'FUTSAL', 3, 72),
(354, 'SENI SUARA', 3, 72),
(355, 'TARI SAMAN', 4, 72),
(356, 'TARI LENGGANG CISADANE', 4, 72),
(357, 'TEATER', 5, 72),
(358, 'TAEKWONDO', 3, 72),
(359, 'CANDA BIRAWA', 3, 72),
(360, 'BELA DIRI MATAHARI', 3, 72),
(361, 'ROHIS (Rohani Islam)', 3, 73),
(362, 'PASKIBRA (Pasukan Pengibar Bendera)', 3, 73),
(363, 'PMR (Palang Merah Remaja)', 3, 73),
(364, 'PRAMUKA', 4, 73),
(365, 'KABAR 15', 4, 73),
(366, 'KIR (Karya Ilmiah Remaja)', 5, 73),
(367, 'JAPANESE CLUB', 4, 73),
(368, 'OSIS (Organisasi Siswa Intra Sekolah)', 4, 73),
(369, 'BASKET', 3, 73),
(370, 'BADMINTON (Bulutangkis)', 2, 73),
(371, 'VOLI (Volleyball)', 2, 73),
(372, 'SEPAK BOLA', 4, 73),
(373, 'FUTSAL', 3, 73),
(374, 'SENI SUARA', 4, 73),
(375, 'TARI SAMAN', 4, 73),
(376, 'TARI LENGGANG CISADANE', 4, 73),
(377, 'TEATER', 4, 73),
(378, 'TAEKWONDO', 2, 73),
(379, 'CANDA BIRAWA', 3, 73),
(380, 'BELA DIRI MATAHARI', 2, 73),
(381, 'ROHIS (Rohani Islam)', 5, 74),
(382, 'PASKIBRA (Pasukan Pengibar Bendera)', 1, 74),
(383, 'PMR (Palang Merah Remaja)', 3, 74),
(384, 'PRAMUKA', 3, 74),
(385, 'KABAR 15', 1, 74),
(386, 'KIR (Karya Ilmiah Remaja)', 1, 74),
(387, 'JAPANESE CLUB', 1, 74),
(388, 'OSIS (Organisasi Siswa Intra Sekolah)', 3, 74),
(389, 'BASKET', 1, 74),
(390, 'BADMINTON (Bulutangkis)', 1, 74),
(391, 'VOLI (Volleyball)', 1, 74),
(392, 'SEPAK BOLA', 1, 74),
(393, 'FUTSAL', 1, 74),
(394, 'SENI SUARA', 1, 74),
(395, 'TARI SAMAN', 1, 74),
(396, 'TARI LENGGANG CISADANE', 1, 74),
(397, 'TEATER', 1, 74),
(398, 'TAEKWONDO', 1, 74),
(399, 'CANDA BIRAWA', 1, 74),
(400, 'BELA DIRI MATAHARI', 1, 74);

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
(99, 172, 3.90, 1.50, 3.20, 4.50, 0.00, 4.50, 4.00, 5.00, 4.50, 4.00, 2.94, 3.72, 1.80, 4.40, 4.30, 17.16, 4.40, 1.50, 4.00, 5.00, 0.00, 5.00, 4.75, 4.50, 5.00, 4.00, 3.24, 4.40, 2.00, 4.65, 4.60, 18.89, 3.80, 1.50, 4.10, 4.00, 0.00, 4.50, 4.00, 4.00, 4.50, 4.00, 2.88, 4.06, 1.80, 4.00, 4.30, 17.04, 4.30, 1.50, 3.90, 5.00, 0.00, 4.50, 4.75, 5.00, 5.00, 4.75, 3.18, 4.34, 1.80, 4.85, 4.90, 19.07, 3.30, 3.50, 3.60, 5.00, 0.00, 5.00, 4.75, 5.00, 4.00, 4.75, 3.38, 4.16, 2.00, 4.85, 4.30, 18.69, 2.90, 3.50, 3.30, 4.00, 0.00, 4.50, 4.50, 4.50, 4.00, 5.00, 3.14, 3.58, 1.80, 4.50, 4.40, 17.42, 3.30, 2.50, 3.40, 5.00, 0.00, 4.50, 4.25, 4.50, 4.00, 4.25, 2.98, 4.04, 1.80, 4.35, 4.10, 17.27, 3.10, 3.50, 3.50, 4.00, 0.00, 5.00, 4.25, 4.00, 4.50, 4.75, 3.26, 3.70, 2.00, 4.15, 4.60, 17.71, 4.60, 1.50, 4.50, 5.00, 0.00, 5.00, 5.00, 4.50, 4.50, 4.00, 3.36, 4.70, 2.00, 4.80, 4.30, 19.16, 4.60, 1.50, 4.30, 5.00, 0.00, 5.00, 5.00, 4.50, 4.50, 3.50, 3.36, 4.58, 2.00, 4.80, 4.10, 18.84, 4.60, 1.50, 4.50, 5.00, 0.00, 5.00, 5.00, 4.50, 4.50, 3.50, 3.36, 4.70, 2.00, 4.80, 4.10, 18.96, 4.60, 1.50, 4.50, 5.00, 0.00, 4.00, 5.00, 4.50, 4.75, 4.50, 3.36, 4.70, 1.60, 4.80, 4.65, 19.11, 4.60, 1.50, 4.50, 5.00, 0.00, 4.00, 5.00, 4.50, 4.75, 4.00, 3.36, 4.70, 1.60, 4.80, 4.45, 18.91, 3.30, 3.50, 2.80, 3.50, 0.00, 4.50, 4.25, 4.50, 3.50, 4.50, 3.38, 3.08, 1.80, 4.35, 3.90, 16.51, 3.30, 2.50, 3.40, 3.50, 0.00, 4.50, 4.00, 4.50, 3.50, 4.75, 2.98, 3.44, 1.80, 4.20, 4.00, 16.42, 3.30, 2.50, 3.40, 3.50, 0.00, 4.50, 4.00, 4.50, 4.00, 4.75, 2.98, 3.44, 1.80, 4.20, 4.30, 16.72, 3.30, 3.50, 3.30, 4.00, 0.00, 4.50, 4.00, 5.00, 4.25, 4.25, 3.38, 3.58, 1.80, 4.40, 4.25, 17.41, 4.30, 1.50, 3.80, 4.50, 0.00, 5.00, 5.00, 4.50, 4.75, 3.50, 3.18, 4.08, 2.00, 4.80, 4.25, 18.31, 4.30, 1.50, 3.80, 4.50, 0.00, 5.00, 5.00, 4.50, 4.75, 4.00, 3.18, 4.08, 2.00, 4.80, 4.45, 18.51, 4.30, 1.50, 3.80, 4.50, 0.00, 5.00, 5.00, 4.50, 4.75, 3.50, 3.18, 4.08, 2.00, 4.80, 4.25, 18.31);

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
(172, 172, 2.00, 5.00, 1.00, 3.00, 5.00, 5.00, 4.00, 3.00, 4.00, 5.00, 5.00, 4.00, 4.00, 5.00, 4.00, 4.00, 5.00, 4.00, 5.00, 3.00);

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
(172, '0083182827', 'ENVI ADHITAMA', 'Laki-Laki', 'X6', '2025');

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
(27, 'refauzan ', 'refauzan', '1234', 1),
(28, 'daffa', 'daffa', '1234', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `nilai_murni`
--
ALTER TABLE `nilai_murni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT untuk tabel `nilai_target`
--
ALTER TABLE `nilai_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;

--
-- AUTO_INCREMENT untuk tabel `profile_matching`
--
ALTER TABLE `profile_matching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `scoring`
--
ALTER TABLE `scoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
