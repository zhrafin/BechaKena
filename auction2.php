<?php
session_start();
$page_title = "Auction - BechaKena";
include 'header.php';

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

// Fetch auction items from the database (second page)
$items_per_page = 12; // Adjust as needed
$page = 2;
$offset = ($page - 1) * $items_per_page;
$sql = "SELECT * FROM auction_items LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
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
                                <button class="btn btn-primary bid-button" type="button" data-item-id="<?php echo $row['id']; ?>">Submit Bid</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p>No more auction items available.</p>";
            }
            ?>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="auction1.php">1</a></li>
                <li class="page-item active"><a class="page-link" href="auction2.php">2</a></li>
            </ul>
        </nav>
    </div>
    <script>
        //handling bids
        document.addEventListener('DOMContentLoaded', function() {
            const bidButtons = document.querySelectorAll('.bid-button');
            bidButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-item-id');
                    const bidAmount = this.parentElement.previousElementSibling.value;
                    
                    if (bidAmount) {
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
                            } else {
                                alert('Error placing bid: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while placing your bid.');
                        });
                    } else {
                        alert('Please enter a valid bid amount.');
                    }
                });
            });
        });
    </script>
    <script>
        //handling bids
        document.addEventListener('DOMContentLoaded', function() {
            const bidButtons = document.querySelectorAll('.bid-button');
            bidButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-item-id');
                    const bidAmount = this.parentElement.previousElementSibling.value;
                    
                    if (bidAmount) {
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
                            } else {
                                alert('Error placing bid: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while placing your bid.');
                        });
                    } else {
                        alert('Please enter a valid bid amount.');
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
