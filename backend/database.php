<?php
$host = "localhost"; // Host database (default: localhost)
$username = "root";  // Username default untuk phpMyAdmin
$password = "";      // Password default biasanya kosong
$dbname = "resto_online"; // Nama database yang telah dibuat

$conn = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
