-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2022 at 04:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poinsla-bbm-tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `background_name` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `user_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `image_name`, `created_at`, `background_name`, `user_grade`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.jpg', '2021-04-05 19:46:40', 'New-Profile-background-6030.jpg', 1),
(13, 'I Kadek Roby Adi Putra', 'roby', 'f99cc4e7daff1b96f7d221bd8d7aedef', 'New-Profile-1409.jpeg', '2021-04-05 19:46:40', 'New-Profile-background-3044.jpg', 1),
(19, 'Eva Ardonis', 'ardonis', 'f99cc4e7daff1b96f7d221bd8d7aedef', 'Profile-User-7818.jpg', '2021-04-05 19:46:40', 'New-Profile-background-7732.jpg', 1),
(20, 'Marta Mulia', 'marta', 'f99cc4e7daff1b96f7d221bd8d7aedef', 'New-Profile-5188.jpg', '2021-04-05 20:02:03', 'New-Profile-background-3071.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_category`
--

CREATE TABLE `tbl_blog_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog_category`
--

INSERT INTO `tbl_blog_category` (`id`, `title`, `image_name`, `active`, `featured`) VALUES
(1, 'Travel', 'bg-image-1.jpg', 'Yes', 'Yes'),
(2, 'Tech', 'bg-image-2.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Yogyakarta', 'Food_Category_234.jpg', 'Yes', 'Yes'),
(5, 'Bali', 'Food_Category_226.jpg', 'Yes', 'Yes'),
(6, 'Lombok', 'Food_Category_853.jpg', 'Yes', 'Yes'),
(8, 'NTT', 'Food_Category_889.jpg', 'No', 'Yes'),
(9, 'Jakarta', 'Destination_Category_517.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_day`
--

CREATE TABLE `tbl_day` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_day`
--

INSERT INTO `tbl_day` (`id`, `day`) VALUES
(1, '2 day'),
(2, '3 day');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `category_id`, `title`, `description`, `price`, `image_name`, `featured`, `active`) VALUES
(3, 6, 'Besakih', 'Chicken Dumpling with herbs from Mountains', '5.00', 'Food-Name-3649.jpg', 'Yes', 'Yes'),
(4, 5, 'Batur', 'Burger with Ham, Pineapple and lots of Cheese.', '4.00', 'Food-Name-6340.jpg', 'Yes', 'Yes'),
(5, 4, 'Ubud', 'Best Firewood Pizza in Town.', '6.00', 'Food-Name-8298.jpg', 'No', 'Yes'),
(6, 6, 'Sadeko Momo', 'Best Spicy Momo for Winter', '6.00', 'Food-Name-7387.jpg', 'Yes', 'Yes'),
(7, 4, 'Mixed Pizza', 'Pizza with chicken, Ham, Buff, Mushroom and Vegetables', '10.00', 'Food-Name-7833.jpg', 'Yes', 'Yes'),
(8, 5, 'Sed ipsum cillum in', 'Sed aut officiis qui', '52.00', '', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itinarary`
--

CREATE TABLE `tbl_itinarary` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_itinarary`
--

INSERT INTO `tbl_itinarary` (`id`, `destination_id`, `day_id`, `title`, `image_name`, `created_at`) VALUES
(5, 5, 1, 'Keliling Bangli', 'Profile-User-5611.jpg', '2021-04-14'),
(6, 6, 2, 'Keliling Lombok', 'Profile-User-5611.jpg', '2021-04-15'),
(7, 5, 1, 'Keliling Karangasem', 'Profile-User-5611.jpg', '2021-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Sadeko Momo', '6.000', 3, '18.000', '2020-11-30 03:49:48', 'Cancelled', 'Bradley Farrell', '+1 (576) 504-4657', 'zuhafiq@mailinator.com', 'Duis aliqua Qui lor'),
(2, 'Best Burger', '4.000', 4, '16.000', '2020-11-30 03:52:43', 'Delivered', 'Kelly Dillard', '+1 (908) 914-3106', 'fexekihor@mailinator.com', 'Incidunt ipsum ad d'),
(3, 'Mixed Pizza', '10.000', 2, '20.000', '2020-11-30 04:07:17', 'Delivered', 'Jana Bush', '+1 (562) 101-2028', 'tydujy@mailinator.com', 'Minima iure ducimus'),
(4, 'Mixed Pizza', '10.000', 2, '20.000', '2021-04-05 22:45:59', 'On Delivery', 'I KADEK ROBY ADI PUTRA', '081756876562', 'bbmrobi3@gmail.com', 'denpasar\r\njl nangka selatan gg perkutut no 2 denpasar'),
(5, 'Mixed Pizza', '10.000', 2, '20.000', '2021-04-05 17:22:42', 'Ordered', 'I KADEK ROBY ADI PUTRA', '081756876562', 'bbmrobi3@gmail.com', 'denpasar\r\njl nangka selatan gg perkutut no 2 denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role_name`) VALUES
(1, 'super-user'),
(2, 'reservation'),
(3, 'oprational'),
(4, 'driver'),
(5, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role_grade`
--

CREATE TABLE `tbl_user_role_grade` (
  `id` int(11) NOT NULL,
  `role_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_role_grade`
--

INSERT INTO `tbl_user_role_grade` (`id`, `role_grade`) VALUES
(1, 1),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_day`
--
ALTER TABLE `tbl_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_itinarary`
--
ALTER TABLE `tbl_itinarary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role_grade`
--
ALTER TABLE `tbl_user_role_grade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_day`
--
ALTER TABLE `tbl_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_itinarary`
--
ALTER TABLE `tbl_itinarary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_role_grade`
--
ALTER TABLE `tbl_user_role_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
