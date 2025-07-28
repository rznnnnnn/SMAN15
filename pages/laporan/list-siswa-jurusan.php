<?php

// Include file koneksi.php untuk menghubungkan ke database
include '../../config/koneksi.php';

// Query untuk mengambil data siswa
$sql = "SELECT pm.*, st.nis, st.nama_siswa, st.tahun_ajaran FROM `profile_matching` AS pm
JOIN students AS st ON pm.students_id = st.id
ORDER BY pm.id DESC;";
$query = mysqli_query($konek, $sql);

// Memeriksa jika query berhasil dieksekusi
if (!$query) {
    die("Gagal menjalankan query: " . mysqli_error($konek));
}

// Memeriksa apakah ada permintaan Ajax
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        // Membandingkan nilai dari beberapa jurusan
        $jurusan_values = [
            'Rohis' => $row['n_total_rohis'],
            'Paskibra' => $row['n_total_paskibra'],
            'PMR' => $row['n_total_pmr'],
            'Pramuka' => $row['n_total_pramuka'],
            'Kabar_15' => $row['n_total_kabar_15'],
            'KIR' => $row['n_total_kir'],
            'Japanese_Club' => $row['n_total_japanese_club'],
            'OSIS' => $row['n_total_osis'],
            'Basket' => $row['n_total_basket'],
            'Badminton' => $row['n_total_badminton'],
            'Volleyball' => $row['n_total_voli'],
            'Sepak_Bola' => $row['n_total_sepak_bola'],
            'Futsal' => $row['n_total_futsal'],
            'Seni_Suara' => $row['n_total_seni_suara'],
            'Tari_Saman' => $row['n_total_tari_saman'],
            'Tari_Lenggang_Cisadane' => $row['n_total_tari_lenggang_cisadane'],
            'Teater' => $row['n_total_teater'],
            'Taekwondo' => $row['n_total_taekwondo'],
            'Canda_Birawa' => $row['n_total_canda_birawa'],
            'Bela_Diri_Matahari' => $row['n_total_bela_diri_matahari']
        ];
        
        // Mengurutkan array berdasarkan nilai total secara menurun
        arsort($jurusan_values);
        
        // Menentukan tiga jurusan terbaik
        $top3 = array_slice($jurusan_values, 0, 3, true);
        
        // Menampilkan tiga jurusan terbaik tanpa nilai
        $top3_badges = [];
        foreach ($top3 as $jurusan => $nilai) {
            switch ($jurusan) {
                case 'Rohis':
                    $top3_badges[] = '<span class="badge badge-pill badge-success">Rohis</span>';
                    break;
                case 'Paskibra':
                    $top3_badges[] = '<span class="badge badge-pill badge-info">Paskibra</span>';
                    break;
                case 'PMR':
                    $top3_badges[] = '<span class="badge badge-pill badge-warning">PMR</span>';
                    break;
                case 'Pramuka':
                    $top3_badges[] = '<span class="badge badge-pill badge-primary">Pramuka</span>';
                    break;
                case 'Kabar_15':
                    $top3_badges[] = '<span class="badge badge-pill badge-secondary">Kabar 15</span>';
                    break;
                case 'KIR':
                    $top3_badges[] = '<span class="badge badge-pill badge-danger">KIR</span>';
                    break;
                case 'Japanese_Club':
                    $top3_badges[] = '<span class="badge badge-pill badge-dark">Japanese Club</span>';
                    break;
                case 'OSIS':
                    $top3_badges[] = '<span class="badge badge-pill badge-info">OSIS</span>';
                    break;
                case 'Basket':
                    $top3_badges[] = '<span class="badge badge-pill badge-success">Basket</span>';
                    break;
                case 'Badminton':
                    $top3_badges[] = '<span class="badge badge-pill badge-light">Badminton</span>';
                    break;
                case 'Volleyball':
                    $top3_badges[] = '<span class="badge badge-pill badge-warning">Volleyball</span>';
                    break;
                case 'Sepak_Bola':
                    $top3_badges[] = '<span class="badge badge-pill badge-primary">Sepak Bola</span>';
                    break;
                case 'Futsal':
                    $top3_badges[] = '<span class="badge badge-pill badge-secondary">Futsal</span>';
                    break;
                case 'Seni_Suara':
                    $top3_badges[] = '<span class="badge badge-pill badge-danger">Seni Suara</span>';
                    break;
                case 'Tari_Saman':
                    $top3_badges[] = '<span class="badge badge-pill badge-info">Tari Saman</span>';
                    break;
                case 'Tari_Lenggang_Cisadane':
                    $top3_badges[] = '<span class="badge badge-pill badge-primary">Tari Lenggang Cisadane</span>';
                    break;
                case 'Teater':
                    $top3_badges[] = '<span class="badge badge-pill badge-warning">Teater</span>';
                    break;
                case 'Taekwondo':
                    $top3_badges[] = '<span class="badge badge-pill badge-dark">Taekwondo</span>';
                    break;
                case 'Canda_Birawa':
                    $top3_badges[] = '<span class="badge badge-pill badge-light">Canda Birawa</span>';
                    break;
                case 'Bela_Diri_Matahari':
                    $top3_badges[] = '<span class="badge badge-pill badge-success">Bela Diri Matahari</span>';
                    break;
                default:
                    $top3_badges[] = '<span class="badge badge-pill badge-secondary">Jurusan Tidak Dikenal</span>';
            }
        }
        

        // Menambahkan data siswa dan jurusan terbaik ke dalam array
        $data[] = array(
            'nis' => $row['nis'],
            'nama_siswa' => $row['nama_siswa'],
            'tahun_ajaran' => $row['tahun_ajaran'],
            'jurusan' => implode(", ", $top3_badges), // Menampilkan tiga jurusan terbaik dalam satu baris
            'n_total_rohis' => $row['n_total_rohis'],
            'n_total_paskibra' => $row['n_total_paskibra'],
            'n_total_pmr' => $row['n_total_pmr'],
            'n_total_pramuka' => $row['n_total_pramuka'],
            'n_total_kabar_15' => $row['n_total_kabar_15'],
            'n_total_kir' => $row['n_total_kir'],
            'n_total_japanese_club' => $row['n_total_japanese_club'],
            'n_total_osis' => $row['n_total_osis'],
            'n_total_basket' => $row['n_total_basket'],
            'n_total_badminton' => $row['n_total_badminton'],
            'n_total_voli' => $row['n_total_voli'],
            'n_total_sepak_bola' => $row['n_total_sepak_bola'],
            'n_total_futsal' => $row['n_total_futsal'],
            'n_total_seni_suara' => $row['n_total_seni_suara'],
            'n_total_tari_saman' => $row['n_total_tari_saman'],
            'n_total_tari_lenggang_cisadane' => $row['n_total_tari_lenggang_cisadane'],
            'n_total_teater' => $row['n_total_teater'],
            'n_total_taekwondo' => $row['n_total_taekwondo'],
            'n_total_canda_birawa' => $row['n_total_canda_birawa'],
            'n_total_bela_diri_matahari' => $row['n_total_bela_diri_matahari'],
            'aksi' => '<a href="javascript:void(0)" id="btn-detail" class="btn btn-sm btn-outline-info btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail" data-id="' . $row['students_id'] . '"><i class="fas fa-eye"></i></a>' .
                      '<a href="javascript:void(0)" id="btn-hapus" class="btn btn-sm btn-outline-danger btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" data-id="' . $row['students_id'] . '"><i class="fas fa-trash"></i></a>'
        );
    }

    // Mengirimkan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode(array('data' => $data));
} else {
    // Jika tidak ada permintaan Ajax, tampilkan halaman dengan data siswa
    $students = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $students[] = $row;
    }
    include 'laporan.php'; // Ganti dengan lokasi file halaman yang sesuai
}

// Menutup koneksi
mysqli_close($konek);
?>
