-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Décembre 2016 à 14:16
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

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
(76, 64, 'sanGoku.jpg', '2016_12_16_12_36_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(77, 64, 'Gohan_SSJ2_.png', '2016_12_16_12_36_original1.png', 'upload/2016/12/', '2', 'image/png'),
(78, 64, 'ChichiDB.jpg', '2016_12_16_12_36_original2.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(79, 64, 'bulma.jpg', '2016_12_16_12_36_original3.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(80, 65, 'sanGoku.jpg', '2016_12_16_16_35_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(81, 65, 'ChichiDB.jpg', '2016_12_16_16_35_original1.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(82, 65, 'Gohan_SSJ2_.png', '2016_12_16_16_35_original2.png', 'upload/2016/12/', '2', 'image/png'),
(83, 65, 'bulma.jpg', '2016_12_16_16_35_original3.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(84, 66, 'ChichiDB.jpg', '2016_12_16_16_57_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(85, 67, 'ChichiDB.jpg', '2016_12_16_16_57_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(86, 67, 'sanGoku.jpg', '2016_12_16_16_57_original1.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(87, 67, 'bulma.jpg', '2016_12_16_16_57_original2.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(88, 67, 'Gohan_SSJ2_.png', '2016_12_16_16_57_original3.png', 'upload/2016/12/', '2', 'image/png'),
(89, 68, '2016_12_17_11_36_original.jpg', '2016_12_19_09_36_original.jpg', 'upload/2016/12/', '1', 'image/jpeg'),
(90, 68, '2016_12_17_11_29_original.jpg', '2016_12_19_09_36_original.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(91, 68, '2016_12_17_11_36_original.jpg', '2016_12_19_09_36_original.jpg', 'upload/2016/12/', '2', 'image/jpeg'),
(92, 68, '2016_12_17_11_29_original.jpg', '2016_12_19_09_36_original.jpg', 'upload/2016/12/', '2', 'image/jpeg');
-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `date_order` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(52, 'dssdqfsdfsq', 'produit 1', 'dssdfsdfsdfsfs', 1, 111, 11, 2, '2016-12-17 11:29:40', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
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
(2, 'hermelen', 'hermelen.peris@gmail.com', '$2y$10$hQ3BKBs1LVIkMRQFH9GrauwWbeZ667mzYpbFzf4EoClvJ8CZO4JNu', 'UOhg4WGil3XTs9GMFe6_', '2016-12-21 10:58:15', '0000-00-00 00:00:00', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users_adress`
--
ALTER TABLE `users_adress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
