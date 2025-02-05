<?php
session_start();
include 'config.php';

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "driver_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil halaman yang sedang dibuka
$current_page = basename($_SERVER['PHP_SELF']);

// Ambil data dari tabel bobot
$query = "SELECT * FROM bobot";
$result = $conn->query($query);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $total = floatval($row['c1']) + floatval($row['c2']) + floatval($row['c3']) + floatval($row['c4']) + floatval($row['c5']);
    $row['total'] = $total;
    $data[] = $row;
}

// Urutkan berdasarkan total nilai dari yang tertinggi
usort($data, function ($a, $b) {
    return $b['total'] <=> $a['total'];
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Keputusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Sidebar tetap di tempat */
        .sidebar {
            position: fixed;
            height: 100vh;
            width: 250px;
            background-color: #198754;
            color: white;
            padding: 20px;
        }

        /* Sesuaikan area konten agar tidak tertutup sidebar */
        .content-area {
            margin-left: 250px;
            padding: 20px;
        }

        /* Supaya header tetap di tengah */
        .fixed-header {
            position: sticky;
            top: 0;
            background-color: #198754;
            color: white;
            padding: 10px;
            z-index: 1000;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="text-center mt-3">Sistem Pendukung Keputusan Pemilihan Driver</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white <?= ($current_page == 'dashboard.php') ? 'bg-primary text-white rounded' : ''; ?>" href="dashboard.php"><i class="bi bi-grid"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white <?= ($current_page == 'user.php') ? 'bg-primary text-white rounded' : ''; ?>" href="user.php"><i class="bi bi-person"></i> User</a></li>
            <li class="nav-item"><a class="nav-link text-white <?= ($current_page == 'driver.php') ? 'bg-primary text-white rounded' : ''; ?>" href="driver.php"><i class="bi bi-car-front"></i> Driver</a></li>
            <li class="nav-item"><a class="nav-link text-white <?= ($current_page == 'index.php') ? 'bg-primary text-white rounded' : ''; ?>" href="index.php"><i class="bi bi-clipboard-check"></i> Kriteria Bobot</a></li>
            <li class="nav-item"><a class="nav-link text-white <?= ($current_page == 'cpi.php') ? 'bg-primary text-white rounded' : ''; ?>" href="cpi.php"><i class="bi bi-calculator"></i> Perhitungan CPI</a></li>
            <li class="nav-item"><a class="nav-link text-white <?= ($current_page == 'hasil.php') ? 'bg-primary text-white rounded' : ''; ?>" href="hasil.php"><i class="bi bi-file-earmark-bar-graph"></i> Hasil Akhir</a></li>
        </ul>
    </div>

    <div class="content-area">
        <h2 class="fixed-header">Hasil Perankingan Driver</h2>
        <div class="card p-3 mt-4">
            <table class="table table-striped table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Rank</th>
                        <th>Nama Driver</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank = 1; ?>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td><?= $rank++; ?></td>
                            <td><?= htmlspecialchars($row['nama_driver']); ?></td>
                            <td><?= $row['c1']; ?></td>
                            <td><?= $row['c2']; ?></td>
                            <td><?= $row['c3']; ?></td>
                            <td><?= $row['c4']; ?></td>
                            <td><?= $row['c5']; ?></td>
                            <td><strong><?= $row['total']; ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
