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

    <title>SPK - User</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
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
                <a class="nav-link" <?php if ($_SESSION['role'] == 1) { ?> href="../dashboard-kepsek.php" <?php } else { ?> href="../dashboard.php" <?php } ?>> <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php
            if ($_SESSION['role'] == 2) {
                echo '
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
                    <hr class="sidebar-divider" />
        
                    <div class="sidebar-heading">Data Penilaian</div>
        
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

                    <hr class="sidebar-divider" />

                <div class="sidebar-heading">Pages</div>

                <li class="nav-item">
                    <a class="nav-link" href="../siswa/siswa.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Data Siswa</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../profile-matching/profile-matching.php">
                        <i class="fas fa-fw fa-certificate"></i>
                        <span>Profile Matching</span></a>
                </li>
                    ';
            } else {
                echo '
                <hr class="sidebar-divider" />

                <div class="sidebar-heading">Pages</div>
                ';
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="../laporan/laporan.php">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Laporan Profile Matching</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Heading -->
            <div class="sidebar-heading">Account</div>

            <li class="nav-item active">
                <a class="nav-link" href="user.php">
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
                        <h1 class="h3 mb-0 text-gray-800">Data Users</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="row">
                    <div class="container-fluid">
                      <div class="row mb-3">
                        <div class="col-md-12 text-right">
                          <button class="btn btn-success" data-toggle="modal" data-target="#modalUser">
                           <i class="fas fa-plus"></i> Tambah User
                        </button>
                       </div>
                     </div>
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tblUsers" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Hak Akses</th>
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
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
<!-- Modal Add/Edit User -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="modalUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="form-user" class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalUserLabel">Tambah User</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id" name="id" />
        <input type="hidden" id="action" name="action" value="add" />

        <div class="form-group">
          <label for="fullName">Nama Lengkap</label>
          <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Masukkan Nama Lengkap" required />
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" required />
        </div>

        <div class="form-group">
          <label for="password">Password <small><em></em></small></label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" />
        </div>

        <div class="form-group">
          <label for="roleId">Hak Akses</label>
          <select id="roleId" name="roleId" class="form-control" required>
            <option value="" selected disabled>Pilih Hak Akses</option>
            <!-- Option dinamis dari database PHP -->
            <?php
            include '../../config/koneksi.php';
            $sql = "SELECT * FROM role";
            $query = mysqli_query($konek, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<option value='{$row['id']}'>{$row['role_name']}</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>
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

        function resetForm() {
            $("#id").val('');
            $("#fullName").val('');
            $("#username").val('');
            $("#password").val('');
            $("[name=roleId] option[value='0']").prop("selected", true);
            $("#action").val('');
        }

        $(document).ready(function() {
            tblUsers();

            $("#form-user").on("submit", function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                if ($("#action").val() == "edit") {
                    $.ajax({
                        url: "update-user.php",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == "success") {
                                Toast.fire({
                                    icon: "success",
                                    title: response.message,
                                });
                                 // reload tabel yang benar
                                  $("#tblUsers").DataTable().ajax.reload(null, false);

                                resetForm();
                                $("#modalUser").modal("hide");
                            } else {
                                // Tampilkan pesan error jika diperlukan
                                Toast.fire({
                                    icon: "error",
                                    title: response.message,
                                });
                            }
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
                    });
                } else {
                    $.ajax({
                        url: "add-user.php",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == "success") {
                                Toast.fire({
                                    icon: "success",
                                    title: response.message,
                                });
                                $("#tblUsers").DataTable().ajax.reload();
                                resetForm();
                                $("#modalUser").modal("hide");
                            } else {
                                // Tampilkan pesan error jika diperlukan
                                Toast.fire({
                                    icon: "error",
                                    title: response.message,
                                });
                            }
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
                    });
                }
            });
        });

        $(document).on("click", "#btn-edit", function() {
            const id = $(this).data("id");

            $.ajax({
                url: "edit-user.php?id=" + id,
                data: {
                    id: id,
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $("#id").val(data.id);
                    $("#fullName").val(data.name);
                    $("#username").val(data.username);
                    $("#password").val(data.password);
                    $("[name=roleId] option[value='" + data.role_id + "']").prop("selected", true);
                    $("#action").val("edit");
                    $("#modalUser").modal("show");
                    $("#modalUser").modal("hide");
                },
                error: function(data) {
                    alert("Error");
                },
            });
        });

        $(document).on("click", "#btn-hapus", function() {
            const id = $(this).data("id");

            var tblUsers = $("#tblUsers").DataTable();

            Swal.fire({
                title: "Anda yakin?",
                text: "Data user akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "hapus-user.php?id=" + id,
                        data: {
                            id: id,
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                // Tampilkan pesan sukses atau lakukan tindakan lainnya
                                Toast.fire({
                                    icon: "success",
                                    title: "Data user berhasil dihapus",
                                });
                                tblUsers.ajax.reload();
                                $("#modalUser").modal("hide");
                            } else {
                                // Tampilkan pesan error jika diperlukan
                                Toast.fire({
                                    icon: "error",
                                    title: "Data user gagal dihapus",
                                });
                            }
                        },
                    });
                }
            });
        });

        function tblUsers() {
            $("#tblUsers").DataTable({
                lengthChange: true,
                processing: false,
                ajax: {
                    url: "list-user.php",
                },
                columns: [{
                        data: null,
                        sortable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "username",
                        name: "username",
                    },
                    {
                        data: "role_name",
                        name: "role_name",
                    },
                    {
                        data: "aksi",
                        name: "aksi",
                    }
                ],
            });
        }
    </script>
</body>

</html>