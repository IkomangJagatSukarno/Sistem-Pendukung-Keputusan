<?php
include 'config.php'; // Pastikan file ini berisi koneksi database yang benar

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Konversi ID ke integer untuk keamanan

    // Cek apakah koneksi database berhasil
    if (!$conn) {
        die("<script>alert('Koneksi database gagal!'); window.location='cpi.php';</script>");
    }

    // Pastikan database yang digunakan adalah driver_db
    if (!mysqli_select_db($conn, "driver_db")) {
        die("<script>alert('Gagal memilih database driver_db!'); window.location='cpi.php';</script>");
    }

    // Cek apakah tabel "normalisasi" ada di database driver_db
    $checkTable = mysqli_query($conn, "SHOW TABLES LIKE 'normalisasi'");
    if (!$checkTable || mysqli_num_rows($checkTable) == 0) {
        die("<script>alert('Tabel normalisasi tidak ditemukan di database driver_db!'); window.location='cpi.php';</script>");
    }

    try {
        // Query hapus data berdasarkan ID
        $query = "DELETE FROM normalisasi WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<script>alert('Data berhasil dihapus!'); window.location='cpi.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data!'); window.location='cpi.php';</script>";
            }

            // Tutup statement
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Query tidak valid!'); window.location='cpi.php';</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.location='cpi.php';</script>";
    }

    // Tutup koneksi database
    mysqli_close($conn);
} else {
    echo "<script>alert('ID tidak valid!'); window.location='cpi.php';</script>";
}
?>
