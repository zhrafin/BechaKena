<?php
$page_title = "Contact Us";
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BechaKena - Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="contact_us.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Contact Us</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <img src="images/us/aust.jpg" alt="Contact Us" class="img-fluid mb-4">
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Get in Touch</h4>
                        <p>If you have any questions, comments, or concerns, please feel free to reach out to us. Our customer service team is available to assist you with anything you need.</p>
                        <p><strong>Customer Service Hotline:</strong> 1-800-123-4567</p>
                        <p><strong>Email:</strong> <a href="mailto:service@bechakena.com">service@bechakena.com</a></p>
                        <p><strong>Office Address:</strong> 141 & 142, Love Road, Tejgaon Industrial Area, Dhaka-1208.</p>
                        <p>For general inquiries, please fill out the contact form below, and we will get back to you as soon as possible:</p>
                        <form action="contact_form_handler.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include 'footer.php';
?>