-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 08:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uap`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecommerce`
--

CREATE TABLE `ecommerce` (
  `id_ecommerce` int(64) NOT NULL,
  `tokopedia` varchar(255) NOT NULL,
  `shopee` varchar(255) NOT NULL,
  `bukalapak` varchar(255) NOT NULL,
  `lazada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ecommerce`
--

INSERT INTO `ecommerce` (`id_ecommerce`, `tokopedia`, `shopee`, `bukalapak`, `lazada`) VALUES
(1, 'https://www.tokopedia.com/', 'https://shopee.co.id/user/purchase/', 'https://www.bukalapak.com/', 'https://www.lazada.co.id/');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `last_name`, `email`, `password`, `date`) VALUES
(1, 'dragon', 'slayer', 'dragonslayer69@gmail.com', '12345678', '2024-06-10 12:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed`
--

CREATE TABLE `sosmed` (
  `id_sosmed` int(8) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sosmed`
--

INSERT INTO `sosmed` (`id_sosmed`, `instagram`, `linkedin`, `x`, `facebook`) VALUES
(2, 'https://www.instagram.com/anandraiqbal/', 'https://www.linkedin.com', 'https://x.com/unila_base', 'https://www.facebook.com/groups/1065099111043047/?hoisted_section_header_type=recently_seen&multi_permalinks=1339669473586008');

-- --------------------------------------------------------

--
-- Table structure for table `urlsave`
--

CREATE TABLE `urlsave` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urlsave`
--

INSERT INTO `urlsave` (`id`, `email`, `url`, `title`, `caption`, `tag`, `date`) VALUES
(2, 'dragonslayer69@gmail.com', 'https://github.com/rafidharyu/UrlSave', 'projeck uap', 'Lorem ipsum dolor sit amet constectur', '', '2024-06-10 12:20:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecommerce`
--
ALTER TABLE `ecommerce`
  ADD PRIMARY KEY (`id_ecommerce`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indexes for table `urlsave`
--
ALTER TABLE `urlsave`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecommerce`
--
ALTER TABLE `ecommerce`
  MODIFY `id_ecommerce` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id_sosmed` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `urlsave`
--
ALTER TABLE `urlsave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
