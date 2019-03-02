-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2019 at 07:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ticket-Manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `genre`, `description`, `image`, `start`, `end`, `status`) VALUES
(1, 'بمب؛ یک عاشقانه', 'اجتماعی', 'در بحبوحه‌ی جنگ ایران و عراق در سال۱۳۶۷، تهران بی‌وقفه بمباران می‌شد. عشق، محبت، امید، زندگی و ترس از مرگ را در رو‌زهای پر اضطراب آن زمان برای مردمی که درگیرجنگ بودند از بین می‌برد. اغلب عشق به سختی درک می‌‍شود اما مرگ واقعیتی است ترسناک. \"بمب؛ یک داستان عاشقانه\" نشان می‌دهد که عشق و امید چطورحتی در مواجهه با تاریکی مرگ، راهشان را پیدا می‌کنند. روایت انسان‌هایی است که هیچ‌گاه فرصت عاشق شدن و به دلخواه خود زندگی کردن را نداشته‌ و تنها برای لقمه نانی به سختی کار کرده‌اند. این فیلم روایت انسان‌هایی است که در استبداد زمان و مکان به دام افتاده‌اند اما گویی که آرزوهای برباد رفته‌ی آن‌ها هم‌چنان گریبان‌گیر ما است. گویی با تمام آن آرزوها از دوردست‌ها آمده‌اند و به انتظار هستند که داستانشان روایت شود، یا شاید کسی دوباره آن‌ را زندگی کند: داستانی از عشقی انسانی و ساده.', '2XnhmIilSohwhtWKbZpwAVJFqlCamfFpAd8GYApzIVnh1.jpg', '2018-12-27 10:00:00', '2019-01-27 23:00:00', 1),
(2, 'مارموز', 'کمدی', 'این فیلم با مضمونی کمدی و سیاسی روایتگر داستان زندگی شخصی به نام «قدرت» با بازی حامد بهداد است که سودای رسیدن به قدرت را دارد.', '4xnFkTmKnAg9wMiGyPDEvkARleISZ4uYAk8lK9S5AGIaJ.jpg', '2018-12-28 10:00:00', '2019-01-18 23:00:00', 1),
(3, 'اتاق تاریک', 'اجتماعی', 'فرهاد و هاله فصل جدید زندگی خود را آغاز کرده اند و این سرآغاز تغییرات دیگری است که آنها را در مواجهه با مسائل جدیدی قرار می دهد.', 'edemk8w2iWowKllCG4ci6sikeVoJWewRFvHZcDy8SWFVa.jpg', '2018-12-28 11:00:00', '2019-01-30 23:00:00', 1),
(4, 'کُلمبوس', 'کمدی', 'در این روزهای سرد، در این روزهای سخت، بروم یا بمانم؟!', 'mHQ72NpymejrzKvIYduc9ijxOaP5XRS9l96NWL0MTtZEk.jpg', '2018-12-27 16:00:00', '2019-01-27 23:00:00', 1),
(5, 'بی نامی', 'اجتماعی', 'این فیلم روایتگر داستان زن و شوهری است که سال ها پیش دانشجوی تئاتر بودند و با هم ازدواج می کنند و در یک کافی شاپ مشغول به کار می شوند، اما بر حسب اتفاق یکی از همکاران آنها گم می شود. قهرمان قصه به بهانه یافتن او به دنبال خود نیز در گذشته می گردد و سعی می کند از یک بحران خارج شود.', 'FB3XVLd03HjTNQf2gpxxw6QEFtUBVmWXopD21vJUfeBLe.jpg', '2018-12-31 12:00:00', '2019-02-04 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_seat`
--

CREATE TABLE `event_seat` (
  `event_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_section`
--

CREATE TABLE `event_section` (
  `event_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`, `capacity`, `event_id`) VALUES
(1, 'سالن اول', 100, 5),
(2, 'سالن پنجم', 80, 1),
(3, 'سالن دوم', 20, 2),
(4, 'سالن سوم', 40, 3),
(5, 'سالن چهارم', 60, 4);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `row_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `seat_number`, `row_number`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 1, 2),
(22, 2, 2),
(23, 3, 2),
(24, 4, 2),
(25, 5, 2),
(26, 6, 2),
(27, 7, 2),
(28, 8, 2),
(29, 9, 2),
(30, 10, 2),
(31, 11, 2),
(32, 12, 2),
(33, 13, 2),
(34, 14, 2),
(35, 15, 2),
(36, 16, 2),
(37, 17, 2),
(38, 18, 2),
(39, 19, 2),
(40, 20, 2),
(41, 1, 3),
(42, 2, 3),
(43, 3, 3),
(44, 4, 3),
(45, 5, 3),
(46, 6, 3),
(47, 7, 3),
(48, 8, 3),
(49, 9, 3),
(50, 10, 3),
(51, 11, 3),
(52, 12, 3),
(53, 13, 3),
(54, 14, 3),
(55, 15, 3),
(56, 16, 3),
(57, 17, 3),
(58, 18, 3),
(59, 19, 3),
(60, 20, 3),
(61, 1, 4),
(62, 2, 4),
(63, 3, 4),
(64, 4, 4),
(65, 5, 4),
(66, 6, 4),
(67, 7, 4),
(68, 8, 4),
(69, 9, 4),
(70, 10, 4),
(71, 11, 4),
(72, 12, 4),
(73, 13, 4),
(74, 14, 4),
(75, 15, 4),
(76, 16, 4),
(77, 17, 4),
(78, 18, 4),
(79, 19, 4),
(80, 20, 4),
(81, 1, 5),
(82, 2, 5),
(83, 3, 5),
(84, 4, 5),
(85, 5, 5),
(86, 6, 5),
(87, 7, 5),
(88, 8, 5),
(89, 9, 5),
(90, 10, 5),
(91, 11, 5),
(92, 12, 5),
(93, 13, 5),
(94, 14, 5),
(95, 15, 5),
(96, 16, 5),
(97, 17, 5),
(98, 18, 5),
(99, 19, 5),
(100, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seat_section`
--

CREATE TABLE `seat_section` (
  `seat_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_section`
--

INSERT INTO `seat_section` (`seat_id`, `section_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 2),
(11, 5),
(12, 1),
(12, 2),
(12, 5),
(13, 1),
(13, 2),
(13, 5),
(14, 1),
(14, 2),
(14, 5),
(15, 1),
(15, 2),
(15, 5),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(21, 5),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(23, 5),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(24, 5),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(25, 5),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(26, 5),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 5),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(31, 1),
(31, 2),
(31, 5),
(32, 1),
(32, 2),
(32, 5),
(33, 1),
(33, 2),
(33, 5),
(34, 1),
(34, 2),
(34, 5),
(35, 1),
(35, 2),
(35, 5),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(41, 4),
(41, 5),
(42, 1),
(42, 2),
(42, 4),
(42, 5),
(43, 1),
(43, 2),
(43, 4),
(43, 5),
(44, 1),
(44, 2),
(44, 4),
(44, 5),
(45, 1),
(45, 2),
(45, 4),
(45, 5),
(46, 1),
(46, 2),
(46, 4),
(46, 5),
(47, 1),
(47, 2),
(47, 4),
(47, 5),
(48, 1),
(48, 2),
(48, 4),
(48, 5),
(49, 1),
(49, 2),
(49, 4),
(49, 5),
(50, 1),
(50, 2),
(50, 4),
(50, 5),
(51, 1),
(51, 2),
(51, 5),
(52, 1),
(52, 2),
(52, 5),
(53, 1),
(53, 2),
(53, 5),
(54, 1),
(54, 2),
(54, 5),
(55, 1),
(55, 2),
(55, 5),
(56, 1),
(56, 2),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 2),
(61, 4),
(61, 5),
(62, 2),
(62, 4),
(62, 5),
(63, 2),
(63, 4),
(63, 5),
(64, 2),
(64, 4),
(64, 5),
(65, 2),
(65, 4),
(65, 5),
(66, 2),
(66, 4),
(66, 5),
(67, 2),
(67, 4),
(67, 5),
(68, 2),
(68, 4),
(68, 5),
(69, 2),
(69, 4),
(69, 5),
(70, 2),
(70, 4),
(70, 5),
(71, 2),
(71, 5),
(72, 2),
(72, 5),
(73, 2),
(73, 5),
(74, 2),
(74, 5),
(75, 2),
(75, 5),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `hall_id`) VALUES
(1, 'همکف', 1),
(2, 'همکف', 2),
(3, 'همکف', 3),
(4, 'همکف', 4),
(5, 'همکف', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$uVRAaVJnkkU2GfMKLuBPt.U6Gc2UHpPOQLczopNwYe/4uIlCZGAyu', 1, 'FRgXwAaoEiVBqGdEz75xejUcvJWy9mSXEEeN7gQVLs5eqyBdT2GPaXvZfDX3', '2018-12-03 13:21:45', '2018-12-03 13:21:45'),
(2, 'hasan', 'hasan@hasan.com', '$2y$10$uVRAaVJnkkU2GfMKLuBPt.U6Gc2UHpPOQLczopNwYe/4uIlCZGAyu', 0, 'FSrDvYzssBp45dFLkLdnrAGfk7Ldfszekg5PCYudRm1z2k7zxN3fnlN2soKT', '2018-12-03 13:21:58', '2018-12-03 13:21:58'),
(4, 'ali', 'ali@ali.com', '$2y$10$uVRAaVJnkkU2GfMKLuBPt.U6Gc2UHpPOQLczopNwYe/4uIlCZGAyu', 0, 'lYTrBf9JX3fJ1HAemSaW8FrlGCCxxOtJ8i1ifFEwuGrj987Lqa3zUTNKyRcg', '2018-12-25 16:17:50', '2018-12-25 16:17:50'),
(5, 'ehsan', 'ehsan@gmail.com', '$2y$10$uVRAaVJnkkU2GfMKLuBPt.U6Gc2UHpPOQLczopNwYe/4uIlCZGAyu', 0, 'DpkMUqvYg33abrrj8txcjT91DFDAp7C7aB4vD1uF6UF041AyLxpPcjz3LiI2', '2018-12-26 03:34:59', '2018-12-26 03:34:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_seat`
--
ALTER TABLE `event_seat`
  ADD PRIMARY KEY (`event_id`,`seat_id`),
  ADD KEY `idx_orderdetails_event_id` (`event_id`),
  ADD KEY `idx_orderdetails_seat_id` (`seat_id`),
  ADD KEY `idx_orderdetails_user_id` (`user_id`),
  ADD KEY `idx_orderdetails_order_id` (`totalprice`);

--
-- Indexes for table `event_section`
--
ALTER TABLE `event_section`
  ADD PRIMARY KEY (`event_id`,`section_id`),
  ADD KEY `idx_event_section_section_id` (`section_id`),
  ADD KEY `idx_event_section_event_id` (`event_id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_halls_id` (`id`),
  ADD KEY `fk_halls_events` (`event_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_seats_id` (`id`);

--
-- Indexes for table `seat_section`
--
ALTER TABLE `seat_section`
  ADD PRIMARY KEY (`seat_id`,`section_id`),
  ADD KEY `idx_seat_section_seat_id` (`seat_id`),
  ADD KEY `idx_seat_section_section_id` (`section_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_sections_id` (`id`),
  ADD KEY `fk_section_halls1_idx` (`hall_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_seat`
--
ALTER TABLE `event_seat`
  ADD CONSTRAINT `fk_orderdetails_events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_seats` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `event_section`
--
ALTER TABLE `event_section`
  ADD CONSTRAINT `fk_event_section_events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_section_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `halls`
--
ALTER TABLE `halls`
  ADD CONSTRAINT `fk_halls_events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `seat_section`
--
ALTER TABLE `seat_section`
  ADD CONSTRAINT `fk_seat_section_seats` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seat_section_sections` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `fk_section_halls1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
