<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(to bottom right,rgb(132, 177, 202),rgb(218, 149, 200));
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .welcome-container {
            background-color: #fff;
            padding: 40px 60px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        a button {
            background-color: #4b6cb7;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        a button:hover {
            background-color:rgb(114, 206, 145);
        }
    </style>
</head>
<body>

    <div class="welcome-container">
        <h1>Selamat Datang di Sistem Data Perhotelan</h1>
        <p>Cari Informasi tentang Hotel.</p>
        <a href="tampil.php"><button>Masuk ke Data Hotel</button></a>
    </div>

</body>
</html>
