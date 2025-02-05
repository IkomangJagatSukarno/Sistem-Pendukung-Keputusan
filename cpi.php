<?php
session_start();
include 'config.php'; // File konfigurasi database MySQL

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "driver_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan Pemilihan Driver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        /* Sidebar tetap di tempat */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: #198754;
            color: white;
            padding-top: 20px;
            overflow-y: auto;
        }
        /* Menyesuaikan margin konten agar tidak tertutup sidebar */
        .content {
            margin-left: 260px; /* Memberi jarak agar tidak tertutup sidebar */
            padding: 20px;
        }
        /* Header atau judul tetap di tempat */
        .sticky-header {
            position: sticky;
            top: 0;
            background: #198754;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            z-index: 100;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <nav class="sidebar p-3">
        <h4 class="text-center mt-3">Sistem Pendukung Keputusan Pemilihan Driver</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="dashboard.php"><i class="bi bi-grid"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="user.php"><i class="bi bi-person"></i> User</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="driver.php"><i class="bi bi-car-front"></i> Driver</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="index.php"><i class="bi bi-clipboard-check"></i> Kriteria Bobot</a></li>
            <li class="nav-item bg-primary rounded"><a class="nav-link text-white" href="cpi.php"><i class="bi bi-calculator"></i> Perhitungan CPI</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="hasil.php"><i class="bi bi-file-earmark-bar-graph"></i> Hasil Akhir</a></li>
        </ul>
    </nav>

    <!-- Konten utama -->
    <div class="content">
        <h2 class="sticky-header">PERHITUNGAN CPI</h2>
        <div class="card p-3">
            <h4 class="text-center">Normalisasi Nilai</h4>
            <table class="table table-striped table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Driver</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM normalisasi";
                    $result = $conn->query($query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama_driver']}</td>
                                <td>" . floatval($row['c1']) . "</td>
                                <td>" . floatval($row['c2']) . "</td>
                                <td>" . floatval($row['c3']) . "</td>
                                <td>" . floatval($row['c4']) . "</td>
                                <td>" . floatval($row['c5']) . "</td>
                                 <td>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>
                                        <i class='bi bi-trash'></i>
                                    </a>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <br><br>

        <div class="card p-3">
            <h4 class="text-center">Nilai Bobot</h4>
            <table class="table table-striped table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Driver</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM bobot";
                    $result = $conn->query($query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama_driver']}</td>
                                <td>" . floatval($row['c1']) . "</td>
                                <td>" . floatval($row['c2']) . "</td>
                                <td>" . floatval($row['c3']) . "</td>
                                <td>" . floatval($row['c4']) . "</td>
                                <td>" . floatval($row['c5']) . "</td>
                                 <td>
                                     <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>
                                        <i class='bi bi-trash'></i>
                                     </a>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
