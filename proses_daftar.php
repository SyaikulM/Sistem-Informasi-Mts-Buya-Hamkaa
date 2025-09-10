<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil dan bersihkan data dari form
    $nama_lengkap = clean_input($_POST['nama_lengkap']);
    $nisn = clean_input($_POST['nisn']);
    $tempat_lahir = clean_input($_POST['tempat_lahir']);
    $tanggal_lahir = clean_input($_POST['tanggal_lahir']);
    $jenis_kelamin = clean_input($_POST['jenis_kelamin']);
    $agama = clean_input($_POST['agama']);
    $alamat = clean_input($_POST['alamat']);
    $nama_ayah = clean_input($_POST['nama_ayah']);
    $nama_ibu = clean_input($_POST['nama_ibu']);
    $pekerjaan_ayah = clean_input($_POST['pekerjaan_ayah']);
    $pekerjaan_ibu = clean_input($_POST['pekerjaan_ibu']);
    $no_hp = clean_input($_POST['no_hp']);
    $asal_sekolah = clean_input($_POST['asal_sekolah']);
    $nilai_ijazah = clean_input($_POST['nilai_ijazah']);

    // Validasi data
    $errors = array();

    if (empty($nama_lengkap)) {
        $errors[] = "Nama lengkap harus diisi";
    }

    if (empty($nisn)) {
        $errors[] = "NISN harus diisi";
    }

    if (!empty($nisn) && strlen($nisn) < 10) {
        $errors[] = "NISN minimal 10 karakter";
    }

    if (empty($tanggal_lahir)) {
        $errors[] = "Tanggal lahir harus diisi";
    }

    if ($nilai_ijazah < 0 || $nilai_ijazah > 100) {
        $errors[] = "Nilai ijazah harus antara 0-100";
    }

    // Cek apakah NISN sudah terdaftar
    $check_nisn = $conn->prepare("SELECT id FROM pendaftaran WHERE nisn = ?");
    $check_nisn->bind_param("s", $nisn);
    $check_nisn->execute();
    $result = $check_nisn->get_result();
    
    if ($result->num_rows > 0) {
        $errors[] = "NISN sudah terdaftar sebelumnya";
    }

    // Jika ada error, redirect kembali dengan pesan error
    if (!empty($errors)) {
        $error_message = implode(", ", $errors);
        header("Location: pendaftaran.php?error=" . urlencode($error_message));
        exit();
    }

    // Generate nomor pendaftaran
    do {
        $no_pendaftaran = generateNoPendaftaran();
        $check_no = $conn->prepare("SELECT id FROM pendaftaran WHERE no_pendaftaran = ?");
        $check_no->bind_param("s", $no_pendaftaran);
        $check_no->execute();
        $result_no = $check_no->get_result();
    } while ($result_no->num_rows > 0);

    // Simpan data ke database
    $sql = "INSERT INTO pendaftaran (
                no_pendaftaran, nama_lengkap, nisn, tempat_lahir, tanggal_lahir, 
                jenis_kelamin, agama, alamat, nama_ayah, nama_ibu, 
                pekerjaan_ayah, pekerjaan_ibu, no_hp, asal_sekolah, nilai_ijazah
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssd", 
        $no_pendaftaran, $nama_lengkap, $nisn, $tempat_lahir, $tanggal_lahir,
        $jenis_kelamin, $agama, $alamat, $nama_ayah, $nama_ibu,
        $pekerjaan_ayah, $pekerjaan_ibu, $no_hp, $asal_sekolah, $nilai_ijazah
    );

    if ($stmt->execute()) {
        // Berhasil mendaftar
        header("Location: pendaftaran.php?success=1&no_pendaftaran=" . urlencode($no_pendaftaran));
        exit();
    } else {
        // Gagal mendaftar
        header("Location: pendaftaran.php?error=" . urlencode("Terjadi kesalahan saat menyimpan data. Silakan coba lagi."));
        exit();
    }

    $stmt->close();
    $check_nisn->close();
    $check_no->close();
} else {
    // Jika bukan POST request
    header("Location: pendaftaran.php");
    exit();
}

$conn->close();
?>