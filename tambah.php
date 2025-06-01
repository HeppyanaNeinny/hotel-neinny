<?php include 'koneksi.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price_per_night'];
    $rating = $_POST['rating'];

    $stmt = $conn->prepare("INSERT INTO hotels (name, location, price_per_night, rating) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $name, $location, $price, $rating);
    $stmt->execute();

    header("Location: tampil.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Hotel</title>
    <style>
        body {
            font-family: "Georgia", serif;
            background-color:rgb(201, 135, 192);
            padding: 30px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 25px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }

        label, input {
            display: block;
            width: 100%;
        }

        input[type="text"],
        input[type="number"] {
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        .button-group {
    display: flex;
    justify-content: center;
    gap: 10px; /* memberi jarak antar tombol */
    margin-top: 20px;
}


        input[type="submit"], button {
            padding: 10px 20px;
            background-color: #2d6a4f;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color:rgb(221, 142, 128);
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        a button {
            background-color:rgb(21, 128, 128);
        }

        a button:hover {
            background-color:rgb(74, 138, 168);
        }
    </style>
</head>
<body>

<h2>Tambah Data Hotel</h2>

<form method="POST">
    <label>Nama Hotel:</label>
    <input type="text" name="name" required>

    <label>Lokasi:</label>
    <input type="text" name="location" required>

    <label>Harga per Malam:</label>
    <input type="number" name="price_per_night" step="0.01" required>

    <label>Rating:</label>
    <input type="number" name="rating" step="0.1" min="0" max="5" required>

    <div class="button-group">
    <button type="submit">Simpan</button>
    <a href="tampil.php"><button type="button">Batal</button></a>
</div>

</form>

</body>
</html>
