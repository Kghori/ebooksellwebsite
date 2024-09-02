-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 04:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_name` text NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `fullname`, `order_date`, `address`, `city`, `pincode`, `country`, `phoneno`, `payment`, `user_id`, `product_name`, `quantity`, `price`, `mrp`, `total_amount`) VALUES
(11, 'chetan panara', '2023-02-23', 'botad', 'botad', 783478, 'india', 2147483647, 'Cash On Deliery', 1, 'sliced cucumber Juice Pickled cucumber ,cocomilk black chocolates 290gm,cauliflower Cauliflower Cabbage 1kg,Juice Pineapple Smoothie Fruit 100gm,Orange juice Tangerine Bitter orange Fru,Instant coffee Tea Milk Masala chai', '1,1,1,1,1,1', '30,190,30,80,60,240', '45,200,50,100,86,259', 630),
(13, 'sunil panara', '2023-02-24', 'surat varacha road', 'surat', 242, 'india', 2147483647, 'Cash On Deliery', 2, 'cocomilk black chocolates 290gm,Tomato Vegetable Tomato 250gm,cauliflower Cauliflower Cabbage 1kg,Vegetarian cuisine Spanakopita Omelette ,Laundry Detergent Surf Unilever washing,Mouthwash Colgate-Palmolive Toothpaste,green Palmolive shampoo bottle', '1,2,1,3,2,3,4', '190,25,30,40,240,100,100', '200,30,50,60,260,120,110', 1570),
(14, 'chetan panara', '2023-02-25', 'botad', 'Botad', 3454334, 'india', 2147483647, 'Cash On Deliery', 1, 'ripe mangos Banganapalle Alphonso Mango,Dove Shower gel Deodorant Washing Soap', '1,1', '80,45', '100,59', 125),
(15, 'chetan panara', '2023-03-01', 'Ahemdabad,smaras hostel', 'Ahemdabad', 343545, 'India', 2147483647, 'Cash On Deliery', 1, 'sliced cucumber Juice Pickled cucumber ,cauliflower Cauliflower Cabbage 1kg,Tide Laundry detergent Washing powder,Breakfast Pops Corn 100gm,Shampoo Dandruff Hair conditioner shampo,green Palmolive shampoo bottle,Lotion Shower gel Nivea Oil oil cream,Pears soap Oil Grocery store Bathing soa,Lotion Garnier Moisturizer Sunscreen Cre,MINI Cooper Oreo Biscuits Chocolate,Flip Cream Milk cream Cocktail ,green peas Snow pea Organic food Vegeta', '2,2,1,1,2,1,1,3,1,1,2,4', '30,30,180,30,130,100,199,38,48,120,230,30', '45,50,200,49,150,110,120,45,60,139,249,45', 1751),
(16, 'sahadev panara', '2023-03-03', 'Mumbai', 'Mumbai', 27878, 'india', 2147483647, 'Cash On Deliery', 3, 'Chloroxylenol Antibacterial soap Hygiene, Apple Fruit 1kg,Instant coffee Tea Milk Masala chai,Malai Milk Cream Paneer Vegetarian', '1,1,2,3', '35,100,240,120', '39,150,259,129', 975),
(17, 'ajay panara', '2023-03-10', 'ahmedabad', 'ahmedabad', 328497, 'india', 2147483647, 'Cash On Deliery', 4, 'ripe mangos Banganapalle Alphonso Mango,Instant coffee Tea Milk Masala chai,Hand washing Lifebuoy Hand sanitizer Soa,Lotion Garnier Moisturizer Sunscreen Cre', '2,1,1,3', '80,240,78,48', '100,259,95,60', 622),
(18, 'mahesh babariya', '2023-03-20', 'bhavnagar', 'bhavnagar', 824978, 'india', 2147483647, 'Cash On Deliery', 5, 'ripe mangos Banganapalle Alphonso Mango,Chloroxylenol Antibacterial soap Hygiene,Instant coffee Tea Milk Masala chai', '2,1,1', '80,35,240', '100,39,259', 435);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `mrp` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pname`, `pimage`, `price`, `mrp`, `quantity`, `user_id`) VALUES
(131, 'ripe mangos Banganapalle Alphonso Mango', 'product_image173.png', 80, 100, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `discount` int(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `discount`, `active`) VALUES
(1, 'chocolates', 'category_image778.png', 50, 'Yes'),
(2, 'Fruits', 'category_image306.png', 60, 'Yes'),
(3, 'vegetables', 'category_image536.png', 60, 'Yes'),
(7, 'Dairy and Bakery', 'category_image672.png', 70, 'Yes'),
(8, 'Big deals on grocery', 'category_image367.png', 50, 'Yes'),
(9, 'Personal Care', 'category_image286.png', 60, 'Yes'),
(10, 'Ashirvaad Aata ', 'category_image428.png', 50, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'chetan panara', 'chetan@gmail.com', 'panara8055'),
(2, 'sunil panara', 'sunil@gmail.com', 'panara8055@'),
(3, 'sahadev panara', 'sahade@gmail.com', 'panara8055@'),
(4, 'ajay panara', 'ajay@gmail.com', 'panara8055@'),
(5, 'mahesh babariya', 'mahesh@gmail.com', 'panara8055@');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(10) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_name` text NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `total_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `fullname`, `email`, `order_date`, `status`, `address`, `city`, `pincode`, `country`, `phoneno`, `payment`, `user_id`, `product_name`, `quantity`, `mrp`, `price`, `total_amount`) VALUES
(11, 'chetan panara', 'chetan@gmail.com', '2023-02-23', 'Pending', 'botad', 'botad', 783478, 'india', 2147483647, 'Cash On Deliery', 1, 'sliced cucumber Juice Pickled cucumber ,cocomilk black chocolates 290gm,cauliflower Cauliflower Cabbage 1kg,Juice Pineapple Smoothie Fruit 100gm,Orange juice Tangerine Bitter orange Fru,Instant coffee Tea Milk Masala chai', '1,1,1,1,1,1', '45,200,50,100,86,259', '30,190,30,80,60,240', 630),
(13, 'sunil panara', 'sunil@gmail.com', '2023-02-24', 'Delivered', 'surat varacha road', 'surat', 242, 'india', 2147483647, 'Cash On Deliery', 2, 'cocomilk black chocolates 290gm,Tomato Vegetable Tomato 250gm,cauliflower Cauliflower Cabbage 1kg,Vegetarian cuisine Spanakopita Omelette ,Laundry Detergent Surf Unilever washing,Mouthwash Colgate-Palmolive Toothpaste,green Palmolive shampoo bottle', '1,2,1,3,2,3,4', '200,30,50,60,260,120,110', '190,25,30,40,240,100,100', 1570),
(14, 'chetan panara', 'chetan@gmail.com', '2023-02-25', 'Delivered', 'botad', 'Botad', 3454334, 'india', 2147483647, 'Cash On Deliery', 1, 'ripe mangos Banganapalle Alphonso Mango,Dove Shower gel Deodorant Washing Soap', '1,1', '100,59', '80,45', 125),
(15, 'chetan panara', 'chetan@gmail.com', '2023-03-01', 'Processing', 'Ahemdabad,smaras hostel', 'Ahemdabad', 343545, 'India', 2147483647, 'Cash On Deliery', 1, 'sliced cucumber Juice Pickled cucumber ,cauliflower Cauliflower Cabbage 1kg,Tide Laundry detergent Washing powder,Breakfast Pops Corn 100gm,Shampoo Dandruff Hair conditioner shampo,green Palmolive shampoo bottle,Lotion Shower gel Nivea Oil oil cream,Pears soap Oil Grocery store Bathing soa,Lotion Garnier Moisturizer Sunscreen Cre,MINI Cooper Oreo Biscuits Chocolate,Flip Cream Milk cream Cocktail ,green peas Snow pea Organic food Vegeta', '2,2,1,1,2,1,1,3,1,1,2,4', '45,50,200,49,150,110,120,45,60,139,249,45', '30,30,180,30,130,100,199,38,48,120,230,30', 1751),
(16, 'sahadev panara', 'sahade@gmail.com', '2023-03-03', 'Processing', 'Mumbai', 'Mumbai', 27878, 'india', 2147483647, 'Cash On Deliery', 3, 'Chloroxylenol Antibacterial soap Hygiene, Apple Fruit 1kg,Instant coffee Tea Milk Masala chai,Malai Milk Cream Paneer Vegetarian', '1,1,2,3', '39,150,259,129', '35,100,240,120', 975),
(17, 'ajay panara', 'ajay@gmail.com', '2023-03-10', 'Processing', 'ahmedabad', 'ahmedabad', 328497, 'india', 2147483647, 'Cash On Deliery', 4, 'ripe mangos Banganapalle Alphonso Mango,Instant coffee Tea Milk Masala chai,Hand washing Lifebuoy Hand sanitizer Soa,Lotion Garnier Moisturizer Sunscreen Cre', '2,1,1,3', '100,259,95,60', '80,240,78,48', 622),
(18, 'mahesh babariya', 'mahesh@gmail.com', '2023-03-20', 'Delivered', 'bhavnagar', 'bhavnagar', 824978, 'india', 2147483647, 'Cash On Deliery', 5, 'ripe mangos Banganapalle Alphonso Mango,Chloroxylenol Antibacterial soap Hygiene,Instant coffee Tea Milk Masala chai', '2,1,1', '100,39,259', '80,35,240', 435);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `scategory_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `mrp` int(10) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `company_name`, `category_id`, `scategory_id`, `price`, `mrp`, `product_image`, `description`, `active`) VALUES
(2, 'Krem Stapici chocolates 240gm', 'Lasta', 1, 2, 200, 220, 'product_image744.jpg', 'Krem Stapici chocolates 240gm.', 'Yes'),
(5, 'cocomilk black chocolates 290gm', 'Lasta', 1, 2, 190, 200, 'product_image166.jpg', 'cocomilk black chocolates 290gm', 'Yes'),
(6, 'Tomato Vegetable Tomato 250gm', 'vegetables', 3, 3, 25, 30, 'product_image95.png', 'Tomato Vegetable, Tomato, 250gm', 'Yes'),
(7, ' Apple Fruit 1kg', 'Fruits', 2, 4, 100, 150, 'product_image983.png', 'red apple, Apple Fruit 1kg', 'Yes'),
(8, 'Mashed potato 1kg', 'vegetables', 3, 3, 30, 35, 'product_image479.png', 'Mashed potato French fries Potato wedges Baked potato Potato chip', 'Yes'),
(9, 'green apple Juice Apple pie Flavor Conc', 'Fruits', 2, 4, 200, 230, 'product_image105.png', 'green apple, Juice Apple pie Flavor Concentrate 1kg', 'Yes'),
(10, 'ripe mangos Banganapalle Alphonso Mango', 'fruits', 2, 5, 80, 100, 'product_image173.png', 'ripe mangos, Banganapalle Alphonso Mango Fruit Benishan, Mango, natural Foods, food', 'Yes'),
(11, 'green mangoes Fruit Leaf Mango', 'fruits', 2, 5, 100, 120, 'product_image690.png', 'green mangoes, Fruit Leaf Mango pudding', 'Yes'),
(14, 'cauliflower Cauliflower Cabbage 1kg', 'vegetables', 3, 3, 30, 50, 'product_image863.png', 'cauliflower, Cauliflower Cabbage Vegetarian cuisine Brussels sprout Vegetable,', 'Yes'),
(15, 'Carrot Indian Vegetable Fruit', 'vegetables', 3, 3, 40, 50, 'product_image844.png', 'Carrot Indian cuisine Gajar ka halwa Vegetable Fruit', 'Yes'),
(16, 'Strawberry juice Fruit Smoothie strawbe', 'Fruits', 2, 5, 100, 130, 'product_image290.png', 'Strawberry juice Fruit Smoothie, strawberry fruit', 'Yes'),
(17, 'Juice Pineapple Smoothie Fruit 100gm', ' Fruit ', 2, 4, 80, 100, 'product_image904.png', 'Juice Pineapple Smoothie Fruit Vegetable', 'Yes'),
(18, 'sliced cucumber Juice Pickled cucumber ', 'Vegetable', 8, 15, 30, 45, 'product_image946.png', 'sliced cucumber, Juice Pickled cucumber Vegetable Food', 'Yes'),
(19, 'Eggplant Baingan bharta  vegetables 250', 'vegetables', 3, 3, 30, 55, 'product_image298.png', 'Eggplant Baingan bharta Tomato, vegetables', 'Yes'),
(20, 'Pomegranate juice Fruit Food 1kg', 'Fruit', 2, 4, 75, 90, 'product_image360.png', 'Pomegranate juice Fruit Food, pomegranate, natural Foods', 'Yes'),
(21, 'green peas Snow pea Organic food Vegeta', ' Vegetable', 3, 3, 30, 45, 'product_image669.png', 'green peas, Snow pea Organic food Vegetable Legume', 'Yes'),
(22, 'Vegetarian cuisine Spanakopita Omelette ', 'vegetables', 3, 3, 40, 60, 'product_image75.png', 'Vegetarian cuisine Spanakopita Omelette Spinach Arugula,', 'Yes'),
(23, 'red chilis Bell pepper Cayenne pepper C', 'vegetables', 3, 3, 20, 35, 'product_image992.png', 'red chilis, Bell pepper Cayenne pepper Chili pepper', 'Yes'),
(24, 'Orange juice Tangerine Bitter orange Fru', 'Fruit', 2, 5, 60, 86, 'product_image510.png', 'Orange juice Tangerine Bitter orange Fruit, orange', 'Yes'),
(31, 'Organic milk Organic food Dairy Product', 'Amul', 7, 14, 300, 330, 'product_image30.png', 'Organic milk Organic food Dairy Product', 'Yes'),
(32, 'Anchor Unsalted Butter Dairy 250gm', 'Amul', 7, 14, 200, 210, 'product_image767.png', 'Unsalted Butter Dairy ', 'Yes'),
(33, 'Amul Buttor 100gm', 'Amul', 7, 14, 70, 90, 'product_image788.jpg', 'Amul Buttor 100gm', 'Yes'),
(34, 'Shrikhand Lassi Basundi Milk Amul', 'Amul', 7, 14, 450, 499, 'product_image870.png', 'Shrikhand Lassi Basundi Milk Amul,', 'Yes'),
(35, 'Cheese slices Buttor 250gm', 'Amul', 7, 14, 350, 369, 'product_image490.jpg', 'Cheese slices Buttor 250gm', 'Yes'),
(36, 'Tide Laundry detergent Washing powder', 'Tide', 8, 15, 180, 200, 'product_image633.png', 'Tide Laundry detergent Washing powder', 'Yes'),
(37, ' Ariel Surf Excel washing powder', 'Ariel ', 8, 15, 120, 150, 'product_image728.png', ' Ariel Surf Excel washing powder,', 'Yes'),
(38, 'Instant coffee Tea Milk Masala chai', 'Nescafe', 8, 15, 240, 259, 'product_image699.png', 'Instant coffee Tea Milk Masala chai', 'Yes'),
(39, 'Surf Laundry Detergent Washing Powder', 'Surf', 8, 15, 230, 250, 'product_image630.png', 'Surf Laundry Detergent Washing Powder,', 'Yes'),
(40, 'Colgate MaxFresh Toothpaste 250g', 'Colgate', 8, 15, 95, 100, 'product_image942.png', 'Colgate MaxFresh Toothpaste Tooth whitening Tooth brushing', 'Yes'),
(41, 'Breakfast cereal Corn flakes Frosted Fla', 'Toast', 8, 15, 70, 95, 'product_image7.png', 'Breakfast cereal Corn flakes Frosted Flakes Toast', 'Yes'),
(42, 'MINI Cooper Oreo Biscuits Chocolate', 'Oreo', 1, 2, 120, 139, 'product_image326.png', 'MINI Cooper Oreo Biscuits Chocolate', 'Yes'),
(43, 'Cadbury World chocolate Cadbury Dairy Mi', 'Dairy Milk', 1, 2, 200, 230, 'product_image381.png', 'Cadbury World White chocolate Cadbury Dairy Milk', 'Yes'),
(44, 'Laundry Detergent Surf Unilever washing', ' Surf', 8, 15, 240, 260, 'product_image34.png', 'Laundry Detergent Surf Unilever, washing powder', 'Yes'),
(45, 'Mouthwash Colgate-Palmolive Toothpaste', 'Colgate', 9, 16, 100, 120, 'product_image668.png', 'Mouthwash Colgate-Palmolive Toothpaste', 'Yes'),
(46, 'Breakfast Pops Corn 100gm', 'Pops Corn', 7, 14, 30, 49, 'product_image40.png', 'Breakfast Pops Corn 100gm', 'Yes'),
(47, 'Flip Cream Milk cream Cocktail ', 'Cocktail ', 7, 14, 230, 249, 'product_image763.png', 'Flip Cream Milk cream Cocktail ', 'Yes'),
(48, 'Malai Milk Cream Paneer Vegetarian', 'Paneer', 7, 14, 120, 129, 'product_image851.png', 'Malai Milk Cream Paneer Vegetarian', 'Yes'),
(49, 'Household Insect Repellents Mosquito', 'Mosquito', 8, 15, 79, 95, 'product_image913.png', 'Household Insect Repellents Mosquito', 'Yes'),
(50, 'Processed cheese Britannia Industries Da', 'Amul cheese', 7, 14, 259, 260, 'product_image12.png', 'Processed cheese Britannia Industries Dairy Products ', 'Yes'),
(51, 'Head & Shoulders Classic Clean Shampoo ', 'Dove', 9, 16, 130, 150, 'product_image368.png', 'Head & Shoulders Classic Clean Shampoo Head & Shoulders', 'Yes'),
(52, 'Shampoo Hair Care Nivea Capelli ', 'Nivea', 8, 15, 230, 250, 'product_image668.png', 'Shampoo Hair Care Nivea Capelli ', 'Yes'),
(53, 'green Palmolive shampoo bottle', 'Palmolive', 9, 16, 100, 110, 'product_image741.png', 'green Palmolive shampoo bottle', 'Yes'),
(54, 'Shampoo Dandruff Hair conditioner shampo', 'clear', 9, 16, 130, 150, 'product_image35.png', 'Shampoo Dandruff Hair conditioner shampoo', 'Yes'),
(55, 'NIVEA Men Care Shampoo Pure Anti-Dandruf', 'NIVEA ', 9, 16, 300, 310, 'product_image176.png', 'NIVEA Men Care Shampoo Pure Anti-Dandruff NIVEA ', 'Yes'),
(56, 'Lotion Shampoo Head and Shoulders ', 'Head and Shoulders', 9, 16, 200, 210, 'product_image402.png', 'Lotion Shampoo Head & Shoulders Dandruff Shower gel', 'Yes'),
(57, 'three Tresemme ionic strength bottles Sh', ' Tresemme', 9, 16, 250, 270, 'product_image610.png', 'three Tresemme ionic strength bottles, Shampoo', 'Yes'),
(58, 'Dove Shower gel Deodorant Washing Soap', 'Dove', 9, 17, 45, 59, 'product_image165.png', 'Dove Shower gel Deodorant Washing Soap', 'Yes'),
(59, 'Dove Soap Lotion Bathing Personal Care s', 'Dove', 9, 17, 259, 275, 'product_image621.png', 'Dove Soap Lotion Bathing Personal Care soap', 'Yes'),
(60, 'Chloroxylenol Antibacterial soap Hygiene', 'Dettol', 9, 17, 35, 39, 'product_image609.png', 'Chloroxylenol Antibacterial soap Hygiene Skin care soap', 'Yes'),
(61, 'Hand washing Lifebuoy Hand sanitizer Soa', 'Lifebuoy', 8, 15, 78, 95, 'product_image445.png', 'Hand washing Lifebuoy Hand sanitizer Soap', 'Yes'),
(62, 'Cleanser Nivea Cream Face Cosmetics Face', 'Nivea', 9, 17, 58, 65, 'product_image706.png', 'Cleanser Nivea Cream Face Cosmetics Face, cream', 'Yes'),
(63, 'Lotion Garnier Moisturizer Sunscreen Cre', 'Lotion Garnier', 8, 15, 48, 60, 'product_image302.png', 'Lotion Garnier Moisturizer Sunscreen Cream oil', 'Yes'),
(64, 'Pears soap Oil Grocery store Bathing soa', 'Pears', 9, 17, 38, 45, 'product_image764.png', 'Pears soap Oil Grocery store Bathing soap', 'Yes'),
(65, 'Antibacterial soap of Personal Care ', 'Jolly', 9, 17, 35, 40, 'product_image373.png', 'Antibacterial soap of Personal Care ', 'Yes'),
(66, 'Lotion Shower gel Nivea Oil oil cream', 'Nivea', 9, 16, 199, 120, 'product_image46.png', 'Lotion Shower gel Nivea Oil oil cream', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `scategory_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sub_category_name` varchar(30) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`scategory_id`, `category_id`, `sub_category_name`, `active`) VALUES
(2, 1, 'Lasta chocolates', 'Yes'),
(3, 3, 'Tomato', 'Yes'),
(4, 2, 'Apple', 'Yes'),
(5, 2, 'Mango fruits', 'Yes'),
(14, 7, 'Milk', 'Yes'),
(15, 8, 'Big deals', 'Yes'),
(16, 9, 'Shampoo', 'Yes'),
(17, 9, 'Washing soap', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`scategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `scategory_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
