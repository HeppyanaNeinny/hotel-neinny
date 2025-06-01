<?php
include 'koneksi.php';

$id = $_GET['id'];
$conn->query("DELETE FROM hotels WHERE id=$id");

header("Location: tampil.php");
