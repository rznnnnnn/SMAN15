<?php 
// Suppress warnings and notices
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Memanggil library FPDF
require('../../library/fpdf/fpdf.php');
include '../../config/koneksi.php';

// Instansi objek dan pengaturan halaman PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Header Section (Logo + School Info)
$pdf->Image('sman15.png', 10, 10, 30); // Adjust path and size as needed
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

// Section Hasil Tes
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'HASIL TES PROFILE MATCHING', 0, 1, 'C');
$pdf->Ln(5);

// Ambil NIS dari URL atau form input
$nis = isset($_GET['nis']) ? $_GET['nis'] : '';  // Ambil NIS dari parameter GET

// Query untuk mendapatkan data siswa berdasarkan NIS
$sql = "SELECT * FROM students WHERE nis = '$nis'";
$result = mysqli_query($konek, $sql);
$data_siswa = mysqli_fetch_assoc($result);

if ($data_siswa) {
    // Informasi Tes
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'NIS', 0, 0);
    $pdf->Cell(0, 10, ': ' . $data_siswa['nis'], 0, 1);

    $pdf->Cell(40, 10, 'Nama', 0, 0);
    $pdf->Cell(0, 10, ': ' . $data_siswa['nama_siswa'], 0, 1);

    $pdf->Cell(40, 10, 'Jenis Kelamin', 0, 0);
    $pdf->Cell(0, 10, ': ' . $data_siswa['jenis_kelamin'], 0, 1);

    $pdf->Cell(40, 10, 'Kelas', 0, 0);
    $pdf->Cell(0, 10, ': ' . $data_siswa['kelas'], 0, 1);

    // Query untuk mendapatkan Tahun Ajaran berdasarkan Kelas
    $kelas = $data_siswa['kelas'];
    $sql_tahun_ajaran = "SELECT DISTINCT tahun_ajaran FROM students WHERE kelas = '$kelas' LIMIT 1";
    $result_tahun_ajaran = mysqli_query($konek, $sql_tahun_ajaran);
    $tahun_ajaran = mysqli_fetch_assoc($result_tahun_ajaran)['tahun_ajaran'];

    $pdf->Cell(40, 10, 'Tahun Ajaran', 0, 0);
    $pdf->Cell(0, 10, ': ' . ($tahun_ajaran ? $tahun_ajaran : 'Tidak Tersedia'), 0, 1);

    $pdf->Ln(10);

    // Rekomendasi Ekstrakurikuler
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'REKOMENDASI EKSTRAKURIKULER', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);

    // Query untuk mendapatkan nilai ekstrakurikuler
    $sql_ekskul = "SELECT * FROM profile_matching WHERE students_id = '" . $data_siswa['id'] . "'";
    $result_ekskul = mysqli_query($konek, $sql_ekskul);
    $data_ekskul = mysqli_fetch_assoc($result_ekskul);

    if ($data_ekskul) {
        // Array nilai ekstrakurikuler
        $nilai_ekskul = [
            'Rohis' => $data_ekskul['n_total_rohis'],
            'Paskibra' => $data_ekskul['n_total_paskibra'],
            'PMR' => $data_ekskul['n_total_pmr'],
            'Pramuka' => $data_ekskul['n_total_pramuka'],
            'Kabar_15' => $data_ekskul['n_total_kabar_15'],
            'KIR' => $data_ekskul['n_total_kir'],
            'Japanese_Club' => $data_ekskul['n_total_japanese_club'],
            'OSIS' => $data_ekskul['n_total_osis'],
            'Basket' => $data_ekskul['n_total_basket'],
            'Badminton' => $data_ekskul['n_total_badminton'],
            'Volleyball' => $data_ekskul['n_total_voli'],
            'Sepak_Bola' => $data_ekskul['n_total_sepak_bola'],
            'Futsal' => $data_ekskul['n_total_futsal'],
            'Seni_Suara' => $data_ekskul['n_total_seni_suara'],
            'Tari_Saman' => $data_ekskul['n_total_tari_saman'],
            'Tari_Lenggang_Cisadane' => $data_ekskul['n_total_tari_lenggang_cisadane'],
            'Teater' => $data_ekskul['n_total_teater'],
            'Taekwondo' => $data_ekskul['n_total_taekwondo'],
            'Canda_Birawa' => $data_ekskul['n_total_canda_birawa'],
            'Bela_Diri_Matahari' => $data_ekskul['n_total_bela_diri_matahari']
        ];

        // Mengurutkan array berdasarkan nilai secara menurun
        arsort($nilai_ekskul);

        // Mengambil 3 ekstrakurikuler dengan nilai tertinggi
        $top3 = array_slice($nilai_ekskul, 0, 3, true);

        // Menampilkan rekomendasi ekstrakurikuler
        $rekomendasi = implode(', ', array_keys($top3)); // Menggabungkan nama 3 ekstrakurikuler terbaik
        $pdf->Cell(0, 10, $rekomendasi, 0, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'Data siswa tidak ditemukan.', 0, 1, 'C');
}

// Add signature section with improved layout
$pdf->Ln(20);  // Create space for signature
$pdf->Cell(0, 10, 'Kepala Sekolah SMAN 15 Tangerang,', 0, 1, 'R');
$pdf->Ln(15); // Space between the signature and the name
$pdf->Cell(0, 10, 'NINIEK NURCAHYA, S.Pd, M.Pd', 0, 1, 'R');
$pdf->Cell(0, 10, 'NIP. 196904071992032007', 0, 1, 'R');

// Output PDF
$pdf->Output();
?>
