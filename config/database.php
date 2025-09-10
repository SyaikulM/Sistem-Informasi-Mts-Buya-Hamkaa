<?php
// Konfigurasi Database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ppdb_mts_hamka';

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8");

// Fungsi untuk membersihkan input
function clean_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}

// Fungsi untuk generate nomor pendaftaran
function generateNoPendaftaran() {
    $tahun = date('Y');
    $bulan = date('m');
    $random = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
    return "PPDB{$tahun}{$bulan}{$random}";
}
?>