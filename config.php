<?php
// File: config.php
// Konfigurasi Database MySQL
$host = "localhost";
$user = "root";
$password = "";
$database = "spk_driver";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>