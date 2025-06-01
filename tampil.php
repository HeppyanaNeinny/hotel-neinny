<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Perhotelan</title>
    <style>
        body {
            font-family: 'Arial', serif;
            background-color: #f7c6c7;
            padding: 40px;
            color: #333;
        }

        h2 {
            text-align: bold;
            color:rgb(139, 17, 93);
            margin-bottom: 30px;
        }

        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            gap: 10px;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 250px;
            font-family: inherit;
        }

        input[type="submit"], button {
            background-color: #4b6cb7;
            color: white;
            border: none;
            padding: 8px 14px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #3a539b;
        }

        a button {
            background-color: #388e3c;
        }

        a button:hover {
            background-color: #2e7d32;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            table, th, td {
            border: 1px solid #333;
            border-collapse: collapse;
}

th, td {
    padding: 8px;
}

        }

        th {
            background-color: #27ae60;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        tr:nth-child(even) {
            background-color: #cceeff;
        }

        a {
            color: #1a5276;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions a {
            margin-right: 10px;
        }

        .add-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .add-button a button {
            background-color: #6a1b9a;
        }

        .add-button a button:hover {
            background-color: #4a148c;
        }
    </style>
</head>
<body>

    <h2>DATA PERHOTELAN</h2>

    <form class="search-form" method="GET">
        <input type="text" name="search" placeholder="Cari hotel..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <input type="submit" value="Cari">
        <a href="tampil.php"><button type="button">Reset</button></a>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Hotel</th>
            <th>Lokasi</th>
            <th>Harga per Malam</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>

        <?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM hotels WHERE name LIKE '%$search%' OR location LIKE '%$search%' ORDER BY id DESC";
$result = $conn->query($sql);
$no = 1; // ✅ Inisialisasi nomor

if ($result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['location']) ?></td>
    <td>Rp <?= number_format($row['price_per_night'], 2, ',', '.') ?></td>
    <td><?= $row['rating'] ?></td>
    <td class="actions">
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
    </td>
</tr>
<?php endwhile; else: ?>
<tr><td colspan="6" style="text-align:center;">Hotel tidak ditemukan.</td></tr>
<?php endif; ?>

    </table>

    <div class="add-button">
        <a href="tambah.php"><button>+ Tambah Hotel</button></a>
    </div>

</body>
</html>
