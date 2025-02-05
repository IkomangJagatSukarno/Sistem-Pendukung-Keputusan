<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];

    $sql = "INSERT INTO drivers (name, c1, c2, c3, c4, c5) VALUES ('$name', $c1, $c2, $c3, $c4, $c5)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Driver</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Add Driver</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="c1">C1</label>
                <input type="number" class="form-control" id="c1" name="c1" required>
            </div>
            <div class="form-group">
                <label for="c2">C2</label>
                <input type="number" class="form-control" id="c2" name="c2" required>
            </div>
            <div class="form-group">
                <label for="c3">C3</label>
                <input type="number" class="form-control" id="c3" name="c3" required>
            </div>
            <div class="form-group">
                <label for="c4">C4</label>
                <input type="number" class="form-control" id="c4" name="c4" required>
            </div>
            <div class="form-group">
                <label for="c5">C5</label>
                <input type="number" class="form-control" id="c5" name="c5" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>