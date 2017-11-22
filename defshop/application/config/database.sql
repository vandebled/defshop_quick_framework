-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mer 22 Novembre 2017 à 16:38
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `defshop`
--
CREATE DATABASE IF NOT EXISTS `defshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `defshop`;

-- --------------------------------------------------------

--
-- Structure de la table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `shop_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net` decimal(10,2) NOT NULL,
  `gross` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `color`, `image`, `net`, `gross`) VALUES
(1, 'Adidas Sneakers', 'Black', 'https://cdn.def-shop.com/pic360/adidas-sneakers-black-358379.jpg', '120.99', '78.00'),
(2, 'Nike Sneakers', 'White', 'https://cdn.def-shop.com/pic360/nike-sneakers-white-309665.jpg', '70.99', '45.00'),
(3, 'Nike Sneakers', 'Black', 'https://cdn.def-shop.com/pic360/nike-sneakers-black-34168.jpg', '100.00', '50.00'),
(4, 'Nike Sneakers', 'Black and White', 'https://cdn.def-shop.com/pic360/nike-sneakers-black-363130.jpg', '100.00', '50.00'),
(5, 'Nike Sneakers', 'Khaki\r\n', 'https://cdn.def-shop.com/pic360/nike-sneakers-olive-365288.jpg', '180.99', '75.00'),
(6, 'Dangerous', 'Black', 'https://cdn.def-shop.com/pic360/dangerous-dngrs-sneakers-black-325576.jpg', '100.99', '45.00'),
(7, 'Nike Sneakers', 'White', 'https://cdn.def-shop.com/pic360/nike-sneakers-white-363117.jpg', '70.99', '45.00'),
(8, 'Nike Sneakers', 'Black', 'https://cdn.def-shop.com/pic360/nike-sneakers-black-363058.jpg', '100.00', '50.00'),
(9, 'Nike Sneakers', 'Grey', 'https://cdn.def-shop.com/pic360/nike-sneakers-grey-334307.jpg', '100.00', '50.00'),
(10, 'Nike Sneakers', 'Black', 'https://cdn.def-shop.com/pic360/nike-sneakers-black-306722.jpg', '107.99', '56.00'),
(11, 'Vans', 'Black', 'https://cdn.def-shop.com/pic360/vans-sneakers-black-351915.jpg', '70.99', '45.00'),
(12, 'Dangerous', 'grey', 'https://cdn.def-shop.com/pic360/dangerous-dngrs-sneakers-grey-325337.jpg', '100.99', '45.00'),
(13, 'Nike Sneakers', 'Green', 'https://cdn.def-shop.com/pic360/nike-sneakers-green-343401.jpg', '70.99', '45.00'),
(14, 'Nike Sneakers', 'Grey', 'https://cdn.def-shop.com/pic360/nike-sb-sneakers-grey-295454.jpg\r\n', '70.99', '45.00'),
(15, 'Adidas Sneakers', 'Blue', 'https://cdn.def-shop.com/pic360/adidas-sneakers-blue-370975.jpg', '120.99', '78.00'),
(16, 'Adidas Sneakers', 'Red', 'https://cdn.def-shop.com/pic360/adidas-sneakers-red-370979.jpg', '120.99', '78.00'),
(17, 'Adidas Sneakers', 'Yellow', 'https://cdn.def-shop.com/pic360/adidas-sneakers-gold-colored-370988.jpg', '120.99', '78.00'),
(18, 'Adidas Sneakers', 'Orange', 'https://cdn.def-shop.com/pic360/adidas-sneakers-red-368048.jpg', '120.99', '78.00'),
(19, 'Adidas Sneakers', 'Brown', 'https://cdn.def-shop.com/pic360/adidas-sneakers-brown-317054.jpg', '120.99', '78.00'),
(20, 'Adidas Sneakers', 'Black', 'https://cdn.def-shop.com/pic360/adidas-sneakers-black-455944.jpg', '120.99', '78.00');

-- --------------------------------------------------------

--
-- Structure de la table `shop_order`
--

DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
