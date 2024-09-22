
# BechaKena - E-Commerce and Auction Platform

## Overview

BechaKena is a dynamic e-commerce platform that integrates auction capabilities with traditional e-commerce functionalities. Users can place bids, win auctions, and manage their orders all within a sleek, modern interface. This application is built using a combination of PHP, HTML, CSS, and JavaScript, with a focus on providing a seamless user experience.

## Features

- **User Authentication**: Secure login and registration system.
- **Profile Management**: Users can update their personal information and profile picture.
- **Auction and Bidding**: Users can participate in auctions and view their bidding history.
- **Order Management**: Users can view and manage their orders.
- **Dashboard**: Provides users with insights into their bids, winning bids, and credits.

## Technologies Used

- **Frontend**:
  - HTML
  - CSS (Bootstrap 5)
  - JavaScript
  - Font Awesome

- **Backend**:
  - PHP
  - MySQL

- **Database Management**:
  - Redis (for caching and session management)

## Installation

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer (for dependency management)
- Redis (for caching and session management)

### Clone the Repository

```bash
git clone https://github.com/zhrafin/bechakena.git
cd bechakena
```

### Setup the Environment

1. **Create a `.env` file** in the root directory and add your database credentials and other environment variables.

2. **Import the Database**:
   - Use the provided SQL scripts to set up the database schema and seed initial data.

3. **Install Dependencies**:
   ```bash
   composer install
   ```

4. **Start the Server**:
   - You can use the built-in PHP server for development purposes:
     ```bash
     php -S localhost:8000
     ```

## Application Structure

- **`public/`**: Contains all the public-facing files, including HTML, CSS, and JavaScript.
- **`includes/`**: Contains PHP files that are included in other PHP files, such as header and footer.
- **`css/`**: Contains CSS files for styling the application.
- **`js/`**: Contains JavaScript files for client-side scripting.
- **`images/`**: Contains images used in the application.
- **`db_connection.php`**: PHP script for database connection.
- **`next_auction.php`**: Page displaying the countdown to the next auction.
- **`my_orders.php`**: Page for users to view their orders.

## Usage

### Next Auction Countdown

The `next_auction.php` page displays a countdown timer for the next auction. The timer updates every second to show the remaining time.

![Next Auction Countdown](path/to/next_auction_screenshot.png) 

### My Orders

The `my_orders.php` page allows users to view their order history. It includes details such as order ID, product name, category, price, order time, quantity, address, and contact information.

![My Orders](path/to/my_orders_screenshot.png)

### Profile Management

Users can update their profile picture and personal information. The profile section also displays user stats such as total bids, winning bids, and available credits.

### Screenshots

<img src="assets/assets/Screenshot_6.png" alt="GUI Screenshot 6" width="700" />

<div style="display: flex; gap: 10px; justify-content: center;">
    <img src="assets/assets/Screenshot_2.png" alt="GUI Screenshot 6" width="400" />
    <img src="assets/assets/Screenshot_3.png" alt="GUI Screenshot 7" width="400" />
</div>

<div style="display: flex; gap: 10px; justify-content: center;">
    <img src="assets/assets/Screenshot_4.png" alt="GUI Screenshot 6" width="400" />
    <img src="assets/assets/Screenshot_5.png" alt="GUI Screenshot 7" width="400" />
</div>


## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a new Pull Request.
