-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table shoppingcart.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Shoes', NULL, NULL),
	(2, 'Shirts', NULL, NULL),
	(3, 'Pants', NULL, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.currencies: ~2 rows (approximately)
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT IGNORE INTO `currencies` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'USD', NULL, NULL),
	(2, 'ZWL', NULL, NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.exchangerates
CREATE TABLE IF NOT EXISTS `exchangerates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `primary_currency_id` int(11) NOT NULL,
  `secondary_currency_id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.exchangerates: ~0 rows (approximately)
/*!40000 ALTER TABLE `exchangerates` DISABLE KEYS */;
INSERT IGNORE INTO `exchangerates` (`id`, `primary_currency_id`, `secondary_currency_id`, `amount`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '140', NULL, NULL);
/*!40000 ALTER TABLE `exchangerates` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.invoicenumbers
CREATE TABLE IF NOT EXISTS `invoicenumbers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `inv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.invoicenumbers: ~0 rows (approximately)
/*!40000 ALTER TABLE `invoicenumbers` DISABLE KEYS */;
INSERT IGNORE INTO `invoicenumbers` (`id`, `inv`, `created_at`, `updated_at`) VALUES
	(1, 49, '2021-07-27 15:39:44', '2021-07-28 16:45:54');
/*!40000 ALTER TABLE `invoicenumbers` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.migrations: ~10 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_07_25_122222_create_products_table', 1),
	(5, '2021_07_25_122503_create_currencies_table', 1),
	(6, '2021_07_25_122537_create_exchangerates_table', 1),
	(7, '2021_07_25_123656_create_categories_table', 2),
	(11, '2021_07_27_150514_create_orders_table', 3),
	(12, '2021_07_27_150534_create_orderitems_table', 3),
	(13, '2021_07_27_150608_create_invoicenumbers_table', 3),
	(14, '2021_07_27_154236_create_onlinepayments_table', 4),
	(15, '2021_07_27_154313_create_receipts_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.onlinepayments
CREATE TABLE IF NOT EXISTS `onlinepayments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.onlinepayments: ~6 rows (approximately)
/*!40000 ALTER TABLE `onlinepayments` DISABLE KEYS */;
INSERT IGNORE INTO `onlinepayments` (`id`, `user_id`, `invoicenumber`, `poll_url`, `amount`, `mode`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, 'inv202172711', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=6589af13-bed6-480b-ab66-10d663a6c831', '25', 'paynow', 'paid', '2021-07-28 15:15:57', '2021-07-28 15:37:29'),
	(3, 1, 'inv2021728134', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=03348de0-3d15-4089-b648-7322f6274899', '6400', 'ECOCASH', 'awaiting delivery', '2021-07-28 16:11:02', '2021-07-28 16:14:25'),
	(4, 1, 'inv2021728140', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3f580135-378a-4583-8b48-30afa5ea0849', '2000', 'ECOCASH', 'PENDING', '2021-07-28 16:22:42', '2021-07-28 16:22:42'),
	(5, 1, 'inv2021728140', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=9bcd225c-74b2-4e86-a03b-5f622e106b1c', '1000', 'ECOCASH', 'paid', '2021-07-28 16:36:20', '2021-07-28 16:38:28'),
	(6, 1, 'inv2021728140', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=3d02aff5-7e18-44d8-8c5f-149e795d5ce1', '200', 'ECOCASH', 'paid', '2021-07-28 16:43:24', '2021-07-28 16:43:47'),
	(7, 1, 'inv2021728140', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=86d14b04-bc68-4cec-aab0-0b105805a0ab', '200', 'ECOCASH', 'paid', '2021-07-28 16:44:32', '2021-07-28 16:44:42'),
	(8, 1, 'inv2021728139', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=e1e0db06-6cb1-4170-81c4-0f54146f5405', '15', 'paynow', 'paid', '2021-07-28 16:45:42', '2021-07-28 16:45:54');
/*!40000 ALTER TABLE `onlinepayments` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.orderitems
CREATE TABLE IF NOT EXISTS `orderitems` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.orderitems: ~6 rows (approximately)
/*!40000 ALTER TABLE `orderitems` DISABLE KEYS */;
INSERT IGNORE INTO `orderitems` (`id`, `order_id`, `product_id`, `currency`, `qty`, `price`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 'USD', '1', '10', '2021-07-27 15:40:50', '2021-07-27 15:40:50'),
	(2, 2, 2, 'USD', '1', '15', '2021-07-27 15:40:50', '2021-07-27 15:40:50'),
	(3, 3, 2, 'ZWL', '1', '2100', '2021-07-28 15:42:41', '2021-07-28 15:42:41'),
	(4, 3, 3, 'ZWL', '1', '2800', '2021-07-28 15:42:41', '2021-07-28 15:42:41'),
	(5, 3, 1, 'ZWL', '1', '1400', '2021-07-28 15:42:41', '2021-07-28 15:42:41'),
	(6, 4, 2, 'USD', '1', '15', '2021-07-28 16:19:26', '2021-07-28 16:19:26'),
	(7, 5, 1, 'ZWL', '1', '1400', '2021-07-28 16:22:18', '2021-07-28 16:22:18');
/*!40000 ALTER TABLE `orderitems` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.orders: ~4 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT IGNORE INTO `orders` (`id`, `user_id`, `uuid`, `invoicenumber`, `delivery_address`, `notes`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, '34317c66-0bf0-4b36-a677-ccefa4c43d16', 'inv202172711', '16832 stoneridge Park Harare Traflagar', NULL, 'AWAITING', '2021-07-27 15:40:50', '2021-07-28 15:37:29'),
	(3, 1, '63f99021-1fe7-488e-94ba-ae44edb2a861', 'inv2021728134', '16832 stoneridge Park Harare', NULL, 'AWAITING', '2021-07-28 15:42:41', '2021-07-28 16:14:25'),
	(4, 1, '1dac2770-2dfc-4028-ac10-adc83abfef78', 'inv2021728139', '16832 stoneridge Park Harare', NULL, 'AWAITING', '2021-07-28 16:19:26', '2021-07-28 16:45:54'),
	(5, 1, '1024e1da-c9b0-4947-a778-75a21e7c5bcf', 'inv2021728140', '16832 stoneridge Park Harare', NULL, 'AWAITING', '2021-07-28 16:22:18', '2021-07-28 16:44:42');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_id` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.products: ~3 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT IGNORE INTO `products` (`id`, `name`, `description`, `category_id`, `image`, `currency_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 'black tshirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit finibus nunc at dictum. Cras eu mauris vel ex feugiat vehicula vitae non velit. Aliquam ac cursus nisl. Nullam at interdum libero. Phasellus quis tincidunt odio. Donec fringilla sollicitudin metus nec ultricies. Praesent euismod rhoncus turpis at sollicitudin. Ut neque nulla, placerat eget mi quis, laoreet mattis massa. Phasellus a sapien ac mauris cursus dictum ut sit amet lectus. Maecenas volutpat dignissim enim nec tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse nibh elit, molestie nec orci in, dictum consequat nulla. Aliquam condimentum neque eget ipsum ultrices, sit amet convallis leo euismod', '2', 'products/blacktshirt.png', 1, '10', '*', NULL, NULL),
	(2, 'Kaky Pants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit finibus nunc at dictum. Cras eu mauris vel ex feugiat vehicula vitae non velit. Aliquam ac cursus nisl. Nullam at interdum libero. Phasellus quis tincidunt odio. Donec fringilla sollicitudin metus nec ultricies. Praesent euismod rhoncus turpis at sollicitudin. Ut neque nulla, placerat eget mi quis, laoreet mattis massa. Phasellus a sapien ac mauris cursus dictum ut sit amet lectus. Maecenas volutpat dignissim enim nec tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse nibh elit, molestie nec orci in, dictum consequat nulla. Aliquam condimentum neque eget ipsum ultrices, sit amet convallis leo euismod', '1', 'products/pants.png', 1, '15', '*', NULL, NULL),
	(3, 'Shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam blandit finibus nunc at dictum. Cras eu mauris vel ex feugiat vehicula vitae non velit. Aliquam ac cursus nisl. Nullam at interdum libero. Phasellus quis tincidunt odio. Donec fringilla sollicitudin metus nec ultricies. Praesent euismod rhoncus turpis at sollicitudin. Ut neque nulla, placerat eget mi quis, laoreet mattis massa. Phasellus a sapien ac mauris cursus dictum ut sit amet lectus. Maecenas volutpat dignissim enim nec tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse nibh elit, molestie nec orci in, dictum consequat nulla. Aliquam condimentum neque eget ipsum ultrices, sit amet convallis leo euismod', '3', 'products/shoes.png', 1, '20', '*', NULL, NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.receipts
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onlinepayment_id` int(11) NOT NULL DEFAULT '0',
  `receiptnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.receipts: ~6 rows (approximately)
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT IGNORE INTO `receipts` (`id`, `invoicenumber`, `onlinepayment_id`, `receiptnumber`, `currency`, `amount`, `created_at`, `updated_at`) VALUES
	(5, 'inv202172711', 2, 'rpt2021728130', 'USD', '25', '2021-07-28 15:37:29', '2021-07-28 15:37:29'),
	(6, 'inv2021728134', 3, 'rpt2021728135', 'ZWL', '6400', '2021-07-28 16:14:25', '2021-07-28 16:14:25'),
	(7, 'inv2021728140', 5, 'rpt2021728141', 'ZWL', '1000', '2021-07-28 16:38:28', '2021-07-28 16:38:28'),
	(8, 'inv2021728140', 6, 'rpt2021728142', 'ZWL', '200', '2021-07-28 16:43:47', '2021-07-28 16:43:47'),
	(9, 'inv2021728140', 7, 'rpt2021728143', 'ZWL', '200', '2021-07-28 16:44:42', '2021-07-28 16:44:42'),
	(10, 'inv2021728139', 8, 'rpt2021728147', 'USD', '15', '2021-07-28 16:45:54', '2021-07-28 16:45:54');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;

-- Dumping structure for table shoppingcart.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table shoppingcart.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `surname`, `phonenumber`, `address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Benson', 'Misi', '+263775474661', '16832 stoneridge Park Harare', 'benson.misi@gmail.com', NULL, '$2y$10$XqLWT6nlZyINFk4mee4TbuDkSyv6TuaktdSmB3O.lFvExqimTpaNW', NULL, '2021-07-27 15:04:25', '2021-07-27 15:04:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
