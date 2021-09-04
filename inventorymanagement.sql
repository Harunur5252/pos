-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 12:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Mobile', 1, 12, 12, '2021-03-03 05:52:43', '2021-03-04 11:51:53'),
(3, 'Cement', 1, 12, NULL, '2021-03-04 11:52:01', '2021-03-04 11:52:01'),
(4, 'Breads', 1, 12, NULL, '2021-03-04 11:52:22', '2021-03-04 11:52:22'),
(6, 'Savan', 1, 12, 12, '2021-03-04 11:52:44', '2021-03-04 11:52:57'),
(7, 'Electronics', 1, 12, NULL, '2021-03-05 01:08:11', '2021-03-05 01:08:11'),
(8, 'pos', 1, 12, NULL, '2021-03-05 10:13:28', '2021-03-05 10:13:28'),
(9, 'Cement', 1, 12, NULL, '2021-03-05 10:13:39', '2021-03-05 10:13:39'),
(10, 'roll', 1, 12, NULL, '2021-03-05 10:13:52', '2021-03-05 10:13:52'),
(11, 'Rice', 1, 12, NULL, '2021-03-09 11:02:47', '2021-03-09 11:02:47'),
(12, 'Laptop', 1, 12, NULL, '2021-03-17 16:31:40', '2021-03-17 16:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(191) NOT NULL DEFAULT 1,
  `created_by` int(191) DEFAULT NULL,
  `updated_by` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'karim', '0125566366', 'karim@gmail.com', 'jamalpur', 1, 12, 12, '2021-03-04 11:51:20', '2021-03-04 11:58:45'),
(4, 'harun', '0125566366', 'harun@gmail.com', 'sherpur,mymensingh', 1, 12, NULL, '2021-03-06 10:21:36', '2021-03-06 10:21:36'),
(6, 'karim', '0125566366', NULL, 'jamalpur', 1, 12, NULL, '2021-03-14 17:07:44', '2021-03-14 17:07:44'),
(7, 'masud', '0125566366', NULL, 'jamalpur', 1, 12, NULL, '2021-03-15 03:43:47', '2021-03-15 03:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(13, '1', '2021-03-15', 'good', 1, 12, 12, '2021-03-15 03:43:46', '2021-03-15 09:58:21'),
(16, '2', '2021-03-15', 'very good', 1, 12, 12, '2021-03-15 09:01:29', '2021-03-15 09:59:07'),
(17, '3', '2021-03-18', NULL, 1, 12, 12, '2021-03-17 15:22:22', '2021-03-17 15:24:04'),
(18, '4', '2021-03-19', NULL, 1, 12, 12, '2021-03-17 16:34:46', '2021-03-17 16:34:56'),
(19, '5', '2021-03-17', NULL, 1, 12, 12, '2021-03-17 16:39:57', '2021-03-17 16:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `invoices_datails`
--

CREATE TABLE `invoices_datails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices_datails`
--

INSERT INTO `invoices_datails` (`id`, `invoice_id`, `category_id`, `product_id`, `date`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 2, 1, '2021-03-15', 10, 10, 100, 1, '2021-03-15 03:43:46', '2021-03-15 03:43:46'),
(2, 13, 2, 3, '2021-03-15', 10, 10, 100, 1, '2021-03-15 03:43:46', '2021-03-15 03:43:46'),
(3, 13, 2, 6, '2021-03-15', 10, 10, 100, 1, '2021-03-15 03:43:46', '2021-03-15 03:43:46'),
(6, 16, 8, 5, '2021-03-15', 10, 20000, 200000, 1, '2021-03-15 09:01:29', '2021-03-15 09:01:29'),
(7, 17, 9, 4, '2021-03-18', 10, 900, 9000, 1, '2021-03-17 15:22:22', '2021-03-17 15:22:22'),
(8, 18, 12, 8, '2021-03-19', 80, 20000, 1600000, 1, '2021-03-17 16:34:46', '2021-03-17 16:34:56'),
(9, 19, 12, 8, '2021-03-17', 200, 20000, 4000000, 1, '2021-03-17 16:39:57', '2021-03-17 16:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_000000_create_users_table', 2),
(5, '2021_03_02_145021_create_suppliers_table', 3),
(6, '2021_03_02_164320_create_customers_table', 4),
(7, '2021_03_02_180642_create_units_table', 5),
(8, '2021_03_03_111031_create_categories_table', 6),
(9, '2021_03_04_173022_create_products_table', 7),
(10, '2021_03_05_071655_create_purchases_table', 8),
(11, '2021_03_10_052715_create_invoices_table', 9),
(12, '2021_03_10_054235_create_invoices_datails_table', 9),
(13, '2021_03_10_054924_create_payments_table', 10),
(14, '2021_03_10_092956_create_invoices_table', 11),
(15, '2021_03_10_093039_create_invoices_datails_table', 11),
(16, '2021_03_10_093100_create_payment_details_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(4, 13, 7, 'full_paid', 280, 0, 280, 20, '2021-03-15 03:43:47', '2021-03-22 02:41:11'),
(7, 16, 4, 'full_paid', 199000, 0, 199000, 1000, '2021-03-15 09:01:29', '2021-03-15 09:01:29'),
(8, 17, 6, 'full_paid', 9000, 0, 9000, NULL, '2021-03-17 15:22:22', '2021-03-17 15:22:22'),
(9, 18, 7, 'full_due', 0, 1600000, 1600000, NULL, '2021-03-17 16:34:46', '2021-03-17 16:34:46'),
(10, 19, 7, 'full_paid', 4000000, 0, 4000000, NULL, '2021-03-17 16:39:57', '2021-03-17 16:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 13, 200, '2021-03-15', NULL, '2021-03-15 03:43:47', '2021-03-15 03:43:47'),
(6, 16, 199000, '2021-03-15', NULL, '2021-03-15 09:01:29', '2021-03-15 09:01:29'),
(7, 17, 9000, '2021-03-18', NULL, '2021-03-17 15:22:22', '2021-03-17 15:22:22'),
(8, 18, 0, '2021-03-19', NULL, '2021-03-17 16:34:46', '2021-03-17 16:34:46'),
(9, 19, 4000000, '2021-03-17', NULL, '2021-03-17 16:39:57', '2021-03-17 16:39:57'),
(10, 13, 50, '2021-03-22', 12, '2021-03-22 02:37:57', '2021-03-22 02:37:57'),
(11, 13, 30, '2021-03-22', 12, '2021-03-22 02:41:12', '2021-03-22 02:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `supplier_id`, `unit_id`, `category_id`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Walton Rm3', 3, 2, 2, 0, 1, 12, 12, '2021-03-04 13:00:24', '2021-03-23 02:53:41'),
(3, 'Vivo Y91C', 4, 2, 2, 20, 1, 12, NULL, '2021-03-05 01:07:31', '2021-03-17 15:17:37'),
(4, 'boshundhara rood', 5, 3, 9, 0, 1, 12, NULL, '2021-03-05 10:14:42', '2021-03-17 15:24:04'),
(5, 'admin panel', 6, 2, 8, 110, 1, 12, NULL, '2021-03-05 10:15:19', '2021-03-17 16:29:40'),
(6, 'Walton Rm2', 3, 2, 2, 20, 1, 12, NULL, '2021-03-06 08:59:58', '2021-03-15 09:58:21'),
(7, 'basmoti rice', 7, 3, 11, 23, 1, 12, NULL, '2021-03-09 11:03:23', '2021-03-15 05:02:01'),
(8, 'Aspire F 13', 8, 2, 12, 20, 1, 12, NULL, '2021-03-17 16:32:31', '2021-03-17 16:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 4, 2, 3, 'mobile-1', '2021-03-09', 'Good quality', 10, 10000, 100000, 1, 12, NULL, '2021-03-09 04:40:37', '2021-03-09 09:58:41'),
(7, 5, 9, 4, 'cement-1', '2021-03-09', 'Good quality', 10, 1000, 10000, 1, 12, NULL, '2021-03-09 04:40:38', '2021-03-09 09:57:10'),
(8, 7, 11, 7, 'rice-1', '2021-03-10', 'Good quality', 13, 100, 1300, 1, 12, NULL, '2021-03-09 11:04:28', '2021-03-15 05:02:01'),
(9, 7, 11, 7, 'rice-2324', '2021-03-15', 'Good quality', 10, 100, 1000, 1, 12, NULL, '2021-03-15 05:01:37', '2021-03-15 05:01:57'),
(10, 4, 2, 3, 'fdfd', '2021-03-18', 'Good quality', 10, 900, 9000, 1, 12, NULL, '2021-03-17 15:17:06', '2021-03-17 15:17:37'),
(11, 6, 8, 5, 'bsd-1', '2021-03-18', 'Good quality', 20, 900, 18000, 1, 12, NULL, '2021-03-17 16:29:26', '2021-03-17 16:29:40'),
(12, 8, 12, 8, 'acer-1', '2021-03-19', 'Good quality', 100, 60000, 6000000, 1, 12, NULL, '2021-03-17 16:33:27', '2021-03-17 16:33:36'),
(13, 8, 12, 8, 'acer-2', '2021-03-20', 'Good quality', 200, 30000, 6000000, 1, 12, NULL, '2021-03-17 16:38:29', '2021-03-17 16:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(191) DEFAULT NULL,
  `updated_by` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Walton', '0125566366', 'walton@gmail.com', 'sherpur,mymensingh', '1', 12, 12, '2021-03-02 10:11:16', '2021-03-04 11:58:01'),
(4, 'vivo', '0130654512', 'vivo@gmail.com', 'sherpur', '1', 12, NULL, '2021-03-04 11:58:09', '2021-03-04 11:58:09'),
(5, 'Rkg', '0125566366', 'admin@gmail.com', 'sherpur,mymensingh', '1', 12, NULL, '2021-03-05 10:12:44', '2021-03-05 10:12:44'),
(6, 'bsd', '0130654512', 'user@gmail.com', 'jamalpur', '1', 12, NULL, '2021-03-05 10:13:09', '2021-03-05 10:13:09'),
(7, 'Auto_RIce_mil', '0125566366', 'harun695@gmail.com', 'sherpur,mymensingh', '1', 12, NULL, '2021-03-09 10:12:44', '2021-03-09 10:12:44'),
(8, 'Acer', '0125566366', 'acer@gmail.com', 'sherpur,mymensingh', '1', 12, NULL, '2021-03-17 16:31:22', '2021-03-17 16:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'pcs', 1, 12, 12, '2021-03-02 12:33:19', '2021-03-03 05:08:02'),
(3, 'kg', 1, 12, NULL, '2021-03-02 12:33:26', '2021-03-02 12:33:26'),
(4, 'liter', 1, 12, NULL, '2021-03-02 12:33:41', '2021-03-02 12:33:41'),
(5, 'gram', 1, 12, NULL, '2021-03-02 12:35:43', '2021-03-02 12:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `status`, `gender`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$WTBHX2nA65DwrLwi8nf2VeoCE5dmLnrRgfrf1OzwPMDN1abVtbsv6', '0125566366', 'sherpur,mymensingh', 1, 'male', 'upload/userprofileimg/2021-03-01.jpg', NULL, '2021-03-01 10:19:02', '2021-03-01 11:45:30'),
(12, 'admin', 'harun', 'harun@gmail.com', NULL, '$2y$10$8P0hleQM23HVWztqtQ9rWeZ1kwDsp19zsPSe8fFUmwJCtBEuYW9JK', '0125566366', 'sherpur,mymensingh', 1, 'male', 'upload/userprofileimg/611f79071e194.jpg', 'crPFe55tTwNS0UPLB8doSOHEGNPHulaApUdfSi3Hw9KKVy63txZzkVebBqG5', '2021-03-01 11:46:06', '2021-08-20 03:42:31'),
(13, 'user', 'karim', 'karim@gmail.com', NULL, '$2y$10$MlBNrIdI1DIdGgpB0QyPduT3PFBYwkDHRmJdQ099Yw9F5VIOqHqOS', '0125566366', NULL, 1, NULL, NULL, NULL, '2021-03-01 11:46:26', '2021-03-01 11:46:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices_datails`
--
ALTER TABLE `invoices_datails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoices_datails`
--
ALTER TABLE `invoices_datails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
