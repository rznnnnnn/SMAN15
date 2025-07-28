<?php

include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_siswa = $_POST['id_siswa'];
    
    // Semua nilai sub-kriteria diambil dari POST
    $minat_bidang_keagamaan = $_POST['minat_bidang_keagamaan'];
    $minat_bidang_seni = $_POST['minat_bidang_seni'];
    $minat_bidang_olahraga = $_POST['minat_bidang_olahraga'];
    $minat_bidang_akademik = $_POST['minat_bidang_akademik'];
    $minat_bidang_sosial = $_POST['minat_bidang_sosial'];
    $minat_bidang_teknologi = $_POST['minat_bidang_teknologi'];
    $kemampuan_fisik = $_POST['kemampuan_fisik'];
    $kemampuan_pemecahan_masalah = $_POST['kemampuan_pemecahan_masalah'];
    $kemampuan_berpikir_kritis = $_POST['kemampuan_berpikir_kritis'];
    $kemampuan_manajemen_waktu = $_POST['kemampuan_manajemen_waktu'];
    $kemampuan_kerja_sama_tim = $_POST['kemampuan_kerja_sama_tim'];
    $kemampuan_teknologi = $_POST['kemampuan_teknologi'];
    $waktu_tersedia_per_minggu = $_POST['waktu_tersedia_per_minggu'];
    $motivasi_pengembangan_diri = $_POST['motivasi_pengembangan_diri'];
    $motivasi_prestasi_kompetitif = $_POST['motivasi_prestasi_kompetitif'];
    $motivasi_sosial = $_POST['motivasi_sosial'];
    $kepemimpinan = $_POST['kepemimpinan'];
    $kedisiplinan = $_POST['kedisiplinan'];
    $komunikasi = $_POST['komunikasi'];
    $kreativitas = $_POST['kreativitas'];
    

  // Validasi data wajib (minimal id_siswa dan semua nilai tidak boleh kosong)
  if (empty($id_siswa) || 
  empty($minat_bidang_seni) || empty($minat_bidang_olahraga) || empty($minat_bidang_akademik) || 
  empty($minat_bidang_sosial) || empty($minat_bidang_teknologi) || empty($kemampuan_fisik) ||
  empty($kemampuan_pemecahan_masalah) || empty($kemampuan_berpikir_kritis) || empty($kemampuan_manajemen_waktu) ||
  empty($kemampuan_kerja_sama_tim) || empty($kemampuan_teknologi) || empty($waktu_tersedia_per_minggu) ||
  empty($motivasi_pengembangan_diri) || empty($motivasi_prestasi_kompetitif) || empty($motivasi_sosial) ||
  empty($kepemimpinan) || empty($kedisiplinan) || empty($komunikasi) || empty($kreativitas) ||
  empty($minat_bidang_keagamaan)
) {
  $response = [
      'status' => 'error',
      'message' => 'Semua data harus diisi lengkap'
  ];

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {

        //lakuakan pengecekan jika id siswa sudah ada maka tidak bisa menambah data lagi
        $cek_idSiswa = "SELECT * FROM nilai_murni WHERE students_id = '$id_siswa'";

        $result = $konek->query($cek_idSiswa);

        if ($result->num_rows > 0) {
            $response = array(
                'status' => 'error',
                'message' => 'Data siswa sudah di proses'
            );

            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }

        $save_nilai_murni = "INSERT INTO nilai_murni (
            students_id,
            minat_bidang_seni,
            minat_bidang_olahraga,
            minat_bidang_akademik,
            minat_bidang_sosial,
            minat_bidang_teknologi,
            kemampuan_fisik,
            kemampuan_pemecahan_masalah,
            kemampuan_berpikir_kritis,
            kemampuan_manajemen_waktu,
            kemampuan_kerja_sama_tim,
            kemampuan_teknologi,
            waktu_tersedia_per_minggu,
            motivasi_pengembangan_diri,
            motivasi_prestasi_kompetitif,
            motivasi_sosial,
            kepemimpinan,
            kedisiplinan,
            komunikasi,
            kreativitas,
            minat_bidang_keagamaan
        ) VALUES (
            '$id_siswa',
            '$minat_bidang_seni',
            '$minat_bidang_olahraga',
            '$minat_bidang_akademik',
            '$minat_bidang_sosial',
            '$minat_bidang_teknologi',
            '$kemampuan_fisik',
            '$kemampuan_pemecahan_masalah',
            '$kemampuan_berpikir_kritis',
            '$kemampuan_manajemen_waktu',
            '$kemampuan_kerja_sama_tim',
            '$kemampuan_teknologi',
            '$waktu_tersedia_per_minggu',
            '$motivasi_pengembangan_diri',
            '$motivasi_prestasi_kompetitif',
            '$motivasi_sosial',
            '$kepemimpinan',
            '$kedisiplinan',
            '$komunikasi',
            '$kreativitas',
            '$minat_bidang_keagamaan'
        )";

        if ($konek->query($save_nilai_murni) === TRUE) {


            $save_nilai_score = "INSERT INTO scoring (
                students_id,
                minat_bidang_seni,
                minat_bidang_olahraga,
                minat_bidang_akademik,
                minat_bidang_sosial,
                minat_bidang_teknologi,
                kemampuan_fisik,
                kemampuan_pemecahan_masalah,
                kemampuan_berpikir_kritis,
                kemampuan_manajemen_waktu,
                kemampuan_kerja_sama_tim,
                kemampuan_teknologi,
                waktu_tersedia_per_minggu,
                motivasi_pengembangan_diri,
                motivasi_prestasi_kompetitif,
                motivasi_sosial,
                kepemimpinan,
                kedisiplinan,
                komunikasi,
                kreativitas,
                minat_bidang_keagamaan
            ) VALUES (
                '$id_siswa',
                '$minat_bidang_seni',
                '$minat_bidang_olahraga',
                '$minat_bidang_akademik',
                '$minat_bidang_sosial',
                '$minat_bidang_teknologi',
                '$kemampuan_fisik',
                '$kemampuan_pemecahan_masalah',
                '$kemampuan_berpikir_kritis',
                '$kemampuan_manajemen_waktu',
                '$kemampuan_kerja_sama_tim',
                '$kemampuan_teknologi',
                '$waktu_tersedia_per_minggu',
                '$motivasi_pengembangan_diri',
                '$motivasi_prestasi_kompetitif',
                '$motivasi_sosial',
                '$kepemimpinan',
                '$kedisiplinan',
                '$komunikasi',
                '$kreativitas',
                '$minat_bidang_keagamaan'
            )";

            if ($konek->query($save_nilai_score) === FALSE) {
                $delete_nilai_murni = "DELETE FROM nilai_murni WHERE id_siswa = '$id_siswa'";
                $konek->query($delete_nilai_murni);
            }

            //ambil data scroring berdasarkan id siswa
            $scoring = "SELECT 
            students_id,
            minat_bidang_seni,
            minat_bidang_olahraga,
            minat_bidang_akademik,
            minat_bidang_sosial,
            minat_bidang_teknologi,
            kemampuan_fisik,
            kemampuan_pemecahan_masalah,
            kemampuan_berpikir_kritis,
            kemampuan_manajemen_waktu,
            kemampuan_kerja_sama_tim,
            kemampuan_teknologi,
            waktu_tersedia_per_minggu,
            motivasi_pengembangan_diri,
            motivasi_prestasi_kompetitif,
            motivasi_sosial,
            kepemimpinan,
            kedisiplinan,
            komunikasi,
            kreativitas,
            minat_bidang_keagamaan FROM scoring WHERE students_id = '$id_siswa'";

            //ambil data target untuk IPA dan IPS
            $target_rohis = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'ROHIS (Rohani Islam)'";
            $target_paskibra = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'PASKIBRA (Pasukan Pengibar Bendera)'";
            $target_pmr = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'PMR (Palang Merah Remaja)'";
            $target_pramuka = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'PRAMUKA'";
            $target_kabar_15 = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'KABAR 15'";
            $target_japanese_club = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'JAPANESE CLUB'";
            $target_osis = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'OSIS (Organisasi Siswa Intra Sekolah)'";
            $target_basket = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'BASKET'";
            $target_badminton = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'BADMINTON (Bulutangkis)'";
            $target_voli = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'VOLI (Volleyball)'";
            $target_sepak_bola = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'SEPAK BOLA'";
            $target_futsal = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'FUTSAL'";
            $target_seni_suara = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'SENI SUARA'";
            $target_tari_saman = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'TARI SAMAN'";
            $target_tari_lenggang_cisadane = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'TARI LENGGANG CISADANE'";
            $target_teater = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'TEATER'";
            $target_taekwondo = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'TAEKWONDO'";
            $target_bela_diri_matahari = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'BELA DIRI MATAHARI'";
            $target_canda_birawa = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'CANDA BIRAWA'";
            $target_kir = "SELECT nilai_target FROM nilai_target WHERE ekskul = 'KIR (Karya Ilmiah Remaja)'";            

            
            $data_scoring = mysqli_query($konek, $scoring);
            $data_target_rohis = mysqli_query($konek, $target_rohis);
            $data_target_paskibra = mysqli_query($konek, $target_paskibra);
            $data_target_pmr = mysqli_query($konek, $target_pmr);
            $data_target_pramuka = mysqli_query($konek, $target_pramuka);
            $data_target_kabar_15 = mysqli_query($konek, $target_kabar_15);
            $data_target_japanese_club = mysqli_query($konek, $target_japanese_club);
            $data_target_osis = mysqli_query($konek, $target_osis);
            $data_target_basket = mysqli_query($konek, $target_basket);
            $data_target_badminton = mysqli_query($konek, $target_badminton);
            $data_target_voli = mysqli_query($konek, $target_voli);
            $data_target_sepak_bola = mysqli_query($konek, $target_sepak_bola);
            $data_target_futsal = mysqli_query($konek, $target_futsal);
            $data_target_seni_suara = mysqli_query($konek, $target_seni_suara);
            $data_target_tari_saman = mysqli_query($konek, $target_tari_saman);
            $data_target_tari_lenggang_cisadane = mysqli_query($konek, $target_tari_lenggang_cisadane);
            $data_target_teater = mysqli_query($konek, $target_teater);
            $data_target_taekwondo = mysqli_query($konek, $target_taekwondo);
            $data_target_bela_diri_matahari = mysqli_query($konek, $target_bela_diri_matahari);
            $data_target_canda_birawa = mysqli_query($konek, $target_canda_birawa);
            $data_target_kir = mysqli_query($konek, $target_kir);            
            

            $hasil_scoring = array();
            while ($data = mysqli_fetch_assoc($data_scoring)) {
                $hasil_scoring[] = $data;
            }

            $target_rohis = array();
            while ($a = mysqli_fetch_assoc($data_target_rohis)) {
                $target_rohis[] = $a;
            }
            
            $target_paskibra = array();
            while ($b = mysqli_fetch_assoc($data_target_paskibra)) {
                $target_paskibra[] = $b;
            }
            
            $target_pmr = array();
            while ($c = mysqli_fetch_assoc($data_target_pmr)) {
                $target_pmr[] = $c;
            }
            
            $target_pramuka = array();
            while ($d = mysqli_fetch_assoc($data_target_pramuka)) {
                $target_pramuka[] = $d;
            }
            
            $target_kabar_15 = array();
            while ($e = mysqli_fetch_assoc($data_target_kabar_15)) {
                $target_kabar_15[] = $e;
            }
            
            $target_japanese_club = array();
            while ($f = mysqli_fetch_assoc($data_target_japanese_club)) {
                $target_japanese_club[] = $f;
            }
            
            $target_osis = array();
            while ($g = mysqli_fetch_assoc($data_target_osis)) {
                $target_osis[] = $g;
            }
            
            $target_basket = array();
            while ($h = mysqli_fetch_assoc($data_target_basket)) {
                $target_basket[] = $h;
            }
            
            $target_badminton = array();
            while ($i = mysqli_fetch_assoc($data_target_badminton)) {
                $target_badminton[] = $i;
            }
            
            $target_voli = array();
            while ($j = mysqli_fetch_assoc($data_target_voli)) {
                $target_voli[] = $j;
            }
            
            $target_sepak_bola = array();
            while ($k = mysqli_fetch_assoc($data_target_sepak_bola)) {
                $target_sepak_bola[] = $k;
            }
            
            $target_futsal = array();
            while ($l = mysqli_fetch_assoc($data_target_futsal)) {
                $target_futsal[] = $l;
            }
            
            $target_seni_suara = array();
            while ($m = mysqli_fetch_assoc($data_target_seni_suara)) {
                $target_seni_suara[] = $m;
            }
            
            $target_tari_saman = array();
            while ($n = mysqli_fetch_assoc($data_target_tari_saman)) {
                $target_tari_saman[] = $n;
            }
            
            $target_tari_lenggang_cisadane = array();
            while ($o = mysqli_fetch_assoc($data_target_tari_lenggang_cisadane)) {
                $target_tari_lenggang_cisadane[] = $o;
            }
            
            $target_teater = array();
            while ($p = mysqli_fetch_assoc($data_target_teater)) {
                $target_teater[] = $p;
            }
            
            $target_taekwondo = array();
            while ($q = mysqli_fetch_assoc($data_target_taekwondo)) {
                $target_taekwondo[] = $q;
            }
            
            $target_bela_diri_matahari = array();
            while ($r = mysqli_fetch_assoc($data_target_bela_diri_matahari)) {
                $target_bela_diri_matahari[] = $r;
            }
            
            $target_canda_birawa = array();
            while ($s = mysqli_fetch_assoc($data_target_canda_birawa)) {
                $target_canda_birawa[] = $s;
            }
            
            $target_kir = array();
            while ($t = mysqli_fetch_assoc($data_target_kir)) {
                $target_kir[] = $t;
            }


            for ($i = 0; $i < count($target_rohis); $i++) {
                $data_nilai_target_rohis[] = $target_rohis[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_paskibra); $i++) {
                $data_nilai_target_paskibra[] = $target_paskibra[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_pmr); $i++) {
                $data_nilai_target_pmr[] = $target_pmr[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_pramuka); $i++) {
                $data_nilai_target_pramuka[] = $target_pramuka[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_kabar_15); $i++) {
                $data_nilai_target_kabar_15[] = $target_kabar_15[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_japanese_club); $i++) {
                $data_nilai_target_japanese_club[] = $target_japanese_club[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_osis); $i++) {
                $data_nilai_target_osis[] = $target_osis[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_basket); $i++) {
                $data_nilai_target_basket[] = $target_basket[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_badminton); $i++) {
                $data_nilai_target_badminton[] = $target_badminton[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_voli); $i++) {
                $data_nilai_target_voli[] = $target_voli[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_sepak_bola); $i++) {
                $data_nilai_target_sepak_bola[] = $target_sepak_bola[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_futsal); $i++) {
                $data_nilai_target_futsal[] = $target_futsal[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_seni_suara); $i++) {
                $data_nilai_target_seni_suara[] = $target_seni_suara[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_tari_saman); $i++) {
                $data_nilai_target_tari_saman[] = $target_tari_saman[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_tari_lenggang_cisadane); $i++) {
                $data_nilai_target_tari_lenggang_cisadane[] = $target_tari_lenggang_cisadane[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_teater); $i++) {
                $data_nilai_target_teater[] = $target_teater[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_taekwondo); $i++) {
                $data_nilai_target_taekwondo[] = $target_taekwondo[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_bela_diri_matahari); $i++) {
                $data_nilai_target_bela_diri_matahari[] = $target_bela_diri_matahari[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_canda_birawa); $i++) {
                $data_nilai_target_canda_birawa[] = $target_canda_birawa[$i]['nilai_target'];
            }
            
            for ($i = 0; $i < count($target_kir); $i++) {
                $data_nilai_target_kir[] = $target_kir[$i]['nilai_target'];
            }
                        
            
            foreach ($hasil_scoring as $key => $value) {
                
                $data_nilai[] = $value['minat_bidang_keagamaan'];
                $data_nilai[] = $value['minat_bidang_seni'];
                $data_nilai[] = $value['minat_bidang_olahraga'];
                $data_nilai[] = $value['minat_bidang_akademik'];
                $data_nilai[] = $value['minat_bidang_sosial'];
                $data_nilai[] = $value['minat_bidang_teknologi'];
                $data_nilai[] = $value['kemampuan_fisik'];
                $data_nilai[] = $value['kemampuan_pemecahan_masalah'];
                $data_nilai[] = $value['kemampuan_berpikir_kritis'];
                $data_nilai[] = $value['kemampuan_manajemen_waktu'];
                $data_nilai[] = $value['kemampuan_kerja_sama_tim'];
                $data_nilai[] = $value['kemampuan_teknologi'];
                $data_nilai[] = $value['waktu_tersedia_per_minggu'];
                $data_nilai[] = $value['motivasi_pengembangan_diri'];
                $data_nilai[] = $value['motivasi_prestasi_kompetitif'];
                $data_nilai[] = $value['motivasi_sosial'];
                $data_nilai[] = $value['kepemimpinan'];
                $data_nilai[] = $value['kedisiplinan'];
                $data_nilai[] = $value['komunikasi'];
                $data_nilai[] = $value['kreativitas'];
            }

            //lakukan normalisasi nilai siswa
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_rohis[$i] = $data_nilai[$i] - $data_nilai_target_rohis[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_paskibra[$i] = $data_nilai[$i] - $data_nilai_target_paskibra[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_pmr[$i] = $data_nilai[$i] - $data_nilai_target_pmr[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_pramuka[$i] = $data_nilai[$i] - $data_nilai_target_pramuka[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_kabar_15[$i] = $data_nilai[$i] - $data_nilai_target_kabar_15[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_japanese_club[$i] = $data_nilai[$i] - $data_nilai_target_japanese_club[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_osis[$i] = $data_nilai[$i] - $data_nilai_target_osis[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_basket[$i] = $data_nilai[$i] - $data_nilai_target_basket[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_badminton[$i] = $data_nilai[$i] - $data_nilai_target_badminton[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_voli[$i] = $data_nilai[$i] - $data_nilai_target_voli[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_sepak_bola[$i] = $data_nilai[$i] - $data_nilai_target_sepak_bola[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_futsal[$i] = $data_nilai[$i] - $data_nilai_target_futsal[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_seni_suara[$i] = $data_nilai[$i] - $data_nilai_target_seni_suara[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_tari_saman[$i] = $data_nilai[$i] - $data_nilai_target_tari_saman[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_tari_lenggang_cisadane[$i] = $data_nilai[$i] - $data_nilai_target_tari_lenggang_cisadane[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_teater[$i] = $data_nilai[$i] - $data_nilai_target_teater[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_taekwondo[$i] = $data_nilai[$i] - $data_nilai_target_taekwondo[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_bela_diri_matahari[$i] = $data_nilai[$i] - $data_nilai_target_bela_diri_matahari[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_canda_birawa[$i] = $data_nilai[$i] - $data_nilai_target_canda_birawa[$i];
            }
            
            for ($i = 0; $i < count($data_nilai); $i++) {
                $data_normalisasi_kir[$i] = $data_nilai[$i] - $data_nilai_target_kir[$i];
            }            
            
            //tentukan nilai bobot gap
            $nilai_gap_rohis = array();
            for ($i = 0; $i < count($data_normalisasi_rohis); $i++) {
                if ($data_normalisasi_rohis[$i] == 0) {
                    $nilai_gap_rohis[] = 5;
                } elseif ($data_normalisasi_rohis[$i] == 1) {
                    $nilai_gap_rohis[] = 4.5;
                } elseif ($data_normalisasi_rohis[$i] == -1) {
                    $nilai_gap_rohis[] = 4;
                } elseif ($data_normalisasi_rohis[$i] == 2) {
                    $nilai_gap_rohis[] = 3.5;
                } elseif ($data_normalisasi_rohis[$i] == -2) {
                    $nilai_gap_rohis[] = 3;
                } elseif ($data_normalisasi_rohis[$i] == 3) {
                    $nilai_gap_rohis[] = 2.5;
                } elseif ($data_normalisasi_rohis[$i] == -3) {
                    $nilai_gap_rohis[] = 2;
                } elseif ($data_normalisasi_rohis[$i] == 4) {
                    $nilai_gap_rohis[] = 1.5;
                } elseif ($data_normalisasi_rohis[$i] == -4) {
                    $nilai_gap_rohis[] = 1;
                }
            }
            
            $nilai_gap_paskibra = array();
            for ($i = 0; $i < count($data_normalisasi_paskibra); $i++) {
                if ($data_normalisasi_paskibra[$i] == 0) {
                    $nilai_gap_paskibra[] = 5;
                } elseif ($data_normalisasi_paskibra[$i] == 1) {
                    $nilai_gap_paskibra[] = 4.5;
                } elseif ($data_normalisasi_paskibra[$i] == -1) {
                    $nilai_gap_paskibra[] = 4;
                } elseif ($data_normalisasi_paskibra[$i] == 2) {
                    $nilai_gap_paskibra[] = 3.5;
                } elseif ($data_normalisasi_paskibra[$i] == -2) {
                    $nilai_gap_paskibra[] = 3;
                } elseif ($data_normalisasi_paskibra[$i] == 3) {
                    $nilai_gap_paskibra[] = 2.5;
                } elseif ($data_normalisasi_paskibra[$i] == -3) {
                    $nilai_gap_paskibra[] = 2;
                } elseif ($data_normalisasi_paskibra[$i] == 4) {
                    $nilai_gap_paskibra[] = 1.5;
                } elseif ($data_normalisasi_paskibra[$i] == -4) {
                    $nilai_gap_paskibra[] = 1;
                }
            }
            
            $nilai_gap_pmr = array();
            for ($i = 0; $i < count($data_normalisasi_pmr); $i++) {
                if ($data_normalisasi_pmr[$i] == 0) {
                    $nilai_gap_pmr[] = 5;
                } elseif ($data_normalisasi_pmr[$i] == 1) {
                    $nilai_gap_pmr[] = 4.5;
                } elseif ($data_normalisasi_pmr[$i] == -1) {
                    $nilai_gap_pmr[] = 4;
                } elseif ($data_normalisasi_pmr[$i] == 2) {
                    $nilai_gap_pmr[] = 3.5;
                } elseif ($data_normalisasi_pmr[$i] == -2) {
                    $nilai_gap_pmr[] = 3;
                } elseif ($data_normalisasi_pmr[$i] == 3) {
                    $nilai_gap_pmr[] = 2.5;
                } elseif ($data_normalisasi_pmr[$i] == -3) {
                    $nilai_gap_pmr[] = 2;
                } elseif ($data_normalisasi_pmr[$i] == 4) {
                    $nilai_gap_pmr[] = 1.5;
                } elseif ($data_normalisasi_pmr[$i] == -4) {
                    $nilai_gap_pmr[] = 1;
                }
            }
            
            $nilai_gap_pramuka = array();
            for ($i = 0; $i < count($data_normalisasi_pramuka); $i++) {
                if ($data_normalisasi_pramuka[$i] == 0) {
                    $nilai_gap_pramuka[] = 5;
                } elseif ($data_normalisasi_pramuka[$i] == 1) {
                    $nilai_gap_pramuka[] = 4.5;
                } elseif ($data_normalisasi_pramuka[$i] == -1) {
                    $nilai_gap_pramuka[] = 4;
                } elseif ($data_normalisasi_pramuka[$i] == 2) {
                    $nilai_gap_pramuka[] = 3.5;
                } elseif ($data_normalisasi_pramuka[$i] == -2) {
                    $nilai_gap_pramuka[] = 3;
                } elseif ($data_normalisasi_pramuka[$i] == 3) {
                    $nilai_gap_pramuka[] = 2.5;
                } elseif ($data_normalisasi_pramuka[$i] == -3) {
                    $nilai_gap_pramuka[] = 2;
                } elseif ($data_normalisasi_pramuka[$i] == 4) {
                    $nilai_gap_pramuka[] = 1.5;
                } elseif ($data_normalisasi_pramuka[$i] == -4) {
                    $nilai_gap_pramuka[] = 1;
                }
            }
            
            $nilai_gap_kabar_15 = array();
            for ($i = 0; $i < count($data_normalisasi_kabar_15); $i++) {
                if ($data_normalisasi_kabar_15[$i] == 0) {
                    $nilai_gap_kabar_15[] = 5;
                } elseif ($data_normalisasi_kabar_15[$i] == 1) {
                    $nilai_gap_kabar_15[] = 4.5;
                } elseif ($data_normalisasi_kabar_15[$i] == -1) {
                    $nilai_gap_kabar_15[] = 4;
                } elseif ($data_normalisasi_kabar_15[$i] == 2) {
                    $nilai_gap_kabar_15[] = 3.5;
                } elseif ($data_normalisasi_kabar_15[$i] == -2) {
                    $nilai_gap_kabar_15[] = 3;
                } elseif ($data_normalisasi_kabar_15[$i] == 3) {
                    $nilai_gap_kabar_15[] = 2.5;
                } elseif ($data_normalisasi_kabar_15[$i] == -3) {
                    $nilai_gap_kabar_15[] = 2;
                } elseif ($data_normalisasi_kabar_15[$i] == 4) {
                    $nilai_gap_kabar_15[] = 1.5;
                } elseif ($data_normalisasi_kabar_15[$i] == -4) {
                    $nilai_gap_kabar_15[] = 1;
                }
            }

            $nilai_gap_japanese_club = array();
            for ($i = 0; $i < count($data_normalisasi_japanese_club); $i++) {
                if ($data_normalisasi_japanese_club[$i] == 0) {
                    $nilai_gap_japanese_club[] = 5;
                } elseif ($data_normalisasi_japanese_club[$i] == 1) {
                    $nilai_gap_japanese_club[] = 4.5;
                } elseif ($data_normalisasi_japanese_club[$i] == -1) {
                    $nilai_gap_japanese_club[] = 4;
                } elseif ($data_normalisasi_japanese_club[$i] == 2) {
                    $nilai_gap_japanese_club[] = 3.5;
                } elseif ($data_normalisasi_japanese_club[$i] == -2) {
                    $nilai_gap_japanese_club[] = 3;
                } elseif ($data_normalisasi_japanese_club[$i] == 3) {
                    $nilai_gap_japanese_club[] = 2.5;
                } elseif ($data_normalisasi_japanese_club[$i] == -3) {
                    $nilai_gap_japanese_club[] = 2;
                } elseif ($data_normalisasi_japanese_club[$i] == 4) {
                    $nilai_gap_japanese_club[] = 1.5;
                } elseif ($data_normalisasi_japanese_club[$i] == -4) {
                    $nilai_gap_japanese_club[] = 1;
                }
            }            
            
            $nilai_gap_osis = array();
            for ($i = 0; $i < count($data_normalisasi_osis); $i++) {
                if ($data_normalisasi_osis[$i] == 0) {
                    $nilai_gap_osis[] = 5;
                } elseif ($data_normalisasi_osis[$i] == 1) {
                    $nilai_gap_osis[] = 4.5;
                } elseif ($data_normalisasi_osis[$i] == -1) {
                    $nilai_gap_osis[] = 4;
                } elseif ($data_normalisasi_osis[$i] == 2) {
                    $nilai_gap_osis[] = 3.5;
                } elseif ($data_normalisasi_osis[$i] == -2) {
                    $nilai_gap_osis[] = 3;
                } elseif ($data_normalisasi_osis[$i] == 3) {
                    $nilai_gap_osis[] = 2.5;
                } elseif ($data_normalisasi_osis[$i] == -3) {
                    $nilai_gap_osis[] = 2;
                } elseif ($data_normalisasi_osis[$i] == 4) {
                    $nilai_gap_osis[] = 1.5;
                } elseif ($data_normalisasi_osis[$i] == -4) {
                    $nilai_gap_osis[] = 1;
                }
            }
            
            $nilai_gap_basket = array();
            for ($i = 0; $i < count($data_normalisasi_basket); $i++) {
                if ($data_normalisasi_basket[$i] == 0) {
                    $nilai_gap_basket[] = 5;
                } elseif ($data_normalisasi_basket[$i] == 1) {
                    $nilai_gap_basket[] = 4.5;
                } elseif ($data_normalisasi_basket[$i] == -1) {
                    $nilai_gap_basket[] = 4;
                } elseif ($data_normalisasi_basket[$i] == 2) {
                    $nilai_gap_basket[] = 3.5;
                } elseif ($data_normalisasi_basket[$i] == -2) {
                    $nilai_gap_basket[] = 3;
                } elseif ($data_normalisasi_basket[$i] == 3) {
                    $nilai_gap_basket[] = 2.5;
                } elseif ($data_normalisasi_basket[$i] == -3) {
                    $nilai_gap_basket[] = 2;
                } elseif ($data_normalisasi_basket[$i] == 4) {
                    $nilai_gap_basket[] = 1.5;
                } elseif ($data_normalisasi_basket[$i] == -4) {
                    $nilai_gap_basket[] = 1;
                }
            }
            
            $nilai_gap_badminton = array();
            for ($i = 0; $i < count($data_normalisasi_badminton); $i++) {
                if ($data_normalisasi_badminton[$i] == 0) {
                    $nilai_gap_badminton[] = 5;
                } elseif ($data_normalisasi_badminton[$i] == 1) {
                    $nilai_gap_badminton[] = 4.5;
                } elseif ($data_normalisasi_badminton[$i] == -1) {
                    $nilai_gap_badminton[] = 4;
                } elseif ($data_normalisasi_badminton[$i] == 2) {
                    $nilai_gap_badminton[] = 3.5;
                } elseif ($data_normalisasi_badminton[$i] == -2) {
                    $nilai_gap_badminton[] = 3;
                } elseif ($data_normalisasi_badminton[$i] == 3) {
                    $nilai_gap_badminton[] = 2.5;
                } elseif ($data_normalisasi_badminton[$i] == -3) {
                    $nilai_gap_badminton[] = 2;
                } elseif ($data_normalisasi_badminton[$i] == 4) {
                    $nilai_gap_badminton[] = 1.5;
                } elseif ($data_normalisasi_badminton[$i] == -4) {
                    $nilai_gap_badminton[] = 1;
                }
            }
            
            $nilai_gap_voli = array();
            for ($i = 0; $i < count($data_normalisasi_voli); $i++) {
                if ($data_normalisasi_voli[$i] == 0) {
                    $nilai_gap_voli[] = 5;
                } elseif ($data_normalisasi_voli[$i] == 1) {
                    $nilai_gap_voli[] = 4.5;
                } elseif ($data_normalisasi_voli[$i] == -1) {
                    $nilai_gap_voli[] = 4;
                } elseif ($data_normalisasi_voli[$i] == 2) {
                    $nilai_gap_voli[] = 3.5;
                } elseif ($data_normalisasi_voli[$i] == -2) {
                    $nilai_gap_voli[] = 3;
                } elseif ($data_normalisasi_voli[$i] == 3) {
                    $nilai_gap_voli[] = 2.5;
                } elseif ($data_normalisasi_voli[$i] == -3) {
                    $nilai_gap_voli[] = 2;
                } elseif ($data_normalisasi_voli[$i] == 4) {
                    $nilai_gap_voli[] = 1.5;
                } elseif ($data_normalisasi_voli[$i] == -4) {
                    $nilai_gap_voli[] = 1;
                }
            }
            
            $nilai_gap_sepak_bola = array();
            for ($i = 0; $i < count($data_normalisasi_sepak_bola); $i++) {
                if ($data_normalisasi_sepak_bola[$i] == 0) {
                    $nilai_gap_sepak_bola[] = 5;
                } elseif ($data_normalisasi_sepak_bola[$i] == 1) {
                    $nilai_gap_sepak_bola[] = 4.5;
                } elseif ($data_normalisasi_sepak_bola[$i] == -1) {
                    $nilai_gap_sepak_bola[] = 4;
                } elseif ($data_normalisasi_sepak_bola[$i] == 2) {
                    $nilai_gap_sepak_bola[] = 3.5;
                } elseif ($data_normalisasi_sepak_bola[$i] == -2) {
                    $nilai_gap_sepak_bola[] = 3;
                } elseif ($data_normalisasi_sepak_bola[$i] == 3) {
                    $nilai_gap_sepak_bola[] = 2.5;
                } elseif ($data_normalisasi_sepak_bola[$i] == -3) {
                    $nilai_gap_sepak_bola[] = 2;
                } elseif ($data_normalisasi_sepak_bola[$i] == 4) {
                    $nilai_gap_sepak_bola[] = 1.5;
                } elseif ($data_normalisasi_sepak_bola[$i] == -4) {
                    $nilai_gap_sepak_bola[] = 1;
                }
            }            
            
            $nilai_gap_futsal = array();
            for ($i = 0; $i < count($data_normalisasi_futsal); $i++) {
                if ($data_normalisasi_futsal[$i] == 0) {
                    $nilai_gap_futsal[] = 5;
                } elseif ($data_normalisasi_futsal[$i] == 1) {
                    $nilai_gap_futsal[] = 4.5;
                } elseif ($data_normalisasi_futsal[$i] == -1) {
                    $nilai_gap_futsal[] = 4;
                } elseif ($data_normalisasi_futsal[$i] == 2) {
                    $nilai_gap_futsal[] = 3.5;
                } elseif ($data_normalisasi_futsal[$i] == -2) {
                    $nilai_gap_futsal[] = 3;
                } elseif ($data_normalisasi_futsal[$i] == 3) {
                    $nilai_gap_futsal[] = 2.5;
                } elseif ($data_normalisasi_futsal[$i] == -3) {
                    $nilai_gap_futsal[] = 2;
                } elseif ($data_normalisasi_futsal[$i] == 4) {
                    $nilai_gap_futsal[] = 1.5;
                } elseif ($data_normalisasi_futsal[$i] == -4) {
                    $nilai_gap_futsal[] = 1;
                }
            }
            
            $nilai_gap_seni_suara = array();
            for ($i = 0; $i < count($data_normalisasi_seni_suara); $i++) {
                if ($data_normalisasi_seni_suara[$i] == 0) {
                    $nilai_gap_seni_suara[] = 5;
                } elseif ($data_normalisasi_seni_suara[$i] == 1) {
                    $nilai_gap_seni_suara[] = 4.5;
                } elseif ($data_normalisasi_seni_suara[$i] == -1) {
                    $nilai_gap_seni_suara[] = 4;
                } elseif ($data_normalisasi_seni_suara[$i] == 2) {
                    $nilai_gap_seni_suara[] = 3.5;
                } elseif ($data_normalisasi_seni_suara[$i] == -2) {
                    $nilai_gap_seni_suara[] = 3;
                } elseif ($data_normalisasi_seni_suara[$i] == 3) {
                    $nilai_gap_seni_suara[] = 2.5;
                } elseif ($data_normalisasi_seni_suara[$i] == -3) {
                    $nilai_gap_seni_suara[] = 2;
                } elseif ($data_normalisasi_seni_suara[$i] == 4) {
                    $nilai_gap_seni_suara[] = 1.5;
                } elseif ($data_normalisasi_seni_suara[$i] == -4) {
                    $nilai_gap_seni_suara[] = 1;
                }
            }            
            
            $nilai_gap_tari_saman = array();
            for ($i = 0; $i < count($data_normalisasi_tari_saman); $i++) {
                if ($data_normalisasi_tari_saman[$i] == 0) {
                    $nilai_gap_tari_saman[] = 5;
                } elseif ($data_normalisasi_tari_saman[$i] == 1) {
                    $nilai_gap_tari_saman[] = 4.5;
                } elseif ($data_normalisasi_tari_saman[$i] == -1) {
                    $nilai_gap_tari_saman[] = 4;
                } elseif ($data_normalisasi_tari_saman[$i] == 2) {
                    $nilai_gap_tari_saman[] = 3.5;
                } elseif ($data_normalisasi_tari_saman[$i] == -2) {
                    $nilai_gap_tari_saman[] = 3;
                } elseif ($data_normalisasi_tari_saman[$i] == 3) {
                    $nilai_gap_tari_saman[] = 2.5;
                } elseif ($data_normalisasi_tari_saman[$i] == -3) {
                    $nilai_gap_tari_saman[] = 2;
                } elseif ($data_normalisasi_tari_saman[$i] == 4) {
                    $nilai_gap_tari_saman[] = 1.5;
                } elseif ($data_normalisasi_tari_saman[$i] == -4) {
                    $nilai_gap_tari_saman[] = 1;
                }
            }            
            
            $nilai_gap_tari_lenggang_cisadane = array();
            for ($i = 0; $i < count($data_normalisasi_tari_lenggang_cisadane); $i++) {
                if ($data_normalisasi_tari_lenggang_cisadane[$i] == 0) {
                    $nilai_gap_tari_lenggang_cisadane[] = 5;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == 1) {
                    $nilai_gap_tari_lenggang_cisadane[] = 4.5;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == -1) {
                    $nilai_gap_tari_lenggang_cisadane[] = 4;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == 2) {
                    $nilai_gap_tari_lenggang_cisadane[] = 3.5;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == -2) {
                    $nilai_gap_tari_lenggang_cisadane[] = 3;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == 3) {
                    $nilai_gap_tari_lenggang_cisadane[] = 2.5;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == -3) {
                    $nilai_gap_tari_lenggang_cisadane[] = 2;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == 4) {
                    $nilai_gap_tari_lenggang_cisadane[] = 1.5;
                } elseif ($data_normalisasi_tari_lenggang_cisadane[$i] == -4) {
                    $nilai_gap_tari_lenggang_cisadane[] = 1;
                }
            }            
            
            $nilai_gap_teater = array();
            for ($i = 0; $i < count($data_normalisasi_teater); $i++) {
                if ($data_normalisasi_teater[$i] == 0) {
                    $nilai_gap_teater[] = 5;
                } elseif ($data_normalisasi_teater[$i] == 1) {
                    $nilai_gap_teater[] = 4.5;
                } elseif ($data_normalisasi_teater[$i] == -1) {
                    $nilai_gap_teater[] = 4;
                } elseif ($data_normalisasi_teater[$i] == 2) {
                    $nilai_gap_teater[] = 3.5;
                } elseif ($data_normalisasi_teater[$i] == -2) {
                    $nilai_gap_teater[] = 3;
                } elseif ($data_normalisasi_teater[$i] == 3) {
                    $nilai_gap_teater[] = 2.5;
                } elseif ($data_normalisasi_teater[$i] == -3) {
                    $nilai_gap_teater[] = 2;
                } elseif ($data_normalisasi_teater[$i] == 4) {
                    $nilai_gap_teater[] = 1.5;
                } elseif ($data_normalisasi_teater[$i] == -4) {
                    $nilai_gap_teater[] = 1;
                }
            }
            
            $nilai_gap_taekwondo = array();
            for ($i = 0; $i < count($data_normalisasi_taekwondo); $i++) {
                if ($data_normalisasi_taekwondo[$i] == 0) {
                    $nilai_gap_taekwondo[] = 5;
                } elseif ($data_normalisasi_taekwondo[$i] == 1) {
                    $nilai_gap_taekwondo[] = 4.5;
                } elseif ($data_normalisasi_taekwondo[$i] == -1) {
                    $nilai_gap_taekwondo[] = 4;
                } elseif ($data_normalisasi_taekwondo[$i] == 2) {
                    $nilai_gap_taekwondo[] = 3.5;
                } elseif ($data_normalisasi_taekwondo[$i] == -2) {
                    $nilai_gap_taekwondo[] = 3;
                } elseif ($data_normalisasi_taekwondo[$i] == 3) {
                    $nilai_gap_taekwondo[] = 2.5;
                } elseif ($data_normalisasi_taekwondo[$i] == -3) {
                    $nilai_gap_taekwondo[] = 2;
                } elseif ($data_normalisasi_taekwondo[$i] == 4) {
                    $nilai_gap_taekwondo[] = 1.5;
                } elseif ($data_normalisasi_taekwondo[$i] == -4) {
                    $nilai_gap_taekwondo[] = 1;
                }
            }
            
            $nilai_gap_bela_diri_matahari = array();
            for ($i = 0; $i < count($data_normalisasi_bela_diri_matahari); $i++) {
                if ($data_normalisasi_bela_diri_matahari[$i] == 0) {
                    $nilai_gap_bela_diri_matahari[] = 5;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == 1) {
                    $nilai_gap_bela_diri_matahari[] = 4.5;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == -1) {
                    $nilai_gap_bela_diri_matahari[] = 4;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == 2) {
                    $nilai_gap_bela_diri_matahari[] = 3.5;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == -2) {
                    $nilai_gap_bela_diri_matahari[] = 3;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == 3) {
                    $nilai_gap_bela_diri_matahari[] = 2.5;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == -3) {
                    $nilai_gap_bela_diri_matahari[] = 2;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == 4) {
                    $nilai_gap_bela_diri_matahari[] = 1.5;
                } elseif ($data_normalisasi_bela_diri_matahari[$i] == -4) {
                    $nilai_gap_bela_diri_matahari[] = 1;
                }
            }            
            
            $nilai_gap_canda_birawa = array();
            for ($i = 0; $i < count($data_normalisasi_canda_birawa); $i++) {
                if ($data_normalisasi_canda_birawa[$i] == 0) {
                    $nilai_gap_canda_birawa[] = 5;
                } elseif ($data_normalisasi_canda_birawa[$i] == 1) {
                    $nilai_gap_canda_birawa[] = 4.5;
                } elseif ($data_normalisasi_canda_birawa[$i] == -1) {
                    $nilai_gap_canda_birawa[] = 4;
                } elseif ($data_normalisasi_canda_birawa[$i] == 2) {
                    $nilai_gap_canda_birawa[] = 3.5;
                } elseif ($data_normalisasi_canda_birawa[$i] == -2) {
                    $nilai_gap_canda_birawa[] = 3;
                } elseif ($data_normalisasi_canda_birawa[$i] == 3) {
                    $nilai_gap_canda_birawa[] = 2.5;
                } elseif ($data_normalisasi_canda_birawa[$i] == -3) {
                    $nilai_gap_canda_birawa[] = 2;
                } elseif ($data_normalisasi_canda_birawa[$i] == 4) {
                    $nilai_gap_canda_birawa[] = 1.5;
                } elseif ($data_normalisasi_canda_birawa[$i] == -4) {
                    $nilai_gap_canda_birawa[] = 1;
                }
            }            
            
            $nilai_gap_kir = array();
            for ($i = 0; $i < count($data_normalisasi_kir); $i++) {
                if ($data_normalisasi_kir[$i] == 0) {
                    $nilai_gap_kir[] = 5;
                } elseif ($data_normalisasi_kir[$i] == 1) {
                    $nilai_gap_kir[] = 4.5;
                } elseif ($data_normalisasi_kir[$i] == -1) {
                    $nilai_gap_kir[] = 4;
                } elseif ($data_normalisasi_kir[$i] == 2) {
                    $nilai_gap_kir[] = 3.5;
                } elseif ($data_normalisasi_kir[$i] == -2) {
                    $nilai_gap_kir[] = 3;
                } elseif ($data_normalisasi_kir[$i] == 3) {
                    $nilai_gap_kir[] = 2.5;
                } elseif ($data_normalisasi_kir[$i] == -3) {
                    $nilai_gap_kir[] = 2;
                } elseif ($data_normalisasi_kir[$i] == 4) {
                    $nilai_gap_kir[] = 1.5;
                } elseif ($data_normalisasi_kir[$i] == -4) {
                    $nilai_gap_kir[] = 1;
                }
            }
            
            //cek apakaha ada data didalam table nilai_bobot_gap
            $cek_query = "SELECT * FROM `nilai_bobot_gap`";
            $cek_result = $konek->query($cek_query);

            if ($cek_result->num_rows > 0) {
                // If there are existing records, delete them
                $delete_query = "TRUNCATE TABLE `nilai_bobot_gap`";
                $konek->query($delete_query);

                $kode = array();
                $angka = 0;
                for ($i = 0; $i < count($data_nilai); $i++) {
                    $kode[$i] = "C" . ++$angka;
                    $nilai_rohis = $nilai_gap_rohis[$i];
                    $nilai_paskibra = $nilai_gap_paskibra[$i];
                    $nilai_pmr = $nilai_gap_pmr[$i];
                    $nilai_pramuka = $nilai_gap_pramuka[$i];
                    $nilai_kabar_15 = $nilai_gap_kabar_15[$i];
                    $nilai_japanese_club = $nilai_gap_japanese_club[$i];
                    $nilai_osis = $nilai_gap_osis[$i];
                    $nilai_basket = $nilai_gap_basket[$i];
                    $nilai_badminton = $nilai_gap_badminton[$i];
                    $nilai_voli = $nilai_gap_voli[$i];
                    $nilai_sepak_bola = $nilai_gap_sepak_bola[$i];
                    $nilai_futsal = $nilai_gap_futsal[$i];
                    $nilai_seni_suara = $nilai_gap_seni_suara[$i];
                    $nilai_tari_saman = $nilai_gap_tari_saman[$i];
                    $nilai_tari_lenggang_cisadane = $nilai_gap_tari_lenggang_cisadane[$i];
                    $nilai_teater = $nilai_gap_teater[$i];
                    $nilai_taekwondo = $nilai_gap_taekwondo[$i];
                    $nilai_bela_diri_matahari = $nilai_gap_bela_diri_matahari[$i];
                    $nilai_canda_birawa = $nilai_gap_canda_birawa[$i];
                    $nilai_kir = $nilai_gap_kir[$i];        

                    $insert_query = "INSERT INTO nilai_bobot_gap (
                        kode, students_id,
                        bobot_rohis, bobot_paskibra, bobot_pmr, bobot_pramuka, bobot_kabar_15,
                        bobot_kir, bobot_japanese_club, bobot_osis, bobot_basket, bobot_badminton,
                        bobot_voli, bobot_sepak_bola, bobot_futsal, bobot_seni_suara, bobot_tari_saman,
                        bobot_tari_lenggang_cisadane, bobot_teater, bobot_taekwondo, bobot_canda_birawa,
                        bobot_bela_diri_matahari
                    ) VALUES (
                        '$kode[$i]', '$id_siswa',
                        '$nilai_rohis', '$nilai_paskibra', '$nilai_pmr', '$nilai_pramuka', '$nilai_kabar_15',
                        '$nilai_kir', '$nilai_japanese_club', '$nilai_osis', '$nilai_basket', '$nilai_badminton',
                        '$nilai_voli', '$nilai_sepak_bola', '$nilai_futsal', '$nilai_seni_suara', '$nilai_tari_saman',
                        '$nilai_tari_lenggang_cisadane', '$nilai_teater', '$nilai_taekwondo', '$nilai_canda_birawa',
                        '$nilai_bela_diri_matahari'
                    )";
                    $konek->query($insert_query);
                }
            } else {
                // If there are no existing records, insert new records
                $kode = array();
                $angka = 0;
                for ($i = 0; $i < count($data_nilai); $i++) {
                    $kode[$i] = "C" . ++$angka;
                    $nilai_rohis = $nilai_gap_rohis[$i];
                    $nilai_paskibra = $nilai_gap_paskibra[$i];
                    $nilai_pmr = $nilai_gap_pmr[$i];
                    $nilai_pramuka = $nilai_gap_pramuka[$i];
                    $nilai_kabar_15 = $nilai_gap_kabar_15[$i];
                    $nilai_japanese_club = $nilai_gap_japanese_club[$i];
                    $nilai_osis = $nilai_gap_osis[$i];
                    $nilai_basket = $nilai_gap_basket[$i];
                    $nilai_badminton = $nilai_gap_badminton[$i];
                    $nilai_voli = $nilai_gap_voli[$i];
                    $nilai_sepak_bola = $nilai_gap_sepak_bola[$i];
                    $nilai_futsal = $nilai_gap_futsal[$i];
                    $nilai_seni_suara = $nilai_gap_seni_suara[$i];
                    $nilai_tari_saman = $nilai_gap_tari_saman[$i];
                    $nilai_tari_lenggang_cisadane = $nilai_gap_tari_lenggang_cisadane[$i];
                    $nilai_teater = $nilai_gap_teater[$i];
                    $nilai_taekwondo = $nilai_gap_taekwondo[$i];
                    $nilai_bela_diri_matahari = $nilai_gap_bela_diri_matahari[$i];
                    $nilai_canda_birawa = $nilai_gap_canda_birawa[$i];
                    $nilai_kir = $nilai_gap_kir[$i];                    
                    $insert_query = "INSERT INTO nilai_bobot_gap (
                        kode, students_id,
                        bobot_rohis, bobot_paskibra, bobot_pmr, bobot_pramuka, bobot_kabar_15,
                        bobot_kir, bobot_japanese_club, bobot_osis, bobot_basket, bobot_badminton,
                        bobot_voli, bobot_sepak_bola, bobot_futsal, bobot_seni_suara, bobot_tari_saman,
                        bobot_tari_lenggang_cisadane, bobot_teater, bobot_taekwondo, bobot_canda_birawa,
                        bobot_bela_diri_matahari
                    ) VALUES (
                        '$kode[$i]', '$id_siswa',
                        '$nilai_rohis', '$nilai_paskibra', '$nilai_pmr', '$nilai_pramuka', '$nilai_kabar_15',
                        '$nilai_kir', '$nilai_japanese_club', '$nilai_osis', '$nilai_basket', '$nilai_badminton',
                        '$nilai_voli', '$nilai_sepak_bola', '$nilai_futsal', '$nilai_seni_suara', '$nilai_tari_saman',
                        '$nilai_tari_lenggang_cisadane', '$nilai_teater', '$nilai_taekwondo', '$nilai_canda_birawa',
                        '$nilai_bela_diri_matahari'
                    )";
                    $konek->query($insert_query);
                }
            }

            //hitung ncf dan nsf ekskul

            $get_bobot = "SELECT bobot.*, sk.faktor, k.nama_kriteria 
                FROM `nilai_bobot_gap` AS bobot
                JOIN sub_kriteria AS sk ON bobot.kode = sk.kode
                JOIN kriteria as k ON sk.kriteria_id = k.id
                ORDER BY bobot.kode ASC";

            $get_bobot = $konek->query($get_bobot);

            while ($data = $get_bobot->fetch_assoc()) {
                $data_bobot[] = $data;
            }

            //cek data $kriteria[] dengan nilai yang sama
            
            //bobot ncf minat ekskul
            $total_bobot_minat_ncf_rohis = 0;
            $total_bobot_minat_ncf_paskibra = 0;
            $total_bobot_minat_ncf_pmr = 0;
            $total_bobot_minat_ncf_pramuka = 0;
            $total_bobot_minat_ncf_kabar_15 = 0;
            $total_bobot_minat_ncf_kir = 0;
            $total_bobot_minat_ncf_japanese_club = 0;
            $total_bobot_minat_ncf_osis = 0;
            $total_bobot_minat_ncf_basket = 0;
            $total_bobot_minat_ncf_badminton = 0;
            $total_bobot_minat_ncf_voli = 0;
            $total_bobot_minat_ncf_sepak_bola = 0;
            $total_bobot_minat_ncf_futsal = 0;
            $total_bobot_minat_ncf_seni_suara = 0;
            $total_bobot_minat_ncf_tari_saman = 0;
            $total_bobot_minat_ncf_tari_lenggang_cisadane = 0;
            $total_bobot_minat_ncf_teater = 0;
            $total_bobot_minat_ncf_taekwondo = 0;
            $total_bobot_minat_ncf_canda_birawa = 0;
            $total_bobot_minat_ncf_bela_diri_matahari = 0;
            
            //nsf minat
            $total_bobot_minat_nsf_rohis = 0;
            $total_bobot_minat_nsf_paskibra = 0;
            $total_bobot_minat_nsf_pmr = 0;
            $total_bobot_minat_nsf_pramuka = 0;
            $total_bobot_minat_nsf_kabar_15 = 0;
            $total_bobot_minat_nsf_kir = 0;
            $total_bobot_minat_nsf_japanese_club = 0;
            $total_bobot_minat_nsf_osis = 0;
            $total_bobot_minat_nsf_basket = 0;
            $total_bobot_minat_nsf_badminton = 0;
            $total_bobot_minat_nsf_voli = 0;
            $total_bobot_minat_nsf_sepak_bola = 0;
            $total_bobot_minat_nsf_futsal = 0;
            $total_bobot_minat_nsf_seni_suara = 0;
            $total_bobot_minat_nsf_tari_saman = 0;
            $total_bobot_minat_nsf_tari_lenggang_cisadane = 0;
            $total_bobot_minat_nsf_teater = 0;
            $total_bobot_minat_nsf_taekwondo = 0;
            $total_bobot_minat_nsf_canda_birawa = 0;
            $total_bobot_minat_nsf_bela_diri_matahari = 0;

            //ncf kemampuan
            $total_bobot_kemampuan_ncf_rohis = 0;
            $total_bobot_kemampuan_ncf_paskibra = 0;
            $total_bobot_kemampuan_ncf_pmr = 0;
            $total_bobot_kemampuan_ncf_pramuka = 0;
            $total_bobot_kemampuan_ncf_kabar_15 = 0;
            $total_bobot_kemampuan_ncf_kir = 0;
            $total_bobot_kemampuan_ncf_japanese_club = 0;
            $total_bobot_kemampuan_ncf_osis = 0;
            $total_bobot_kemampuan_ncf_basket = 0;
            $total_bobot_kemampuan_ncf_badminton = 0;
            $total_bobot_kemampuan_ncf_voli = 0;
            $total_bobot_kemampuan_ncf_sepak_bola = 0;
            $total_bobot_kemampuan_ncf_futsal = 0;
            $total_bobot_kemampuan_ncf_seni_suara = 0;
            $total_bobot_kemampuan_ncf_tari_saman = 0;
            $total_bobot_kemampuan_ncf_tari_lenggang_cisadane = 0;
            $total_bobot_kemampuan_ncf_teater = 0;
            $total_bobot_kemampuan_ncf_taekwondo = 0;
            $total_bobot_kemampuan_ncf_canda_birawa = 0;
            $total_bobot_kemampuan_ncf_bela_diri_matahari = 0;

            //nsf kemampuan
            $total_bobot_kemampuan_nsf_rohis = 0;
            $total_bobot_kemampuan_nsf_paskibra = 0;
            $total_bobot_kemampuan_nsf_pmr = 0;
            $total_bobot_kemampuan_nsf_pramuka = 0;
            $total_bobot_kemampuan_nsf_kabar_15 = 0;
            $total_bobot_kemampuan_nsf_kir = 0;
            $total_bobot_kemampuan_nsf_japanese_club = 0;
            $total_bobot_kemampuan_nsf_osis = 0;
            $total_bobot_kemampuan_nsf_basket = 0;
            $total_bobot_kemampuan_nsf_badminton = 0;
            $total_bobot_kemampuan_nsf_voli = 0;
            $total_bobot_kemampuan_nsf_sepak_bola = 0;
            $total_bobot_kemampuan_nsf_futsal = 0;
            $total_bobot_kemampuan_nsf_seni_suara = 0;
            $total_bobot_kemampuan_nsf_tari_saman = 0;
            $total_bobot_kemampuan_nsf_tari_lenggang_cisadane = 0;
            $total_bobot_kemampuan_nsf_teater = 0;
            $total_bobot_kemampuan_nsf_taekwondo = 0;
            $total_bobot_kemampuan_nsf_canda_birawa = 0;
            $total_bobot_kemampuan_nsf_bela_diri_matahari = 0;

            //ncf waktu
            $total_bobot_waktu_ncf_rohis = 0;
            $total_bobot_waktu_ncf_paskibra = 0;
            $total_bobot_waktu_ncf_pmr = 0;
            $total_bobot_waktu_ncf_pramuka = 0;
            $total_bobot_waktu_ncf_kabar_15 = 0;
            $total_bobot_waktu_ncf_kir = 0;
            $total_bobot_waktu_ncf_japanese_club = 0;
            $total_bobot_waktu_ncf_osis = 0;
            $total_bobot_waktu_ncf_basket = 0;
            $total_bobot_waktu_ncf_badminton = 0;
            $total_bobot_waktu_ncf_voli = 0;
            $total_bobot_waktu_ncf_sepak_bola = 0;
            $total_bobot_waktu_ncf_futsal = 0;
            $total_bobot_waktu_ncf_seni_suara = 0;
            $total_bobot_waktu_ncf_tari_saman = 0;
            $total_bobot_waktu_ncf_tari_lenggang_cisadane = 0;
            $total_bobot_waktu_ncf_teater = 0;
            $total_bobot_waktu_ncf_taekwondo = 0;
            $total_bobot_waktu_ncf_canda_birawa = 0;
            $total_bobot_waktu_ncf_bela_diri_matahari = 0;

            //nsf waktu
            $total_bobot_waktu_nsf_rohis = 0;
            $total_bobot_waktu_nsf_paskibra = 0;
            $total_bobot_waktu_nsf_pmr = 0;
            $total_bobot_waktu_nsf_pramuka = 0;
            $total_bobot_waktu_nsf_kabar_15 = 0;
            $total_bobot_waktu_nsf_kir = 0;
            $total_bobot_waktu_nsf_japanese_club = 0;
            $total_bobot_waktu_nsf_osis = 0;
            $total_bobot_waktu_nsf_basket = 0;
            $total_bobot_waktu_nsf_badminton = 0;
            $total_bobot_waktu_nsf_voli = 0;
            $total_bobot_waktu_nsf_sepak_bola = 0;
            $total_bobot_waktu_nsf_futsal = 0;
            $total_bobot_waktu_nsf_seni_suara = 0;
            $total_bobot_waktu_nsf_tari_saman = 0;
            $total_bobot_waktu_nsf_tari_lenggang_cisadane = 0;
            $total_bobot_waktu_nsf_teater = 0;
            $total_bobot_waktu_nsf_taekwondo = 0;
            $total_bobot_waktu_nsf_canda_birawa = 0;
            $total_bobot_waktu_nsf_bela_diri_matahari = 0;

           //ncf motivasi
           $total_bobot_motivasi_ncf_rohis = 0;
            $total_bobot_motivasi_ncf_paskibra = 0;
            $total_bobot_motivasi_ncf_pmr = 0;
            $total_bobot_motivasi_ncf_pramuka = 0;
            $total_bobot_motivasi_ncf_kabar_15 = 0;
            $total_bobot_motivasi_ncf_kir = 0;
            $total_bobot_motivasi_ncf_japanese_club = 0;
            $total_bobot_motivasi_ncf_osis = 0;
            $total_bobot_motivasi_ncf_basket = 0;
            $total_bobot_motivasi_ncf_badminton = 0;
            $total_bobot_motivasi_ncf_voli = 0;
            $total_bobot_motivasi_ncf_sepak_bola = 0;
            $total_bobot_motivasi_ncf_futsal = 0;
            $total_bobot_motivasi_ncf_seni_suara = 0;
            $total_bobot_motivasi_ncf_tari_saman = 0;
            $total_bobot_motivasi_ncf_tari_lenggang_cisadane = 0;
            $total_bobot_motivasi_ncf_teater = 0;
            $total_bobot_motivasi_ncf_taekwondo = 0;
            $total_bobot_motivasi_ncf_canda_birawa = 0;
            $total_bobot_motivasi_ncf_bela_diri_matahari = 0;

            //nsf motivasi
            $total_bobot_motivasi_nsf_rohis = 0;
            $total_bobot_motivasi_nsf_paskibra = 0;
            $total_bobot_motivasi_nsf_pmr = 0;
            $total_bobot_motivasi_nsf_pramuka = 0;
            $total_bobot_motivasi_nsf_kabar_15 = 0;
            $total_bobot_motivasi_nsf_kir = 0;
            $total_bobot_motivasi_nsf_japanese_club = 0;
            $total_bobot_motivasi_nsf_osis = 0;
            $total_bobot_motivasi_nsf_basket = 0;
            $total_bobot_motivasi_nsf_badminton = 0;
            $total_bobot_motivasi_nsf_voli = 0;
            $total_bobot_motivasi_nsf_sepak_bola = 0;
            $total_bobot_motivasi_nsf_futsal = 0;
            $total_bobot_motivasi_nsf_seni_suara = 0;
            $total_bobot_motivasi_nsf_tari_saman = 0;
            $total_bobot_motivasi_nsf_tari_lenggang_cisadane = 0;
            $total_bobot_motivasi_nsf_teater = 0;
            $total_bobot_motivasi_nsf_taekwondo = 0;
            $total_bobot_motivasi_nsf_canda_birawa = 0;
            $total_bobot_motivasi_nsf_bela_diri_matahari = 0;

            //karateristik ncf
            $total_bobot_karakteristik_ncf_rohis = 0;
            $total_bobot_karakteristik_ncf_paskibra = 0;
            $total_bobot_karakteristik_ncf_pmr = 0;
            $total_bobot_karakteristik_ncf_pramuka = 0;
            $total_bobot_karakteristik_ncf_kabar_15 = 0;
            $total_bobot_karakteristik_ncf_kir = 0;
            $total_bobot_karakteristik_ncf_japanese_club = 0;
            $total_bobot_karakteristik_ncf_osis = 0;
            $total_bobot_karakteristik_ncf_basket = 0;
            $total_bobot_karakteristik_ncf_badminton = 0;
            $total_bobot_karakteristik_ncf_voli = 0;
            $total_bobot_karakteristik_ncf_sepak_bola = 0;
            $total_bobot_karakteristik_ncf_futsal = 0;
            $total_bobot_karakteristik_ncf_seni_suara = 0;
            $total_bobot_karakteristik_ncf_tari_saman = 0;
            $total_bobot_karakteristik_ncf_tari_lenggang_cisadane = 0;
            $total_bobot_karakteristik_ncf_teater = 0;
            $total_bobot_karakteristik_ncf_taekwondo = 0;
            $total_bobot_karakteristik_ncf_canda_birawa = 0;
            $total_bobot_karakteristik_ncf_bela_diri_matahari = 0;

            //nsf karakteristik
            $total_bobot_karakteristik_nsf_rohis = 0;
            $total_bobot_karakteristik_nsf_paskibra = 0;
            $total_bobot_karakteristik_nsf_pmr = 0;
            $total_bobot_karakteristik_nsf_pramuka = 0;
            $total_bobot_karakteristik_nsf_kabar_15 = 0;
            $total_bobot_karakteristik_nsf_kir = 0;
            $total_bobot_karakteristik_nsf_japanese_club = 0;
            $total_bobot_karakteristik_nsf_osis = 0;
            $total_bobot_karakteristik_nsf_basket = 0;
            $total_bobot_karakteristik_nsf_badminton = 0;
            $total_bobot_karakteristik_nsf_voli = 0;
            $total_bobot_karakteristik_nsf_sepak_bola = 0;
            $total_bobot_karakteristik_nsf_futsal = 0;
            $total_bobot_karakteristik_nsf_seni_suara = 0;
            $total_bobot_karakteristik_nsf_tari_saman = 0;
            $total_bobot_karakteristik_nsf_tari_lenggang_cisadane = 0;
            $total_bobot_karakteristik_nsf_teater = 0;
            $total_bobot_karakteristik_nsf_taekwondo = 0;
            $total_bobot_karakteristik_nsf_canda_birawa = 0;
            $total_bobot_karakteristik_nsf_bela_diri_matahari = 0;

            //jumlah ncf&nsf
            $jumlah_ncf_minat = 0;
            $jumlah_nsf_minat = 0;
            
            $jumlah_ncf_kemampuan = 0;
            $jumlah_nsf_kemampuan = 0;
            
            $jumlah_ncf_waktu = 0;
            $jumlah_nsf_waktu = 0;

            $jumlah_ncf_motivasi = 0;
            $jumlah_nsf_motivasi = 0;
            
            $jumlah_ncf_karakteristik = 0;
            $jumlah_nsf_karakteristik = 0;
            

            foreach ($data_bobot as $item) {
                
                 if ($item['nama_kriteria'] == 'Minat' && $item['faktor'] == 'NCF') {
                    $jumlah_ncf_minat++;
                    // Menambahkan bobot untuk masing-masing ekskul pada kategori Minat (NCF)
                    $total_bobot_minat_ncf_rohis += $item['bobot_rohis'];
                    $total_bobot_minat_ncf_paskibra += $item['bobot_paskibra'];
                    $total_bobot_minat_ncf_pmr += $item['bobot_pmr'];
                    $total_bobot_minat_ncf_pramuka += $item['bobot_pramuka'];
                    $total_bobot_minat_ncf_kabar_15 += $item['bobot_kabar_15'];
                    $total_bobot_minat_ncf_japanese_club += $item['bobot_japanese_club'];
                    $total_bobot_minat_ncf_osis += $item['bobot_osis'];
                    $total_bobot_minat_ncf_basket += $item['bobot_basket'];
                    $total_bobot_minat_ncf_badminton += $item['bobot_badminton'];
                    $total_bobot_minat_ncf_voli += $item['bobot_voli'];
                    $total_bobot_minat_ncf_sepak_bola += $item['bobot_sepak_bola'];
                    $total_bobot_minat_ncf_futsal += $item['bobot_futsal'];
                    $total_bobot_minat_ncf_seni_suara += $item['bobot_seni_suara'];
                    $total_bobot_minat_ncf_tari_saman += $item['bobot_tari_saman'];
                    $total_bobot_minat_ncf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                    $total_bobot_minat_ncf_teater += $item['bobot_teater'];
                    $total_bobot_minat_ncf_taekwondo += $item['bobot_taekwondo'];
                    $total_bobot_minat_ncf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                    $total_bobot_minat_ncf_canda_birawa += $item['bobot_canda_birawa'];
                    $total_bobot_minat_ncf_kir += $item['bobot_kir'];

                }     elseif ($item['nama_kriteria'] == 'Minat' && $item['faktor'] == 'NSF') {
                        // Menghitung jumlah Minat berdasarkan NSF
                        $jumlah_nsf_minat++;
                        // Menambahkan bobot untuk setiap ekskul pada kategori Minat (NSF)
                        $total_bobot_minat_nsf_rohis += $item['bobot_rohis'];
                        $total_bobot_minat_nsf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_minat_nsf_pmr += $item['bobot_pmr'];
                        $total_bobot_minat_nsf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_minat_nsf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_minat_nsf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_minat_nsf_osis += $item['bobot_osis'];
                        $total_bobot_minat_nsf_basket += $item['bobot_basket'];
                        $total_bobot_minat_nsf_badminton += $item['bobot_badminton'];
                        $total_bobot_minat_nsf_voli += $item['bobot_voli'];
                        $total_bobot_minat_nsf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_minat_nsf_futsal += $item['bobot_futsal'];
                        $total_bobot_minat_nsf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_minat_nsf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_minat_nsf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_minat_nsf_teater += $item['bobot_teater'];
                        $total_bobot_minat_nsf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_minat_nsf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_minat_nsf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_minat_nsf_kir += $item['bobot_kir'];       

                }     elseif ($item['nama_kriteria'] == 'Kemampuan' && $item['faktor'] == 'NCF') {
                        $jumlah_ncf_kemampuan++;
                        // Menambahkan bobot untuk setiap ekskul pada kategori Kemampuan (NCF)
                        $total_bobot_kemampuan_ncf_rohis += $item['bobot_rohis'];
                        $total_bobot_kemampuan_ncf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_kemampuan_ncf_pmr += $item['bobot_pmr'];
                        $total_bobot_kemampuan_ncf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_kemampuan_ncf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_kemampuan_ncf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_kemampuan_ncf_osis += $item['bobot_osis'];
                        $total_bobot_kemampuan_ncf_basket += $item['bobot_basket'];
                        $total_bobot_kemampuan_ncf_badminton += $item['bobot_badminton'];
                        $total_bobot_kemampuan_ncf_voli += $item['bobot_voli'];
                        $total_bobot_kemampuan_ncf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_kemampuan_ncf_futsal += $item['bobot_futsal'];
                        $total_bobot_kemampuan_ncf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_kemampuan_ncf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_kemampuan_ncf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_kemampuan_ncf_teater += $item['bobot_teater'];
                        $total_bobot_kemampuan_ncf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_kemampuan_ncf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_kemampuan_ncf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_kemampuan_ncf_kir += $item['bobot_kir'];
                }     elseif ($item['nama_kriteria'] == 'Kemampuan' && $item['faktor'] == 'NSF') {
                        $jumlah_nsf_kemampuan++;
                        // Menambahkan bobot untuk setiap ekskul pada kategori Kemampuan (NSF)
                        $total_bobot_kemampuan_nsf_rohis += $item['bobot_rohis'];
                        $total_bobot_kemampuan_nsf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_kemampuan_nsf_pmr += $item['bobot_pmr'];
                        $total_bobot_kemampuan_nsf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_kemampuan_nsf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_kemampuan_nsf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_kemampuan_nsf_osis += $item['bobot_osis'];
                        $total_bobot_kemampuan_nsf_basket += $item['bobot_basket'];
                        $total_bobot_kemampuan_nsf_badminton += $item['bobot_badminton'];
                        $total_bobot_kemampuan_nsf_voli += $item['bobot_voli'];
                        $total_bobot_kemampuan_nsf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_kemampuan_nsf_futsal += $item['bobot_futsal'];
                        $total_bobot_kemampuan_nsf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_kemampuan_nsf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_kemampuan_nsf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_kemampuan_nsf_teater += $item['bobot_teater'];
                        $total_bobot_kemampuan_nsf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_kemampuan_nsf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_kemampuan_nsf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_kemampuan_nsf_kir += $item['bobot_kir'];
                }  elseif ($item['nama_kriteria'] == 'Waktu' && $item['faktor'] == 'NCF') {
                        $jumlah_ncf_waktu++;

                        // Menambahkan bobot untuk setiap ekskul pada kategori Waktu (NCF)
                        $total_bobot_waktu_ncf_rohis += $item['bobot_rohis'];
                        $total_bobot_waktu_ncf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_waktu_ncf_pmr += $item['bobot_pmr'];
                        $total_bobot_waktu_ncf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_waktu_ncf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_waktu_ncf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_waktu_ncf_osis += $item['bobot_osis'];
                        $total_bobot_waktu_ncf_basket += $item['bobot_basket'];
                        $total_bobot_waktu_ncf_badminton += $item['bobot_badminton'];
                        $total_bobot_waktu_ncf_voli += $item['bobot_voli'];
                        $total_bobot_waktu_ncf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_waktu_ncf_futsal += $item['bobot_futsal'];
                        $total_bobot_waktu_ncf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_waktu_ncf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_waktu_ncf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_waktu_ncf_teater += $item['bobot_teater'];
                        $total_bobot_waktu_ncf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_waktu_ncf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_waktu_ncf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_waktu_ncf_kir += $item['bobot_kir'];
              }elseif ($item['nama_kriteria'] == 'Waktu' && $item['faktor'] == 'NSF') {
                        $jumlah_nsf_waktu++;

                        // Menambahkan bobot untuk setiap ekskul pada kategori Waktu (NSF)
                        $total_bobot_waktu_nsf_rohis += $item['bobot_rohis'];
                        $total_bobot_waktu_nsf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_waktu_nsf_pmr += $item['bobot_pmr'];
                        $total_bobot_waktu_nsf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_waktu_nsf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_waktu_nsf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_waktu_nsf_osis += $item['bobot_osis'];
                        $total_bobot_waktu_nsf_basket += $item['bobot_basket'];
                        $total_bobot_waktu_nsf_badminton += $item['bobot_badminton'];
                        $total_bobot_waktu_nsf_voli += $item['bobot_voli'];
                        $total_bobot_waktu_nsf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_waktu_nsf_futsal += $item['bobot_futsal'];
                        $total_bobot_waktu_nsf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_waktu_nsf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_waktu_nsf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_waktu_nsf_teater += $item['bobot_teater'];
                        $total_bobot_waktu_nsf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_waktu_nsf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_waktu_nsf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_waktu_nsf_kir += $item['bobot_kir'];
                        
                    } elseif ($item['nama_kriteria'] == 'Motivasi' && $item['faktor'] == 'NCF') {
                        $jumlah_ncf_motivasi++;
                
                        // Menambahkan bobot untuk setiap ekskul pada kategori Motivasi (NCF)
                        $total_bobot_motivasi_ncf_rohis += $item['bobot_rohis'];
                        $total_bobot_motivasi_ncf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_motivasi_ncf_pmr += $item['bobot_pmr'];
                        $total_bobot_motivasi_ncf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_motivasi_ncf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_motivasi_ncf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_motivasi_ncf_osis += $item['bobot_osis'];
                        $total_bobot_motivasi_ncf_basket += $item['bobot_basket'];
                        $total_bobot_motivasi_ncf_badminton += $item['bobot_badminton'];
                        $total_bobot_motivasi_ncf_voli += $item['bobot_voli'];
                        $total_bobot_motivasi_ncf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_motivasi_ncf_futsal += $item['bobot_futsal'];
                        $total_bobot_motivasi_ncf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_motivasi_ncf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_motivasi_ncf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_motivasi_ncf_teater += $item['bobot_teater'];
                        $total_bobot_motivasi_ncf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_motivasi_ncf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_motivasi_ncf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_motivasi_ncf_kir += $item['bobot_kir'];
                    }elseif ($item['nama_kriteria'] == 'Motivasi' && $item['faktor'] == 'NSF') {
                        $jumlah_nsf_motivasi++;
                
                        // Menambahkan bobot untuk setiap ekskul pada kategori Motivasi (NSF)
                        $total_bobot_motivasi_nsf_rohis += $item['bobot_rohis'];
                        $total_bobot_motivasi_nsf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_motivasi_nsf_pmr += $item['bobot_pmr'];
                        $total_bobot_motivasi_nsf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_motivasi_nsf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_motivasi_nsf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_motivasi_nsf_osis += $item['bobot_osis'];
                        $total_bobot_motivasi_nsf_basket += $item['bobot_basket'];
                        $total_bobot_motivasi_nsf_badminton += $item['bobot_badminton'];
                        $total_bobot_motivasi_nsf_voli += $item['bobot_voli'];
                        $total_bobot_motivasi_nsf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_motivasi_nsf_futsal += $item['bobot_futsal'];
                        $total_bobot_motivasi_nsf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_motivasi_nsf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_motivasi_nsf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_motivasi_nsf_teater += $item['bobot_teater'];
                        $total_bobot_motivasi_nsf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_motivasi_nsf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_motivasi_nsf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_motivasi_nsf_kir += $item['bobot_kir'];
                    }elseif ($item['nama_kriteria'] == 'Karakteristik' && $item['faktor'] == 'NSF') {
                        $jumlah_nsf_karakteristik++;
                
                        // Menambahkan bobot untuk setiap ekskul pada kategori Karakteristik (NSF)
                        $total_bobot_karakteristik_nsf_rohis += $item['bobot_rohis'];
                        $total_bobot_karakteristik_nsf_paskibra += $item['bobot_paskibra'];
                        $total_bobot_karakteristik_nsf_pmr += $item['bobot_pmr'];
                        $total_bobot_karakteristik_nsf_pramuka += $item['bobot_pramuka'];
                        $total_bobot_karakteristik_nsf_kabar_15 += $item['bobot_kabar_15'];
                        $total_bobot_karakteristik_nsf_japanese_club += $item['bobot_japanese_club'];
                        $total_bobot_karakteristik_nsf_osis += $item['bobot_osis'];
                        $total_bobot_karakteristik_nsf_basket += $item['bobot_basket'];
                        $total_bobot_karakteristik_nsf_badminton += $item['bobot_badminton'];
                        $total_bobot_karakteristik_nsf_voli += $item['bobot_voli'];
                        $total_bobot_karakteristik_nsf_sepak_bola += $item['bobot_sepak_bola'];
                        $total_bobot_karakteristik_nsf_futsal += $item['bobot_futsal'];
                        $total_bobot_karakteristik_nsf_seni_suara += $item['bobot_seni_suara'];
                        $total_bobot_karakteristik_nsf_tari_saman += $item['bobot_tari_saman'];
                        $total_bobot_karakteristik_nsf_tari_lenggang_cisadane += $item['bobot_tari_lenggang_cisadane'];
                        $total_bobot_karakteristik_nsf_teater += $item['bobot_teater'];
                        $total_bobot_karakteristik_nsf_taekwondo += $item['bobot_taekwondo'];
                        $total_bobot_karakteristik_nsf_bela_diri_matahari += $item['bobot_bela_diri_matahari'];
                        $total_bobot_karakteristik_nsf_canda_birawa += $item['bobot_canda_birawa'];
                        $total_bobot_karakteristik_nsf_kir += $item['bobot_kir'];
                    }
                }
            //hitung kriteria akademik untuk nilai ncf dan nsf 

            // Menghitung nilai NCF untuk setiap ekskul berdasarkan total bobot dan jumlah NCF minat
                $ncf_minat_rohis = $total_bobot_minat_ncf_rohis / $jumlah_ncf_minat;
                $ncf_minat_paskibra = $total_bobot_minat_ncf_paskibra / $jumlah_ncf_minat;
                $ncf_minat_pmr = $total_bobot_minat_ncf_pmr / $jumlah_ncf_minat;
                $ncf_minat_pramuka = $total_bobot_minat_ncf_pramuka / $jumlah_ncf_minat;
                $ncf_minat_kabar_15 = $total_bobot_minat_ncf_kabar_15 / $jumlah_ncf_minat;
                $ncf_minat_japanese_club = $total_bobot_minat_ncf_japanese_club / $jumlah_ncf_minat;
                $ncf_minat_osis = $total_bobot_minat_ncf_osis / $jumlah_ncf_minat;
                $ncf_minat_basket = $total_bobot_minat_ncf_basket / $jumlah_ncf_minat;
                $ncf_minat_badminton = $total_bobot_minat_ncf_badminton / $jumlah_ncf_minat;
                $ncf_minat_voli = $total_bobot_minat_ncf_voli / $jumlah_ncf_minat;
                $ncf_minat_sepak_bola = $total_bobot_minat_ncf_sepak_bola / $jumlah_ncf_minat;
                $ncf_minat_futsal = $total_bobot_minat_ncf_futsal / $jumlah_ncf_minat;
                $ncf_minat_seni_suara = $total_bobot_minat_ncf_seni_suara / $jumlah_ncf_minat;
                $ncf_minat_tari_saman = $total_bobot_minat_ncf_tari_saman / $jumlah_ncf_minat;
                $ncf_minat_tari_lenggang_cisadane = $total_bobot_minat_ncf_tari_lenggang_cisadane / $jumlah_ncf_minat;
                $ncf_minat_teater = $total_bobot_minat_ncf_teater / $jumlah_ncf_minat;
                $ncf_minat_taekwondo = $total_bobot_minat_ncf_taekwondo / $jumlah_ncf_minat;
                $ncf_minat_bela_diri_matahari = $total_bobot_minat_ncf_bela_diri_matahari / $jumlah_ncf_minat;
                $ncf_minat_canda_birawa = $total_bobot_minat_ncf_canda_birawa / $jumlah_ncf_minat;
                $ncf_minat_kir = $total_bobot_minat_ncf_kir / $jumlah_ncf_minat;
                // Menghitung nilai NSF untuk setiap ekskul berdasarkan total bobot dan jumlah NSF minat
                $nsf_minat_rohis = $total_bobot_minat_nsf_rohis / $jumlah_nsf_minat;
                $nsf_minat_paskibra = $total_bobot_minat_nsf_paskibra / $jumlah_nsf_minat;
                $nsf_minat_pmr = $total_bobot_minat_nsf_pmr / $jumlah_nsf_minat;
                $nsf_minat_pramuka = $total_bobot_minat_nsf_pramuka / $jumlah_nsf_minat;
                $nsf_minat_kabar_15 = $total_bobot_minat_nsf_kabar_15 / $jumlah_nsf_minat;
                $nsf_minat_japanese_club = $total_bobot_minat_nsf_japanese_club / $jumlah_nsf_minat;
                $nsf_minat_osis = $total_bobot_minat_nsf_osis / $jumlah_nsf_minat;
                $nsf_minat_basket = $total_bobot_minat_nsf_basket / $jumlah_nsf_minat;
                $nsf_minat_badminton = $total_bobot_minat_nsf_badminton / $jumlah_nsf_minat;
                $nsf_minat_voli = $total_bobot_minat_nsf_voli / $jumlah_nsf_minat;
                $nsf_minat_sepak_bola = $total_bobot_minat_nsf_sepak_bola / $jumlah_nsf_minat;
                $nsf_minat_futsal = $total_bobot_minat_nsf_futsal / $jumlah_nsf_minat;
                $nsf_minat_seni_suara = $total_bobot_minat_nsf_seni_suara / $jumlah_nsf_minat;
                $nsf_minat_tari_saman = $total_bobot_minat_nsf_tari_saman / $jumlah_nsf_minat;
                $nsf_minat_tari_lenggang_cisadane = $total_bobot_minat_nsf_tari_lenggang_cisadane / $jumlah_nsf_minat;
                $nsf_minat_teater = $total_bobot_minat_nsf_teater / $jumlah_nsf_minat;
                $nsf_minat_taekwondo = $total_bobot_minat_nsf_taekwondo / $jumlah_nsf_minat;
                $nsf_minat_bela_diri_matahari = $total_bobot_minat_nsf_bela_diri_matahari / $jumlah_nsf_minat;
                $nsf_minat_canda_birawa = $total_bobot_minat_nsf_canda_birawa / $jumlah_nsf_minat;
                $nsf_minat_kir = $total_bobot_minat_nsf_kir / $jumlah_nsf_minat;
                // Menghitung nilai NCF untuk Kemampuan setiap ekskul berdasarkan total bobot dan jumlah NCF kemampuan
                
                    $ncf_kemampuan_rohis = $total_bobot_kemampuan_ncf_rohis / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_paskibra = $total_bobot_kemampuan_ncf_paskibra / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_pmr = $total_bobot_kemampuan_ncf_pmr / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_pramuka = $total_bobot_kemampuan_ncf_pramuka / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_kabar_15 = $total_bobot_kemampuan_ncf_kabar_15 / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_japanese_club = $total_bobot_kemampuan_ncf_japanese_club / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_osis = $total_bobot_kemampuan_ncf_osis / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_basket = $total_bobot_kemampuan_ncf_basket / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_badminton = $total_bobot_kemampuan_ncf_badminton / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_voli = $total_bobot_kemampuan_ncf_voli / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_sepak_bola = $total_bobot_kemampuan_ncf_sepak_bola / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_futsal = $total_bobot_kemampuan_ncf_futsal / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_seni_suara = $total_bobot_kemampuan_ncf_seni_suara / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_tari_saman = $total_bobot_kemampuan_ncf_tari_saman / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_tari_lenggang_cisadane = $total_bobot_kemampuan_ncf_tari_lenggang_cisadane / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_teater = $total_bobot_kemampuan_ncf_teater / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_taekwondo = $total_bobot_kemampuan_ncf_taekwondo / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_bela_diri_matahari = $total_bobot_kemampuan_ncf_bela_diri_matahari / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_canda_birawa = $total_bobot_kemampuan_ncf_canda_birawa / $jumlah_ncf_kemampuan;
                    $ncf_kemampuan_kir = $total_bobot_kemampuan_ncf_kir / $jumlah_ncf_kemampuan;
                
                    $nsf_kemampuan_rohis = $total_bobot_kemampuan_nsf_rohis / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_paskibra = $total_bobot_kemampuan_nsf_paskibra / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_pmr = $total_bobot_kemampuan_nsf_pmr / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_pramuka = $total_bobot_kemampuan_nsf_pramuka / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_kabar_15 = $total_bobot_kemampuan_nsf_kabar_15 / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_japanese_club = $total_bobot_kemampuan_nsf_japanese_club / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_osis = $total_bobot_kemampuan_nsf_osis / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_basket = $total_bobot_kemampuan_nsf_basket / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_badminton = $total_bobot_kemampuan_nsf_badminton / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_voli = $total_bobot_kemampuan_nsf_voli / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_sepak_bola = $total_bobot_kemampuan_nsf_sepak_bola / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_futsal = $total_bobot_kemampuan_nsf_futsal / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_seni_suara = $total_bobot_kemampuan_nsf_seni_suara / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_tari_saman = $total_bobot_kemampuan_nsf_tari_saman / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_tari_lenggang_cisadane = $total_bobot_kemampuan_nsf_tari_lenggang_cisadane / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_teater = $total_bobot_kemampuan_nsf_teater / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_taekwondo = $total_bobot_kemampuan_nsf_taekwondo / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_bela_diri_matahari = $total_bobot_kemampuan_nsf_bela_diri_matahari / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_canda_birawa = $total_bobot_kemampuan_nsf_canda_birawa / $jumlah_nsf_kemampuan;
                    $nsf_kemampuan_kir = $total_bobot_kemampuan_nsf_kir / $jumlah_nsf_kemampuan;
                    
                    $ncf_waktu_rohis = $total_bobot_waktu_ncf_rohis / $jumlah_ncf_waktu;
                    $ncf_waktu_paskibra = $total_bobot_waktu_ncf_paskibra / $jumlah_ncf_waktu;
                    $ncf_waktu_pmr = $total_bobot_waktu_ncf_pmr / $jumlah_ncf_waktu;
                    $ncf_waktu_pramuka = $total_bobot_waktu_ncf_pramuka / $jumlah_ncf_waktu;
                    $ncf_waktu_kabar_15 = $total_bobot_waktu_ncf_kabar_15 / $jumlah_ncf_waktu;
                    $ncf_waktu_japanese_club = $total_bobot_waktu_ncf_japanese_club / $jumlah_ncf_waktu;
                    $ncf_waktu_osis = $total_bobot_waktu_ncf_osis / $jumlah_ncf_waktu;
                    $ncf_waktu_basket = $total_bobot_waktu_ncf_basket / $jumlah_ncf_waktu;
                    $ncf_waktu_badminton = $total_bobot_waktu_ncf_badminton / $jumlah_ncf_waktu;
                    $ncf_waktu_voli = $total_bobot_waktu_ncf_voli / $jumlah_ncf_waktu;
                    $ncf_waktu_sepak_bola = $total_bobot_waktu_ncf_sepak_bola / $jumlah_ncf_waktu;
                    $ncf_waktu_futsal = $total_bobot_waktu_ncf_futsal / $jumlah_ncf_waktu;
                    $ncf_waktu_seni_suara = $total_bobot_waktu_ncf_seni_suara / $jumlah_ncf_waktu;
                    $ncf_waktu_tari_saman = $total_bobot_waktu_ncf_tari_saman / $jumlah_ncf_waktu;
                    $ncf_waktu_tari_lenggang_cisadane = $total_bobot_waktu_ncf_tari_lenggang_cisadane / $jumlah_ncf_waktu;
                    $ncf_waktu_teater = $total_bobot_waktu_ncf_teater / $jumlah_ncf_waktu;
                    $ncf_waktu_taekwondo = $total_bobot_waktu_ncf_taekwondo / $jumlah_ncf_waktu;
                    $ncf_waktu_bela_diri_matahari = $total_bobot_waktu_ncf_bela_diri_matahari / $jumlah_ncf_waktu;
                    $ncf_waktu_canda_birawa = $total_bobot_waktu_ncf_canda_birawa / $jumlah_ncf_waktu;
                    $ncf_waktu_kir = $total_bobot_waktu_ncf_kir / $jumlah_ncf_waktu;
            

                    $nsf_waktu_rohis = $total_bobot_waktu_nsf_rohis / $jumlah_nsf_waktu;
                    $nsf_waktu_paskibra = $total_bobot_waktu_nsf_paskibra / $jumlah_nsf_waktu;
                    $nsf_waktu_pmr = $total_bobot_waktu_nsf_pmr / $jumlah_nsf_waktu;
                    $nsf_waktu_pramuka = $total_bobot_waktu_nsf_pramuka / $jumlah_nsf_waktu;
                    $nsf_waktu_kabar_15 = $total_bobot_waktu_nsf_kabar_15 / $jumlah_nsf_waktu;
                    $nsf_waktu_japanese_club = $total_bobot_waktu_nsf_japanese_club / $jumlah_nsf_waktu;
                    $nsf_waktu_osis = $total_bobot_waktu_nsf_osis / $jumlah_nsf_waktu;
                    $nsf_waktu_basket = $total_bobot_waktu_nsf_basket / $jumlah_nsf_waktu;
                    $nsf_waktu_badminton = $total_bobot_waktu_nsf_badminton / $jumlah_nsf_waktu;
                    $nsf_waktu_voli = $total_bobot_waktu_nsf_voli / $jumlah_nsf_waktu;
                    $nsf_waktu_sepak_bola = $total_bobot_waktu_nsf_sepak_bola / $jumlah_nsf_waktu;
                    $nsf_waktu_futsal = $total_bobot_waktu_nsf_futsal / $jumlah_nsf_waktu;
                    $nsf_waktu_seni_suara = $total_bobot_waktu_nsf_seni_suara / $jumlah_nsf_waktu;
                    $nsf_waktu_tari_saman = $total_bobot_waktu_nsf_tari_saman / $jumlah_nsf_waktu;
                    $nsf_waktu_tari_lenggang_cisadane = $total_bobot_waktu_nsf_tari_lenggang_cisadane / $jumlah_nsf_waktu;
                    $nsf_waktu_teater = $total_bobot_waktu_nsf_teater / $jumlah_nsf_waktu;
                    $nsf_waktu_taekwondo = $total_bobot_waktu_nsf_taekwondo / $jumlah_nsf_waktu;
                    $nsf_waktu_bela_diri_matahari = $total_bobot_waktu_nsf_bela_diri_matahari / $jumlah_nsf_waktu;
                    $nsf_waktu_canda_birawa = $total_bobot_waktu_nsf_canda_birawa / $jumlah_nsf_waktu;
                    $nsf_waktu_kir = $total_bobot_waktu_nsf_kir / $jumlah_nsf_waktu;
               
               
                    $ncf_motivasi_rohis = $total_bobot_motivasi_ncf_rohis / $jumlah_ncf_motivasi;
                    $ncf_motivasi_paskibra = $total_bobot_motivasi_ncf_paskibra / $jumlah_ncf_motivasi;
                    $ncf_motivasi_pmr = $total_bobot_motivasi_ncf_pmr / $jumlah_ncf_motivasi;
                    $ncf_motivasi_pramuka = $total_bobot_motivasi_ncf_pramuka / $jumlah_ncf_motivasi;
                    $ncf_motivasi_kabar_15 = $total_bobot_motivasi_ncf_kabar_15 / $jumlah_ncf_motivasi;
                    $ncf_motivasi_japanese_club = $total_bobot_motivasi_ncf_japanese_club / $jumlah_ncf_motivasi;
                    $ncf_motivasi_osis = $total_bobot_motivasi_ncf_osis / $jumlah_ncf_motivasi;
                    $ncf_motivasi_basket = $total_bobot_motivasi_ncf_basket / $jumlah_ncf_motivasi;
                    $ncf_motivasi_badminton = $total_bobot_motivasi_ncf_badminton / $jumlah_ncf_motivasi;
                    $ncf_motivasi_voli = $total_bobot_motivasi_ncf_voli / $jumlah_ncf_motivasi;
                    $ncf_motivasi_sepak_bola = $total_bobot_motivasi_ncf_sepak_bola / $jumlah_ncf_motivasi;
                    $ncf_motivasi_futsal = $total_bobot_motivasi_ncf_futsal / $jumlah_ncf_motivasi;
                    $ncf_motivasi_seni_suara = $total_bobot_motivasi_ncf_seni_suara / $jumlah_ncf_motivasi;
                    $ncf_motivasi_tari_saman = $total_bobot_motivasi_ncf_tari_saman / $jumlah_ncf_motivasi;
                    $ncf_motivasi_tari_lenggang_cisadane = $total_bobot_motivasi_ncf_tari_lenggang_cisadane / $jumlah_ncf_motivasi;
                    $ncf_motivasi_teater = $total_bobot_motivasi_ncf_teater / $jumlah_ncf_motivasi;
                    $ncf_motivasi_taekwondo = $total_bobot_motivasi_ncf_taekwondo / $jumlah_ncf_motivasi;
                    $ncf_motivasi_bela_diri_matahari = $total_bobot_motivasi_ncf_bela_diri_matahari / $jumlah_ncf_motivasi;
                    $ncf_motivasi_canda_birawa = $total_bobot_motivasi_ncf_canda_birawa / $jumlah_ncf_motivasi;
                    $ncf_motivasi_kir = $total_bobot_motivasi_ncf_kir / $jumlah_ncf_motivasi;
                
                
                
                    $nsf_motivasi_rohis = $total_bobot_motivasi_nsf_rohis / $jumlah_nsf_motivasi;
                    $nsf_motivasi_paskibra = $total_bobot_motivasi_nsf_paskibra / $jumlah_nsf_motivasi;
                    $nsf_motivasi_pmr = $total_bobot_motivasi_nsf_pmr / $jumlah_nsf_motivasi;
                    $nsf_motivasi_pramuka = $total_bobot_motivasi_nsf_pramuka / $jumlah_nsf_motivasi;
                    $nsf_motivasi_kabar_15 = $total_bobot_motivasi_nsf_kabar_15 / $jumlah_nsf_motivasi;
                    $nsf_motivasi_japanese_club = $total_bobot_motivasi_nsf_japanese_club / $jumlah_nsf_motivasi;
                    $nsf_motivasi_osis = $total_bobot_motivasi_nsf_osis / $jumlah_nsf_motivasi;
                    $nsf_motivasi_basket = $total_bobot_motivasi_nsf_basket / $jumlah_nsf_motivasi;
                    $nsf_motivasi_badminton = $total_bobot_motivasi_nsf_badminton / $jumlah_nsf_motivasi;
                    $nsf_motivasi_voli = $total_bobot_motivasi_nsf_voli / $jumlah_nsf_motivasi;
                    $nsf_motivasi_sepak_bola = $total_bobot_motivasi_nsf_sepak_bola / $jumlah_nsf_motivasi;
                    $nsf_motivasi_futsal = $total_bobot_motivasi_nsf_futsal / $jumlah_nsf_motivasi;
                    $nsf_motivasi_seni_suara = $total_bobot_motivasi_nsf_seni_suara / $jumlah_nsf_motivasi;
                    $nsf_motivasi_tari_saman = $total_bobot_motivasi_nsf_tari_saman / $jumlah_nsf_motivasi;
                    $nsf_motivasi_tari_lenggang_cisadane = $total_bobot_motivasi_nsf_tari_lenggang_cisadane / $jumlah_nsf_motivasi;
                    $nsf_motivasi_teater = $total_bobot_motivasi_nsf_teater / $jumlah_nsf_motivasi;
                    $nsf_motivasi_taekwondo = $total_bobot_motivasi_nsf_taekwondo / $jumlah_nsf_motivasi;
                    $nsf_motivasi_bela_diri_matahari = $total_bobot_motivasi_nsf_bela_diri_matahari / $jumlah_nsf_motivasi;
                    $nsf_motivasi_canda_birawa = $total_bobot_motivasi_nsf_canda_birawa / $jumlah_nsf_motivasi;
                    $nsf_motivasi_kir = $total_bobot_motivasi_nsf_kir / $jumlah_nsf_motivasi;
                
                    $ncf_karakteristik_rohis = $total_bobot_karakteristik_ncf_rohis / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_paskibra = $total_bobot_karakteristik_ncf_paskibra / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_pmr = $total_bobot_karakteristik_ncf_pmr / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_pramuka = $total_bobot_karakteristik_ncf_pramuka / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_kabar_15 = $total_bobot_karakteristik_ncf_kabar_15 / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_japanese_club = $total_bobot_karakteristik_ncf_japanese_club / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_osis = $total_bobot_karakteristik_ncf_osis / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_basket = $total_bobot_karakteristik_ncf_basket / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_badminton = $total_bobot_karakteristik_ncf_badminton / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_voli = $total_bobot_karakteristik_ncf_voli / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_sepak_bola = $total_bobot_karakteristik_ncf_sepak_bola / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_futsal = $total_bobot_karakteristik_ncf_futsal / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_seni_suara = $total_bobot_karakteristik_ncf_seni_suara / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_tari_saman = $total_bobot_karakteristik_ncf_tari_saman / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_tari_lenggang_cisadane = $total_bobot_karakteristik_ncf_tari_lenggang_cisadane / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_teater = $total_bobot_karakteristik_ncf_teater / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_taekwondo = $total_bobot_karakteristik_ncf_taekwondo / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_bela_diri_matahari = $total_bobot_karakteristik_ncf_bela_diri_matahari / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_canda_birawa = $total_bobot_karakteristik_ncf_canda_birawa / $jumlah_ncf_karakteristik;
                    $ncf_karakteristik_kir = $total_bobot_karakteristik_ncf_kir / $jumlah_ncf_karakteristik;
                
              
                    $nsf_karakteristik_rohis = $total_bobot_karakteristik_nsf_rohis / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_paskibra = $total_bobot_karakteristik_nsf_paskibra / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_pmr = $total_bobot_karakteristik_nsf_pmr / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_pramuka = $total_bobot_karakteristik_nsf_pramuka / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_kabar_15 = $total_bobot_karakteristik_nsf_kabar_15 / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_japanese_club = $total_bobot_karakteristik_nsf_japanese_club / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_osis = $total_bobot_karakteristik_nsf_osis / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_basket = $total_bobot_karakteristik_nsf_basket / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_badminton = $total_bobot_karakteristik_nsf_badminton / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_voli = $total_bobot_karakteristik_nsf_voli / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_sepak_bola = $total_bobot_karakteristik_nsf_sepak_bola / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_futsal = $total_bobot_karakteristik_nsf_futsal / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_seni_suara = $total_bobot_karakteristik_nsf_seni_suara / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_tari_saman = $total_bobot_karakteristik_nsf_tari_saman / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_tari_lenggang_cisadane = $total_bobot_karakteristik_nsf_tari_lenggang_cisadane / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_teater = $total_bobot_karakteristik_nsf_teater / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_taekwondo = $total_bobot_karakteristik_nsf_taekwondo / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_bela_diri_matahari = $total_bobot_karakteristik_nsf_bela_diri_matahari / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_canda_birawa = $total_bobot_karakteristik_nsf_canda_birawa / $jumlah_nsf_karakteristik;
                    $nsf_karakteristik_kir = $total_bobot_karakteristik_nsf_kir / $jumlah_nsf_karakteristik;
                
                

                // ROHIS (Rohani Islam)
                $n1_rohis = ($ncf_minat_rohis * 0.6) + ($nsf_minat_rohis * 0.4);
                $n2_rohis = ($ncf_kemampuan_rohis * 0.6) + ($nsf_kemampuan_rohis * 0.4);
                $n3_rohis = $ncf_waktu_rohis;
                $n4_rohis = ($ncf_motivasi_rohis * 0.6) + ($nsf_motivasi_rohis * 0.4);
                $n5_rohis = ($ncf_karakteristik_rohis * 0.6) + ($nsf_karakteristik_rohis * 0.4);

                // PASKIBRA (Pasukan Pengibar Bendera)
                $n1_paskibra = ($ncf_minat_paskibra * 0.6) + ($nsf_minat_paskibra * 0.4);
                $n2_paskibra = ($ncf_kemampuan_paskibra * 0.6) + ($nsf_kemampuan_paskibra * 0.4);
                $n3_paskibra = $ncf_waktu_paskibra;
                $n4_paskibra = ($ncf_motivasi_paskibra * 0.6) + ($nsf_motivasi_paskibra * 0.4);
                $n5_paskibra = ($ncf_karakteristik_paskibra * 0.6) + ($nsf_karakteristik_paskibra * 0.4);

                // PMR (Palang Merah Remaja)
                $n1_pmr = ($ncf_minat_pmr * 0.6) + ($nsf_minat_pmr * 0.4);
                $n2_pmr = ($ncf_kemampuan_pmr * 0.6) + ($nsf_kemampuan_pmr * 0.4);
                $n3_pmr = $ncf_waktu_pmr;
                $n4_pmr = ($ncf_motivasi_pmr * 0.6) + ($nsf_motivasi_pmr * 0.4);
                $n5_pmr = ($ncf_karakteristik_pmr * 0.6) + ($nsf_karakteristik_pmr * 0.4);

                // PRAMUKA
                $n1_pramuka = ($ncf_minat_pramuka * 0.6) + ($nsf_minat_pramuka * 0.4);
                $n2_pramuka = ($ncf_kemampuan_pramuka * 0.6) + ($nsf_kemampuan_pramuka * 0.4);
                $n3_pramuka = $ncf_waktu_pramuka;
                $n4_pramuka = ($ncf_motivasi_pramuka * 0.6) + ($nsf_motivasi_pramuka * 0.4);
                $n5_pramuka = ($ncf_karakteristik_pramuka * 0.6) + ($nsf_karakteristik_pramuka * 0.4);

                // KABAR 15
                $n1_kabar_15 = ($ncf_minat_kabar_15 * 0.6) + ($nsf_minat_kabar_15 * 0.4);
                $n2_kabar_15 = ($ncf_kemampuan_kabar_15 * 0.6) + ($nsf_kemampuan_kabar_15 * 0.4);
                $n3_kabar_15 = $ncf_waktu_kabar_15;
                $n4_kabar_15 = ($ncf_motivasi_kabar_15 * 0.6) + ($nsf_motivasi_kabar_15 * 0.4);
                $n5_kabar_15 = ($ncf_karakteristik_kabar_15 * 0.6) + ($nsf_karakteristik_kabar_15 * 0.4);

                // JAPANESE CLUB
                $n1_japanese_club = ($ncf_minat_japanese_club  * 0.6) + ($nsf_minat_japanese_club * 0.4);
                $n2_japanese_club = ($ncf_kemampuan_japanese_club * 0.6) + ($nsf_kemampuan_japanese_club * 0.4);
                $n3_japanese_club = $ncf_waktu_japanese_club;
                $n4_japanese_club = ($ncf_motivasi_japanese_club * 0.6) + ($nsf_motivasi_japanese_club * 0.4);
                $n5_japanese_club = ($ncf_karakteristik_japanese_club * 0.6) + ($nsf_karakteristik_japanese_club * 0.4);

                // OSIS (Organisasi Siswa Intra Sekolah)
                $n1_osis = ($ncf_minat_osis * 0.6) + ($nsf_minat_osis * 0.4);
                $n2_osis = ($ncf_kemampuan_osis * 0.6) + ($nsf_kemampuan_osis * 0.4);
                $n3_osis = $ncf_waktu_osis;
                $n4_osis = ($ncf_motivasi_osis * 0.6) + ($nsf_motivasi_osis * 0.4);
                $n5_osis = ($ncf_karakteristik_osis * 0.6) + ($nsf_karakteristik_osis * 0.4);

                // BASKET
                $n1_basket = ($ncf_minat_basket * 0.6) + ($nsf_minat_basket * 0.4);
                $n2_basket = ($ncf_kemampuan_basket * 0.6) + ($nsf_kemampuan_basket * 0.4);
                $n3_basket = $ncf_waktu_basket;
                $n4_basket = ($ncf_motivasi_basket * 0.6) + ($nsf_motivasi_basket * 0.4);
                $n5_basket = ($ncf_karakteristik_basket * 0.6) + ($nsf_karakteristik_basket * 0.4);

                // BADMINTON
                $n1_badminton = ($ncf_minat_badminton * 0.6) + ($nsf_minat_badminton * 0.4);
                $n2_badminton = ($ncf_kemampuan_badminton * 0.6) + ($nsf_kemampuan_badminton * 0.4);
                $n3_badminton = $ncf_waktu_badminton;
                $n4_badminton = ($ncf_motivasi_badminton * 0.6) + ($nsf_motivasi_badminton * 0.4);
                $n5_badminton = ($ncf_karakteristik_badminton * 0.6) + ($nsf_karakteristik_badminton * 0.4);

                // VOLI (Volleyball)
                $n1_voli = ($ncf_minat_voli  * 0.6) + ($nsf_minat_voli  * 0.4);
                $n2_voli = ($ncf_kemampuan_voli * 0.6) + ($nsf_kemampuan_voli * 0.4);
                $n3_voli = $ncf_waktu_voli;
                $n4_voli = ($ncf_motivasi_voli * 0.6) + ($nsf_motivasi_voli * 0.4);
                $n5_voli = ($ncf_karakteristik_voli * 0.6) + ($nsf_karakteristik_voli * 0.4);

                // SEPAK BOLA
                $n1_sepak_bola = ($ncf_minat_sepak_bola  * 0.6) + ($nsf_minat_sepak_bola  * 0.4);
                $n2_sepak_bola = ($ncf_kemampuan_sepak_bola * 0.6) + ($nsf_kemampuan_sepak_bola * 0.4);
                $n3_sepak_bola = $ncf_waktu_sepak_bola;
                $n4_sepak_bola = ($ncf_motivasi_sepak_bola * 0.6) + ($nsf_motivasi_sepak_bola * 0.4);
                $n5_sepak_bola = ($ncf_karakteristik_sepak_bola * 0.6) + ($nsf_karakteristik_sepak_bola * 0.4);

                // FUTSAL
                $n1_futsal = ($ncf_minat_futsal  * 0.6) + ($nsf_minat_futsal  * 0.4);
                $n2_futsal = ($ncf_kemampuan_futsal * 0.6) + ($nsf_kemampuan_futsal * 0.4);
                $n3_futsal = $ncf_waktu_futsal;
                $n4_futsal = ($ncf_motivasi_futsal * 0.6) + ($nsf_motivasi_futsal * 0.4);
                $n5_futsal = ($ncf_karakteristik_futsal * 0.6) + ($nsf_karakteristik_futsal * 0.4);

                // SENI SUARA
                $n1_seni_suara = ($ncf_minat_seni_suara  * 0.6) + ($nsf_minat_seni_suara  * 0.4);
                $n2_seni_suara = ($ncf_kemampuan_seni_suara * 0.6) + ($nsf_kemampuan_seni_suara * 0.4);
                $n3_seni_suara = $ncf_waktu_seni_suara;
                $n4_seni_suara = ($ncf_motivasi_seni_suara * 0.6) + ($nsf_motivasi_seni_suara * 0.4);
                $n5_seni_suara = ($ncf_karakteristik_seni_suara * 0.6) + ($nsf_karakteristik_seni_suara * 0.4);

                // TARI SAMAN
                $n1_tari_saman = ($ncf_minat_tari_saman  * 0.6) + ($nsf_minat_tari_saman  * 0.4);
                $n2_tari_saman = ($ncf_kemampuan_tari_saman * 0.6) + ($nsf_kemampuan_tari_saman * 0.4);
                $n3_tari_saman = $ncf_waktu_tari_saman;
                $n4_tari_saman = ($ncf_motivasi_tari_saman * 0.6) + ($nsf_motivasi_tari_saman * 0.4);
                $n5_tari_saman = ($ncf_karakteristik_tari_saman * 0.6) + ($nsf_karakteristik_tari_saman * 0.4);

                // TARI LENGGANG CISADANE
                $n1_tari_lenggang_cisadane = ($ncf_minat_tari_lenggang_cisadane  * 0.6) + ($nsf_minat_tari_lenggang_cisadane  * 0.4);
                $n2_tari_lenggang_cisadane = ($ncf_kemampuan_tari_lenggang_cisadane * 0.6) + ($nsf_kemampuan_tari_lenggang_cisadane * 0.4);
                $n3_tari_lenggang_cisadane = $ncf_waktu_tari_lenggang_cisadane;
                $n4_tari_lenggang_cisadane = ($ncf_motivasi_tari_lenggang_cisadane * 0.6) + ($nsf_motivasi_tari_lenggang_cisadane * 0.4);
                $n5_tari_lenggang_cisadane = ($ncf_karakteristik_tari_lenggang_cisadane * 0.6) + ($nsf_karakteristik_tari_lenggang_cisadane * 0.4);

                // TEATER
                $n1_teater = ($ncf_minat_teater  * 0.6) + ($nsf_minat_teater  * 0.4);
                $n2_teater = ($ncf_kemampuan_teater * 0.6) + ($nsf_kemampuan_teater * 0.4);
                $n3_teater = $ncf_waktu_teater;
                $n4_teater = ($ncf_motivasi_teater * 0.6) + ($nsf_motivasi_teater * 0.4);
                $n5_teater = ($ncf_karakteristik_teater * 0.6) + ($nsf_karakteristik_teater * 0.4);

                // TAEKWONDO
                $n1_taekwondo = ($ncf_minat_taekwondo  * 0.6) + ($nsf_minat_taekwondo  * 0.4);
                $n2_taekwondo = ($ncf_kemampuan_taekwondo * 0.6) + ($nsf_kemampuan_taekwondo * 0.4);
                $n3_taekwondo = $ncf_waktu_taekwondo;
                $n4_taekwondo = ($ncf_motivasi_taekwondo * 0.6) + ($nsf_motivasi_taekwondo * 0.4);
                $n5_taekwondo = ($ncf_karakteristik_taekwondo * 0.6) + ($nsf_karakteristik_taekwondo * 0.4);

                // BELA DIRI MATAHARI
                $n1_bela_diri_matahari = ($ncf_minat_bela_diri_matahari  * 0.6) + ($nsf_minat_bela_diri_matahari  * 0.4);
                $n2_bela_diri_matahari = ($ncf_kemampuan_bela_diri_matahari * 0.6) + ($nsf_kemampuan_bela_diri_matahari * 0.4);
                $n3_bela_diri_matahari = $ncf_waktu_bela_diri_matahari;
                $n4_bela_diri_matahari = ($ncf_motivasi_bela_diri_matahari * 0.6) + ($nsf_motivasi_bela_diri_matahari * 0.4);
                $n5_bela_diri_matahari = ($ncf_karakteristik_bela_diri_matahari * 0.6) + ($nsf_karakteristik_bela_diri_matahari * 0.4);

                // CANDA BIRAWA
                $n1_canda_birawa = ($ncf_minat_canda_birawa  * 0.6) + ($nsf_minat_canda_birawa  * 0.4);
                $n2_canda_birawa = ($ncf_kemampuan_canda_birawa * 0.6) + ($nsf_kemampuan_canda_birawa * 0.4);
                $n3_canda_birawa = $ncf_waktu_canda_birawa;
                $n4_canda_birawa = ($ncf_motivasi_canda_birawa * 0.6) + ($nsf_motivasi_canda_birawa * 0.4);
                $n5_canda_birawa = ($ncf_karakteristik_canda_birawa * 0.6) + ($nsf_karakteristik_canda_birawa * 0.4);

                // KIR (Karya Ilmiah Remaja)
                $n1_kir = ($ncf_minat_kir  * 0.6) + ($nsf_minat_kir  * 0.4);
                $n2_kir = ($ncf_kemampuan_kir * 0.6) + ($nsf_kemampuan_kir * 0.4);
                $n3_kir = $ncf_waktu_kir;
                $n4_kir = ($ncf_motivasi_kir * 0.6) + ($nsf_motivasi_kir * 0.4);
                $n5_kir = ($ncf_karakteristik_kir * 0.6) + ($nsf_karakteristik_kir * 0.4);

                $hasil_rohis = $n1_rohis + $n2_rohis + $n3_rohis + $n4_rohis + $n5_rohis;
                $hasil_paskibra = $n1_paskibra + $n2_paskibra + $n3_paskibra + $n4_paskibra + $n5_paskibra;
                $hasil_pmr = $n1_pmr + $n2_pmr + $n3_pmr + $n4_pmr + $n5_pmr;
                $hasil_pramuka = $n1_pramuka + $n2_pramuka + $n3_pramuka + $n4_pramuka + $n5_pramuka;
                $hasil_kabar_15 = $n1_kabar_15 + $n2_kabar_15 + $n3_kabar_15 + $n4_kabar_15 + $n5_kabar_15;
                $hasil_japanese_club = $n1_japanese_club + $n2_japanese_club + $n3_japanese_club + $n4_japanese_club + $n5_japanese_club;
                $hasil_osis = $n1_osis + $n2_osis + $n3_osis + $n4_osis + $n5_osis;
                $hasil_basket = $n1_basket + $n2_basket + $n3_basket + $n4_basket + $n5_basket;
                $hasil_badminton = $n1_badminton + $n2_badminton + $n3_badminton + $n4_badminton + $n5_badminton;
                $hasil_voli = $n1_voli + $n2_voli + $n3_voli + $n4_voli + $n5_voli;
                $hasil_sepak_bola = $n1_sepak_bola + $n2_sepak_bola + $n3_sepak_bola + $n4_sepak_bola + $n5_sepak_bola;
                $hasil_futsal = $n1_futsal + $n2_futsal + $n3_futsal + $n4_futsal + $n5_futsal;
                $hasil_seni_suara = $n1_seni_suara + $n2_seni_suara + $n3_seni_suara + $n4_seni_suara + $n5_seni_suara;
                $hasil_tari_saman = $n1_tari_saman + $n2_tari_saman + $n3_tari_saman + $n4_tari_saman + $n5_tari_saman;
                $hasil_tari_lenggang_cisadane = $n1_tari_lenggang_cisadane + $n2_tari_lenggang_cisadane + $n3_tari_lenggang_cisadane + $n4_tari_lenggang_cisadane + $n5_tari_lenggang_cisadane;
                $hasil_teater = $n1_teater + $n2_teater + $n3_teater + $n4_teater + $n5_teater;
                $hasil_taekwondo = $n1_taekwondo + $n2_taekwondo + $n3_taekwondo + $n4_taekwondo + $n5_taekwondo;
                $hasil_bela_diri_matahari = $n1_bela_diri_matahari + $n2_bela_diri_matahari + $n3_bela_diri_matahari + $n4_bela_diri_matahari + $n5_bela_diri_matahari;
                $hasil_canda_birawa = $n1_canda_birawa + $n2_canda_birawa + $n3_canda_birawa + $n4_canda_birawa + $n5_canda_birawa;
                $hasil_kir = $n1_kir + $n2_kir + $n3_kir + $n4_kir + $n5_kir;


// Membuat array yang berisi nama ekstrakurikuler dan nilai totalnya
$ekskul = [
    ['name' => 'rohis', 'total' => $hasil_rohis],
    ['name' => 'paskibra', 'total' => $hasil_paskibra],
    ['name' => 'pmr', 'total' => $hasil_pmr],
    ['name' => 'pramuka', 'total' => $hasil_pramuka],
    ['name' => 'kabar_15', 'total' => $hasil_kabar_15],
    ['name' => 'japanese_club', 'total' => $hasil_japanese_club],
    ['name' => 'osis', 'total' => $hasil_osis],
    ['name' => 'basket', 'total' => $hasil_basket],
    ['name' => 'badminton', 'total' => $hasil_badminton],
    ['name' => 'voli', 'total' => $hasil_voli],
    ['name' => 'sepak_bola', 'total' => $hasil_sepak_bola],
    ['name' => 'futsal', 'total' => $hasil_futsal],
    ['name' => 'seni_suara', 'total' => $hasil_seni_suara],
    ['name' => 'tari_saman', 'total' => $hasil_tari_saman],
    ['name' => 'tari_lenggang_cisadane', 'total' => $hasil_tari_lenggang_cisadane],
    ['name' => 'teater', 'total' => $hasil_teater],
    ['name' => 'taekwondo', 'total' => $hasil_taekwondo],
    ['name' => 'bela_diri_matahari', 'total' => $hasil_bela_diri_matahari],
    ['name' => 'canda_birawa', 'total' => $hasil_canda_birawa],
    ['name' => 'kir', 'total' => $hasil_kir]
];

// Mengurutkan array berdasarkan nilai total secara menurun
usort($ekskul, function($a, $b) {
    return $b['total'] - $a['total']; // Urutkan secara menurun berdasarkan nilai
});

// Mengambil 3 ekstrakurikuler dengan nilai tertinggi
$top_ekskul = array_slice($ekskul, 0, 3);

// Menentukan jurusan berdasarkan 3 ekstrakurikuler teratas
$jurusan = "" . $top_ekskul[0]['name'] . ", " . $top_ekskul[1]['name'] . ", dan " . $top_ekskul[2]['name'];





                $save_profile_matching = "INSERT INTO profile_matching (
                    students_id, 
                    ncf_minat_rohis, nsf_minat_rohis, ncf_kemampuan_rohis, nsf_kemampuan_rohis, 
                    ncf_waktu_rohis, nsf_waktu_rohis, ncf_motivasi_rohis, nsf_motivasi_rohis, 
                    ncf_karakteristik_rohis, nsf_karakteristik_rohis, 
                    n1_rohis, n2_rohis, n3_rohis, n4_rohis, n5_rohis, n_total_rohis,
                
                    ncf_minat_paskibra, nsf_minat_paskibra, ncf_kemampuan_paskibra, nsf_kemampuan_paskibra, 
                    ncf_waktu_paskibra, nsf_waktu_paskibra, ncf_motivasi_paskibra, nsf_motivasi_paskibra, 
                    ncf_karakteristik_paskibra, nsf_karakteristik_paskibra, 
                    n1_paskibra, n2_paskibra, n3_paskibra, n4_paskibra, n5_paskibra, n_total_paskibra,
                
                    ncf_minat_pmr, nsf_minat_pmr, ncf_kemampuan_pmr, nsf_kemampuan_pmr, 
                    ncf_waktu_pmr, nsf_waktu_pmr, ncf_motivasi_pmr, nsf_motivasi_pmr, 
                    ncf_karakteristik_pmr, nsf_karakteristik_pmr, 
                    n1_pmr, n2_pmr, n3_pmr, n4_pmr, n5_pmr, n_total_pmr,
                
                    ncf_minat_pramuka, nsf_minat_pramuka, ncf_kemampuan_pramuka, nsf_kemampuan_pramuka, 
                    ncf_waktu_pramuka, nsf_waktu_pramuka, ncf_motivasi_pramuka, nsf_motivasi_pramuka, 
                    ncf_karakteristik_pramuka, nsf_karakteristik_pramuka, 
                    n1_pramuka, n2_pramuka, n3_pramuka, n4_pramuka, n5_pramuka, n_total_pramuka,
                
                    ncf_minat_kabar_15, nsf_minat_kabar_15, ncf_kemampuan_kabar_15, nsf_kemampuan_kabar_15, 
                    ncf_waktu_kabar_15, nsf_waktu_kabar_15, ncf_motivasi_kabar_15, nsf_motivasi_kabar_15, 
                    ncf_karakteristik_kabar_15, nsf_karakteristik_kabar_15, 
                    n1_kabar_15, n2_kabar_15, n3_kabar_15, n4_kabar_15, n5_kabar_15, n_total_kabar_15,
                
                    ncf_minat_kir, nsf_minat_kir, ncf_kemampuan_kir, nsf_kemampuan_kir, 
                    ncf_waktu_kir, nsf_waktu_kir, ncf_motivasi_kir, nsf_motivasi_kir, 
                    ncf_karakteristik_kir, nsf_karakteristik_kir, 
                    n1_kir, n2_kir, n3_kir, n4_kir, n5_kir, n_total_kir,
                
                    ncf_minat_japanese_club, nsf_minat_japanese_club, ncf_kemampuan_japanese_club, nsf_kemampuan_japanese_club, 
                    ncf_waktu_japanese_club, nsf_waktu_japanese_club, ncf_motivasi_japanese_club, nsf_motivasi_japanese_club, 
                    ncf_karakteristik_japanese_club, nsf_karakteristik_japanese_club, 
                    n1_japanese_club, n2_japanese_club, n3_japanese_club, n4_japanese_club, n5_japanese_club, n_total_japanese_club,
                
                    ncf_minat_osis, nsf_minat_osis, ncf_kemampuan_osis, nsf_kemampuan_osis, 
                    ncf_waktu_osis, nsf_waktu_osis, ncf_motivasi_osis, nsf_motivasi_osis, 
                    ncf_karakteristik_osis, nsf_karakteristik_osis, 
                    n1_osis, n2_osis, n3_osis, n4_osis, n5_osis, n_total_osis,
                
                    ncf_minat_basket, nsf_minat_basket, ncf_kemampuan_basket, nsf_kemampuan_basket, 
                    ncf_waktu_basket, nsf_waktu_basket, ncf_motivasi_basket, nsf_motivasi_basket, 
                    ncf_karakteristik_basket, nsf_karakteristik_basket, 
                    n1_basket, n2_basket, n3_basket, n4_basket, n5_basket, n_total_basket,
                
                    ncf_minat_badminton, nsf_minat_badminton, ncf_kemampuan_badminton, nsf_kemampuan_badminton, 
                    ncf_waktu_badminton, nsf_waktu_badminton, ncf_motivasi_badminton, nsf_motivasi_badminton, 
                    ncf_karakteristik_badminton, nsf_karakteristik_badminton, 
                    n1_badminton, n2_badminton, n3_badminton, n4_badminton, n5_badminton, n_total_badminton,
                
                    ncf_minat_voli, nsf_minat_voli, ncf_kemampuan_voli, nsf_kemampuan_voli, 
                    ncf_waktu_voli, nsf_waktu_voli, ncf_motivasi_voli, nsf_motivasi_voli, 
                    ncf_karakteristik_voli, nsf_karakteristik_voli, 
                    n1_voli, n2_voli, n3_voli, n4_voli, n5_voli, n_total_voli,
                
                    ncf_minat_sepak_bola, nsf_minat_sepak_bola, ncf_kemampuan_sepak_bola, nsf_kemampuan_sepak_bola, 
                    ncf_waktu_sepak_bola, nsf_waktu_sepak_bola, ncf_motivasi_sepak_bola, nsf_motivasi_sepak_bola, 
                    ncf_karakteristik_sepak_bola, nsf_karakteristik_sepak_bola, 
                    n1_sepak_bola, n2_sepak_bola, n3_sepak_bola, n4_sepak_bola, n5_sepak_bola, n_total_sepak_bola,
                
                    ncf_minat_futsal, nsf_minat_futsal, ncf_kemampuan_futsal, nsf_kemampuan_futsal, 
                    ncf_waktu_futsal, nsf_waktu_futsal, ncf_motivasi_futsal, nsf_motivasi_futsal, 
                    ncf_karakteristik_futsal, nsf_karakteristik_futsal, 
                    n1_futsal, n2_futsal, n3_futsal, n4_futsal, n5_futsal, n_total_futsal,
                
                    ncf_minat_seni_suara, nsf_minat_seni_suara, ncf_kemampuan_seni_suara, nsf_kemampuan_seni_suara, 
                    ncf_waktu_seni_suara, nsf_waktu_seni_suara, ncf_motivasi_seni_suara, nsf_motivasi_seni_suara, 
                    ncf_karakteristik_seni_suara, nsf_karakteristik_seni_suara, 
                    n1_seni_suara, n2_seni_suara, n3_seni_suara, n4_seni_suara, n5_seni_suara, n_total_seni_suara,
                
                    ncf_minat_tari_saman, nsf_minat_tari_saman, ncf_kemampuan_tari_saman, nsf_kemampuan_tari_saman, 
                    ncf_waktu_tari_saman, nsf_waktu_tari_saman, ncf_motivasi_tari_saman, nsf_motivasi_tari_saman, 
                    ncf_karakteristik_tari_saman, nsf_karakteristik_tari_saman, 
                    n1_tari_saman, n2_tari_saman, n3_tari_saman, n4_tari_saman, n5_tari_saman, n_total_tari_saman,
                
                    ncf_minat_tari_lenggang_cisadane, nsf_minat_tari_lenggang_cisadane, 
                    ncf_kemampuan_tari_lenggang_cisadane, nsf_kemampuan_tari_lenggang_cisadane, 
                    ncf_waktu_tari_lenggang_cisadane, nsf_waktu_tari_lenggang_cisadane, 
                    ncf_motivasi_tari_lenggang_cisadane, nsf_motivasi_tari_lenggang_cisadane, 
                    ncf_karakteristik_tari_lenggang_cisadane, nsf_karakteristik_tari_lenggang_cisadane, 
                    n1_tari_lenggang_cisadane, n2_tari_lenggang_cisadane, n3_tari_lenggang_cisadane, 
                    n4_tari_lenggang_cisadane, n5_tari_lenggang_cisadane, n_total_tari_lenggang_cisadane,
                
                    ncf_minat_teater, nsf_minat_teater, ncf_kemampuan_teater, nsf_kemampuan_teater, 
                    ncf_waktu_teater, nsf_waktu_teater, ncf_motivasi_teater, nsf_motivasi_teater, 
                    ncf_karakteristik_teater, nsf_karakteristik_teater, 
                    n1_teater, n2_teater, n3_teater, n4_teater, n5_teater, n_total_teater,
                
                    ncf_minat_taekwondo, nsf_minat_taekwondo, ncf_kemampuan_taekwondo, nsf_kemampuan_taekwondo, 
                    ncf_waktu_taekwondo, nsf_waktu_taekwondo, ncf_motivasi_taekwondo, nsf_motivasi_taekwondo, 
                    ncf_karakteristik_taekwondo, nsf_karakteristik_taekwondo, 
                    n1_taekwondo, n2_taekwondo, n3_taekwondo, n4_taekwondo, n5_taekwondo, n_total_taekwondo,
                
                    ncf_minat_canda_birawa, nsf_minat_canda_birawa, ncf_kemampuan_canda_birawa, nsf_kemampuan_canda_birawa, 
                    ncf_waktu_canda_birawa, nsf_waktu_canda_birawa, ncf_motivasi_canda_birawa, nsf_motivasi_canda_birawa, 
                    ncf_karakteristik_canda_birawa, nsf_karakteristik_canda_birawa, 
                    n1_canda_birawa, n2_canda_birawa, n3_canda_birawa, n4_canda_birawa, n5_canda_birawa, n_total_canda_birawa,
                
                    ncf_minat_bela_diri_matahari, nsf_minat_bela_diri_matahari, ncf_kemampuan_bela_diri_matahari, 
                    nsf_kemampuan_bela_diri_matahari, ncf_waktu_bela_diri_matahari, nsf_waktu_bela_diri_matahari, 
                    ncf_motivasi_bela_diri_matahari, nsf_motivasi_bela_diri_matahari, 
                    ncf_karakteristik_bela_diri_matahari, nsf_karakteristik_bela_diri_matahari, 
                    n1_bela_diri_matahari, n2_bela_diri_matahari, n3_bela_diri_matahari, n4_bela_diri_matahari, 
                    n5_bela_diri_matahari, n_total_bela_diri_matahari
                ) VALUES (
                    '$id_siswa', 
                    '$ncf_minat_rohis', '$nsf_minat_rohis', '$ncf_kemampuan_rohis', '$nsf_kemampuan_rohis', 
                    '$ncf_waktu_rohis', '$nsf_waktu_rohis', '$ncf_motivasi_rohis', '$nsf_motivasi_rohis', 
                    '$ncf_karakteristik_rohis', '$nsf_karakteristik_rohis', 
                    '$n1_rohis', '$n2_rohis', '$n3_rohis', '$n4_rohis', '$n5_rohis', '$hasil_rohis',
                
                    '$ncf_minat_paskibra', '$nsf_minat_paskibra', '$ncf_kemampuan_paskibra', '$nsf_kemampuan_paskibra', 
                    '$ncf_waktu_paskibra', '$nsf_waktu_paskibra', '$ncf_motivasi_paskibra', '$nsf_motivasi_paskibra', 
                    '$ncf_karakteristik_paskibra', '$nsf_karakteristik_paskibra', 
                    '$n1_paskibra', '$n2_paskibra', '$n3_paskibra', '$n4_paskibra', '$n5_paskibra', '$hasil_paskibra',
                
                    '$ncf_minat_pmr', '$nsf_minat_pmr', '$ncf_kemampuan_pmr', '$nsf_kemampuan_pmr', 
                    '$ncf_waktu_pmr', '$nsf_waktu_pmr', '$ncf_motivasi_pmr', '$nsf_motivasi_pmr', 
                    '$ncf_karakteristik_pmr', '$nsf_karakteristik_pmr', 
                    '$n1_pmr', '$n2_pmr', '$n3_pmr', '$n4_pmr', '$n5_pmr', '$hasil_pmr',
                
                    '$ncf_minat_pramuka', '$nsf_minat_pramuka', '$ncf_kemampuan_pramuka', '$nsf_kemampuan_pramuka', 
                    '$ncf_waktu_pramuka', '$nsf_waktu_pramuka', '$ncf_motivasi_pramuka', '$nsf_motivasi_pramuka', 
                    '$ncf_karakteristik_pramuka', '$nsf_karakteristik_pramuka', 
                    '$n1_pramuka', '$n2_pramuka', '$n3_pramuka', '$n4_pramuka', '$n5_pramuka', '$hasil_pramuka',
                
                    '$ncf_minat_kabar_15', '$nsf_minat_kabar_15', '$ncf_kemampuan_kabar_15', '$nsf_kemampuan_kabar_15', 
                    '$ncf_waktu_kabar_15', '$nsf_waktu_kabar_15', '$ncf_motivasi_kabar_15', '$nsf_motivasi_kabar_15', 
                    '$ncf_karakteristik_kabar_15', '$nsf_karakteristik_kabar_15', 
                    '$n1_kabar_15', '$n2_kabar_15', '$n3_kabar_15', '$n4_kabar_15', '$n5_kabar_15', '$hasil_kabar_15',
                
                    '$ncf_minat_kir', '$nsf_minat_kir', '$ncf_kemampuan_kir', '$nsf_kemampuan_kir', 
                    '$ncf_waktu_kir', '$nsf_waktu_kir', '$ncf_motivasi_kir', '$nsf_motivasi_kir', 
                    '$ncf_karakteristik_kir', '$nsf_karakteristik_kir', 
                    '$n1_kir', '$n2_kir', '$n3_kir', '$n4_kir', '$n5_kir', '$hasil_kir',
                
                    '$ncf_minat_japanese_club', '$nsf_minat_japanese_club', '$ncf_kemampuan_japanese_club', '$nsf_kemampuan_japanese_club', 
                    '$ncf_waktu_japanese_club', '$nsf_waktu_japanese_club', '$ncf_motivasi_japanese_club', '$nsf_motivasi_japanese_club', 
                    '$ncf_karakteristik_japanese_club', '$nsf_karakteristik_japanese_club', 
                    '$n1_japanese_club', '$n2_japanese_club', '$n3_japanese_club', '$n4_japanese_club', '$n5_japanese_club', '$hasil_japanese_club',
                
                    '$ncf_minat_osis', '$nsf_minat_osis', '$ncf_kemampuan_osis', '$nsf_kemampuan_osis', 
                    '$ncf_waktu_osis', '$nsf_waktu_osis', '$ncf_motivasi_osis', '$nsf_motivasi_osis', 
                    '$ncf_karakteristik_osis', '$nsf_karakteristik_osis', 
                    '$n1_osis', '$n2_osis', '$n3_osis', '$n4_osis', '$n5_osis', '$hasil_osis',
                
                    '$ncf_minat_basket', '$nsf_minat_basket', '$ncf_kemampuan_basket', '$nsf_kemampuan_basket', 
                    '$ncf_waktu_basket', '$nsf_waktu_basket', '$ncf_motivasi_basket', '$nsf_motivasi_basket', 
                    '$ncf_karakteristik_basket', '$nsf_karakteristik_basket', 
                    '$n1_basket', '$n2_basket', '$n3_basket', '$n4_basket', '$n5_basket', '$hasil_basket',
                
                    '$ncf_minat_badminton', '$nsf_minat_badminton', '$ncf_kemampuan_badminton', '$nsf_kemampuan_badminton', 
                    '$ncf_waktu_badminton', '$nsf_waktu_badminton', '$ncf_motivasi_badminton', '$nsf_motivasi_badminton', 
                    '$ncf_karakteristik_badminton', '$nsf_karakteristik_badminton', 
                    '$n1_badminton', '$n2_badminton', '$n3_badminton', '$n4_badminton', '$n5_badminton', '$hasil_badminton',
                
                    '$ncf_minat_voli', '$nsf_minat_voli', '$ncf_kemampuan_voli', '$nsf_kemampuan_voli', 
                    '$ncf_waktu_voli', '$nsf_waktu_voli', '$ncf_motivasi_voli', '$nsf_motivasi_voli', 
                    '$ncf_karakteristik_voli', '$nsf_karakteristik_voli', 
                    '$n1_voli', '$n2_voli', '$n3_voli', '$n4_voli', '$n5_voli', '$hasil_voli',
                
                    '$ncf_minat_sepak_bola', '$nsf_minat_sepak_bola', '$ncf_kemampuan_sepak_bola', '$nsf_kemampuan_sepak_bola', 
                    '$ncf_waktu_sepak_bola', '$nsf_waktu_sepak_bola', '$ncf_motivasi_sepak_bola', '$nsf_motivasi_sepak_bola', 
                    '$ncf_karakteristik_sepak_bola', '$nsf_karakteristik_sepak_bola', 
                    '$n1_sepak_bola', '$n2_sepak_bola', '$n3_sepak_bola', '$n4_sepak_bola', '$n5_sepak_bola', '$hasil_sepak_bola',
                
                    '$ncf_minat_futsal', '$nsf_minat_futsal', '$ncf_kemampuan_futsal', '$nsf_kemampuan_futsal', 
                    '$ncf_waktu_futsal', '$nsf_waktu_futsal', '$ncf_motivasi_futsal', '$nsf_motivasi_futsal', 
                    '$ncf_karakteristik_futsal', '$nsf_karakteristik_futsal', 
                    '$n1_futsal', '$n2_futsal', '$n3_futsal', '$n4_futsal', '$n5_futsal', '$hasil_futsal',
                
                    '$ncf_minat_seni_suara', '$nsf_minat_seni_suara', '$ncf_kemampuan_seni_suara', '$nsf_kemampuan_seni_suara', 
                    '$ncf_waktu_seni_suara', '$nsf_waktu_seni_suara', '$ncf_motivasi_seni_suara', '$nsf_motivasi_seni_suara', 
                    '$ncf_karakteristik_seni_suara', '$nsf_karakteristik_seni_suara', 
                    '$n1_seni_suara', '$n2_seni_suara', '$n3_seni_suara', '$n4_seni_suara', '$n5_seni_suara', '$hasil_seni_suara',
                
                    '$ncf_minat_tari_saman', '$nsf_minat_tari_saman', '$ncf_kemampuan_tari_saman', '$nsf_kemampuan_tari_saman', 
                    '$ncf_waktu_tari_saman', '$nsf_waktu_tari_saman', '$ncf_motivasi_tari_saman', '$nsf_motivasi_tari_saman', 
                    '$ncf_karakteristik_tari_saman', '$nsf_karakteristik_tari_saman', 
                    '$n1_tari_saman', '$n2_tari_saman', '$n3_tari_saman', '$n4_tari_saman', '$n5_tari_saman', '$hasil_tari_saman',
                
                    '$ncf_minat_tari_lenggang_cisadane', '$nsf_minat_tari_lenggang_cisadane', 
                    '$ncf_kemampuan_tari_lenggang_cisadane', '$nsf_kemampuan_tari_lenggang_cisadane', 
                    '$ncf_waktu_tari_lenggang_cisadane', '$nsf_waktu_tari_lenggang_cisadane', 
                    '$ncf_motivasi_tari_lenggang_cisadane', '$nsf_motivasi_tari_lenggang_cisadane', 
                    '$ncf_karakteristik_tari_lenggang_cisadane', '$nsf_karakteristik_tari_lenggang_cisadane', 
                    '$n1_tari_lenggang_cisadane', '$n2_tari_lenggang_cisadane', '$n3_tari_lenggang_cisadane', 
                    '$n4_tari_lenggang_cisadane', '$n5_tari_lenggang_cisadane', '$hasil_tari_lenggang_cisadane',
                
                    '$ncf_minat_teater', '$nsf_minat_teater', '$ncf_kemampuan_teater', '$nsf_kemampuan_teater', 
                    '$ncf_waktu_teater', '$nsf_waktu_teater', '$ncf_motivasi_teater', '$nsf_motivasi_teater', 
                    '$ncf_karakteristik_teater', '$nsf_karakteristik_teater', 
                    '$n1_teater', '$n2_teater', '$n3_teater', '$n4_teater', '$n5_teater', '$hasil_teater',
                
                    '$ncf_minat_taekwondo', '$nsf_minat_taekwondo', '$ncf_kemampuan_taekwondo', '$nsf_kemampuan_taekwondo', 
                    '$ncf_waktu_taekwondo', '$nsf_waktu_taekwondo', '$ncf_motivasi_taekwondo', '$nsf_motivasi_taekwondo', 
                    '$ncf_karakteristik_taekwondo', '$nsf_karakteristik_taekwondo', 
                    '$n1_taekwondo', '$n2_taekwondo', '$n3_taekwondo', '$n4_taekwondo', '$n5_taekwondo', '$hasil_taekwondo',
                
                    '$ncf_minat_canda_birawa', '$nsf_minat_canda_birawa', '$ncf_kemampuan_canda_birawa', '$nsf_kemampuan_canda_birawa', 
                    '$ncf_waktu_canda_birawa', '$nsf_waktu_canda_birawa', '$ncf_motivasi_canda_birawa', '$nsf_motivasi_canda_birawa', 
                    '$ncf_karakteristik_canda_birawa', '$nsf_karakteristik_canda_birawa', 
                    '$n1_canda_birawa', '$n2_canda_birawa', '$n3_canda_birawa', '$n4_canda_birawa', '$n5_canda_birawa', '$hasil_canda_birawa',
                
                    '$ncf_minat_bela_diri_matahari', '$nsf_minat_bela_diri_matahari', '$ncf_kemampuan_bela_diri_matahari', 
                    '$nsf_kemampuan_bela_diri_matahari', '$ncf_waktu_bela_diri_matahari', '$nsf_waktu_bela_diri_matahari', 
                    '$ncf_motivasi_bela_diri_matahari', '$nsf_motivasi_bela_diri_matahari', 
                    '$ncf_karakteristik_bela_diri_matahari', '$nsf_karakteristik_bela_diri_matahari', 
                    '$n1_bela_diri_matahari', '$n2_bela_diri_matahari', '$n3_bela_diri_matahari', '$n4_bela_diri_matahari', 
                    '$n5_bela_diri_matahari', '$hasil_bela_diri_matahari'
                )";
                

            $konek->query($save_profile_matching);

            $get_siswaById = "SELECT * FROM students WHERE id = '$id_siswa'";
            $result = $konek->query($get_siswaById);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nis = $row['nis'];
                $nama_siswa = $row['nama_siswa'];
                $tahun_ajaran = $row['tahun_ajaran'];
                $kelas = $row['kelas'];
            }

            $data = [
                'id_siswa' => $id_siswa,
                'nis' => $nis,
                'nama_siswa' => $nama_siswa,
                'tahun_ajaran' => $tahun_ajaran,
                'kelas' => $kelas,
                'top_ekskul' => $top_ekskul, // Tiga ekstrakurikuler teratas
                'jurusan' => $jurusan,
            ];

            //kirim response json
            $response = array(
                'status' => 'success',
                'message' => 'Data score berhasil ditambahkan',
                'data' => $data
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Data score gagal ditambahkan'
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Request method not allowed'
    );

    header('Content-Type: application/json');
    echo json_encode($response);
}
