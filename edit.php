<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM hotels WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price_per_night'];
    $rating = $_POST['rating'];

    $stmt = $conn->prepare("UPDATE hotels SET name=?, location=?, price_per_night=?, rating=? WHERE id=?");
    $stmt->bind_param("sssdi", $name, $location, $price, $rating, $id);
    $stmt->execute();

    header("Location: tampil.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Hotel</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color:rgb(52, 138, 78);
            padding: 40px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background: #fff;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"],
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            margin-right: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }

        a button {
            background-color: #f44336;
        }

        a button:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>

<h2>Edit Data Hotel</h2>
<form method="POST">
    <label>Nama Hotel:</label>
    <input type="text" name="name" value="<?= $data['name'] ?>" required>

    <label>Lokasi:</label>
    <input type="text" name="location" value="<?= $data['location'] ?>" required>

    <label>Harga per Malam:</label>
    <input type="number" name="price_per_night" step="0.01" value="<?= $data['price_per_night'] ?>" required>

    <label>Rating:</label>
    <input type="number" name="rating" step="0.1" max="5" min="0" value="<?= $data['rating'] ?>" required>

    <input type="submit" value="Update">
    <a href="index.php"><button type="button">Batal</button></a>
</form>

</body>
</html>
