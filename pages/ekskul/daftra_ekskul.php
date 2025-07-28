<?php
session_start();
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
    <title>SPK - Daftar Ekstrakurikuler</title>

    <!-- FontAwesome -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <!-- Google Fonts Nunito -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />
    <!-- Bootstrap + SB Admin 2 CSS -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
    <!-- DataTables Bootstrap4 -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />
</head>
<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../index.php" style="gap: 10px;">
            <img src="../../img/sma15.png" alt="Logo SPK" style="max-height: 40px;" />
            <div class="sidebar-brand-text" style="line-height: 1; text-align: left;">
                <div style="font-weight: 700; font-size: 1.2rem;">SMAN 15</div>
                <div style="font-weight: 700; font-size: 0.75rem;">Kota Tangerang</div>
            </div>
        </a>
        <hr class="sidebar-divider my-0" />
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
<li class="nav-item active">
    <a class="nav-link" href="../ekskul/daftra_ekskul.php">
        <i class="fas fa-fw fa-trophy"></i>
        <span>Daftar Ekstrakurikuler</span></a>
</li>

        <hr class="sidebar-divider" />

        <div class="sidebar-heading">Data Penilaian</div>
        <li class="nav-item ">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
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
        <hr class="sidebar-divider d-none d-md-block" />
        <div class="sidebar-heading">Account</div>
        <li class="nav-item">
            <a class="nav-link" href="../user/user.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block" />
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize"><?php echo $_SESSION['username']; ?></span>
                            <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg" />
                        </a>
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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Daftar Ekstrakurikuler</h1>
                </div>
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalEkskul">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Ekstrakurikuler</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="tblEkskul" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ekstrakurikuler</th>
                                            <th>Deskripsi</th>
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
        </div>

        <!-- Modal Tambah/Edit Ekstrakurikuler -->
        <div class="modal fade" id="modalEkskul" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-ekskul">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalLabel">Tambah Ekstrakurikuler</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_ekskul" name="id_ekskul" />
                            <input type="hidden" id="action" name="action" />
                            <div class="form-group">
                                <label for="ekstrakurikuler">Ekstrakurikuler</label>
                                <input type="text" class="form-control" id="ekstrakurikuler" name="ekstrakurikuler" placeholder="Masukkan nama ekstrakurikuler" required />
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
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


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="logoutModalLabel">Yakin Ingin Keluar?</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                Pilih "Logout" dibawah jika kamu yakin ingin mengakhiri sesi ini.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="../auth/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    function resetForm() {
        $("#id_ekskul").val('');
        $("#ekstrakurikuler").val('');
        $("#deskripsi").val('');
        $("#action").val('');
    }

    function loadTable() {
        $("#tblEkskul").DataTable({
            destroy: true,
            processing: false,
            serverSide: false,
            ajax: {
                url: "list-ekskul.php",
                dataSrc: "data"
            },
            columns: [
                {
                    data: null,
                    sortable: false,
                    render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1
                },
                { data: "ekstrakurikuler" },
                { data: "deskripsi" },
                { data: "aksi" }
            ],
        });
    }

    $(document).ready(() => {
        loadTable();

        $("#form-ekskul").submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let action = $("#action").val();

            let url = action === "edit" ? "update-ekskul.php" : "add-ekskul.php";

            $.ajax({
                url: url,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        Toast.fire({ icon: "success", title: response.message });
                        $("#modalEkskul").modal("hide");
                        resetForm();
                        loadTable();
                    } else {
                        Toast.fire({ icon: "error", title: response.message });
                    }
                },
                error: function(xhr) {
                    let msg = xhr.responseJSON ? xhr.responseJSON.message : "Terjadi kesalahan saat memproses permintaan.";
                    Toast.fire({ icon: "error", title: msg });
                }
            });
        });

        $(document).on("click", "#btn-edit", function() {
            let id = $(this).data("id");
            $.ajax({
                url: "edit-ekskul.php?id=" + id,
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $("#id_ekskul").val(data.id_ekskul);
                    $("#ekstrakurikuler").val(data.ekstrakurikuler);
                    $("#deskripsi").val(data.deskripsi);
                    $("#action").val("edit");
                    $("#modalEkskul").modal("show");
                },
                error: function() {
                    alert("Gagal memuat data.");
                }
            });
        });

        $(document).on("click", "#btn-hapus", function() {
            let id = $(this).data("id");
            let table = $("#tblEkskul").DataTable();

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ekstrakurikuler akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "hapus-ekskul.php",
                        method: "POST",
                        data: { id: id },
                        dataType: "json",
                        success: function(response) {
                            if (response.status === "success") {
                                Toast.fire({ icon: "success", title: response.message });
                                table.ajax.reload();
                            } else {
                                Toast.fire({ icon: "error", title: response.message });
                            }
                        }
                    });
                }
            });
        });
    });
</script>
</body>
</html>
