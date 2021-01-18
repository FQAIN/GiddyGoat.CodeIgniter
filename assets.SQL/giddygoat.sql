-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 09:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giddygoat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddtoCart` (IN `p_session_id` VARCHAR(250), IN `p_class_id` INT, IN `p_fabric_id` INT, IN `p_notion_id` INT, IN `p_product_name` VARCHAR(250), IN `p_product_desc` VARCHAR(254), IN `p_quantity` INT, IN `p_price` DECIMAL(5,2), IN `p_date_added` DATETIME, IN `p_image_path` VARCHAR(225))  BEGIN
INSERT INTO shopping_cart(session_id, class_id, fabric_id, notion_id, product_name, product_desc, quantity, price, date_added, image_path)
VALUES(p_session_id, p_class_id, p_fabric_id, p_notion_id, p_product_name, p_product_desc, p_quantity, p_price, p_date_added, p_image_path);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BookClass` (IN `p_class_id` INT, IN `p_member_id` INT, IN `p_paidInFull` CHAR(1), IN `p_balanceToBePaid` DECIMAL(3,2))  BEGIN
INSERT INTO class_booking(class_id, member_id, paidInFull, balanceToBePaid)
VALUES(p_class_id, p_member_id, p_paidInFull, p_balanceToBePaid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteItem` (IN `p_input` INT, IN `p_id` VARCHAR(250))  NO SQL
BEGIN
	DELETE FROM shopping_cart
    WHERE class_id = p_input OR fabric_id = p_input OR notion_id = p_input OR image_path = p_input
    AND id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFabrics` ()  BEGIN
SELECT fabric_id, name, description, cost, image FROM fabric;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFabricsPerPage` (IN `p_limit` INT, IN `p_start` INT)  BEGIN
SELECT fabric_id, name, description, cost, image FROM fabric
LIMIT p_start, p_limit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFabricType` (IN `p_fabric_type_id` INT)  BEGIN
SELECT fabric_type_id, fabricTypeName, description FROM fabric_type
WHERE fabric_type_id = p_fabric_type_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFabricTypes` ()  BEGIN
SELECT fabric_type_id, fabricTypeName FROM fabric_type;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotions` ()  BEGIN
SELECT 
notion_id, name, description, cost, image 
FROM notions;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotionsPerPage` (IN `p_limit` INT, IN `p_start` INT)  NO SQL
BEGIN
SELECT notion_id, name, description, cost, image FROM notions
LIMIT p_start, p_limit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotionTypes` ()  BEGIN
SELECT notion_type_id, notionTypeName FROM notion_type;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSelectedFabricTypes` (IN `p_fabricType_id` INT)  BEGIN
SELECT fabric_id, name, description, cost, image FROM fabric
WHERE fabric_type_id = p_fabricType_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSelectedNotionTypes` (IN `p_notionType_id` INT)  BEGIN
SELECT notion_id,name,description,cost,image FROM notions
WHERE notion_type_id = p_notionType_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSpecificFabric` (IN `p_fabric_id` INT)  BEGIN
SELECT fabric_id, name, description, cost, image, fabric_type_id, primaryColour, secondaryColour, ternaryColour FROM fabric
WHERE fabric_id = p_fabric_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSpecificNotion` (IN `p_notion_id` INT)  NO SQL
BEGIN
SELECT notion_id, name, description, cost, image, notion_type_id
FROM notions
WHERE notion_id = p_notion_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Register_Member` (IN `p_fName` VARCHAR(25), IN `p_lName` VARCHAR(25), IN `p_password` VARCHAR(15), IN `p_phone` VARCHAR(15), IN `p_emailAddress` VARCHAR(75), IN `p_addressLine1` VARCHAR(45), IN `p_addressLine2` VARCHAR(45), IN `p_addressLine3` VARCHAR(45), IN `p_city` VARCHAR(45), IN `p_county` VARCHAR(25), IN `p_country` VARCHAR(25), IN `p_subscribe` CHAR(25))  BEGIN
INSERT INTO member
 (fName, lName, password, phone, emailAddress, addressLine1,  addressLine2, addressLine3, city, county, country, subscribe)
VALUES (p_fName, p_lName, p_password, p_phone, p_emailAddress, p_addressLine1, p_addressLine2, p_addressLine3, p_city, p_county, p_country, p_subscribe);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RemoveFromCart` (IN `p_session_id` VARCHAR(250), IN `p_id` INT)  BEGIN
DELETE FROM shopping_cart
WHERE  id = p_id AND session_id = p_session_id; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectCartPerPageNS` (IN `p_sessionid` INT)  NO SQL
BEGIN
SELECT
id, session_id, class_id,
fabric_id, notion_id, product_name,
product_desc, quantity, price,
date_added, image_path
FROM shopping_cart
WHERE session_id = p_sessionid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectClass` (IN `p_date` DATE)  BEGIN
SELECT class_id, name, description, dateOfClass, timeOfClass, price, maxAttendees FROM class
WHERE dateOfClass = p_date;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectedFabricDetails` (IN `p_fabric_id` INT)  BEGIN
SELECT name, description, cost, image, fabric_type_id, primaryColour, secondaryColour, ternaryColour FROM fabric
WHERE fabric_id = p_fabric_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectedNotionDetails` (IN `p_notionType_id` INT)  BEGIN
SELECT name, description, cost, image, notion_type_id FROM notions
WHERE notion_id = p_notionType_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showClasses` ()  BEGIN
SELECT class_id, name, description, dateOfClass, timeOfClass, price, maxAttendees FROM class
WHERE dateOfClass >= CURRENT_DATE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateCart` (IN `p_session_id` VARCHAR(250), IN `p_id` INT, IN `p_quantity` INT)  BEGIN
UPDATE shopping_cart
SET quantity = p_quantity
WHERE id = p_id AND session_id = p_session_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Valid_Member` (IN `p_emailAddress` VARCHAR(75), IN `p_password` VARCHAR(15))  BEGIN
SELECT password,emailAddress
FROM member
WHERE p_emailAddress = emailAddress AND p_password = password;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(254) NOT NULL,
  `dateOfClass` date NOT NULL,
  `timeOfClass` time NOT NULL,
  `price` decimal(3,2) NOT NULL,
  `maxAttendees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `description`, `dateOfClass`, `timeOfClass`, `price`, `maxAttendees`) VALUES
(1, 'Needle Felting', 'This classcovers the basic concepts of needle felting with the creation of a colourful needle felt picture.', '2021-01-21', '11:00:00', '9.99', 12),
(2, 'Ticker Tape', 'This clas covers the concepts of ticker tape through creating a ticker tape quilt of your choice.', '2021-01-20', '10:00:00', '9.99', 12),
(3, 'class7', 'class7 des', '2021-01-21', '18:00:00', '8.00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `class_booking`
--

CREATE TABLE `class_booking` (
  `class_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `paidInFull` char(1) NOT NULL,
  `balanceToBePaid` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_booking`
--

INSERT INTO `class_booking` (`class_id`, `member_id`, `paidInFull`, `balanceToBePaid`) VALUES
(1, 1, 'Y', '0.00'),
(1, 2, 'Y', '0.00'),
(1, 3, 'N', '9.99'),
(1, 4, 'Y', '0.00'),
(2, 1, 'N', '9.99'),
(2, 3, 'Y', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `fabric`
--

CREATE TABLE `fabric` (
  `fabric_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(254) NOT NULL,
  `cost` decimal(4,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fabric_type_id` int(11) DEFAULT NULL,
  `primaryColour` varchar(20) NOT NULL,
  `secondaryColour` varchar(20) DEFAULT NULL,
  `ternaryColour` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric`
--

INSERT INTO `fabric` (`fabric_id`, `name`, `description`, `cost`, `image`, `fabric_type_id`, `primaryColour`, `secondaryColour`, `ternaryColour`) VALUES
(1, 'Travel Words Canvas', 'This bolt is peppered with city names from around the world, making it ideal to make fun items for people who love to travel or simple cover a wooden frame for a pretty modern wall-hanging!', '10.00', 'assets/images/fabrics/fabric1.jpg', 1, 'Black', 'White', 'Gold'),
(2, 'Triangles on Mustard', 'This is a stunning mustard fabric with sweet triangles tossed all over on a canvas fabric.', '10.00', 'assets/images/fabrics/fabric2.jpg', 1, 'Mustard', 'Yellow', 'White'),
(3, 'White Dots on Navy Blues', 'A funky and modern print on a navy medium weight canvas.', '10.00', 'assets/images/fabrics/fabric3.jpg', 1, 'Navy', 'Blue', 'White'),
(4, 'Comic Books', 'Young and old, DC or Marvel - if you like comics, you will love this canvas fabric.  Make a book bag or something more adventurous, we can almost guarantee it will go down a storm!', '10.00', 'assets/images/fabrics/fabric4.jpg', 1, 'Red', 'Blue', 'White'),
(5, 'Beads Colorful', 'Coated cotton is also known as laminate, pvc or oil cloth.  It can be used to make some pretty cool items like aprons, table cloths, tote bags and so much more!  ', '20.00', 'assets/images/fabrics/fabric5.jpg', 2, 'Blue', 'Red', 'Yellow'),
(6, 'Lines', 'You are going to love our gorgeous coated cottons.  They are also known as laminate or oil cloth and are suitable for a number of crafts. ', '20.00', 'assets/images/fabrics/fabric6.jpg', 2, 'White', 'Red', 'Blue'),
(7, 'Butterfly Fabric', 'Excellent quality at a great price from John Louden.  This butterfly fabric in bright and beautiful colours would make a fantastic backing fabric for smaller projects!  Also perfect for quilt borders, lightweight clothes and so much more!', '15.00', 'assets/images/fabrics/fabric7.jpg', 3, 'White', 'Red', 'Blue'),
(8, 'Campervans on grey material', 'Excellent quality at a great price.  These funky and fun camper vans would make a fantastic backing fabric for smaller projects!  Spruce up your own camper or caravan with cushions and accents made from this fabric!', '15.00', 'assets/images/fabrics/fabric8.jpg', 3, 'Grey', 'Red', 'Blue'),
(9, 'Elephants on Rose Pink', 'A super sweet print for baby nurseries... at 60\" wide, you will find it\'s the perfect width for baby quilts, curtains and so much more! ', '15.00', 'assets/images/fabrics/fabric9.jpg', 3, 'Pink', 'Grey', 'White'),
(10, 'Tea Time', 'A beautiful quality cotton percale fabric which is perfect for patchwork quilting or other crafts.  With this lovely tea time print, whatever you make will be gorgeous!', '15.00', 'assets/images/fabrics/fabric10.jpg', 3, 'Grey', 'Blue', 'White'),
(11, 'Hide and Seek Bears', '65% cotton, 30% polyester, 5% Elastane. 150cm Wide. 200g/m2', '14.00', 'assets/images/fabrics/fabric11.jpg', 4, 'Grey', 'Black', 'White'),
(12, 'Terazzo Night', 'The new Terrazzo Night fabric is made of soft cotton gauze. This blue, pink powder, and camel colored fabric is ideal for sewing blouses, dresses and skirts', '18.50', 'assets/images/fabrics/fabric12.jpg', 4, 'Blue', 'Pink', 'Camel'),
(13, 'Hippo Stripes Jersey', 'The adorable items you can make for big and small kids with this jersey/knit fabric.  Featuring plump pink hippos on a grey background. ', '12.50', 'assets/images/fabrics/fabric13.jpg', 4, 'Grey', 'Pink', 'Black'),
(14, 'Swallows on Navy Blue', 'You won\'t find such a gorgeous dressmaking fabric at such a great price very often.  This has the most luxurious, easy drape and it\'s so soft.... we just know it will be fantastic made into a top or dress.  The bird print is suitable for children and adu', '8.00', 'assets/images/fabrics/fabric14.jpg', 4, 'Blue', 'Green', 'Pink'),
(15, 'Bunnies on Mint Green', 'When you are making clothes, the fabric choice makes all the difference - so pick something fun, unique and colourful....colourful is always good!  Stand out in a crowd - wear these bunnies with pride! ', '14.75', 'assets/images/fabrics/fabric15.jpg', 4, 'Blue', 'Green', 'Pink'),
(16, 'Yellow Chevron Flannel', 'A beautiful collection of soft baby pinks, yellows, teal and green.  In gorgeous patterns such as check, chevron, spots and stripes!  ', '15.00', 'assets/images/fabrics/fabric16.jpg', 5, 'Yellow', 'Mustard ', 'White'),
(17, 'Green Check Flannel', 'A range by Kim Diehl for Henry Glass & Co.,  - Ric Rac Paddywack - perfect for childrens blankets and quilts.  Gingham, Spots, Check - everything you need to make a stunning baby quilt! ', '15.00', 'assets/images/fabrics/fabric17.jpg', 5, 'Green', 'White', 'Mint'),
(18, 'Colorful Baby Buttons', 'The perfect flannel fabric for your babies little blankets, quilts, comforters, taggies and other nursery items.  Also used in clothes because it is so super soft, you will love wrapping your little ones up in it!  ', '15.00', 'assets/images/fabrics/fabric18.jpg', 5, 'White', 'Pink', 'Yellow'),
(19, 'Poppies On Green', 'This collection is Jen Kingwells take on prints from the 50s and 60s – eras in textile design.  They are funky prints featuring bright florals and can be used both as a dressmaking fabric or a patchwork and quilting fabric.  Because it\'s 60\" wide, it mak', '19.50', 'assets/images/fabrics/fabric19.jpg', 3, 'Green', 'Pink', 'Red'),
(20, 'Vintage Cars on Gold', 'Excellent quality at a great price.  These vintage cars on a gold background would make a fantastic backing fabric for smaller projects!', '10.00', 'assets/images/fabrics/fabric20.jpg', 3, 'Gold', 'Mustard', 'White');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_type`
--

CREATE TABLE `fabric_type` (
  `fabric_type_id` int(11) NOT NULL,
  `fabricTypeName` varchar(30) NOT NULL,
  `description` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_type`
--

INSERT INTO `fabric_type` (`fabric_type_id`, `fabricTypeName`, `description`) VALUES
(1, 'Canvas', 'This category contains canvas'),
(2, 'Coated cotton', 'This category contains coated cotton'),
(3, 'Cotton', 'This category contains cotton'),
(4, 'Dressmaking', 'This category contains dressmaking'),
(5, 'Flannel', 'This category contains flannel');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `emailAddress` varchar(75) NOT NULL,
  `addressLine1` varchar(45) NOT NULL,
  `addressLine2` varchar(45) NOT NULL,
  `addressLine3` varchar(45) NOT NULL,
  `city` varchar(25) NOT NULL,
  `county` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL DEFAULT 'Ireland',
  `subscribe` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `fName`, `lName`, `password`, `phone`, `emailAddress`, `addressLine1`, `addressLine2`, `addressLine3`, `city`, `county`, `country`, `subscribe`) VALUES
(1, 'John', 'Doe', 'Password', '0851234567', 'john@gmail.com', 'Apt 45 Rosehouse', 'Henry Street', 'Limerick', 'Limerick', 'Limerick', 'Ireland', 'Y'),
(2, 'Tim', 'Gordon', 'Password', '854568547', 'tim@gmail.com', 'Apt 45 Rosehouse', 'Henry Street', 'Limerick', 'Limerick', 'Limerick', 'Ireland', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `notions`
--

CREATE TABLE `notions` (
  `notion_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(254) NOT NULL,
  `cost` decimal(4,2) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `notion_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notions`
--

INSERT INTO `notions` (`notion_id`, `name`, `description`, `cost`, `image`, `notion_type_id`) VALUES
(1, 'Color Handle Soft Grip Scissors', 'A decent sized scissors for cutting fabric, paper, card and more.... It\'s 8.5\" long making short work of your cutting. ', '4.50', 'assets/images/notions/notions1.jpg', 1),
(2, 'Prym Professional Fine Point Embroidery Scissors', '1 x Professional Embroidery Scissors Fine Point with 4-inch 10 cm Blades', '23.00', 'assets/images/notions/notions2.jpg', 1),
(3, 'Klieber Scissors', 'Standard Household style scissors. Suitable for cutting fabric.', '6.00', 'assets/images/notions/notions3.png', 1),
(4, '16.5” Creative Grids Ruler', 'The ruler slides easily over the fabric until pressure is applied. Then, the exclusive gripper holds the fabric in place while cutting, eliminating slipping and miss-cuts!  The diagonal line makes trimming half-square triangles created with 10 inch squar', '35.00', 'assets/images/notions/notions4.jpg', 2),
(5, 'EZ Quilting Petal Pattern Shapes Ruler', 'Designed by Darline Zimmerman.  You will have the petals cut out in no time with this Petal Shapes tool, whether you are adding 1 flower or 10 to your next project, . Piece together 8 petals side by side for a full flower, and use them for quilting, sewi', '14.00', 'assets/images/notions/notions5.jpg', 2),
(6, 'Add a Quarter Yellow Ruler', 'These rulers combine the speed of rotary cutting quilt pieces with the accuracy of using templates. Once your templates are made, the Add-A-Quarter, with the specially designed lip, will automatically add the customary 1/4\" seam allowance to any straight', '13.00', 'assets/images/notions/notions6.jpg', 2),
(7, 'Rotating Cutting Mat', 'The measurements are marked in inches on this cutting mat. \r\n12\" square.\r\n', '30.00', 'assets/images/notions/notions7.jpg', 3),
(8, 'Metal Thimble – 17mm', 'A thimble is a small hard pitted cup worn for protection on the finger that pushes the needle in sewing. Usually, thimbles with a closed top are used by dressmakers but special thimbles with an opening at the end are used by tailors as this allows them t', '3.00', 'assets/images/notions/notions8.jpg', 4),
(9, 'Jersey Sewing Machine Needles. Assorted Sizes. Pack of 5 ', 'These needles will ensuring that your stitches allow for the stretch in the fabric, they won\'t drag or be too tight! \r\n\r\nSizes included are:\r\n70/10\r\n70/10\r\n80/12\r\n80/12\r\n90/14\r\n', '5.00', 'assets/images/notions/notions9.jpg', 4),
(10, 'Silk Pins', 'Fine, sharp, silk pins. So sharp that your machine will glide over them. Perfect for patchwork.', '8.75', 'assets/images/notions/notions10.png', 4),
(11, 'Needle Grabbers', 'Grips stubborn needle and pulls it through with ease.', '3.15', 'assets/images/notions/notions11.png', 4),
(12, 'Quilting Flower Head Sewing Pins', 'An excellent set of pins for great value and ease of use.  Easy to pick up, insert....and easy to find if you drop on the floor.... great to save your little toesies!', '2.50', 'assets/images/notions/notions12.jpg', 4),
(13, 'Upholsterers Needles', 'The upholsterer\'s needles or decorative steel needles are an extremely-helpful tool for upholstering. Prym offers these semicircular, curved hand sewing needles with eyelet in a set in sizes no. 2, 4, and 5. Whether it\'s a car seat or upholstered cushion', '3.25', 'assets/images/notions/notions13.jpg', 4),
(14, 'Fork Blocking Pins', 'Clover Fork Blocking Pins make it easy to securely pin your projects, so you can get the finish you want. With forty in each pack, you’ll have no shortage of pins at your disposal.', '14.95', 'assets/images/notions/notions14.jpg', 4),
(15, 'Knitting Marking Pins', 'Large head keeps the pin from slipping off the stitches.  Used for pinning sleeves or basting a pocket.  Long enough to easily stick through a thick knitting cloth.  Point is rounded to prevent knitting yarn from splitting. ', '3.50', 'assets/images/notions/notions15.jpg', 4),
(16, 'Needle Threader', 'Use a needle threader to swiftly and easily thread your hand sewing or machine needles.  Especially useful in dim light. \r\n\r\nComes in assorted colours. \r\n', '0.25', 'assets/images/notions/notions16.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notion_type`
--

CREATE TABLE `notion_type` (
  `notion_type_id` int(11) NOT NULL,
  `notionTypeName` varchar(30) NOT NULL,
  `description` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notion_type`
--

INSERT INTO `notion_type` (`notion_type_id`, `notionTypeName`, `description`) VALUES
(1, 'Scissors', 'This category contains scissors'),
(2, 'Rulers', 'This category contains This category contains rulers'),
(3, 'Cutting mats', 'This category contains cutting mats'),
(4, 'Pin & Needles', 'This category contains pin & needles');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `date_of_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `purchase_detail_id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `fabric_id` int(11) DEFAULT NULL,
  `notion_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `cost` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(250) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `fabric_id` int(11) DEFAULT NULL,
  `notion_id` int(11) DEFAULT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_desc` varchar(254) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `date_added` datetime NOT NULL,
  `image_path` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `session_id`, `class_id`, `fabric_id`, `notion_id`, `product_name`, `product_desc`, `quantity`, `price`, `date_added`, `image_path`) VALUES
(115, '1610741017', NULL, NULL, 1, 'Color Handle Soft Grip Scissors', 'A decent sized scissors for cutting fabric, paper, card and more.... It\'s 8.5\" long making short work of your cutting. ', 1, '4.50', '2021-01-15 21:04:33', 'assets/images/notions/notions1.jpg'),
(117, '1610741760', NULL, 1, NULL, 'Travel Words Canvas', 'This bolt is peppered with city names from around the world, making it ideal to make fun items for people who love to travel or simple cover a wooden frame for a pretty modern wall-hanging!', 1, '10.00', '2021-01-15 21:16:10', 'assets/images/fabrics/fabric1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_booking`
--
ALTER TABLE `class_booking`
  ADD PRIMARY KEY (`class_id`,`member_id`);

--
-- Indexes for table `fabric`
--
ALTER TABLE `fabric`
  ADD PRIMARY KEY (`fabric_id`);

--
-- Indexes for table `fabric_type`
--
ALTER TABLE `fabric_type`
  ADD PRIMARY KEY (`fabric_type_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `notions`
--
ALTER TABLE `notions`
  ADD PRIMARY KEY (`notion_id`);

--
-- Indexes for table `notion_type`
--
ALTER TABLE `notion_type`
  ADD PRIMARY KEY (`notion_type_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`purchase_detail_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fabric`
--
ALTER TABLE `fabric`
  MODIFY `fabric_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fabric_type`
--
ALTER TABLE `fabric_type`
  MODIFY `fabric_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notions`
--
ALTER TABLE `notions`
  MODIFY `notion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notion_type`
--
ALTER TABLE `notion_type`
  MODIFY `notion_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `purchase_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
