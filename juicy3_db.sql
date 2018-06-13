-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 09:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juicy3`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `wachtwoord` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rank` tinyint(1) NOT NULL DEFAULT '1',
  `isactive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `naam`, `wachtwoord`, `email`, `rank`, `isactive`) VALUES
(8, 'EmileAdmin', '21232f297a57a5a743894a0e4a801fc3', 'emile.goeminne@gmail.com', 2, 1),
(20, 'EmileTestMetMeneer', 'c4a1a08c18d19f29b1312397f9378f16', 'goeminnee@visocloud.org', 1, 0),
(21, 'admin', '14edf29b2448f22c66643b59d048462f', 'mail@ik.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `street` varchar(100) NOT NULL,
  `postcode` int(4) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `name`, `product`, `amount`, `total`, `street`, `postcode`, `city`, `country`, `order_date`, `email`) VALUES
(148, 'Aaron is vart', '21', '4', 109.86, 'Parc Industrial, Nr 1', 455200, 'Jibou', '', '2018-06-11 10:12:23', 'mail@ik.com'),
(146, 'Werkt de flow nog?', '19', '1', 6.99, 'Parc Industrial, Nr 1', 455200, 'Jibou', 'DZ', '2018-06-11 09:18:25', 'mail@ik.com'),
(147, 'Aaron is vart', '19', '10', 109.86, 'Parc Industrial, Nr 1', 455200, 'Jibou', '', '2018-06-11 10:12:23', 'mail@ik.com'),
(145, 'Aaron is vart', '19', '10', 69.9, 'Parc Industrial, Nr 1', 455200, 'Jibou', 'DZ', '2018-06-11 09:09:07', 'mail@ik.com'),
(144, 'Emile Goeminne', '21', '13', 199.77, 'Parc Industrial, Nr 1', 455200, 'Jibou', 'BY', '2018-06-10 15:25:05', 'mail@ik.com'),
(143, 'Emile Goeminne', '19', '10', 199.77, 'Parc Industrial, Nr 1', 455200, 'Jibou', 'BY', '2018-06-10 15:25:05', 'mail@ik.com'),
(142, 'Aaron is vart', '19', '12', 83.88, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-10 15:14:12', 'mail@ik.com'),
(149, 'Testende', '19', '12', 103.86, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 10:13:04', 'mail@ik.com'),
(150, 'Testende', '21', '2', 103.86, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 10:13:04', 'mail@ik.com'),
(151, 'Aaron is vart', '19', '1', 112.86, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 22:16:26', 'mail@ik.com'),
(152, 'Aaron is vart', '21', '1', 112.86, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 22:16:27', 'mail@ik.com'),
(153, 'Aaron is vart', '20', '12', 112.86, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 22:16:27', 'mail@ik.com'),
(154, 'Testende', '19', '10', 69.9, 'Parc Industrial, Nr 1', 455200, 'Jibou', 'BY', '2018-06-11 22:27:34', 'mail@ik.com'),
(155, 'Aaron is vart', '19', '12', 83.88, 'Parc Industrial, Nr 1', 455200, 'Jibou', 'BY', '2018-06-11 22:29:17', 'mail@ik.com'),
(156, 'Aaron is vart', '20', '12', 95.88, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 22:30:12', 'mail@ik.com'),
(157, 'Aaron is vart', '20', '10', 79.9, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 22:31:55', 'mail@ik.com'),
(158, 'Testende', '20', '20', 159.8, 'steenbrugstraat 5, 27', 8530, 'Harelbeke', 'BE', '2018-06-11 22:36:57', 'mail@ik.com'),
(159, 'Aaron is vart', '21', '1', 79.89, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 22:40:09', 'mail@ik.com'),
(160, 'Aaron is vart', '19', '10', 79.89, 'spijkerlaan 23', 9563, 'Beveren', 'RO', '2018-06-11 22:40:09', 'mail@ik.com');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `product_id` smallint(6) UNSIGNED NOT NULL,
  `naam` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `tags` varchar(50) DEFAULT NULL,
  `prijs` decimal(6,2) DEFAULT NULL,
  `aankoopdatum` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `waardering` tinyint(1) DEFAULT NULL,
  `foto` varchar(150) DEFAULT 'geen.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`product_id`, `naam`, `description`, `tags`, `prijs`, `aankoopdatum`, `waardering`, `foto`) VALUES
(19, 'Banaan', 'Verkrijg nu de lekkere en frisse banaan versie ze geeft je een\r\nfris en lekkere smaak klaar om je dag door te gaan Nu\r\nverkrijgbaar in winkels bij jou in de buurt!', 'Natuurlijke suikers,  Geen chemishe troep,  Gezond', '6.99', '2018-05-22 11:53:15', 5, '../images/fles_geel.png'),
(20, 'Druif', 'Verkrijg nu de blauwe druif versie een lekkere frisdrank\r\nmet die smaak van klasse? Drink fris maar met klasse! Nu\r\nverkrijgbaar in winkels bij jou in de buurt', 'Natuurlijke suikers,  Geen chemishe troep,  Gezond', '7.99', '2018-05-22 11:53:15', 5, '../images/fles_blauw.png'),
(21, 'Appel', 'Verkrijg nu de appel versie ze altijd lekker ookal ben\r\nje een beetje jonger of ouder deze zal altijd klaar\r\nstaan voor jou! Nu verkrijgbaar in winkels bij jou in de\r\nbuurt!', 'Natuurlijke suikers,  Geen chemishe troep,  Gezond', '9.99', '2018-05-22 11:53:15', 5, '../images/fles_green.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `product_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
