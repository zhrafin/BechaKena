<?php
session_start();
require_once 'auth_check.php';

if (!check_auth()) {
    header("Location: signin.php");
    exit();
}

$page_title = "Auction - BechaKena"; // Set this appropriately for each page
include 'header.php';

$user_id = $_SESSION['user_id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bechakenaDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the auction end time from the database
$sql = "SELECT end_time FROM auction_settings WHERE id = 1";
$result = $conn->query($sql);
$auctionEndTime = $result->fetch_assoc()['end_time'];
$endTimestamp = strtotime($auctionEndTime) * 1000; // Convert to milliseconds for JavaScript

// Calculate time remaining
$timeRemaining = strtotime($auctionEndTime) - time();

// Fetch auction items from the database
$sql = "SELECT * FROM auction_items";
$result = $conn->query($sql);

// Fetch user data
$user_id = $_SESSION['user_id'];
$user_sql = "SELECT credit FROM users WHERE id = ?";
$stmt = $conn->prepare($user_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user_data = $user_result->fetch_assoc();
$user_credit = $user_data['credit'];

// Fetch user's bid data
$bid_sql = "SELECT COUNT(*) as total_bids, 
            SUM(CASE WHEN b.bid_amount = ai.current_bid THEN 1 ELSE 0 END) as winning_bids
            FROM bids b
            JOIN auction_items ai ON b.item_id = ai.id
            WHERE b.user_id = ?";
$bid_stmt = $conn->prepare($bid_sql);
$bid_stmt->bind_param("i", $user_id);
$bid_stmt->execute();
$bid_result = $bid_stmt->get_result();
$bid_data = $bid_result->fetch_assoc();
$total_bids = $bid_data['total_bids'];
$winning_bids = $bid_data['winning_bids'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="auction.css">
</head>
<body>
    <div id="auctionTimer" class="text-center my-3">
        <?php
        if ($timeRemaining > 0) {
            echo "Auction Ends In: " . gmdate("H:i:s", $timeRemaining);
        } else {
            echo "AUCTION ENDED";
        }
        ?>
    </div>
    <div class="container my-5">
        <!-- <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Auction Stats</h5>
                        <p class="card-text">Available Credits: $<?php echo number_format($user_credit, 2); ?></p>
                        <p class="card-text">Total Bids: <?php echo $total_bids; ?></p>
                        <p class="card-text">Winning Bids: <?php echo $winning_bids; ?></p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <div class="price-info mb-2">
                            <span class="current-bid">Current Bid: $<?php echo $row['current_bid']; ?></span>
                            <span class="buy-now">Base Price: $<?php echo $row['base_price']; ?></span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Enter your bid" min="<?php echo $row['current_bid'] + 1; ?>">
                            <div class="input-group-append">
                                <button class="btn btn-primary bid-button" type="button" data-item-id="<?php echo $row['id']; ?>" data-current-bid="<?php echo $row['current_bid']; ?>">Submit Bid</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No auction items available at the moment.</p>";
            }
            ?>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="auction1.php">1</a></li>
                <li class="page-item"><a class="page-link" href="auction2.php">2</a></li>
            </ul>
        </nav>
    </div>
    <script>
        //handling bids
        document.addEventListener('DOMContentLoaded', function() {
            const bidButtons = document.querySelectorAll('.bid-button');
            const userCredit = <?php echo $user_credit; ?>;
            bidButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-item-id');
                    const currentBid = parseFloat(this.getAttribute('data-current-bid'));
                    const bidAmount = parseFloat(this.parentElement.previousElementSibling.value);
                    
                    if (bidAmount && bidAmount > currentBid) {
                        if (bidAmount <= userCredit) {
                            fetch('place_bid.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: `item_id=${itemId}&bid_amount=${bidAmount}`
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Bid placed successfully!');
                                    // Update the current bid display
                                    this.closest('.card-body').querySelector('.current-bid').textContent = `Current Bid: $${data.new_bid}`;
                                    // Update the button's data-current-bid attribute
                                    this.setAttribute('data-current-bid', data.new_bid);
                                    // Update user's credit display
                                    document.querySelector('.card-text:first-of-type').textContent = `Available Credits: $${(userCredit - bidAmount).toFixed(2)}`;
                                } else {
                                    alert('Error placing bid: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while placing your bid.');
                            });
                        } else {
                            alert('Insufficient credits to place this bid.');
                        }
                    } else {
                        alert('Please enter a valid bid amount higher than the current bid.');
                    }
                });
            });
        });
    </script>
    <script>
        var countDownDate = <?php echo $endTimestamp; ?>;

        function updateTimer() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("auctionTimer").innerHTML = "AUCTION ENDED";
                // Disable all bid buttons
                document.querySelectorAll('.bid-button').forEach(button => {
                    button.disabled = true;
                });
            } else {
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("auctionTimer").innerHTML = "Auction Ends In: " +
                    hours + "h " + minutes + "m " + seconds + "s ";
            }
        }

        // Update the countdown every 1 second
        var x = setInterval(updateTimer, 1000);

        // Initial call to set the timer immediately
        updateTimer();
    </script>
</body>
</html>
<?php
include 'footer.php';
$conn->close();
?>