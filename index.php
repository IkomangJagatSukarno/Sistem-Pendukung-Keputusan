<?php
// File: index.php
// Sistem Pendukung Keputusan Pemilihan Driver

include 'config.php';
include 'header.php';

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan Pemilihan Driver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<div class="d-flex">
    <!-- Sidebar -->
    <nav class="col-md-3 col-lg-2 d-md-block bg-success sidebar text-white vh-100 p-3">
        <h4 class="text-center mt-3">Sistem Pendukung Keputusan Pemilihan Driver</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="dashboard.php" class="nav-link text-white"><i class="bi bi-grid"></i> Dashboard</a></li>
            <li class="nav-item"><a href="user.php" class="nav-link text-white"><i class="bi bi-person"></i> User</a></li>
            <li class="nav-item"><a href="driver.php" class="nav-link text-white"><i class="bi bi-car-front"></i> Driver</a></li>
            <li class="nav-item bg-primary rounded"><a href="index.php" class="nav-link text-white"><i class="bi bi-clipboard-check"></i> Kriteria Bobot</a></li>
            <li class="nav-item"><a href="cpi.php" class="nav-link text-white"><i class="bi bi-calculator"></i> Perhitungan CPI</a></li>
            <li class="nav-item"><a href="hasil.php" class="nav-link text-white"><i class="bi bi-file-earmark-bar-graph"></i> Hasil Akhir</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="text-center bg-success text-white py-2">KRITERIA BOBOT</h2>
        <div class="card p-3">
            <input type="text" class="form-control mb-3" placeholder="Cari...">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Kriteria</th>
                        <th>Trend</th>
                        <th>Bobot</th>
                        <th>Terakhir Diupdate Oleh</th>
                        <th>Create At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM kriteria";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nama_kriteria']}</td>
                                <td>{$row['trend']}</td>
                                <td>{$row['bobot']}%</td>
                                <td>{$row['updated_by']}</td>
                                <td>{$row['created_at']}</td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>