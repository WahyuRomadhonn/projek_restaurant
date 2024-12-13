<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'resto_online');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $menu_id = $_GET['id'];
    $sql = "SELECT * FROM menus WHERE id = $menu_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $menu = $result->fetch_assoc();
    } else {
        echo "Menu tidak ditemukan.";
    }
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $menu['name']; ?> - Detail</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .menu-detail {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .menu-detail img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .menu-detail h2 {
            font-size: 24px;
            margin: 10px 0;
        }

        .menu-detail p {
            font-size: 16px;
            margin: 5px 0;
            color: #555;
        }

        .menu-detail .price {
            font-size: 20px;
            font-weight: bold;
            color: #27ae60;
            margin-top: 10px;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 14px;
            color: #fff;
            background-color: #3498db;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="menu-detail">
        <img src="img/<?php echo $menu['image']; ?>" alt="<?php echo $menu['name']; ?>">
        <h2><?php echo $menu['name']; ?></h2>
        <p><?php echo $menu['description']; ?></p>
        <p class="price">Rp <?php echo number_format($menu['price'], 2, ',', '.'); ?></p>
        <a href="http://localhost/resto_online/" class="back-button">Kembali</a>
    </div>
</body>
</html>
