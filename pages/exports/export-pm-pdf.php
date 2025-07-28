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

// Title Section
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'DATA PROFILE MATCHING', 0, 1, 'C');
$pdf->Ln(5);

// Information Section
$pdf->SetFont('Arial', '', 12);

// Tanggal Section with proper alignment
$pdf->Cell(35, 10, 'Tanggal', 0, 0);
$pdf->Cell(5, 10, ':', 0, 0, 'C'); // Adjust the space between ":" and the data
$pdf->Cell(30, 10, date('d-m-Y'), 0, 1);

// Kelas Section
$pdf->Cell(35, 10, 'Kelas', 0, 0);
$pdf->Cell(5, 10, ':', 0, 0, 'C');
$pdf->Cell(30, 10, isset($_GET['kelas']) ? $_GET['kelas'] : 'Default Kelas', 0, 1); // If 'kelas' is missing, set default

// Retrieve Tahun Ajaran from the database
$tahun_ajaran = '';
if (isset($_GET['kelas'])) {
    $kelas = $_GET['kelas'];
    $result = mysqli_query($konek, "SELECT DISTINCT tahun_ajaran FROM students WHERE kelas = '$kelas' LIMIT 1");
    if ($row = mysqli_fetch_array($result)) {
        $tahun_ajaran = $row['tahun_ajaran'];
    }
}

$pdf->Cell(35, 10, 'Tahun Ajaran', 0, 0);
$pdf->Cell(5, 10, ':', 0, 0, 'C');
$pdf->Cell(30, 10, $tahun_ajaran ? $tahun_ajaran : 'Tahun Ajaran Tidak Tersedia', 0, 1); // Display the year or default

// Line Break
$pdf->Cell(0, 5, '', 0, 1);

// Table Headers
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(10, 6, 'NO', 1, 0, 'C');
$pdf->Cell(30, 6, 'NIS', 1, 0, 'C');
$pdf->Cell(60, 6, 'NAMA SISWA', 1, 0, 'C');
$pdf->Cell(30, 6, 'JENIS KELAMIN', 1, 0, 'C');
$pdf->Cell(60, 6, 'Rekomendasi Ekstrakurikuler', 1, 1, 'C');

// Table Content
$pdf->SetFont('Arial', '', 10);
$no = 1;

if (isset($_GET['kelas'])) {
    $kelas = $_GET['kelas'];
    $sql = mysqli_query(
        $konek,
        "SELECT pm.n_total_rohis, 
        pm.n_total_paskibra, 
        pm.n_total_pmr, 
        pm.n_total_pramuka, 
        pm.n_total_kabar_15, 
        pm.n_total_kir, 
        pm.n_total_japanese_club, 
        pm.n_total_osis, 
        pm.n_total_basket, 
        pm.n_total_badminton, 
        pm.n_total_voli, 
        pm.n_total_sepak_bola, 
        pm.n_total_futsal, 
        pm.n_total_seni_suara, 
        pm.n_total_tari_saman, 
        pm.n_total_tari_lenggang_cisadane, 
        pm.n_total_teater, 
        pm.n_total_taekwondo, 
        pm.n_total_canda_birawa, 
        pm.n_total_bela_diri_matahari, st.* 
        FROM `profile_matching` as pm
        JOIN students as st ON pm.students_id = st.id 
        WHERE st.kelas = '$kelas' ORDER BY st.id DESC"
    );

    while ($d = mysqli_fetch_array($sql)) {
        // Menampilkan data siswa
        $pdf->Cell(10, 6, $no++, 1, 0, 'C');
        $pdf->Cell(30, 6, $d['nis'], 1, 0, 'C');
        $pdf->Cell(60, 6, $d['nama_siswa'], 1, 0, 'C');
        $pdf->Cell(30, 6, $d['jenis_kelamin'], 1, 0, 'C');


        // Array nilai ekstrakurikuler
        $nilai_ekskul = [
            'Rohis' => $d['n_total_rohis'],
            'Paskibra' => $d['n_total_paskibra'],
            'PMR' => $d['n_total_pmr'],
            'Pramuka' => $d['n_total_pramuka'],
            'Kabar_15' => $d['n_total_kabar_15'],
            'KIR' => $d['n_total_kir'],
            'Japanese_Club' => $d['n_total_japanese_club'],
            'OSIS' => $d['n_total_osis'],
            'Basket' => $d['n_total_basket'],
            'Badminton' => $d['n_total_badminton'],
            'Volleyball' => $d['n_total_voli'],
            'Sepak_Bola' => $d['n_total_sepak_bola'],
            'Futsal' => $d['n_total_futsal'],
            'Seni_Suara' => $d['n_total_seni_suara'],
            'Tari_Saman' => $d['n_total_tari_saman'],
            'Tari_Lenggang_Cisadane' => $d['n_total_tari_lenggang_cisadane'],
            'Teater' => $d['n_total_teater'],
            'Taekwondo' => $d['n_total_taekwondo'],
            'Canda_Birawa' => $d['n_total_canda_birawa'],
            'Bela_Diri_Matahari' => $d['n_total_bela_diri_matahari']
        ];

        // Mengurutkan array berdasarkan nilai secara menurun
        arsort($nilai_ekskul);

        // Mengambil 3 ekstrakurikuler dengan nilai tertinggi
        $top3 = array_slice($nilai_ekskul, 0, 3, true);

        // Menampilkan rekomendasi ekstrakurikuler
        $rekomendasi = implode(', ', array_keys($top3)); // Menggabungkan nama 3 ekstrakurikuler terbaik
        $pdf->Cell(60, 6, $rekomendasi, 1, 1, 'C');
    }
}
// Add signature section with improved layout
$pdf->Ln(20);  // Create space for signature

$pdf->Cell(0, 10, 'Kepala Sekolah SMAN 15 Tangerang,', 0, 1, 'R');
$pdf->Ln(15); // Space between the signature and the name

$pdf->Cell(0, 10, 'NINIEK NURCAHYA, S.Pd, M.Pd', 0, 1, 'R');
$pdf->Cell(0, 10, 'NIP. 196904071992032007', 0, 1, 'R');

$pdf->Output();

?>
