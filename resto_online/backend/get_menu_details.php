<?php
include "database.php";

header("Content-Type: application/json");

$menu_id = $_GET['id'] ?? 0;
$sql = "SELECT id, name, description, price, image FROM menu WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $menu_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["error" => "Menu not found"]);
}

$stmt->close();
$conn->close();
?>
