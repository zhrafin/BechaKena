<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$item_id = $_POST['item_id'];
$bid_amount = $_POST['bid_amount'];

// Start transaction
$conn->begin_transaction();

try {
    // Check user's credit
    $credit_check = $conn->prepare("SELECT credit FROM users WHERE id = ?");
    $credit_check->bind_param("i", $user_id);
    $credit_check->execute();
    $credit_result = $credit_check->get_result();
    $user_credit = $credit_result->fetch_assoc()['credit'];

    if ($user_credit < $bid_amount) {
        throw new Exception("Insufficient credits");
    }

    // Check if bid is higher than current bid
    $current_bid_check = $conn->prepare("SELECT current_bid FROM auction_items WHERE id = ?");
    $current_bid_check->bind_param("i", $item_id);
    $current_bid_check->execute();
    $current_bid_result = $current_bid_check->get_result();
    $current_bid = $current_bid_result->fetch_assoc()['current_bid'];

    if ($bid_amount <= $current_bid) {
        throw new Exception("Bid must be higher than current bid");
    }

    // Place bid
    $place_bid = $conn->prepare("INSERT INTO bids (item_id, user_id, bid_amount) VALUES (?, ?, ?)");
    $place_bid->bind_param("iid", $item_id, $user_id, $bid_amount);
    $place_bid->execute();

    // Update auction item's current bid
    $update_item = $conn->prepare("UPDATE auction_items SET current_bid = ? WHERE id = ?");
    $update_item->bind_param("di", $bid_amount, $item_id);
    $update_item->execute();

    // Deduct credit from user
    $update_credit = $conn->prepare("UPDATE users SET credit = credit - ? WHERE id = ?");
    $update_credit->bind_param("di", $bid_amount, $user_id);
    $update_credit->execute();

    // Commit transaction
    $conn->commit();

    echo json_encode(['success' => true, 'new_bid' => $bid_amount]);
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

$conn->close();
?>