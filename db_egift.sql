-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 04:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_egift`
--

-- --------------------------------------------------------

--
-- Table structure for table `eg_about`
--

CREATE TABLE `eg_about` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `history` text NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact_no` varchar(191) NOT NULL,
  `facebook` varchar(191) NOT NULL,
  `twitter` varchar(191) NOT NULL,
  `instagram` varchar(191) NOT NULL,
  `yahoo` varchar(191) NOT NULL,
  `terms_and_condition` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_about`
--

INSERT INTO `eg_about` (`id`, `logo`, `description`, `address`, `mission`, `vision`, `history`, `email`, `contact_no`, `facebook`, `twitter`, `instagram`, `yahoo`, `terms_and_condition`, `privacy_policy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/default/eGiftRewards-logo-app-icon-colored.png', '<h1>About Us</h1><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas quisquam, expedita aspernatur alias repellat consequatur nesciunt officiis voluptatum, modi rerum reprehenderit dignissimos quae nemo vero temporibus totam magni exercitationem minima.&nbsp;<a href=\"http://localhost/egift/dashboard\" target=\"_blank\">visit our site</a></p>', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas quisquam, expedita aspernatur alias repellat consequatur nesciunt officiis voluptatum, modi rerum reprehenderit dignissimos quae nemo vero temporibus totam magni exercitationem minima.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas quisquam, expedita aspernatur alias repellat consequatur nesciunt officiis voluptatum, modi rerum reprehenderit dignissimos quae nemo vero temporibus totam magni exercitationem minima.\r\n', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas quisquam, expedita aspernatur alias repellat consequatur nesciunt officiis voluptatum, modi rerum reprehenderit dignissimos quae nemo vero temporibus totam magni exercitationem minima.\r\n', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas quisquam, expedita aspernatur alias repellat consequatur nesciunt officiis voluptatum, modi rerum reprehenderit dignissimos quae nemo vero temporibus totam magni exercitationem minima.\r\n', 'admin@gmail.com', '12345678911', 'admin@facebook', 'admin@twitter', 'admin@IG', 'admin@yahoo.com', 'the terms', 'policy', 0, '2019-03-14 14:30:03', '2019-03-31 02:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `eg_account_request`
--

CREATE TABLE `eg_account_request` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `telephone_no` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_branches`
--

CREATE TABLE `eg_branches` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `latitude` varchar(32) NOT NULL,
  `longitude` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_branches`
--

INSERT INTO `eg_branches` (`id`, `merchant_id`, `name`, `description`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(4, 53, 'alley carmona', 'alley carmona description', '100', '200', 0, '2019-05-24 09:15:54', '2019-05-24 09:15:54'),
(5, 53, 'alley san pedro', 'alley san pedro Description', '300', '100', 0, '2019-05-24 09:16:16', '2019-05-24 09:16:16'),
(6, 51, 'viking cavite', 'viking cavite Description', '200', '10022', 0, '2019-05-24 09:27:04', '2019-05-24 09:27:04'),
(7, 51, 'vikings laguna', 'vikings laguna Description', '123123', '653453', 0, '2019-05-24 09:27:20', '2019-05-24 09:27:20'),
(8, 52, 'niu alabang', 'niu alabang Description', '222', '333', 0, '2019-05-24 09:33:07', '2019-05-24 09:33:07'),
(9, 52, 'niu makati', 'niu makati description', '2000', '1000', 0, '2019-05-24 09:33:26', '2019-05-24 09:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `eg_category`
--

CREATE TABLE `eg_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_discount_setting`
--

CREATE TABLE `eg_discount_setting` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `benchmark_amount` float(10,2) NOT NULL,
  `percentage_discount` float(10,2) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_egift`
--

CREATE TABLE `eg_egift` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `referral_code` varchar(128) NOT NULL,
  `orig_price` float(10,2) NOT NULL,
  `sale_price` float(10,2) NOT NULL,
  `image` text NOT NULL,
  `qr_code` varchar(128) NOT NULL,
  `qr_image` text NOT NULL,
  `promo` tinyint(1) NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_egift`
--

INSERT INTO `eg_egift` (`id`, `merchant_id`, `category_id`, `name`, `description`, `stock`, `referral_code`, `orig_price`, `sale_price`, `image`, `qr_code`, `qr_image`, `promo`, `start_at`, `end_at`, `status`, `created_at`, `updated_at`) VALUES
(11, 53, 0, 'alley sale', 'alley sale description', 22, '', 0.00, 0.00, 'uploads/egifts/vikings.png', '5uLciUuCyz', 'uploads/QR/991d215c7408fbc167fb61725f4001c8.png', 0, '1970-01-01', '1970-01-01', 1, '2019-05-24 09:23:33', '2019-05-24 11:31:02'),
(12, 53, 0, 'alley sale part 2', 'alley sale part 2 desciption', 100, '', 0.00, 0.00, 'uploads/egifts/vikings.png', 'B0R7JLvLfz', 'uploads/QR/7cdf83177a8f35bbd3c592338abb1677.png', 1, '2019-02-05', '2019-05-24', 1, '2019-05-24 09:25:39', '2019-05-24 11:30:59'),
(13, 51, 0, 'vikings sale', 'vikings sale  Description', 1000, '', 0.00, 0.00, 'uploads/egifts/vikings.png', '8yem60xr-N', 'uploads/QR/61b87da983705b8c0902eed08cb1b9ec.png', 0, '1970-01-01', '1970-01-01', 1, '2019-05-24 09:29:23', '2019-05-24 11:30:56'),
(14, 51, 0, 'vikings sale part 2', 'vikings sale part 2 description', 20000, '', 0.00, 0.00, 'uploads/egifts/vikings.png', 'BVg-2oz0Hy', 'uploads/QR/afef192f4b5742763f78e733bdcc79bf.png', 1, '2019-05-24', '2019-06-20', 1, '2019-05-24 09:30:47', '2019-05-24 11:30:53'),
(15, 52, 0, 'niu sale', 'niu sale Description', 100, '', 0.00, 0.00, 'uploads/egifts/niu.png', 'kHnWQ6QYs9', 'uploads/QR/d4c4bd4530406b221d852b27487d118b.png', 0, '1970-01-01', '1970-01-01', 1, '2019-05-24 09:35:04', '2019-05-24 09:37:36'),
(16, 52, 0, 'niu sale part2', 'niu sale part2 Description', 999, '', 0.00, 0.00, 'uploads/egifts/niu.png', 'shONu1QOVo', 'uploads/QR/62f307a5ec6d18c7bd4e9369c2ab8c63.png', 1, '2019-05-24', '2019-09-20', 1, '2019-05-24 09:36:04', '2019-05-24 11:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `eg_egift_branches`
--

CREATE TABLE `eg_egift_branches` (
  `id` int(11) NOT NULL,
  `egift_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_egift_branches`
--

INSERT INTO `eg_egift_branches` (`id`, `egift_id`, `branch_id`) VALUES
(6, 11, 4),
(7, 11, 5),
(8, 12, 5),
(9, 13, 6),
(10, 13, 7),
(11, 15, 8),
(12, 15, 9),
(13, 16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `eg_egift_freebies`
--

CREATE TABLE `eg_egift_freebies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `egift_id` int(11) NOT NULL,
  `freebies_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_egift_freebies`
--

INSERT INTO `eg_egift_freebies` (`id`, `user_id`, `egift_id`, `freebies_id`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(7, 53, 11, 5, 2, 0, '2019-05-24 09:18:41', '2019-05-24 09:23:33'),
(8, 53, 11, 4, 4, 0, '2019-05-24 09:18:45', '2019-05-24 09:23:33'),
(9, 53, 12, 5, 22, 0, '2019-05-24 09:25:37', '2019-05-24 09:25:39'),
(10, 51, 13, 7, 11, 0, '2019-05-24 09:29:16', '2019-05-24 09:29:24'),
(11, 51, 13, 6, 200, 0, '2019-05-24 09:29:21', '2019-05-24 09:29:24'),
(12, 51, 14, 7, 1, 0, '2019-05-24 09:30:42', '2019-05-24 09:30:48'),
(13, 51, 14, 6, 1, 0, '2019-05-24 09:30:45', '2019-05-24 09:30:48'),
(14, 52, 15, 8, 2, 0, '2019-05-24 09:35:00', '2019-05-24 09:35:05'),
(15, 52, 15, 9, 2, 0, '2019-05-24 09:35:02', '2019-05-24 09:35:05'),
(16, 52, 16, 8, 4, 0, '2019-05-24 09:35:58', '2019-05-24 09:36:04'),
(17, 52, 16, 9, 5, 0, '2019-05-24 09:36:00', '2019-05-24 09:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `eg_egift_usage`
--

CREATE TABLE `eg_egift_usage` (
  `id` int(11) NOT NULL,
  `egift_id` int(11) NOT NULL,
  `date_used` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_faq`
--

CREATE TABLE `eg_faq` (
  `id` int(11) NOT NULL,
  `question` varchar(191) NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_follower`
--

CREATE TABLE `eg_follower` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_freebies`
--

CREATE TABLE `eg_freebies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `qty` float(10,2) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_freebies`
--

INSERT INTO `eg_freebies` (`id`, `user_id`, `name`, `description`, `category_id`, `supplier_id`, `unit_id`, `price`, `qty`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 53, 't-shirt', 't-shirt description', 0, 0, 0, 0.00, 0.00, 'uploads/freebies/mailman.jpg', 0, '2019-05-24 09:16:51', '2019-05-24 09:16:51'),
(5, 53, 'digital devices', 'digital devices description', 0, 0, 0, 0.00, 0.00, 'uploads/freebies/Mobile-Device.png', 0, '2019-05-24 09:17:41', '2019-05-24 09:17:41'),
(6, 51, 'TV screen', 'mouse description', 0, 0, 0, 0.00, 0.00, 'uploads/freebies/MediaTechnology.jpg', 0, '2019-05-24 09:28:02', '2019-05-24 09:28:02'),
(7, 51, 'alarm clock', 'alarm clock description', 0, 0, 0, 0.00, 0.00, 'uploads/freebies/time-consuming.png', 0, '2019-05-24 09:28:26', '2019-05-24 09:28:26'),
(8, 52, '100mb internet', '100mb internet description\r\n', 0, 0, 0, 0.00, 0.00, 'uploads/freebies/stock-internet.jpg', 0, '2019-05-24 09:34:06', '2019-05-24 09:34:06'),
(9, 52, 'umbrella', 'umbrella Description', 0, 0, 0, 0.00, 0.00, 'uploads/freebies/FILE-PHOTO-People-shop-at-a-street-market-in-Divisoria-Manila.jpg', 0, '2019-05-24 09:34:29', '2019-05-24 09:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `eg_icon`
--

CREATE TABLE `eg_icon` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_icon`
--

INSERT INTO `eg_icon` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fa fa-adjust', 9, '2019-03-07 14:42:57', '2019-03-07 15:30:40'),
(2, 'fa fa-anchor', 9, '2019-03-07 14:42:57', '2019-03-07 15:34:06'),
(3, 'fa fa-archive', 9, '2019-03-07 14:42:57', '2019-03-07 15:35:15'),
(4, 'fa fa-area-chart', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(5, 'fa fa-arrows', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(6, 'fa fa-arrows-h', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(7, 'fa fa-arrows-v', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(8, 'fa fa-asterisk', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(9, 'fa fa-at', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(10, 'fa fa-automobile', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(11, 'fa fa-balance-scale	', 0, '2019-03-07 14:42:57', '2019-03-07 14:42:57'),
(12, 'fa fa-shopping-cart', 0, '2019-03-07 15:31:15', '2019-03-07 15:31:15'),
(13, 'fa fa-dashboard', 0, '2019-03-09 16:39:27', '2019-03-09 16:39:27'),
(14, 'fa fa-cog', 0, '2019-03-09 16:59:58', '2019-03-09 16:59:58'),
(15, 'fa fa-money', 0, '2019-03-10 05:15:54', '2019-03-10 05:15:54'),
(16, 'fa fa-user', 0, '2019-03-10 06:36:39', '2019-03-10 06:36:39'),
(17, 'fa fa-info', 0, '2019-03-16 14:24:09', '2019-03-16 14:24:09'),
(18, 'fa fa-group', 0, '2019-05-04 05:52:18', '2019-05-04 05:52:18'),
(19, 'fa fa-industry', 0, '2019-05-04 05:52:54', '2019-05-04 05:52:54'),
(20, 'fa fa-bell', 0, '2019-05-04 05:55:02', '2019-05-04 05:55:02'),
(21, 'fa fa-gift', 0, '2019-05-04 05:56:04', '2019-05-04 05:56:04'),
(22, 'fa fa-star', 0, '2019-05-04 05:57:19', '2019-05-04 05:57:19'),
(23, 'fa fa-navicon', 0, '2019-05-04 05:58:29', '2019-05-04 05:58:29'),
(24, 'fa fa-building', 0, '2019-05-04 06:00:02', '2019-05-04 06:00:02'),
(25, 'fa fa-user-secret', 0, '2019-05-04 06:00:37', '2019-05-04 06:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `eg_measurement`
--

CREATE TABLE `eg_measurement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_month`
--

CREATE TABLE `eg_month` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_month`
--

INSERT INTO `eg_month` (`id`, `name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `eg_nature_of_business`
--

CREATE TABLE `eg_nature_of_business` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `icon_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` tinytext,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_nature_of_business`
--

INSERT INTO `eg_nature_of_business` (`id`, `user_id`, `icon_id`, `name`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Food and Restaurant', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-01.jpg', 'test', 0, '2019-04-21 14:49:52', '2019-05-20 14:52:34'),
(2, 1, 6, 'Entertainment', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-02.jpg', 'sports', 0, '2019-04-21 15:34:27', '2019-05-24 09:10:12'),
(3, 1, 5, 'Health and Beauty', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-03.jpg', 'test', 0, '2019-04-24 14:53:56', '2019-05-20 14:52:21'),
(4, 1, 0, 'Fashion and Accessories', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-04.jpg', '', 0, '2019-05-20 12:53:49', '2019-05-24 09:10:21'),
(5, 1, 0, 'Electronics', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-05.jpg', '', 0, '2019-05-20 12:54:15', '2019-05-24 09:10:25'),
(6, 1, 0, 'Vehicles', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-06.jpg', '', 0, '2019-05-20 12:54:25', '2019-05-24 09:10:30'),
(7, 1, 0, 'General Merchandise', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-07.jpg', '', 0, '2019-05-20 12:54:41', '2019-05-24 09:10:34'),
(8, 1, 0, 'Home and Living', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-08.jpg', '', 0, '2019-05-20 12:54:48', '2019-05-24 09:10:45'),
(9, 1, 0, 'Sport and Outdoor', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-09.jpg', '', 0, '2019-05-20 12:54:58', '2019-05-24 09:10:49'),
(10, 1, 0, 'Jewelry', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-10.jpg', '', 0, '2019-05-20 12:55:07', '2019-05-24 09:10:52'),
(11, 1, 0, 'Travel', 'http://192.168.1.4:8080/egift/uploads/categories/category-thumb-12.jpg', '', 0, '2019-05-20 12:55:12', '2019-05-24 09:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `eg_order`
--

CREATE TABLE `eg_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `egift_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_personnel`
--

CREATE TABLE `eg_personnel` (
  `id` int(11) NOT NULL,
  `fullname` varchar(191) NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `self_description` text NOT NULL,
  `inspiring_message` text NOT NULL,
  `logo` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_point_management`
--

CREATE TABLE `eg_point_management` (
  `id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `benchmark` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_price_variety`
--

CREATE TABLE `eg_price_variety` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `egift_id` int(11) NOT NULL,
  `orig_price` float(10,2) NOT NULL,
  `sale_price` float(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_price_variety`
--

INSERT INTO `eg_price_variety` (`id`, `user_id`, `egift_id`, `orig_price`, `sale_price`, `status`, `created_at`, `updated_at`) VALUES
(12, 53, 11, 100.00, 90.00, 0, '2019-05-24 09:18:12', '2019-05-24 09:23:33'),
(13, 53, 11, 200.00, 178.00, 0, '2019-05-24 09:18:28', '2019-05-24 09:23:33'),
(14, 53, 11, 300.00, 264.00, 0, '2019-05-24 09:18:36', '2019-05-24 09:23:33'),
(15, 53, 12, 100.00, 88.00, 0, '2019-05-24 09:25:32', '2019-05-24 09:25:39'),
(16, 51, 13, 100.00, 90.00, 0, '2019-05-24 09:28:55', '2019-05-24 09:29:24'),
(17, 51, 13, 200.00, 170.00, 0, '2019-05-24 09:29:04', '2019-05-24 09:29:24'),
(18, 51, 13, 500.00, 400.00, 0, '2019-05-24 09:29:11', '2019-05-24 09:29:24'),
(19, 51, 14, 100.00, 85.00, 0, '2019-05-24 09:30:27', '2019-05-24 09:30:48'),
(20, 51, 14, 500.00, 400.00, 0, '2019-05-24 09:30:35', '2019-05-24 09:30:48'),
(21, 52, 15, 1000.00, 890.00, 0, '2019-05-24 09:34:50', '2019-05-24 09:35:05'),
(22, 52, 15, 2000.00, 1760.00, 0, '2019-05-24 09:34:57', '2019-05-24 09:35:05'),
(23, 52, 16, 150.00, 133.50, 0, '2019-05-24 09:35:43', '2019-05-24 09:36:04'),
(24, 52, 16, 250.00, 220.00, 0, '2019-05-24 09:35:48', '2019-05-24 09:36:04'),
(25, 52, 16, 1000.00, 700.00, 0, '2019-05-24 09:35:54', '2019-05-24 09:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `eg_profile`
--

CREATE TABLE `eg_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `tel_no` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `logo` text NOT NULL,
  `allowed_egifts` int(11) NOT NULL,
  `nature_of_business` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_profile`
--

INSERT INTO `eg_profile` (`id`, `user_id`, `name`, `description`, `tel_no`, `address`, `logo`, `allowed_egifts`, `nature_of_business`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrators', 'Description', 'Tel no.', 'Address', 'uploads/merchant/608362.jpg', 0, '', '2019-02-23 19:29:19', '2019-04-21 14:20:21'),
(50, 51, 'Vikings', 'Vikings Description', '12345678', 'Vikings Address', 'uploads/merchant/vikings.png', 100, '', '2019-05-24 09:12:45', '2019-05-24 09:12:45'),
(51, 52, 'Niu', 'Niu Description', '12345678', 'Niu Address', 'uploads/merchant/niu.png', 200, '', '2019-05-24 09:13:39', '2019-05-24 09:13:39'),
(52, 53, 'Alley', 'Alley Description', '12345678', 'Alley Address', 'uploads/merchant/eGiftRewards-logo-02.png', 100, '', '2019-05-24 09:14:38', '2019-05-24 09:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `eg_rating`
--

CREATE TABLE `eg_rating` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(1) NOT NULL,
  `message` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_role`
--

CREATE TABLE `eg_role` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `access` text NOT NULL,
  `actions` text NOT NULL,
  `navigation` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_role`
--

INSERT INTO `eg_role` (`id`, `name`, `access`, `actions`, `navigation`, `status`, `created_at`, `updated_at`) VALUES
(1, 'system admin', '{\"dashboard\":{\"title\":\"Dashboard\",\"icon\":\"fa fa-dashboard\",\"actions\":[\"index\",\"chart\"]},\"#sales\":{\"title\":\"Sales\",\"icon\":\"fa fa-money\",\"sub\":{\"sales\":{\"title\":\"All Sales\",\"icon\":\"fa fa-money\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"statistics\"]},\"sales\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#user\":{\"title\":\"Company Users\",\"icon\":\"fa fa-group\",\"sub\":{\"user\":{\"title\":\"All Company Users\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"credential\",\"profile\",\"update-profile\",\"statistics\"]},\"user\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#customer\":{\"title\":\"Customers\",\"icon\":\"fa fa-group\",\"sub\":{\"customer\":{\"title\":\"All Customers\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\"]},\"user\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#corporate\":{\"title\":\"Corporates\",\"icon\":\"fa fa-group\",\"sub\":{\"corporate\":{\"title\":\"All Corporate Accounts\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"]},\"order\":{\"title\":\"Orders\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"discount-setting\":{\"title\":\"Discount Settings\",\"icon\":\"fa fa-cog\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"corporate\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#merchant\":{\"title\":\"Merchants\",\"icon\":\"fa fa-group\",\"sub\":{\"merchant\":{\"title\":\"All Merchants\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"]},\"account-request\":{\"title\":\"Account Request\",\"icon\":\"fa fa-user-secret\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"branches\":{\"title\":\"Branches\",\"icon\":\"fa fa-building\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"follower\":{\"title\":\"Followers\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"update\",\"delete\"]},\"nature-of-business\":{\"title\":\"Nature of Business\",\"icon\":\"fa fa-arrows-h\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"merchant\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#egift\":{\"title\":\"E-Gifts\",\"icon\":\"fa fa-gift\",\"sub\":{\"egift\":{\"title\":\"All Egifts\",\"icon\":\"fa fa-gift\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\",\"statistics\"]},\"egift-usage\":{\"title\":\"Usage\",\"icon\":\"fa fa-asterisk\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"wishlist\":{\"title\":\"Wishlist\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"freebies\":{\"title\":\"Freebies Item\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"]},\"rating\":{\"title\":\"Rating\",\"icon\":\"fa fa-star\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"egift\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#information\":{\"title\":\"Information\",\"icon\":\"fa fa-info\",\"sub\":{\"about\":{\"title\":\"About Us\",\"icon\":\"fa fa-info\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"personnel\":{\"title\":\"Our Personnels\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"faq\":{\"title\":\"FAQ\",\"icon\":\"fa fa-info\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#settings\":{\"title\":\"Settings\",\"icon\":\"fa fa-cog\",\"sub\":{\"icon\":{\"title\":\"Icons\",\"icon\":\"fa fa-navicon\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"fetch\"]},\"role\":{\"title\":\"User Role Access\",\"icon\":\"fa fa-cog\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"get-main-menu\",\"get-sub-menu\"]},\"point-management\":{\"title\":\"Point Management\",\"icon\":\"fa fa-cog\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#action-pages\":{\"icon\":\"fa fa-asterisk\",\"sub\":{\"supplier\":{\"title\":\"supplier\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"measurement\":{\"title\":\"measurement\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"bookmark\":{\"title\":\"bookmark\",\"icon\":\"fa fa-asterisk\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"category\":{\"title\":\"category\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"egift-branches\":{\"title\":\"egift-branches\",\"icon\":\"fa fa-asterisk\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"egift-freebies\":{\"title\":\"egift-freebies\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"]},\"price-variety\":{\"title\":\"price-variety\",\"icon\":\"fa fa-money\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"]},\"site\":{\"title\":\"site\",\"icon\":\"fa fa-info\",\"actions\":[\"index\",\"login\",\"logout\",\"contact\",\"about\",\"signup\",\"send-email\",\"authorization\",\"merchant-list\",\"merchant\",\"merchant-egifts\"]}}}}', '{\"about\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"account-request\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"bookmark\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"corporate\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"customer\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\"],\"dashboard\":[\"index\",\"chart\"],\"discount-setting\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift-branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift\":[\"index\",\"for-approval\",\"approved\",\"disapproved\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\",\"statistics\"],\"egift-freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"],\"egift-usage\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"faq\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"follower\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"],\"icon\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"fetch\"],\"measurement\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"merchant\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"nature-of-business\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"order\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"personnel\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"point-management\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"price-variety\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"],\"rating\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"role\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"get-main-menu\",\"get-sub-menu\"],\"sales\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"statistics\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\",\"signup\",\"send-email\",\"authorization\",\"merchant-list\",\"merchant\",\"merchant-egifts\"],\"supplier\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"user\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"credential\",\"profile\",\"update-profile\",\"statistics\",\"user-statistics\"],\"wishlist\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}', '{\"u3WtaO1BVxHQKcH\":{\"title\":\"Dashboard\",\"url\":\"\\/dashboard\\/index\",\"icon\":\"fa fa-cog\"},\"c-dDQKT4lM3vNZP\":{\"title\":\"Customers\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"feb8lDbGS6dqk5a\":{\"title\":\"Statistics\",\"url\":\"\\/user\\/statistics\",\"icon\":\"fa fa-industry\"},\"n57CmIfR0dcaIKG\":{\"title\":\"All Customer\",\"url\":\"\\/user\\/user-statistics\",\"icon\":\"fa fa-group\"}}},\"JRkXUSLJsBAJh3x\":{\"title\":\"Sales\",\"url\":\"#\",\"icon\":\"fa fa-money\",\"sub\":{\"rpesxlBjvaK9DMR\":{\"title\":\"All Sales\",\"url\":\"\\/sales\\/index\",\"icon\":\"fa fa-money\"},\"QLAN8tMQ7K7SUU4\":{\"title\":\"Statistics\",\"url\":\"\\/sales\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"RAHlfQAG0MSVsk3\":{\"title\":\"Egift\",\"url\":\"#\",\"icon\":\"fa fa-gift\",\"sub\":{\"6qR8B1ipSJmnVS_\":{\"title\":\"For Approval\",\"url\":\"\\/egift\\/for-approval\",\"icon\":\"fa fa-asterisk\"},\"570HgN2M_-TGe6i\":{\"title\":\"Approved Egift\",\"url\":\"\\/egift\\/index\",\"icon\":\"fa fa-area-chart\"},\"OrHn3LJbpGB53eT\":{\"title\":\"Usage\",\"url\":\"\\/egift-usage\\/index\",\"icon\":\"fa fa-area-chart\"},\"vhWXEMxN8oSbpV0\":{\"title\":\"Freebies Item\",\"url\":\"\\/freebies\\/index\",\"icon\":\"fa fa-shopping-cart\"},\"PntXWDONCJBBd0W\":{\"title\":\"WishList\",\"url\":\"\\/wishlist\\/index\",\"icon\":\"fa fa-shopping-cart\"},\"AXR2JbhHAi7pv8x\":{\"title\":\"Rating\",\"url\":\"\\/branches\\/index\",\"icon\":\"fa fa-star\"},\"1wCmxUPkj0RA5sw\":{\"title\":\"Statistics\",\"url\":\"\\/egift\\/statistics\",\"icon\":\"fa fa-area-chart\"}}},\"ZQGe_mmD_FRSY5V\":{\"title\":\"Merchants\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"q7B2thQlaljdxrC\":{\"title\":\"Statistics\",\"url\":\"\\/merchant\\/statistics\",\"icon\":\"fa fa-industry\"},\"CHhgQLQnOfzEsLS\":{\"title\":\"Nature of Business\",\"url\":\"\\/nature-of-business\\/index\",\"icon\":\"fa fa-asterisk\"},\"_EGeELjuyV3l2cY\":{\"title\":\"Followers\",\"url\":\"\\/follower\\/index\",\"icon\":\"fa fa-group\"},\"aVhm0gROPsYA_Tl\":{\"title\":\"Branches\",\"url\":\"\\/branches\\/index\",\"icon\":\"fa fa-building\"},\"ZTzuJ6ttCNW60fo\":{\"title\":\"Account Request\",\"url\":\"\\/account-request\\/index\",\"icon\":\"fa fa-user-secret\"},\"UXZapWZ16HWsAWM\":{\"title\":\"All Merchants\",\"url\":\"\\/merchant\\/index\",\"icon\":\"fa fa-group\"}}},\"VCTR5ijMgOGku4o\":{\"title\":\"Company Users\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"93Mz5KBfNoJjMto\":{\"title\":\"All Company Users\",\"url\":\"\\/user\\/index\",\"icon\":\"fa fa-group\"},\"g5AR8jIfgeLFpAj\":{\"title\":\"Statistics\",\"url\":\"\\/user\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"22kCC_M1Iq_Wii5\":{\"title\":\"Corporates\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"uG0u7NMySDQiwv8\":{\"title\":\"All Corporate Accounts\",\"url\":\"\\/corporate\\/index\",\"icon\":\"fa fa-group\"},\"EHisKJTt0dODmSG\":{\"title\":\"Order\",\"url\":\"\\/order\\/index\",\"icon\":\"fa fa-shopping-cart\"},\"a3g0-qMoc6lQ09a\":{\"title\":\"Discount Settings\",\"url\":\"\\/discount-setting\\/index\",\"icon\":\"fa fa-cog\"},\"H4p4Mta5468AV2K\":{\"title\":\"Statistics\",\"url\":\"\\/corporate\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"Dh-u0kKqxNRprVx\":{\"title\":\"Information\",\"url\":\"#\",\"icon\":\"fa fa-info\",\"sub\":{\"WIyuF0-Zjxh3Hyu\":{\"title\":\"FAQ\",\"url\":\"\\/faq\\/index\",\"icon\":\"fa fa-info\"},\"grPrtvcln01iOMB\":{\"title\":\"Our Personnels\",\"url\":\"\\/personnel\\/index\",\"icon\":\"fa fa-group\"},\"VGdpq8vU1nWCDca\":{\"title\":\"About Us\",\"url\":\"\\/about\\/index\",\"icon\":\"fa fa-info\"}}},\"QqPrZCiN21_3BsW\":{\"title\":\"Settings\",\"url\":\"#\",\"icon\":\"fa fa-cog\",\"sub\":{\"8HRFVSid4THOP77\":{\"title\":\"Point Management\",\"url\":\"\\/point-management\\/index\",\"icon\":\"fa fa-cog\"},\"3AIKKPoMW4rPXFZ\":{\"title\":\"Role Access\",\"url\":\"\\/role\\/index\",\"icon\":\"fa fa-cog\"},\"TYXdvtv_b2dB5pG\":{\"title\":\"Icons\",\"url\":\"\\/icon\\/index\",\"icon\":\"fa fa-navicon\"}}}}', 0, '2019-03-07 15:40:42', '2019-05-17 11:09:50'),
(9, 'merchant', '{\"dashboard\":{\"title\":\"Dashboard\",\"icon\":\"fa fa-dashboard\",\"actions\":[\"index\"]},\"sales\":{\"title\":\"Sales\",\"icon\":\"fa fa-money\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"user\":{\"icon\":\"fa fa-area-chart\"},\"#merchant\":{\"title\":\"Merchants\",\"icon\":\"fa fa-area-chart\",\"sub\":{\"merchant\":{\"icon\":\"fa fa-area-chart\"},\"branches\":{\"title\":\"Branches\",\"icon\":\"fa fa-arrows-h\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#egift\":{\"title\":\"E-Gifts\",\"icon\":\"fa fa-arrows-h\",\"sub\":{\"egift\":{\"title\":\"All Egifts\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\"]},\"egift-usage\":{\"title\":\"Usage\",\"icon\":\"fa fa-automobile\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"freebies\":{\"title\":\"Freebies Item\",\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"]}}},\"#information\":{\"icon\":\"\",\"sub\":{\"about\":{\"icon\":\"\"},\"personnel\":{\"icon\":\"\"},\"faq\":{\"icon\":\"\"}}},\"#settings\":{\"title\":\"Settings\",\"icon\":\"fa fa-area-chart\",\"sub\":{\"icon\":{\"icon\":\"fa fa-area-chart\"},\"role\":{\"icon\":\"fa fa-area-chart\"},\"nature-of-business\":{\"title\":\"Nature of Business\",\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#action-pages\":{\"icon\":\"\",\"sub\":{\"bookmark\":{\"icon\":\"\"},\"supplier\":{\"icon\":\"\"},\"measurement\":{\"icon\":\"\"},\"egift-branches\":{\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"category\":{\"icon\":\"\"},\"wishlist\":{\"icon\":\"\"},\"egift-freebies\":{\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"]},\"price-variety\":{\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"]},\"site\":{\"icon\":\"\",\"actions\":[\"login\",\"logout\"]}}}}', '{\"about\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"account-request\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"bookmark\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"corporate\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"customer\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\"],\"dashboard\":[\"index\",\"chart\"],\"discount-setting\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift-branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift\":[\"index\",\"for-approval\",\"approved\",\"disapproved\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\",\"statistics\"],\"egift-freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"],\"egift-usage\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"faq\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"follower\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"],\"icon\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"fetch\"],\"measurement\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"merchant\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"nature-of-business\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"order\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"personnel\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"point-management\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"price-variety\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"],\"rating\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"role\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"get-main-menu\",\"get-sub-menu\"],\"sales\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"statistics\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\",\"signup\",\"send-email\",\"authorization\",\"merchant-list\",\"merchant\",\"merchant-egifts\"],\"supplier\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"user\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"credential\",\"profile\",\"update-profile\",\"statistics\",\"user-statistics\"],\"wishlist\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}', '{\"u3WtaO1BVxHQKcH\":{\"title\":\"Dashboard\",\"url\":\"dashboard\\/index\",\"icon\":\"fa fa-cog\"},\"c-dDQKT4lM3vNZP\":{\"title\":\"Customers\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"feb8lDbGS6dqk5a\":{\"title\":\"Statistics\",\"url\":\"user\\/statistics\",\"icon\":\"fa fa-industry\"},\"n57CmIfR0dcaIKG\":{\"title\":\"All Customer\",\"url\":\"user\\/user-statistics\",\"icon\":\"fa fa-group\"}}},\"JRkXUSLJsBAJh3x\":{\"title\":\"Sales\",\"url\":\"#\",\"icon\":\"fa fa-money\",\"sub\":{\"rpesxlBjvaK9DMR\":{\"title\":\"All Sales\",\"url\":\"sales\\/index\",\"icon\":\"fa fa-money\"},\"QLAN8tMQ7K7SUU4\":{\"title\":\"Statistics\",\"url\":\"sales\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"RAHlfQAG0MSVsk3\":{\"title\":\"Egift\",\"url\":\"#\",\"icon\":\"fa fa-gift\",\"sub\":{\"wJ6AIKu40RGjgcY\":{\"title\":\"Add New\",\"url\":\"egift\\/create\",\"icon\":\"fa fa-balance-scale\\t\"},\"570HgN2M_-TGe6i\":{\"title\":\"Approved Egift\",\"url\":\"egift\\/index\",\"icon\":\"fa fa-area-chart\"},\"6qR8B1ipSJmnVS_\":{\"title\":\"For Approval\",\"url\":\"egift\\/for-approval\",\"icon\":\"fa fa-asterisk\"},\"OrHn3LJbpGB53eT\":{\"title\":\"Usage\",\"url\":\"egift-usage\\/index\",\"icon\":\"fa fa-area-chart\"},\"vhWXEMxN8oSbpV0\":{\"title\":\"Freebies Item\",\"url\":\"freebies\\/index\",\"icon\":\"fa fa-shopping-cart\"},\"PntXWDONCJBBd0W\":{\"title\":\"WishList\",\"url\":\"wishlist\\/index\",\"icon\":\"fa fa-shopping-cart\"},\"AXR2JbhHAi7pv8x\":{\"title\":\"Rating\",\"url\":\"branches\\/index\",\"icon\":\"fa fa-star\"},\"1wCmxUPkj0RA5sw\":{\"title\":\"Statistics\",\"url\":\"egift\\/statistics\",\"icon\":\"fa fa-area-chart\"}}},\"ZQGe_mmD_FRSY5V\":{\"title\":\"Merchants\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"q7B2thQlaljdxrC\":{\"title\":\"Statistics\",\"url\":\"merchant\\/statistics\",\"icon\":\"fa fa-industry\"},\"CHhgQLQnOfzEsLS\":{\"title\":\"Nature of Business\",\"url\":\"nature-of-business\\/index\",\"icon\":\"fa fa-asterisk\"},\"_EGeELjuyV3l2cY\":{\"title\":\"Followers\",\"url\":\"follower\\/index\",\"icon\":\"fa fa-group\"},\"aVhm0gROPsYA_Tl\":{\"title\":\"Branches\",\"url\":\"branches\\/index\",\"icon\":\"fa fa-building\"},\"ZTzuJ6ttCNW60fo\":{\"title\":\"Account Request\",\"url\":\"account-request\\/index\",\"icon\":\"fa fa-user-secret\"},\"UXZapWZ16HWsAWM\":{\"title\":\"All Merchants\",\"url\":\"merchant\\/index\",\"icon\":\"fa fa-group\"}}},\"VCTR5ijMgOGku4o\":{\"title\":\"Company Users\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"93Mz5KBfNoJjMto\":{\"title\":\"All Company Users\",\"url\":\"user\\/index\",\"icon\":\"fa fa-group\"},\"g5AR8jIfgeLFpAj\":{\"title\":\"Statistics\",\"url\":\"user\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"22kCC_M1Iq_Wii5\":{\"title\":\"Corporates\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"uG0u7NMySDQiwv8\":{\"title\":\"All Corporate Accounts\",\"url\":\"corporate\\/index\",\"icon\":\"fa fa-group\"},\"EHisKJTt0dODmSG\":{\"title\":\"Order\",\"url\":\"order\\/index\",\"icon\":\"fa fa-shopping-cart\"},\"a3g0-qMoc6lQ09a\":{\"title\":\"Discount Settings\",\"url\":\"discount-setting\\/index\",\"icon\":\"fa fa-cog\"},\"H4p4Mta5468AV2K\":{\"title\":\"Statistics\",\"url\":\"corporate\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"Dh-u0kKqxNRprVx\":{\"title\":\"Information\",\"url\":\"#\",\"icon\":\"fa fa-info\",\"sub\":{\"WIyuF0-Zjxh3Hyu\":{\"title\":\"FAQ\",\"url\":\"faq\\/index\",\"icon\":\"fa fa-info\"},\"grPrtvcln01iOMB\":{\"title\":\"Our Personnels\",\"url\":\"personnel\\/index\",\"icon\":\"fa fa-group\"},\"VGdpq8vU1nWCDca\":{\"title\":\"About Us\",\"url\":\"about\\/index\",\"icon\":\"fa fa-info\"}}},\"QqPrZCiN21_3BsW\":{\"title\":\"Settings\",\"url\":\"#\",\"icon\":\"fa fa-cog\",\"sub\":{\"8HRFVSid4THOP77\":{\"title\":\"Point Management\",\"url\":\"point-management\\/index\",\"icon\":\"fa fa-cog\"},\"3AIKKPoMW4rPXFZ\":{\"title\":\"Role Access\",\"url\":\"role\\/index\",\"icon\":\"fa fa-cog\"},\"TYXdvtv_b2dB5pG\":{\"title\":\"Icons\",\"url\":\"icon\\/index\",\"icon\":\"fa fa-navicon\"}}}}', 0, '2019-03-13 13:55:48', '2019-05-19 01:40:08'),
(10, 'accountant', '{\"dashboard\":{\"title\":\"Dashboard\",\"icon\":\"fa fa-area-chart\",\"actions\":[\"index\"]},\"#sales\":{\"icon\":\"\",\"sub\":{\"sales\":{\"icon\":\"\"},\"sales\\/statistics\":{\"icon\":\"\"}}},\"#user\":{\"icon\":\"\",\"sub\":{\"user\":{\"icon\":\"\"},\"user\\/statistics\":{\"icon\":\"\"}}},\"#customer\":{\"icon\":\"\",\"sub\":{\"customer\":{\"icon\":\"\"},\"user\\/block-listing\":{\"icon\":\"\"},\"user\\/statistics\":{\"icon\":\"\"}}},\"#corporate\":{\"icon\":\"\",\"sub\":{\"corporate\":{\"icon\":\"\"},\"order\":{\"icon\":\"\"},\"discount-setting\":{\"icon\":\"\"},\"corporate\\/statistics\":{\"icon\":\"\"}}},\"#merchant\":{\"title\":\"Merchants\",\"icon\":\"fa fa-area-chart\",\"sub\":{\"merchant\":{\"title\":\"All Merchants\",\"icon\":\"fa fa-area-chart\",\"actions\":[\"index\",\"view\"]},\"account-request\":{\"icon\":\"\"},\"branches\":{\"icon\":\"\"},\"follower\":{\"icon\":\"\"},\"nature-of-business\":{\"icon\":\"\"},\"merchant\\/statistics\":{\"icon\":\"\"}}},\"#egift\":{\"title\":\"E-Gifts\",\"icon\":\"fa fa-area-chart\",\"sub\":{\"egift\":{\"title\":\"All Egifts\",\"icon\":\"fa fa-area-chart\",\"actions\":[\"index\",\"view\"]},\"egift-usage\":{\"title\":\"Usage\",\"icon\":\"fa fa-area-chart\",\"actions\":[\"index\",\"view\"]},\"wishlist\":{\"icon\":\"\"},\"freebies\":{\"icon\":\"\"},\"rating\":{\"icon\":\"\"},\"egift\\/statistics\":{\"icon\":\"\"}}},\"#information\":{\"icon\":\"\",\"sub\":{\"about\":{\"icon\":\"\"},\"personnel\":{\"icon\":\"\"},\"faq\":{\"icon\":\"\"}}},\"#settings\":{\"icon\":\"fa fa-area-chart\",\"sub\":{\"icon\":{\"icon\":\"fa fa-area-chart\"},\"role\":{\"icon\":\"fa fa-area-chart\"},\"point-management\":{\"icon\":\"\"}}},\"#action-pages\":{\"icon\":\"\",\"sub\":{\"supplier\":{\"icon\":\"\"},\"measurement\":{\"icon\":\"\"},\"egift-branches\":{\"icon\":\"\"},\"category\":{\"icon\":\"\"},\"bookmark\":{\"icon\":\"\"},\"egift-freebies\":{\"icon\":\"\"},\"price-variety\":{\"icon\":\"\"},\"site\":{\"icon\":\"\",\"actions\":[\"login\",\"logout\"]}}}}', '', '', 0, '2019-03-13 14:55:06', '2019-05-04 03:28:28'),
(13, 'guest', '{\"dashboard\":{\"icon\":\"fa fa-area-chart\"},\"sales\":{\"icon\":\"fa fa-area-chart\"},\"user\":{\"icon\":\"fa fa-area-chart\"},\"#merchant\":{\"icon\":\"fa fa-area-chart\",\"sub\":{\"merchant\":{\"icon\":\"fa fa-area-chart\"},\"branches\":{\"icon\":\"fa fa-area-chart\"},\"nature-of-business\":{\"icon\":\"fa fa-area-chart\"}}},\"#egift\":{\"icon\":\"fa fa-area-chart\",\"sub\":{\"egift\":{\"icon\":\"fa fa-area-chart\"},\"egift-usage\":{\"icon\":\"fa fa-area-chart\"},\"promo\":{\"icon\":\"fa fa-area-chart\"}}},\"#freebies\":{\"icon\":\"fa fa-area-chart\",\"sub\":{\"freebies\":{\"icon\":\"fa fa-area-chart\"},\"category\":{\"icon\":\"fa fa-area-chart\"},\"supplier\":{\"icon\":\"fa fa-area-chart\"},\"measurement\":{\"icon\":\"fa fa-area-chart\"}}},\"#information\":{\"icon\":\"fa fa-area-chart\",\"sub\":{\"about\":{\"icon\":\"fa fa-area-chart\"},\"personnel\":{\"icon\":\"fa fa-area-chart\"},\"faq\":{\"icon\":\"fa fa-area-chart\"}}},\"#settings\":{\"icon\":\"fa fa-area-chart\",\"sub\":{\"icon\":{\"icon\":\"fa fa-area-chart\"},\"role\":{\"icon\":\"fa fa-area-chart\"}}},\"#action-pages\":{\"title\":\"Action Pages\",\"icon\":\"\",\"sub\":{\"bookmark\":{\"icon\":\"\"},\"wishlist\":{\"icon\":\"\"},\"egift-freebies\":{\"icon\":\"\"},\"price-variety\":{\"icon\":\"\"},\"site\":{\"title\":\"site\",\"icon\":\"\",\"actions\":[\"index\",\"login\",\"logout\",\"contact\",\"about\",\"signup\",\"send-email\",\"authorization\",\"merchant-list\",\"merchant\",\"merchant-egifts\"]}}}}', '', '', 0, '2019-03-23 12:36:46', '2019-03-24 04:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `eg_sales`
--

CREATE TABLE `eg_sales` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `egift_id` int(11) NOT NULL,
  `transaction_id` varchar(32) NOT NULL,
  `amount` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_supplier`
--

CREATE TABLE `eg_supplier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eg_user`
--

CREATE TABLE `eg_user` (
  `id` int(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `access_token` varchar(256) NOT NULL,
  `auth_key` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_user`
--

INSERT INTO `eg_user` (`id`, `role_id`, `username`, `email`, `password`, `user_type`, `access_token`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'longcop', 'longcoproeladmin@gmail.com', '$2y$13$KBpldZj6OfuYI61n8lI1zOg82ikz4Kz496E1NaDe9qN9PvJeT3lCK', 9, 'C9Exiqydas', 'zjmlHcAeep', 1, '2019-01-23 19:29:19', '2019-04-22 13:52:51'),
(51, 9, 'cyZAWn6weL', 'vikings@gmail.com', '$2y$13$YL/hWaXV5/du9sPEG4UNlOJWRvyc.qFb2Vlg0GUNhXry06.Th.75C', 8, 'VcXITCByY9', 'F5l654xS5W', 1, '2019-05-24 09:12:45', '2019-05-24 09:26:19'),
(52, 9, 'GmrhTqhm4w', 'niu@gmail.com', '$2y$13$FWkfso83llqAHxsZsP55p.o.ztd6kM9d8xSZ4iw2Wqmxb.3QtAyyu', 8, 'zjjUYg1Hj0', 'BNhnLEu5Bz', 1, '2019-05-24 09:13:39', '2019-05-24 09:32:31'),
(53, 9, '3JggdXAfOy', 'alley@gmail.com', '$2y$13$3T1AqvTVF0BpdYguGLM4xuBQQm7E.fRKTG74tdOa7Ku61QnTn2U16', 8, 'XEsxQL84rz', 'IJ2Rx1nLjA', 1, '2019-05-24 09:14:38', '2019-05-24 09:15:06'),
(55, 0, 'jordan@gmail.com', 'jordan@gmail.com', '$2y$13$8kkg6Rbg4ugCjCoQOBHsLuf6lVSNXWVCBljflC/J5KLoPRTB7.TBK', 6, 'H5BhmTRLlk', 'R9wsCauVHI', 1, '2019-05-24 11:18:30', '2019-05-24 11:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `eg_wishlist`
--

CREATE TABLE `eg_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `egift_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eg_about`
--
ALTER TABLE `eg_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_account_request`
--
ALTER TABLE `eg_account_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_branches`
--
ALTER TABLE `eg_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_category`
--
ALTER TABLE `eg_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_discount_setting`
--
ALTER TABLE `eg_discount_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_egift`
--
ALTER TABLE `eg_egift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_egift_branches`
--
ALTER TABLE `eg_egift_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_egift_freebies`
--
ALTER TABLE `eg_egift_freebies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_egift_usage`
--
ALTER TABLE `eg_egift_usage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_faq`
--
ALTER TABLE `eg_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_follower`
--
ALTER TABLE `eg_follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_freebies`
--
ALTER TABLE `eg_freebies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_icon`
--
ALTER TABLE `eg_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_measurement`
--
ALTER TABLE `eg_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_month`
--
ALTER TABLE `eg_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_nature_of_business`
--
ALTER TABLE `eg_nature_of_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_order`
--
ALTER TABLE `eg_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_personnel`
--
ALTER TABLE `eg_personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_point_management`
--
ALTER TABLE `eg_point_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_price_variety`
--
ALTER TABLE `eg_price_variety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_profile`
--
ALTER TABLE `eg_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_rating`
--
ALTER TABLE `eg_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_role`
--
ALTER TABLE `eg_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_sales`
--
ALTER TABLE `eg_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_supplier`
--
ALTER TABLE `eg_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eg_user`
--
ALTER TABLE `eg_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`,`access_token`,`auth_key`);

--
-- Indexes for table `eg_wishlist`
--
ALTER TABLE `eg_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eg_about`
--
ALTER TABLE `eg_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eg_account_request`
--
ALTER TABLE `eg_account_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_branches`
--
ALTER TABLE `eg_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eg_category`
--
ALTER TABLE `eg_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_discount_setting`
--
ALTER TABLE `eg_discount_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_egift`
--
ALTER TABLE `eg_egift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `eg_egift_branches`
--
ALTER TABLE `eg_egift_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `eg_egift_freebies`
--
ALTER TABLE `eg_egift_freebies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `eg_egift_usage`
--
ALTER TABLE `eg_egift_usage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_faq`
--
ALTER TABLE `eg_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_follower`
--
ALTER TABLE `eg_follower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_freebies`
--
ALTER TABLE `eg_freebies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eg_icon`
--
ALTER TABLE `eg_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `eg_measurement`
--
ALTER TABLE `eg_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_month`
--
ALTER TABLE `eg_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `eg_nature_of_business`
--
ALTER TABLE `eg_nature_of_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `eg_order`
--
ALTER TABLE `eg_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_personnel`
--
ALTER TABLE `eg_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_point_management`
--
ALTER TABLE `eg_point_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_price_variety`
--
ALTER TABLE `eg_price_variety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `eg_profile`
--
ALTER TABLE `eg_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `eg_rating`
--
ALTER TABLE `eg_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_role`
--
ALTER TABLE `eg_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `eg_sales`
--
ALTER TABLE `eg_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_supplier`
--
ALTER TABLE `eg_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_user`
--
ALTER TABLE `eg_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `eg_wishlist`
--
ALTER TABLE `eg_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
