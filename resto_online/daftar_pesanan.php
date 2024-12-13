<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'resto_online');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data pesanan
$sql = "SELECT p.id, p.customer_name, p.no_meja, m.name AS menu_name, p.quantity, p.order_date, p.status
        FROM pesan p
        JOIN menus m ON p.menu_id = m.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Daftar Pesanan</h1>
    </header>

    <div class="orders">
        <?php
        if ($result->num_rows > 0) {
            // Tampilkan tabel pesanan
            echo "<table>";
            echo "<tr><th>ID</th><th>Nama Pelanggan</th><th>No Meja</th><th>Menu</th><th>Jumlah</th><th>Status</th><th>Tanggal Pemesanan</th><th>Aksi</th></tr>";

            // Menampilkan setiap pesanan dalam baris tabel
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['customer_name'] . "</td>";
                echo "<td>" . $row['no_meja'] . "</td>";
                echo "<td>" . $row['menu_name'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td>";
                // Tombol selesai
                echo "<a href='update_status.php?id=" . $row['id'] . "&status=selesai' class='button'>Selesai</a> ";
                // Tombol hapus
                echo "<a href='delete_order.php?id=" . $row['id'] . "' class='button'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada pesanan.";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </div>

</body>
</html>
