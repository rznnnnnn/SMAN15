<?php
include '../../config/koneksi.php';

header('Content-Type: application/json');

$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak ditemukan']);
    exit;
}

$sql = "DELETE FROM daftra_ekskul WHERE id_ekskul = ?";
$stmt = $konek->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data: ' . $stmt->error]);
}

$stmt->close();
$konek->close();
