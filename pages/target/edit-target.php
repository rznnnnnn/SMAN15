<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

$sql = "SELECT nt.id, nt.ekskul, nt.nilai_target, nt.sub_kriteria_id, sk.kode, sk.sub_kriteria 
        FROM nilai_target AS nt
        JOIN sub_kriteria AS sk ON nt.sub_kriteria_id = sk.id 
        WHERE nt.id = '$id'";

$query = mysqli_query($konek, $sql);

$nilai_target = mysqli_fetch_assoc($query);

// kirim data sebagai json
echo json_encode($nilai_target);
?>
