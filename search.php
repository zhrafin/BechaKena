<?php
session_start();
require_once 'db_connection.php';

$page_title = "Search Results";
include 'header.php';

$category = isset($_GET['category']) ? $_GET['category'] : 'all';
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare the SQL query based on the category and search query
if ($category == 'all') {
    $sql = "SELECT * FROM products WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $searchTerm = "%$query%";
    $stmt->bind_param("s", $searchTerm);
} else {
    $sql = "SELECT * FROM products WHERE category = ? AND name LIKE ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $searchTerm = "%$query%";
    $stmt->bind_param("ss", $category, $searchTerm);
}

if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
}

$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - BechaKena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
        <?php if (count($products) > 0): ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($product['category']); ?></p>
                                <p class="card-text">$<?php echo number_format($product['price'], 2); ?></p>
                                <form action="add_to_cart.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No results found for your search query.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
include 'footer.php';
?>