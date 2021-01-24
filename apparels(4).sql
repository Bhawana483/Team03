-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2021 at 04:07 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apparels`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloth_category`
--

CREATE TABLE `cloth_category` (
  `id` int NOT NULL,
  `managed_under_id` int NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cloth_category`
--

INSERT INTO `cloth_category` (`id`, `managed_under_id`, `category_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'Shirt', '<div>Something</div>', '2021-01-08 23:11:35', '2021-01-08 23:11:35'),
(2, 4, 'Trousers', '<div>trouserer</div>', '2021-01-13 16:27:26', '2021-01-13 16:27:26'),
(3, 4, 'Suites', '<div>Something</div>', '2021-01-21 12:48:33', '2021-01-23 18:57:43'),
(4, 8, 'Kids Wear', '<div>something</div>', '2021-01-21 13:17:56', '2021-01-23 18:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210119174013', '2021-01-19 23:10:29', 162),
('DoctrineMigrations\\Version20210119175606', '2021-01-19 23:26:12', 2916),
('DoctrineMigrations\\Version20210119180342', '2021-01-19 23:33:49', 631),
('DoctrineMigrations\\Version20210119180611', '2021-01-19 23:36:17', 101),
('DoctrineMigrations\\Version20210119185258', '2021-01-20 00:23:25', 3954),
('DoctrineMigrations\\Version20210120024105', '2021-01-20 08:11:16', 5282),
('DoctrineMigrations\\Version20210121065018', '2021-01-21 12:20:35', 375),
('DoctrineMigrations\\Version20210121091301', '2021-01-21 14:43:17', 579),
('DoctrineMigrations\\Version20210122050949', '2021-01-22 10:39:56', 2354),
('DoctrineMigrations\\Version20210122051120', '2021-01-22 10:41:26', 588),
('DoctrineMigrations\\Version20210122051329', '2021-01-22 10:43:34', 241),
('DoctrineMigrations\\Version20210122051458', '2021-01-22 10:45:06', 378),
('DoctrineMigrations\\Version20210122064655', '2021-01-22 12:17:03', 1263),
('DoctrineMigrations\\Version20210122065758', '2021-01-22 12:28:04', 1054),
('DoctrineMigrations\\Version20210122073456', '2021-01-22 13:05:16', 5478),
('DoctrineMigrations\\Version20210122074539', '2021-01-22 13:15:47', 3211),
('DoctrineMigrations\\Version20210122125136', '2021-01-22 22:00:06', 947);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `manager_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `section` enum('male','female','kids') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` enum('XL','L','M','S') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality` enum('high','average') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `good_fit` enum('slim fit','loose fit','normal') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attractiveness` enum('highly attractive','fine','normal') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` enum('solid','printed','checks','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` enum('full length','short length','knee length','normal') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neck` enum('','round neck','v neck','deep neck') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occasion` enum('traditional','party wear','casual wear','formal wear') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sleeve` enum('','full sleeve','mega sleeve','lantern sleeve') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` enum('made in india','made in zimbawe','made in britain','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ease_of_care` enum('dryclean','washable') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `status` enum('new','review','published') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cloth_type` enum('cotton','nylon','silk','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `manager_id`, `name`, `color`, `brand`, `cost`, `image`, `created_at`, `updated_at`, `section`, `size`, `description`, `quality`, `good_fit`, `attractiveness`, `pattern`, `length`, `neck`, `occasion`, `sleeve`, `origin`, `ease_of_care`, `discount`, `status`, `cloth_type`) VALUES
(161, 2, 4, 'Palazzo Suits', 'Golden', 'Libas', 1199, 'kurti 8.jpg', '2021-01-23 11:21:24', '2021-01-23 19:17:26', 'female', 'L', 'Women Printed Rayon Straight Kurta  (Dark Blue, Light Blue, Beige)', 'high', 'slim fit', 'fine', 'printed', 'knee length', 'v neck', 'casual wear', 'lantern sleeve', 'made in india', 'washable', 0, 'published', 'other'),
(166, 3, 4, 'Anarkali Suit', 'Red', 'Libas', 500, 'kurti 6.jpg', '2021-01-23 19:23:47', '2021-01-23 19:23:47', 'female', 'L', 'Something', 'high', 'slim fit', 'highly attractive', 'printed', 'full length', 'round neck', 'traditional', 'lantern sleeve', 'made in india', 'washable', 0, 'published', 'nylon'),
(167, 1, 3, 'Formal Shirt', 'Blue', 'Wills Lifestyles Shirts', 500, 's1.jpg', '2021-01-23 19:27:05', '2021-01-23 19:27:05', 'male', 'L', 'Something', 'high', 'slim fit', 'highly attractive', 'solid', 'normal', '', 'casual wear', '', 'made in india', 'washable', 20, 'published', 'other'),
(168, 1, 3, 'Casual Shirt', 'Light Blue', 'Wills Lifestyles Shirts', 1000, 'shirt 5.jpg', '2021-01-23 19:30:07', '2021-01-23 19:30:07', 'male', 'L', 'Something', 'high', 'slim fit', 'highly attractive', 'printed', 'normal', 'round neck', 'casual wear', 'lantern sleeve', 'made in india', 'washable', 20, 'published', 'nylon'),
(169, 2, 4, 'Trouser', 'Sky Blue', 'Highlander', 1000, 'jeans 2.jpg', '2021-01-23 19:33:28', '2021-01-23 19:33:28', 'female', 'M', 'Something', 'average', 'slim fit', 'highly attractive', 'solid', 'knee length', '', 'party wear', '', 'made in india', 'washable', 0, 'published', 'other'),
(170, 2, 4, 'Jeans', 'Black', 'Highlander', 1000, 'jeans 1.jpg', '2021-01-23 19:35:48', '2021-01-23 19:35:48', 'male', 'L', 'Something', 'high', 'slim fit', 'highly attractive', 'solid', 'knee length', '', 'casual wear', '', 'made in india', 'washable', 0, 'published', 'cotton'),
(174, 1, 3, 'Formal Shirt', 'Black', 'highlander', 1199, 'shirt1.jpg', '2021-01-23 22:53:25', '2021-01-23 22:58:04', 'male', 'L', 'White solid casual shirt, has a spread collar, long sleeves, curved hem, two flap pockets', 'high', 'slim fit', 'fine', 'solid', 'full length', '', 'formal wear', 'full sleeve', 'made in india', 'washable', 0, 'published', 'cotton'),
(175, 1, 3, 'Formal Shirt', 'Blue', 'fashlook', 356, 'shirt2.jpg', '2021-01-23 22:53:25', '2021-01-23 22:58:56', 'male', 'L', 'Men Slim Fit Printed Casual Shirt', 'average', 'slim fit', 'normal', 'printed', 'full length', '', 'formal wear', 'full sleeve', 'made in india', 'washable', 0, 'published', 'cotton'),
(176, 1, 3, 'Party Shirt', 'Black', 'selvia', 540, 'shirt3.jpg', '2021-01-23 22:53:25', '2021-01-24 14:45:31', 'female', 'M', 'Women Regular Fit Checkered Spread Collar Casual Shirt', 'average', 'normal', 'normal', 'checks', 'full length', '', 'casual wear', 'lantern sleeve', 'made in india', 'washable', 35, 'published', 'cotton'),
(177, 1, 3, 'Party Shirt', 'Blue', 'fairiano', 1199, 'shirt4.jpg', '2021-01-23 22:53:25', '2021-01-23 22:53:25', 'female', 'L', 'The slim collar and solid design make this white casual shirt from fairiano,this 3/4th sleeved shirt can be smartly teamed with a pair of blue jeans and black jeans', 'average', 'slim fit', 'fine', 'solid', 'short length', '', 'party wear', 'mega sleeve', 'made in india', 'washable', 65, 'new', 'silk'),
(178, 1, 3, 'shirt', 'white', 'highlander', 1199, 's1.jpeg', '2021-01-24 14:44:38', '2021-01-24 14:44:38', 'male', 'L', 'White solid casual shirt, has a spread collar, long sleeves, curved hem, two flap pockets', 'high', 'slim fit', 'fine', 'solid', 'full length', '', 'casual wear', 'full sleeve', 'made in india', 'washable', 0, 'new', 'cotton');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_request`
--

CREATE TABLE `reset_password_request` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `selector` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
(1, 1, 'gIEyzRb1oBqjJgitjh9w', 'ziWj7wQUZtbSwPfxUuMhS0SEeSRRrsKkDCK3y9dHaQI=', '2021-01-21 12:28:08', '2021-01-21 13:28:08'),
(2, 2, '2McNpjQSjniW3LcU9NDm', 'IecJpbFKU99YRWdSI4CAQYW6BDNeyR+OJqRQolYrkLw=', '2021-01-24 14:47:17', '2021-01-24 15:47:17'),
(3, 4, 'nnYATto6EUzbxlWFG9v2', 'QSuGKPTabLHUbY1AnCJgnIJsNdd4Gx+XGyyFXNLJgh4=', '2021-01-24 14:48:07', '2021-01-24 15:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `review_by_id` int NOT NULL,
  `review` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review_by_id`, `review`, `created_at`) VALUES
(1, 1, 'hbABJK', '2021-01-20 13:03:04'),
(2, 1, 'susmita basu mallick', '2021-01-20 13:03:04'),
(3, 1, 'Great', '2021-01-20 13:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `first_name`, `last_name`, `contact`, `dob`, `gender`) VALUES
(1, 'raj116347@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$afDTNiV223wVVIugQbJRKg$FL+3do9esLUjZFaEOynSa1VStWW6VKqIB+HN8+8/PLc', 0, '', '', '', NULL, NULL),
(2, '16cse025@gweca.ac.in', '[]', '$argon2id$v=19$m=65536,t=4,p=1$MWQypz2rSXEFwXVKNxX9Qg$eFzZHZwbA9sT/oV1Ymd8GBNQgiFU5/dCQLTJSVH+IxI', 0, '', '', '', NULL, NULL),
(3, 'susmitabasumallick07@gmail.com', '[\"ROLE_MANAGER\"]', '$argon2id$v=19$m=65536,t=4,p=1$FrEwVhYs2NkErad+pI/Yqw$l1BRzgE7JpDMGL4iXrdMu1dTSfEfJaRKQdEzIXTxtcU', 0, '', '', '', NULL, NULL),
(4, 'bhawanatanwar219@gmail.com', '[\"ROLE_MANAGER\"]', '$argon2id$v=19$m=65536,t=4,p=1$RQhQC0rvFJgEf9ZVzL/bPg$xu9hXqs3pNN5ksjeevZlUuooc1xZfv7bkSAwkFIEMsA', 0, '', '', '', NULL, NULL),
(5, 'gargmansi24@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$+6dakZDlBjTg6IR46negqw$5zL9t/gB41fP9FXck44Jtm9k4YhwG5p6xw86nBm8Wtc', 0, '', '', '', NULL, NULL),
(8, 'bt37387@gmail.com', '[\"ROLE_MANAGER\"]', '$argon2id$v=19$m=65536,t=4,p=1$HpPVDddYVn0omNa6pDC1SA$zqeOrcdculi95Wo2BxDiOhY7d8e1CGjVN96FDMPTTm4', 0, 'Bhawana', 'Tanwar', '7891319174', '2016-06-11', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloth_category`
--
ALTER TABLE `cloth_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ADC66E131E403FAA` (`managed_under_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`),
  ADD KEY `IDX_D34A04AD783E3463` (`manager_id`);

--
-- Indexes for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CE748AA76ED395` (`user_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_794381C6B9690C1F` (`review_by_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloth_category`
--
ALTER TABLE `cloth_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cloth_category`
--
ALTER TABLE `cloth_category`
  ADD CONSTRAINT `FK_ADC66E131E403FAA` FOREIGN KEY (`managed_under_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `cloth_category` (`id`),
  ADD CONSTRAINT `FK_D34A04AD783E3463` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_794381C6B9690C1F` FOREIGN KEY (`review_by_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
