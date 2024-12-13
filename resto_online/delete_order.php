<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'resto_online');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ID tersedia
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah angka

    // Hapus pesanan dari database
    $sql = "DELETE FROM pesan WHERE id=$id";

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
