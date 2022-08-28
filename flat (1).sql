-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2022. Aug 28. 21:23
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `flat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `city`
--

INSERT INTO `city` (`id`, `city_name`) VALUES
(2, 'Topolya'),
(3, 'Szabadka'),
(4, 'Újvidék'),
(5, 'Zombor'),
(6, 'Temerin'),
(7, 'Ada'),
(8, 'Zenta'),
(9, 'Kanizsa'),
(10, 'Becse');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `flat_type`
--

CREATE TABLE `flat_type` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `flat_type`
--

INSERT INTO `flat_type` (`id`, `type`) VALUES
(1, 'Lakás'),
(2, 'Családi ház'),
(3, 'Garázs');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_box_id` int(11) NOT NULL,
  `userOne_id` int(11) NOT NULL,
  `userTwo_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `messages`
--

INSERT INTO `messages` (`id`, `message_box_id`, `userOne_id`, `userTwo_id`, `products_id`, `message`, `created`) VALUES
(1, 1, 7, 1, 53, 'asd', '2022-08-28 19:16:04'),
(2, 1, 1, 7, 53, 'dsa\r\n', '2022-08-28 19:17:19');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `floor` int(11) NOT NULL,
  `elevator` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `parking` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `city_id`, `user_id`, `size`, `price`, `bedroom`, `bathroom`, `location`, `floor`, `elevator`, `type`, `parking`, `date`, `image`) VALUES
(35, 7, 1, 124, 7500, 4, 1, 'PalKaroly', 0, 'Nincs', 'Családi ház', 'Van', '2022-09-30', '277972.jpg'),
(36, 9, 1, 40, 5200, 0, 0, 'Vojvodanska', 0, 'Nincs', 'Garázs', 'Van', '2022-09-29', '650579.jpg'),
(37, 10, 1, 160, 16000, 5, 2, 'Zelena', 0, 'Nincs', 'Családi ház', 'Van', '2022-09-11', '440466.jpg'),
(38, 4, 1, 48, 5500, 0, 0, 'Srpska', 0, 'Nincs', 'Garázs', 'Van', '2022-09-09', '337469.jpg'),
(39, 2, 1, 112, 11500, 2, 1, 'Proleterska', 0, 'Nincs', 'Családi ház', 'Van', '2022-08-30', '535534.jpg'),
(40, 3, 1, 72, 13000, 2, 1, 'Rakoczi', 3, 'Van', 'Lakás', 'Van', '2022-10-29', '301054.jpg'),
(41, 6, 1, 60, 8500, 2, 1, 'Ohrdiska', 1, 'Nincs', 'Lakás', 'Van', '2022-09-24', '375203.jpg'),
(51, 7, 6, 42, 5200, 2, 1, 'Ohrdiska', 2, 'Van', 'Lakás', 'Van', '2022-09-01', '740155.jpg'),
(52, 9, 7, 90, 13000, 3, 1, 'Pal', 0, 'Nincs', 'Családi ház', 'Van', '2022-10-14', '299712.jpg'),
(53, 4, 7, 232, 44000, 6, 2, 'Vuk', 0, 'Nincs', 'Családi ház', 'Van', '2022-09-11', '475031.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Daniel', 'danibrada29@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'Bettina', 'bettinafarago555@gmail.com', '299125ce5a02c2bc534ad72e9d014888', 'user'),
(6, 'Peter', 'danibrada@citromail.hu', '202cb962ac59075b964b07152d234b70', 'user'),
(7, 'Bela', 'danibrada39@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'user');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `flat_type`
--
ALTER TABLE `flat_type`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userOne_fk` (`userOne_id`),
  ADD KEY `userTwo_fk` (`userTwo_id`),
  ADD KEY `products_fk` (`products_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `flat_type`
--
ALTER TABLE `flat_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT a táblához `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `products` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
