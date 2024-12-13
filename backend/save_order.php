<?php
include "database.php";

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$user_name = $data['user_name'];
$user_phone = $data['user_phone'];
$menu_id = $data['menu_id'];
$quantity = $data['quantity'];

$sql = "SELECT price FROM menu WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $menu_id);
$stmt->execute();
$result = $stmt->get_result();
$menu = $result->fetch_assoc();

if ($menu) {
    $total_price = $menu['price'] * $quantity;

    $insert_sql = "INSERT INTO orders (user_name, user_phone, menu_id, quantity, total_price) VALUES (?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ssiid", $user_name, $no_meja, $menu_id, $quantity, $order_date);
    $insert_stmt->execute();

    echo json_encode(["success" => true, "message" => "Order placed successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Menu not found"]);
}

$conn->close();
?>
