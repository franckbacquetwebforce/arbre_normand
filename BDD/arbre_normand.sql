-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Janvier 2017 à 09:05
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `arbre_normand`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `slug` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `category_name`, `created_at`, `status`) VALUES
(1, 0, 'Champignons', '2016-12-18 22:24:24', 1),
(2, 12, 'palissade', '0000-00-00 00:00:00', 1),
(3, 3, 'champignons table', '2016-12-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `status_img` varchar(50) NOT NULL,
  `mim_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `img`
--

INSERT INTO `img` (`id`, `id_product`, `original_name`, `name`, `path`, `status_img`, `mim_type`) VALUES
(1, 52, 'sanGoku.jpg', '2016_12_17_11_29_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(2, 52, 'ChichiDB.jpg', '2016_12_17_11_29_original1.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(3, 52, 'Gohan_SSJ2_.png', '2016_12_17_11_29_original2.png', 'upload/2016/12/', '2', 'image/png'),
(4, 52, 'bulma.jpg', '2016_12_17_11_29_original3.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(5, 53, 'ChichiDB.jpg', '2016_12_17_11_36_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(6, 53, 'Gohan_SSJ2_.png', '2016_12_17_11_36_original.png', 'upload/2016/12/', '2', 'image/png'),
(7, 53, 'bulma.jpg', '2016_12_17_11_36_original.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(8, 53, 'sanGoku.jpg', '2016_12_17_11_36_original.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(9, 54, 'bulma.jpg', '2016_12_18_12_52_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(10, 54, 'Gohan_SSJ2_.png', '2016_12_18_12_52_original.png', 'upload/2016/12/', '2', 'image/png'),
(11, 54, 'ChichiDB.jpg', '2016_12_18_12_52_original.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(12, 54, 'sanGoku.jpg', '2016_12_18_12_52_original.jpg', 'upload/2016/12/', '2', 'image/jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ref` int(11) DEFAULT NULL,
  `date_order` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`id`, `ref`, `date_order`, `id_user`, `status`) VALUES
(1, NULL, '2016-12-28 17:57:42', 0, 'en_attente'),
(2, NULL, '2016-12-28 18:01:15', 0, 'en_attente'),
(3, NULL, '2016-12-28 18:10:11', 3, 'en_attente'),
(4, NULL, '2016-12-28 18:11:44', 3, 'en_attente'),
(5, NULL, '2016-12-28 18:14:45', 3, 'en_attente'),
(6, NULL, '2016-12-28 18:15:54', 3, 'en_attente'),
(7, NULL, '2016-12-28 18:17:09', 3, 'en_attente'),
(8, NULL, '2016-12-28 18:17:45', 3, 'en_attente'),
(9, NULL, '2016-12-28 18:19:15', 3, 'en_attente'),
(10, NULL, '2016-12-28 18:20:35', 3, 'en_attente'),
(11, NULL, '2016-12-28 18:23:01', 3, 'en_attente'),
(12, NULL, '2016-12-28 18:23:28', 3, 'en_attente'),
(13, NULL, '2016-12-28 18:23:41', 3, 'en_attente'),
(14, NULL, '2016-12-28 19:04:43', 3, 'en_attente'),
(15, NULL, '2016-12-28 19:05:28', 3, 'en_attente'),
(16, NULL, '2016-12-28 19:07:03', 3, 'en_attente'),
(17, NULL, '2017-01-01 15:34:28', 3, 'en_attente'),
(18, NULL, '2017-01-01 15:34:59', 3, 'en_attente'),
(19, NULL, '2017-01-01 15:35:19', 3, 'en_attente'),
(20, NULL, '2017-01-01 15:36:54', 3, 'en_attente'),
(21, NULL, '2017-01-01 15:37:26', 3, 'en_attente'),
(22, NULL, '2017-01-01 15:37:53', 3, 'en_attente'),
(23, NULL, '2017-01-01 15:38:23', 3, 'en_attente'),
(24, NULL, '2017-01-01 15:38:48', 3, 'en_attente'),
(25, NULL, '2017-01-01 15:41:03', 3, 'en_attente'),
(26, NULL, '2017-01-01 15:41:20', 3, 'en_attente'),
(27, NULL, '2017-01-01 15:41:59', 3, 'en_attente'),
(28, NULL, '2017-01-01 15:42:02', 3, 'en_attente'),
(29, NULL, '2017-01-01 15:42:12', 3, 'en_attente'),
(30, NULL, '2017-01-01 15:42:30', 3, 'en_attente'),
(31, NULL, '2017-01-01 15:42:38', 3, 'en_attente'),
(32, NULL, '2017-01-01 15:44:11', 3, 'en_attente'),
(33, NULL, '2017-01-01 15:44:27', 3, 'en_attente'),
(34, NULL, '2017-01-01 15:44:59', 3, 'en_attente'),
(35, NULL, '2017-01-01 15:46:11', 3, 'en_attente'),
(36, NULL, '2017-01-01 15:46:29', 3, 'en_attente'),
(37, NULL, '2017-01-01 15:46:54', 3, 'en_attente'),
(38, NULL, '2017-01-01 15:52:47', 3, 'en_attente'),
(39, NULL, '2017-01-01 15:53:00', 3, 'en_attente'),
(40, NULL, '2017-01-01 15:54:30', 3, 'en_attente'),
(41, NULL, '2017-01-01 16:01:09', 3, 'en_attente'),
(42, NULL, '2017-01-01 16:02:01', 3, 'en_attente'),
(43, NULL, '2017-01-01 16:02:28', 3, 'en_attente'),
(44, NULL, '2017-01-01 16:03:04', 3, 'en_attente'),
(45, NULL, '2017-01-01 16:47:32', 3, 'en_attente'),
(46, NULL, '2017-01-01 16:48:46', 3, 'en_attente'),
(47, NULL, '2017-01-01 16:50:04', 3, 'en_attente'),
(48, NULL, '2017-01-01 16:51:17', 3, 'en_attente'),
(49, NULL, '2017-01-01 16:52:02', 3, 'en_attente'),
(50, NULL, '2017-01-01 16:52:40', 3, 'en_attente'),
(51, NULL, '2017-01-01 16:52:54', 3, 'en_attente'),
(52, NULL, '2017-01-01 16:53:22', 3, 'en_attente'),
(53, NULL, '2017-01-01 16:53:45', 3, 'en_attente'),
(54, NULL, '2017-01-01 16:54:10', 3, 'en_attente'),
(55, NULL, '2017-01-01 16:54:25', 3, 'en_attente'),
(56, NULL, '2017-01-01 16:54:42', 3, 'en_attente'),
(57, NULL, '2017-01-01 16:55:21', 3, 'en_attente'),
(58, NULL, '2017-01-01 16:55:43', 3, 'en_attente'),
(59, NULL, '2017-01-01 16:56:07', 3, 'en_attente'),
(60, NULL, '2017-01-01 16:56:37', 3, 'en_attente'),
(61, NULL, '2017-01-01 16:56:40', 3, 'en_attente'),
(62, NULL, '2017-01-01 16:57:20', 3, 'en_attente'),
(63, NULL, '2017-01-01 16:58:05', 3, 'en_attente'),
(64, NULL, '2017-01-01 16:58:42', 3, 'en_attente'),
(65, NULL, '2017-01-01 17:00:28', 3, 'en_attente'),
(66, NULL, '2017-01-01 17:00:40', 3, 'en_attente'),
(67, NULL, '2017-01-01 17:00:41', 3, 'en_attente'),
(68, NULL, '2017-01-01 17:02:08', 3, 'en_attente'),
(69, NULL, '2017-01-01 17:02:10', 3, 'en_attente'),
(70, NULL, '2017-01-01 17:02:11', 3, 'en_attente'),
(71, NULL, '2017-01-01 17:02:12', 3, 'en_attente'),
(72, NULL, '2017-01-01 17:02:13', 3, 'en_attente'),
(73, NULL, '2017-01-01 17:02:13', 3, 'en_attente'),
(74, NULL, '2017-01-01 17:02:33', 3, 'en_attente'),
(75, NULL, '2017-01-01 17:03:27', 3, 'en_attente'),
(76, NULL, '2017-01-01 17:03:34', 3, 'en_attente'),
(77, NULL, '2017-01-01 17:03:48', 3, 'en_attente'),
(78, NULL, '2017-01-01 17:04:00', 3, 'en_attente'),
(79, NULL, '2017-01-01 17:04:07', 3, 'en_attente'),
(80, NULL, '2017-01-01 17:04:30', 3, 'en_attente'),
(81, NULL, '2017-01-01 17:05:21', 3, 'en_attente'),
(82, NULL, '2017-01-01 17:05:25', 3, 'en_attente'),
(83, NULL, '2017-01-01 17:05:29', 3, 'en_attente'),
(84, NULL, '2017-01-01 17:09:06', 3, 'en_attente'),
(85, NULL, '2017-01-01 17:09:23', 3, 'en_attente'),
(86, NULL, '2017-01-01 17:09:33', 3, 'en_attente'),
(87, NULL, '2017-01-01 17:11:35', 3, 'en_attente'),
(88, NULL, '2017-01-01 17:11:48', 3, 'en_attente'),
(89, NULL, '2017-01-01 17:15:29', 3, 'en_attente'),
(90, NULL, '2017-01-01 17:17:21', 3, 'en_attente'),
(91, NULL, '2017-01-01 17:41:22', 3, 'en_attente'),
(92, NULL, '2017-01-01 17:42:06', 3, 'en_attente'),
(93, NULL, '2017-01-01 17:42:25', 3, 'en_attente'),
(94, NULL, '2017-01-01 17:42:50', 3, 'en_attente'),
(95, NULL, '2017-01-01 17:43:01', 3, 'en_attente'),
(96, NULL, '2017-01-01 17:43:23', 3, 'en_attente'),
(97, NULL, '2017-01-01 17:43:44', 3, 'en_attente'),
(98, NULL, '2017-01-01 17:44:07', 3, 'en_attente'),
(99, NULL, '2017-01-01 17:44:23', 3, 'en_attente'),
(100, NULL, '2017-01-01 17:44:35', 3, 'en_attente'),
(101, NULL, '2017-01-01 17:44:38', 3, 'en_attente'),
(102, NULL, '2017-01-01 17:44:52', 3, 'en_attente'),
(103, NULL, '2017-01-01 17:45:02', 3, 'en_attente'),
(104, NULL, '2017-01-01 17:45:20', 3, 'en_attente'),
(105, NULL, '2017-01-01 17:46:58', 3, 'en_attente'),
(106, NULL, '2017-01-01 17:47:31', 3, 'en_attente'),
(107, NULL, '2017-01-01 17:47:34', 3, 'en_attente'),
(108, NULL, '2017-01-01 17:47:36', 3, 'en_attente'),
(109, NULL, '2017-01-01 17:48:45', 3, 'en_attente'),
(110, NULL, '2017-01-01 17:49:23', 3, 'en_attente'),
(111, NULL, '2017-01-01 17:50:02', 3, 'en_attente');

-- --------------------------------------------------------

--
-- Structure de la table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qt_product` int(11) NOT NULL,
  `price_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `orders_products`
--

INSERT INTO `orders_products` (`id`, `id_order`, `id_product`, `qt_product`, `price_product`) VALUES
(1, 0, 52, 1, 1),
(2, 0, 53, 1, 11),
(3, 0, 52, 1, 1),
(4, 0, 53, 1, 11),
(5, 0, 52, 1, 1),
(6, 0, 53, 1, 11),
(7, 16, 52, 1, 1),
(8, 16, 53, 2, 11),
(9, 16, 54, 1, 111),
(10, 17, 52, 2, 1),
(11, 17, 53, 1, 11),
(12, 18, 52, 2, 1),
(13, 18, 53, 1, 11),
(14, 19, 52, 2, 1),
(15, 19, 53, 1, 11),
(16, 20, 52, 2, 1),
(17, 20, 53, 1, 11),
(18, 21, 52, 2, 1),
(19, 21, 53, 1, 11),
(20, 22, 52, 2, 1),
(21, 22, 53, 1, 11),
(22, 23, 52, 2, 1),
(23, 23, 53, 1, 11),
(24, 24, 52, 2, 1),
(25, 24, 53, 1, 11),
(26, 25, 52, 2, 1),
(27, 25, 53, 1, 11),
(28, 26, 52, 2, 1),
(29, 26, 53, 1, 11),
(30, 27, 52, 2, 1),
(31, 27, 53, 1, 11),
(32, 28, 52, 2, 1),
(33, 28, 53, 1, 11),
(34, 29, 52, 2, 1),
(35, 29, 53, 1, 11),
(36, 30, 52, 2, 1),
(37, 30, 53, 1, 11),
(38, 31, 52, 2, 1),
(39, 31, 53, 1, 11),
(40, 32, 52, 2, 1),
(41, 32, 53, 1, 11),
(42, 33, 52, 2, 1),
(43, 33, 53, 1, 11),
(44, 34, 52, 2, 1),
(45, 34, 53, 1, 11),
(46, 35, 52, 2, 1),
(47, 35, 53, 1, 11),
(48, 36, 52, 2, 1),
(49, 36, 53, 1, 11),
(50, 37, 52, 2, 1),
(51, 37, 53, 1, 11),
(52, 38, 52, 2, 1),
(53, 38, 53, 1, 11),
(54, 39, 52, 2, 1),
(55, 39, 53, 1, 11),
(56, 40, 52, 2, 1),
(57, 40, 53, 1, 11),
(58, 41, 52, 2, 1),
(59, 41, 53, 1, 11),
(60, 42, 52, 2, 1),
(61, 42, 53, 1, 11),
(62, 43, 52, 2, 1),
(63, 43, 53, 1, 11),
(64, 44, 52, 2, 1),
(65, 44, 53, 1, 11),
(66, 45, 52, 2, 1),
(67, 45, 53, 1, 11),
(68, 46, 52, 2, 1),
(69, 46, 53, 1, 11),
(70, 47, 52, 2, 1),
(71, 47, 53, 1, 11),
(72, 48, 52, 2, 1),
(73, 48, 53, 1, 11),
(74, 49, 52, 2, 1),
(75, 49, 53, 1, 11),
(76, 50, 52, 2, 1),
(77, 50, 53, 1, 11),
(78, 51, 52, 2, 1),
(79, 51, 53, 1, 11),
(80, 52, 52, 2, 1),
(81, 52, 53, 1, 11),
(82, 53, 52, 2, 1),
(83, 53, 53, 1, 11),
(84, 54, 52, 2, 1),
(85, 54, 53, 1, 11),
(86, 55, 52, 2, 1),
(87, 55, 53, 1, 11),
(88, 56, 52, 2, 1),
(89, 56, 53, 1, 11),
(90, 57, 52, 2, 1),
(91, 57, 53, 1, 11),
(92, 58, 52, 2, 1),
(93, 58, 53, 1, 11),
(94, 59, 52, 2, 1),
(95, 59, 53, 1, 11),
(96, 60, 52, 2, 1),
(97, 60, 53, 1, 11),
(98, 61, 52, 2, 1),
(99, 61, 53, 1, 11),
(100, 62, 52, 2, 1),
(101, 62, 53, 1, 11),
(102, 63, 52, 2, 1),
(103, 63, 53, 1, 11),
(104, 64, 52, 2, 1),
(105, 64, 53, 1, 11),
(106, 65, 52, 2, 1),
(107, 65, 53, 1, 11),
(108, 66, 52, 2, 1),
(109, 66, 53, 1, 11),
(110, 67, 52, 2, 1),
(111, 67, 53, 1, 11),
(112, 68, 52, 2, 1),
(113, 68, 53, 1, 11),
(114, 69, 52, 2, 1),
(115, 69, 53, 1, 11),
(116, 70, 52, 2, 1),
(117, 70, 53, 1, 11),
(118, 71, 52, 2, 1),
(119, 71, 53, 1, 11),
(120, 72, 52, 2, 1),
(121, 72, 53, 1, 11),
(122, 73, 52, 2, 1),
(123, 73, 53, 1, 11),
(124, 74, 52, 2, 1),
(125, 74, 53, 1, 11),
(126, 75, 52, 2, 1),
(127, 75, 53, 1, 11),
(128, 76, 52, 2, 1),
(129, 76, 53, 1, 11),
(130, 77, 52, 2, 1),
(131, 77, 53, 1, 11),
(132, 78, 52, 2, 1),
(133, 78, 53, 1, 11),
(134, 79, 52, 2, 1),
(135, 79, 53, 1, 11),
(136, 80, 52, 2, 1),
(137, 80, 53, 1, 11),
(138, 81, 52, 2, 1),
(139, 81, 53, 1, 11),
(140, 82, 52, 2, 1),
(141, 82, 53, 1, 11),
(142, 83, 52, 2, 1),
(143, 83, 53, 1, 11),
(144, 84, 52, 2, 1),
(145, 84, 53, 1, 11),
(146, 85, 52, 2, 1),
(147, 85, 53, 1, 11),
(148, 86, 52, 2, 1),
(149, 86, 53, 1, 11),
(150, 87, 52, 2, 1),
(151, 87, 53, 1, 11),
(152, 88, 52, 2, 1),
(153, 88, 53, 1, 11),
(154, 89, 52, 2, 1),
(155, 89, 53, 1, 11),
(156, 90, 52, 2, 1),
(157, 90, 53, 1, 11),
(158, 91, 52, 2, 1),
(159, 91, 53, 1, 11),
(160, 92, 52, 2, 1),
(161, 92, 53, 1, 11),
(162, 93, 52, 2, 1),
(163, 93, 53, 1, 11),
(164, 94, 52, 2, 1),
(165, 94, 53, 1, 11),
(166, 95, 52, 2, 1),
(167, 95, 53, 1, 11),
(168, 96, 52, 2, 1),
(169, 96, 53, 1, 11),
(170, 97, 52, 2, 1),
(171, 97, 53, 1, 11),
(172, 98, 52, 2, 1),
(173, 98, 53, 1, 11),
(174, 99, 52, 2, 1),
(175, 99, 53, 1, 11),
(176, 100, 52, 2, 1),
(177, 100, 53, 1, 11),
(178, 101, 52, 2, 1),
(179, 101, 53, 1, 11),
(180, 102, 52, 2, 1),
(181, 102, 53, 1, 11),
(182, 103, 52, 2, 1),
(183, 103, 53, 1, 11),
(184, 104, 52, 2, 1),
(185, 104, 53, 1, 11),
(186, 105, 52, 2, 1),
(187, 105, 53, 1, 11),
(188, 106, 52, 2, 1),
(189, 106, 53, 1, 11),
(190, 107, 52, 2, 1),
(191, 107, 53, 1, 11),
(192, 108, 52, 2, 1),
(193, 108, 53, 1, 11),
(194, 109, 52, 2, 1),
(195, 109, 53, 1, 11),
(196, 110, 52, 2, 1),
(197, 110, 53, 1, 11),
(198, 111, 52, 2, 1),
(199, 111, 53, 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price_ht` float NOT NULL,
  `weight` float NOT NULL,
  `stock` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `modified_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `slug`, `product_name`, `description`, `price_ht`, `weight`, `stock`, `id_category`, `created_at`, `modified_at`, `created_by`, `modified_by`) VALUES
(52, 'dssdqfsdfsq', 'produit 1', 'dssdfsdfsdfsfs', 1, 111, 52, 2, '2016-12-17 11:29:40', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(53, 'rtesrtesrter', 'produit 2', 'ertertertert', 11, 11, 11, 3, '2016-12-17 11:36:57', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(54, 'dfhdhdfghghfdghdfgh', 'produit 3', 'fghdfghdfhgfdghdf', 111, 11, 11, 2, '2016-12-18 12:52:21', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `created_at`, `modified_at`, `role`) VALUES
(2, 'hermelen', 'hermelen.peris@gmail.com', '$2y$10$hQ3BKBs1LVIkMRQFH9GrauwWbeZ667mzYpbFzf4EoClvJ8CZO4JNu', 'UOhg4WGil3XTs9GMFe6_', '2016-12-21 10:58:15', '0000-00-00 00:00:00', 'user'),
(3, 'franck', 'franck2@gmail.com', '$2y$10$o4V33Aq67h7K5rljd6mrAex/8AQZ.7PhsHJaLgNj11eutQdIjSz7y', '-CDruZAvXRf3vHk1i6ph', '2016-12-27 17:52:06', '2016-12-27 18:01:12', 'admin'),
(4, '', 'franc2@gmail.com', '$2y$10$Hg5vts./pimMPAY.gg7vKO5L9brg5T/cGdT8sPydFcbsPrzQUEZ1y', '6uAQ_PESTyXkhuXZvr3aD0v80aNBo8GQgz5_90F7o5_USfi_bEl74EOEx9Y_Wdhd3c9NhkxWMSDjrdMT', '2016-12-27 18:00:15', '0000-00-00 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `users_adress`
--

CREATE TABLE `users_adress` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_adress`
--

INSERT INTO `users_adress` (`id`, `id_user`, `lastname`, `firstname`, `phone`, `address`, `city`, `zip`, `country`, `type`) VALUES
(1, 3, 'fzfzfevb', 'fefsfzes', 'rgsergse', 'fzqff', 'fqzffz', 'qzfzf', 'fqzfzfezf', 'facturation'),
(2, 3, 'bacquet', 'franck', '0606060606', 'uhugufchgj gvkgjvkg  vgvhkbvhkgk, vg,vg,v', 'bulgjckvgklh', '27300', 'france', 'facturation'),
(3, 3, 'vgjkvgjcv', ',qdlsnbjkvhv', 'hcggcgc', 'cgjhcc', 'yiglykguk', 'vccghhjcfh', 'tyfutftyf', 'facturation');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_adress`
--
ALTER TABLE `users_adress`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT pour la table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users_adress`
--
ALTER TABLE `users_adress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
