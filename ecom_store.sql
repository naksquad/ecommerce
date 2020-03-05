-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 06:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(2, 'Women', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(3, 'Kids', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(4, 'Accessories', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'bright', 'bright@naksquad.net', 'bright1986', 'TX', 'Houston', '469-235-0521', '5000 k ave ', 'reziiise.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(10, 1, 22, 1252645874, 1, 'Medium', '2019-11-05', 'pending'),
(11, 1, 26, 1252645874, 1, 'Medium', '2019-11-05', 'pending'),
(12, 1, 24, 257078018, 1, 'Medium', '2019-11-21', 'pending'),
(13, 1, 56, 257078018, 2, 'Medium', '2019-11-21', 'pending'),
(14, 1, 22, 257078018, 1, 'Medium', '2019-11-21', 'pending'),
(15, 1, 42, 257078018, 1, 'Medium', '2019-11-21', 'pending'),
(16, 1, 26, 1975330452, 1, 'Medium', '2019-11-21', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(1, 5, 1, '2019-11-01 22:42:59', 'Knit Cuff Pom Hat', 'Product-1.jfif', 'Product-1.jfif', 'Product-1.jfif', 22, 'Hats', 'Hit the mark every time wearing this Primetime campus knit cap. Acrylic knit cap features a striped pattern, a front cuff, and of course, is topped off with a fun pom! Share school spirit with the school graphic embroidered on the front.'),
(2, 1, 2, '2019-11-01 22:38:46', 'Women\'s V-Neck Short Sleeve T-Shirt', 'Product-2.jfif', 'Product-2.jfif', 'Product-2.jfif', 26, 'T-Shirt', 'This women\'s tri-blend, v-neck campus t-shirt feels as good as it looks. This relaxed fit t-shirt features feminine style, short sleeves, a mix of fabrics that make it feel incredibly soft, a tag-free collar, and a cut that moves with you. Add the perfect touch of school spirit with a school graphics on the front. Printed.'),
(3, 1, 2, '2019-11-01 22:39:52', 'Women\'s Short Sleeve T-Shirt', 'Product-3.jfif', 'Product-3.jfif', 'Product-3.jfif', 24, 'T-Shirt', 'Shake things up in this women\'s campus Twisted short sleeve t-shirt. Slim fit, women\'s t-shirt features a blend of durable and soft fabrics for a luxurious feel, a scoop neck, a front twist detail, and a rounded high/low hem. Bring school pride wherever you go with the school initials printed on the front.'),
(4, 5, 1, '2019-11-01 22:40:27', 'Ear Band', 'Product-4.jfif', 'Product-4.jfif', 'Product-4.jfif', 14, 'Ear Band', 'Acrylic knit earband with embroidered school logo on the front.'),
(5, 2, 2, '2019-11-01 22:40:44', 'Women\'s 1/2 Zip Top', 'Product-5.jfif', 'Product-5.jfif', 'Product-5.jfif', 52, 'Zip Top', 'Show your campus style in this women\'s Victory Springs 1/2 zip top. Cute and comfy, this slim fit women\'s top features dropped shoulders, a 1/2 length front zipper that zips all the way up the mock neck for added warmth, ribbed cuffs and waistband, and a front pouch pocket. Add the school seal printed on the upper left for a major dose of school spirit'),
(6, 1, 2, '2019-11-01 22:41:03', 'Women\'s Short Sleeve T-Shirt', 'Product-6.jfif', 'Product-6.jfif', 'Product-6.jfif', 28, 'T-Shirt', 'Hang out in the sun on a warm summer\'s day in this women\'s Clothesline campus crop top. This slim fit women\'s cropped t-shirt features natural cotton jersey fabric, a crew neckline, a tagless collar, and an unfinished bottom hem. Let school spirit flutter in the breeze with the school name and founding year printed on the front.'),
(7, 1, 2, '2019-11-01 22:41:14', 'Women\'s Short Sleeve T-Shirt', 'Product-7.jfif', 'Product-7.jfif', 'Product-7.jfif', 22, 'T-Shirt', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(8, 2, 2, '2019-11-01 23:52:55', 'Crewneck Sweatshirt', 'Product-8.jfif', 'Product-8.jfif', 'Product-8.jfif', 50, 'Sweatshirt', 'Craving comfort? You\'ve found it in this women\'s Corduroy Crew Pullover. This classic, casual pullover features enzyme washed corduroy knit fabric, long sleeves with ribbed cuffs, and a ribbed crewneck. Be bold and share school spirit with the printed on the front.'),
(9, 5, 1, '2019-11-02 00:11:41', 'UText Gloves', 'Product-9.jfif', 'Product-9.jfif', 'Product-9.jfif', 20, 'Gloves', 'Stay in touch wearing these Utext campus gloves. These gloves feature a blend of fabrics that keep your hands warm, stretch with you, and have special fingertips that give you access to your touch screen devices without removing your gloves. Hand it to you to keep up school spirit with the school logo embroidered on the front.'),
(10, 3, 1, '2019-11-01 22:42:20', 'Everest Beanie', 'Product-10.jfif', 'Product-10.jfif', 'Product-10.jfif', 14, 'Beanie', 'Scale new heights of looking great in this campus Everest beanie! Knit beanie comes in our school color and stretches for a comfortable fit. Share school pride with the school logo embroidered on the front.'),
(11, 3, 1, '2019-11-01 22:42:37', 'Hat', 'Product11.jfif', 'Product11.jfif', 'Product11.jfif', 34, 'Hat', 'Blaze your own trail in this Outback Boonie hat. This hat creates it\'s own shade, and features 3M Scotchguard Moisture Management, UPF 40 sun protection, Coolmax lining, a wide brim, and an adjustable chin strap. Take school spirit on your next adventure with the school logo embroidered on the front.'),
(14, 3, 2, '2019-10-31 05:41:43', 'uhd hat', 'Product-43.jfif', 'Product-43a.jfif', 'Product-43.jfif', 14, 'Hats', 'design by nak'),
(15, 1, 2, '2019-11-01 22:42:49', 'Women\'s Short Sleeve T-Shirt', 'Product-12.jfif', 'Product-12.jfif', 'Product-12.jfif', 22, 'T-Shirt', 'Get a smart look in this women\'s University t-shirt. Athletic fit, short sleeve, cotton t-shirt combines updated style with a comfortable fit to create an every day favorite. Women\'s t-shirt shares school spirit with the school name and school seal printed on the front.'),
(16, 1, 2, '2019-11-01 22:43:18', 'Women\'s V-Neck T-Shirt', 'Product-13.jfif', 'Product-13.jfif', 'Product-13.jfif', 22, 'T-Shirt', 'Go full-tilt school spirit in this women\'s v-neck University t-shirt. This athletic fit t-shirt features short sleeves, lightweight cotton fabric with an enzyme wash that makes it soft to the touch, a flattering v-neckline, and a tag-free collar. Lead the way for school pride with the school logo screen-printed on the front. Figure flattering, for a looser fit go up a size.'),
(17, 4, 1, '2019-11-01 22:43:47', 'Pack n Go Jacket', 'Product-14.jfif', 'Product-14.jfif', 'Product-14.jfif', 42, 'Jacket', 'When you need lightweight protection from wind and rain, grab this Pack \'N Go campus jacket. Weather resistant, pull-on Pak \'N Go jacket features a 1/2 length front zipper, an attached scuba hood with bungee drawcord, elastic cuffs, and side pockets with an additional covered front pocket. Jacket easily folds into the front zip pocket for easy storage. Share school spirit with the school logo screen-printed on the upper left side.'),
(18, 6, 1, '2019-11-01 22:44:00', 'Sweatpants', 'Product-15.jfif', 'Product-15.jfif', 'Product-15.jfif', 34, 'Sweatpants', 'Whether you are working out or at an outdoor sporting event, these sweatpants are a great choice for cooler weather. Feature screen-printed school initials on left leg. Inner drawstring cord for a comfortable fit. Elastic waistband and gathered bottom cuffs.'),
(19, 2, 1, '2019-11-01 22:44:15', 'Crewneck Sweatshirt', 'Product-16.jfif', 'Product-16.jfif', 'Product-16.jfif', 46, 'Sweatshirt', 'Support the school without saying a word in this classic 9 oz. campus crewneck sweatshirt. Sweatshirt blends comfortable and durable fabrics with traditional style to create a new favorite look. Campus sweatshirt features the school name and the school logo embroidered on the front.'),
(20, 2, 1, '2019-11-01 22:44:27', 'Hooded Sweatshirt', 'Product-17.jfif', 'Product-17a.jfif', 'Product-17a.jfif', 60, 'Sweatshirt', 'The drawstring hood and front pocket pouch on this hooded sweatshirt will help you keep warm, the embroidered school initials will help you display your school spirit.'),
(21, 2, 1, '2019-11-01 22:44:39', 'Cougars Full Zip Hooded Sweatshirt', 'Product-18.jfif', 'Product-18.jfif', 'Product-18.jfif', 50, 'Sweatshirt', 'The Champion Eco Powerblend Full Zip Hood is perfect for everyday. Brushed inside to make it super soft, this Full Zip Hood is even better because it\'s made with recycled polyester fibers. You can show your UNIVERSITY OF HOUSTON-DOWNTOWN spirit, be stylish, comfortable, and eco-friendly all at the same time. Features a double layer hood with drawcord, covered zipper, and front pouch pocket. Screen Printed.'),
(22, 2, 1, '2019-11-01 22:44:59', '1/4 Zip Powerblend Jacket', 'Product-19.jfif', 'Product-19.jfif', 'Product-19.jfif', 60, 'Jacket', 'This versatile, eco-friendly Powerblend 1/4 zip campus sweatshirt gives you a great casual look. This wardrobe staple features a mix of durable and comfortable fabrics with up to 5% recycled materials, a brushed fleece interior, a 1/4 length front zipper, a cadet collar, and ribbed cuffs and waistband. Share school spirit with the school graphic embroidered on the upper left.'),
(23, 2, 1, '2019-11-01 23:10:56', 'Crew Neck Sweatshirt', 'Product-20.jfif', 'Product-20.jfif', 'Product-20.jfif', 56, 'Sweatshirt', 'Heavyweight reverse weave crewneck sweatshirt with printed full school name and seal across front chest'),
(24, 3, 2, '2019-11-01 22:45:51', 'Twill Hat', 'Product-21.jfif', 'Product-21a.jfif', 'Product-21a.jfif', 22, 'Hat', 'Top off a casual look with this easy twill campus hat. This washed cotton twill cap features an unstructured relaxed fit, a self-fabric sweatband, eyelets for ventilation, a curved front bill, and an adjustable back strap for a custom fit. You\'re a-head of the pack with the small school mascot logo embroidered on the front.'),
(25, 3, 1, '2019-11-01 22:45:41', 'Alumni Adjustable Hat', 'Product-22.jfif', 'Product-22.jfif', 'Product-22.jfif', 26, 'Hat', 'Show your smarts in this relaxed twill adjustable \'\'Alumni\'\' campus hat. Enjoy wearing this spirited hat that features premium cotton twill fabric, a curved front bill, eyelets for ventilation, and an adjustable back strap for a comfortable fit. School pride is always on your mind with the school name and \'\'Alumni\'\' headline embroidered on the front.'),
(26, 6, 2, '2019-11-01 22:46:05', 'Team Flannel Pants', 'Product-23.jfif', 'Product-23.jfif', 'Product-23.jfif', 30, 'Pants', 'Relax and enjoy every moment in these classic campus Team Flannel pants. Lightweight lounge pants feature soft cotton flannel, a button close fly, a covered elastic waistband, and side pockets. Whether you are off to dreamland or the corner store, share school spirit with the school logo printed on the left hip.'),
(27, 3, 1, '2019-11-01 22:46:17', 'Cap', 'Product-24.jfif', 'Product-24a.jfif', 'Product-24a.jfif', 22, 'Hat', 'Top off your look in this sporty, casual, classic campus cap. This cotton twill ball cap gets back to basics with the unstructured fit, curved front bill, eyelets for ventilation, and an adjustable back strap for a comfortable fit. Ace the look with the school name embroidered in 3-D on the front.'),
(28, 1, 2, '2019-11-01 22:46:34', 'Women\'s Short Sleeve T-Shirt', 'Product-25.jfif', 'Product-25.jfif', 'Product-25.jfif', 22, 'T-Shirt', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(29, 3, 1, '2019-11-01 22:47:32', 'Trucker Cap', 'Product-26.jfif', 'Product-26a.jfif', 'Product-26a.jfif', 26, 'Hat', 'Whatever road you take, be ready for adventure in this campus Trucker cap. This popular cap features all cotton twill fabric that is washed to give it a lived-in look, an unstructured low profile fit, super soft mesh panels on the sides and back, a curved front bill, and a snapback strap. Stop traffic with the attention-getting patch that has the school logo embroidered on the front.'),
(30, 1, 2, '2019-11-01 22:47:45', 'Women\'s Short Sleeve T-Shirt', 'Product-27.jfif', 'Product-27.jfif', 'Product-27.jfif', 26, 'T-Shirt', 'Take the traditional boyfriend t-shirt, tailor it to show off a more feminine silhouette, and you have this Freshy women\'s campus t-shirt. Short sleeve, slim fit cotton t-shirt has a vintage look, an incredibly soft feel, and the school name and mascot screen-printed on the front. A new favorite?');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text CHARACTER SET latin1 NOT NULL,
  `p_cat_desc` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'T-Shirts & Tanks', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(2, 'Sweatshirts', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(3, 'Hats', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(4, 'Outerwear', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(5, 'Accessories', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.'),
(6, 'Shorts & Pants', 'School rules in this classic women\'s campus t-shirt. Women\'s relaxed fit t-shirt features a comfortable blend of fabrics, short sleeves, a crewneck, and a tag-free collar. Share school pride with the UNIVERSITY OF HOUSTON-DOWNTOWN name, logo, mascot name, and founding year printed on the front.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide number 1', 'slide-1.png'),
(2, 'slide number 2', 'slide-2.png'),
(3, 'slide number 3', 'slide-3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
