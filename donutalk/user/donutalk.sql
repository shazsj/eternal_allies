-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 12:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donutalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(55) NOT NULL,
  `cat_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_qty`) VALUES
(1, 'Solo', 1),
(3, 'Half-dozen', 6),
(6, 'Dozen', 12);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `mobile` varchar(155) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fname`, `lname`, `email`, `message`, `mobile`, `created_at`) VALUES
(7, 'test', 'test1', 'phpflow@gmail.com', 'hello! comment', '123-45-234', '2021-08-25 23:39:55'),
(9, 'phpflow', 'test', 'phpflow@gmail.com', 'Heelo! second entry', '123-45-244', '2021-08-25 23:41:43'),
(10, 'fff', 'bautista', 'testttttt@gmail.com', 'ok', '09785634123', '2023-12-17 16:33:09'),
(11, 'aaaa', 'bautista', 'testttttt@gmail.com', 'ok', '09876543218', '2023-12-17 16:36:41'),
(12, 'madel', 'jandra', 'madelb@gmail.com', 'ok', '09785634124', '2023-12-17 16:42:22'),
(13, 'jandraaa', 'nideaa', 'madelbautista@gmail.com', 'okiee', '09817263546', '2023-12-18 16:49:55'),
(14, 'maaaaaaaaadddd', 'nideaa', 'aaaaqqqqq@gmail.com', 'good', '095436271822', '2023-12-18 16:50:58'),
(15, 'madel', 'nideaa', 'testtttttaaassw@gmail.com', 'okieee', '09785634123', '2023-12-22 11:07:34'),
(16, 'fffcdcdcd', 'nideaa', 'madelbautista@gmail.com', 'oki', '09876543218', '2023-12-22 11:10:29'),
(17, 'aaaadefeef', 'jandra', 'madelb@gmail.com', 'okieefe', '09876543218', '2023-12-22 11:10:56'),
(18, 'madel', 'bautista', 'madeljbautista@gmail.com', 'hahaa', '09876543218', '2023-12-27 14:47:41'),
(19, 'dsdmm', 'nnnn', 'testttttt@gmail.com', 'okiee', '09876543218', '2023-12-27 16:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(55) NOT NULL,
  `item_desc` text NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `item_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A - Available\r\nU - Unavailable',
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_desc`, `item_price`, `item_status`, `item_image`) VALUES
(1, 'Chocolate', 'These chocolate mini donuts are deliciously soft and fluffy. Baked not fixed. Made with melted chocolate bar and pancake mixture.', 10.00, 'A', './uploads/68938.jpg'),
(2, 'Matcha', 'Enjoy these heavenly mini donuts covered with melted matcha chocolate bar on top.', 10.00, 'A', './uploads/820617.jpg'),
(3, 'Strawberry', 'Enjoy these mini donut with real melted strawberry chocolate bar.', 10.00, 'A', './uploads/404587.jpg'),
(4, 'Milk Chocolate', 'Taste and enjoy these gorgeous mini milkchocolate donut made with melted white chocolate coveres on top.', 10.00, 'A', './uploads/37738.jpg'),
(5, 'Ube', 'Taste and enjoy these delightful purple ube mini donut made with melted ube chocolate bar.', 10.00, 'A', './uploads/433245.jpg'),
(6, 'Caramel', 'Our mini caramel donut boast a rich, indulgent flavor with a perfect balance of business.', 10.00, 'A', './uploads/998561.jpg'),
(7, 'Chocoprinkles', 'A delightful mini donut infused with rich chocolate flavor and adored with colorful sprinkles for a sweet and playful treat.', 15.00, 'A', './uploads/498382.jpg'),
(8, 'Matchamond', 'Delight in the perfect bite sized treat a mini donut infused with the rich flavor of matcha, crowned with a delicate almond topping.', 15.00, 'A', './uploads/905979.jpg'),
(9, 'Veryberry', 'These mini donut infused with a burst of melted veryberry flavors and a strawberry on top.', 15.00, 'A', './uploads/548835.jpg'),
(10, 'Milkinuts', 'Delight in the rich indulgence of a mini donut, generously coated with smooth milk chocolate and crowned with a satisfying crunch of nuts.', 15.00, 'A', './uploads/713922.jpg'),
(11, 'Ubecheese', 'Indulge in the unique combination of ube and cheese on top.', 15.00, 'A', './uploads/181498.jpg'),
(12, 'Dalgonut', 'This flavor is our special variant flavor. Enjoy and savor our mini dalgonut beautifully covered with dalgona coffee icing on top.', 15.00, 'A', './uploads/370110.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `reference_number` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cat_name` varchar(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` char(255) NOT NULL DEFAULT 'Cash on Delivery',
  `payment_status` char(11) NOT NULL DEFAULT 'I' COMMENT 'C - Completed\r\nI - Incomplete',
  `order_status` char(11) NOT NULL DEFAULT 'C' COMMENT 'C - Confirmed\r\nPK - Packed\r\nP - Pending\r\nD - Delivered',
  `date_ordered` date NOT NULL DEFAULT current_timestamp(),
  `time_ordered` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `reference_number`, `user_id`, `name`, `phone_number`, `address`, `cat_name`, `item_name`, `order_qty`, `total_amount`, `payment_method`, `payment_status`, `order_status`, `date_ordered`, `time_ordered`) VALUES
(91, 'REF2023122104355099876', 1, 'Madel Jandra N. Bautista', '09558129772', 'Libon, Albay', '3', 'Dalgonut, Ubecheese, Milkinuts, Strawberry, Milk Chocolate, Milk Chocolate', 6, 75.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '11:35:50'),
(96, 'REF2023122106005845972', 1, 'test', '09876678905', 'libonss', 'Half-dozen', 'Ube, Dalgonut, Ubecheese, Milkinuts, Veryberry, Matchamond', 6, 85.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '13:00:58'),
(97, 'REF2023122106075141106', 1, 'test', 'tesfrfgtrg', 'libonss', 'Half-dozen', 'Milkinuts, Ubecheese, Milk Chocolate, Strawberry, Milk Chocolate, Ubecheese', 6, 75.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '13:07:51'),
(98, 'REF2023122106105890516', 1, 'qwertyssss', '09876543134', 'ojmhf', 'Solo', 'Matchamond', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '13:10:58'),
(99, 'REF2023122106221544213', 5, 'madel', '09876543217', 'oasnedne', 'Solo', 'Ube', 1, 10.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '13:22:15'),
(100, 'REF2023122106400020343', 5, 'madel', '09876543215', 'oasdefe', 'Solo', 'Ube', 1, 10.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '13:40:00'),
(101, 'REF2023122106550455479', 4, 'test', '09876543212', 'libons', 'Solo', 'Milkinuts', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '13:55:04'),
(102, 'REF2023122106585792416', 5, 'qwerty', '09876543215', 'libon', 'Solo', 'Veryberry', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '13:58:57'),
(103, 'REF2023122107020993701', 5, 'test', '09876543212', 'libobasd', 'Solo', 'Veryberry', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '14:02:09'),
(104, 'REF2023122107084863134', 1, 'qwertysssssdeded', '09876543215', 'oagfrg', 'Solo', 'Chocoprinkles', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '14:08:48'),
(105, 'REF2023122107214911183', 1, 'mmamaa', '09876556784', 'oas', 'Half-dozen', 'Dalgonut, Ubecheese, Milkinuts, Matchamond, Chocoprinkles, Caramel', 6, 85.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '14:21:49'),
(106, 'REF2023122107362685658', 1, 'test', '09876556784', 'gffggss', 'Solo', 'Dalgonut', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '14:36:26'),
(107, 'REF2023122107572021178', 1, 'test', '09876543215', 'oasdfe', 'Solo', 'Ubecheese', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '14:57:20'),
(108, 'REF2023122108010670570', 5, 'test', '09876543215', 'oasde', 'Solo', 'Caramel', 1, 10.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:01:06'),
(109, 'REF2023122108022612186', 2, 'test', '09876543212', 'oegdg', 'Solo', 'Ubecheese', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:02:26'),
(110, 'REF2023122108050154941', 5, 'test', '09876543219', 'dfdvd', 'Solo', 'Milkinuts', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:05:01'),
(111, 'REF2023122108080583570', 5, 'qwertysssszxscxsx', '09876543215', 'oas', 'Solo', 'Milkinuts', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:08:05'),
(112, 'REF2023122108114337565', 4, 'test', '09876556784', 'libion', 'Solo', 'Matchamond', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:11:43'),
(113, 'REF2023122108130610985', 5, 'test', '09876556784', 'oas', 'Solo', 'Dalgonut', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:13:06'),
(114, 'REF2023122108340426822', 4, 'test', '09876543134', 'fdfd', 'Solo', 'Ubecheese', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:34:04'),
(115, 'REF2023122108373972309', 4, 'test', '09876543212', 'dfrfr', 'Solo', 'Veryberry', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:37:39'),
(116, 'REF2023122108461998928', 5, 'test', '09876556784', 'lionhnh', 'Solo', 'Milkinuts', 1, 15.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '15:46:19'),
(117, 'REF2023122109171552945', 1, 'qwerty', '09876543134', 'libom', 'Solo', 'Caramel', 1, 10.00, 'Cash on Delivery', 'I', 'C', '2023-12-21', '16:17:15'),
(118, 'REF2023122110533270554', 5, 'madel', '09876543215', 'xcdf', 'Solo', 'Milk Chocolate', 1, 10.00, 'Cash on Delivery', 'I', 'P', '2023-12-21', '17:53:32'),
(119, 'REF2023122110554685573', 1, 'mmamaa', '09876544315', 'oajfed', 'Half-dozen', 'Ube, Matchamond, Chocolate, Ube, Matchamond, Ubecheese', 6, 75.00, 'Cash on Delivery', 'I', 'PK', '2023-12-21', '17:55:46'),
(120, 'REF2023122111153947273', 1, 'test', '09876543218', 'oashdh', 'Solo', 'Chocoprinkles', 1, 15.00, 'Cash on Delivery', 'C', 'D', '2023-12-21', '18:15:39'),
(121, 'REF2023122111190016529', 1, 'madel', '09876543212', 'libon', 'Half-dozen', 'Matcha, Strawberry, Chocoprinkles, Veryberry, Veryberry, Dalgonut', 6, 80.00, 'Cash on Delivery', 'C', 'D', '2023-12-21', '18:19:00'),
(122, 'REF2023122112325243431', 3, 'final test run for order', '09876543219', 'libobss', 'Half-dozen', 'Dalgonut, Ubecheese, Milkinuts, Matcha, Strawberry, Matchamond', 6, 80.00, 'Cash on Delivery', 'I', 'C', '2023-12-21', '19:32:52'),
(123, 'REF2023122115364575570', 1, 'madel', '09876556784', 'oassdef', 'Half-dozen', 'Dalgonut, Matcha, Ube, Matchamond, Veryberry, Caramel', 6, 75.00, 'Cash on Delivery', 'I', 'C', '2023-12-21', '22:36:45'),
(124, 'REF2023122204055426022', 5, 'test', '09876543217', 'oaskdekd', 'Half-dozen', 'Dalgonut, Chocoprinkles, Strawberry, Ube, Veryberry, Dalgonut', 6, 80.00, 'Cash on Delivery', 'C', 'D', '2023-12-22', '11:05:54'),
(125, 'REF2023122511484469437', 19, 'TESTTTT', '09876543212', 'libon', 'Half-dozen', 'Dalgonut, Strawberry, Caramel, Veryberry, Milkinuts, Ubecheese', 6, 80.00, 'Cash on Delivery', 'I', 'D', '2023-12-25', '18:48:44'),
(126, 'REF2023122512002943261', 1, 'test', '09876556784', 'libon', 'Solo', 'Caramel', 1, 10.00, 'Cash on Delivery', 'I', 'C', '2023-12-25', '19:00:29'),
(127, 'REF2023122512121718490', 1, 'xxx', 'xx', 'xxxx', 'Solo', 'Strawberry', 1, 10.00, 'Cash on Delivery', 'I', 'C', '2023-12-25', '19:12:17'),
(128, 'REF2023122513094050391', 1, 'madel', '09876543212', 'libon', 'Solo', 'Ube', 1, 10.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '20:09:40'),
(129, 'REF2023122513164148374', 1, 'mmqmqm', '09876543217', 'libons', 'Dozen', 'Ubecheese, Matchamond, Chocolate, Matcha, Milk Chocolate, Dalgonut, Ubecheese, Matchamond, Strawberry, Veryberry, Dalgonut, Milkinuts', 12, 160.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '20:16:41'),
(130, 'REF2023122513283519489', 1, 'madel', '09876556784', 'oanswnd', 'Solo', 'Dalgonut', 1, 15.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '20:28:35'),
(131, 'REF2023122513344536545', 5, 'qwerty', '09876543212', 'weefrgrg', 'Solo', 'Matchamond', 1, 15.00, 'Cash On Delivery', 'I', 'D', '2023-12-25', '20:34:45'),
(132, 'REF2023122513415532731', 1, 'qwerty', '09876556784', 'libjj', 'Solo', 'Milk Chocolate', 1, 10.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '20:41:55'),
(133, 'REF2023122513524952378', 2, 'qwertyaaaaa', '09876543219', 'oass', 'Solo', 'Milk Chocolate', 1, 10.00, 'Cash On Delivery', 'I', 'D', '2023-12-25', '20:52:49'),
(134, 'REF2023122513592712365', 1, 'nnnnn', '09876543217', 'mjjjjjj', 'Half-dozen', 'Milk Chocolate, Chocoprinkles, Caramel, Caramel, Caramel, Milkinuts', 6, 70.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '20:59:27'),
(135, 'REF2023122514063711402', 1, 'qwerty', '09876543215', 'oasjdj', 'Solo', 'Chocoprinkles', 1, 15.00, 'Cash On Delivery', 'I', 'P', '2023-12-25', '21:06:37'),
(136, 'REF2023122514181727778', 5, 'qwerty', '09876543215', 'oass', 'Solo', 'Chocoprinkles', 1, 15.00, 'Cash On Delivery', 'I', 'P', '2023-12-25', '21:18:17'),
(137, 'REF2023122514211130016', 1, 'madel', '09876543215', 'oasdefefe', 'Solo', 'Dalgonut', 1, 15.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '21:21:11'),
(138, 'REF2023122514303038874', 5, 'qwertyggg', '09876543217', 'jhjjj', 'Solo', 'Strawberry', 1, 10.00, 'Cash On Delivery', 'I', 'P', '2023-12-25', '21:30:30'),
(139, 'REF2023122514335834944', 1, 'madelldkckd', '09876543212', 'libon', 'Solo', 'Veryberry', 1, 15.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '21:33:58'),
(140, 'REF2023122514354321423', 5, 'test', '09876556784', 'asdsf', 'Solo', 'Strawberry', 1, 10.00, 'Cash On Delivery', 'I', 'P', '2023-12-25', '21:35:43'),
(141, 'REF2023122514372285092', 2, 'qwerty', '09876543217', 'jjj', 'Half-dozen', 'Dalgonut, Strawberry, Chocoprinkles, Caramel, Caramel, Dalgonut', 6, 75.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '21:37:22'),
(142, 'REF2023122514553719716', 1, 'test12344', '09876556784', 'oass', 'Solo', 'Caramel', 1, 10.00, 'Cash On Delivery', 'I', 'PK', '2023-12-25', '21:55:37'),
(143, 'REF2023122602565970624', 1, 'madel', '09876543215', 'libosss', 'Solo', 'Dalgonut', 1, 15.00, 'Cash on Delivery', 'I', 'D', '2023-12-26', '09:56:59'),
(144, 'REF2023122602592114279', 5, 'test', '09876543215', 'oassd', 'Solo', 'Ube', 1, 10.00, 'Cash on Delivery', 'I', 'P', '2023-12-26', '09:59:21'),
(145, 'REF2023122603261599502', 1, 'test', '09876543212', 'libonns', 'Solo', 'Dalgonut', 1, 15.00, 'Cash On Delivery', 'I', 'D', '2023-12-26', '10:26:15'),
(146, 'REF2023122603275522823', 2, 'finaall', '09876543219', 'libijbdsj', 'Half-dozen', 'Matchamond, Dalgonut, Veryberry, Chocolate, Ube, Dalgonut', 6, 80.00, 'Cash On Delivery', 'I', 'P', '2023-12-26', '10:27:55'),
(147, 'REF2023122603480440840', 1, 'finsllllllll', '09876556784', 'oasdsdd', 'Solo', 'Veryberry', 1, 15.00, 'Cash On Delivery', 'I', 'P', '2023-12-26', '10:48:04'),
(148, 'REF2023122703031627909', 4, 'xccc', '09876543212', 'sfssf', 'Solo', 'Ube', 1, 10.00, 'Cash On Delivery', 'I', 'PK', '2023-12-27', '10:03:16'),
(158, 'REF2023122709243014961', 1, 'jem', '/8745120', 'jxcvbnmk', 'Solo', 'Caramel', 1, 10.00, 'Cash On Delivery', 'I', 'D', '2023-12-27', '16:24:30'),
(159, 'REF2023122709281863730', 4, 'mmmm', '09876543219', 'oaass', 'Solo', 'Milk Chocolate', 1, 10.00, 'Cash On Delivery', 'I', 'P', '2023-12-27', '16:28:18'),
(160, 'REF2023122709341513887', 5, 'testsat', '09876556784', 'oass', 'Solo', 'Veryberry', 1, 15.00, 'Cash On Delivery', 'I', 'D', '2023-12-27', '16:34:15'),
(161, 'REF2023122709405650431', 2, 'madelkk', '09876543217', 'libonss', 'Solo', 'Veryberry', 1, 15.00, 'Cash On Delivery', 'I', 'D', '2023-12-27', '16:40:56'),
(162, 'REF2023122709435432757', 1, 'madel', '09876543134', 'liboss', 'Dozen', 'Matcha, Milk Chocolate, Chocoprinkles, Matchamond, Dalgonut, Caramel, Caramel, Ubecheese, Dalgonut, Chocolate, Ubecheese, Veryberry', 12, 155.00, 'Cash On Delivery', 'I', 'C', '2023-12-27', '16:43:54'),
(163, 'REF2023122709474491473', 1, 'jandraa', '09876543219', 'libons', 'Half-dozen', 'Chocolate, Matcha, Strawberry, Milk Chocolate, Matchamond, Dalgonut', 6, 70.00, 'Cash On Delivery', 'I', 'P', '2023-12-27', '16:47:44'),
(164, 'REF2023122709520022245', 5, 'test', '09876543217', 'dldlld', 'Solo', 'Milkinuts', 1, 15.00, 'Cash On Delivery', 'I', 'P', '2023-12-27', '16:52:00'),
(165, 'REF2023122709534750258', 1, 'finalal', '09876543134', 'loiijd', 'Half-dozen', 'Matchamond, Dalgonut, Milkinuts, Ube, Milk Chocolate, Dalgonut', 6, 80.00, 'Cash On Delivery', 'I', 'PK', '2023-12-27', '16:53:47'),
(166, 'REF2023122709550027178', 2, 'test', '09876543217', 'oasddede', 'Solo', 'Caramel', 1, 10.00, 'Cash On Delivery', 'I', 'PK', '2023-12-27', '16:55:00'),
(167, 'REF2023122709570452285', 3, 'test', '09876543134', 'knb', 'Solo', 'Ube', 1, 10.00, 'Cash On Delivery', 'I', 'D', '2023-12-27', '16:57:04'),
(168, 'REF2023122709585543418', 1, 'lastwtd', '09876543219', 'libonss', 'Solo', 'Milkinuts', 1, 15.00, 'Cash On Delivery', 'I', 'PK', '2023-12-27', '16:58:55'),
(169, 'REF2023122710031753511', 22, 'test', '09876543219', 'madqwefrre', 'Solo', 'Milk Chocolate', 1, 10.00, 'Cash On Delivery', 'I', 'D', '2023-12-27', '17:03:17'),
(170, 'REF2023122710052328828', 5, 'testrtttt', '09876543217', 'oadsde', 'Half-dozen', 'Dalgonut, Ubecheese, Milkinuts, Strawberry, Milk Chocolate, Caramel', 6, 75.00, 'Cash On Delivery', 'I', 'P', '2023-12-27', '17:05:23'),
(171, 'REF2023122710072573877', 5, 'hsaidmenfke', '09876543219', 'libonssds', 'Dozen', 'Chocolate, Matcha, Strawberry, Milk Chocolate, Ube, Caramel, Chocoprinkles, Matchamond, Veryberry, Milkinuts, Ubecheese, Dalgonut', 12, 150.00, 'Cash On Delivery', 'I', 'D', '2023-12-27', '17:07:25'),
(172, 'REF2023122710105777797', 1, 'madelfdlead', '09876543134', 'oasdskdna', 'Dozen', 'Chocolate, Matcha, Strawberry, Milk Chocolate, Ube, Chocoprinkles, Matchamond, Veryberry, Milkinuts, Ubecheese, Ubecheese, Dalgonut', 12, 155.00, 'Cash On Delivery', 'I', 'PK', '2023-12-27', '17:10:57'),
(173, 'REF2023122803393454528', 5, 'shaine sanjuan', '09876543219', 'polangui', 'Dozen', 'Chocolate, Matcha, Strawberry, Milk Chocolate, Ube, Caramel, Chocoprinkles, Matchamond, Veryberry, Milkinuts, Ubecheese, Dalgonut', 12, 150.00, 'Cash On Delivery', 'I', 'D', '2023-12-28', '10:39:34'),
(174, 'REF2023122803535433597', 1, 'madel bautista', '09876543212', 'libon', 'Solo', 'Matchamond', 1, 15.00, 'Cash On Delivery', 'I', 'D', '2023-12-28', '10:53:54'),
(175, 'REF2023122803573949788', 23, 'jandra bautista', '09876543111', 'libon, albay', 'Dozen', 'Dalgonut, Ubecheese, Milkinuts, Veryberry, Matchamond, Chocoprinkles, Caramel, Ube, Milk Chocolate, Strawberry, Matcha, Dalgonut', 12, 155.00, 'Cash On Delivery', 'I', 'P', '2023-12-28', '10:57:39'),
(176, 'REF2023122804265655050', 1, 'test', '09876543217', 'linodns', 'Solo', 'Caramel', 1, 10.00, 'Cash On Delivery', 'I', 'C', '2023-12-28', '11:26:56'),
(177, 'REF2023122805040213358', 1, 'test', '09876543134', 'oazfx', 'Solo', 'Veryberry', 1, 15.00, 'Cash On Delivery', 'I', 'P', '2023-12-28', '12:04:02'),
(178, 'REF2023122812591294305', 5, 'madel', '09876543219', 'libon, albay', 'Half-dozen', 'Dalgonut, Ubecheese, Milkinuts, Veryberry, Matchamond, Chocoprinkles', 6, 90.00, 'Cash On Delivery', 'I', 'P', '2023-12-28', '19:59:12'),
(179, 'REF2023122813074569114', 5, 'test', '09876543217', 'polangui, albay', 'Solo', 'Dalgonut', 1, 15.00, 'Cash On Delivery', 'I', 'PK', '2023-12-28', '20:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_date_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` char(11) NOT NULL DEFAULT 'A' COMMENT 'A - ACTIVE\r\nB - BANNED\r\nX - DELETED\r\nI - INACTIVE',
  `user_email_address` varchar(255) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `user_contact_number` varchar(12) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_type` char(11) NOT NULL DEFAULT 'U' COMMENT 'U - USER\r\nA - ADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `username`, `password`, `user_date_joined`, `user_status`, `user_email_address`, `user_contact_number`, `user_address`, `user_type`) VALUES
(1, 'Madel Jandra N. Bautista', 'mjnb2121', '2121mjnb', '2023-11-29 04:08:09', 'A', 'madelb@gmail.com', '09123456789', 'Zone 5, Libon, Albay', 'U'),
(2, 'Kristine Zyra Mae Arevalo', 'kzmba1234', '1234kzmba', '2023-11-29 05:49:28', 'A', 'kristinea@gmail.com', '09107364759', 'Camagong, Oas, Albay', 'U'),
(3, 'Althea Lobos', 'arl5678', '5678arl', '2023-11-29 05:52:51', 'A', 'altheal@gmail.com', '9098735261', 'Mayao, Oas, Albay', 'U'),
(4, 'Jem Casurog', 'jnc9012', '9012jnc', '2023-11-29 05:55:24', 'A', 'jemc@gmail.com', '9989442123', 'Cavasi, Ligao, Albay', 'U'),
(5, 'Shaine SanJuan', 'sss3456', '3456sss', '2023-11-29 05:57:24', 'A', 'shaines@gmail.com', '9111145672', 'Sugcad, Polangui, Albay', 'U'),
(6, 'DONUTALK', 'donutalk', 'dunotdunot', '2023-11-29 05:59:29', 'A', 'donutalk2023@gmail.com', '9987654321', 'Polangui, Albay', 'A'),
(7, 'Maria Alayne N. Bautista', 'maria1130', '1130maria', '2023-11-30 04:44:10', 'A', 'mariab@gmail.com', '9558129772', 'Libon, Albay', 'U'),
(8, 'Josh Esc', 'whaaat', '1234', '2023-12-06 05:12:54', 'A', 'test@gmail.com', '1234567890', 'Mars', 'U'),
(9, 'tester', 'test', 'qwerty', '2023-12-06 05:16:15', 'A', 'wert@gmail.com', '987654321', 'moon', 'U'),
(10, 'aaa', 'aaaaaaa', 'aaaaa0', '2023-12-16 10:49:18', 'A', 'aaaaaaaaa@gmail.com', '9876543218', 'libon, albay', 'U'),
(11, 'tryyy', 'againn', 'ssssssss', '2023-12-16 11:14:09', 'A', 'agaaiinnn@gmail.com', '98765432111', 'Libon, Albay', 'U'),
(12, 'wwwww', 'wwwwwwww', '', '2023-12-18 14:15:33', 'A', 'testtttttwww@gmail.com', '9876543218', 'libon, albay', 'U'),
(13, 'mkkdkdkd', 'sssss', '', '2023-12-18 16:18:32', 'A', ' mmjjj@gmail.com', '98767867876', 'Polangui, Albay', 'U'),
(14, 'ssss', 'fffff', '', '2023-12-18 16:20:13', 'A', 'aaa222a@gmail.com', '9111111111', 'Polangui, Albay', 'U'),
(15, 'dmsfjdbfed', 'ncdkckdnckd', '', '2023-12-21 12:32:47', 'A', 'madelb@gmail.com', '9876543219', 'Polangui, Albay', 'U'),
(16, 'last try for register', 'ltfrrrr', '', '2023-12-21 12:38:10', 'A', 'testtttttlassts@gmail.com', '9876543219', 'Polangui, Albay', 'U'),
(17, 'tryyy', 'asdssdc', '', '2023-12-21 12:44:26', 'A', 'testttttt@gmail.com', '09876543172', 'Polangui, Albay', 'U'),
(18, 'jandra nidea', 'aasxsxsdxcsss', 'ssssssssss', '2023-12-21 12:55:31', 'A', 'madxsdscs@gmail.com', '09107364444', 'libon, ablbay', 'U'),
(19, 'madel bautista', 'mnopqrs', '11111', '2023-12-25 10:46:05', 'A', 'madelsslll@gmail.com', '09558129772', 'libon', 'U'),
(20, 'last try', 'lassttt', 'pasyd', '2023-12-25 10:56:10', 'A', 'lastsss@gmail.com', '09107364759', 'libonss', 'U'),
(21, 'bahbsud', 'qqqqqq1212', '121212', '2023-12-27 09:00:13', 'A', 'test@gmail.com', '09845273812', 'linxisncis', 'U'),
(22, 'jjandnsd', 'qq121212', '12121212', '2023-12-27 09:02:38', 'A', 'test@gmail.com', '09100200300', 'kkkk', 'U'),
(23, 'Madel Jandra', 'mmm1212', '1212mmm', '2023-12-28 02:56:14', 'A', 'test1212@gmail.com', '09845273111', 'libon, albay', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
