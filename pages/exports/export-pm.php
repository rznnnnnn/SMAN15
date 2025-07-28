<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
    exit();
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

    <title>SPK - Data Profile Matching</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css">

    <script>
        // Function for auto-submit when changing class
        function autoSubmit() {
            document.getElementById("kelasForm").submit();
        }
    </script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
                        <h1 class="h3 mb-0 text-gray-800">Cetak Data Profile Matching</h1>
                    </div>

                    <!-- Form with auto-submit -->
                    <form action="" method="GET" id="kelasForm">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <select name="kelas" id="kelas" class="form-control" onchange="autoSubmit()">
                                        <option value="0" disabled selected>-- Pilih Kelas --</option>
                                        <?php
                                        include '../../config/koneksi.php';

                                        $query = "SELECT kelas FROM students GROUP BY kelas";
                                        $result = mysqli_query($konek, $query);
                                        while ($data = mysqli_fetch_array($result)) {
                                            // Check if current class is selected
                                            $selected = isset($_GET['kelas']) && $_GET['kelas'] == $data['kelas'] ? 'selected' : '';
                                            echo '<option value="' . $data['kelas'] . '" ' . $selected . '>' . $data['kelas'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <?php
                            include '../../config/koneksi.php';

                            // Default to empty or the selected class
                            $kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';

                            // Update query based on the selected class
                            if ($kelas) {
                                $query = "SELECT pm.n_total_rohis, 
                                pm.n_total_paskibra, 
                                pm.n_total_pmr, 
                                pm.n_total_pramuka, 
                                pm.n_total_kabar_15, 
                                pm.n_total_kir, 
                                pm.n_total_japanese_club, 
                                pm.n_total_osis, 
                                pm.n_total_basket, 
                                pm.n_total_badminton, 
                                pm.n_total_voli, 
                                pm.n_total_sepak_bola, 
                                pm.n_total_futsal, 
                                pm.n_total_seni_suara, 
                                pm.n_total_tari_saman, 
                                pm.n_total_tari_lenggang_cisadane, 
                                pm.n_total_teater, 
                                pm.n_total_taekwondo, 
                                pm.n_total_canda_birawa, 
                                pm.n_total_bela_diri_matahari, st.* 
                                FROM `profile_matching` as pm
                                JOIN students as st ON pm.students_id = st.id 
                                WHERE st.kelas = '$kelas' ORDER BY st.id DESC";
                            } else {
                                $query = "SELECT pm.n_total_rohis, 
                                pm.n_total_paskibra, 
                                pm.n_total_pmr, 
                                pm.n_total_pramuka, 
                                pm.n_total_kabar_15, 
                                pm.n_total_kir, 
                                pm.n_total_japanese_club, 
                                pm.n_total_osis, 
                                pm.n_total_basket, 
                                pm.n_total_badminton, 
                                pm.n_total_voli, 
                                pm.n_total_sepak_bola, 
                                pm.n_total_futsal, 
                                pm.n_total_seni_suara, 
                                pm.n_total_tari_saman, 
                                pm.n_total_tari_lenggang_cisadane, 
                                pm.n_total_teater, 
                                pm.n_total_taekwondo, 
                                pm.n_total_canda_birawa, 
                                pm.n_total_bela_diri_matahari, st.* 
                                FROM `profile_matching` as pm
                                JOIN students as st ON pm.students_id = st.id
                                ORDER BY st.id DESC";
                            }
                            ?>

                            <div class="col">
                                <div class="mb-3">
                                    <a href="export-pm-pdf.php?kelas=<?= $kelas ?>" class="btn btn-sm btn-dark text-white" target="_blank"><i class="bi bi-filetype-pdf"></i> Export Pdf</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Profile Matching</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tblSiswa" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kelas</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Nilai Rohis</th>
                                            <th>Nilai Paskibra</th>
                                            <th>Nilai PMR</th>
                                            <th>Nilai Pramuka</th>
                                            <th>Nilai Kabar 15</th>
                                            <th>Nilai KIR</th>
                                            <th>Nilai Japanese Club</th>
                                            <th>Nilai OSIS</th>
                                            <th>Nilai Basket</th>
                                            <th>Nilai Badminton</th>
                                            <th>Nilai Voli</th>
                                            <th>Nilai Sepak Bola</th>
                                            <th>Nilai Futsal</th>
                                            <th>Nilai Seni Suara</th>
                                            <th>Nilai Tari Saman</th>
                                            <th>Nilai Tari Lenggang Cisadane</th>
                                            <th>Nilai Teater</th>
                                            <th>Nilai Taekwondo</th>
                                            <th>Nilai Canda Birawa</th>
                                            <th>Nilai Bela Diri Matahari</th>
                                            <th>Rekomendasi Ekstrakurikuler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $result = mysqli_query($konek, $query);
                                        while ($data = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nis'] ?></td>
                                                <td><?= $data['nama_siswa'] ?></td>
                                                <td><?= $data['jenis_kelamin'] ?></td>
                                                <td><?= $data['kelas'] ?></td>
                                                <td><?= $data['tahun_ajaran'] ?></td>
                                                <td><?= $data['n_total_rohis'] ?></td>
                                                <td><?= $data['n_total_paskibra'] ?></td>
                                                <td><?= $data['n_total_pmr'] ?></td>
                                                <td><?= $data['n_total_pramuka'] ?></td>
                                                <td><?= $data['n_total_kabar_15'] ?></td>
                                                <td><?= $data['n_total_kir'] ?></td>
                                                <td><?= $data['n_total_japanese_club'] ?></td>
                                                <td><?= $data['n_total_osis'] ?></td>
                                                <td><?= $data['n_total_basket'] ?></td>
                                                <td><?= $data['n_total_badminton'] ?></td>
                                                <td><?= $data['n_total_voli'] ?></td>
                                                <td><?= $data['n_total_sepak_bola'] ?></td>
                                                <td><?= $data['n_total_futsal'] ?></td>
                                                <td><?= $data['n_total_seni_suara'] ?></td>
                                                <td><?= $data['n_total_tari_saman'] ?></td>
                                                <td><?= $data['n_total_tari_lenggang_cisadane'] ?></td>
                                                <td><?= $data['n_total_teater'] ?></td>
                                                <td><?= $data['n_total_taekwondo'] ?></td>
                                                <td><?= $data['n_total_canda_birawa'] ?></td>
                                                <td><?= $data['n_total_bela_diri_matahari'] ?></td>
                                                <td>
                                                    <?php
                                                    // Menampilkan ekstrakurikuler terbaik
                                                    $nilai_ekskul = [
                                                        'ROHIS' => $data['n_total_rohis'],
                                                        'Paskibra' => $data['n_total_paskibra'],
                                                        'PMR' => $data['n_total_pmr'],
                                                        'Pramuka' => $data['n_total_pramuka'],
                                                        'Kabar_15' => $data['n_total_kabar_15'],
                                                        'KIR' => $data['n_total_kir'],
                                                        'Japanese_Club' => $data['n_total_japanese_club'],
                                                        'OSIS' => $data['n_total_osis'],
                                                        'Basket' => $data['n_total_basket'],
                                                        'Badminton' => $data['n_total_badminton'],
                                                        'Voli' => $data['n_total_voli'],
                                                        'Sepak_Bola' => $data['n_total_sepak_bola'],
                                                        'Futsal' => $data['n_total_futsal'],
                                                        'Seni_Suara' => $data['n_total_seni_suara'],
                                                        'Tari_Saman' => $data['n_total_tari_saman'],
                                                        'Tari_Lenggang_Cisadane' => $data['n_total_tari_lenggang_cisadane'],
                                                        'Teater' => $data['n_total_teater'],
                                                        'Taekwondo' => $data['n_total_taekwondo'],
                                                        'Canda_Birawa' => $data['n_total_canda_birawa'],
                                                        'Bela_Diri_Matahari' => $data['n_total_bela_diri_matahari']
                                                    ];

                                                    // Mengurutkan nilai dari yang terbesar ke yang terkecil
                                                    arsort($nilai_ekskul);

                                                    // Mengambil 3 ekstrakurikuler dengan nilai tertinggi
                                                    $top_3_ekskul = array_slice($nilai_ekskul, 0, 3);

                                                    // Menampilkan nomor urut dan nama 3 ekstrakurikuler dengan nilai tertinggi
                                                    $nomor = 1; // Mulai dari nomor 1
                                                    foreach ($top_3_ekskul as $ekskul => $nilai) {
                                                        echo $nomor . ". " . $ekskul . "<br>";
                                                        $nomor++; // Increment nomor urut
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../js/sb-admin-2.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tblSiswa').DataTable();
        });
    </script>
</body>

</html>
