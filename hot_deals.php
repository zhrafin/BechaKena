<?php
session_start();
$page_title = "Hot Deals";
include 'header.php';
require_once 'db_connection.php';

// Initialize an error message variable
$error_message = '';

// Fetch hot deals from the database
try {
    $stmt = $conn->prepare("
        SELECT p.*, h.original_price, h.discounted_price, h.start_date, h.end_date
        FROM products p
        INNER JOIN hot_deals h ON p.id = h.product_id
        WHERE CURDATE() BETWEEN h.start_date AND h.end_date
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $hot_deals = $result->fetch_all(MYSQLI_ASSOC);

    // Check if any deals were found
    if (empty($hot_deals)) {
        $error_message = "No hot deals found for the current date.";
    }
} catch (Exception $e) {
    $error_message = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - BechaKena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .product-card h5 {
            margin: 10px 0;
        }
        .product-card .price {
            font-size: 1.2em;
            color: #ff006e;
        }
        .product-card .original-price {
            text-decoration: line-through;
            color: #888;
            margin-right: 10px;
        }
        .product-card .buy-now {
            background-color: #ff006e;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
        }
        .product-card .buy-now:hover {
            background-color: #cc005a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="display-4 my-4 text-center">Hot Deals</h1>
        
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($hot_deals)): ?>
            <div class="row">
                <?php foreach ($hot_deals as $deal): ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($deal['image_url']); ?>" alt="<?php echo htmlspecialchars($deal['name']); ?>" class="img-fluid">
                        <h5><?php echo htmlspecialchars($deal['name']); ?></h5>
                        <p class="price">
                            <span class="original-price">$<?php echo number_format($deal['original_price'], 2); ?></span>
                            <span class="discounted-price">$<?php echo number_format($deal['discounted_price'], 2); ?></span>
                        </p>
                        <form action="add_to_cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $deal['id']; ?>">
                            <button type="submit" class="buy-now btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No hot deals available at the moment. Please check back later!</p>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>