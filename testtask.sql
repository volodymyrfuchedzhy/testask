-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2018 at 02:01 PM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `country` int(6) NOT NULL,
  `note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `name`, `status`, `country`, `note`) VALUES
(1, 3, 'Ivan Ivanov', 1, 1, 'dfdfdfdfd');

-- --------------------------------------------------------

--
-- Table structure for table `client_payment_method_link`
--

CREATE TABLE `client_payment_method_link` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `client_id` int(6) NOT NULL,
  `payment_method_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_payment_method_link`
--

INSERT INTO `client_payment_method_link` (`id`, `user_id`, `client_id`, `payment_method_id`) VALUES
(1, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(6) NOT NULL,
  `iso_code` char(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso_code`, `name`) VALUES
(1, 'USA', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1530831080),
('m130524_201442_init', 1530831084);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `user_id`, `name`, `type`, `description`) VALUES
(1, 2, 'Payment method by bank transfer', 3, 'This is payment method by bank transfer.'),
(2, 3, 'Payment method by PayPal', 1, 'This is payment method by PayPal.'),
(3, 3, 'Another method', 2, 'Skrill?'),
(4, 3, 'Another method 2', 1, 'gfnfv');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_types`
--

CREATE TABLE `payment_method_types` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method_types`
--

INSERT INTO `payment_method_types` (`id`, `name`) VALUES
(1, 'PayPal'),
(2, 'Skrill'),
(3, 'Bank transfer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `subscription_type` tinyint(1) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `is_admin`, `subscription_type`, `company_name`, `full_name`, `country`) VALUES
(1, 'admin', '8couME9glyjn8_51jpCvZWL1-ECDpDUa', '$2y$13$7WE0/2srsixPxZp75wIke.sdSSBR6ayPgCUwa.LzE1UPMn9eGzCuC', NULL, 'admin@q.qqq', 10, 1530831354, 1530831354, 1, 0, '', '', 0),
(2, 'ctest', 'eMG7xDjD1-RomMt5KPMX5ZCP-A1ntUjo', '$2y$13$lEFGPbYB7ECu18z5BbbJ..jXUiY6J4ewf64Uy8sy3bigSyCVSIGL2', NULL, 'ctest@q.qq', 10, 1530876801, 1530876801, 0, 1, 'ctest', 'ctest', 1),
(3, 'itest', 'tvX0K6jpDyfYSn3TJB5fLTMUTPjRFz1d', '$2y$13$E.13dbqZvpcgwNjk.9R2uebdQBCt0ZTULz6Bsh1vnXQ4pmxdi1igi', NULL, 'itest@q.qq', 10, 1530877320, 1530877320, 0, 2, '', 'itest', 1),
(4, 'itest2', 'R3izPcAU5xzuJyLslv8h-0X-tZCtrclm', '$2y$13$U8oI9xkWzzt03Od3H2Qz4uNE5tg4N7xFXlr6sw999SrUJH7Hz2/ji', NULL, 'itest2@q.qq', 10, 1530877406, 1530877406, 0, 2, '', 'itest2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_payment_method_link`
--
ALTER TABLE `client_payment_method_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method_types`
--
ALTER TABLE `payment_method_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_payment_method_link`
--
ALTER TABLE `client_payment_method_link`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_method_types`
--
ALTER TABLE `payment_method_types`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
