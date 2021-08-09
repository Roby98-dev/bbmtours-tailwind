-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2021 at 09:00 PM
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
(13, 'I Kadek Roby Adi Putra', 'roby', 'f99cc4e7daff1b96f7d221bd8d7aedef', 'New-Profile-1409.jpeg', '2021-04-05 19:46:40', 'New-Profile-background-1564.jpg', 1),
(19, 'Eva Ardonis', 'ardonis', 'f99cc4e7daff1b96f7d221bd8d7aedef', 'Profile-User-7818.jpg', '2021-04-05 19:46:40', 'New-Profile-background-3301.jpg', 1),
(20, 'Marta Mulia', 'marta', 'f99cc4e7daff1b96f7d221bd8d7aedef', 'New-Profile-5188.jpg', '2021-04-05 20:02:03', 'New-Profile-background-3071.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `body` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `author` varchar(255) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `slug`, `excerpt`, `body`, `image_name`, `created_at`, `author`, `category_title`, `active`) VALUES
(1, 'First Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quam adipisci quis nostrum rem explicabo nulla quo harum! Quis, adipisci!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum possimus adipisci eveniet quo consequuntur impedit quam cumque itaque tenetur omnis voluptatem repellendus ab, rem sapiente asperiores quidem unde recusandae obcaecati reprehenderit odio aperiam quae exercitationem laboriosam! Aliquam quisquam quidem, reiciendis atque corrupti sint delectus asperiores sit ex, aliquid corporis placeat temporibus perspiciatis! Voluptate perferendis similique odio consectetur nesciunt modi quo nobis excepturi. Magnam, ab consequuntur eum cumque earum dignissimos, ipsum repellendus velit, eaque accusantium dicta a reprehenderit quasi at reiciendis sunt consectetur in deleniti inventore! Earum sapiente fugit itaque omnis aspernatur. Quo nostrum similique quae sunt dignissimos autem illum dolor doloremque quod sint eum consequuntur quia, dolorum non laborum fuga ratione facilis placeat voluptatum. Dolor corporis quo delectus, facere perferendis nostrum neque iusto voluptatum vero, officiis autem quasi perspiciatis eaque. Iste quasi velit ut est deleniti tempora, molestiae reprehenderit eius tenetur quibusdam deserunt magnam, unde fugit, temporibus molestias? Facilis ducimus magni laborum optio architecto non, earum vero. Doloremque aspernatur autem corrupti soluta, officiis quos sint ipsum aperiam alias blanditiis. Sequi inventore exercitationem autem recusandae necessitatibus consectetur magni nobis obcaecati reiciendis tempora sunt omnis, cupiditate sapiente harum quod quaerat vitae amet eligendi iste quidem rem debitis placeat provident aspernatur. Odio, tempora!', 'bg-image-5.jpg', '2021-04-05 16:48:20', 'Roby', 'Tech', 'Yes'),
(3, 'Second-Post', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus molestias nisi atque quidem iure! Omnis excepturi itaque esse odio magni!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque maiores est ipsa dolores assumenda, iste quis, voluptatibus itaque iusto soluta explicabo, nihil ullam animi omnis odio vel. Quidem odit, mollitia ipsam similique earum vel quibusdam voluptas nostrum eius. Ipsam sapiente vitae asperiores voluptatibus culpa, esse commodi dicta voluptas officia tenetur ea quam error quo minus? Sit laudantium perferendis modi repellat accusamus amet vero et ex quasi, dicta recusandae fuga dignissimos dolores laborum illum ullam eligendi, ad veritatis neque. Saepe eum quod, eius non blanditiis nisi! Velit natus pariatur sequi alias. Quam repellat facilis doloremque fugit vero eligendi corporis ab itaque odio minus quo dolores nostrum debitis expedita dolore repudiandae nam praesentium veritatis saepe molestias, incidunt ea accusamus iure! Sit voluptates id minima beatae mollitia aperiam ab architecto ut suscipit! Possimus a iste recusandae nulla magni expedita rem molestias autem nam. Hic ab necessitatibus accusamus odio ex repellat tenetur quidem ipsa, distinctio molestias optio totam eveniet reiciendis maiores asperiores deleniti porro ut dignissimos ad quia perferendis cumque? Dignissimos, porro obcaecati delectus laborum reprehenderit quae hic cum sapiente iusto a nulla? Quas, omnis nam voluptatem possimus ratione voluptas eveniet rem expedita corporis optio quidem porro animi sapiente quaerat repudiandae nemo non! Voluptatum!', 'bg-image-1.jpg', '2021-04-05 17:38:43', 'Arta', 'Romance', 'Yes'),
(4, 'Third Post', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus molestias nisi atque quidem iure! Omnis excepturi itaque esse odio magni!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque maiores est ipsa dolores assumenda, iste quis, voluptatibus itaque iusto soluta explicabo, nihil ullam animi omnis odio vel. Quidem odit, mollitia ipsam similique earum vel quibusdam voluptas nostrum eius. Ipsam sapiente vitae asperiores voluptatibus culpa, esse commodi dicta voluptas officia tenetur ea quam error quo minus? Sit laudantium perferendis modi repellat accusamus amet vero et ex quasi, dicta recusandae fuga dignissimos dolores laborum illum ullam eligendi, ad veritatis neque. Saepe eum quod, eius non blanditiis nisi! Velit natus pariatur sequi alias. Quam repellat facilis doloremque fugit vero eligendi corporis ab itaque odio minus quo dolores nostrum debitis expedita dolore repudiandae nam praesentium veritatis saepe molestias, incidunt ea accusamus iure! Sit voluptates id minima beatae mollitia aperiam ab architecto ut suscipit! Possimus a iste recusandae nulla magni expedita rem molestias autem nam. Hic ab necessitatibus accusamus odio ex repellat tenetur quidem ipsa, distinctio molestias optio totam eveniet reiciendis maiores asperiores deleniti porro ut dignissimos ad quia perferendis cumque? Dignissimos, porro obcaecati delectus laborum reprehenderit quae hic cum sapiente iusto a nulla? Quas, omnis nam voluptatem possimus ratione voluptas eveniet rem expedita corporis optio quidem porro animi sapiente quaerat repudiandae nemo non! Voluptatum!', 'bg-image-2.jpg', '2021-04-05 17:38:43', 'Adonis', 'Bisnis', 'Yes'),
(5, 'Second Post', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus molestias nisi atque quidem iure! Omnis excepturi itaque esse odio magni!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque maiores est ipsa dolores assumenda, iste quis, voluptatibus itaque iusto soluta explicabo, nihil ullam animi omnis odio vel. Quidem odit, mollitia ipsam similique earum vel quibusdam voluptas nostrum eius. Ipsam sapiente vitae asperiores voluptatibus culpa, esse commodi dicta voluptas officia tenetur ea quam error quo minus? Sit laudantium perferendis modi repellat accusamus amet vero et ex quasi, dicta recusandae fuga dignissimos dolores laborum illum ullam eligendi, ad veritatis neque. Saepe eum quod, eius non blanditiis nisi! Velit natus pariatur sequi alias. Quam repellat facilis doloremque fugit vero eligendi corporis ab itaque odio minus quo dolores nostrum debitis expedita dolore repudiandae nam praesentium veritatis saepe molestias, incidunt ea accusamus iure! Sit voluptates id minima beatae mollitia aperiam ab architecto ut suscipit! Possimus a iste recusandae nulla magni expedita rem molestias autem nam. Hic ab necessitatibus accusamus odio ex repellat tenetur quidem ipsa, distinctio molestias optio totam eveniet reiciendis maiores asperiores deleniti porro ut dignissimos ad quia perferendis cumque? Dignissimos, porro obcaecati delectus laborum reprehenderit quae hic cum sapiente iusto a nulla? Quas, omnis nam voluptatem possimus ratione voluptas eveniet rem expedita corporis optio quidem porro animi sapiente quaerat repudiandae nemo non! Voluptatum!', 'bg-image-3.jpg', '2021-04-05 17:39:05', 'Arta', 'Romance', 'Yes'),
(6, 'Third Post', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus molestias nisi atque quidem iure! Omnis excepturi itaque esse odio magni!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque maiores est ipsa dolores assumenda, iste quis, voluptatibus itaque iusto soluta explicabo, nihil ullam animi omnis odio vel. Quidem odit, mollitia ipsam similique earum vel quibusdam voluptas nostrum eius. Ipsam sapiente vitae asperiores voluptatibus culpa, esse commodi dicta voluptas officia tenetur ea quam error quo minus? Sit laudantium perferendis modi repellat accusamus amet vero et ex quasi, dicta recusandae fuga dignissimos dolores laborum illum ullam eligendi, ad veritatis neque. Saepe eum quod, eius non blanditiis nisi! Velit natus pariatur sequi alias. Quam repellat facilis doloremque fugit vero eligendi corporis ab itaque odio minus quo dolores nostrum debitis expedita dolore repudiandae nam praesentium veritatis saepe molestias, incidunt ea accusamus iure! Sit voluptates id minima beatae mollitia aperiam ab architecto ut suscipit! Possimus a iste recusandae nulla magni expedita rem molestias autem nam. Hic ab necessitatibus accusamus odio ex repellat tenetur quidem ipsa, distinctio molestias optio totam eveniet reiciendis maiores asperiores deleniti porro ut dignissimos ad quia perferendis cumque? Dignissimos, porro obcaecati delectus laborum reprehenderit quae hic cum sapiente iusto a nulla? Quas, omnis nam voluptatem possimus ratione voluptas eveniet rem expedita corporis optio quidem porro animi sapiente quaerat repudiandae nemo non! Voluptatum!', 'bg-image-4.jpg', '2021-04-05 17:39:05', 'Adonis', 'Bisnis', 'Yes'),
(7, 'Crud Post 1', 'Test excerpt', 'Test body edit', 'Blog-bbmt-1555.jpg', '2021-04-05 08:11:38', 'Roby', 'Travel', 'Yes'),
(11, 'Cinta Selalu Menemukan Jalanya Untuk Pulang', 'Akan selalu ada yang datang dan pergi, tugas kita hanya menjaga dan merelakan yang pergi.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur deleniti quia reprehenderit, eius beatae recusandae atque. Aut exercitationem consequatur delectus!</p>\r\n\r\n<h1>1. Part Satu</h1>\r\n\r\n<p><img alt=\"Sexy 1\" src=\"http://localhost/php/bbmtours-website-php/public/images/demo/New-blog-image-1715.jpg\" /></p>\r\n', 'New-blog-image-9378.jpg', '2021-04-05 09:13:34', 'roby', 'Travel', 'Yes');

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
(4, 'Pizza', 'Food_Category_790.jpg', 'Yes', 'Yes'),
(5, 'Burger', 'Food_Category_344.jpg', 'Yes', 'Yes'),
(6, 'MoMo', 'Food_Category_77.jpg', 'Yes', 'Yes'),
(8, 'Quia est ipsum id id', 'Food_Category_929.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(3, 'Dumplings Specials', 'Chicken Dumpling with herbs from Mountains', '5.00', 'Food-Name-3649.jpg', 6, 'Yes', 'Yes'),
(4, 'Best Burger', 'Burger with Ham, Pineapple and lots of Cheese.', '4.00', 'Food-Name-6340.jpg', 5, 'Yes', 'Yes'),
(5, 'Smoky BBQ Pizza', 'Best Firewood Pizza in Town.', '6.00', 'Food-Name-8298.jpg', 4, 'No', 'Yes'),
(6, 'Sadeko Momo', 'Best Spicy Momo for Winter', '6.00', 'Food-Name-7387.jpg', 6, 'Yes', 'Yes'),
(7, 'Mixed Pizza', 'Pizza with chicken, Ham, Buff, Mushroom and Vegetables', '10.00', 'Food-Name-7833.jpg', 4, 'Yes', 'Yes'),
(8, 'Sed ipsum cillum in', 'Sed aut officiis qui', '52.00', '', 5, 'No', 'No');

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
(4, 'Mixed Pizza', '10.000', 2, '20.000', '2021-04-05 22:45:59', 'On Delivery', 'I KADEK ROBY ADI PUTRA', '081756876562', 'bbmrobi3@gmail.com', 'denpasar\r\njl nangka selatan gg perkutut no 2 denpasar');

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
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
