-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 01:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech-life`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'default'),
(2, 'action'),
(3, 'fighting'),
(4, 'sports'),
(5, 'adventure'),
(6, 'racing');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `product_id`) VALUES
(1, 6, 'hello its me', 2),
(2, 6, 'hahahahah', 2),
(3, 6, 'hahahaha', 2),
(4, 6, 'hahahahaha', 2),
(5, 6, 'hahahahahha', 2),
(6, 5, 'hello', 1),
(7, 6, 'NICE GAME', 5),
(8, 6, 'TEST', 5);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `message`, `email`) VALUES
(1, 'It`s my first message i hope you can read it from database!', 'zsamamah@yahoo.com'),
(2, 'Hello from our team !', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(11, 'admin@admin.com'),
(1, 'elon@musk.com'),
(9, 'email@email.com'),
(7, 'test2@test.com'),
(10, 'test@test.com'),
(6, 'zsamamah@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `total` float NOT NULL,
  `delivery` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total`, `delivery`, `address`, `remark`, `date`) VALUES
(7, 5, 'Delivered', 80, 4, 'Jordan,Zarqa,zarqa , batrawi,26,13115', '', '2022-01-28'),
(8, 6, 'Delivered', 60, 3, 'Labore dolores neces,Quia expedita sunt i,Voluptatibus animi ,Quos architecto ab d,12489', 'Qui quasi voluptas d', '2022-01-28'),
(9, 6, 'Delivered', 15, 0.75, 'Saepe perspiciatis ,Omnis maiores corpor,Id dolore dolores be,Qui saepe rerum dolo,23639', 'Ut sit consequatur p', '2022-01-29'),
(10, 5, 'Delivered', 35, 1.75, 'Jordan,Quia expedita sunt i,Voluptatibus animi ,Quos architecto ab d,12489', '', '2022-01-30'),
(11, 1, 'Delivered', 25, 1.25, 'Tempora quia aut non,Enim voluptatem Hic,Distinctio Similiqu,Vero deserunt duis v,77421', 'In fugiat deserunt ', '2022-01-31'),
(14, 6, 'Delivered', 48.4, 2.5, 'Jordan,zarqa,mecca st,26,1111', 'Please deliver this order ASAP\r\nThank you all.', '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(7, 7, 1, 2),
(8, 7, 5, 1),
(9, 7, 2, 1),
(10, 8, 4, 2),
(11, 8, 3, 1),
(12, 9, 2, 1),
(13, 10, 1, 1),
(14, 10, 2, 1),
(15, 11, 4, 1),
(19, 14, 3, 1),
(20, 14, 12, 1),
(21, 14, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(5) NOT NULL,
  `discount` float NOT NULL DEFAULT 1,
  `online_reviews` varchar(255) NOT NULL,
  `age_rating` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `stock`, `discount`, `online_reviews`, `age_rating`, `category_id`) VALUES
(1, 'Grand Theft Auto V', 20, 'The Criminal Enterprise Starter Pack is the fastest way for new Grand Theft Auto Online players to jumpstart their criminal empires. Do not purchase if you already own the Criminal Enterprise Starter Pack.', 'https://img.g2a.com/323x433/1x1x0/grand-theft-auto-v-criminal-enterprise-starter-pack-ps4-psn-key-europe/fd911188594b4ebfbe77628e', 6, 1, '10/10', '+18', 2),
(2, 'Batman: Arkham Knight', 15, 'In the explosive finale to the Arkham series, Batman faces the ultimate threat against the city he is sworn to protect.', 'https://img.g2a.com/323x433/1x1x0/batman-arkham-knight-psn-ps4-key-north-america/5912e7945bafe3ce796ca795', 1, 1, '8.5/10', '16', 5),
(3, 'WWE 2K Battlegrounds', 10, 'Take your favorite WWE Superstars and Legends into battle with unrestrained, unhinged, and in-your-face pandemonium! Pull off over-the-top moves and use your special abilities to destroy your opponent while battling in interactive environments!', 'https://img.g2a.com/323x433/1x1x0/wwe-2k-battlegrounds-ps4-psn-key-europe/5fdb1c6346177c7e33723132', 8, 0.2, '7/10', 'T', 3),
(4, 'Fast & Furious: Crossroads', 25, 'Fast & Furious Crossroads is an action-adventure video game set in the Fast & Furious universe.', 'https://img.g2a.com/323x433/1x1x0/fast-furious-crossroads-ps4-psn-key-europe/5f2cf31b7e696c2e89796fb2', 2, 1, '7/10', 'T', 6),
(5, 'FIFA 2022', 25, 'FIFA 22 is the latest installment of the FIFA series developed by EA Canada and published by Electronic Arts. The game takes you back to the world of international football.', 'https://img.g2a.com/323x433/1x1x0/fifa-22-pc-origin-key-global/dce7598de0604b70ae47d576', 4, 1, '7.5/10', 'T', 4),
(11, 'God of War', 35, 'God of War is an action video game with RPG elements, developed by Santa Monica Studio and released thanks to PlayStation PC LLC in 2022 for personal computers.', 'https://img.g2a.com/323x433/1x1x0/god-of-war-pc-steam-key-global/98c4f59fc39f44aaa432445e', 12, 1, '10/10', '+18', 5),
(12, 'Horizon Zero Dawn', 25, 'A unique gaming experience that puts you in the role of a post-apocalyptic robo-animals hunter, Aloy, who sets out on the quest to uncover her own past and prevent an even worse future to happen.', 'https://img.g2a.com/323x433/1x1x0/horizon-zero-dawn-pc-steam-key-global/5f02c6a57e696c6f690471f2', 9, 1, '9/10', '16', 5),
(13, 'NBA 2K22', 22, 'After the lackluster reception of the last installment, NBA 2K22 could turn out to be what the fans have been waiting for.', 'https://img.g2a.com/323x433/1x1x0/nba-2k22-pc-steam-key-global/1bce4b4fdb554c79b94ebb49', 11, 0.3, '6/10', 'T', 4),
(14, 'Shadow of Mordor', 15, 'Meet Talion, a Gondorian ranger who lost all he had when Sauron\'s forces came back to Mordor. Middle-Earth: Shadow of Mordor is a third-person open-world action game developed by Monolith Productions.', 'https://img.g2a.com/323x433/1x1x0/middle-earth-shadow-of-mordor-game-of-the-year-edition-steam-key-global/5911a9c8ae653a2ed4758101', 9, 1, '8.5/10', '+18', 5),
(15, 'Dying Light 2', 25, 'Explore the huge open city and the environment that dynamically changes according to the choices you make.', 'https://img.g2a.com/323x433/1x1x0/dying-light-2-pc-steam-key-global/a7f11c7ff17142279fbd79d3', 8, 1, '8/10', '+18', 2),
(16, 'Forza Horizon 5', 40, 'Forza Horizon 5 brings the best the developers at Playground Games have to offer. With over 400 available cars, a dynamic, open world divided into several biomes, and stunning visuals.', 'https://img.g2a.com/323x433/1x1x0/forza-horizon-5-xbox-series-x-s-windows-10-xbox-live-key-global/dc4f80e65c984df5bc42b658', 17, 0.2, '8.5/10', 'T', 6),
(17, 'Tekken 7', 25, 'Tekken 7 is the next chapter in the story of clan Mishina. Devil Gene\'s mysteries will be revealed at last, and the dynamics of the Mishima clan are likely to shift significantly.', 'https://img.g2a.com/323x433/1x1x0/tekken-7-steam-key-global/59a479ac5bafe388224d4522', 13, 1, '7.5/10', '16', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `is_admin`) VALUES
(1, 'admin admin', '0777777777', 'admin@admin.com', 'Admin@123', 1),
(5, 'test test', '0777777777', 'test@test.com', 'Zaid@123', 0),
(6, 'Zaid Samamah', '0777684935', 'zsamamah@yahoo.com', 'Zaid@123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
