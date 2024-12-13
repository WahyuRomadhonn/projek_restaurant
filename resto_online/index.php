<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'resto_online');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$category = isset($_GET['category']) ? $_GET['category'] : 'Semua';
$sql = $category === 'Semua' ? "SELECT * FROM menus" : "SELECT * FROM menus WHERE category = '$category'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Online Wahyu R</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Restaurant Online Goks</h1>
        <h2> Selamat Datang di Restaurant Goks, dengan berbagai macam varian menu</h2>
    </header>

    <div class="category">
        <ul>
            <li><a href="?category=Semua">Semua</a></li>
            <li><a href="?category=Minuman">Minuman</a></li>
            <li><a href="?category=Makanan">Makanan</a></li>
            <li><a href="?category=Snack">Snack</a></li>
        </ul>
    </div>

    <div class="menu-items">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='menu-item'>";
                echo "<img src='img/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p class='price'>Rp " . number_format($row['price'], 2, ',', '.') . "</p>";
                ?>
                <form action="order.php" method="POST">
                    <input type="hidden" name="menu_id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="customer_name" placeholder="Nama Anda" required>
                    <input type="text" name="no_meja" placeholder="No Meja" required>
                    <input type="number" name="quantity" min="1" value="1" required>
                    <button type="submit" class="order-btn">Pesan</button>
                </form>
                <a href="menu_detail.php?id=<?php echo $row['id']; ?>" class="detail-btn">Detail</a>
                <?php
                echo "</div>";
            }
        } else {
            echo "Tidak ada menu.";
        }
        $conn->close();
        ?>
    </div>

</body>
</html>
