<?php 

include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id_ekskul'] ?? '';
    $ekstrakurikuler = $_POST['ekstrakurikuler'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $ekstrakurikulerLama = $_POST['ekstrakurikulerLama'] ?? '';

    header('Content-Type: application/json');

    if (empty($ekstrakurikuler) || empty($deskripsi)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Data tidak boleh ada yang kosong'
        ]);
        exit;
    }

    // Gunakan prepared statement untuk keamanan
    if ($ekstrakurikuler === $ekstrakurikulerLama) {
        $sql = "UPDATE daftra_ekskul SET ekstrakurikuler = ?, deskripsi = ? WHERE id_ekskul = ?";
        $stmt = $konek->prepare($sql);
        $stmt->bind_param("ssi", $ekstrakurikuler, $deskripsi, $id);
        $exec = $stmt->execute();

        if ($exec) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data ekstrakurikuler berhasil diubah'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data ekstrakurikuler gagal diubah'
            ]);
        }
        $stmt->close();
    } else {
        // Jika nama ekstrakurikuler berubah, cek apakah sudah ada yang sama
        $cekSql = "SELECT * FROM daftra_ekskul WHERE ekstrakurikuler = ? AND id_ekskul != ?";
        $cekStmt = $konek->prepare($cekSql);
        $cekStmt->bind_param("si", $ekstrakurikuler, $id);
        $cekStmt->execute();
        $cekResult = $cekStmt->get_result();

        if ($cekResult->num_rows > 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Nama ekstrakurikuler sudah digunakan'
            ]);
            $cekStmt->close();
            exit;
        }
        $cekStmt->close();

        // Update data jika tidak duplikat
        $sql = "UPDATE daftra_ekskul SET ekstrakurikuler = ?, deskripsi = ? WHERE id_ekskul = ?";
        $stmt = $konek->prepare($sql);
        $stmt->bind_param("ssi", $ekstrakurikuler, $deskripsi, $id);
        $exec = $stmt->execute();

        if ($exec) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data ekstrakurikuler berhasil diubah'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data ekstrakurikuler gagal diubah'
            ]);
        }
        $stmt->close();
    }

    $konek->close();
}
