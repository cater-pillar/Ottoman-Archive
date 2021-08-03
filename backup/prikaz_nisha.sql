-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 02:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prikaz_nisha`
--

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `household_id` int(10) UNSIGNED NOT NULL,
  `member_forname` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `member_surname` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `fk_household_member_type_id` int(10) UNSIGNED NOT NULL,
  `household_number` int(10) NOT NULL,
  `fk_location_name_id` int(10) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `household_member_type`
--

CREATE TABLE `household_member_type` (
  `household_member_type_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `household_member_type`
--

INSERT INTO `household_member_type` (`household_member_type_id`, `type`) VALUES
(1, 'hane reisi'),
(2, 'valide'),
(3, 'halile'),
(4, 'kardeş'),
(5, 'oğul');

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `land_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`land_id`, `type`) VALUES
(6, 'Bağ'),
(1, 'Gayri Mezru Tarla'),
(2, 'Mezru Tarla'),
(4, 'Müstecir Mezru Tarla'),
(5, 'Sebze Bahçesi'),
(7, 'Çayır'),
(8, 'Çiftlik'),
(3, 'İcar ile Verildiği Tarla');

-- --------------------------------------------------------

--
-- Table structure for table `land_household`
--

CREATE TABLE `land_household` (
  `land_household_id` int(10) UNSIGNED NOT NULL,
  `fk_land_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `area` int(10) UNSIGNED NOT NULL,
  `income` int(10) UNSIGNED NOT NULL,
  `payed_rent` int(10) UNSIGNED NOT NULL,
  `location` text COLLATE utf8mb4_bin DEFAULT NULL,
  `description` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `livestock`
--

CREATE TABLE `livestock` (
  `livestock_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `livestock_household`
--

CREATE TABLE `livestock_household` (
  `livestock_household_id` int(10) UNSIGNED NOT NULL,
  `fk_livestock_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `income` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `location_name`
--

CREATE TABLE `location_name` (
  `location_name_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `fk_location_type_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `fk_location_name_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `location_name`
--

INSERT INTO `location_name` (`location_name_id`, `name`, `fk_location_type_id`, `fk_location_name_id`) VALUES
(1, 'Niş', 2, NULL),
(2, 'Niş', 1, 1),
(3, 'Niş', 5, 2),
(4, 'Hünkar', 3, 2),
(5, 'Defterdar', 3, 2),
(6, 'Taşköprü', 3, 2),
(7, 'Hacı Bekir', 3, 2),
(8, 'Rizaiyye', 3, 2),
(9, 'Belgrad', 3, 2),
(10, 'Cedide', 3, 2),
(11, 'Yahyapaşa', 3, 2),
(12, 'Papaz Kosto', 3, 2),
(13, 'Papaz İstanko', 3, 2),
(14, 'Papaz Gorki', 3, 2),
(15, 'Papaz Yone', 3, 2),
(16, 'Papaz Naon', 4, 3),
(17, 'Papaz Yovan Kefere', 4, 3),
(18, 'Papaz Mito', 4, 3),
(19, 'Papaz Yovan', 4, 3),
(20, 'Yagodin', 3, 2),
(21, 'Kebir-i Çinçar', 3, 2),
(22, 'Sağir-i Çinçar', 3, 2),
(23, 'Kebir-i Koptiyan', 3, 2),
(24, 'Sağir-i Koptiyan', 3, 2),
(25, 'Mitçe Konluğu', 8, 2),
(28, 'At Pazarında Dükkanlar', 8, 2),
(29, 'Acı Goko Konluğu', 8, 2),
(30, 'Kojuşko Asıyab', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `location_type`
--

CREATE TABLE `location_type` (
  `location_type_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `location_type`
--

INSERT INTO `location_type` (`location_type_id`, `type`) VALUES
(8, 'Diğer'),
(2, 'Kaza'),
(6, 'Köy'),
(3, 'Mahalle'),
(4, 'Neverye'),
(5, 'Varoş'),
(7, 'Çiftlik'),
(1, 'Şehir');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `occupation_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `fk_occupation_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`occupation_id`, `name`, `fk_occupation_id`) VALUES
(1, 'Esnaf', NULL),
(2, 'Görevli', NULL),
(3, 'Ziraat', NULL),
(4, 'Mesleksiz', NULL),
(5, 'Ticaret', NULL),
(6, 'Askeri Alanda Hizmet Veren Görevliler', 2),
(7, 'Dini Alanda Hizmet Veren Görevliler', 2),
(8, 'İctimai ve İdari Alanda Hizmet Veren Görevliler', 2),
(9, 'İşçi', NULL),
(10, 'Unknown', NULL),
(11, 'Derıden Mal Ureten ve Satan Esnaf', 1),
(12, 'Metaldan Mal Üreten ve Satan Esnaf', 1),
(13, 'Dokumacılık Alanındaki Meslekler', 1),
(14, 'Kumaştan Mal Üreten ve Satan Esnaf', 1),
(15, 'Diğer Mal Üreten ve Satan Esnaf', 1),
(16, 'Çeşitli Hizmetleri Yerine Getirenler', 1),
(17, 'Yiyecek Maddeleri Üreten ve Satan Esnaf', 1),
(18, 'Taşımacılık Alanındaki Meslekler', 1);

-- --------------------------------------------------------

--
-- Table structure for table `occupation_household`
--

CREATE TABLE `occupation_household` (
  `occupation_household_id` int(10) UNSIGNED NOT NULL,
  `fk_occupation_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `income` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('Usta','Kalfa','Çırak') COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `real_estate`
--

CREATE TABLE `real_estate` (
  `real_estate_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `real_estate`
--

INSERT INTO `real_estate` (`real_estate_id`, `type`) VALUES
(1, 'Asiyab'),
(8, 'Dükkan'),
(6, 'Gümrükhane'),
(2, 'Hamam'),
(3, 'Han'),
(4, 'Kahvehane'),
(7, 'Kirahane'),
(5, 'Meyhane');

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_household`
--

CREATE TABLE `real_estate_household` (
  `real_estate_household_id` int(10) UNSIGNED NOT NULL,
  `fk_real_estate_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `fk_household_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rent_income` int(10) UNSIGNED DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `desciption` text COLLATE utf8mb4_bin DEFAULT NULL,
  `location` text COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `tax_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `type`) VALUES
(3, 'bedel-i öşr-i bostan'),
(4, 'bedel-i öşr-i kovan'),
(8, 'cizye'),
(7, 'resm-i adet-i ağnam'),
(6, 'resm-i asıyab'),
(5, 'resm-i bağ'),
(1, 'vergi-i mahsuse'),
(2, 'öşür (tarla)');

-- --------------------------------------------------------

--
-- Table structure for table `tax_household`
--

CREATE TABLE `tax_household` (
  `tax_household_id` int(10) UNSIGNED NOT NULL,
  `fk_tax_id` int(10) UNSIGNED NOT NULL,
  `fk_household_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `is_exused` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`household_id`),
  ADD KEY `fk_household_member_type_id` (`fk_household_member_type_id`),
  ADD KEY `fk_location_name_id` (`fk_location_name_id`);

--
-- Indexes for table `household_member_type`
--
ALTER TABLE `household_member_type`
  ADD PRIMARY KEY (`household_member_type_id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`land_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `land_household`
--
ALTER TABLE `land_household`
  ADD PRIMARY KEY (`land_household_id`),
  ADD KEY `fk_land_id_land_land_id` (`fk_land_id`),
  ADD KEY `fk_household_id_household_land_household_id` (`fk_household_id`);

--
-- Indexes for table `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`livestock_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `livestock_household`
--
ALTER TABLE `livestock_household`
  ADD PRIMARY KEY (`livestock_household_id`),
  ADD KEY `fk_livestock_id_livestock_livestock_id` (`fk_livestock_id`),
  ADD KEY `fk_household_id_livestock_household_household_id` (`fk_household_id`);

--
-- Indexes for table `location_name`
--
ALTER TABLE `location_name`
  ADD PRIMARY KEY (`location_name_id`),
  ADD KEY `fk_location_name_id_location_name` (`fk_location_name_id`),
  ADD KEY `fk_location_type_id_location_type` (`fk_location_type_id`);

--
-- Indexes for table `location_type`
--
ALTER TABLE `location_type`
  ADD PRIMARY KEY (`location_type_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`occupation_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `fk_occupation_id_occupation_id` (`fk_occupation_id`);

--
-- Indexes for table `occupation_household`
--
ALTER TABLE `occupation_household`
  ADD PRIMARY KEY (`occupation_household_id`),
  ADD KEY `fk_occupation_id` (`fk_occupation_id`),
  ADD KEY `fk_household_id` (`fk_household_id`);

--
-- Indexes for table `real_estate`
--
ALTER TABLE `real_estate`
  ADD PRIMARY KEY (`real_estate_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `real_estate_household`
--
ALTER TABLE `real_estate_household`
  ADD PRIMARY KEY (`real_estate_household_id`),
  ADD KEY `fk_household_id_household` (`fk_household_id`),
  ADD KEY `fk_real_estate_id_real_estate` (`fk_real_estate_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `tax_household`
--
ALTER TABLE `tax_household`
  ADD PRIMARY KEY (`tax_household_id`),
  ADD KEY `fk_tax_id_tax_tax_id` (`fk_tax_id`),
  ADD KEY `fk_household_id_household_household_id` (`fk_household_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `household_member_type`
--
ALTER TABLE `household_member_type`
  MODIFY `household_member_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `land_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `land_household`
--
ALTER TABLE `land_household`
  MODIFY `land_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livestock`
--
ALTER TABLE `livestock`
  MODIFY `livestock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livestock_household`
--
ALTER TABLE `livestock_household`
  MODIFY `livestock_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_name`
--
ALTER TABLE `location_name`
  MODIFY `location_name_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `location_type`
--
ALTER TABLE `location_type`
  MODIFY `location_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `occupation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `occupation_household`
--
ALTER TABLE `occupation_household`
  MODIFY `occupation_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `real_estate`
--
ALTER TABLE `real_estate`
  MODIFY `real_estate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `real_estate_household`
--
ALTER TABLE `real_estate_household`
  MODIFY `real_estate_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tax_household`
--
ALTER TABLE `tax_household`
  MODIFY `tax_household_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `fk_household_member_type_id` FOREIGN KEY (`fk_household_member_type_id`) REFERENCES `household_member_type` (`household_member_type_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_location_name_id` FOREIGN KEY (`fk_location_name_id`) REFERENCES `location_name` (`location_name_id`) ON UPDATE CASCADE;

--
-- Constraints for table `land_household`
--
ALTER TABLE `land_household`
  ADD CONSTRAINT `fk_household_id_household_land_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_land_id_land_land_id` FOREIGN KEY (`fk_land_id`) REFERENCES `land` (`land_id`) ON UPDATE CASCADE;

--
-- Constraints for table `livestock_household`
--
ALTER TABLE `livestock_household`
  ADD CONSTRAINT `fk_household_id_livestock_household_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_livestock_id_livestock_livestock_id` FOREIGN KEY (`fk_livestock_id`) REFERENCES `livestock` (`livestock_id`) ON UPDATE CASCADE;

--
-- Constraints for table `location_name`
--
ALTER TABLE `location_name`
  ADD CONSTRAINT `fk_location_name_id_location_name` FOREIGN KEY (`fk_location_name_id`) REFERENCES `location_name` (`location_name_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_location_type_id_location_type` FOREIGN KEY (`fk_location_type_id`) REFERENCES `location_type` (`location_type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `occupation`
--
ALTER TABLE `occupation`
  ADD CONSTRAINT `fk_occupation_id_occupation_id` FOREIGN KEY (`fk_occupation_id`) REFERENCES `occupation` (`occupation_id`) ON UPDATE CASCADE;

--
-- Constraints for table `occupation_household`
--
ALTER TABLE `occupation_household`
  ADD CONSTRAINT `fk_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_occupation_id` FOREIGN KEY (`fk_occupation_id`) REFERENCES `occupation` (`occupation_id`) ON UPDATE CASCADE;

--
-- Constraints for table `real_estate_household`
--
ALTER TABLE `real_estate_household`
  ADD CONSTRAINT `fk_household_id_household` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_real_estate_id_real_estate` FOREIGN KEY (`fk_real_estate_id`) REFERENCES `real_estate` (`real_estate_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tax_household`
--
ALTER TABLE `tax_household`
  ADD CONSTRAINT `fk_household_id_household_household_id` FOREIGN KEY (`fk_household_id`) REFERENCES `household` (`household_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tax_id_tax_tax_id` FOREIGN KEY (`fk_tax_id`) REFERENCES `tax` (`tax_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
