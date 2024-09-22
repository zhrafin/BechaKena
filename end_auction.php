<?php
include 'db_connection.php';

// Check if the auction has ended
$sql = "SELECT end_time FROM auction_settings WHERE id = 1";
$result = $conn->query($sql);
$auctionEndTime = $result->fetch_assoc()['end_time'];

if (time() > strtotime($auctionEndTime)) {
    // Get all auction items
    $sql = "SELECT id FROM auction_items";
    $result = $conn->query($sql);

    while ($item = $result->fetch_assoc()) {
        $item_id = $item['id'];

        // Get the highest bidder for each item
        $sql = "SELECT user_id, MAX(bid_amount) as highest_bid 
                FROM bids 
                WHERE item_id = ? 
                GROUP BY user_id 
                ORDER BY highest_bid DESC 
                LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $bidResult = $stmt->get_result();
        $winner = $bidResult->fetch_assoc();

        if ($winner) {
            // Update the auction_items table with the winner
            $updateSql = "UPDATE auction_items SET winner_id = ?, final_price = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("idi", $winner['user_id'], $winner['highest_bid'], $item_id);
            $updateStmt->execute();

            // Add item to winner's profile (you'll need to create a user_items table)
            $insertSql = "INSERT INTO user_items (user_id, item_id, purchase_price) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("iid", $winner['user_id'], $item_id, $winner['highest_bid']);
            $insertStmt->execute();
        }
    }

    echo "Auction ended and winners processed.";
} else {
    echo "Auction is still ongoing.";
}

$conn->close();
?>