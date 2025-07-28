<?php

// memanggil library FPDF
require('../../library/fpdf/fpdf.php');
include '../../config/koneksi.php';

// instansi objek dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'LEGAL');
$pdf->AddPage();

// Add Logo Image
$pdf->Image('sman15.png', 10, 10, 30); // Make sure the logo path is correct

// Header Section (School Info)
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'SISTEM PENDUKUNG KEPUTUSAN EKSTRAKURIKULER', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'UPT SMA NEGERI 15 KOTA TANGERANG', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'JL Villa Tangerang Regensi PO BOX 329/TNG Telp. (021) 5513466', 0, 1, 'C');
$pdf->Ln(10);

// Add Line Separator
$pdf->Line(10, 45, 200, 45); // Horizontal line under header
$pdf->Ln(10);

// Title Section
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'DATA SISWA TERDAFTAR', 0, 1, 'C');
$pdf->Ln(5);

// Tanggal Export Section
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(35, 10, 'Tanggal', 0, 0,);
$pdf->Cell(3, 10, ':', 0, 0, 'C');
$pdf->Cell(30, 10, date('d-m-Y'), 0, 1,);

// Tahun Ajaran Section
$pdf->Cell(35, 10, 'Kelas', 0, 0,);
$pdf->Cell(3, 10, ':', 0, 0, 'C');

// Periksa apakah parameter 'kelas' ada, jika tidak tampilkan pesan yang sesuai
if (isset($_GET['kelas']) && !empty($_GET['kelas'])) {
    $kelas = $_GET['kelas'];
    $pdf->Cell(30, 10, $kelas, 0, 1,);  // Menampilkan kelas yang dipilih
} else {
    $pdf->Cell(30, 10, 'Tidak ada kelas yang dipilih', 0, 1,);  // Jika kelas kosong
}

$pdf->Cell(0, 5, '', 0, 1);
$pdf->SetFont('Arial', 'B', 9);

// Kolom Header
$pdf->Cell(10, 6, 'NO', 1, 0, 'C');
$pdf->Cell(30, 6, 'NIS', 1, 0, 'C');
$pdf->Cell(65, 6, 'NAMA SISWA', 1, 0, 'C');
$pdf->Cell(30, 6, 'JENIS KELAMIN', 1, 0, 'C');
$pdf->Cell(20, 6, 'KELAS', 1, 0, 'C');
$pdf->Cell(35, 6, 'TAHUN AJARAN', 1, 1, 'C');

// Table Content
$pdf->SetFont('Arial', '', 10);
$no = 1;

// Jika parameter kelas ada dan tidak kosong, maka ambil data siswa berdasarkan kelas
if (isset($_GET['kelas']) && !empty($_GET['kelas'])) {
    $kelas = $_GET['kelas'];
    $sql = mysqli_query(
        $konek,
        "SELECT * FROM students WHERE kelas = '$kelas' ORDER BY id DESC"
    );

    // Menampilkan data siswa
    while ($d = mysqli_fetch_array($sql)) {
        $pdf->Cell(10, 6, $no++, 1, 0, 'C');
        $pdf->Cell(30, 6, $d['nis'], 1, 0, 'C');
        $pdf->Cell(65, 6, $d['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(30, 6, $d['jenis_kelamin'], 1, 0, 'C');
        $pdf->Cell(20, 6, $d['kelas'], 1, 0, 'C');
        $pdf->Cell(35, 6, $d['tahun_ajaran'], 1, 1, 'C');
    }
} else {
    // Jika kelas tidak ditemukan
    $pdf->Cell(200, 10, 'Tidak ada data yang tersedia untuk kelas ini', 0, 1, 'C');
}
// Add signature section with proper alignment
$pdf->Ln(20);  // Create space before the signature section

// Set the alignment for signature and date
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Kepala Sekolah SMAN 15 Kota Tangerang,', 0, 1, 'R');  // Position is right, text left-aligned

// Add a larger space before the name and NIP
$pdf->Ln(20);

// Add name and NIP aligned below the signature
$pdf->Cell(0, 8, 'NINIEK NURCAHYA, S.Pd, M.Pd', 0, 1, 'R');  // Position is right, text left-aligned
$pdf->Cell(0, 8, 'NIP. 196904071992032007', 0, 1, 'R');  // Position is right, text left-aligned

$pdf->Output();
// Output PDF
$pdf->Output();

?>
