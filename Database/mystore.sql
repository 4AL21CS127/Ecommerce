-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 06:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tabel`
--

CREATE TABLE `admin_tabel` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tabel`
--

INSERT INTO `admin_tabel` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Sanjay', '4al21cs127sanjay@gmail.com', '$2y$10$wPHWYI9P9EVGGMKqEllieOK7Bu83NWIfsTgCXsE/XQJ02K634lBke');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(3, ' Big Basket'),
(4, ' Globus'),
(5, ' Puma'),
(6, ' Peter England'),
(8, 'Levis');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(11, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, ' Fruits'),
(5, ' Bags'),
(6, ' Shoes'),
(7, ' Shirts'),
(8, ' Tshirts');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1819079072, 3, 1, 'pending'),
(2, 1, 1897131596, 4, 1, 'pending'),
(3, 1, 1156843894, 5, 1, 'pending'),
(4, 1, 1123557307, 3, 1, 'pending'),
(5, 1, 1385097393, 1, 1, 'pending'),
(6, 1, 1681752414, 5, 1, 'pending'),
(7, 1, 229686419, 5, 1, 'pending'),
(8, 2, 866902675, 4, 1, 'pending'),
(9, 2, 1629290273, 3, 1, 'pending'),
(10, 2, 1244020033, 3, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(6, 'Apple', 'Apples are considered nutrient-dense fruits, meaning they provide a lot of nutrients per serving. ', 'apple,Apple,fresh apple,apples,Apples', 2, 3, 'apple3.jpg', 'apple2.jpeg', 'apple1.webp', '100', '2024-05-03 12:57:15', 'true'),
(7, 'Mangos', 'A mango is an edible stone fruit produced by the tropical tree Mangifera indica. ', 'Mango,Mangos,mango,mangos,fresh mangos,fresh Mangos', 2, 3, 'mago2.jpg', 'Mango.jpg', 'Mango1.webp', '80', '2024-05-03 13:30:56', 'true'),
(8, 'Pineapple', 'The pineapple (Ananas comosus) is a tropical plant with an edible fruit.', 'pineapple,Pineapple,pineapples,Pineapples,fresh pineapples', 2, 3, 'pine1.jpeg', 'pine2.jpeg', 'pine3.jpg', '150', '2024-05-03 13:31:29', 'true'),
(9, 'Shoes', 'Find a wide range of shoes for men and women from various brands.', 'shoes,mens shoes,shoe,Shoe,Shoes,shoes', 6, 5, 'shhh1.jpg', 'shhh2.jpg', 'shhh3.jpg', '500', '2024-05-03 13:37:09', 'true'),
(10, 'Running Shoes', 'Myntra offers a wide range of shoes for men, women and kids from various brands and styles. ', 'shoe,Shoes,shoes,Shoe,mens shoe,Mens shoes', 6, 5, 'shh3.jpg', 'shh2.jpg', 'shh1.jpg', '700', '2024-05-03 13:37:49', 'true'),
(11, 'Spike Shoes', 'You can be spoilt for choices when you are shopping for footwear online due to the extensive collections of brands', 'shoe,mens shoe,Shoes,Shoe,shoes', 6, 5, 'sh2.jpg', 'sh3.jpg', 'sh1.jpg', '950', '2024-05-03 13:05:25', 'true'),
(12, 'Bags', 'Shop for a wide range of bags for men and women online at Myntra. Choose from backpacks', 'Bag,Bags,bag,bags', 5, 4, 'b2.jpg', 'b3.jpg', 'b1.jpg', '560', '2024-05-03 13:34:26', 'true'),
(13, 'Bags for women.', 'Find a wide range of bags for various purposes and occasions on Amazon.in.', 'bags,Bags,bag,Bag', 5, 4, 'bb1.jpg', 'bb2.jpg', 'bb3.jpg', '700', '2024-05-03 13:11:43', 'true'),
(14, 'Bags for travel', 'Zouk offers a wide range of bags for girls, boys, women and men online.', 'bag,bags,Bag,Bags', 5, 4, 'bbb3.jpg', 'bbb2.jpg', 'bbb1.jpg', '800', '2024-05-03 13:35:12', 'true'),
(15, 'Shirt', 'Shop for casual, formal, and overshirts for men from various brands and styles.', 'shirt,shirts,Shirt,Shirts', 7, 6, 'nn2.jpg', 'nn1.jpg', 'nn3.jpg', '400', '2024-05-03 13:19:07', 'true'),
(16, 'Mens Shirts', 'Find shirts for men of all occasions and preferences at AJIO.Choose from formal, casual, ethnic, western', 'shirt,shirts,Shirt,Shirts', 7, 6, 'n1.jpg', 'n2.jpg', 'n3.jpg', '800', '2024-05-03 13:20:18', 'true'),
(17, 'Cotton Shirt', 'Shop for stylish and comfortable shirts for men in various sleeve, collar, and fabric options.', 'shirt,shirts,Shirt,Shirts', 7, 6, 'nnn1.jpg', 'nnn2.jpg', 'nnn3.jpg', '600', '2024-05-03 13:21:20', 'true'),
(18, 'Tshirt', 'Find Shirts, T-Shirts, Baggy Jeans, Trousers, Denim Jackets & Formal Shirts. Transform Your Wardrobe & Treat', 'tshirt,Tshirt,tshirts,Tshirts', 8, 8, 't1.jpg', 't2.jpg', 't3.jpg', '700', '2024-05-03 13:25:01', 'true'),
(19, 'Mens Tshirt', 'Bewakoof.com offers a wide range of stylish and fashionable t-shirts for me.', 'tshirt,Tshirt,tshirts,Tshirts', 0, 0, 'ttt1.jpg', 'ttt2.jpg', 'ttt3.jpg', '800', '2024-05-03 13:40:41', 'true'),
(20, 'T-shirts sleeve', 'Enjoy low prices and get fast, free delivery with Prime on millions of products. ', 'tshirt,tshirts,Tshirt,Tshirts', 0, 0, 'tt2.jpg', 'tt1.jpg', 'tt3.jpg', '500', '2024-05-03 13:41:09', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 2, 150, 1629290273, 1, '2024-05-03 02:24:13', 'Complete'),
(2, 2, 150, 1244020033, 1, '2024-05-03 12:00:42', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 1819079072, 250, 'Netbanking', '2024-05-01 13:29:39'),
(2, 1, 1819079072, 250, 'Pay Offline', '2024-05-01 13:31:18'),
(3, 2, 1897131596, 700, 'Netbanking', '2024-05-01 13:40:49'),
(4, 3, 1156843894, 1750, 'Cash on Delivery', '2024-05-01 13:40:55'),
(5, 4, 1123557307, 150, 'Netbanking', '2024-05-01 13:40:59'),
(6, 1, 1629290273, 150, 'Netbanking', '2024-05-03 02:24:13'),
(7, 2, 1244020033, 150, 'Netbanking', '2024-05-03 12:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'Sanjay', 'sanjay_18@gmail.com', '$2y$10$8O2q6KWb8W0WnrcT1jEIq.cpMB1v5tVwAfBazUmAyQTeX2vMJgkVW', '4AL21CS127_SANJAY R.jpg', '::1', 'Mijar', '8830334279');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
