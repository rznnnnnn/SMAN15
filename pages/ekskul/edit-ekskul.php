<?php
include '../../config/koneksi.php';

header('Content-Type: application/json');

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo json_encode(['error' => 'ID tidak ditemukan']);
    exit;
}

$id = mysqli_real_escape_string($konek, $id);

$sql = "SELECT * FROM daftra_ekskul WHERE id_ekskul = '$id' LIMIT 1";
$result = mysqli_query($konek, $sql);

if (!$result) {
    echo json_encode(['error' => mysqli_error($konek)]);
    exit;
}

$data = mysqli_fetch_assoc($result);

echo json_encode($data);
