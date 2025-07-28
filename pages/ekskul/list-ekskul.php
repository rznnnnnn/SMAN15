<?php

// Include file koneksi.php untuk menghubungkan ke database
include '../../config/koneksi.php';  // Pastikan $konek adalah koneksi database Anda

// Query untuk mengambil data ekstrakurikuler
$sql = "SELECT * FROM daftra_ekskul";
$query = mysqli_query($konek, $sql);

// Memeriksa jika query berhasil dieksekusi
if (!$query) {
    die("Gagal menjalankan query: " . mysqli_error($konek));
}

// Memeriksa apakah ada permintaan Ajax
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        // Memformat data sesuai kebutuhan DataTables
        $data[] = array(
            'ekstrakurikuler' => htmlspecialchars($row['ekstrakurikuler']),
            'deskripsi' => htmlspecialchars($row['deskripsi']),
            'aksi' => '<a href="javascript:void(0)" id="btn-edit" class="btn btn-sm btn-outline-info mr-2" title="Edit" data-id="' . $row['id_ekskul'] . '"><i class="fas fa-edit"></i></a>' .
                      '<a href="javascript:void(0)" id="btn-hapus" class="btn btn-sm btn-outline-danger mr-2" title="Hapus" data-id="' . $row['id_ekskul'] . '"><i class="fas fa-trash"></i></a>'
        );
    }

    // Mengirimkan data dalam format JSON dengan property 'data' yang dibutuhkan oleh DataTables
    header('Content-Type: application/json');
    echo json_encode(array('data' => $data));
}
else {
    // Jika tidak ada permintaan Ajax, bisa arahkan ke halaman utama atau tampilkan error
    echo "Access denied.";
}

// Menutup koneksi
mysqli_close($konek);
