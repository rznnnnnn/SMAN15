<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../../config/koneksi.php';

header('Content-Type: application/json');

$ekstrakurikuler = $_POST['ekstrakurikuler'] ?? '';
$deskripsi = $_POST['deskripsi'] ?? '';

if (empty($ekstrakurikuler) || empty($deskripsi)) {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak boleh kosong']);
    exit;
}

$sql_check = "SELECT * FROM daftra_ekskul WHERE ekstrakurikuler = ?";
$stmt_check = $konek->prepare($sql_check);
if (!$stmt_check) {
    echo json_encode(['status' => 'error', 'message' => 'Prepare statement gagal: ' . $konek->error]);
    exit;
}
$stmt_check->bind_param("s", $ekstrakurikuler);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Ekstrakurikuler sudah ada']);
    $stmt_check->close();
    exit;
}
$stmt_check->close();

$sql = "INSERT INTO daftra_ekskul (ekstrakurikuler, deskripsi) VALUES (?, ?)";
$stmt = $konek->prepare($sql);
if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => 'Prepare statement gagal: ' . $konek->error]);
    exit;
}
$stmt->bind_param("ss", $ekstrakurikuler, $deskripsi);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan data: ' . $stmt->error]);
}

$stmt->close();
$konek->close();
