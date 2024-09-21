<?php
session_start();
$page_title = "Paints";
include 'header.php';
require_once 'db_connection.php';

// Fetch shoes from the database
$stmt = $conn->prepare("SELECT * FROM products WHERE category = 'paint'");
$stmt->execute();
$result = $stmt->get_result();
$shoes = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px;
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: 300px;
            margin-bottom: 10px;
        }
        .product-card h5 {
            margin: 10px 0;
        }
        .product-card .price {
            font-size: 1.2em;
            color: #ff006e;
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
        <h1 class="display-4 text-center">Paints</h1>
        <div class="row">
            <?php foreach ($shoes as $shoe): ?>
            <div class="col-md-3">
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($shoe['image_url']); ?>" alt="<?php echo htmlspecialchars($shoe['name']); ?>">
                    <h5><?php echo htmlspecialchars($shoe['name']); ?></h5>
                    <p class="price">$<?php echo number_format($shoe['price'], 2); ?></p>
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $shoe['id']; ?>">
                        <button type="submit" class="buy-now">Add to Cart</button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
<?php
include 'footer.php';
?>