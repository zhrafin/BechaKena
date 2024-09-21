-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 11:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bechakenadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_items`
--

CREATE TABLE `auction_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `current_bid` decimal(10,2) NOT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `final_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auction_items`
--

INSERT INTO `auction_items` (`id`, `title`, `description`, `image_url`, `base_price`, `current_bid`, `winner_id`, `final_price`) VALUES
(1, 'Cricket Bat of WC23', 'This bat was used in WC23 final match by Warner.', 'images/auction/bat.png', 150.00, 200.00, NULL, NULL),
(2, 'YAMAHA R15 V5', 'Yamaha\'s latest model R15 V5 ash color.', 'images/auction/bike1.png', 5000.00, 5009.00, NULL, NULL),
(3, 'YAMAHA R15 V3', 'This is blue color Yamaha R15 V3.', 'images/auction/bike10.png', 4050.00, 4055.00, NULL, NULL),
(4, 'YAMAHA MT15 V4', 'This is black color Yamaha MT15 V4 for bike passionate lover.', 'images/auction/bike2.png', 6000.00, 6008.00, NULL, NULL),
(5, 'YAMAHA R15 V3', 'Yamaha R15 V3 two year used, good condition, blue color.', 'images/auction/bike3.png', 3500.00, 3510.00, NULL, NULL),
(6, 'LIFAN KPR Red', 'Lifan is a chines bike brand and kpr is the iconic model.', 'images/auction/bike4.png', 2250.00, 2550.00, NULL, NULL),
(7, 'Pulser NS160', 'Bajjaj Pulser NS160 made in Vietnam ash-blue.', 'images/auction/bike5.png', 2000.00, 2050.00, NULL, NULL),
(8, 'Pulser NR160 New', 'Bajjaj Pulser NR160 New is assembled in Bangladesh.', 'images/auction/bike6.png', 2090.00, 2200.00, NULL, NULL),
(9, 'Pulser 150', 'This is the first Pulser 150 model lunched in market.', 'images/auction/bike7.png', 1150.00, 1500.00, NULL, NULL),
(10, 'Apache RTR 160', 'TVS Apache RTR 160, millage 45 kilo per litter.', 'images/auction/bike8.png', 1000.00, 1100.00, NULL, NULL),
(11, 'HORNET V2.0 160', 'HONDA Hornet V2.0 160 made in japan.', 'images/auction/bike9.png', 3000.00, 3100.00, NULL, NULL),
(12, 'BMW G-Power 1200cc', 'BMW G-Power 1200cc five sit privet car.', 'images/auction/car1.png', 50000.00, 55000.00, NULL, NULL),
(13, 'BMW G-Power turbo', 'BMW G-Power 1500cc turbo engine sports car.', 'images/auction/car2.png', 95000.00, 100000.00, NULL, NULL),
(14, 'FERRARI', 'Ferrari 1200cc red sports car.', 'images/auction/car3.png', 85000.00, 100000.00, NULL, NULL),
(15, 'BMW 8 Series', 'BMW 8 series blue color for luxery person.', 'images/auction/car4.png', 1800000.00, 2000000.00, NULL, NULL),
(16, 'Bus', 'Bus for factory use, 40 sit, red color, happy & comfortable trip.', 'images/auction/bus.png', 20000.00, 22000.00, NULL, NULL),
(17, 'House', 'This is a banglo house for personal use or spend vacation.', 'images/auction/house1.png', 150000.00, 200000.00, NULL, NULL),
(18, 'House', 'This is a banglo house for personal use or spend vacation.', 'images/auction/house2.png', 190150.00, 200100.00, NULL, NULL),
(19, 'Land', 'This land is an useful place for building any business.', 'images/auction/land1.png', 90000.00, 100000.00, NULL, NULL),
(20, 'Rabindronath', 'This portrait was drawn by Jaynul Abedin.', 'images/auction/rabindranath.png', 4950.00, 5100.00, NULL, NULL),
(21, 'Diamond Ring', 'This ring was used by british princes.', 'images/auction/ring.png', 1500.00, 2100.00, NULL, NULL),
(22, 'Rollex Watch', 'Luxerious rolex watch for men in black.', 'images/auction/watch1.png', 9150.00, 10100.00, NULL, NULL),
(23, 'Rollex Watch', 'Luxerious Rollex watch in golden color.', 'images/auction/watch2.png', 18150.00, 20100.00, NULL, NULL),
(24, 'Viollin', 'Big Viollin for house to increase beautiful ness.', 'images/auction/viollin.png', 1000.00, 1100.00, NULL, NULL),
(26, 'LG 52\" LED TV', 'LG 52\" LED Smart Google TV. Play Store, Chrome Browser.', 'images/auction/led tv1.png', 150.00, 200.00, NULL, NULL),
(27, 'Samsung LED TV', 'Samsung old model LED FHD 52\" tv. Manufactured in Korea', 'images/auction/led tv2.png', 90.00, 100.00, NULL, NULL),
(28, 'Bravia 66\" Smart TV', 'Sony Bravia 66\" Smart 4K Google TV. Google Assistant', 'images/auction/led tv3.png', 150.00, 200.00, NULL, NULL),
(29, 'Aquas 55\" Smart TV', 'SHARP Aquas 55\" smart FHD google tv, play store available.', 'images/auction/led tv4.png', 120.00, 150.00, NULL, NULL),
(30, 'Bravia bazzle less TV', 'Sony Bravia 66\" bazzle less 4K smart google tv with playstore.', 'images/auction/led tv5.png', 350.00, 400.00, NULL, NULL),
(31, 'LG 4K Smart Tv', 'LG 4K smart google OLED tv 74\" outstanding viewing experience.', 'images/auction/wall tv1.png', 350.00, 400.00, NULL, NULL),
(32, 'TCL FrameLess Smart TV', 'TCL flagship series tv, frameless, smart google tv with playstore.', 'images/auction/wall tv2.png', 450.00, 500.00, NULL, NULL),
(33, 'Old Telephone', 'British period used telephone1 for using home decoration.', 'images/auction/telephone1.png', 150.00, 200.00, NULL, NULL),
(34, 'Old Telephone', 'British period used telephone1 for using home decoration.', 'images/auction/telephone2.png', 150.00, 200.00, NULL, NULL),
(35, 'Old Telephone', 'British period used telephone1 for using home decoration.', 'images/auction/telephone3.png', 150.00, 200.00, NULL, NULL),
(36, 'Old Telephone', 'British period used telephone1 for using home decoration.', 'images/auction/telephone4.png', 150.00, 200.00, NULL, NULL),
(37, 'BMW Skutti 125cc', 'Luxerious BMW Skutti 125cc for women in blue color.', 'images/auction/skuti.png', 1550.00, 1900.00, NULL, NULL),
(38, 'Toyota mini bus', 'Toyota mini bus 1800cc for family trip, long tour.', 'images/auction/mini bus.png', 2150.00, 2800.00, NULL, NULL),
(39, 'Truck 2 Ton', 'Mahindra Truck 2 Ton for factory or industry use.', 'images/auction/truck.png', 4550.00, 5100.00, NULL, NULL),
(40, 'Football of WC22', 'Addidas football used in FIFA WC22 Aus Vs Ned.', 'images/auction/football1.png', 8150.00, 10000.00, NULL, NULL),
(41, 'Football of WC22', 'Addidas football used in FIFA WC22 Aus Vs Ned.', 'images/auction/football2.png', 8850.00, 9000.00, NULL, NULL),
(42, 'Media Fridge', 'Media Fridge made in Japan latest technology.', 'images/auction/fridge1.png', 850.00, 1000.00, NULL, NULL),
(43, 'Samsung 4Door Fridge', 'Samsung Smart IOT built in, 4 door fridge.', 'images/auction/fridge2.png', 150.00, 200.00, NULL, NULL),
(44, 'Samsung Smart Fridge', 'Samsung Smart IOT built in, voice assistant in fridge.', 'images/auction/fridge3.png', 2150.00, 2800.00, NULL, NULL),
(45, 'Argentina Jursy', 'Argentina World Cup winning Jursy WC22.', 'images/auction/jurcy.png', 650.00, 800.00, NULL, NULL),
(46, 'Old Radio', 'Old Radio for home decoration and show pice.', 'images/auction/radio1.png', 350.00, 400.00, NULL, NULL),
(47, 'Old Radio', 'Old Radio for home decoration and show pice.', 'images/auction/radio2.png', 350.00, 400.00, NULL, NULL),
(48, 'Old Radio', 'Old Radio for home decoration and show pice.', 'images/auction/radio3.png', 350.00, 400.00, NULL, NULL),
(49, 'Hublot Watch', 'Hublot luxery watch for professionals.', 'images/auction/watch2.png', 4550.00, 5000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auction_settings`
--

CREATE TABLE `auction_settings` (
  `id` int(11) NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auction_settings`
--

INSERT INTO `auction_settings` (`id`, `end_time`) VALUES
(1, '2024-08-31 12:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bid_amount` decimal(10,2) NOT NULL,
  `bid_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `item_id`, `user_id`, `bid_amount`, `bid_time`) VALUES
(4, 1, 3, 200.00, '2024-08-14 15:58:40'),
(5, 14, 3, 100000.00, '2024-08-14 16:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(3, 3, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hot_deals`
--

CREATE TABLE `hot_deals` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `discounted_price` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hot_deals`
--

INSERT INTO `hot_deals` (`id`, `product_id`, `original_price`, `discounted_price`, `start_date`, `end_date`) VALUES
(17, 1, 100.00, 80.00, '2024-08-01', '2024-09-30'),
(18, 2, 120.00, 95.00, '2024-08-01', '2024-09-30'),
(19, 3, 140.00, 105.00, '2024-08-01', '2024-09-30'),
(20, 4, 160.00, 120.00, '2024-08-01', '2024-09-30'),
(21, 5, 180.00, 135.00, '2024-08-01', '2024-09-30'),
(22, 6, 200.00, 150.00, '2024-08-01', '2024-09-30'),
(23, 7, 220.00, 170.00, '2024-08-01', '2024-09-30'),
(24, 8, 240.00, 190.00, '2024-08-01', '2024-09-30'),
(25, 9, 260.00, 200.00, '2024-08-01', '2024-09-30'),
(26, 10, 280.00, 210.00, '2024-08-01', '2024-09-30'),
(27, 11, 300.00, 220.00, '2024-08-01', '2024-09-30'),
(28, 12, 320.00, 240.00, '2024-08-01', '2024-09-30'),
(29, 13, 340.00, 260.00, '2024-08-01', '2024-09-30'),
(30, 14, 360.00, 270.00, '2024-08-01', '2024-09-30'),
(31, 15, 380.00, 290.00, '2024-08-01', '2024-09-30'),
(32, 16, 400.00, 300.00, '2024-08-01', '2024-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `order_price`, `order_time`, `address`, `contact`) VALUES
(3, 3, 1, 1, 320.00, '2024-08-18 09:51:27', 'Uttara, Dhaka-1230', 12345678),
(4, 3, 10, 1, 550.00, '2024-08-19 05:34:13', 'Uttara, Dhaka-1230', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image_url`) VALUES
(1, 'Gents Boot', 'shoes', 320.00, 'images/products/Shoes/1.jpg'),
(2, 'Ladies Sandal', 'shoes', 120.00, 'images/products/Shoes/2.jpg'),
(3, 'Gents Shoe', 'shoes', 220.00, 'images/products/Shoes/3.jpg'),
(4, 'Sports Shoe', 'shoes', 310.00, 'images/products/Shoes/4.jpg'),
(5, 'Gents Shoe', 'shoes', 220.00, 'images/products/Shoes/5.jpg'),
(6, 'Sports Shoe', 'shoes', 330.00, 'images/products/Shoes/6.jpg'),
(7, 'Gents Shoe', 'shoes', 420.00, 'images/products/Shoes/7.jpg'),
(8, 'Gents Shoe', 'shoes', 520.00, 'images/products/Shoes/8.jpg'),
(9, 'Ladies Hill', 'shoes', 520.00, 'images/products/Shoes/9.jpg'),
(10, 'Long Shoe', 'shoes', 550.00, 'images/products/Shoes/10.jpg'),
(11, 'Long Shoe', 'shoes', 290.00, 'images/products/Shoes/11.jpg'),
(12, 'Sports Shoe', 'shoes', 280.00, 'images/products/Shoes/12.jpg'),
(13, 'Sports Shoe', 'shoes', 320.00, 'images/products/Shoes/13.jpg'),
(14, 'Casual Shoe', 'shoes', 620.00, 'images/products/Shoes/14.jpg'),
(15, 'Nike Shoe', 'shoes', 920.00, 'images/products/Shoes/15.jpg'),
(16, 'Snikkers', 'shoes', 420.00, 'images/products/Shoes/16.jpg'),
(17, 'Deer Handcraft', 'artncraft', 25.00, 'images/products/Art n Crafts/1.jpg'),
(18, 'Wood Craft', 'artncraft', 30.00, 'images/products/Art n Crafts/2.jpg'),
(19, 'Cotton Cushion', 'artncraft', 35.00, 'images/products/Art n Crafts/3.jpg'),
(20, 'Stone Craft', 'artncraft', 40.00, 'images/products/Art n Crafts/4.jpg'),
(21, 'House Art', 'artncraft', 45.00, 'images/products/Art n Crafts/5.jpg'),
(22, 'Nature Art', 'artncraft', 50.00, 'images/products/Art n Crafts/6.jpg'),
(23, 'ForestNature Art', 'artncraft', 55.00, 'images/products/Art n Crafts/7.jpg'),
(24, 'Fabrics Craft', 'artncraft', 60.00, 'images/products/Art n Crafts/8.jpg'),
(25, 'Paper Craft', 'artncraft', 65.00, 'images/products/Art n Crafts/9.jpg'),
(26, 'Craft Design', 'artncraft', 70.00, 'images/products/Art n Crafts/10.jpg'),
(27, 'Bambo Craft', 'artncraft', 75.00, 'images/products/Art n Crafts/11.jpg'),
(28, 'Bambo Craft', 'artncraft', 80.00, 'images/products/Art n Crafts/12.jpg'),
(29, 'Hand Craft', 'artncraft', 85.00, 'images/products/Art n Crafts/13.jpg'),
(30, 'Paper Craft', 'artncraft', 90.00, 'images/products/Art n Crafts/14.jpg'),
(31, 'Paper Craft', 'artncraft', 95.00, 'images/products/Art n Crafts/15.jpg'),
(32, 'Ceramic Craft', 'artncraft', 100.00, 'images/products/Art n Crafts/16.jpg'),
(33, 'White Chocolate', 'chocolate', 5.00, 'images/products/Chocolate/1.jpg'),
(34, 'BnW Chocolate', 'chocolate', 6.00, 'images/products/Chocolate/2.jpg'),
(35, 'Love Chocolate', 'chocolate', 7.00, 'images/products/Chocolate/3.jpg'),
(36, 'Lolypop Chocolate', 'chocolate', 8.00, 'images/products/Chocolate/4.jpg'),
(37, 'Dark Chocolate', 'chocolate', 9.00, 'images/products/Chocolate/5.jpg'),
(38, 'Nut Chocolate', 'chocolate', 10.00, 'images/products/Chocolate/6.jpg'),
(39, 'Kitkat Chocolate', 'chocolate', 11.00, 'images/products/Chocolate/7.jpg'),
(40, 'Chocolate Oreo', 'chocolate', 12.00, 'images/products/Chocolate/8.jpg'),
(41, 'Chocolate Bun', 'chocolate', 13.00, 'images/products/Chocolate/9.jpg'),
(42, 'Choco Strawberry', 'chocolate', 14.00, 'images/products/Chocolate/10.jpg'),
(43, 'Chocolate Cake', 'chocolate', 15.00, 'images/products/Chocolate/11.jpg'),
(44, 'Chocolate Icecream', 'chocolate', 16.00, 'images/products/Chocolate/12.jpg'),
(45, 'Twix Chocolate', 'chocolate', 17.00, 'images/products/Chocolate/13.jpg'),
(46, 'Chocolate Cake', 'chocolate', 18.00, 'images/products/Chocolate/14.jpg'),
(47, 'Dark Chocolate', 'chocolate', 19.00, 'images/products/Chocolate/15.jpg'),
(48, 'D-Milk Chocolate', 'chocolate', 20.00, 'images/products/Chocolate/16.jpg'),
(49, 'Blank T-Shirt', 'fashion', 25.00, 'images/products/Fashion/1.jpg'),
(50, 'Complete Coat', 'fashion', 30.00, 'images/products/Fashion/2.jpg'),
(51, 'Formal Pant', 'fashion', 35.00, 'images/products/Fashion/3.jpg'),
(52, 'Polo T-Shirt', 'fashion', 40.00, 'images/products/Fashion/4.jpg'),
(53, 'Ladies Glass', 'fashion', 45.00, 'images/products/Fashion/5.jpg'),
(54, 'Western Fashion', 'fashion', 50.00, 'images/products/Fashion/6.jpg'),
(55, 'Ladies Glass', 'fashion', 55.00, 'images/products/Fashion/7.jpg'),
(56, 'Sub Glass', 'fashion', 60.00, 'images/products/Fashion/8.jpg'),
(57, 'Mens Hat', 'fashion', 65.00, 'images/products/Fashion/9.jpg'),
(58, 'Zoro Hat', 'fashion', 70.00, 'images/products/Fashion/10.jpg'),
(59, 'Black Coat', 'fashion', 75.00, 'images/products/Fashion/11.jpg'),
(60, 'Girls Fashion', 'fashion', 80.00, 'images/products/Fashion/12.jpg'),
(61, 'Blank T-Shirt', 'fashion', 85.00, 'images/products/Fashion/13.jpg'),
(62, 'Formal Pant', 'fashion', 90.00, 'images/products/Fashion/14.jpg'),
(63, 'Girls Hat', 'fashion', 95.00, 'images/products/Fashion/15.jpg'),
(64, 'Ladies Bag', 'fashion', 100.00, 'images/products/Fashion/16.jpg'),
(65, 'Hatil BookShelf', 'furniture', 150.00, 'images/products/Furniture/1.jpg'),
(66, 'Hatil Chair', 'furniture', 200.00, 'images/products/Furniture/2.jpg'),
(67, 'Furniture Set', 'furniture', 250.00, 'images/products/Furniture/3.jpg'),
(68, 'Sofa Set', 'furniture', 300.00, 'images/products/Furniture/4.jpg'),
(69, 'Wood Chair', 'furniture', 350.00, 'images/products/Furniture/5.jpg'),
(70, 'Furniture Set', 'furniture', 400.00, 'images/products/Furniture/6.jpg'),
(71, 'Hatil Bed', 'furniture', 450.00, 'images/products/Furniture/7.jpg'),
(72, 'Sofa Set', 'furniture', 500.00, 'images/products/Furniture/8.jpg'),
(73, 'Black Sofa Set', 'furniture', 550.00, 'images/products/Furniture/9.jpg'),
(74, 'Kitchen Set', 'furniture', 600.00, 'images/products/Furniture/10.jpg'),
(75, 'Hatil Bed', 'furniture', 650.00, 'images/products/Furniture/11.jpg'),
(76, 'Wood Frame', 'furniture', 700.00, 'images/products/Furniture/12.jpg'),
(77, 'Hatil Chair', 'furniture', 750.00, 'images/products/Furniture/13.jpg'),
(78, 'Wood Table', 'furniture', 800.00, 'images/products/Furniture/14.jpg'),
(79, 'Wood Shelf', 'furniture', 850.00, 'images/products/Furniture/15.jpg'),
(80, 'Hatil Sofa', 'furniture', 900.00, 'images/products/Furniture/16.jpg'),
(81, 'JoyStick', 'gadgets', 150.00, 'images/products/Gadgets/1.jpg'),
(82, 'Wired Earphone', 'gadgets', 200.00, 'images/products/Gadgets/2.jpg'),
(83, 'DSLR Camera', 'gadgets', 250.00, 'images/products/Gadgets/3.jpg'),
(84, 'GoPro ActionCam', 'gadgets', 300.00, 'images/products/Gadgets/4.jpg'),
(85, 'Apple Mouse', 'gadgets', 350.00, 'images/products/Gadgets/5.jpg'),
(86, 'Apple iPad 9', 'gadgets', 400.00, 'images/products/Gadgets/6.jpg'),
(87, 'Apple Macbook Air', 'gadgets', 450.00, 'images/products/Gadgets/7.jpg'),
(88, 'Apple Keyboard', 'gadgets', 500.00, 'images/products/Gadgets/8.jpg'),
(89, 'DJI Drone 1', 'gadgets', 550.00, 'images/products/Gadgets/9.jpg'),
(90, 'Apple Macbook Pro', 'gadgets', 600.00, 'images/products/Gadgets/10.jpg'),
(91, 'Apple iPad 7', 'gadgets', 650.00, 'images/products/Gadgets/11.jpg'),
(92, 'Canon DSLR', 'gadgets', 700.00, 'images/products/Gadgets/12.jpg'),
(93, 'JoySticks', 'gadgets', 750.00, 'images/products/Gadgets/13.jpg'),
(94, 'Apple Watch Series 5', 'gadgets', 800.00, 'images/products/Gadgets/14.jpg'),
(95, 'Boose Headphone', 'gadgets', 850.00, 'images/products/Gadgets/15.jpg'),
(96, 'Galaxy S7 Edge', 'gadgets', 900.00, 'images/products/Gadgets/16.jpg'),
(97, 'Grocery Item 1', 'grocery', 10.00, 'images/products/Grocery/1.jpg'),
(98, 'Grocery Item 2', 'grocery', 15.00, 'images/products/Grocery/2.jpg'),
(99, 'Grocery Item 3', 'grocery', 20.00, 'images/products/Grocery/3.jpg'),
(100, 'Grocery Item 4', 'grocery', 25.00, 'images/products/Grocery/4.jpg'),
(101, 'Grocery Item 5', 'grocery', 30.00, 'images/products/Grocery/5.jpg'),
(102, 'Grocery Item 6', 'grocery', 35.00, 'images/products/Grocery/6.jpg'),
(103, 'Grocery Item 7', 'grocery', 40.00, 'images/products/Grocery/7.jpg'),
(104, 'Grocery Item 8', 'grocery', 45.00, 'images/products/Grocery/8.jpg'),
(105, 'Grocery Item 9', 'grocery', 50.00, 'images/products/Grocery/9.jpg'),
(106, 'Grocery Item 10', 'grocery', 55.00, 'images/products/Grocery/10.jpg'),
(107, 'Grocery Item 11', 'grocery', 60.00, 'images/products/Grocery/11.jpg'),
(108, 'Grocery Item 12', 'grocery', 65.00, 'images/products/Grocery/12.jpg'),
(109, 'Grocery Item 13', 'grocery', 70.00, 'images/products/Grocery/13.jpg'),
(110, 'Grocery Item 14', 'grocery', 75.00, 'images/products/Grocery/14.jpg'),
(111, 'Grocery Item 15', 'grocery', 80.00, 'images/products/Grocery/15.jpg'),
(112, 'Grocery Item 16', 'grocery', 85.00, 'images/products/Grocery/16.jpg'),
(113, 'SubZero Refrigerator', 'homeapp', 100.00, 'images/products/Home App/1.jpg'),
(114, 'Induction Cooker', 'homeapp', 150.00, 'images/products/Home App/2.jpg'),
(115, 'Simance Oven', 'homeapp', 200.00, 'images/products/Home App/3.jpg'),
(116, 'Jar Lamp', 'homeapp', 250.00, 'images/products/Home App/4.jpg'),
(117, 'Washing Machine', 'homeapp', 300.00, 'images/products/Home App/5.jpg'),
(118, 'Porceline Basine', 'homeapp', 350.00, 'images/products/Home App/6.jpg'),
(119, 'Induction Cooker', 'homeapp', 400.00, 'images/products/Home App/7.jpg'),
(120, 'Samsung Refrigerator', 'homeapp', 450.00, 'images/products/Home App/9.jpg'),
(121, 'LG Oven', 'homeapp', 500.00, 'images/products/Home App/10.jpg'),
(122, 'Home Decoration', 'homeapp', 550.00, 'images/products/Home App/8.jpg'),
(123, 'Jar Lamp', 'homeapp', 600.00, 'images/products/Home App/11.jpg'),
(124, 'Kitchen Decoration', 'homeapp', 650.00, 'images/products/Home App/12.jpg'),
(125, 'Hitachi Speaker', 'homeapp', 700.00, 'images/products/Home App/13.jpg'),
(126, 'Kitchen App', 'homeapp', 750.00, 'images/products/Home App/14.jpg'),
(127, 'Water Heater Catlee', 'homeapp', 800.00, 'images/products/Home App/15.jpg'),
(128, '2400W Irone', 'homeapp', 850.00, 'images/products/Home App/16.jpg'),
(129, 'Paint Item 1', 'paint', 100.00, 'images/products/Paints/1.jpg'),
(130, 'Paint Item 2', 'paint', 120.00, 'images/products/Paints/2.jpg'),
(131, 'Paint Item 3', 'paint', 140.00, 'images/products/Paints/3.jpg'),
(132, 'Paint Item 4', 'paint', 160.00, 'images/products/Paints/4.jpg'),
(133, 'Paint Item 5', 'paint', 180.00, 'images/products/Paints/5.jpg'),
(134, 'Paint Item 6', 'paint', 200.00, 'images/products/Paints/6.jpg'),
(135, 'Paint Item 7', 'paint', 220.00, 'images/products/Paints/7.jpg'),
(136, 'Paint Item 8', 'paint', 240.00, 'images/products/Paints/8.jpg'),
(137, 'Paint Item 9', 'paint', 260.00, 'images/products/Paints/9.jpg'),
(138, 'Paint Item 10', 'paint', 280.00, 'images/products/Paints/10.jpg'),
(139, 'Paint Item 11', 'paint', 300.00, 'images/products/Paints/11.jpg'),
(140, 'Paint Item 12', 'paint', 320.00, 'images/products/Paints/12.jpg'),
(141, 'Paint Item 13', 'paint', 340.00, 'images/products/Paints/13.jpg'),
(142, 'Paint Item 14', 'paint', 360.00, 'images/products/Paints/14.jpg'),
(143, 'Paint Item 15', 'paint', 380.00, 'images/products/Paints/15.jpg'),
(144, 'Paint Item 16', 'paint', 400.00, 'images/products/Paints/16.jpg'),
(145, 'Personal Care Item 1', 'personalcare', 100.00, 'images/products/Personal Care/1.jpg'),
(146, 'Personal Care Item 2', 'personalcare', 120.00, 'images/products/Personal Care/2.jpg'),
(147, 'Personal Care Item 3', 'personalcare', 140.00, 'images/products/Personal Care/3.jpg'),
(148, 'Personal Care Item 4', 'personalcare', 160.00, 'images/products/Personal Care/4.jpg'),
(149, 'Personal Care Item 5', 'personalcare', 180.00, 'images/products/Personal Care/5.jpg'),
(150, 'Personal Care Item 6', 'personalcare', 200.00, 'images/products/Personal Care/6.jpg'),
(151, 'Personal Care Item 7', 'personalcare', 220.00, 'images/products/Personal Care/7.jpg'),
(152, 'Personal Care Item 8', 'personalcare', 240.00, 'images/products/Personal Care/8.jpg'),
(153, 'Personal Care Item 9', 'personalcare', 260.00, 'images/products/Personal Care/9.jpg'),
(154, 'Personal Care Item 10', 'personalcare', 280.00, 'images/products/Personal Care/10.jpg'),
(155, 'Personal Care Item 11', 'personalcare', 300.00, 'images/products/Personal Care/11.jpg'),
(156, 'Personal Care Item 12', 'personalcare', 320.00, 'images/products/Personal Care/12.jpg'),
(157, 'Personal Care Item 13', 'personalcare', 340.00, 'images/products/Personal Care/13.jpg'),
(158, 'Personal Care Item 14', 'personalcare', 360.00, 'images/products/Personal Care/14.jpg'),
(159, 'Personal Care Item 15', 'personalcare', 380.00, 'images/products/Personal Care/15.jpg'),
(160, 'Personal Care Item 16', 'personalcare', 400.00, 'images/products/Personal Care/16.jpg'),
(161, 'Three Dogs', 'pet', 100.00, 'images/products/Pets/1.jpg'),
(162, 'Cute Dog', 'pet', 120.00, 'images/products/Pets/2.jpg'),
(163, 'Three Cats', 'pet', 140.00, 'images/products/Pets/3.jpg'),
(164, 'Couple Dog', 'pet', 160.00, 'images/products/Pets/4.jpg'),
(165, '5 Baby Cat', 'pet', 180.00, 'images/products/Pets/5.jpg'),
(166, 'Three Rabbits', 'pet', 200.00, 'images/products/Pets/6.jpg'),
(167, 'Brave Cat', 'pet', 220.00, 'images/products/Pets/7.jpg'),
(168, 'Cute Dog', 'pet', 240.00, 'images/products/Pets/8.jpg'),
(169, 'Baby Cat', 'pet', 260.00, 'images/products/Pets/9.jpg'),
(170, 'Couple Dog', 'pet', 280.00, 'images/products/Pets/10.jpg'),
(171, 'Guard Dog', 'pet', 300.00, 'images/products/Pets/11.jpg'),
(172, 'Adoreable Perot', 'pet', 320.00, 'images/products/Pets/12.jpg'),
(173, 'Baby Dogs', 'pet', 340.00, 'images/products/Pets/13.jpg'),
(174, 'White Cat', 'pet', 360.00, 'images/products/Pets/14.jpg'),
(175, '2 Diffrent Dog', 'pet', 380.00, 'images/products/Pets/15.jpg'),
(176, 'Adoreable Dog', 'pet', 400.00, 'images/products/Pets/16.jpg'),
(177, 'Galaxy S22 Ultra', 'smartphone', 300.00, 'images/products/Smartphone/1.jpg'),
(178, 'Galaxy S21', 'smartphone', 320.00, 'images/products/Smartphone/2.jpg'),
(179, 'Nokia Lumia 1020', 'smartphone', 340.00, 'images/products/Smartphone/3.jpg'),
(180, 'Apple iPhone X', 'smartphone', 360.00, 'images/products/Smartphone/4.jpg'),
(181, 'Galaxy S7 Edge', 'smartphone', 380.00, 'images/products/Smartphone/5.jpg'),
(182, 'Apple iPhone X', 'smartphone', 400.00, 'images/products/Smartphone/6.jpg'),
(183, 'iPhone X Body', 'smartphone', 420.00, 'images/products/Smartphone/7.jpg'),
(184, 'Galaxy S7 Edge', 'smartphone', 440.00, 'images/products/Smartphone/8.jpg'),
(185, 'Apple iPhone 6s', 'smartphone', 460.00, 'images/products/Smartphone/9.jpg'),
(186, 'Galaxy J7 Prime', 'smartphone', 480.00, 'images/products/Smartphone/10.jpg'),
(187, 'Apple iPhone 6', 'smartphone', 500.00, 'images/products/Smartphone/11.jpg'),
(188, 'Galaxy Note 20', 'smartphone', 520.00, 'images/products/Smartphone/12.jpg'),
(189, 'Galaxy S21 Plus', 'smartphone', 540.00, 'images/products/Smartphone/13.jpg'),
(190, 'Apple iPhone 6', 'smartphone', 560.00, 'images/products/Smartphone/14.jpg'),
(191, 'LG G8 ThinQ', 'smartphone', 580.00, 'images/products/Smartphone/15.jpg'),
(192, 'Apple iPhone 11 Pro', 'smartphone', 600.00, 'images/products/Smartphone/16.jpg'),
(193, 'Addidas Football', 'sport', 50.00, 'images/products/Sports/1.jpg'),
(194, 'Nike Football', 'sport', 55.00, 'images/products/Sports/2.jpg'),
(195, 'Addidas Football', 'sport', 60.00, 'images/products/Sports/3.jpg'),
(196, 'Badminton Racket', 'sport', 65.00, 'images/products/Sports/4.jpg'),
(197, 'Cricket Accesories', 'sport', 70.00, 'images/products/Sports/5.jpg'),
(198, 'Tannis Racket', 'sport', 75.00, 'images/products/Sports/6.jpg'),
(199, 'Badminton Racket', 'sport', 80.00, 'images/products/Sports/7.jpg'),
(200, 'Golf Ball', 'sport', 85.00, 'images/products/Sports/8.jpg'),
(201, 'B&W Football', 'sport', 90.00, 'images/products/Sports/9.jpg'),
(202, 'Football no. 5', 'sport', 95.00, 'images/products/Sports/10.jpg'),
(203, 'Sports Cards', 'sport', 100.00, 'images/products/Sports/11.jpg'),
(204, 'Badminton Flower', 'sport', 105.00, 'images/products/Sports/12.jpg'),
(205, 'Cricket Bat', 'sport', 110.00, 'images/products/Sports/13.jpg'),
(206, 'Sports Cards', 'sport', 115.00, 'images/products/Sports/14.jpg'),
(207, 'Addidas Football', 'sport', 120.00, 'images/products/Sports/15.jpg'),
(208, 'Tennis Ball', 'sport', 125.00, 'images/products/Sports/16.jpg'),
(209, 'Toy 1', 'toy', 30.00, 'images/products/Toys/1.jpg'),
(210, 'Toy 2', 'toy', 32.00, 'images/products/Toys/2.jpg'),
(211, 'Toy 3', 'toy', 34.00, 'images/products/Toys/3.jpg'),
(212, 'Toy 4', 'toy', 36.00, 'images/products/Toys/4.jpg'),
(213, 'Toy 5', 'toy', 38.00, 'images/products/Toys/5.jpg'),
(214, 'Toy 6', 'toy', 40.00, 'images/products/Toys/6.jpg'),
(215, 'Toy 7', 'toy', 42.00, 'images/products/Toys/7.jpg'),
(216, 'Toy 8', 'toy', 44.00, 'images/products/Toys/8.jpg'),
(217, 'Toy 9', 'toy', 46.00, 'images/products/Toys/9.jpg'),
(218, 'Toy 10', 'toy', 48.00, 'images/products/Toys/10.jpg'),
(219, 'Toy 11', 'toy', 50.00, 'images/products/Toys/11.jpg'),
(220, 'Toy 12', 'toy', 52.00, 'images/products/Toys/12.jpg'),
(221, 'Toy 13', 'toy', 54.00, 'images/products/Toys/13.jpg'),
(222, 'Toy 14', 'toy', 56.00, 'images/products/Toys/14.jpg'),
(223, 'Toy 15', 'toy', 58.00, 'images/products/Toys/15.jpg'),
(224, 'Toy 16', 'toy', 60.00, 'images/products/Toys/16.jpg'),
(225, 'chatGPT Millionaire', 'book', 15.00, 'images/products/Books/1.jpg'),
(226, 'Funda. of DE', 'book', 17.00, 'images/products/Books/2.jpg'),
(227, 'Atomic Habits', 'book', 19.00, 'images/products/Books/3.jpg'),
(228, 'Nuclear War', 'book', 21.00, 'images/products/Books/4.jpg'),
(229, 'James: A Novel', 'book', 23.00, 'images/products/Books/5.jpg'),
(230, 'Artificial G. Intelligence', 'book', 25.00, 'images/products/Books/6.jpg'),
(231, 'Intro. to Algorithms', 'book', 27.00, 'images/products/Books/7.jpg'),
(232, 'Cloud Computing', 'book', 29.00, 'images/products/Books/8.jpg'),
(233, 'How to Become A St.', 'book', 31.00, 'images/products/Books/9.jpg'),
(234, 'Understanding DL', 'book', 33.00, 'images/products/Books/10.jpg'),
(235, 'Linux Basics for Hacker', 'book', 35.00, 'images/products/Books/11.jpg'),
(236, 'Eloquent JavaScript', 'book', 37.00, 'images/products/Books/12.jpg'),
(237, 'Linux CommandLine', 'book', 39.00, 'images/products/Books/13.jpg'),
(238, 'Python Crash Course', 'book', 41.00, 'images/products/Books/14.jpg'),
(239, 'Python for DataAnalysis', 'book', 43.00, 'images/products/Books/15.jpg'),
(240, 'DataScience From Scratch', 'book', 45.00, 'images/products/Books/16.jpg'),
(241, 'Hot Deal 1', 'Hot Deals', 100.00, 'images/products/Hot Deals/1.jpg'),
(242, 'Hot Deal 2', 'Hot Deals', 120.00, 'images/products/Hot Deals/2.jpg'),
(243, 'Hot Deal 3', 'Hot Deals', 140.00, 'images/products/Hot Deals/3.jpg'),
(244, 'Hot Deal 4', 'Hot Deals', 160.00, 'images/products/Hot Deals/4.jpg'),
(245, 'Hot Deal 5', 'Hot Deals', 180.00, 'images/products/Hot Deals/5.jpg'),
(246, 'Hot Deal 6', 'Hot Deals', 200.00, 'images/products/Hot Deals/6.jpg'),
(247, 'Hot Deal 7', 'Hot Deals', 220.00, 'images/products/Hot Deals/7.jpg'),
(248, 'Hot Deal 8', 'Hot Deals', 240.00, 'images/products/Hot Deals/8.jpg'),
(249, 'Hot Deal 9', 'Hot Deals', 260.00, 'images/products/Hot Deals/9.jpg'),
(250, 'Hot Deal 10', 'Hot Deals', 280.00, 'images/products/Hot Deals/10.jpg'),
(251, 'Hot Deal 11', 'Hot Deals', 300.00, 'images/products/Hot Deals/11.jpg'),
(252, 'Hot Deal 12', 'Hot Deals', 320.00, 'images/products/Hot Deals/12.jpg'),
(253, 'Hot Deal 13', 'Hot Deals', 340.00, 'images/products/Hot Deals/13.jpg'),
(254, 'Hot Deal 14', 'Hot Deals', 360.00, 'images/products/Hot Deals/14.jpg'),
(255, 'Hot Deal 15', 'Hot Deals', 380.00, 'images/products/Hot Deals/15.jpg'),
(256, 'Hot Deal 16', 'Hot Deals', 400.00, 'images/products/Hot Deals/16.jpg'),
(257, 'Bed Sheet 1', 'flash_deals', 50.99, 'images/products/FlashDeals/1.jpg'),
(258, 'Bed Sheet 2', 'flash_deals', 45.99, 'images/products/FlashDeals/2.jpg'),
(259, 'Bed Sheet 3', 'flash_deals', 40.99, 'images/products/FlashDeals/3.jpg'),
(260, 'Smart Band', 'flash_deals', 35.99, 'images/products/FlashDeals/4.jpg'),
(261, 'Amazefit GT3', 'flash_deals', 30.99, 'images/products/FlashDeals/5.jpg'),
(262, 'Sports Cap 1', 'flash_deals', 25.99, 'images/products/FlashDeals/6.jpg'),
(263, 'Sports Cap 2', 'flash_deals', 20.99, 'images/products/FlashDeals/7.jpg'),
(264, 'Sports Cap 3', 'flash_deals', 15.99, 'images/products/FlashDeals/8.jpg'),
(265, 'Stylish Mug', 'flash_deals', 10.99, 'images/products/FlashDeals/9.jpg'),
(266, 'Cofee Mug', 'flash_deals', 55.99, 'images/products/FlashDeals/10.jpg'),
(267, 'Mug for Baby', 'flash_deals', 60.99, 'images/products/FlashDeals/11.jpg'),
(268, 'Laptop Accessories', 'flash_deals', 65.99, 'images/products/FlashDeals/12.jpg'),
(269, 'Philips Trimmer', 'flash_deals', 70.99, 'images/products/FlashDeals/13.jpg'),
(270, 'Oral-B Set', 'flash_deals', 75.99, 'images/products/FlashDeals/14.jpg'),
(271, 'Menicure Set', 'flash_deals', 80.99, 'images/products/FlashDeals/15.jpg'),
(272, 'Ace The DS Interview', 'flash_deals', 85.99, 'images/products/FlashDeals/16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_picture`, `created_at`, `name`, `contact`, `address`, `credit`) VALUES
(3, 'mn_beg', 'naeembeg@gmail.com', '$2y$10$qGWxitEqJPg5zrg9fiRvauRT8TGU0XRwPCbDmM.njO05uSWMB40.K', 'user_uploads/profile_66bc590c340a5.png', '2024-08-14 07:07:37', 'Naeem Beg', '12345678', 'Uttara, Dhaka-1230', 2147382487);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_items`
--
ALTER TABLE `auction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auction_settings`
--
ALTER TABLE `auction_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `hot_deals`
--
ALTER TABLE `hot_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction_items`
--
ALTER TABLE `auction_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `auction_settings`
--
ALTER TABLE `auction_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hot_deals`
--
ALTER TABLE `hot_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `auction_items` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `hot_deals`
--
ALTER TABLE `hot_deals`
  ADD CONSTRAINT `hot_deals_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
