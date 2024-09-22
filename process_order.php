<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['address']) || !isset($_POST['contact'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$address = $_POST['address'];
$contact = $_POST['contact'];

// Start transaction
$conn->begin_transaction();

try {
    // Fetch cart items
    $stmt = $conn->prepare("SELECT product_id, quantity FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    // Process each cart item
    foreach ($cart_items as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];

        // Fetch product price
        $stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $price = $stmt->get_result()->fetch_assoc()['price'];

        $total_price = $price * $quantity;

        // Create order
        $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity, order_price, address, contact) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiidss", $user_id, $product_id, $quantity, $total_price, $address, $contact);
        $stmt->execute();
    }

    // Clear the cart
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Commit transaction
    $conn->commit();

    header("Location: my_orders.php?success=1");
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    header("Location: cart.php?error=" . urlencode($e->getMessage()));
}

$conn->close();
?>