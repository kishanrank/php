-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 11:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_category` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `url_key`, `image`, `status`, `description`, `parent_category`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', 'electronic', 'electronics.jpg', 1, 'All Electronics Items', '0', '2020-02-16 10:20:30', '0000-00-00 00:00:00'),
(2, 'Furniture', 'furniture', 'furniture.jfif', 1, 'Wooden furniture products', '0', '2020-02-16 10:21:07', '0000-00-00 00:00:00'),
(3, 'Books', 'books', 'books.png', 1, 'All Books', '0', '2020-02-16 10:21:38', '0000-00-00 00:00:00'),
(4, 'Clothes', 'clothes', 'clothes.png', 1, 'All Clothes', '0', '2020-02-16 10:22:29', '0000-00-00 00:00:00'),
(5, 'Mobile', 'mobile', 'Mobile.png', 1, 'Honor mobiles', '1', '2020-02-16 10:22:53', '2020-02-16 10:23:39'),
(6, 'Laptop', 'laptop', 'laptop.png', 1, 'laptop with 16.6 inch', '1', '2020-02-16 10:23:20', '0000-00-00 00:00:00'),
(7, 'General Knowledge', 'gk', 'general  knowledge.jpg', 1, 'General KnwledgE Books', '3', '2020-02-16 10:26:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(10) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `content` varchar(555) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `page_title`, `url_key`, `status`, `content`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'aboutus', 1, 'This website is represented by the Shubham Group of Business Rajkot. We are dedicated to provide valuable products to customers.', '2020-02-17 10:25:09', '2020-02-18 09:38:28'),
(4, 'Home Page', 'home', 1, 'This is Home Page of Shubham provision store Rajkot.\r\n\r\nWe are selling all type of product online at reasonable price.\r\n\r\nWe also provide Home delivery at nominal shipping price.', '2020-02-17 01:06:27', '2020-02-17 01:06:57'),
(5, 'Contact Us', 'contactus', 1, 'Shubham provision store, morbi road, Rajkot.\r\nMobile : 9687110300\r\nEmail :  info@shubhamprovision.in\r\nlinked-in : shubham provision.', '2020-02-18 09:40:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `description` varchar(512) NOT NULL,
  `short_description` varchar(512) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `sku`, `url_key`, `image`, `status`, `description`, `short_description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo Laptop', 'lenovog50', 'lenovog50', 'lenovog50.jpg', 1, 'Lenovo G50 laptop i3 series', 'This laptop contains 4GB of ram and 1TB of HDD.', 28000, 20, '2020-02-16 10:27:33', '0000-00-00 00:00:00'),
(2, 'Apple iphone 11', 'ip11', 'iphone', 'Apple-iPhone-11.jpg', 1, 'Apple iphone 11 32 gb black', 'Apple iphone 11 32 gb black with triple camara and face recognisation', 62000, 20, '2020-02-16 10:28:50', '0000-00-00 00:00:00'),
(3, 'Sofa', 'sofa', 'sofa', 'sofa.jfif', 1, 'Green color sofa', 'Green color sofa', 100000, 10, '2020-02-16 10:29:34', '0000-00-00 00:00:00'),
(4, 'Physics Books', 'physics', 'physics', 'physics.jpg', 1, 'Physics Books for Engineering', 'Physics Books for Engineering', 222, 20, '2020-02-16 10:30:52', '0000-00-00 00:00:00'),
(5, 'Dining Table', 'dining', 'diningtable', 'dining-table.jpg', 1, 'Woooden Dining table', 'Wooden dining table for 6 people', 20000, 15, '2020-02-16 10:31:38', '0000-00-00 00:00:00'),
(6, 'Honor 9N', 'hh9n', 'hh9n', 'honor-9n.jpg', 1, 'Honor 9N 32 gb lite blue', 'This phone is represented by huawei company with 32gb rom and 4gb ram, starting at 10000.', 9000, 10, '2020-02-17 04:20:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 2),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `password`) VALUES
(1, 'kishan', '9687110300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `products_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_categories_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
