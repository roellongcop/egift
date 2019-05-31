-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2019 at 12:07 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
(1, 45, 'branches no. 1', 'test', '1009', '43748', 0, '2019-04-21 15:45:01', '2019-04-21 15:46:40'),
(2, 45, 'Carmona branch', 'Carmona branch', '111', '222', 0, '2019-04-22 13:53:38', '2019-04-22 13:53:38');

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

--
-- Dumping data for table `eg_discount_setting`
--

INSERT INTO `eg_discount_setting` (`id`, `merchant_id`, `benchmark_amount`, `percentage_discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 45, 1000.00, 100.00, 9, '2019-04-24 14:18:01', '2019-04-24 14:35:30'),
(2, 45, 500.00, 10.00, 0, '2019-04-24 14:41:12', '2019-04-24 15:24:30'),
(3, 45, 1000.00, 10.00, 0, '2019-05-04 05:21:50', '2019-05-04 05:21:50');

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
(5, 46, 0, 'valentines', 'valentines', 500, '', 0.00, 0.00, 'uploads/egifts/608362.jpg', 'SCPWaGY05l', 'uploads/QR/2dc098d5d53b980373dcf9d1b0f4ca08.png', 0, '1970-01-01', '1970-01-01', 0, '2019-04-21 16:15:33', '2019-04-21 16:15:33'),
(6, 45, 0, 'test', 'test', 111, '', 0.00, 0.00, 'uploads/egifts/608362.jpg', 'bDHD7N0Yhp', 'uploads/QR/2d6c459f0cf393284c55eeb958b01d78.png', 0, '1970-01-01', '1970-01-01', 0, '2019-04-22 13:43:03', '2019-04-22 13:43:03'),
(7, 45, 0, 'ewqweqwe', 'qewqwe', 32, '', 0.00, 0.00, 'uploads/egifts/608362.jpg', 'g0gfKnT51V', 'uploads/QR/75f3c1466951a1380d24007e9b02a5c6.png', 1, '1970-01-01', '1970-01-01', 0, '2019-04-22 13:59:01', '2019-04-22 13:59:01');

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
(2, 5, 1),
(3, 6, 1),
(4, 7, 1),
(5, 7, 2);

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
(6, 1, 6, 2, 2, 0, '2019-04-22 13:43:00', '2019-04-22 13:43:04'),
(7, 1, 0, 1, 2, 0, '2019-05-04 06:07:55', '2019-05-04 06:07:55'),
(8, 1, 0, 2, 25, 0, '2019-05-04 06:07:59', '2019-05-05 08:32:03');

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
(1, 1, 'car', '1212', 0, 0, 0, 0.00, 7.00, 'uploads/freebies/608362.jpg', 0, '2019-04-21 16:35:37', '2019-05-04 06:07:55'),
(2, 1, 'laptop', 'test', 0, 0, 0, 0.00, 0.00, 'uploads/freebies/608362.jpg', 0, '2019-04-22 12:10:01', '2019-04-22 12:10:01');

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
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eg_nature_of_business`
--

INSERT INTO `eg_nature_of_business` (`id`, `user_id`, `icon_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'foods', 'test', 0, '2019-04-21 14:49:52', '2019-04-21 14:49:52'),
(2, 45, 6, 'sports', 'sports', 0, '2019-04-21 15:34:27', '2019-04-21 15:34:27'),
(3, 1, 5, 'resume writing', 'test', 0, '2019-04-24 14:53:56', '2019-04-24 14:53:56');

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

--
-- Dumping data for table `eg_personnel`
--

INSERT INTO `eg_personnel` (`id`, `fullname`, `company_name`, `position`, `self_description`, `inspiring_message`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'roel longcop', 'egift reward company', 'web developer', 'test', 'try', 'uploads/personnel/608362.jpg', 0, '2019-04-22 13:38:56', '2019-04-22 13:38:56');

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

--
-- Dumping data for table `eg_point_management`
--

INSERT INTO `eg_point_management` (`id`, `point`, `benchmark`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 100, 0, '2019-05-04 06:21:36', '2019-05-04 06:24:18');

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
(4, 1, 5, 222.00, 11.00, 0, '2019-04-21 16:15:31', '2019-04-21 16:15:33'),
(7, 45, 7, 123123.00, 123.00, 0, '2019-04-22 13:58:48', '2019-04-22 13:59:02'),
(8, 45, 7, 1231232.00, 2.00, 0, '2019-04-22 13:58:50', '2019-04-22 13:59:02');

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
(41, 42, 'l32vSA4Xi7', 'PY-l4hewP5', '83TzW1iGHt', 'WW3qZ7CR97', 'uploads/default/profile_small.png', 10, '', '2019-04-21 14:40:44', '2019-04-21 14:40:44'),
(44, 45, 'jollibees', 'jollibee', '12345678', 'jollibee', 'uploads/merchant/608362.jpg', 100, '', '2019-04-21 15:14:32', '2019-05-04 05:32:17'),
(45, 46, 'landmark', 'landmark', '213123', 'landmark', 'uploads/merchant/608362.jpg', 100, '', '2019-04-21 16:08:13', '2019-04-21 16:08:13'),
(46, 47, 'samsung', 'samsung test', '79237', 'laguna', 'uploads/merchant/608362.jpg', 100, '', '2019-04-24 14:52:03', '2019-04-24 14:52:03'),
(47, 48, 'bench', 'this is bench', '098372917', 'makati city', 'uploads/merchant/eGiftRewards-logo-app-icon-colored_old.png', 100, '', '2019-05-05 06:25:47', '2019-05-05 06:25:47'),
(48, 49, 'dominos', 'test', '45678', 'test', 'uploads/merchant/profile_small.png', 100, '', '2019-05-05 08:15:06', '2019-05-05 08:15:06');

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
(1, 'system admin', '{\"dashboard\":{\"title\":\"Dashboard\",\"icon\":\"fa fa-dashboard\",\"actions\":[\"index\",\"chart\"]},\"#sales\":{\"title\":\"Sales\",\"icon\":\"fa fa-money\",\"sub\":{\"sales\":{\"title\":\"All Sales\",\"icon\":\"fa fa-money\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"statistics\"]},\"sales\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#user\":{\"title\":\"Company Users\",\"icon\":\"fa fa-group\",\"sub\":{\"user\":{\"title\":\"All Company Users\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"credential\",\"profile\",\"update-profile\",\"statistics\"]},\"user\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#customer\":{\"title\":\"Customers\",\"icon\":\"fa fa-group\",\"sub\":{\"customer\":{\"title\":\"All Customers\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\"]},\"user\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#corporate\":{\"title\":\"Corporates\",\"icon\":\"fa fa-group\",\"sub\":{\"corporate\":{\"title\":\"All Corporate Accounts\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"]},\"order\":{\"title\":\"Orders\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"discount-setting\":{\"title\":\"Discount Settings\",\"icon\":\"fa fa-cog\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"corporate\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#merchant\":{\"title\":\"Merchants\",\"icon\":\"fa fa-group\",\"sub\":{\"merchant\":{\"title\":\"All Merchants\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"]},\"account-request\":{\"title\":\"Account Request\",\"icon\":\"fa fa-user-secret\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"branches\":{\"title\":\"Branches\",\"icon\":\"fa fa-building\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"follower\":{\"title\":\"Followers\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"update\",\"delete\"]},\"nature-of-business\":{\"title\":\"Nature of Business\",\"icon\":\"fa fa-arrows-h\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"merchant\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#egift\":{\"title\":\"E-Gifts\",\"icon\":\"fa fa-gift\",\"sub\":{\"egift\":{\"title\":\"All Egifts\",\"icon\":\"fa fa-gift\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\",\"statistics\"]},\"egift-usage\":{\"title\":\"Usage\",\"icon\":\"fa fa-asterisk\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"wishlist\":{\"title\":\"Wishlist\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"freebies\":{\"title\":\"Freebies Item\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"]},\"rating\":{\"title\":\"Rating\",\"icon\":\"fa fa-star\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"egift\\/statistics\":{\"title\":\"Statistics\",\"icon\":\"fa fa-industry\"}}},\"#information\":{\"title\":\"Information\",\"icon\":\"fa fa-info\",\"sub\":{\"about\":{\"title\":\"About Us\",\"icon\":\"fa fa-info\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"personnel\":{\"title\":\"Our Personnels\",\"icon\":\"fa fa-group\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"faq\":{\"title\":\"FAQ\",\"icon\":\"fa fa-info\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#settings\":{\"title\":\"Settings\",\"icon\":\"fa fa-cog\",\"sub\":{\"icon\":{\"title\":\"Icons\",\"icon\":\"fa fa-navicon\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"fetch\"]},\"role\":{\"title\":\"User Role Access\",\"icon\":\"fa fa-cog\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"get-main-menu\",\"get-sub-menu\"]},\"point-management\":{\"title\":\"Point Management\",\"icon\":\"fa fa-cog\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#action-pages\":{\"icon\":\"fa fa-asterisk\",\"sub\":{\"supplier\":{\"title\":\"supplier\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"measurement\":{\"title\":\"measurement\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"bookmark\":{\"title\":\"bookmark\",\"icon\":\"fa fa-asterisk\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"category\":{\"title\":\"category\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"egift-branches\":{\"title\":\"egift-branches\",\"icon\":\"fa fa-asterisk\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"egift-freebies\":{\"title\":\"egift-freebies\",\"icon\":\"fa fa-arrows-v\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"]},\"price-variety\":{\"title\":\"price-variety\",\"icon\":\"fa fa-money\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"]},\"site\":{\"title\":\"site\",\"icon\":\"fa fa-info\",\"actions\":[\"index\",\"login\",\"logout\",\"contact\",\"about\",\"signup\",\"send-email\",\"authorization\",\"merchant-list\",\"merchant\",\"merchant-egifts\"]}}}}', '{\"about\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"account-request\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"bookmark\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"corporate\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"customer\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\"],\"dashboard\":[\"index\",\"chart\"],\"discount-setting\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift-branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\",\"statistics\"],\"egift-freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"],\"egift-usage\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"faq\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"follower\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"],\"icon\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"fetch\"],\"measurement\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"merchant\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"nature-of-business\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"order\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"personnel\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"point-management\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"price-variety\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"],\"rating\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"role\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"get-main-menu\",\"get-sub-menu\"],\"sales\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"statistics\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\",\"signup\",\"send-email\",\"authorization\",\"merchant-list\",\"merchant\",\"merchant-egifts\"],\"supplier\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"user\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"credential\",\"profile\",\"update-profile\",\"statistics\"],\"wishlist\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}', '{\"u3WtaO1BVxHQKcH\":{\"title\":\"Dashboard\",\"url\":\"http:\\/\\/localhost\\/egift\\/dashboard\",\"icon\":\"fa fa-cog\"},\"QqPrZCiN21_3BsW\":{\"title\":\"Settings\",\"url\":\"#\",\"icon\":\"fa fa-cog\",\"sub\":{\"8HRFVSid4THOP77\":{\"title\":\"Point Management\",\"url\":\"http:\\/\\/localhost\\/egift\\/point-management\",\"icon\":\"fa fa-cog\"},\"3AIKKPoMW4rPXFZ\":{\"title\":\"Role Access\",\"url\":\"http:\\/\\/localhost\\/egift\\/role\",\"icon\":\"fa fa-cog\"},\"TYXdvtv_b2dB5pG\":{\"title\":\"Icons\",\"url\":\"http:\\/\\/localhost\\/egift\\/icon\",\"icon\":\"fa fa-navicon\"}}},\"c-dDQKT4lM3vNZP\":{\"title\":\"Customers\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"feb8lDbGS6dqk5a\":{\"title\":\"Statistics\",\"url\":\"http:\\/\\/localhost\\/egift\\/user\\/statistics\",\"icon\":\"fa fa-industry\"},\"n57CmIfR0dcaIKG\":{\"title\":\"All Customer\",\"url\":\"http:\\/\\/localhost\\/egift\\/customer\",\"icon\":\"fa fa-group\"}}},\"JRkXUSLJsBAJh3x\":{\"title\":\"Sales\",\"url\":\"#\",\"icon\":\"fa fa-money\",\"sub\":{\"rpesxlBjvaK9DMR\":{\"title\":\"All Sales\",\"url\":\"http:\\/\\/localhost\\/egift\\/sales\",\"icon\":\"fa fa-money\"},\"QLAN8tMQ7K7SUU4\":{\"title\":\"Statistics\",\"url\":\"http:\\/\\/localhost\\/egift\\/sales\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"RAHlfQAG0MSVsk3\":{\"title\":\"Egift\",\"url\":\"#\",\"icon\":\"fa fa-gift\",\"sub\":{\"570HgN2M_-TGe6i\":{\"title\":\"All Egift\",\"url\":\"http:\\/\\/localhost\\/egift\\/egift\",\"icon\":\"fa fa-area-chart\"},\"OrHn3LJbpGB53eT\":{\"title\":\"Usage\",\"url\":\"http:\\/\\/localhost\\/egift\\/egift-usage\",\"icon\":\"fa fa-area-chart\"},\"vhWXEMxN8oSbpV0\":{\"title\":\"Freebies Item\",\"url\":\"http:\\/\\/localhost\\/egift\\/freebies\",\"icon\":\"fa fa-shopping-cart\"},\"PntXWDONCJBBd0W\":{\"title\":\"WishList\",\"url\":\"http:\\/\\/localhost\\/egift\\/wishlist\",\"icon\":\"fa fa-shopping-cart\"},\"AXR2JbhHAi7pv8x\":{\"title\":\"Rating\",\"url\":\"http:\\/\\/localhost\\/egift\\/rating\",\"icon\":\"fa fa-star\"},\"1wCmxUPkj0RA5sw\":{\"title\":\"Statistics\",\"url\":\"http:\\/\\/localhost\\/egift\\/egift\\/statistics\",\"icon\":\"fa fa-area-chart\"}}},\"ZQGe_mmD_FRSY5V\":{\"title\":\"Merchants\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"q7B2thQlaljdxrC\":{\"title\":\"Statistics\",\"url\":\"http:\\/\\/localhost\\/egift\\/merchant\\/statistics\",\"icon\":\"fa fa-industry\"},\"CHhgQLQnOfzEsLS\":{\"title\":\"Nature of Business\",\"url\":\"http:\\/\\/localhost\\/egift\\/nature-of-business\",\"icon\":\"fa fa-asterisk\"},\"_EGeELjuyV3l2cY\":{\"title\":\"Followers\",\"url\":\"http:\\/\\/localhost\\/egift\\/follower\",\"icon\":\"fa fa-group\"},\"aVhm0gROPsYA_Tl\":{\"title\":\"Branches\",\"url\":\"http:\\/\\/localhost\\/egift\\/branches\",\"icon\":\"fa fa-building\"},\"ZTzuJ6ttCNW60fo\":{\"title\":\"Account Request\",\"url\":\"http:\\/\\/localhost\\/egift\\/account-request\",\"icon\":\"fa fa-user-secret\"},\"UXZapWZ16HWsAWM\":{\"title\":\"All Merchants\",\"url\":\"http:\\/\\/localhost\\/egift\\/merchant\",\"icon\":\"fa fa-group\"}}},\"VCTR5ijMgOGku4o\":{\"title\":\"Company Users\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"93Mz5KBfNoJjMto\":{\"title\":\"All Company Users\",\"url\":\"http:\\/\\/localhost\\/egift\\/user\",\"icon\":\"fa fa-group\"},\"g5AR8jIfgeLFpAj\":{\"title\":\"Statistics\",\"url\":\"http:\\/\\/localhost\\/egift\\/user\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"22kCC_M1Iq_Wii5\":{\"title\":\"Corporates\",\"url\":\"#\",\"icon\":\"fa fa-group\",\"sub\":{\"uG0u7NMySDQiwv8\":{\"title\":\"All Corporate Accounts\",\"url\":\"http:\\/\\/localhost\\/egift\\/corporate\",\"icon\":\"fa fa-group\"},\"EHisKJTt0dODmSG\":{\"title\":\"Order\",\"url\":\"http:\\/\\/localhost\\/egift\\/order\",\"icon\":\"fa fa-shopping-cart\"},\"a3g0-qMoc6lQ09a\":{\"title\":\"Discount Settings\",\"url\":\"http:\\/\\/localhost\\/egift\\/discount-setting\",\"icon\":\"fa fa-cog\"},\"H4p4Mta5468AV2K\":{\"title\":\"Statistics\",\"url\":\"http:\\/\\/localhost\\/egift\\/corporate\\/statistics\",\"icon\":\"fa fa-industry\"}}},\"Dh-u0kKqxNRprVx\":{\"title\":\"Information\",\"url\":\"#\",\"icon\":\"fa fa-info\",\"sub\":{\"WIyuF0-Zjxh3Hyu\":{\"title\":\"FAQ\",\"url\":\"http:\\/\\/localhost\\/egift\\/faq\",\"icon\":\"fa fa-info\"},\"grPrtvcln01iOMB\":{\"title\":\"Our Personnels\",\"url\":\"http:\\/\\/localhost\\/egift\\/personnel\",\"icon\":\"fa fa-group\"},\"VGdpq8vU1nWCDca\":{\"title\":\"About Us\",\"url\":\"http:\\/\\/localhost\\/egift\\/about\",\"icon\":\"fa fa-info\"}}}}', 0, '2019-03-07 15:40:42', '2019-05-05 12:07:26'),
(9, 'merchant', '{\"dashboard\":{\"title\":\"Dashboard\",\"icon\":\"fa fa-dashboard\",\"actions\":[\"index\"]},\"sales\":{\"title\":\"Sales\",\"icon\":\"fa fa-money\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"user\":{\"icon\":\"fa fa-area-chart\"},\"#merchant\":{\"title\":\"Merchants\",\"icon\":\"fa fa-area-chart\",\"sub\":{\"merchant\":{\"icon\":\"fa fa-area-chart\"},\"branches\":{\"title\":\"Branches\",\"icon\":\"fa fa-arrows-h\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#egift\":{\"title\":\"E-Gifts\",\"icon\":\"fa fa-arrows-h\",\"sub\":{\"egift\":{\"title\":\"All Egifts\",\"icon\":\"fa fa-shopping-cart\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\"]},\"egift-usage\":{\"title\":\"Usage\",\"icon\":\"fa fa-automobile\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"freebies\":{\"title\":\"Freebies Item\",\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"]}}},\"#information\":{\"icon\":\"\",\"sub\":{\"about\":{\"icon\":\"\"},\"personnel\":{\"icon\":\"\"},\"faq\":{\"icon\":\"\"}}},\"#settings\":{\"title\":\"Settings\",\"icon\":\"fa fa-area-chart\",\"sub\":{\"icon\":{\"icon\":\"fa fa-area-chart\"},\"role\":{\"icon\":\"fa fa-area-chart\"},\"nature-of-business\":{\"title\":\"Nature of Business\",\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}}},\"#action-pages\":{\"icon\":\"\",\"sub\":{\"bookmark\":{\"icon\":\"\"},\"supplier\":{\"icon\":\"\"},\"measurement\":{\"icon\":\"\"},\"egift-branches\":{\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]},\"category\":{\"icon\":\"\"},\"wishlist\":{\"icon\":\"\"},\"egift-freebies\":{\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"]},\"price-variety\":{\"icon\":\"\",\"actions\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"]},\"site\":{\"icon\":\"\",\"actions\":[\"login\",\"logout\"]}}}}', '{\"about\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"account-request\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"bookmark\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"corporate\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"customer\":[\"index\",\"view\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\"],\"dashboard\":[\"index\",\"chart\"],\"discount-setting\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift-branches\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"egift\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"generate-referral-code\",\"details\",\"statistics\"],\"egift-freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-freebies\",\"remove-freebies\"],\"egift-usage\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"faq\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"follower\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"freebies\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"lists\",\"details\"],\"icon\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"fetch\"],\"measurement\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"merchant\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"add-to-blocklist\",\"set-to-authorized\",\"set-to-unauthorized\",\"statistics\"],\"nature-of-business\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"order\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"personnel\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"point-management\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"price-variety\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"add-variety\",\"remove-variety\"],\"rating\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"role\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"get-main-menu\",\"get-sub-menu\"],\"sales\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"statistics\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\",\"signup\",\"send-email\",\"authorization\",\"merchant-list\",\"merchant\",\"merchant-egifts\"],\"supplier\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"user\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"credential\",\"profile\",\"update-profile\",\"statistics\"],\"wishlist\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}', '{\"YT8g0dV2KEw7LDV\":{\"title\":\"dashboard\",\"url\":\"http:\\/\\/localhost\\/egift\\/dashboard\",\"icon\":\"fa fa-dashboard\"},\"cFRHIEJ_CXNID9E\":{\"title\":\"sales\",\"url\":\"#\",\"icon\":\"fa fa-money\",\"sub\":{\"aStaCmW8ph2wmBN\":{\"title\":\"all sales\",\"url\":\"http:\\/\\/localhost\\/egift\\/sales\",\"icon\":\"fa fa-money\"}}}}', 0, '2019-03-13 13:55:48', '2019-05-05 12:26:46'),
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
(42, 10, 'accountant', 'accountant@gmail.com', '$2y$13$PIF68x.8VMdXNeF7IPAghuddITdCLXrwMBInQtzAYc1TGJVTgzuy.', 9, 'tPYQEhl3mF', '1bB1RIzSHv', 1, '2019-04-21 14:40:44', '2019-04-21 14:45:00'),
(45, 9, 'jollibee', 'jollibee@gmail.com', '$2y$13$oAV.66yej2ERdMRfZdMCy.MN2TBceQxIO6Eb1s28lApq16ogXsP.i', 8, 'mB6NFACjLl', '70kGWYjj4Z', 1, '2019-04-21 15:14:32', '2019-05-04 06:07:24'),
(46, 9, 'landmark', 'landmark@gmail.com', '$2y$13$Hg8xJ.uDMzeWjMDCI6iqmuNFREJGjYymbSAMz3rmSYY5EZlj0hNJi', 7, 'w55KyHn8rp', 'jMSMyJZzDO', 2, '2019-04-21 16:08:13', '2019-05-04 05:30:55'),
(47, 9, '7ZyjcxzOfM', 'samsung@gmail.com', 'OmAvde9obn', 6, 'UI8Y6IFsgp', 'xUmShH6tjI', 1, '2019-04-24 14:52:02', '2019-05-04 05:30:50'),
(48, 9, 'KAbSmk1vBZ', 'bench@gmail.com', '-zfLXfxs36', 8, '9l7Osolzbc', '8WhosoHqi9', 1, '2019-05-05 06:25:47', '2019-05-05 06:25:47'),
(49, 9, 'okFx6jzpX8', 'domino@gmail.com', '$2y$13$2OL4psX5TgUuiTl5USuw.uw9TozPDuzopmmDp.s/vKoerANXPjJxG', 8, '2iURfiNQAu', 'KLiR5Ebd4I', 1, '2019-05-05 08:15:06', '2019-05-05 08:16:26');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eg_category`
--
ALTER TABLE `eg_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_discount_setting`
--
ALTER TABLE `eg_discount_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eg_egift`
--
ALTER TABLE `eg_egift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eg_egift_branches`
--
ALTER TABLE `eg_egift_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eg_egift_freebies`
--
ALTER TABLE `eg_egift_freebies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eg_order`
--
ALTER TABLE `eg_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eg_personnel`
--
ALTER TABLE `eg_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eg_point_management`
--
ALTER TABLE `eg_point_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eg_price_variety`
--
ALTER TABLE `eg_price_variety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eg_profile`
--
ALTER TABLE `eg_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `eg_wishlist`
--
ALTER TABLE `eg_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
