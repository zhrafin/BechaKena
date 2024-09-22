<?php
// next_auction.php
$page_title = "Next Auction";
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BechaKena - Next Auction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="next_auction.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="auction-timer">
                    <h1>Next Auction Starting In</h1>
                    <div id="countdown" class="countdown">
                        <div class="time">
                            <span id="days">00</span>
                            <p>Days</p>
                        </div>
                        <div class="time">
                            <span id="hours">00</span>
                            <p>Hours</p>
                        </div>
                        <div class="time">
                            <span id="minutes">00</span>
                            <p>Minutes</p>
                        </div>
                        <div class="time">
                            <span id="seconds">00</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                    <p id="stay-tuned" class="stay-tuned">Stay tuned for the next auction!</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set the date and time for the next auction
        var nextAuctionDate = new Date("Jul 1, 2024 15:00:00").getTime();

        // Update the countdown every 1 second
        var countdownInterval = setInterval(function() {
            // Get the current date and time
            var now = new Date().getTime();

            // Calculate the distance between now and the next auction date
            var distance = nextAuctionDate - now;

            // Time calculations for days, hours, minutes, and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the corresponding elements
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            document.getElementById("seconds").innerHTML = seconds;

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "The auction has started!";
                document.getElementById("stay-tuned").style.display = "none";
            } else {
                document.getElementById("stay-tuned").style.display = "block";
            }
        }, 1000);
    </script>
</body>
</html>
<?php
include 'footer.php';
?>
