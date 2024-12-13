<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'resto_online';
$username = 'root'; // Default XAMPP
$password = ''; // Default XAMPP (kosong)
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah data telah dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $menu_id = $_POST['menu_id'];
    $quantity = $_POST['quantity'];
    $no_meja = $_POST['no_meja'];  // Menambahkan no_meja ke dalam variabel

    // Menyimpan pesanan ke tabel pesan
    $sql = "INSERT INTO pesan (customer_name, menu_id, quantity, no_meja) 
            VALUES ('$customer_name', '$menu_id', '$quantity', '$no_meja')";

    if ($conn->query($sql) === TRUE) {
        echo "Pesanan berhasil dibuat! <a href='index.php'>Kembali ke menu</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
