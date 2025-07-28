<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
    exit();
}
include '../../config/koneksi.php';

// Fungsi dengan keterangan di setiap opsi
function generateScaleOptions($start = 1, $end = 5)
{
    $options = '';
    for ($i = $start; $i <= $end; $i++) {
        // Tambahkan komentar sesuai skala
        switch ($i) {
            case 1:
                $comment = '– Jelek';
                break;
            case 2:
                $comment = '– Kurang';
                break;
            case 3:
                $comment = '– Cukup';
                break;
            case 4:
                $comment = '– Baik';
                break;
            case 5:
                $comment = '– Bagus';
                break;
            default:
                $comment = '';
        }

        $options .= "<option value=\"$i\">$i $comment</option>\n";
    }
    return $options;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SPK - Profile Matching</title>

    <link rel="stylesheet" href="../../vendor/select2/select2-bootstrap4.css">
    <link rel="stylesheet" href="../../vendor/select2/select2-bootstrap4.min.css">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../css/loading.css">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../index.php" style="gap: 10px;">
                <img src="../../img/sma15.png" alt="Logo SPK" style="max-height: 40px;">
                <div class="sidebar-brand-text" style="line-height: 1; text-align: left;">
                    <div style="font-weight: 700; font-size: 1.2rem;">SMAN 15</div>
                    <div style="font-weight: 700; font-size: 0.75rem;">Kota Tangerang</div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../dashboard-kepsek.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Daftar Ekstrakurikuler</div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../ekskul/daftra_ekskuls.php">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span>Daftar Ekstrakurikuler</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Data Penilaian</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Penilaian</span>
                </a>
                <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Settings Data Penilaian:</h6>
                        <a class="collapse-item" href="../kriteria/kriterias.php">Kriteria</a>
                        <a class="collapse-item" href="../sub-kriteria/sub-kriterias.php">Sub Kriteria</a>
                        <a class="collapse-item" href="../target/targets.php">Nilai Target</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Pages</div>
<!-- Nav Item - Charts -->
<li class="nav-item">
                <a class="nav-link" href="../siswa/siswas.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Siswa</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="profile-matchings.php">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Profile Matching</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../laporan/laporans.php">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Laporan Profile Matching</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-0 text-gray-800 mb-2">Profile Matching</h1>
                    <span class="mb-2 text-danger">Nb: Gunakan tanda titik (.) jika menginputkan nilai berkoma</span>

                    <div class="card shadow mt-2">
                        <div class="card-body">
                            <form id="form-profile">
                                <div class="form-group">
                                    <label for="id_siswa">Nama Siswa</label>
                                    <select name="id_siswa" id="id_siswa" class="form-control select2-siswa" required>
                                        <option value="" selected disabled>-- Pilih Siswa --</option>
                                        <?php
                                        include '../../config/koneksi.php';
                                        $sql = "SELECT * FROM students ORDER BY id DESC";
                                        $query = mysqli_query($konek, $sql);
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $data['id'] . '">' . $data['nis'] . ' - ' . $data['nama_siswa'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="row">
                                <div class="col-12">
                                    <!-- Minat Bidang Keagamaan -->
                                <div class="form-group">
                                    <label for="minat_bidang_keagamaan">Seberapa besar ketertarikan Anda pada kegiatan keagamaan di sekolah?</label>
                                    <select name="minat_bidang_keagamaan" id="minat_bidang_keagamaan" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya sama sekali tidak tertarik dan biasanya menghindari kegiatan keagamaan.</option>
                                    <option value="2">2 - Saya kurang tertarik dan hanya ikut jika dipaksa atau saat ada kewajiban.</option>
                                    <option value="3">3 - Saya cukup tertarik, kadang ikut kegiatan keagamaan tapi tidak rutin.</option>
                                    <option value="4">4 - Saya tertarik dan sering mengikuti kegiatan keagamaan secara aktif.</option>
                                    <option value="5">5 - Saya sangat tertarik, selalu antusias dan menjadi bagian aktif dalam semua kegiatan keagamaan.</option>
                                    </select>
                                </div>

                                <!-- Minat Bidang Seni -->
                                <div class="form-group">
                                    <label for="minat_bidang_seni">Seberapa besar ketertarikan Anda pada kegiatan seni (musik, tari, lukis, dll)?</label>
                                    <select name="minat_bidang_seni" id="minat_bidang_seni" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya tidak tertarik dan jarang mengikuti kegiatan seni.</option>
                                    <option value="2">2 - Saya kurang tertarik dan hanya ikut jika diperlukan.</option>
                                    <option value="3">3 - Saya cukup tertarik dan kadang ikut kegiatan seni.</option>
                                    <option value="4">4 - Saya tertarik dan sering berpartisipasi aktif dalam kegiatan seni.</option>
                                    <option value="5">5 - Saya sangat tertarik, selalu antusias dan aktif dalam berbagai kegiatan seni.</option>
                                    </select>
                                </div>

                                <!-- Minat Bidang Olahraga -->
                                <div class="form-group">
                                    <label for="minat_bidang_olahraga">Seberapa besar ketertarikan Anda pada kegiatan olahraga?</label>
                                    <select name="minat_bidang_olahraga" id="minat_bidang_olahraga" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya tidak tertarik dan jarang melakukan aktivitas olahraga.</option>
                                    <option value="2">2 - Saya kurang tertarik dan hanya olahraga sesekali.</option>
                                    <option value="3">3 - Saya cukup tertarik dan kadang ikut kegiatan olahraga.</option>
                                    <option value="4">4 - Saya tertarik dan rutin berpartisipasi dalam olahraga.</option>
                                    <option value="5">5 - Saya sangat tertarik dan aktif dalam berbagai kegiatan olahraga.</option>
                                    </select>
                                </div>

                                <!-- Minat Bidang Akademik -->
                                <div class="form-group">
                                    <label for="minat_bidang_akademik">Seberapa besar ketertarikan Anda pada kegiatan akademik dan pembelajaran tambahan?</label>
                                    <select name="minat_bidang_akademik" id="minat_bidang_akademik" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kurang berminat dan jarang mengikuti kegiatan akademik di luar kelas.</option>
                                    <option value="2">2 - Saya kadang mengikuti tapi kurang serius.</option>
                                    <option value="3">3 - Saya cukup tertarik dan mengikuti kegiatan akademik tambahan.</option>
                                    <option value="4">4 - Saya tertarik dan aktif mengikuti kegiatan akademik di sekolah.</option>
                                    <option value="5">5 - Saya sangat tertarik dan selalu aktif berpartisipasi dalam kegiatan akademik.</option>
                                    </select>
                                </div>

                                <!-- Minat Bidang Sosial -->
                                <div class="form-group">
                                    <label for="minat_bidang_sosial">Seberapa besar ketertarikan Anda pada kegiatan sosial dan kemasyarakatan?</label>
                                    <select name="minat_bidang_sosial" id="minat_bidang_sosial" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kurang tertarik dan jarang mengikuti kegiatan sosial.</option>
                                    <option value="2">2 - Saya kadang ikut jika diminta.</option>
                                    <option value="3">3 - Saya cukup tertarik dan kadang ikut kegiatan sosial.</option>
                                    <option value="4">4 - Saya tertarik dan sering berpartisipasi aktif dalam kegiatan sosial.</option>
                                    <option value="5">5 - Saya sangat tertarik dan selalu antusias mengikuti kegiatan sosial.</option>
                                    </select>
                                </div>

                                <!-- Minat Bidang Teknologi -->
                                <div class="form-group">
                                    <label for="minat_bidang_teknologi">Seberapa besar ketertarikan Anda pada kegiatan teknologi dan komputer?</label>
                                    <select name="minat_bidang_teknologi" id="minat_bidang_teknologi" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya tidak tertarik dan jarang menggunakan teknologi dalam kegiatan.</option>
                                    <option value="2">2 - Saya kurang tertarik dan jarang terlibat dalam kegiatan teknologi.</option>
                                    <option value="3">3 - Saya cukup tertarik dan kadang ikut kegiatan teknologi.</option>
                                    <option value="4">4 - Saya tertarik dan aktif menggunakan teknologi dalam kegiatan.</option>
                                    <option value="5">5 - Saya sangat tertarik dan selalu antusias mengikuti kegiatan teknologi.</option>
                                    </select>
                                </div>

                                <!-- Kemampuan Fisik -->
                                <div class="form-group">
                                    <label for="kemampuan_fisik">Bagaimana kemampuan fisik Anda dalam mengikuti kegiatan ekstrakurikuler (ketahanan, kekuatan, dll)?</label>
                                    <select name="kemampuan_fisik" id="kemampuan_fisik" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Kemampuan fisik saya sangat rendah, cepat lelah dan kurang kuat.</option>
                                    <option value="2">2 - Kemampuan fisik saya kurang, kadang merasa lelah cepat.</option>
                                    <option value="3">3 - Kemampuan fisik saya cukup baik dan bisa mengikuti sebagian kegiatan.</option>
                                    <option value="4">4 - Kemampuan fisik saya baik dan mampu mengikuti kegiatan dengan lancar.</option>
                                    <option value="5">5 - Kemampuan fisik saya sangat baik dan selalu siap untuk kegiatan berat.</option>
                                    </select>
                                </div>

                                <!-- Kemampuan Pemecahan Masalah -->
                                <div class="form-group">
                                    <label for="kemampuan_pemecahan_masalah">Seberapa baik kemampuan Anda dalam memecahkan masalah saat menghadapi tantangan?</label>
                                    <select name="kemampuan_pemecahan_masalah" id="kemampuan_pemecahan_masalah" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kesulitan mencari solusi dan sering menyerah saat masalah muncul.</option>
                                    <option value="2">2 - Saya kadang kesulitan dan butuh bantuan untuk menyelesaikan masalah.</option>
                                    <option value="3">3 - Saya cukup mampu mencari solusi dengan bantuan sesekali.</option>
                                    <option value="4">4 - Saya mampu menyelesaikan masalah secara mandiri dalam banyak situasi.</option>
                                    <option value="5">5 - Saya sangat baik dalam memecahkan masalah dan sering membantu orang lain.</option>
                                    </select>
                                </div>

                                <!-- Kemampuan Berpikir Kritis -->
                                <div class="form-group">
                                    <label for="kemampuan_berpikir_kritis">Seberapa baik kemampuan Anda dalam berpikir kritis dan menganalisis situasi?</label>
                                    <select name="kemampuan_berpikir_kritis" id="kemampuan_berpikir_kritis" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya jarang menganalisis masalah dan cenderung menerima begitu saja.</option>
                                    <option value="2">2 - Saya kadang berpikir kritis tapi kurang mendalam.</option>
                                    <option value="3">3 - Saya cukup mampu berpikir kritis dalam situasi tertentu.</option>
                                    <option value="4">4 - Saya sering menggunakan berpikir kritis untuk menganalisis masalah.</option>
                                    <option value="5">5 - Saya sangat terampil dalam berpikir kritis dan sering memberikan insight baru.</option>
                                    </select>
                                </div>

                                <!-- Kemampuan Manajemen Waktu -->
                                <div class="form-group">
                                    <label for="kemampuan_manajemen_waktu">Seberapa baik kemampuan Anda dalam mengatur waktu agar bisa mengikuti kegiatan ekstrakurikuler?</label>
                                    <select name="kemampuan_manajemen_waktu" id="kemampuan_manajemen_waktu" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kesulitan mengatur waktu dan sering terlambat atau tidak hadir.</option>
                                    <option value="2">2 - Saya kadang bisa mengatur waktu tapi sering terganggu jadwal lain.</option>
                                    <option value="3">3 - Saya cukup baik dalam mengatur waktu tapi masih perlu perbaikan.</option>
                                    <option value="4">4 - Saya mampu mengatur waktu dengan baik dan jarang terlambat.</option>
                                    <option value="5">5 - Saya sangat disiplin dalam mengatur waktu dan selalu tepat waktu.</option>
                                    </select>
                                </div>

                                <!-- Kemampuan Kerja Sama Tim -->
                                <div class="form-group">
                                    <label for="kemampuan_kerja_sama_tim">Seberapa baik kemampuan Anda bekerja sama dalam tim?</label>
                                    <select name="kemampuan_kerja_sama_tim" id="kemampuan_kerja_sama_tim" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya sulit bekerja sama dan lebih suka bekerja sendiri.</option>
                                    <option value="2">2 - Saya kadang bisa bekerja sama tapi sering konflik dengan anggota tim.</option>
                                    <option value="3">3 - Saya cukup baik bekerja sama dengan tim meskipun ada beberapa masalah.</option>
                                    <option value="4">4 - Saya mampu bekerja sama dengan baik dan berkontribusi positif dalam tim.</option>
                                    <option value="5">5 - Saya sangat baik bekerja sama, menjadi mediator dan memotivasi tim.</option>
                                    </select>
                                </div>

                                <!-- Kemampuan Teknologi -->
                                <div class="form-group">
                                    <label for="kemampuan_teknologi">Seberapa baik kemampuan Anda dalam menggunakan teknologi yang diperlukan dalam kegiatan ekstrakurikuler?</label>
                                    <select name="kemampuan_teknologi" id="kemampuan_teknologi" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kurang mahir dan jarang menggunakan teknologi.</option>
                                    <option value="2">2 - Saya cukup mahir tapi masih perlu belajar lebih banyak.</option>
                                    <option value="3">3 - Saya cukup mahir dan bisa menggunakan teknologi dalam kegiatan.</option>
                                    <option value="4">4 - Saya mahir dan sering menggunakan teknologi untuk mendukung kegiatan.</option>
                                    <option value="5">5 - Saya sangat mahir dan sering membantu orang lain dalam penggunaan teknologi.</option>
                                    </select>
                                </div>

                                <!-- Waktu Tersedia Per Minggu -->
                                <div class="form-group">
                                    <label for="waktu_tersedia_per_minggu">Berapa jam waktu yang biasanya dapat Anda luangkan untuk kegiatan ekstrakurikuler dalam seminggu?</label>
                                    <select name="waktu_tersedia_per_minggu" id="waktu_tersedia_per_minggu" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Kurang dari 1 jam per minggu.</option>
                                    <option value="2">2 - 1 sampai 2 jam per minggu.</option>
                                    <option value="3">3 - 3 sampai 4 jam per minggu.</option>
                                    <option value="4">4 - 5 sampai 6 jam per minggu.</option>
                                    <option value="5">5 - Lebih dari 6 jam per minggu.</option>
                                    </select>
                                </div>

                                <!-- Motivasi Pengembangan Diri -->
                                <div class="form-group">
                                    <label for="motivasi_pengembangan_diri">Seberapa besar motivasi Anda untuk belajar dan mengembangkan diri melalui kegiatan ekstrakurikuler?</label>
                                    <select name="motivasi_pengembangan_diri" id="motivasi_pengembangan_diri" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kurang termotivasi untuk pengembangan diri.</option>
                                    <option value="2">2 - Saya kadang termotivasi tapi kurang konsisten.</option>
                                    <option value="3">3 - Saya cukup termotivasi untuk belajar dan berkembang.</option>
                                    <option value="4">4 - Saya termotivasi dan aktif mencari kesempatan belajar.</option>
                                    <option value="5">5 - Saya sangat termotivasi dan selalu berusaha meningkatkan diri.</option>
                                    </select>
                                </div>

                                <!-- Motivasi Prestasi Kompetitif -->
                                <div class="form-group">
                                    <label for="motivasi_prestasi_kompetitif">Seberapa besar motivasi Anda untuk berkompetisi dan meraih prestasi dalam kegiatan ekstrakurikuler?</label>
                                    <select name="motivasi_prestasi_kompetitif" id="motivasi_prestasi_kompetitif" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kurang termotivasi untuk berkompetisi.</option>
                                    <option value="2">2 - Saya kadang termotivasi tapi kurang fokus pada prestasi.</option>
                                    <option value="3">3 - Saya cukup termotivasi untuk meraih prestasi.</option>
                                    <option value="4">4 - Saya termotivasi dan aktif mengikuti kompetisi.</option>
                                    <option value="5">5 - Saya sangat termotivasi dan bersemangat meraih prestasi tinggi.</option>
                                    </select>
                                </div>

                                <!-- Motivasi Sosial -->
                                <div class="form-group">
                                    <label for="motivasi_sosial">Seberapa besar motivasi Anda untuk berinteraksi dan berkontribusi sosial melalui kegiatan ekstrakurikuler?</label>
                                    <select name="motivasi_sosial" id="motivasi_sosial" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya kurang berminat berinteraksi sosial melalui kegiatan.</option>
                                    <option value="2">2 - Saya kadang ikut kegiatan sosial tapi kurang aktif.</option>
                                    <option value="3">3 - Saya cukup termotivasi untuk berkontribusi sosial.</option>
                                    <option value="4">4 - Saya termotivasi dan sering berpartisipasi aktif.</option>
                                    <option value="5">5 - Saya sangat termotivasi dan selalu aktif berkontribusi sosial.</option>
                                    </select>
                                </div>

                                <!-- Kepemimpinan -->
                                <div class="form-group">
                                    <label for="kepemimpinan">Seberapa besar kemampuan Anda dalam memimpin dan memotivasi kelompok?</label>
                                    <select name="kepemimpinan" id="kepemimpinan" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya jarang atau tidak mampu memimpin kelompok.</option>
                                    <option value="2">2 - Saya kadang memimpin tapi kurang percaya diri.</option>
                                    <option value="3">3 - Saya cukup mampu memimpin kelompok dalam situasi tertentu.</option>
                                    <option value="4">4 - Saya mampu memimpin dan memotivasi kelompok secara efektif.</option>
                                    <option value="5">5 - Saya sangat mahir memimpin dan sering menjadi pemimpin utama.</option>
                                    </select>
                                </div>

                                <!-- Kedisiplinan -->
                                <div class="form-group">
                                    <label for="kedisiplinan">Seberapa konsisten Anda dalam mematuhi aturan dan jadwal kegiatan ekstrakurikuler?</label>
                                    <select name="kedisiplinan" id="kedisiplinan" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya sering melanggar aturan dan jarang tepat waktu.</option>
                                    <option value="2">2 - Saya kadang disiplin tapi masih sering terlambat atau absen.</option>
                                    <option value="3">3 - Saya cukup disiplin dengan beberapa pelanggaran kecil.</option>
                                    <option value="4">4 - Saya disiplin dan biasanya tepat waktu.</option>
                                    <option value="5">5 - Saya sangat disiplin dan selalu mematuhi aturan tanpa kecuali.</option>
                                    </select>
                                </div>

                                <!-- Komunikasi -->
                                <div class="form-group">
                                    <label for="komunikasi">Seberapa baik kemampuan Anda dalam berkomunikasi dan menyampaikan ide dalam kegiatan ekstrakurikuler?</label>
                                    <select name="komunikasi" id="komunikasi" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya sulit menyampaikan ide dan jarang berkomunikasi efektif.</option>
                                    <option value="2">2 - Saya kadang bisa berkomunikasi tapi kurang lancar.</option>
                                    <option value="3">3 - Saya cukup mampu menyampaikan ide dengan jelas.</option>
                                    <option value="4">4 - Saya mampu berkomunikasi dengan baik dan aktif berpartisipasi.</option>
                                    <option value="5">5 - Saya sangat mahir berkomunikasi dan sering menjadi penghubung kelompok.</option>
                                    </select>
                                </div>

                                <!-- Kreativitas -->
                                <div class="form-group">
                                    <label for="kreativitas">Seberapa sering Anda menghasilkan ide baru dan berinovasi dalam kegiatan ekstrakurikuler?</label>
                                    <select name="kreativitas" id="kreativitas" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="1">1 - Saya jarang atau tidak pernah berinovasi.</option>
                                    <option value="2">2 - Saya kadang berusaha tapi hasilnya kurang maksimal.</option>
                                    <option value="3">3 - Saya cukup sering menghasilkan ide baru.</option>
                                    <option value="4">4 - Saya sering berinovasi dan mencoba hal baru.</option>
                                    <option value="5">5 - Saya sangat kreatif dan sering menginspirasi orang lain.</option>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" class="btn btn-primary">Proses</button>
                                </div>
                            </form>
                            <div id="loading" style="display: none;">Processing...</div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="bg-light border-top py-4">
                    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0 text-center text-md-left text-muted">
                            &copy; 2025 REFAUZAN UNPAM.
                        </div>
                        <div>
                            <a href="https://www.instagram.com/rfznnnn_" target="_blank" aria-label="Instagram" class="social-icon text-danger mx-2" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="mailto:refauzanadins@gmail.com" aria-label="Email" class="social-icon text-secondary mx-2" title="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="tel:+6283808473134" aria-label="Phone" class="social-icon text-secondary mx-2" title="Phone">
                                <i class="fas fa-phone-alt"></i>
                            </a>
                        </div>
                    </div>

                    <style>
                        .social-icon {
                            font-size: 1.5rem;
                            transition: transform 0.3s ease, color 0.3s ease;
                            display: inline-block;
                        }

                        .social-icon:hover {
                            transform: translateY(-5px);
                            color: #d6336c !important;
                            /* warna hover, bisa disesuaikan */
                            text-decoration: none;
                        }
                    </style>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Result Modal -->
        <div class="modal fade" id="resultModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white" id="resultModalLabel">Hasil Profile Matching</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless table-responsive" id="table_result">
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td class="text-capitalize font-weight-bold" id="nis"></td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td>:</td>
                                <td class="text-capitalize font-weight-bold" id="nama_siswa"></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td id="kelas"></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td>:</td>
                                <td id="tahun_ajaran"></td>
                            </tr>
                        </table>
                        <div class="d-flex flex-column justify-content-center p-4">
                            <h6 class="text-center">Berdasarkan data atau nilai yang telah di inputkan maka hasil
                                akhirnya adalah Ekstrakurikuler
                            </h6>
                            <h4 class="text-center font-weight-bold py-4" id="hasil_jurusan"></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-lihat" data-id="">Lihat Detail</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Result Modal -->

        <!-- detail Modal -->
        <div class="modal fade" id="detailModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white" id="detailModalLabel">Proses Profile Matching</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless table-responsive" id="table_detail">
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td class="text-capitalize font-weight-bold" id="nis2"></td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td>:</td>
                                <td class="text-capitalize font-weight-bold" id="nama_siswa2"></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td id="kelas2"></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td>:</td>
                                <td id="tahun_ajaran2"></td>
                            </tr>
                        </table>

                        <hr>

                        <div class="table-responsive">
                        <h6 class="my-2 font-weight-bold text-primary">Nilai Siswa</h6>
                        <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Minat Bidang Keagamaan</th>
                                <th>Minat Bidang Seni</th>
                                <th>Minat Bidang Olahraga</th>
                                <th>Minat Bidang Akademik</th>
                                <th>Minat Bidang Sosial</th>
                                <th>Minat Bidang Teknologi</th>
                                <th>Kemampuan Fisik</th>
                                <th>Kemampuan Pemecahan Masalah</th>
                                <th>Kemampuan Berpikir Kritis</th>
                                <th>Kemampuan Manajemen Waktu</th>
                                <th>Kemampuan Kerja Sama Tim</th>
                                <th>Kemampuan Teknologi</th>
                                <th>Waktu Tersedia Per Minggu</th>
                                <th>Motivasi Pengembangan Diri</th>
                                <th>Motivasi Prestasi Kompetitif</th>
                                <th>Motivasi Sosial</th>
                                <th>Kepemimpinan</th>
                                <th>Kedisiplinan</th>
                                <th>Komunikasi</th>
                                <th>Kreativitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td id="minat_bidang_keagamaan2"></td>
                                    <td id="minat_bidang_seni2"></td>
                                    <td id="minat_bidang_olahraga2"></td>
                                    <td id="minat_bidang_akademik2"></td>
                                    <td id="minat_bidang_sosial2"></td>
                                    <td id="minat_bidang_teknologi2"></td>
                                    <td id="kemampuan_fisik2"></td>
                                    <td id="kemampuan_pemecahan_masalah2"></td>
                                    <td id="kemampuan_berpikir_kritis2"></td>
                                    <td id="kemampuan_manajemen_waktu2"></td>
                                    <td id="kemampuan_kerja_sama_tim2"></td>
                                    <td id="kemampuan_teknologi2"></td>
                                    <td id="waktu_tersedia_per_minggu2"></td>
                                    <td id="motivasi_pengembangan_diri2"></td>
                                    <td id="motivasi_prestasi_kompetitif2"></td>
                                    <td id="motivasi_sosial2"></td>
                                    <td id="kepemimpinan2"></td>
                                    <td id="kedisiplinan2"></td>
                                    <td id="komunikasi2"></td>
                                    <td id="kreativitas2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                        <div class="table-responsive">
                            <h6 class="my-2 font-weight-bold text-primary">Nilai Normalisasi</h6>
                            <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                    <th>C7</th>
                                    <th>C8</th>
                                    <th>C9</th>
                                    <th>C10</th>
                                    <th>C11</th>
                                    <th>C12</th>
                                    <th>C13</th>
                                    <th>C14</th>
                                    <th>C15</th>
                                    <th>C16</th>
                                    <th>C17</th>
                                    <th>C18</th>
                                    <th>C19</th>
                                    <th>C20</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td id="normalisasi_minat_bidang_seni"></td>
                                    <td id="normalisasi_minat_bidang_olahraga"></td>
                                    <td id="normalisasi_minat_bidang_akademik"></td>
                                    <td id="normalisasi_minat_bidang_sosial"></td>
                                    <td id="normalisasi_minat_bidang_teknologi"></td>
                                    <td id="normalisasi_kemampuan_fisik"></td>
                                    <td id="normalisasi_kemampuan_pemecahan_masalah"></td>
                                    <td id="normalisasi_kemampuan_berpikir_kritis"></td>
                                    <td id="normalisasi_kemampuan_manajemen_waktu"></td>
                                    <td id="normalisasi_kemampuan_kerja_sama_tim"></td>
                                    <td id="normalisasi_kemampuan_teknologi"></td>
                                    <td id="normalisasi_waktu_tersedia_per_minggu"></td>
                                    <td id="normalisasi_motivasi_pengembangan_diri"></td>
                                    <td id="normalisasi_motivasi_prestasi_kompetitif"></td>
                                    <td id="normalisasi_motivasi_sosial"></td>
                                    <td id="normalisasi_kepemimpinan"></td>
                                    <td id="normalisasi_kedisiplinan"></td>
                                    <td id="normalisasi_komunikasi"></td>
                                    <td id="normalisasi_kreativitas"></td>
                                    <td id="normalisasi_minat_bidang_keagamaan"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul ROHIS
                            </h6>
                            <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NCF Minat</th>
                                        <th>NSF Minat</th>
                                        <th>N1</th>
                                        <th>NCF Kemampuan</th>
                                        <th>NSF Kemampuan</th>
                                        <th>N2</th>
                                        <th>NCF Waktu</th>
                                        <th>NSF Waktu</th>
                                        <th>N3</th>
                                        <th>NCF Motivasi</th>
                                        <th>NSF Motivasi</th>
                                        <th>N4</th>
                                        <th>NCF Karakteristik</th>
                                        <th>NSF Karakteristik</th>
                                        <th>N5</th>
                                        <th>Total Nilai N</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="ncf_minat_rohis"></td>
                                        <td id="nsf_minat_rohis"></td>
                                        <td id="n1_rohis"></td>
                                        <td id="ncf_kemampuan_rohis"></td>
                                        <td id="nsf_kemampuan_rohis"></td>
                                        <td id="n2_rohis"></td>
                                        <td id="ncf_waktu_rohis"></td>
                                        <td id="nsf_waktu_rohis"></td>
                                        <td id="n3_rohis"></td>
                                        <td id="ncf_motivasi_rohis"></td>
                                        <td id="nsf_motivasi_rohis"></td>
                                        <td id="n4_rohis"></td>
                                        <td id="ncf_karakteristik_rohis"></td>
                                        <td id="nsf_karakteristik_rohis"></td>
                                        <td id="n5_rohis"></td>
                                        <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_rohis"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul PASKIBRA
                            </h6>
                            <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NCF Minat</th>
                                        <th>NSF Minat</th>
                                        <th>N1</th>
                                        <th>NCF Kemampuan</th>
                                        <th>NSF Kemampuan</th>
                                        <th>N2</th>
                                        <th>NCF Waktu</th>
                                        <th>NSF Waktu</th>
                                        <th>N3</th>
                                        <th>NCF Motivasi</th>
                                        <th>NSF Motivasi</th>
                                        <th>N4</th>
                                        <th>NCF Karakteristik</th>
                                        <th>NSF Karakteristik</th>
                                        <th>N5</th>
                                        <th>Total Nilai N</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="ncf_minat_paskibra"></td>
                                        <td id="nsf_minat_paskibra"></td>
                                        <td id="n1_paskibra"></td>
                                        <td id="ncf_kemampuan_paskibra"></td>
                                        <td id="nsf_kemampuan_paskibra"></td>
                                        <td id="n2_paskibra"></td>
                                        <td id="ncf_waktu_paskibra"></td>
                                        <td id="nsf_waktu_paskibra"></td>
                                        <td id="n3_paskibra"></td>
                                        <td id="ncf_motivasi_paskibra"></td>
                                        <td id="nsf_motivasi_paskibra"></td>
                                        <td id="n4_paskibra"></td>
                                        <td id="ncf_karakteristik_paskibra"></td>
                                        <td id="nsf_karakteristik_paskibra"></td>
                                        <td id="n5_paskibra"></td>
                                        <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_paskibra"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul PMR
                            </h6>
                            <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NCF Minat</th>
                                        <th>NSF Minat</th>
                                        <th>N1</th>
                                        <th>NCF Kemampuan</th>
                                        <th>NSF Kemampuan</th>
                                        <th>N2</th>
                                        <th>NCF Waktu</th>
                                        <th>NSF Waktu</th>
                                        <th>N3</th>
                                        <th>NCF Motivasi</th>
                                        <th>NSF Motivasi</th>
                                        <th>N4</th>
                                        <th>NCF Karakteristik</th>
                                        <th>NSF Karakteristik</th>
                                        <th>N5</th>
                                        <th>Total Nilai N</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="ncf_minat_pmr"></td>
                                        <td id="nsf_minat_pmr"></td>
                                        <td id="n1_pmr"></td>
                                        <td id="ncf_kemampuan_pmr"></td>
                                        <td id="nsf_kemampuan_pmr"></td>
                                        <td id="n2_pmr"></td>
                                        <td id="ncf_waktu_pmr"></td>
                                        <td id="nsf_waktu_pmr"></td>
                                        <td id="n3_pmr"></td>
                                        <td id="ncf_motivasi_pmr"></td>
                                        <td id="nsf_motivasi_pmr"></td>
                                        <td id="n4_pmr"></td>
                                        <td id="ncf_karakteristik_pmr"></td>
                                        <td id="nsf_karakteristik_pmr"></td>
                                        <td id="n5_pmr"></td>
                                        <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_pmr"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Template Perhitungan untuk Pramuka -->
                        <div class="table-responsive">
                            <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul PRAMUKA</h6>
                            <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NCF Minat</th>
                                        <th>NSF Minat</th>
                                        <th>N1</th>
                                        <th>NCF Kemampuan</th>
                                        <th>NSF Kemampuan</th>
                                        <th>N2</th>
                                        <th>NCF Waktu</th>
                                        <th>NSF Waktu</th>
                                        <th>N3</th>
                                        <th>NCF Motivasi</th>
                                        <th>NSF Motivasi</th>
                                        <th>N4</th>
                                        <th>NCF Karakteristik</th>
                                        <th>NSF Karakteristik</th>
                                        <th>N5</th>
                                        <th>Total Nilai N</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="ncf_minat_pramuka"></td>
                                        <td id="nsf_minat_pramuka"></td>
                                        <td id="n1_pramuka"></td>
                                        <td id="ncf_kemampuan_pramuka"></td>
                                        <td id="nsf_kemampuan_pramuka"></td>
                                        <td id="n2_pramuka"></td>
                                        <td id="ncf_waktu_pramuka"></td>
                                        <td id="nsf_waktu_pramuka"></td>
                                        <td id="n3_pramuka"></td>
                                        <td id="ncf_motivasi_pramuka"></td>
                                        <td id="nsf_motivasi_pramuka"></td>
                                        <td id="n4_pramuka"></td>
                                        <td id="ncf_karakteristik_pramuka"></td>
                                        <td id="nsf_karakteristik_pramuka"></td>
                                        <td id="n5_pramuka"></td>
                                        <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_pramuka"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Template Perhitungan untuk Kabar 15 -->
                        <div class="table-responsive">
                            <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Kabar 15</h6>
                            <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NCF Minat</th>
                                        <th>NSF Minat</th>
                                        <th>N1</th>
                                        <th>NCF Kemampuan</th>
                                        <th>NSF Kemampuan</th>
                                        <th>N2</th>
                                        <th>NCF Waktu</th>
                                        <th>NSF Waktu</th>
                                        <th>N3</th>
                                        <th>NCF Motivasi</th>
                                        <th>NSF Motivasi</th>
                                        <th>N4</th>
                                        <th>NCF Karakteristik</th>
                                        <th>NSF Karakteristik</th>
                                        <th>N5</th>
                                        <th>Total Nilai N</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="ncf_minat_kabar_15"></td>
                                        <td id="nsf_minat_kabar_15"></td>
                                        <td id="n1_kabar_15"></td>
                                        <td id="ncf_kemampuan_kabar_15"></td>
                                        <td id="nsf_kemampuan_kabar_15"></td>
                                        <td id="n2_kabar_15"></td>
                                        <td id="ncf_waktu_kabar_15"></td>
                                        <td id="nsf_waktu_kabar_15"></td>
                                        <td id="n3_kabar_15"></td>
                                        <td id="ncf_motivasi_kabar_15"></td>
                                        <td id="nsf_motivasi_kabar_15"></td>
                                        <td id="n4_kabar_15"></td>
                                        <td id="ncf_karakteristik_kabar_15"></td>
                                        <td id="nsf_karakteristik_kabar_15"></td>
                                        <td id="n5_kabar_15"></td>
                                        <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_kabar_15"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                            <!-- Template Perhitungan untuk Karya Ilmiah Remaja -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Karya Ilmiah Remaja</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_kir"></td>
                                            <td id="nsf_minat_kir"></td>
                                            <td id="n1_kir"></td>
                                            <td id="ncf_kemampuan_kir"></td>
                                            <td id="nsf_kemampuan_kir"></td>
                                            <td id="n2_kir"></td>
                                            <td id="ncf_waktu_kir"></td>
                                            <td id="nsf_waktu_kir"></td>
                                            <td id="n3_kir"></td>
                                            <td id="ncf_motivasi_kir"></td>
                                            <td id="nsf_motivasi_kir"></td>
                                            <td id="n4_kir"></td>
                                            <td id="ncf_karakteristik_kir"></td>
                                            <td id="nsf_karakteristik_kir"></td>
                                            <td id="n5_kir"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_kir"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Japanese Club -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Japanese Club</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_japanese_club"></td>
                                            <td id="nsf_minat_japanese_club"></td>
                                            <td id="n1_japanese_club"></td>
                                            <td id="ncf_kemampuan_japanese_club"></td>
                                            <td id="nsf_kemampuan_japanese_club"></td>
                                            <td id="n2_japanese_club"></td>
                                            <td id="ncf_waktu_japanese_club"></td>
                                            <td id="nsf_waktu_japanese_club"></td>
                                            <td id="n3_japanese_club"></td>
                                            <td id="ncf_motivasi_japanese_club"></td>
                                            <td id="nsf_motivasi_japanese_club"></td>
                                            <td id="n4_japanese_club"></td>
                                            <td id="ncf_karakteristik_japanese_club"></td>
                                            <td id="nsf_karakteristik_japanese_club"></td>
                                            <td id="n5_japanese_club"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_japanese_club"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk OSIS -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul OSIS</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_osis"></td>
                                            <td id="nsf_minat_osis"></td>
                                            <td id="n1_osis"></td>
                                            <td id="ncf_kemampuan_osis"></td>
                                            <td id="nsf_kemampuan_osis"></td>
                                            <td id="n2_osis"></td>
                                            <td id="ncf_waktu_osis"></td>
                                            <td id="nsf_waktu_osis"></td>
                                            <td id="n3_osis"></td>
                                            <td id="ncf_motivasi_osis"></td>
                                            <td id="nsf_motivasi_osis"></td>
                                            <td id="n4_osis"></td>
                                            <td id="ncf_karakteristik_osis"></td>
                                            <td id="nsf_karakteristik_osis"></td>
                                            <td id="n5_osis"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_osis"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Basket -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Basket</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_basket"></td>
                                            <td id="nsf_minat_basket"></td>
                                            <td id="n1_basket"></td>
                                            <td id="ncf_kemampuan_basket"></td>
                                            <td id="nsf_kemampuan_basket"></td>
                                            <td id="n2_basket"></td>
                                            <td id="ncf_waktu_basket"></td>
                                            <td id="nsf_waktu_basket"></td>
                                            <td id="n3_basket"></td>
                                            <td id="ncf_motivasi_basket"></td>
                                            <td id="nsf_motivasi_basket"></td>
                                            <td id="n4_basket"></td>
                                            <td id="ncf_karakteristik_basket"></td>
                                            <td id="nsf_karakteristik_basket"></td>
                                            <td id="n5_basket"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_basket"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Badminton -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Badminton</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_badminton"></td>
                                            <td id="nsf_minat_badminton"></td>
                                            <td id="n1_badminton"></td>
                                            <td id="ncf_kemampuan_badminton"></td>
                                            <td id="nsf_kemampuan_badminton"></td>
                                            <td id="n2_badminton"></td>
                                            <td id="ncf_waktu_badminton"></td>
                                            <td id="nsf_waktu_badminton"></td>
                                            <td id="n3_badminton"></td>
                                            <td id="ncf_motivasi_badminton"></td>
                                            <td id="nsf_motivasi_badminton"></td>
                                            <td id="n4_badminton"></td>
                                            <td id="ncf_karakteristik_badminton"></td>
                                            <td id="nsf_karakteristik_badminton"></td>
                                            <td id="n5_badminton"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_badminton"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Voli -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Voli</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_voli"></td>
                                            <td id="nsf_minat_voli"></td>
                                            <td id="n1_voli"></td>
                                            <td id="ncf_kemampuan_voli"></td>
                                            <td id="nsf_kemampuan_voli"></td>
                                            <td id="n2_voli"></td>
                                            <td id="ncf_waktu_voli"></td>
                                            <td id="nsf_waktu_voli"></td>
                                            <td id="n3_voli"></td>
                                            <td id="ncf_motivasi_voli"></td>
                                            <td id="nsf_motivasi_voli"></td>
                                            <td id="n4_voli"></td>
                                            <td id="ncf_karakteristik_voli"></td>
                                            <td id="nsf_karakteristik_voli"></td>
                                            <td id="n5_voli"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_voli"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Sepak Bola -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Sepak Bola</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_sepak_bola"></td>
                                            <td id="nsf_minat_sepak_bola"></td>
                                            <td id="n1_sepak_bola"></td>
                                            <td id="ncf_kemampuan_sepak_bola"></td>
                                            <td id="nsf_kemampuan_sepak_bola"></td>
                                            <td id="n2_sepak_bola"></td>
                                            <td id="ncf_waktu_sepak_bola"></td>
                                            <td id="nsf_waktu_sepak_bola"></td>
                                            <td id="n3_sepak_bola"></td>
                                            <td id="ncf_motivasi_sepak_bola"></td>
                                            <td id="nsf_motivasi_sepak_bola"></td>
                                            <td id="n4_sepak_bola"></td>
                                            <td id="ncf_karakteristik_sepak_bola"></td>
                                            <td id="nsf_karakteristik_sepak_bola"></td>
                                            <td id="n5_sepak_bola"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_sepak_bola"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Futsal -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Futsal</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_futsal"></td>
                                            <td id="nsf_minat_futsal"></td>
                                            <td id="n1_futsal"></td>
                                            <td id="ncf_kemampuan_futsal"></td>
                                            <td id="nsf_kemampuan_futsal"></td>
                                            <td id="n2_futsal"></td>
                                            <td id="ncf_waktu_futsal"></td>
                                            <td id="nsf_waktu_futsal"></td>
                                            <td id="n3_futsal"></td>
                                            <td id="ncf_motivasi_futsal"></td>
                                            <td id="nsf_motivasi_futsal"></td>
                                            <td id="n4_futsal"></td>
                                            <td id="ncf_karakteristik_futsal"></td>
                                            <td id="nsf_karakteristik_futsal"></td>
                                            <td id="n5_futsal"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_futsal"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Seni Suara -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Seni Suara</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_seni_suara"></td>
                                            <td id="nsf_minat_seni_suara"></td>
                                            <td id="n1_seni_suara"></td>
                                            <td id="ncf_kemampuan_seni_suara"></td>
                                            <td id="nsf_kemampuan_seni_suara"></td>
                                            <td id="n2_seni_suara"></td>
                                            <td id="ncf_waktu_seni_suara"></td>
                                            <td id="nsf_waktu_seni_suara"></td>
                                            <td id="n3_seni_suara"></td>
                                            <td id="ncf_motivasi_seni_suara"></td>
                                            <td id="nsf_motivasi_seni_suara"></td>
                                            <td id="n4_seni_suara"></td>
                                            <td id="ncf_karakteristik_seni_suara"></td>
                                            <td id="nsf_karakteristik_seni_suara"></td>
                                            <td id="n5_seni_suara"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_seni_suara"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Tari Saman -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Tari Saman</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_tari_saman"></td>
                                            <td id="nsf_minat_tari_saman"></td>
                                            <td id="n1_tari_saman"></td>
                                            <td id="ncf_kemampuan_tari_saman"></td>
                                            <td id="nsf_kemampuan_tari_saman"></td>
                                            <td id="n2_tari_saman"></td>
                                            <td id="ncf_waktu_tari_saman"></td>
                                            <td id="nsf_waktu_tari_saman"></td>
                                            <td id="n3_tari_saman"></td>
                                            <td id="ncf_motivasi_tari_saman"></td>
                                            <td id="nsf_motivasi_tari_saman"></td>
                                            <td id="n4_tari_saman"></td>
                                            <td id="ncf_karakteristik_tari_saman"></td>
                                            <td id="nsf_karakteristik_tari_saman"></td>
                                            <td id="n5_tari_saman"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_tari_saman"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Tari Lenggang Cisadane -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Tari Lenggang Cisadane</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_tari_lenggang_cisadane"></td>
                                            <td id="nsf_minat_tari_lenggang_cisadane"></td>
                                            <td id="n1_tari_lenggang_cisadane"></td>
                                            <td id="ncf_kemampuan_tari_lenggang_cisadane"></td>
                                            <td id="nsf_kemampuan_tari_lenggang_cisadane"></td>
                                            <td id="n2_tari_lenggang_cisadane"></td>
                                            <td id="ncf_waktu_tari_lenggang_cisadane"></td>
                                            <td id="nsf_waktu_tari_lenggang_cisadane"></td>
                                            <td id="n3_tari_lenggang_cisadane"></td>
                                            <td id="ncf_motivasi_tari_lenggang_cisadane"></td>
                                            <td id="nsf_motivasi_tari_lenggang_cisadane"></td>
                                            <td id="n4_tari_tari_lenggang_cisadane"></td>
                                            <td id="ncf_karakteristik_tari_lenggang_cisadane"></td>
                                            <td id="nsf_karakteristik_tari_lenggang_cisadane"></td>
                                            <td id="n5_tari_lenggang_cisadane"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_tari_lenggang_cisadane"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Teater -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Teater</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_teater"></td>
                                            <td id="nsf_minat_teater"></td>
                                            <td id="n1_teater"></td>
                                            <td id="ncf_kemampuan_teater"></td>
                                            <td id="nsf_kemampuan_teater"></td>
                                            <td id="n2_teater"></td>
                                            <td id="ncf_waktu_teater"></td>
                                            <td id="nsf_waktu_teater"></td>
                                            <td id="n3_teater"></td>
                                            <td id="ncf_motivasi_teater"></td>
                                            <td id="nsf_motivasi_teater"></td>
                                            <td id="n4_teater"></td>
                                            <td id="ncf_karakteristik_teater"></td>
                                            <td id="nsf_karakteristik_teater"></td>
                                            <td id="n5_teater"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_teater"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Taekwondo -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Taekwondo</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_taekwondo"></td>
                                            <td id="nsf_minat_taekwondo"></td>
                                            <td id="n1_taekwondo"></td>
                                            <td id="ncf_kemampuan_taekwondo"></td>
                                            <td id="nsf_kemampuan_taekwondo"></td>
                                            <td id="n2_taekwondo"></td>
                                            <td id="ncf_waktu_taekwondo"></td>
                                            <td id="nsf_waktu_taekwondo"></td>
                                            <td id="n3_taekwondo"></td>
                                            <td id="ncf_motivasi_taekwondo"></td>
                                            <td id="nsf_motivasi_taekwondo"></td>
                                            <td id="n4_taekwondo"></td>
                                            <td id="ncf_karakteristik_taekwondo"></td>
                                            <td id="nsf_karakteristik_taekwondo"></td>
                                            <td id="n5_taekwondo"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_taekwondo"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Bela Diri Canda Birawa -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul BELA DIRI CANDA BIRAWA</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_canda_birawa"></td>
                                            <td id="nsf_minat_canda_birawa"></td>
                                            <td id="n1_canda_birawa"></td>
                                            <td id="ncf_kemampuan_canda_birawa"></td>
                                            <td id="nsf_kemampuan_canda_birawa"></td>
                                            <td id="n2_canda_birawa"></td>
                                            <td id="ncf_waktu_canda_birawa"></td>
                                            <td id="nsf_waktu_canda_birawa"></td>
                                            <td id="n3_canda_birawa"></td>
                                            <td id="ncf_motivasi_canda_birawa"></td>
                                            <td id="nsf_motivasi_canda_birawa"></td>
                                            <td id="n4_canda_birawa"></td>
                                            <td id="ncf_karakteristik_canda_birawa"></td>
                                            <td id="nsf_karakteristik_canda_birawa"></td>
                                            <td id="n5_canda_birawa"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_canda_birawa"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Template Perhitungan untuk Bela Diri Matahari -->
                            <div class="table-responsive">
                                <h6 class="my-2 font-weight-bold text-primary">Perhitungan NCF, NSF dan Nilai Total Ekskul Bela Diri Matahari</h6>
                                <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NCF Minat</th>
                                            <th>NSF Minat</th>
                                            <th>N1</th>
                                            <th>NCF Kemampuan</th>
                                            <th>NSF Kemampuan</th>
                                            <th>N2</th>
                                            <th>NCF Waktu</th>
                                            <th>NSF Waktu</th>
                                            <th>N3</th>
                                            <th>NCF Motivasi</th>
                                            <th>NSF Motivasi</th>
                                            <th>N4</th>
                                            <th>NCF Karakteristik</th>
                                            <th>NSF Karakteristik</th>
                                            <th>N5</th>
                                            <th>Total Nilai N</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="ncf_minat_bela_diri_matahari"></td>
                                            <td id="nsf_minat_bela_diri_matahari"></td>
                                            <td id="n1_bela_diri_matahari"></td>
                                            <td id="ncf_kemampuan_bela_diri_matahari"></td>
                                            <td id="nsf_kemampuan_bela_diri_matahari"></td>
                                            <td id="n2_bela_diri_matahari"></td>
                                            <td id="ncf_waktu_bela_diri_matahari"></td>
                                            <td id="nsf_waktu_bela_diri_matahari"></td>
                                            <td id="n3_bela_diri_matahari"></td>
                                            <td id="ncf_motivasi_bela_diri_matahari"></td>
                                            <td id="nsf_motivasi_bela_diri_matahari"></td>
                                            <td id="n4_bela_diri_matahari"></td>
                                            <td id="ncf_karakteristik_bela_diri_matahari"></td>
                                            <td id="nsf_karakteristik_bela_diri_matahari"></td>
                                            <td id="n5_bela_diri_matahari"></td>
                                            <td id="n1_plus_n2_plus_n3_plus_n4_plus_n5_bela_diri_matahari"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        <div class="table-responsive">
                            <h6 class="my-2 font-weight-bold text-primary">Hasil Akhir
                            </h6>
                            <table class="table table-bordered" id="table_result" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Rohis</th>
                                <th>Paskibra</th>
                                <th>PMR</th>
                                <th>Pramuka</th>
                                <th>Kabar 15</th>
                                <th>Karya Ilmiah Remaja</th>
                                <th>Japanese Club</th>
                                <th>OSIS</th>
                                <th>Basket</th>
                                <th>Badminton</th>
                                <th>Voli</th>
                                <th>Sepak Bola</th>
                                <th>Futsal</th>
                                <th>Seni Suara</th>
                                <th>Tari Saman</th>
                                <th>Tari Lenggang Cisadane</th>
                                <th>Teater</th>
                                <th>Taekwondo</th>
                                <th>Bela Diri Canda Birawa</th>
                                <th>Bela Diri Matahari</th>
                                <th>Hasil</th>
                            </tr>
                            </thead>

                                <tbody>
                                <tr>
                                    <td id="rohis_akhir"></td>
                                    <td id="paskibra_akhir"></td>
                                    <td id="pmr_akhir"></td>
                                    <td id="pramuka_akhir"></td>
                                    <td id="kabar_15_akhir"></td>
                                    <td id="kir_akhir"></td>
                                    <td id="japanese_club_akhir"></td>
                                    <td id="osis_akhir"></td>
                                    <td id="basket_akhir"></td>
                                    <td id="badminton_akhir"></td>
                                    <td id="voli_akhir"></td>
                                    <td id="sepak_bola_akhir"></td>
                                    <td id="futsal_akhir"></td>
                                    <td id="seni_suara_akhir"></td>
                                    <td id="tari_saman_akhir"></td>
                                    <td id="tari_lenggang_cisadane_akhir"></td>
                                    <td id="teater_akhir"></td>
                                    <td id="taekwondo_akhir"></td>
                                    <td id="bela_diri_canda_birawa_akhir"></td>
                                    <td id="bela_diri_matahari_akhir"></td>
                                    <td id="kesimpulan"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of detail Modal -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Pilih "Logout" dibawah jika kamu yakin ingin mengakhiri sesi ini.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                            Cancel
                        </button>
                        <a class="btn btn-danger" href="../auth/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- sweetalert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <script>
            function resetFormAndSelect2(formId, select2Id) {
                $(formId)[0].reset(); // Reset semua elemen form
                setTimeout(function() {
                    $(select2Id).val(null).trigger('change'); // Reset nilai Select2
                }, 0);
            }

            function resetForm() {
            $('#minat_bidang_keagamaan').html('');
            $('#minat_bidang_seni').html('');
            $('#minat_bidang_olahraga').html('');
            $('#minat_bidang_akademik').html('');
            $('#minat_bidang_sosial').html('');
            $('#minat_bidang_teknologi').html('');
            $('#kemampuan_fisik').html('');
            $('#kemampuan_pemecahan_masalah').html('');
            $('#kemampuan_berpikir_kritis').html('');
            $('#kemampuan_manajemen_waktu').html('');
            $('#kemampuan_kerja_sama_tim').html('');
            $('#kemampuan_teknologi').html('');
            $('#waktu_tersedia_per_minggu').html('');
            $('#motivasi_pengembangan_diri').html('');
            $('#motivasi_prestasi_kompetitif').html('');
            $('#motivasi_sosial').html('');
            $('#kepemimpinan').html('');
            $('#kedisiplinan').html('');
            $('#komunikasi').html('');
            $('#kreativitas').html('');
        }


            $(document).ready(function() {
                // tbl_siswa();

                // $("#detailModal").modal('show');

                $("#id_siswa").select2({
                    theme: "bootstrap4",
                });

                $("#form-profile").on("submit", function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $('#loading').show();

                    $.ajax({
                        url: "add-pm.php",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == "success") {

                                // console.log(response.data.id_siswa);

                                $("#resultModal").modal('show');
                                $("#nis").html(response.data.nis);
                                $("#nama_siswa").html(response.data.nama_siswa);
                                $("#kelas").html(response.data.kelas);
                                $("#tahun_ajaran").html(response.data.tahun_ajaran);
                                $("#hasil_jurusan").html(response.data.jurusan);

                                $("#btn-lihat").data("id", response.data.id_siswa);
                                // let test = $("#btn-lihat").data("id");
                                // console.log(test);

                                $('#loading').hide();
                                resetForm();
                                resetFormAndSelect2('#form-profile', '#id_siswa');
                            } else {
                                $('#loading').hide();
                                Toast.fire({
                                    icon: "error",
                                    title: response.message,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                                "Terjadi kesalahan saat memproses permintaan.";
                            $('#loading').hide();

                            Toast.fire({
                                icon: "error",
                                title: errorMessage,
                            });

                        },
                    });
                });
            });

            $(document).on("click", "#btn-lihat", function() {
                let id = $(this).data("id");

                $.ajax({
                url: "../profile-matching/detail-pmById.php?id=" + id,
                data: {
                    id: id,
                },
                method: "POST",
                dataType: "JSON",
                success: function(data) {

                    $("#detailModal").modal("show");

                    $("#nis2").html(data.nis);
                    $("#nama_siswa2").html(data.nama_siswa);
                    $("#kelas2").html(data.kelas);
                    $("#tahun_ajaran2").html(data.tahun_ajaran);

                    $("#minat_bidang_keagamaan2").html(data.minat_bidang_keagamaan);
                        $("#minat_bidang_seni2").html(data.minat_bidang_seni);
                        $("#minat_bidang_olahraga2").html(data.minat_bidang_olahraga);
                        $("#minat_bidang_akademik2").html(data.minat_bidang_akademik);
                        $("#minat_bidang_sosial2").html(data.minat_bidang_sosial);
                        $("#minat_bidang_teknologi2").html(data.minat_bidang_teknologi);
                        $("#kemampuan_fisik2").html(data.kemampuan_fisik);
                        $("#kemampuan_pemecahan_masalah2").html(data.kemampuan_pemecahan_masalah);
                        $("#kemampuan_berpikir_kritis2").html(data.kemampuan_berpikir_kritis);
                        $("#kemampuan_manajemen_waktu2").html(data.kemampuan_manajemen_waktu);
                        $("#kemampuan_kerja_sama_tim2").html(data.kemampuan_kerja_sama_tim);
                        $("#kemampuan_teknologi2").html(data.kemampuan_teknologi);
                        $("#waktu_tersedia_per_minggu2").html(data.waktu_tersedia_per_minggu);
                        $("#motivasi_pengembangan_diri2").html(data.motivasi_pengembangan_diri);
                        $("#motivasi_prestasi_kompetitif2").html(data.motivasi_prestasi_kompetitif);
                        $("#motivasi_sosial2").html(data.motivasi_sosial);
                        $("#kepemimpinan2").html(data.kepemimpinan);
                        $("#kedisiplinan2").html(data.kedisiplinan);
                        $("#komunikasi2").html(data.komunikasi);
                        $("#kreativitas2").html(data.kreativitas);

                        $("#normalisasi_minat_bidang_keagamaan").html(data.minat_bidang_keagamaan);
                        $("#normalisasi_minat_bidang_seni").html(data.minat_bidang_seni);
                        $("#normalisasi_minat_bidang_olahraga").html(data.minat_bidang_olahraga);
                        $("#normalisasi_minat_bidang_akademik").html(data.minat_bidang_akademik);
                        $("#normalisasi_minat_bidang_sosial").html(data.minat_bidang_sosial);
                        $("#normalisasi_minat_bidang_teknologi").html(data.minat_bidang_teknologi);
                        $("#normalisasi_kemampuan_fisik").html(data.kemampuan_fisik);
                        $("#normalisasi_kemampuan_pemecahan_masalah").html(data.kemampuan_pemecahan_masalah);
                        $("#normalisasi_kemampuan_berpikir_kritis").html(data.kemampuan_berpikir_kritis);
                        $("#normalisasi_kemampuan_manajemen_waktu").html(data.kemampuan_manajemen_waktu);
                        $("#normalisasi_kemampuan_kerja_sama_tim").html(data.kemampuan_kerja_sama_tim);
                        $("#normalisasi_kemampuan_teknologi").html(data.kemampuan_teknologi);
                        $("#normalisasi_waktu_tersedia_per_minggu").html(data.waktu_tersedia_per_minggu);
                        $("#normalisasi_motivasi_pengembangan_diri").html(data.motivasi_pengembangan_diri);
                        $("#normalisasi_motivasi_prestasi_kompetitif").html(data.motivasi_prestasi_kompetitif);
                        $("#normalisasi_motivasi_sosial").html(data.motivasi_sosial);
                        $("#normalisasi_kepemimpinan").html(data.kepemimpinan);
                        $("#normalisasi_kedisiplinan").html(data.kedisiplinan);
                        $("#normalisasi_komunikasi").html(data.komunikasi);
                        $("#normalisasi_kreativitas").html(data.kreativitas);

                        // Data ROHIS
                        $("#ncf_minat_rohis").html(data.ncf_minat_rohis);
                        $("#nsf_minat_rohis").html(data.nsf_minat_rohis);
                        $("#n1_rohis").html(data.n1_rohis);
                        $("#ncf_kemampuan_rohis").html(data.ncf_kemampuan_rohis);
                        $("#nsf_kemampuan_rohis").html(data.nsf_kemampuan_rohis);
                        $("#n2_rohis").html(data.n2_rohis);
                        $("#ncf_waktu_rohis").html(data.ncf_waktu_rohis);
                        $("#nsf_waktu_rohis").html(data.nsf_waktu_rohis);
                        $("#n3_rohis").html(data.n3_rohis);
                        $("#ncf_motivasi_rohis").html(data.ncf_motivasi_rohis);
                        $("#nsf_motivasi_rohis").html(data.nsf_motivasi_rohis);
                        $("#n4_rohis").html(data.n4_rohis);
                        $("#ncf_karakteristik_rohis").html(data.ncf_karakteristik_rohis);
                        $("#nsf_karakteristik_rohis").html(data.nsf_karakteristik_rohis);
                        $("#n5_rohis").html(data.n5_rohis);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_rohis").html(data.n_total_rohis);

                        // Data PASKIBRA
                        $("#ncf_minat_paskibra").html(data.ncf_minat_paskibra);
                        $("#nsf_minat_paskibra").html(data.nsf_minat_paskibra);
                        $("#n1_paskibra").html(data.n1_paskibra);
                        $("#ncf_kemampuan_paskibra").html(data.ncf_kemampuan_paskibra);
                        $("#nsf_kemampuan_paskibra").html(data.nsf_kemampuan_paskibra);
                        $("#n2_paskibra").html(data.n2_paskibra);
                        $("#ncf_waktu_paskibra").html(data.ncf_waktu_paskibra);
                        $("#nsf_waktu_paskibra").html(data.nsf_waktu_paskibra);
                        $("#n3_paskibra").html(data.n3_paskibra);
                        $("#ncf_motivasi_paskibra").html(data.ncf_motivasi_paskibra);
                        $("#nsf_motivasi_paskibra").html(data.nsf_motivasi_paskibra);
                        $("#n4_paskibra").html(data.n4_paskibra);
                        $("#ncf_karakteristik_paskibra").html(data.ncf_karakteristik_paskibra);
                        $("#nsf_karakteristik_paskibra").html(data.nsf_karakteristik_paskibra);
                        $("#n5_paskibra").html(data.n5_paskibra);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_paskibra").html(data.n_total_paskibra);

                        // Data PMR
                        $("#ncf_minat_pmr").html(data.ncf_minat_pmr);
                        $("#nsf_minat_pmr").html(data.nsf_minat_pmr);
                        $("#n1_pmr").html(data.n1_pmr);
                        $("#ncf_kemampuan_pmr").html(data.ncf_kemampuan_pmr);
                        $("#nsf_kemampuan_pmr").html(data.nsf_kemampuan_pmr);
                        $("#n2_pmr").html(data.n2_pmr);
                        $("#ncf_waktu_pmr").html(data.ncf_waktu_pmr);
                        $("#nsf_waktu_pmr").html(data.nsf_waktu_pmr);
                        $("#n3_pmr").html(data.n3_pmr);
                        $("#ncf_motivasi_pmr").html(data.ncf_motivasi_pmr);
                        $("#nsf_motivasi_pmr").html(data.nsf_motivasi_pmr);
                        $("#n4_pmr").html(data.n4_pmr);
                        $("#ncf_karakteristik_pmr").html(data.ncf_karakteristik_pmr);
                        $("#nsf_karakteristik_pmr").html(data.nsf_karakteristik_pmr);
                        $("#n5_pmr").html(data.n5_pmr);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_pmr").html(data.n_total_pmr);

                        // Data PRAMUKA
                        $("#ncf_minat_pramuka").html(data.ncf_minat_pramuka);
                        $("#nsf_minat_pramuka").html(data.nsf_minat_pramuka);
                        $("#n1_pramuka").html(data.n1_pramuka);
                        $("#ncf_kemampuan_pramuka").html(data.ncf_kemampuan_pramuka);
                        $("#nsf_kemampuan_pramuka").html(data.nsf_kemampuan_pramuka);
                        $("#n2_pramuka").html(data.n2_pramuka);
                        $("#ncf_waktu_pramuka").html(data.ncf_waktu_pramuka);
                        $("#nsf_waktu_pramuka").html(data.nsf_waktu_pramuka);
                        $("#n3_pramuka").html(data.n3_pramuka);
                        $("#ncf_motivasi_pramuka").html(data.ncf_motivasi_pramuka);
                        $("#nsf_motivasi_pramuka").html(data.nsf_motivasi_pramuka);
                        $("#n4_pramuka").html(data.n4_pramuka);
                        $("#ncf_karakteristik_pramuka").html(data.ncf_karakteristik_pramuka);
                        $("#nsf_karakteristik_pramuka").html(data.nsf_karakteristik_pramuka);
                        $("#n5_pramuka").html(data.n5_pramuka);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_pramuka").html(data.n_total_pramuka);

                        // Data KABAR_15
                        $("#ncf_minat_kabar_15").html(data.ncf_minat_kabar_15);
                        $("#nsf_minat_kabar_15").html(data.nsf_minat_kabar_15);
                        $("#n1_kabar_15").html(data.n1_kabar_15);
                        $("#ncf_kemampuan_kabar_15").html(data.ncf_kemampuan_kabar_15);
                        $("#nsf_kemampuan_kabar_15").html(data.nsf_kemampuan_kabar_15);
                        $("#n2_kabar_15").html(data.n2_kabar_15);
                        $("#ncf_waktu_kabar_15").html(data.ncf_waktu_kabar_15);
                        $("#nsf_waktu_kabar_15").html(data.nsf_waktu_kabar_15);
                        $("#n3_kabar_15").html(data.n3_kabar_15);
                        $("#ncf_motivasi_kabar_15").html(data.ncf_motivasi_kabar_15);
                        $("#nsf_motivasi_kabar_15").html(data.nsf_motivasi_kabar_15);
                        $("#n4_kabar_15").html(data.n4_kabar_15);
                        $("#ncf_karakteristik_kabar_15").html(data.ncf_karakteristik_kabar_15);
                        $("#nsf_karakteristik_kabar_15").html(data.nsf_karakteristik_kabar_15);
                        $("#n5_kabar_15").html(data.n5_kabar_15);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_kabar_15").html(data.n_total_kabar_15);


                        // Data KIR
                        $("#ncf_minat_kir").html(data.ncf_minat_kir);
                        $("#nsf_minat_kir").html(data.nsf_minat_kir);
                        $("#n1_kir").html(data.n1_kir);
                        $("#ncf_kemampuan_kir").html(data.ncf_kemampuan_kir);
                        $("#nsf_kemampuan_kir").html(data.nsf_kemampuan_kir);
                        $("#n2_kir").html(data.n2_kir);
                        $("#ncf_waktu_kir").html(data.ncf_waktu_kir);
                        $("#nsf_waktu_kir").html(data.nsf_waktu_kir);
                        $("#n3_kir").html(data.n3_kir);
                        $("#ncf_motivasi_kir").html(data.ncf_motivasi_kir);
                        $("#nsf_motivasi_kir").html(data.nsf_motivasi_kir);
                        $("#n4_kir").html(data.n4_kir);
                        $("#ncf_karakteristik_kir").html(data.ncf_karakteristik_kir);
                        $("#nsf_karakteristik_kir").html(data.nsf_karakteristik_kir);
                        $("#n5_kir").html(data.n5_kir);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_kir").html(data.n_total_kir);


                        // Data JAPANESE_CLUB
                        $("#ncf_minat_japanese_club").html(data.ncf_minat_japanese_club);
                        $("#nsf_minat_japanese_club").html(data.nsf_minat_japanese_club);
                        $("#n1_japanese_club").html(data.n1_japanese_club);
                        $("#ncf_kemampuan_japanese_club").html(data.ncf_kemampuan_japanese_club);
                        $("#nsf_kemampuan_japanese_club").html(data.nsf_kemampuan_japanese_club);
                        $("#n2_japanese_club").html(data.n2_japanese_club);
                        $("#ncf_waktu_japanese_club").html(data.ncf_waktu_japanese_club);
                        $("#nsf_waktu_japanese_club").html(data.nsf_waktu_japanese_club);
                        $("#n3_japanese_club").html(data.n3_japanese_club);
                        $("#ncf_motivasi_japanese_club").html(data.ncf_motivasi_japanese_club);
                        $("#nsf_motivasi_japanese_club").html(data.nsf_motivasi_japanese_club);
                        $("#n4_japanese_club").html(data.n4_japanese_club);
                        $("#ncf_karakteristik_japanese_club").html(data.ncf_karakteristik_japanese_club);
                        $("#nsf_karakteristik_japanese_club").html(data.nsf_karakteristik_japanese_club);
                        $("#n5_japanese_club").html(data.n5_japanese_club);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_japanese_club").html(data.n_total_japanese_club);

                        // Data OSIS
                        $("#ncf_minat_osis").html(data.ncf_minat_osis);
                        $("#nsf_minat_osis").html(data.nsf_minat_osis);
                        $("#n1_osis").html(data.n1_osis);
                        $("#ncf_kemampuan_osis").html(data.ncf_kemampuan_osis);
                        $("#nsf_kemampuan_osis").html(data.nsf_kemampuan_osis);
                        $("#n2_osis").html(data.n2_osis);
                        $("#ncf_waktu_osis").html(data.ncf_waktu_osis);
                        $("#nsf_waktu_osis").html(data.nsf_waktu_osis);
                        $("#n3_osis").html(data.n3_osis);
                        $("#ncf_motivasi_osis").html(data.ncf_motivasi_osis);
                        $("#nsf_motivasi_osis").html(data.nsf_motivasi_osis);
                        $("#n4_osis").html(data.n4_osis);
                        $("#ncf_karakteristik_osis").html(data.ncf_karakteristik_osis);
                        $("#nsf_karakteristik_osis").html(data.nsf_karakteristik_osis);
                        $("#n5_osis").html(data.n5_osis);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_osis").html(data.n_total_japanese_club);

                        // Data BASKET
                        $("#ncf_minat_basket").html(data.ncf_minat_basket);
                        $("#nsf_minat_basket").html(data.nsf_minat_basket);
                        $("#n1_basket").html(data.n1_basket);
                        $("#ncf_kemampuan_basket").html(data.ncf_kemampuan_basket);
                        $("#nsf_kemampuan_basket").html(data.nsf_kemampuan_basket);
                        $("#n2_basket").html(data.n2_basket);
                        $("#ncf_waktu_basket").html(data.ncf_waktu_basket);
                        $("#nsf_waktu_basket").html(data.nsf_waktu_basket);
                        $("#n3_basket").html(data.n3_basket);
                        $("#ncf_motivasi_basket").html(data.ncf_motivasi_basket);
                        $("#nsf_motivasi_basket").html(data.nsf_motivasi_basket);
                        $("#n4_basket").html(data.n4_basket);
                        $("#ncf_karakteristik_basket").html(data.ncf_karakteristik_basket);
                        $("#nsf_karakteristik_basket").html(data.nsf_karakteristik_basket);
                        $("#n5_basket").html(data.n5_basket);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_basket").html(data.n_total_basket);

                        // Data BADMINTON
                        $("#ncf_minat_badminton").html(data.ncf_minat_badminton);
                        $("#nsf_minat_badminton").html(data.nsf_minat_badminton);
                        $("#n1_badminton").html(data.n1_badminton);
                        $("#ncf_kemampuan_badminton").html(data.ncf_kemampuan_badminton);
                        $("#nsf_kemampuan_badminton").html(data.nsf_kemampuan_badminton);
                        $("#n2_badminton").html(data.n2_badminton);
                        $("#ncf_waktu_badminton").html(data.ncf_waktu_badminton);
                        $("#nsf_waktu_badminton").html(data.nsf_waktu_badminton);
                        $("#n3_badminton").html(data.n3_badminton);
                        $("#ncf_motivasi_badminton").html(data.ncf_motivasi_badminton);
                        $("#nsf_motivasi_badminton").html(data.nsf_motivasi_badminton);
                        $("#n4_badminton").html(data.n4_badminton);
                        $("#ncf_karakteristik_badminton").html(data.ncf_karakteristik_badminton);
                        $("#nsf_karakteristik_badminton").html(data.nsf_karakteristik_badminton);
                        $("#n5_badminton").html(data.n5_badminton);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_badminton").html(data.n_total_badminton);

                        // Data VOLI
                        $("#ncf_minat_voli").html(data.ncf_minat_voli);
                        $("#nsf_minat_voli").html(data.nsf_minat_voli);
                        $("#n1_voli").html(data.n1_voli);
                        $("#ncf_kemampuan_voli").html(data.ncf_kemampuan_voli);
                        $("#nsf_kemampuan_voli").html(data.nsf_kemampuan_voli);
                        $("#n2_voli").html(data.n2_voli);
                        $("#ncf_waktu_voli").html(data.ncf_waktu_voli);
                        $("#nsf_waktu_voli").html(data.nsf_waktu_voli);
                        $("#n3_voli").html(data.n3_voli);
                        $("#ncf_motivasi_voli").html(data.ncf_motivasi_voli);
                        $("#nsf_motivasi_voli").html(data.nsf_motivasi_voli);
                        $("#n4_voli").html(data.n4_voli);
                        $("#ncf_karakteristik_voli").html(data.ncf_karakteristik_voli);
                        $("#nsf_karakteristik_voli").html(data.nsf_karakteristik_voli);
                        $("#n5_voli").html(data.n5_voli);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_voli").html(data.n_total_voli);

                        // Data SEPAK_BOLA
                        $("#ncf_minat_sepak_bola").html(data.ncf_minat_sepak_bola);
                        $("#nsf_minat_sepak_bola").html(data.nsf_minat_sepak_bola);
                        $("#n1_sepak_bola").html(data.n1_sepak_bola);
                        $("#ncf_kemampuan_sepak_bola").html(data.ncf_kemampuan_sepak_bola);
                        $("#nsf_kemampuan_sepak_bola").html(data.nsf_kemampuan_sepak_bola);
                        $("#n2_sepak_bola").html(data.n2_sepak_bola);
                        $("#ncf_waktu_sepak_bola").html(data.ncf_waktu_sepak_bola);
                        $("#nsf_waktu_sepak_bola").html(data.nsf_waktu_sepak_bola);
                        $("#n3_sepak_bola").html(data.n3_sepak_bola);
                        $("#ncf_motivasi_sepak_bola").html(data.ncf_motivasi_sepak_bola);
                        $("#nsf_motivasi_sepak_bola").html(data.nsf_motivasi_sepak_bola);
                        $("#n4_sepak_bola").html(data.n4_sepak_bola);
                        $("#ncf_karakteristik_sepak_bola").html(data.ncf_karakteristik_sepak_bola);
                        $("#nsf_karakteristik_sepak_bola").html(data.nsf_karakteristik_sepak_bola);
                        $("#n5_sepak_bola").html(data.n5_sepak_bola);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_sepak_bola").html(data.n_total_sepak_bola);

                        // Data FUTSAL
                        $("#ncf_minat_futsal").html(data.ncf_minat_futsal);
                        $("#nsf_minat_futsal").html(data.nsf_minat_futsal);
                        $("#n1_futsal").html(data.n1_futsal);
                        $("#ncf_kemampuan_futsal").html(data.ncf_kemampuan_futsal);
                        $("#nsf_kemampuan_futsal").html(data.nsf_kemampuan_futsal);
                        $("#n2_futsal").html(data.n2_futsal);
                        $("#ncf_waktu_futsal").html(data.ncf_waktu_futsal);
                        $("#nsf_waktu_futsal").html(data.nsf_waktu_futsal);
                        $("#n3_futsal").html(data.n3_futsal);
                        $("#ncf_motivasi_futsal").html(data.ncf_motivasi_futsal);
                        $("#nsf_motivasi_futsal").html(data.nsf_motivasi_futsal);
                        $("#n4_futsal").html(data.n4_futsal);
                        $("#ncf_karakteristik_futsal").html(data.ncf_karakteristik_futsal);
                        $("#nsf_karakteristik_futsal").html(data.nsf_karakteristik_futsal);
                        $("#n5_futsal").html(data.n5_futsal);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_futsal").html(data.n_total_futsal);

                        // Data SENI_SUARA
                        $("#ncf_minat_seni_suara").html(data.ncf_minat_seni_suara);
                        $("#nsf_minat_seni_suara").html(data.nsf_minat_seni_suara);
                        $("#n1_seni_suara").html(data.n1_seni_suara);
                        $("#ncf_kemampuan_seni_suara").html(data.ncf_kemampuan_seni_suara);
                        $("#nsf_kemampuan_seni_suara").html(data.nsf_kemampuan_seni_suara);
                        $("#n2_seni_suara").html(data.n2_seni_suara);
                        $("#ncf_waktu_seni_suara").html(data.ncf_waktu_seni_suara);
                        $("#nsf_waktu_seni_suara").html(data.nsf_waktu_seni_suara);
                        $("#n3_seni_suara").html(data.n3_seni_suara);
                        $("#ncf_motivasi_seni_suara").html(data.ncf_motivasi_seni_suara);
                        $("#nsf_motivasi_seni_suara").html(data.nsf_motivasi_seni_suara);
                        $("#n4_seni_suara").html(data.n4_seni_suara);
                        $("#ncf_karakteristik_seni_suara").html(data.ncf_karakteristik_seni_suara);
                        $("#nsf_karakteristik_seni_suara").html(data.nsf_karakteristik_seni_suara);
                        $("#n5_seni_suara").html(data.n5_seni_suara);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_seni_suara").html(data.n_total_seni_suara);

                        // Data TARI_SAMAN
                        $("#ncf_minat_tari_saman").html(data.ncf_minat_tari_saman);
                        $("#nsf_minat_tari_saman").html(data.nsf_minat_tari_saman);
                        $("#n1_tari_saman").html(data.n1_tari_saman);
                        $("#ncf_kemampuan_tari_saman").html(data.ncf_kemampuan_tari_saman);
                        $("#nsf_kemampuan_tari_saman").html(data.nsf_kemampuan_tari_saman);
                        $("#n2_tari_saman").html(data.n2_tari_saman);
                        $("#ncf_waktu_tari_saman").html(data.ncf_waktu_tari_saman);
                        $("#nsf_waktu_tari_saman").html(data.nsf_waktu_tari_saman);
                        $("#n3_tari_saman").html(data.n3_tari_saman);
                        $("#ncf_motivasi_tari_saman").html(data.ncf_motivasi_tari_saman);
                        $("#nsf_motivasi_tari_saman").html(data.nsf_motivasi_tari_saman);
                        $("#n4_tari_saman").html(data.n4_tari_saman);
                        $("#ncf_karakteristik_tari_saman").html(data.ncf_karakteristik_tari_saman);
                        $("#nsf_karakteristik_tari_saman").html(data.nsf_karakteristik_tari_saman);
                        $("#n5_tari_saman").html(data.n5_tari_saman);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_tari_saman").html(data.n_total_tari_saman);

                        // Data TARI_LENGGANG_CISADANE
                        $("#ncf_minat_tari_lenggang_cisadane").html(data.ncf_minat_tari_lenggang_cisadane);
                        $("#nsf_minat_tari_lenggang_cisadane").html(data.nsf_minat_tari_lenggang_cisadane);
                        $("#n1_tari_lenggang_cisadane").html(data.n1_tari_lenggang_cisadane);
                        $("#ncf_kemampuan_tari_lenggang_cisadane").html(data.ncf_kemampuan_tari_lenggang_cisadane);
                        $("#nsf_kemampuan_tari_lenggang_cisadane").html(data.nsf_kemampuan_tari_lenggang_cisadane);
                        $("#n2_tari_lenggang_cisadane").html(data.n2_tari_lenggang_cisadane);
                        $("#ncf_waktu_tari_lenggang_cisadane").html(data.ncf_waktu_tari_lenggang_cisadane);
                        $("#nsf_waktu_tari_lenggang_cisadane").html(data.nsf_waktu_tari_lenggang_cisadane);
                        $("#n3_tari_lenggang_cisadane").html(data.n3_tari_lenggang_cisadane);
                        $("#ncf_motivasi_tari_lenggang_cisadane").html(data.ncf_motivasi_tari_lenggang_cisadane);
                        $("#nsf_motivasi_tari_lenggang_cisadane").html(data.nsf_motivasi_tari_lenggang_cisadane);
                        $("#n4_tari_lenggang_cisadane").html(data.n4_tari_lenggang_cisadane);
                        $("#ncf_karakteristik_tari_lenggang_cisadane").html(data.ncf_karakteristik_tari_lenggang_cisadane);
                        $("#nsf_karakteristik_tari_lenggang_cisadane").html(data.nsf_karakteristik_tari_lenggang_cisadane);
                        $("#n5_tari_lenggang_cisadane").html(data.n5_tari_lenggang_cisadane);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_tari_lenggang_cisadane").html(data.n_total_tari_lenggang_cisadane);

                        // Data TEATER
                        $("#ncf_minat_teater").html(data.ncf_minat_teater);
                        $("#nsf_minat_teater").html(data.nsf_minat_teater);
                        $("#n1_teater").html(data.n1_teater);
                        $("#ncf_kemampuan_teater").html(data.ncf_kemampuan_teater);
                        $("#nsf_kemampuan_teater").html(data.nsf_kemampuan_teater);
                        $("#n2_teater").html(data.n2_teater);
                        $("#ncf_waktu_teater").html(data.ncf_waktu_teater);
                        $("#nsf_waktu_teater").html(data.nsf_waktu_teater);
                        $("#n3_teater").html(data.n3_teater);
                        $("#ncf_motivasi_teater").html(data.ncf_motivasi_teater);
                        $("#nsf_motivasi_teater").html(data.nsf_motivasi_teater);
                        $("#n4_teater").html(data.n4_teater);
                        $("#ncf_karakteristik_teater").html(data.ncf_karakteristik_teater);
                        $("#nsf_karakteristik_teater").html(data.nsf_karakteristik_teater);
                        $("#n5_teater").html(data.n5_teater);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_teater").html(data.n_total_teater);

                        // Data TAEKWONDO
                        $("#ncf_minat_taekwondo").html(data.ncf_minat_taekwondo);
                        $("#nsf_minat_taekwondo").html(data.nsf_minat_taekwondo);
                        $("#n1_taekwondo").html(data.n1_taekwondo);
                        $("#ncf_kemampuan_taekwondo").html(data.ncf_kemampuan_taekwondo);
                        $("#nsf_kemampuan_taekwondo").html(data.nsf_kemampuan_taekwondo);
                        $("#n2_taekwondo").html(data.n2_taekwondo);
                        $("#ncf_waktu_taekwondo").html(data.ncf_waktu_taekwondo);
                        $("#nsf_waktu_taekwondo").html(data.nsf_waktu_taekwondo);
                        $("#n3_taekwondo").html(data.n3_taekwondo);
                        $("#ncf_motivasi_taekwondo").html(data.ncf_motivasi_taekwondo);
                        $("#nsf_motivasi_taekwondo").html(data.nsf_motivasi_taekwondo);
                        $("#n4_taekwondo").html(data.n4_taekwondo);
                        $("#ncf_karakteristik_taekwondo").html(data.ncf_karakteristik_taekwondo);
                        $("#nsf_karakteristik_taekwondo").html(data.nsf_karakteristik_taekwondo);
                        $("#n5_taekwondo").html(data.n5_taekwondo);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_taekwondo").html(data.n_total_taekwondo);

                        // Data BELA_DIRI_CANDA_BIRAWA
                        $("#ncf_minat_canda_birawa").html(data.ncf_minat_canda_birawa);
                        $("#nsf_minat_canda_birawa").html(data.nsf_minat_canda_birawa);
                        $("#n1_canda_birawa").html(data.n1_canda_birawa);
                        $("#ncf_kemampuan_canda_birawa").html(data.ncf_kemampuan_canda_birawa);
                        $("#nsf_kemampuan_canda_birawa").html(data.nsf_kemampuan_canda_birawa);
                        $("#n2_canda_birawa").html(data.n2_canda_birawa);
                        $("#ncf_waktu_canda_birawa").html(data.ncf_waktu_canda_birawa);
                        $("#nsf_waktu_canda_birawa").html(data.nsf_waktu_canda_birawa);
                        $("#n3_canda_birawa").html(data.n3_canda_birawa);
                        $("#ncf_motivasi_canda_birawa").html(data.ncf_motivasi_canda_birawa);
                        $("#nsf_motivasi_canda_birawa").html(data.nsf_motivasi_canda_birawa);
                        $("#n4_canda_birawa").html(data.n4_canda_birawa);
                        $("#ncf_karakteristik_canda_birawa").html(data.ncf_karakteristik_canda_birawa);
                        $("#nsf_karakteristik_canda_birawa").html(data.nsf_karakteristik_canda_birawa);
                        $("#n5_canda_birawa").html(data.n5_canda_birawa);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_canda_birawa").html(data.n_total_canda_birawa);


                        // Data BELA_DIRI_MATAHARI
                        $("#ncf_minat_bela_diri_matahari").html(data.ncf_minat_bela_diri_matahari);
                        $("#nsf_minat_bela_diri_matahari").html(data.nsf_minat_bela_diri_matahari);
                        $("#n1_bela_diri_matahari").html(data.n1_bela_diri_matahari);
                        $("#ncf_kemampuan_bela_diri_matahari").html(data.ncf_kemampuan_bela_diri_matahari);
                        $("#nsf_kemampuan_bela_diri_matahari").html(data.nsf_kemampuan_bela_diri_matahari);
                        $("#n2_bela_diri_matahari").html(data.n2_bela_diri_matahari);
                        $("#ncf_waktu_bela_diri_matahari").html(data.ncf_waktu_bela_diri_matahari);
                        $("#nsf_waktu_bela_diri_matahari").html(data.nsf_waktu_bela_diri_matahari);
                        $("#n3_bela_diri_matahari").html(data.n3_bela_diri_matahari);
                        $("#ncf_motivasi_bela_diri_matahari").html(data.ncf_motivasi_bela_diri_matahari);
                        $("#nsf_motivasi_bela_diri_matahari").html(data.nsf_motivasi_bela_diri_matahari);
                        $("#n4_bela_diri_matahari").html(data.n4_bela_diri_matahari);
                        $("#ncf_karakteristik_bela_diri_matahari").html(data.ncf_karakteristik_bela_diri_matahari);
                        $("#nsf_karakteristik_bela_diri_matahari").html(data.nsf_karakteristik_bela_diri_matahari);
                        $("#n5_bela_diri_matahari").html(data.n5_bela_diri_matahari);
                        $("#n1_plus_n2_plus_n3_plus_n4_plus_n5_bela_diri_matahari").html(data.n_total_bela_diri_matahari);


                        // Tampilkan nilai total tiap ekskul di elemen HTML masing-masing
                        $("#rohis_akhir").html(data.n_total_rohis);
                        $("#paskibra_akhir").html(data.n_total_paskibra);
                        $("#pmr_akhir").html(data.n_total_pmr);
                        $("#pramuka_akhir").html(data.n_total_pramuka);
                        $("#kabar_15_akhir").html(data.n_total_kabar_15);
                        $("#kir_akhir").html(data.n_total_kir);
                        $("#japanese_club_akhir").html(data.n_total_japanese_club);
                        $("#osis_akhir").html(data.n_total_osis);
                        $("#basket_akhir").html(data.n_total_basket);
                        $("#badminton_akhir").html(data.n_total_badminton);
                        $("#voli_akhir").html(data.n_total_voli);
                        $("#sepak_bola_akhir").html(data.n_total_sepak_bola);
                        $("#futsal_akhir").html(data.n_total_futsal);
                        $("#seni_suara_akhir").html(data.n_total_seni_suara);
                        $("#tari_saman_akhir").html(data.n_total_tari_saman);
                        $("#tari_lenggang_cisadane_akhir").html(data.n_total_tari_lenggang_cisadane);
                        $("#teater_akhir").html(data.n_total_teater);
                        $("#taekwondo_akhir").html(data.n_total_taekwondo);
                        $("#bela_diri_canda_birawa_akhir").html(data.n_total_canda_birawa);
                        $("#bela_diri_matahari_akhir").html(data.n_total_bela_diri_matahari);

                        var ekstrakurikuler = [
                        { name: "rohis", total: data.n_total_rohis },
                        { name: "paskibra", total: data.n_total_paskibra },
                        { name: "pmr", total: data.n_total_pmr },
                        { name: "pramuka", total: data.n_total_pramuka },
                        { name: "kabar_15", total: data.n_total_kabar_15 },
                        { name: "kir", total: data.n_total_kir },
                        { name: "japanese_club", total: data.n_total_japanese_club },
                        { name: "osis", total: data.n_total_osis },
                        { name: "basket", total: data.n_total_basket },
                        { name: "badminton", total: data.n_total_badminton },
                        { name: "voli", total: data.n_total_voli },
                        { name: "sepak_bola", total: data.n_total_sepak_bola },
                        { name: "futsal", total: data.n_total_futsal },
                        { name: "seni_suara", total: data.n_total_seni_suara },
                        { name: "tari_saman", total: data.n_total_tari_saman },
                        { name: "tari_lenggang_cisadane", total: data.n_total_tari_lenggang_cisadane },
                        { name: "teater", total: data.n_total_teater },
                        { name: "taekwondo", total: data.n_total_taekwondo },
                        { name: "canda_birawa", total: data.n_total_canda_birawa },
                        { name: "bela_diri_matahari", total: data.n_total_bela_diri_matahari }
                    ];

                    // Mengurutkan array berdasarkan nilai total secara menurun
                    ekstrakurikuler.sort(function(a, b) {
                        return b.total - a.total; // urutkan secara menurun
                    });

                    // Menampilkan nilai untuk semua ekstrakurikuler di UI
                    ekstrakurikuler.forEach(function(item) {
                        $("#" + item.name + "_akhir").html(item.total); // Menampilkan nilai ekstrakurikuler pada elemen yang sesuai
                    });

                    // Menampilkan 3 ekstrakurikuler dengan nilai tertinggi
                    var top3 = ekstrakurikuler.slice(0, 3);  // Ambil 3 ekstrakurikuler teratas

                    // Menampilkan hasil di UI
                    $("#top_ekskul_1").html(top3[0].name + " (" + top3[0].total + ")");
                    $("#top_ekskul_2").html(top3[1].name + " (" + top3[1].total + ")");
                    $("#top_ekskul_3").html(top3[2].name + " (" + top3[2].total + ")");

                    // Menentukan kesimpulan dan menampilkan hasil ekstrakurikuler terbaik
                    var kesimpulan = "Tiga ekstrakurikuler terbaik adalah: <br>" + 
                        "1. " + top3[0].name + " (" + top3[0].total + ")<br>" +
                        "2. " + top3[1].name + " (" + top3[1].total + ")<br>" +
                        "3. " + top3[2].name + " (" + top3[2].total + ")";
                    $("#kesimpulan").html(kesimpulan);

                },
                error: function(xhr, status, error) {
                    // Tangani error dan tampilkan pesan kesalahan yang sesuai
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                        "Terjadi kesalahan saat memproses permintaan.";
                    Toast.fire({
                        icon: "error",
                        title: errorMessage,
                    });
                },
            })
        })

            $(document).on("click", "#btn-edit", function() {
                const id = $(this).data("id");

                $.ajax({
                    url: "edit-siswa.php?id=" + id,
                    data: {
                        id: id,
                    },
                    method: "post",
                    dataType: "json",
                    success: function(data) {
                        $("#siswaModal").modal("show");
                        $("#ModalLabel").html("Edit Data Siswa");
                        $(".modal-header").addClass("bg-info");
                        $(".btn-submit").html("Update");
                        $("#id").val(data.id);
                        $("#nis").val(data.nis);
                        $("#nama_siswa").val(data.nama_siswa);
                        $('[name="kelas"] option[value="' + data.kelas + '"]').prop(
                            "selected",
                            true
                        );
                        $(
                            '[name="jenis_kelamin"] option[value="' + data.jenis_kelamin + '"]'
                        ).prop("selected", true);
                        $('[name="tahun_ajaran"] option[value="' + data.tahun_ajaran + '"]').prop(
                            "selected",
                            true
                        );
                        $("#action").val("edit");
                    },
                    error: function(data) {
                        alert("Error");
                    },
                });
            });

            $(document).on("click", "#btn-hapus", function() {
                const id = $(this).data("id");

                var tableSiswa = $("#tblSiswa").DataTable();

                Swal.fire({
                    title: "Anda yakin?",
                    text: "Data siswa akan dihapus!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "hapus-siswa.php?id=" + id,
                            data: {
                                id: id,
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    // Tampilkan pesan sukses atau lakukan tindakan lainnya
                                    Toast.fire({
                                        icon: "success",
                                        title: "Data siswa berhasil dihapus",
                                    });
                                    tableSiswa.ajax.reload();
                                } else {
                                    // Tampilkan pesan error jika diperlukan
                                    Toast.fire({
                                        icon: "error",
                                        title: "Data siswa gagal dihapus",
                                    });
                                }
                            },
                        });
                    }
                });
            });

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });
        </script>
</body>

</html>