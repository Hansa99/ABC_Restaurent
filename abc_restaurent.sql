-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 01:01 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_restaurent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `name`, `price`, `image`, `quantity`) VALUES
(34, 27, 'Margherita Pizza', '4000', 'product-1.jpg', 1),
(35, 27, 'Lemonade', '700', 'Lemonade.jpeg', 1),
(41, 35, 'Margherita Pizza', '4000', 'product-1.jpg', 1),
(42, 35, 'Chicken Burger', '2200', 'SES-your-best-grilled-burger-recipe-7511041-hero-C-c5080fa5f97c4c2b908968527f8a851b.jpg', 2),
(43, 35, 'Coca cola', '325', '71YBmiSj-cL.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(35, 'Hansa', 'Madhushan', 'hansamadhushan99@gmail.com', '$2y$10$3NWn2tYFNtLBFNJ30ckYReNSM8arxE4xBPVsrrQklu0ONnNlbvYu6');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(2000) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `PRICE` decimal(10,0) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  PRIMARY KEY (`ITEM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ITEM_ID`, `NAME`, `DESCRIPTION`, `IMAGE`, `PRICE`, `CATEGORY`) VALUES
(1, 'Margherita Pizza', 'Classic Italian pizza with tomato sauce, mozzarella, and fresh basil.', 'product-1.jpg', '4000', 'pizza'),
(2, 'Pepperoni Pizza', 'A favorite with pepperoni slices on tomato sauce and melted cheese.', 'product-2.jpg', '4200', 'pizza'),
(53, 'Ice Cream', 'A frozen dessert made from milk, cream, sugar, and flavorings.', 'Ice-Cream-Sundae-1.2-735x1103.jpg', '300', 'dessert'),
(54, 'Strawberry chasse cake  ', 'A classic dessert with a graham cracker crust, creamy filling, and fresh strawberries.', 'deserts cake.jpeg', '450', 'dessert'),
(55, 'Coca cola', 'A popular carbonated soft drink known for its sweet and slightly acidic taste.', '71YBmiSj-cL.jpg', '325', 'beverage'),
(56, 'Fruit Juice', 'Fresh Juice', 'Fruit-and-vegetable-beverage.jpg', '400', 'beverage'),
(57, 'Fried rice', 'Vegan Fried rice', 'Fried-Rice-SQUARE.jpg', '1800', 'rice'),
(58, 'Mexican Rice', 'Special Rice', 'Mexican-Rice-Recipe-Video.jpg', '2500', 'rice'),
(59, 'Vegan Burger', 'Vegan', 'Ultimate-Veggie-Burgers-FT-Recipe-0821-5d7532c53a924a7298d2175cf1d4219f.jpg', '1500', 'burger'),
(60, 'Chicken Burger', 'Chicken', 'SES-your-best-grilled-burger-recipe-7511041-hero-C-c5080fa5f97c4c2b908968527f8a851b.jpg', '2200', 'burger');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `other_details` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `customer_name`, `payment_type`, `grand_total`, `other_details`) VALUES
(11, 35, 'Hansa', 'Credit/Debit Card', 12200, 'a:2:{i:0;a:2:{s:9:"item_name";s:16:"Margherita Pizza";s:8:"quantity";s:1:"2";}i:1;a:2:{s:9:"item_name";s:15:"Pepperoni Pizza";s:8:"quantity";s:1:"1";}}');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `guests` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `name`, `email`, `phone`, `date`, `time`, `guests`) VALUES
(5, 'Hansa', 'hansamaxx989@gmail.com', '0711456456', '2024-09-12', '04:09:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `password`, `user_type`) VALUES
(1, 'admin@abc.com', 'P@ssword1234', 'admin'),
(2, 'staff@abc.com', 'P@ssword1234', 'staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
