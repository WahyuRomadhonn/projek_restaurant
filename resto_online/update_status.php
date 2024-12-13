<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'resto_online');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ID dan status tersedia
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah angka
    $status = $conn->real_escape_string($_GET['status']);

    // Update status di database
    $sql = "UPDATE pesan SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: daftar_pesanan.php"); // Kembali ke halaman daftar pesanan
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
