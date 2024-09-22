<?php
session_start();
require_once 'db_connection.php';

// Fetch flash deals from the products table
$stmt = $conn->prepare("SELECT * FROM products WHERE category = 'flash_deals'");
$stmt->execute();
$result = $stmt->get_result();
$flash_deals = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage - BechaKena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="index-style.css">
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
        <div class="navbar-links">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col text-center">
                        <a href="seller_registration.php" class="nav-link">Seller Reg.</a>
                    </div>
                    <div class="col text-center">
                        <a href="next_auction.php" class="nav-link">Next Auction</a>
                    </div>
                    <div class="col text-center">
                        <a href="hot_deals.php" class="nav-link">Hot Deals</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a href="books.php"><img src="images/carousel/3.jpg" class="d-block w-100" alt="books"></a>
              </div>
              <div class="carousel-item">
                <a href="homeappliance.php"><img src="images/carousel/4.jpg" class="d-block w-100" alt="homeappliance"></a>
              </div>
              <div class="carousel-item">
                <a href="gadgets.php"><img src="images/carousel/2.jpg" class="d-block w-100" alt="Gadgets"></a>
              </div>
              <div class="carousel-item">
                <a href="toys.php"><img src="images/carousel/1.jpg" class="d-block w-100" alt="toys"></a>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <br>
          <br>
          <br>
          <h2>Categories</h2>
          <br>
          <div class="container-fluid">
            <div class="row g-0">
                <div class="col-md-3 border2">
                    <a href="shoes.php">
                        <div class="card">
                            <b>Shoes</b>
                            <img src="images/categories/shoes.jpg" class="card-img-top" alt="Shoes">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="smartphone.php">
                        <div class="card">
                            <b>Smartphone</b>
                            <img src="images/categories/smartphone.jpg" class="card-img-top" alt="Smartphone">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="sports.php">
                        <div class="card">
                            <b>Sports</b>
                            <img src="images/categories/sports.jpg" class="card-img-top" alt="Sports">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="books.php">
                        <div class="card">
                            <b>Books</b>
                            <img src="images/categories/books.jpg" class="card-img-top" alt="Books">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="homeappliance.php">
                        <div class="card">
                            <b>Home Appliances</b>
                            <img src="images/categories/home appliance.jpg" class="card-img-top" alt="Home Appliances">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="grocery.php">
                        <div class="card">
                            <b>Grocery</b>
                            <img src="images/categories/grocery.jpg" class="card-img-top" alt="Grocery">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="gadgets.php">
                        <div class="card">
                            <b>Gadgets</b>
                            <img src="images/categories/gadget.jpg" class="card-img-top" alt="Gadgets">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="personalcare.php">
                        <div class="card">
                            <b>Personal Care</b>
                            <img src="images/categories/personal care.jpg" class="card-img-top" alt="Personal Care">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="auction1.php">
                        <div class="card">
                            <b>Auct-Goods</b>
                            <img src="images/categories/auction.jpg" class="card-img-top" alt="Auct-Goods">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="chocolates.php">
                        <div class="card">
                            <b>Chocolates</b>
                            <img src="images/categories/chocolates.jpg" class="card-img-top" alt="Chocolates">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="paints.php">
                        <div class="card">
                            <b>Paints</b>
                            <img src="images/categories/paints.jpg" class="card-img-top" alt="Paints">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="toys.php">
                        <div class="card">
                            <b>Toys</b>
                            <img src="images/categories/toys.jpg" class="card-img-top" alt="Toys">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="artncraft.php">
                        <div class="card">
                            <b>Art & Craft</b>
                            <img src="images/categories/art and craft.jpg" class="card-img-top" alt="Art & Craft">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="pets.php">
                        <div class="card">
                            <b>Pets</b>
                            <img src="images/categories/pets.jpg" class="card-img-top" alt="Pets">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="fashion.php">
                        <div class="card">
                            <b>Fashion</b>
                            <img src="images/categories/fashion.jpg" class="card-img-top" alt="Fashion">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 border2">
                    <a href="furniture.php">
                        <div class="card">
                            <b>Furniture</b>
                            <img src="images/categories/furniture.jpg" class="card-img-top" alt="Furniture">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <h2>Flash Deals</h2>
        <div class="container-fluid">
            <div class="row g-0">
                <?php foreach ($flash_deals as $deal): ?>
                <div class="col-md-3">
                    <div class="card flash-deal-card">
                        <img src="<?php echo htmlspecialchars($deal['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($deal['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($deal['name']); ?></h5>
                            <p class="card-price">$<?php echo number_format($deal['price'], 2); ?></p>
                            <a href="add_to_cart.php?id=<?php echo $deal['id']; ?>" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <br>
    <br>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="about.php">About Us</a>
                </div>
                <div class="col-md-3">
                    <a href="customer_service.php">Customer Service</a>
                </div>
                <div class="col-md-3">
                    <a href="terms.php">Terms & Conditions</a>
                </div>
                <div class="col-md-3">
                    <a href="contact_us.php">Contact Us</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <p>&copy; 2024 BechaKena. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.getElementById('categorySelect').addEventListener('change', function() {
            var selectedPage = this.value;
            if (selectedPage) {
                window.location.href = selectedPage;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>