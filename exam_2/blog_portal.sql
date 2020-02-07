-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 11:08 PM
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
-- Database: `blog_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `parent_cat_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` varchar(555) NOT NULL,
  `cat_image` blob NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_cat_id`, `title`, `meta_title`, `url`, `content`, `cat_image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sports', 'motera cricket', 'www.bcci.com', 'ind vs nz test', '', '2020-02-07 00:00:00', '0000-00-00 00:00:00'),
(2, 5, 'Electronics', 'lenovo', 'www.lenovo.com', 'lenovo laptop', '', '2020-02-07 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Education', 'php', 'www.w3school.com', 'php tutorial', '', '2020-02-07 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 'Entertainment', 'bollywood  movies', 'www.iffa.com', 'bollywood entertainment', '', '2020-02-07 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 'Health', 'civil rajkot', 'www.civil.com/aaa.php', 'malaria illness', '', '2020-02-07 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `parent_cat_id` int(10) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`parent_cat_id`, `cat_name`) VALUES
(1, 'Education'),
(2, 'Sports'),
(3, 'Health'),
(4, 'Entertainment'),
(5, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `published_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `url`, `content`, `category`, `image`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'How to become a good learner...', 'www.goodlearner.com/kkk.php', 'we will learn about....aaa', 'Education', '', '2020-02-13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 5, 'Corona  Health issue', 'www.corona.com', 'rapidlt spreading in asia', 'Health', '', '2020-02-07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 'Fifa worldcup', 'www.fifa.com', 'fifa worldcup was held in 2018.', 'Sports', '', '2020-02-07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 5, 'cybercom training 2020', 'www.cybercom.com', 'php training phase 1', 'Education', '', '2020-02-07', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` bigint(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `information` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `firstname`, `lastname`, `email`, `mobile_number`, `password`, `information`) VALUES
(1, 'Kishan', 'Rank', 'km111@gmail.com', 9687110300, '111', 'asdfghjk'),
(4, 'Bhautik', 'Rank', 'kmr@gmail.com', 9687110311, '111', 'bhautik'),
(5, 'Jay', 'Rammani', 'jay111@gmail.com', 8866883036, '111', 'hello jay'),
(6, 'Kishan', 'Rank', 'kkk@gmail.com', 9687110300, '111', 'sdffd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
