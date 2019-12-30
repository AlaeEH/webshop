-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 jun 2018 om 12:32
-- Serverversie: 10.1.32-MariaDB
-- PHP-versie: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `amount` double(9,2) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `mollie_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `amount`, `payment_status`, `mollie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 7396.00, 'open', NULL, 4, '2018-06-29 08:14:52', '2018-06-29 08:14:52'),
(4, 18487.00, 'open', NULL, 5, '2018-06-29 10:24:31', '2018-06-29 10:24:31');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(9,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 3, 5, 1199.00, 2, '2018-06-29 08:14:52', '2018-06-29 08:14:52'),
(5, 3, 6, 1499.00, 1, '2018-06-29 08:14:52', '2018-06-29 08:14:52'),
(6, 3, 7, 3499.00, 1, '2018-06-29 08:14:52', '2018-06-29 08:14:52'),
(7, 4, 5, 1199.00, 6, '2018-06-29 10:24:31', '2018-06-29 10:24:31'),
(8, 4, 6, 1499.00, 2, '2018-06-29 10:24:31', '2018-06-29 10:24:31'),
(9, 4, 7, 3499.00, 1, '2018-06-29 10:24:31', '2018-06-29 10:24:31'),
(10, 4, 1, 399.00, 1, '2018-06-29 10:24:31', '2018-06-29 10:24:31'),
(11, 4, 2, 599.00, 2, '2018-06-29 10:24:31', '2018-06-29 10:24:31'),
(12, 4, 3, 3199.00, 1, '2018-06-29 10:24:31', '2018-06-29 10:24:31');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` double(9,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `slug`, `title`, `description`, `price`, `image`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'EgyptianFruitBats', 'Egyptian Fruit Bats male', 'Selling entire colony of eleven bats 4.5.2 All of them are younger animals with the oldest being around six years of age. All of the females produce babies every year. All have been very healthy. This colony has been made up of two different closed colonies and have been kept indoors as to not expose them to anything. Not pets. Sell a maximum of 10 at once. Licensed and experienced facilities only. ', 399.00, 'bat.jpg', NULL, NULL, '2018-05-21 22:00:00', '2018-05-21 22:00:00'),
(2, 'EgyptianFruitBats', 'Egyptian Fruit Bats female', 'Selling entire colony of eleven bats 4.5.2 All of them are younger animals with the oldest being around six years of age. All of the females produce babies every year. All have been very healthy. This colony has been made up of two different closed colonies and have been kept indoors as to not expose them to anything. Not pets. Sell a maximum of 10 at once. Licensed and experienced facilities only. ', 599.00, 'bat.jpg', NULL, NULL, '2018-05-21 22:00:00', '2018-05-21 22:00:00'),
(3, 'armadillo', 'Armadillo male\r\n', 'Three-banded armadillos can be found in eastern Bolivia, southwestern Brazil, Paraguay, and Argentina. Armadillos are the only mammals covered by a shell. But it’s different from a seashell or a tortoise shell. An armadillo’s shell is made up of bony plates covered by thick, hard skin. Not pets. Sell a maximum of 5 at once. \r\nLicensed and experienced facilities only.', 3199.00, 'armadillo.jpg', NULL, NULL, '2018-05-21 22:00:00', '2018-05-21 22:00:00'),
(5, 'Chinchilla', 'Chinchilla male', 'The chinchilla is a relatively small rodent. They live in the Andes Mountains in South America. They are active during dusk and dawn. Such an activity pattern is named for crepuscular. Together with the Viscacha, they form the Chinchillidae family. In their usual habitat, chinchillas live either in burrows, or in crevices of rocks. They are good jumpers, and can jump very high.They use their tails to help them jump. Chinchillas live in colonies.', 1199.00, 'chinchillas.jpg', NULL, NULL, '2018-05-21 22:00:00', '2018-05-21 22:00:00'),
(6, 'Chinchilla', 'Chinchilla female', 'The chinchilla is a relatively small rodent. They live in the Andes Mountains in South America. They are active during dusk and dawn. Such an activity pattern is named for crepuscular. Together with the Viscacha, they form the Chinchillidae family. In their usual habitat, chinchillas live either in burrows, or in crevices of rocks. They are good jumpers, and can jump very high.They use their tails to help them jump. Chinchillas live in colonies.', 1499.00, 'chinchillas.jpg', NULL, NULL, '2018-05-21 22:00:00', '2018-05-21 22:00:00'),
(7, 'armadillo', 'Armadillo female', 'Three-banded armadillos can be found in eastern Bolivia, southwestern Brazil, Paraguay, and Argentina. Armadillos are the only mammals covered by a shell. But it’s different from a seashell or a tortoise shell. An armadillo’s shell is made up of bony plates covered by thick, hard skin. Not pets. Sell a maximum of 5 at once. \r\nLicensed and experienced facilities only.', 3499.00, 'armadillo.jpg', NULL, NULL, '2018-05-21 22:00:00', '2018-05-21 22:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `suffix_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT 'NL',
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `street_number` varchar(255) NOT NULL,
  `street_suffix` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `first_name`, `suffix_name`, `last_name`, `country`, `city`, `street`, `street_number`, `street_suffix`, `zipcode`, `active`, `created_at`, `updated_at`) VALUES
(4, '0312hani@gmail.com', '$2y$10$TBMc9c7z5t7BS3OrJhBOGeTq7UCEygJRE/.SsM9aj9VyoZcc3VSBG', '', 'Nederland', 'a', 'Hjsabfisjkdf', 'NL', 'Amsterdam', 'Celebesstraat', '114', 'B', '1094 EZ ', 0, '2018-06-29 08:14:52', '2018-06-29 08:14:52'),
(5, '0312hani@gmail.com', '$2y$10$9MaBnaQVMlfDdC8wftrf8OLLwcG0E5KRrJu5ypM7nSIebcgF6QTge', '', 'Alae', 'a', 'Hani', 'NL', 'Amsterdam', 'Celebesstraat', '114', 'B', '1094 EZ ', 0, '2018-06-29 10:24:31', '2018-06-29 10:24:31');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
