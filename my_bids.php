<?php
// Start the session and include database connection
session_start();
require_once 'db_connection.php'; // Make sure you have this file with your database connection
include 'header.php';

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

// Fetch user data
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch dashboard data
$stmt = $conn->prepare("SELECT COUNT(*) as total_bids FROM bids WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$total_bids = $stmt->get_result()->fetch_assoc()['total_bids'];

$stmt = $conn->prepare("SELECT COUNT(*) as winning_bids FROM auction_items WHERE winner_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$winning_bids = $stmt->get_result()->fetch_assoc()['winning_bids'];

$stmt = $conn->prepare("SELECT COUNT(*) as my_orders FROM orders WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$my_orders = $stmt->get_result()->fetch_assoc()['my_orders'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BechaKena - My Bids</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="my_bids.css">
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <div class="profile-header text-center">
                        <img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" class="profile-pic" id="profile-pic">
                        <h3 class="profile-name"><?php echo htmlspecialchars($user['name']); ?></h3>
                        <p class="profile-email"><?php echo htmlspecialchars($user['email']); ?></p>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="profilePicture" id="profilePicture" class="form-control form-control-sm" onchange="document.getElementById('profile-pic').src = window.URL.createObjectURL(this.files[0])">
                            <button type="submit" class="btn btn-light btn-sm mt-2">Upload</button>
                        </form>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="personal_info.php"><i class="fas fa-user me-2"></i><span>Personal Info</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_bids.php"><i class="fas fa-gavel me-2"></i><span>My Bids</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="winning_bids.php"><i class="fas fa-trophy me-2"></i><span>Winning Bids</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_orders.php"><i class="fas fa-shopping-cart me-2"></i><span>My Orders</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signout.php"><i class="fas fa-sign-out-alt me-2"></i><span>Sign Out</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="dashboard-card">
                    <h3>Dashboard</h3>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="stat-card">
                                <i class="fas fa-gavel text-primary"></i>
                                <div class="stat-value" id="total-bids"><?php echo $total_bids; ?></div>
                                <div>Total Bids</div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-card">
                                <i class="fas fa-trophy text-success"></i>
                                <div class="stat-value" id="winning-bids"><?php echo $winning_bids; ?></div>
                                <div>Winning Bids</div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-card">
                                <i class="fas fa-shopping-cart text-info"></i>
                                <div class="stat-value" id="my-orders"><?php echo $my_orders; ?></div>
                                <div>My Orders</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card">
                                <i class="fas fa-coins text-warning"></i>
                                <div class="stat-value" id="credits"><?php echo number_format($user['credit'], 2); ?></div>
                                <div>Credits</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bids-card">
                    <h3>My Bids</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Bidding Price</th>
                                    <th>Bidding Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch bids data
                                $stmt = $conn->prepare("
                                    SELECT b.bid_amount, b.bid_time, a.title 
                                    FROM bids b
                                    JOIN auction_items a ON b.item_id = a.id
                                    WHERE b.user_id = ?
                                    ORDER BY b.bid_time DESC
                                ");
                                $stmt->bind_param("i", $user_id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                                        echo "<td>$" . number_format($row['bid_amount'], 2) . "</td>";
                                        echo "<td>" . date("Y-m-d H:i:s", strtotime($row['bid_time'])) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No bids found.</td></tr>";
                                }
                                $stmt->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
include 'footer.php';
?>