<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
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

    <title>SPK - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../index.php" style="gap: 10px;">
             <img src="../img/sma15.png" alt="Logo SPK" style="max-height: 40px;">
            <div class="sidebar-brand-text" style="line-height: 1; text-align: left;">
             <div style="font-weight: 700; font-size: 1.2rem;">SMAN 15</div>
             <div style="font-weight: 700; font-size: 0.75rem;">Kota Tangerang</div>
            </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard-kepsek.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
<!-- Divider -->
   <hr class="sidebar-divider" />
          
          <!-- Heading -->
          <div class="sidebar-heading">Daftar Ekstrakurikuler</div>
          
          <!-- Nav Item - Charts -->
          <li class="nav-item">
              <a class="nav-link" href="ekskul/daftra_ekskuls.php">
                  <i class="fas fa-fw fa-trophy"></i>
                  <span>Daftar Ekstrakurikuler</span></a>
          </li>
            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Data Penilaian</div>

             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true"
                    aria-controls="master">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Penilaian</span>
                </a>
                <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Settings Data Penilaian:</h6>
                        <a class="collapse-item" href="kriteria/kriterias.php">Kriteria</a>
                        <a class="collapse-item" href="sub-kriteria/sub-kriterias.php">Sub Kriteria</a>
                        <a class="collapse-item" href="target/targets.php">Nilai Target</a>
                    </div>
                </div>
            </li>
 <!-- Divider -->
 <hr class="sidebar-divider" />

<!-- Heading -->
<div class="sidebar-heading">Pages</div>
<!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="siswa/siswas.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Siswa</span></a>
            </li>
<li class="nav-item">
    <a class="nav-link" href="profile-matching/profile-matchings.php">
        <i class="fas fa-fw fa-certificate"></i>
        <span>Profile Matching</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="laporan/laporans.php">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <?php
                    include '../config/koneksi.php';

                    $sql = "SELECT * FROM students";

                    $result = mysqli_query($konek, $sql);

                    $total = mysqli_num_rows($result);

                    ?>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Siswa Terdaftar
                                            </div>
                                            <div class="h2 mb-4 font-weight-bold text-gray-800">
                                                <?php echo $total ?>
                                            </div>
                                            <a href="siswa/siswa.php" class="btn btn-sm btn-primary">Cek Detail</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    include '../config/koneksi.php';

                    $sql = "SELECT * FROM daftra_ekskul";

                    $result = mysqli_query($konek, $sql);

                    $total = mysqli_num_rows($result);

                    ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Daftar Ekstrakurikuler
                                            </div>
                                            <div class="h2 mb-4 font-weight-bold text-gray-800">
                                            <?php echo $total ?>
                                            </div>
                                            <a href="ekskul/daftra_ekskuls.php" class="btn btn-sm btn-primary">Cek Detail</a>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-basketball-ball fa-2x text-gray-300"></i> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    include '../config/koneksi.php';

                    $sql = "SELECT * FROM kriteria";

                    $result = mysqli_query($konek, $sql);

                    $total = mysqli_num_rows($result);

                    ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Daftar Kriteria
                                            </div>
                                            <div class="h2 mb-4 font-weight-bold text-gray-800">
                                            <?php echo $total ?>
                                            </div>
                                            <a href="kriteria/kriterias.php" class="btn btn-sm btn-primary">Cek Detail</a>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    include '../config/koneksi.php';

                    $sql = "SELECT * FROM sub_kriteria";

                    $result = mysqli_query($konek, $sql);

                    $total = mysqli_num_rows($result);

                    ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Daftar Sub Kriteria
                                            </div>
                                            <div class="h2 mb-4 font-weight-bold text-gray-800">
                                            <?php echo $total ?>
                                            </div> 
                                            <a href="sub-kriteria/sub-kriterias.php" class="btn btn-sm btn-primary">Cek Detail</a>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-filter fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profile Matching Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tbl_pm_siswa" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
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
      color: #d6336c !important; /* warna hover, bisa disesuaikan */
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-danger" href="auth/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
            tbl_pm_siswa();
        })

        function tbl_pm_siswa() {
            $("#tbl_pm_siswa").DataTable({
                lengthChange: true,
                processing: true,
                ajax: {
                    url: "laporan/list-siswa-jurusan.php",
                },
                columns: [{
                        data: null,
                        sortable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "nis",
                        name: "nis",
                    },
                    {
                        data: "nama_siswa",
                        name: "nama_siswa",
                    },
                    {
                        data: "tahun_ajaran",
                        name: "tahun_ajaran",
                    },
                    {
                        data: "jurusan",
                        name: "jurusan",
                    },
                ],
            });
        }
    </script>

</body>

</html>