<?php
$page_title = isset($page_title) ? $page_title : "BechaKena";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?> - BechaKena</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .navbar {
            height: 10vh;
            padding: 1rem 0;
        }
        .custom-navbar-bg {
            background-color: #ffd166;
            color: #000000;
        }
        .border1:hover {
            border: 1px solid black;
            border-radius: 6px;
            text-decoration-color: black;
            font-weight: bold;
        }
        .w-40 {
            width: 60% !important;
        }
        .nav-search {
            display: flex;
            align-items: center;
        }
        .navbarx {
            font-size: large;
            font-weight: 500;
        }
        .navbar-nav .nav-item .nav-link {
            padding: 0.5rem 1rem;
        }
        .nav-black {
            color: #000 !important;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg custom-navbar-bg">
        <div class="container-fluid">
            <a class="navbar-brand border1" href="index.php"><img src="logo.png" alt="BechaKena Logo" class="img-fluid"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active border1" aria-current="page" href="auction1.php">
                            <i class="fas fa-gavel"></i> <big>Auction</big>
                        </a>
                    </li>
                </ul>
                <form class="d-flex w-40 nav-search" action="search.php" method="GET">
                <select class="form-select me-2 border1" id="categorySelect" onchange="navigateToPage()">
                        <option selected disabled><b>All Categories</b></option>
                        <option value="shoes.php"><b>Shoes</b></option>
                        <option value="smartphone.php"><b>Smartphone</b></option>
                        <option value="sports.php"><b>Sports</b></option>
                        <option value="books.php"><b>Books</b></option>
                        <option value="homeappliance.php"><b>Home Appliance</b></option>
                        <option value="grocery.php"><b>Grocery</b></option>
                        <option value="gadgets.php"><b>Gadgets</b></option>
                        <option value="personalcare.php"><b>Personal Care</b></option>
                        <option value="auction1.php"><b>Auct-Goods</b></option>
                        <option value="chocolates.php"><b>Chocolates</b></option>
                        <option value="paints.php"><b>Paints</b></option>
                        <option value="toys.php"><b>Toys</b></option>
                        <option value="artncraft.php"><b>Art & Craft</b></option>
                        <option value="pets.php"><b>Pets</b></option>
                        <option value="fashion.php"><b>Fashion</b></option>
                        <option value="furniture.php"><b>Furniture</b></option>
                    </select>
                    <input class="form-control me-2 border1" type="search" name="query" placeholder="Search on BechaKena" aria-label="Search">
                    <button class="btn btn-outline-success border1 navbarx" type="submit"><big>Search</big></button>
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link border1 nav-black" href="orders.php">
                            <i class="fas fa-clipboard-list"></i> <big>Order</big>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border1 nav-black" href="cart.php">
                            <i class="fas fa-shopping-cart"></i> <big>Cart</big>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link border1 nav-black" href="personal_info.php">
                                <i class="fas fa-user"></i> <big>Profile</big>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link border1 nav-black" href="signin.php">
                                <i class="fas fa-sign-in-alt"></i> <big>Sign In</big>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>