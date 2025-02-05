<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $trend = $_POST['trend'];
    $bobot = $_POST['bobot'];
    $updated_by = $_POST['updated_by'];
    $sql = "UPDATE kriteria SET nama_kriteria='$nama_kriteria', trend='$trend', bobot='$bobot', updated_by='$updated_by' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='index.php';</script>";
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM kriteria WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Kriteria</title>
</head>
<body>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama Kriteria:</label>
        <input type="text" name="nama_kriteria" value="<?php echo $data['nama_kriteria']; ?>" required>
        <label>Trend:</label>
        <input type="text" name="trend" value="<?php echo $data['trend']; ?>" required>
        <label>Bobot:</label>
        <input type="number" name="bobot" value="<?php echo $data['bobot']; ?>" required>
        <label>Updated By:</label>
        <input type="text" name="updated_by" value="<?php echo $data['updated_by']; ?>" required>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>

<?php
include 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM kriteria WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location='index.php';</script>";
    }
}
?>