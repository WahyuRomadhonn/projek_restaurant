<?php
include "database.php";

header("Content-Type: application/json");

$sql = "SELECT id, name, description, price, image FROM menu";
$result = $conn->query($sql);

$menu = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menu[] = $row;
    }
}

echo json_encode($menu);
$conn->close();
?>
