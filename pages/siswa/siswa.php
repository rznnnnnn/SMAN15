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

    <title>SPK - Data Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

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
                <a class="nav-link" href="../dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
      <!-- Divider -->
      <hr class="sidebar-divider" />

<!-- Heading -->
<div class="sidebar-heading">Daftar Ekstrakurikuler</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="../ekskul/daftra_ekskul.php">
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
                        <a class="collapse-item" href="../kriteria/kriteria.php">Kriteria</a>
                        <a class="collapse-item" href="../sub-kriteria/sub-kriteria.php">Sub Kriteria</a>
                        <a class="collapse-item" href="../target/target.php">Nilai Target</a> 
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Pages</div>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="siswa.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Siswa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../profile-matching/profile-matching.php">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Profile Matching</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../laporan/laporan.php">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Laporan Profile Matching</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Heading -->
            <div class="sidebar-heading">Account</div>

            <li class="nav-item">
                <a class="nav-link" href="../user/user.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span></a>
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
                        <div class="d-sm-flex align-items-center justify-content-between ">
                            <a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2 btn-add"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Siswa </a>
                            <a href="../exports/export-siswa.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak PDF</a>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tblSiswa" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Kelas</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
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

    <!-- Modal Data Siswa-->
    <div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="ModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-siswa">
                        <div class="form-group">
                            <label for="nis">NISN</label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <input type="hidden" class="form-control" id="action" name="action">
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="NISN" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" required>
                        </div>
                        <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <select class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
                                <option selected disabled>Pilih Tahun Ajaran</option>
                                <!-- buat tahun ajaran dari tahun 2021 sampai tahun yang sekarang-->
                                <?php
                                $now = date('Y');
                                for ($i = 2021; $i <= $now; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                Cancel
                            </button>
                            <button class="btn btn-primary btn-submit" type="submit">Save</button>
                        </div>
                    </form>
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

    <script>
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

        $("#siswaModal").on("hide.bs.modal", function() {
            $("#ModalLabel").html("Tambah Data Siswa");
            $(".modal-header").removeClass("bg-info");
            $("#id").val("");
            $("#nis").val("");
            $("#nama_siswa").val("");
            $("#kelas").val("");
            $("#jenis_kelamin").html(`<option selected disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>`);
            $("#tahun_ajaran").html('<option selected disabled>Pilih Tahun Ajaran</option>' +
                '<?php $now = date("Y");
                    for ($i = 2021; $i <= $now; $i++) {
                        echo "<option value=\'$i\'>$i</option>";
                    } ?>'
            );
            $("#action").val("add");
        });

        $(document).ready(function() {
            tbl_siswa();

            $("#form-siswa").on("submit", function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                if ($("#action").val() == "edit") {
                    $.ajax({
                        url: "update-siswa.php",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                // Tampilkan pesan sukses atau lakukan tindakan lainnya
                                $("#siswaModal").modal("hide");
                                Toast.fire({
                                    icon: "success",
                                    title: "Data siswa berhasil diubah",
                                });

                                // Refresh DataTable
                                $("#tblSiswa").DataTable().ajax.reload();
                            } else {
                                // Tampilkan pesan error jika diperlukan
                                Toast.fire({
                                    icon: "error",
                                    title: "Data siswa gagal diubah",
                                });
                            }
                        },
                        error: function(response) {
                            Toast.fire({
                                icon: "error",
                                title: "Periksa kembali form inputan anda",
                            });
                        },
                    });
                }
                if ($("#action").val() == "add") {
                    $.ajax({
                        url: "add-siswa.php",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == "success") {
                                // Tampilkan pesan sukses atau lakukan tindakan lainnya
                                $("#siswaModal").modal("hide");
                                Toast.fire({
                                    icon: "success",
                                    title: response.message,
                                });
                                $("#tblSiswa").DataTable().ajax.reload();
                            } else {
                                // Tampilkan pesan error jika diperlukan
                                Toast.fire({
                                    icon: "error",
                                    title: response.message,
                                });
                            }
                        },
                        error: function(response) {
                            Toast.fire({
                                icon: "error",
                                title: "Periksa kembali form inputan anda",
                            });
                        },
                    });
                }
            });
        });

        $(document).on("click", ".btn-add", function() {
            $("#siswaModal").modal("show");
            //ubah warna header modal
            $(".modal-header").addClass("bg-success");
            $("#ModalLabel").html("Add Data Siswa");
            $(".btn-submit").html("Add");
            $("#action").val("add");
        });

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



        function tbl_siswa() {
            $("#tblSiswa").DataTable({
                lengthChange: true,
                processing: true,
                ajax: {
                    url: "list-siswa.php",
                },
                columns: [{
                        data: null,
                        sortable: false,
                        render: function(data, type, row, meta) {
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
                        data: "jenis_kelamin",
                        name: "jenis_kelamin",
                    },
                    {
                        data: "kelas",
                        name: "kelas",
                    },
                    {
                        data: "tahun_ajaran",
                        name: "tahun_ajaran",
                    },
                    {
                        data: "aksi",
                        name: "aksi",
                    },
                ],
            });
        }
    </script>
</body>

</html>