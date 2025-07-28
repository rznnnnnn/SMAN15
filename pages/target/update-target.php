<?php
include '../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $ekskul = $_POST['ekskul'] ?? null;
    $id_sub_kriteria = $_POST['kode'] ?? null;
    $nilai_target = $_POST['nilai_target'] ?? null;

    if (!$id || !$ekskul || !$id_sub_kriteria || !$nilai_target) {
        echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
        exit();
    }

    $sql = "UPDATE nilai_target SET ekskul = '$ekskul', sub_kriteria_id = '$id_sub_kriteria', nilai_target = '$nilai_target' WHERE id = $id";

    $query = mysqli_query($konek, $sql);

    if ($query) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diperbarui.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data: ' . mysqli_error($konek)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Permintaan tidak valid.']);
}
?>
